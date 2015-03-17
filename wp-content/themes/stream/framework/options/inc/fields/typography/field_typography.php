<?php

/**
 * Class and Function List:
 * Function list:
 * - __construct()
 * - render()
 * - enqueue()
 * - makeGoogleWebfontLink()
 * - makeGoogleWebfontString()
 * - output()
 * - getGoogleArray()
 * - getGoogleFonts()
 * - getSubsets()
 * - getVariants()
 * Classes list:
 * - ReduxFramework_typography
 */
class ReduxFramework_typography {

    private $std_fonts = array(
        "Arial, Helvetica, sans-serif"                          => "Arial, Helvetica, sans-serif",
        "'Arial Black', Gadget, sans-serif"                     => "'Arial Black', Gadget, sans-serif",
        "'Bookman Old Style', serif"                            => "'Bookman Old Style', serif",
        "'Comic Sans MS', cursive"                              => "'Comic Sans MS', cursive",
        "Courier, monospace"                                    => "Courier, monospace",
        "Garamond, serif"                                       => "Garamond, serif",
        "Georgia, serif"                                        => "Georgia, serif",
        "Impact, Charcoal, sans-serif"                          => "Impact, Charcoal, sans-serif",
        "'Lucida Console', Monaco, monospace"                   => "'Lucida Console', Monaco, monospace",
        "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"    => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
        "'MS Sans Serif', Geneva, sans-serif"                   => "'MS Sans Serif', Geneva, sans-serif",
        "'MS Serif', 'New York', sans-serif"                    => "'MS Serif', 'New York', sans-serif",
        "'Palatino Linotype', 'Book Antiqua', Palatino, serif"  => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
        "Tahoma,Geneva, sans-serif"                             => "Tahoma, Geneva, sans-serif",
        "'Times New Roman', Times,serif"                        => "'Times New Roman', Times, serif",
        "'Trebuchet MS', Helvetica, sans-serif"                 => "'Trebuchet MS', Helvetica, sans-serif",
        "Verdana, Geneva, sans-serif"                           => "Verdana, Geneva, sans-serif",
    );

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since ReduxFramework 1.0.0
     */
    function __construct($field = array(), $value = '', $parent) {
        global $wp_filesystem;
        
        $this->parent   = $parent;
        $this->field    = $field;
        $this->value    = $value;
        
        // Init wp_filesystem
        Redux_Functions::initWpFilesystem();
        
        // Set upload dir path for google fonts
        $this->font_dir =  ReduxFramework::$_upload_dir . 'google-fonts/';

        // Check for redux_google_font dir
        if (!is_dir($this->font_dir)) {
            
            // Create it, if not found
            $wp_filesystem->mkdir($this->font_dir, FS_CHMOD_DIR);
        }

        // Set google font file variables
        $this->google_html = $this->font_dir . 'googlefonts.html';
        $this->google_json = $this->font_dir . 'googlefonts.json';
        
        // Move installed googlefonts.html to upload location, if not exists
        if (!file_exists($this->google_html)) {
            $wp_filesystem->copy(ReduxFramework::$_dir . 'inc/fields/typography/googlefonts.html', $this->font_dir . 'googlefonts.html', false);
        }

        // Move installed googlefonts.json to upload location, if not exists
        if (!file_exists($this->google_json)) {
            $wp_filesystem->copy(ReduxFramework::$_dir . 'inc/fields/typography/googlefonts.json', $this->font_dir . 'googlefonts.json', false);
        }

        // Get the google array
        $this->getGoogleArray();

    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since ReduxFramework 1.0.0
     */
    function render() {
        global $wp_filesystem;

        // No errors please
        $defaults = array(
            'font-family'       => true,
            'font-size'         => true,    // true
            'font-weight'       => true,
            'font-style'        => true,
            'font-backup'       => false,   // false
            'subsets'           => true,
            'custom_fonts'      => true,
            'text-align'        => true,
            'text-transform'    => false,   // false
            'font-variant'      => false, // false
            'text-decoration'   => false, // false
            //'text-shadow'       => false, // false
            'color'             => true,
            'preview'           => true,
            'line-height'       => true,    // true
            'word-spacing'      => false,   // false
            'letter-spacing'    => false,   // false
            'google'            => true,
            'update_weekly'     => false    // Enable to force updates of Google Fonts to be weekly
        );
        $this->field = wp_parse_args($this->field, $defaults);

        $defaults = array(
            'font-family'       => '',
            'font-options'      => '',
            'font-backup'       => '',
            'text-align'        => '',
            'text-transform'    => '',
            'font-variant'      => '',
            'text-decoration'   => '',
            //'text-shadow'       => '',
            'line-height'       => '',
            'word-spacing'      => '',
            'letter-spacing'    => '',
            'subsets'           => '',
            'google'            => false,
            'font-script'       => '',
            'font-weight'       => '',
            'font-style'        => '',
            'color'             => '',
            'font-size'         => '',
        );

        $this->value = wp_parse_args($this->value, $defaults);

        // Since fonts declared is CSS (@font-face) are not rendered in the preview,
        // they can be declared in a CSS file and passed here so they DO display in
        // font preview.  Do NOT pass style.css in your theme, as that will mess up
        // admin page styling.  It's recommended to pass a CSS file with ONLY font
        // declarations.
        // If field is set and not blank, then enqueue field
        if (isset($this->field['ext-font-css']) && $this->field['ext-font-css'] != '') {
            wp_register_style('redux-external-fonts', $this->field['ext-font-css']);
            wp_enqueue_style('redux-external-fonts');
        }

        if (empty($this->field['units']) && !empty($this->field['default']['units'])) {
            $this->field['units'] = $this->field['default']['units'];
        }

        if (empty($this->field['units']) || !in_array($this->field['units'], array(
                    'px',
                    'em',
                    'rem',
                    '%'
                ))) {
            $this->field['units'] = 'px';
        }

        $unit = $this->field['units'];

        echo '<div id="' . $this->field['id'] . '" class="redux-typography-container" data-id="' . $this->field['id'] . '" data-units="' . $unit . '">';
		
        if ($this->field['font-family'] === true) {
            /* Font Family */
            if (filter_var($this->value['google'], FILTER_VALIDATE_BOOLEAN)) {
                $fontFamily = explode(', ', $this->value['font-family'], 2);
                if (empty($fontFamily[0]) && !empty($fontFamily[1])) {
                    $fontFamily[0] = $fontFamily[1];
                    $fontFamily[1] = "";
                }
            }

            if (!isset($fontFamily)) {
                $fontFamily = array();
                $fontFamily[0] = $this->value['font-family'];
                $fontFamily[1] = "";
            }

            echo '<input type="hidden" class="redux-typography-font-family ' . $this->field['class'] . '" name="' . $this->field['name'] . '[font-family]' . $this->field['name_suffix'] . '" value="' . $this->value['font-family'] . '" data-id="' . $this->field['id'] . '"  />';
            echo '<input type="hidden" class="redux-typography-font-options ' . $this->field['class'] . '" name="' . $this->field['name'] . '[font-options]' . $this->field['name_suffix'] . '" value="' . $this->value['font-options'] . '" data-id="' . $this->field['id'] . '"  />';
            echo '<div class="select_wrapper typography-family" style="width: 220px; margin-right: 5px;">';
            echo '<label>' . __('Font Family', 'redux-framework') . '</label>';
            echo '<select data-placeholder="' . __('Font family', 'redux-framework') . '" class="redux-typography redux-typography-family ' . $this->field['class'] . '" id="' . $this->field['id'] . '-family" data-id="' . $this->field['id'] . '" data-value="' . $fontFamily[0] . '">';
            echo '<option data-google="false" data-details="" value=""></option>';


            if (empty($this->field['fonts'])) {
                $this->field['fonts'] = $this->std_fonts;
            }
            
            // Standard sizes for normal fonts
            $font_sizes = urlencode(json_encode(array(
                '400'       => 'Normal 400',
                '700'       => 'Bold 700',
                '400italic' => 'Normal 400 Italic',
                '700italic' => 'Bold 700 Italic'
            )));

            if (($this->field['google'] == true && !empty($this->parent->args['google_api_key'])) || ($this->field['custom_fonts'] !== false && !empty($this->field['custom_fonts']))) {
                echo '<optgroup label="' . __('Standard Fonts', 'redux-framework') . '">';
            }
            
            foreach ($this->field['fonts'] as $i => $family) {
                echo '<option data-google="false" data-details="' . $font_sizes . '" value="' . $i . '"' . selected($this->value['font-family'], $i, false) . '>' . $family . '</option>';
            }
            
            if ($this->field['custom_fonts'] !== false) {
                $this->field['custom_fonts'] = apply_filters("redux/{$this->parent->args['opt_name']}/field/typography/custom_fonts", array());

                if (!empty($this->field['custom_fonts'])) {
                    foreach ($this->field['custom_fonts'] as $group => $fonts) {
                        echo '</optgroup><optgroup label="' . $group . '">';
                        foreach ($fonts as $family => $v) {
                            echo '<option data-google="false" data-details="' . $font_sizes . '" value="' . $family . '"' . selected($this->value['font-family'], $family, false) . '>' . $family . '</option>';
                        }
                    }
                }
            }

            if ($this->field['google'] == true && !empty($this->parent->args['google_api_key'])) {
                echo '</optgroup>';

                if (!file_exists($this->google_html)) {
                    $this->getGoogleFonts();
                }

                if (!isset($this->parent->googleFontHTML) && !empty($this->parent->googleFontHTML)) {
                    echo $this->parent->googleFontHTML;
                  } else if (file_exists($this->google_html)) {
                    $googleHTML = $wp_filesystem->get_contents($this->google_html);
                    
                    // Fallback if file_get_contents won't work for wordpress. MEDIATEMPLE
                    if (empty($googleHTML)) {
                        $googleHTML = Redux_Helpers::curlRead($this->google_html);
                    }
                    
                    $this->parent->googleFontHTML = $googleHTML;
                    echo $googleHTML;
                }
            }

            echo '</select></div>';

            if ($this->field['google'] === true) {
                // Set a flag so we know to set a header style or not
                echo '<input type="hidden" class="redux-typography-google' . $this->field['class'] . '" id="' . $this->field['id'] . '-google" name="' . $this->field['name'] . '[google]' . $this->field['name_suffix'] . '" type="text" value="' . $this->field['google'] . '" data-id="' . $this->field['id'] . '" />';
            }
        }

        /* Backup Font */
        if ($this->field['font-family'] === true && $this->field['google'] === true) {
            
            // Set a flag so we know to set a header style or not
            echo '<input type="hidden" class="redux-typography-google' . $this->field['class'] . '" id="' . $this->field['id'] . '-google" name="' . $this->field['name'] . '[google]' . $this->field['name_suffix'] . '" type="text" value="' . $this->field['google'] . '" data-id="' . $this->field['id'] . '" data-id="' . $this->field['id'] . '"  />';

            if ($this->field['font-backup'] === true) {
                echo '<div class="select_wrapper typography-family-backup" style="width: 220px; margin-right: 5px;">';
		echo '<label>' . __('Backup Font Family', 'redux-framework') . '</label>';
                echo '<select data-placeholder="' . __('Backup Font Family', 'redux-framework') . '" name="' . $this->field['name'] . '[font-backup]' . $this->field['name_suffix'] . '" class="redux-typography redux-typography-family-backup ' . $this->field['class'] . '" id="' . $this->field['id'] . '-family-backup" data-id="' . $this->field['id'] . '" data-value="' . $this->value['font-backup'] . '">';
                echo '<option data-google="false" data-details="" value=""></option>';
                
                foreach ($this->field['fonts'] as $i => $family) {
                    echo '<option data-google="true" value="' . $i . '"' . selected($this->value['font-backup'], $i, false) . '>' . $family . '</option>';
                }
                
                echo '</select></div>';
            }
        }

        /* Font Style/Weight */
        if ($this->field['font-style'] === true || $this->field['font-weight'] === true){
            echo '<div class="select_wrapper typography-style" original-title="' . __('Font style', 'redux-framework') . '">';
            echo '<label>' . __('Font Weight &amp; Style', 'redux-framework') . '</label>';
            
            $style = $this->value['font-weight'] . $this->value['font-style'];
            
            echo '<input type="hidden" class="typography-font-weight" name="' . $this->field['name'] . '[font-weight]' . $this->field['name_suffix'] . '" val="' . $this->value['font-weight'] . '" data-id="' . $this->field['id'] . '"  /> ';
            echo '<input type="hidden" class="typography-font-style" name="' . $this->field['name'] . '[font-style]' . $this->field['name_suffix'] . '" val="' . $this->value['font-style'] . '" data-id="' . $this->field['id'] . '"  /> ';
            echo '<select data-placeholder="' . __('Style', 'redux-framework') . '" class="redux-typography redux-typography-style select' . $this->field['class'] . '" original-title="' . __('Font style', 'redux-framework') . '" id="' . $this->field['id'] . '_style" data-id="' . $this->field['id'] . '" data-value="' . $style . '">';
            
            if (empty($this->value['subset'])) {
                echo '<option value=""></option>';
            }
            
            $nonGStyles = array(
                '200' => 'Lighter',
                '400' => 'Normal',
                '700' => 'Bold',
                '900' => 'Bolder'
            );
            if (isset($gfonts[$this->value['font-family']])) {
                foreach ($gfonts[$this->value['font-family']]['variants'] as $v) {
                    echo '<option value="' . $v['id'] . '" ' . selected($this->value['subset'], $v['id'], false) . '>' . $v['name'] . '</option>';
                }
            } else {
                foreach ($nonGStyles as $i => $style) {
                    if (!isset($this->value['subset']))
                        $this->value['subset'] = false;
                    echo '<option value="' . $i . '" ' . selected($this->value['subset'], $i, false) . '>' . $style . '</option>';
                }
            }

            echo '</select></div>';
        }

        /* Font Script */
        if ($this->field['font-family'] === true && $this->field['subsets'] === true && $this->field['google'] === true){
            echo '<div class="select_wrapper typography-script tooltip" original-title="' . __('Font subsets', 'redux-framework') . '">';
            echo '<label>' . __('Font Subsets', 'redux-framework') . '</label>';
            echo '<select data-placeholder="' . __('Subsets', 'redux-framework') . '" class="redux-typography redux-typography-subsets' . $this->field['class'] . '" original-title="' . __('Font script', 'redux-framework') . '"  id="' . $this->field['id'] . '-subsets" name="' . $this->field['name'] . '[subsets]' . $this->field['name_suffix'] . '" data-value="' . $this->value['subsets'] . '" data-id="' . $this->field['id'] . '" >';
            
            if (empty($this->value['subsets'])) {
                echo '<option value=""></option>';
            }
            
            if (isset($gfonts[$this->value['font-family']])) {
                foreach ($gfonts[$this->value['font-family']]['subsets'] as $v) {
                    echo '<option value="' . $v['id'] . '" ' . selected($this->value['subset'], $v['id'], false) . '>' . $v['name'] . '</option>';
                }
            }
            
            echo '</select></div>';
        }

        /* Font Align */
        if ($this->field['text-align'] === true){
            echo '<div class="select_wrapper typography-align tooltip" original-title="' . __('Text Align', 'redux-framework') . '">';
            echo '<label>' . __('Text Align', 'redux-framework') . '</label>';
            echo '<select data-placeholder="' . __('Text Align', 'redux-framework') . '" class="redux-typography redux-typography-align' . $this->field['class'] . '" original-title="' . __('Text Align', 'redux-framework') . '"  id="' . $this->field['id'] . '-align" name="' . $this->field['name'] . '[text-align]' . $this->field['name_suffix'] . '" data-value="' . $this->value['text-align'] . '" data-id="' . $this->field['id'] . '" >';
            echo '<option value=""></option>';
            
            $align = array(
                'inherit',
                'left',
                'right',
                'center',
                'justify',
                'initial'
            );

            foreach ($align as $v) {
                echo '<option value="' . $v . '" ' . selected($this->value['text-align'], $v, false) . '>' . ucfirst($v) . '</option>';
            }

            echo '</select></div>';
        }

        /* Text Transform */
        if ($this->field['text-transform'] === true) {
            echo '<div class="select_wrapper typography-transform tooltip" original-title="' . __('Text Transform', 'redux-framework') . '">';
            echo '<label>' . __('Text Transform', 'redux-framework') . '</label>';
            echo '<select data-placeholder="' . __('Text Transform', 'redux-framework') . '" class="redux-typography redux-typography-transform' . $this->field['class'] . '" original-title="' . __('Text Transform', 'redux-framework') . '"  id="' . $this->field['id'] . '-transform" name="' . $this->field['name'] . '[text-transform]' . $this->field['name_suffix'] . '" data-value="' . $this->value['text-transform'] . '" data-id="' . $this->field['id'] . '" >';
            echo '<option value=""></option>';
            
            $values = array(
                'none',
                'capitalize',
                'uppercase',
                'lowercase',
                'initial',
                'inherit'
            );

            foreach ($values as $v) {
                echo '<option value="' . $v . '" ' . selected($this->value['text-transform'], $v, false) . '>' . ucfirst($v) . '</option>';
            }

            echo '</select></div>';
        }

        /* Font Variant */
        if ($this->field['font-variant'] === true) {
            echo '<div class="select_wrapper typography-font-variant tooltip" original-title="' . __('Font Variant', 'redux-framework') . '">';
            echo '<label>' . __('Font Variant', 'redux-framework') . '</label>';
            echo '<select data-placeholder="' . __('Font Variant', 'redux-framework') . '" class="redux-typography redux-typography-font-variant' . $this->field['class'] . '" original-title="' . __('Font Variant', 'redux-framework') . '"  id="' . $this->field['id'] . '-font-variant" name="' . $this->field['name'] . '[font-variant]' . $this->field['name_suffix'] . '" data-value="' . $this->value['font-variant'] . '" data-id="' . $this->field['id'] . '" >';
            echo '<option value=""></option>';
            
            $values = array(
                'inherit',
		'normal',
                'small-caps'
            );

            foreach ($values as $v) {
                echo '<option value="' . $v . '" ' . selected($this->value['font-variant'], $v, false) . '>' . ucfirst($v) . '</option>';
            }
			
            echo '</select></div>';
        }

        /* Text Decoration */
        if ($this->field['text-decoration'] === true) {
            echo '<div class="select_wrapper typography-decoration tooltip" original-title="' . __('Text Decoration', 'redux-framework') . '">';
            echo '<label>' . __('Text Decoration', 'redux-framework') . '</label>';
            echo '<select data-placeholder="' . __('Text Decoration', 'redux-framework') . '" class="redux-typography redux-typography-decoration' . $this->field['class'] . '" original-title="' . __('Text Decoration', 'redux-framework') . '"  id="' . $this->field['id'] . '-decoration" name="' . $this->field['name'] . '[text-decoration]' . $this->field['name_suffix'] . '" data-value="' . $this->value['text-decoration'] . '" data-id="' . $this->field['id'] . '" >';
            echo '<option value=""></option>';
            
            $values = array(
                'none',
                'inherit',
		'underline',
                'overline',
		'line-through',
		'blink'
            );

            foreach ($values as $v) {
                echo '<option value="' . $v . '" ' . selected($this->value['text-decoration'], $v, false) . '>' . ucfirst($v) . '</option>';
            }

            echo '</select></div>';
        }

        /* Font Size */
        if ($this->field['font-size'] === true){
	    echo '<div class="input_wrapper font-size redux-container-spinner">';
            echo '<label>' . __('Font Size', 'redux-framework') . '</label>';
            echo '<div class="input-append"><input type="text" class="span2 redux-typography redux-typography-size mini spinner-input' . $this->field['class'] . '" title="' . __('Font Size', 'redux-framework') . '" placeholder="' . __('Size', 'redux-framework') . '" id="' . $this->field['id'] . '-size" name="' . $this->field['name'] . '[font-size]' . $this->field['name_suffix'] . '" value="' . str_replace($unit, '', $this->value['font-size']) . '" data-value="' . str_replace($unit, '', $this->value['font-size']) . '"><span class="add-on">' . $unit . '</span></div>';
            echo '<input type="hidden" class="typography-font-size" name="' . $this->field['name'] . '[font-size]" value="' . $this->value['font-size'] . '" data-id="' . $this->field['id'] . '"  />';
            echo '</div>';
        }
		
		/* Line Height */
        if ($this->field['line-height'] === true){
            echo '<div class="input_wrapper line-height redux-container-spinner">';
            echo '<label>' . __('Line Height', 'redux-framework') . '</label>';
            echo '<div class="input-append"><input type="text" class="span2 redux-typography redux-typography-height mini spinner-input' . $this->field['class'] . '" title="' . __('Line Height', 'redux-framework') . '" placeholder="' . __('Height', 'redux-framework') . '" id="' . $this->field['id'] . '-height" value="' . str_replace($unit, '', $this->value['line-height']) . '" data-value="' . str_replace($unit, '', $this->value['line-height']) . '"><span class="add-on">' . $unit . '</span></div>';
            echo '<input type="hidden" class="typography-line-height" name="' . $this->field['name'] . '[line-height]' . $this->field['name_suffix'] . '" value="' . $this->value['line-height'] . '" data-id="' . $this->field['id'] . '"  />';
            echo '</div>';
        }
        
        /* Word Spacing */
        if ($this->field['word-spacing'] === true){
            echo '<div class="input_wrapper word-spacing redux-container-spinner">';
            echo '<label>' . __('Word Spacing', 'redux-framework') . '</label>';
            echo '<div class="input-append"><input type="text" class="span2 redux-typography redux-typography-word mini spinner-input' . $this->field['class'] . '" title="' . __('Word Spacing', 'redux-framework') . '" placeholder="' . __('Word Spacing', 'redux-framework') . '" id="' . $this->field['id'] . '-word" value="' . str_replace($unit, '', $this->value['word-spacing']) . '" data-value="' . str_replace($unit, '', $this->value['word-spacing']) . '"><span class="add-on">' . $unit . '</span></div>';
            echo '<input type="hidden" class="typography-word-spacing" name="' . $this->field['name'] . '[word-spacing]' . $this->field['name_suffix'] . '" value="' . $this->value['word-spacing'] . '" data-id="' . $this->field['id'] . '"  />';
            echo '</div>';
        }
 
        /* Letter Spacing */
        if ($this->field['letter-spacing'] === true){
            echo '<div class="input_wrapper letter-spacing redux-container-spinner">';
            echo '<label>' . __('Letter Spacing', 'redux-framework') . '</label>';
            echo '<div class="input-append"><input type="text" class="span2 redux-typography redux-typography-letter mini spinner-input' . $this->field['class'] . '" title="' . __('Letter Spacing', 'redux-framework') . '" placeholder="' . __('Letter Spacing', 'redux-framework') . '" id="' . $this->field['id'] . '-letter" value="' . str_replace($unit, '', $this->value['letter-spacing']) . '" data-value="' . str_replace($unit, '', $this->value['letter-spacing']) . '"><span class="add-on">' . $unit . '</span></div>';
            echo '<input type="hidden" class="typography-letter-spacing" name="' . $this->field['name'] . '[letter-spacing]' . $this->field['name_suffix'] . '" value="' . $this->value['letter-spacing'] . '" data-id="' . $this->field['id'] . '"  />';
            echo '</div>';
        }
        
	echo '<div class="clearfix"></div>';

	    /* Font Color */
        if ($this->field['color'] === true){
            $default = "";
            
            if (empty($this->field['default']['color']) && !empty($this->field['color'])) {
                $default = $this->value['color'];
            } else if (!empty($this->field['default']['color'])) {
                $default = $this->field['default']['color'];
            }
            
            echo '<div class="picker-wrapper">';
            echo '<label>' . __('Font Color', 'redux-framework') . '</label>';
            echo '<div id="' . $this->field['id'] . '_color_picker" class="colorSelector typography-color"><div style="background-color: ' . $this->value['color'] . '"></div></div>';
            echo '<input data-default-color="' . $default . '" class="redux-color redux-typography-color' . $this->field['class'] . '" original-title="' . __('Font color', 'redux-framework') . '" id="' . $this->field['id'] . '-color" name="' . $this->field['name'] . '[color]' . $this->field['name_suffix'] . '" type="text" value="' . $this->value['color'] . '" data-id="' . $this->field['id'] . '" />';
            echo '</div>';
        }
		echo '<div class="clearfix"></div>';
		
        /* Font Preview */
        if (!isset($this->field['preview']) || $this->field['preview'] !== false){
            if (isset($this->field['preview']['text'])) {
                $g_text = $this->field['preview']['text'];
            } else {
                $g_text = '1 2 3 4 5 6 7 8 9 0 A B C D E F G H I J K L M N O P Q R S T U V W X Y Z a b c d e f g h i j k l m n o p q r s t u v w x y z';
            }
            
            if (isset($this->field['preview']['font-size'])) {
                $g_size = 'style="font-size: ' . $this->field['preview']['font-size'] . ';"';
            } else {
                $g_size = '';
            }

            echo '<p class="clear ' . $this->field['id'] . '_previewer typography-preview" ' . $g_size . '>' . $g_text . '</p>';
            echo '</div>'; // end typography container
        }
    }  //function

    /**
     * Enqueue Function.
     *
     * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
     *
     * @since ReduxFramework 1.0.0
     */
    function enqueue() {

        wp_enqueue_script(
            'redux-field-color-js', ReduxFramework::$_url . 'inc/fields/color/field_color.js',
            array( 'jquery', 'wp-color-picker' ),
            time(),
            true
        );

        wp_enqueue_style(
            'redux-field-color-css',
            ReduxFramework::$_url . 'inc/fields/color/field_color.css',
            time(),
            true
        );

        wp_enqueue_script(
            'redux-field-typography-js', ReduxFramework::$_url . 'inc/fields/typography/field_typography.js',
            array( 'jquery', 'wp-color-picker', 'redux-field-color-js', 'select2-js' ),
            time(),
            true
        );

        wp_enqueue_style(
            'redux-field-typography-css',
            ReduxFramework::$_url . 'inc/fields/typography/field_typography.css',
            time(),
            true
        );
    }  //function

    /**
     * makeGoogleWebfontLink Function.
     *
     * Creates the google fonts link.
     *
     * @since ReduxFramework 3.0.0
     */
    function makeGoogleWebfontLink($fonts) {
        $link       = "";
        $subsets    = array();

        foreach ($fonts as $family => $font) {
            if (!empty($link)) {
                $link.= "%7C"; // Append a new font to the string
            }
            $link.= $family;

            if (!empty($font['font-style'])) {
                $link.= ':';
                if (!empty($font['all-styles'])) {
                    $link.= implode(',', $font['all-styles']);
                } else if (!empty($font['font-style'])) {
                    $link.= implode(',', $font['font-style']);
                }
            }

            if (!empty($font['subset'])) {
                foreach ($font['subset'] as $subset) {
                    if (!in_array($subset, $subsets)) {
                        array_push($subsets, $subset);
                    }
                }
            }
        }

        if (!empty($subsets)) {
            $link.= "&amp;subset=" . implode(',', $subsets);
        }

        return '//fonts.googleapis.com/css?family=' . str_replace( '|','%7C', $link );
    }

    /**
     * makeGoogleWebfontString Function.
     *
     * Creates the google fonts link.
     *
     * @since ReduxFramework 3.1.8
     */
    function makeGoogleWebfontString($fonts) {
        $link       = "";
        $subsets    = array();

        foreach ($fonts as $family => $font) {
            if (!empty($link)) {
                $link.= "', '"; // Append a new font to the string
            }
            $link.= $family;

            if (!empty($font['font-style'])) {
                $link.= ':';
                if (!empty($font['all-styles'])) {
                    $link.= implode(',', $font['all-styles']);
                } else if (!empty($font['font-style'])) {
                    $link.= implode(',', $font['font-style']);
                }
            }

            if (!empty($font['subset'])) {
                foreach ($font['subset'] as $subset) {
                    if (!in_array($subset, $subsets)) {
                        array_push($subsets, $subset);
                    }
                }
            }
        }

        if (!empty($subsets)) {
            $link.= "&amp;subset=" . implode(',', $subsets);
        }

        return "'" . $link . "'";
    }

    function output() {
        $font = $this->value;
        
        // Check for font-backup.  If it's set, stick it on a variabhle for
        // later use.
        if (!empty($font['font-family']) && !empty($font['font-backup'])) {
            $font['font-family'] = str_replace(', ' . $font['font-backup'], '', $font['font-family']);
            $fontBackup = ',' . $font['font-backup'];
        }

        $style = '';
        if (!empty($font)) {
            foreach ($font as $key => $value) {
                if ($key == 'font-options') {
                    continue;
                }
                // Check for font-family key
                if ('font-family' == $key) {
                    
                    // Ensure fontBackup isn't empty (we already option
                    // checked this earlier.  No need to do it again.
                    if (!empty($fontBackup)) {
                        
                        // Apply the backup font to the font-family element
                        // via the saved variable.  We do this here so it
                        // doesn't get appended to the Google stuff below.
                        $value.= $fontBackup;
                    }
                }

                if (empty($value) && in_array($key, array(
                            'font-weight',
                            'font-style'
                        ))) {
                    $value = "normal";
                }

                if ($key == "google" || $key == "subsets" || $key == "font-backup" || empty($value)) {
                    continue;
                }
                $style.= $key . ':' . $value . ';';
            }
            if ( isset( $this->parent->args['async_typography'] ) && $this->parent->args['async_typography'] ) {
                $style .= 'visibility: hidden;';
            }
        }

        if (!empty($style)) {
            if (!empty($this->field['output']) && is_array($this->field['output'])) {
                $keys = implode(",", $this->field['output']);
                $this->parent->outputCSS.= $keys . "{" . $style . '}';
            }

            if (!empty($this->field['compiler']) && is_array($this->field['compiler'])) {
                $keys = implode(",", $this->field['compiler']);
                $this->parent->compilerCSS.= $keys . "{" . $style . '}';
            }
        }
        // Google only stuff!
        if (!empty($this->parent->args['google_api_key']) && !empty($font['font-family']) && !empty($this->field['google']) && filter_var($this->field['google'], FILTER_VALIDATE_BOOLEAN)) {
            
            // Added standard font matching check to avoid output to Google fonts call - kp
            // If no custom font array was supplied, the load it with default
            // standard fonts.
            if (empty($this->field['fonts'])) {
                $this->field['fonts'] = $this->std_fonts;
            }

            // Ensure the fonts array is NOT empty
            if (!empty($this->field['fonts'])) {

                //Make the font keys in the array lowercase, for case-insensitive matching
                $lcFonts = array_change_key_case($this->field['fonts']);

                // Rebuild font array with all keys stripped of spaces
                $arr = array();
                foreach ($lcFonts as $key => $value) {
                    $key = str_replace(', ', ',', $key);
                    $arr[$key] = $value;
                }
                $lcFonts = $arr;
                unset($arr);

                // lowercase chosen font for matching purposes
                $lcFont = strtolower($font['font-family']);

                // Remove spaces after commas in chosen font for mathcing purposes.
                $lcFont = str_replace(', ', ',', $lcFont);

                // If the lower cased passed font-family is NOT found in the standard font array
                // Then it's a Google font, so process it for output.
                if (!array_key_exists($lcFont, $lcFonts)) {
                    $family = $font['font-family'];

                    // Strip out spaces in font names and replace with with plus signs
                    // TODO?: This method doesn't respect spaces after commas, hence the reason
                    // for the std_font array keys having no spaces after commas.  This could be
                    // fixed with RegEx in the future.
                    $font['font-family'] = str_replace(' ', '+', $font['font-family']);

                    // Push data to parent typography variable.
                    if (empty($this->parent->typography[$font['font-family']])) {
                        $this->parent->typography[$font['font-family']] = array();
                    }

                    if (isset($this->field['all_styles'])) {
                        if (!isset($font['font-options']) || empty($font['font-options'])) {
                            $this->getGoogleArray();

                            if (isset($this->parent->googleArray) && !empty($this->parent->googleArray) && isset($this->parent->googleArray[$family])) {
                                $font['font-options'] = $this->parent->googleArray[$family];
                            }
                        } else {
                            $font['font-options'] = json_decode($font['font-options'], true);
                        }
                    }

                    if (isset($font['font-options']) && !empty($font['font-options']) && isset($this->field['all_styles']) && filter_var($this->field['all_styles'], FILTER_VALIDATE_BOOLEAN)) {
                        if (isset($font['font-options']) && !empty($font['font-options']['variants'])) {
                            if (!isset($this->parent->typography[$font['font-family']]['all-styles']) || empty($this->parent->typography[$font['font-family']]['all-styles'])) {
                                $this->parent->typography[$font['font-family']]['all-styles'] = array();
                                foreach ($font['font-options']['variants'] as $variant) {
                                    $this->parent->typography[$font['font-family']]['all-styles'][] = $variant['id'];
                                }
                            }
                        }
                    }

                    if (!empty($font['font-weight'])) {
                        if (empty($this->parent->typography[$font['font-family']]['font-weight']) || !in_array($font['font-weight'], $this->parent->typography[$font['font-family']]['font-weight'])) {
                            $style = $font['font-weight'];
                        }

                        if (!empty($font['font-style'])) {
                            $style.= $font['font-style'];
                        }

                        if (empty($this->parent->typography[$font['font-family']]['font-style']) || !in_array($style, $this->parent->typography[$font['font-family']]['font-style'])) {
                            $this->parent->typography[$font['font-family']]['font-style'][] = $style;
                        }
                    }

                    if (!empty($font['subsets'])) {
                        if (empty($this->parent->typography[$font['font-family']]['subset']) || !in_array($font['subsets'], $this->parent->typography[$font['font-family']]['subset'])) {
                            $this->parent->typography[$font['font-family']]['subset'][] = $font['subsets'];
                        }
                    }
                } // !array_key_exists
            } //!empty fonts array
        } // Typography not set
        //print_r($this->parent->typography);
    }

    /**
     *
     *   Construct the google array from the stored JSON/HTML
     *
     */
    function getGoogleArray() {
        global $wp_filesystem;

        if (isset($this->parent->fonts['google']) && !empty($this->parent->fonts['google'])) {
            return;
        }

        if (isset($this->field['update_weekly']) && $this->field['update_weekly'] === true && $this->field['google'] === true && !empty($this->parent->args['google_api_key'])) {
            if (file_exists($this->google_html)) {
                
                // Keep the fonts updated weekly
                $weekback = strtotime(date('jS F Y', time() + (60 * 60 * 24 * -7)));
                $last_updated = filemtime($this->google_html);
                if ($last_updated < $weekback) {
                    unlink($this->google_html);
                    unlink($this->google_json);
                }
            }
        }

        // Initialize the Wordpress filesystem, no more using file_put_contents function
        if (empty($wp_filesystem)) {
            require_once (ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }
        if (!file_exists($this->google_json)) {
            $result = wp_remote_get(apply_filters('redux-google-fonts-api-url', 'https://www.googleapis.com/webfonts/v1/webfonts?key=') . $this->parent->args['google_api_key'], array('sslverify' => false));

            if (!is_wp_error($result) && $result['response']['code'] == 200) {
                $result = json_decode($result['body']);
                foreach ($result->items as $font) {
                    $this->parent->googleArray[$font->family] = array(
                        'variants' => $this->getVariants($font->variants),
                        'subsets' => $this->getSubsets($font->subsets)
                    );
                }

                if (!empty($this->parent->googleArray)) {
                    $wp_filesystem->put_contents($this->google_json, json_encode($this->parent->googleArray), FS_CHMOD_FILE
                            // predefined mode settings for WP files
                    );
                }
            } //if
        }

        if (!isset($this->parent->fonts['google']) || empty($this->parent->fonts['google'])) {
            
        //     try{
        //         $fonts = json_decode($wp_filesystem->get_contents($this->google_json), true);
        //     }catch (Exception $e) {
        //         echo 'Caught exception: ',  $e->getMessage(), "\n";
        //     }



            


        //     // Fallback if file_get_contents won't work for wordpress. MEDIATEMPLE
        //     if (empty($fonts)) {
        //         $fonts = Redux_Helpers::curlRead($this->google_json);
        //     }
           
        // print_r($fonts);

            $fonts = json_encode('{"last_tab":"","favicon":{"url":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/favicon.jpg","id":"181","height":"16","width":"16","thumbnail":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/favicon.jpg"},"login-logo":{"url":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/Spikes-K9-Fund-Logo.png","id":"46","height":"525","width":"525","thumbnail":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/Spikes-K9-Fund-Logo.png"},"enable-custom-wplogin":"0","enable-animation-effects":"1","enable-back-to-top":"1","extra-menus":"1","extra-menus-number":"1","tracking-code":"","custom-html":"                                    ","custom-css":"                                    ","custom-js":"                                    ","blog-social":"0","blog-facebook-sharing":"1","blog-twitter-sharing":"1","blog-pinterest-sharing":"1","accent-color":"#ae0107","menu_bg_gradient":"#FFFFFF","menu_first_level_link_color":"#888888","menu_first_level_link_color_hover":"#ae0107","menu_dropdown_wrapper_gradient":"#252728","menu_dropdown_link_color":"#cccccc","menu_dropdown_link_bg":"#252728","menu_dropdown_link_border_color":"#2f2f2f","menu_dropdown_link_color_hover":"#ae0107","menu_dropdown_link_bg_hover":"#222222","menu_dropdown_plain_text_color":"#ffffff","body-typo-color":"#818B92","body-typo-background":"#F7F7F7","heading-typo-color":"#2D3C48","back-top-background":"#171717","back-top-color":"#FFFFFF","footer-widget-background":"#222222","footer-widget-heading-color":"#777777","footer-widget-font-color":"#777777","copyright-background":"#1c1c1c","copyright-font-color":"#FFFFFF","enable-custom-fonts":"0","menu_first_level_link_font":{"font-family":"Arial, Helvetica, sans-serif","font-options":"{\"400\":\"Normal+400\",\"700\":\"Bold+700\",\"400italic\":\"Normal+400+Italic\",\"700italic\":\"Bold+700+Italic\"}","google":"false","font-weight":"400","font-style":"","font-size":"14px"},"menu_dropdown_link_font":{"font-family":"","font-options":"","google":"1","font-weight":"400","font-style":"","font-size":"12px"},"body-font":{"font-family":"Arial, Helvetica, sans-serif","font-options":"{\"400\":\"Normal+400\",\"700\":\"Bold+700\",\"400italic\":\"Normal+400+Italic\",\"700italic\":\"Bold+700+Italic\"}","google":"false","font-weight":"","font-style":"","subsets":"","text-align":"justify","font-size":"16px","line-height":"24px"},"pageheader-font":{"font-family":"","font-options":"{","google":"1","font-weight":"700","font-style":"","subsets":"","text-align":"","font-size":"42px","line-height":"54px","letter-spacing":"0px"},"pagecaption-font":{"font-family":"Arial, Helvetica, sans-serif","font-options":"{\"400\":\"Normal+400\",\"700\":\"Bold+700\",\"400italic\":\"Normal+400+Italic\",\"700italic\":\"Bold+700+Italic\"}","google":"false","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"28px","line-height":"39px","letter-spacing":"0px"},"heading1-font":{"font-family":"Arial, Helvetica, sans-serif","font-options":"{\"400\":\"Normal+400\",\"700\":\"Bold+700\",\"400italic\":\"Normal+400+Italic\",\"700italic\":\"Bold+700+Italic\"}","google":"false","font-weight":"700","font-style":"","subsets":"","text-align":"","font-size":"32px","line-height":"48px","letter-spacing":"0px"},"heading2-font":{"font-family":"Arial, Helvetica, sans-serif","font-options":"{\"400\":\"Normal+400\",\"700\":\"Bold+700\",\"400italic\":\"Normal+400+Italic\",\"700italic\":\"Bold+700+Italic\"}","google":"false","font-weight":"700","font-style":"","subsets":"","text-align":"","font-size":"36px","line-height":"34px","letter-spacing":"0px"},"heading3-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"24px","line-height":"36px","letter-spacing":"-1px"},"heading4-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"20px","line-height":"30px","letter-spacing":"-1px"},"heading5-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"18px","line-height":"27px","letter-spacing":"-1px"},"heading6-font":{"font-family":"","font-options":"","google":"1","font-weight":"","font-style":"","subsets":"","text-align":"","font-size":"16px","line-height":"24px","letter-spacing":"-1px"},"enable-boxed-layout":"0","boxed-background-color":"","boxed-background-image":{"url":"","id":"","height":"","width":"","thumbnail":""},"boxed-background-repeat":"no-repeat","boxed-background-position":"left top","boxed-background-attachment":"scroll","boxed-background-cover":"1","logo_include_component":"1","search_include_component":"1","login_include_component":"1","buddypress_include_component":"0","woocart_include_component":"0","wpml_include_component":"0","side_menu_include_component":"0","primary_style":"flat","first_level_button_height":"30","dropdowns_animation":"anim_1","first_level_item_align":"right","first_level_icons_position":"left","first_level_separator":"none","first_level_item_height":"52","first_level_item_height_sticky":"52","menu_fullwidth_container":"1","sticky_menu":"1","sticky_offset":"340","corners_rounding":"0","menu_first_level_icon_font":"15","menu_dropdown_icon_font":"16","mobile_minimized":"1","mobile_label":"","logo_src":{"url":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/Spikes-K9-Fund-Logo.png","id":"46","height":"525","width":"525","thumbnail":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/Spikes-K9-Fund-Logo.png"},"logo_src_alt":{"url":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/Spikes-K9-Fund-Logo-Text-Only.png","id":"45","height":"150","width":"900","thumbnail":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/Spikes-K9-Fund-Logo-Text-Only.png"},"logo_src_mobile":{"url":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/Spikes-K9-Fund-Logo-Text-Only.png","id":"45","height":"150","width":"900","thumbnail":"http:\/\/spikesk9.carmancreative.com\/wp-content\/uploads\/2015\/03\/Spikes-K9-Fund-Logo-Text-Only.png"},"logo_height":"100","responsive_styles":"1","responsive_resolution":"1024px","number_of_widgets":"1","language_direction":"ltr","footer-widget-columns":"3","enable-footer-social-area":"0","footer-infinitegrids-signature-text":"1","footer-copyright-text":"Powered by Infinite Grids.","enable-comment-knowledgebase-area":"0","kb-index":"","knowledgebase_rewrite_slug":"","enable-comment-portfolio-area":"0","portfolio-index":"","portfolio_rewrite_slug":"","enable-comment-team-area":"0","team-index":"","team_rewrite_slug":"","blog-index":"","blog_type":"standard-blog","blog_sidebar_layout":"right_side","masonry_layout":"3","blog_post_sidebar_layout":"right_side","404-img":{"url":"","id":"","height":"","width":"","thumbnail":""},"404-color-overlay":"#ffffff","404-opacity-overlay":"0.5","404-title":"","404-caption":"","404-text-header-align":"textaligncenter","title-marker":"","zoom-level":"","center-lat":"","center-lng":"","marker-img":{"url":"","id":"","height":"","width":"","thumbnail":""},"map-info":"","aim-url":"","aim_alt-url":"","amazon-url":"","app_store-url":"","apple-url":"","arto-url":"","aws-url":"","baidu-url":"","basecamp-url":"","bebo-url":"","behance-url":"","bing-url":"","blip-url":"","blogger-url":"","bnter-url":"","brightkite-url":"","cinch-url":"","cloudapp-url":"","coroflot-url":"","creative_commons-url":"","dailybooth-url":"","delicious-url":"","designbump-url":"","designfloat-url":"","designmoo-url":"","deviantart-url":"","digg-url":"","digg_alt-url":"","diigo-url":"","dribbble-url":"","dropbox-url":"","drupal-url":"","dzone-url":"","ebay-url":"","ember-url":"","etsy-url":"","evernote-url":"","facebook11-url":"","facebook_alt-url":"","facebook_places-url":"","facto-me-url":"","feedburner-url":"","flickr-url":"","folkd-url":"","formspring-url":"","forrst-url":"","foursquare-url":"","friendfeed-url":"","friendster-url":"","gdgt-url":"","github-url":"","github_alt-url":"","goodreads-url":"","google-url":"","google_buzz-url":"","google_talk-url":"","googleplus2-url":"","gowalla-url":"","gowalla_alt-url":"","grooveshark-url":"","hacker_news-url":"","hi5-url":"","hype_machine-url":"","hyves-url":"","icq-url":"","identi-ca-url":"","instagram-url":"","instapaper-url":"","itunes-url":"","kik-url":"","krop-url":"","last-fm-url":"","linkedin-url":"","linkedin_alt-url":"","livejournal-url":"","lovedsgn-url":"","meetup-url":"","metacafe-url":"","ming-url":"","mister_wong-url":"","mixx-url":"","mixx_alt-url":"","mobileme-url":"","msn_messenger-url":"","myspace-url":"","myspace_alt-url":"","newsvine-url":"","official-fm-url":"","openid-url":"","orkut-url":"","pandora-url":"","path-url":"","paypal-url":"","photobucket-url":"","picasa-url":"","pinboard-in-url":"","ping-url":"","pingchat-url":"","pinterest-url":"","playstation-url":"","plixi-url":"","plurk-url":"","podcast-url":"","posterous-url":"","qik-url":"","quik-url":"","quora-url":"","rdio-url":"","readernaut-url":"","reddit-url":"","retweet-url":"","robo-to-url":"","rss-url":"","scribd-url":"","sharethis-url":"","simplenote-url":"","skype-url":"","slashdot-url":"","slideshare-url":"","smugmug-url":"","soundcloud-url":"","spotify-url":"","squarespace-url":"","squidoo-url":"","steam-url":"","stumbleupon-url":"","technorati-url":"","threewords-me-url":"","tribe-net-url":"","tripit-url":"","tumblr-url":"","twitter-url":"","twitter_alt-url":"","vcard-url":"","viddler-url":"","vimeo-url":"","virb-url":"","w3-url":"","whatsapp-url":"","wikipedia-url":"","windows-url":"","wists-url":"","wordpress-url":"","wordpress_alt-url":"","xing-url":"","yahoo-url":"","yahoo-buzz-url":"","yahoo-messenger-url":"","yelp-url":"","youtube-url":"","youtube_alt-url":"","zerply-url":"","zootool-url":"","zynga-url":"","enable-cart":"0","main_shop_layout":"no-sidebar","single_product_layout":"no-sidebar","woo_social":"0","woo-facebook-sharing":"0","woo-twitter-sharing":"0","woo-pinterest-sharing":"0","enable-woo-header-options":"0","check-woo-header-text-settings":"0","bg-woo-header":{"url":"","id":"","height":"","width":"","thumbnail":""},"bg-woo-header-height":"100","bg-woo-header-overlay":"0","bg-woo-header-opacity":"0.7","bg-woo-header-color":"#26accb","bg-woo-header-attachment":"fixed","title-woo-header":"Shop","caption-woo-header":"Sell Anything. Beautifully.","text-woo-header-align":"textalignleft","text-woo-header-color":"","slide-woo-header":"","addon_extra_post_types":0,"addon_knowledgebase":1,"addon_portfolio":1,"addon_team":1,"redux-backup":"1"}');

            if (isset($fonts) && !empty($fonts) && is_array($fonts) && $fonts != false) {
                $this->parent->fonts['google'] = $fonts;
                $this->parent->googleArray = $fonts;
                $this->parent->font_groups['google'] = array(
                    'id'        => 'google',
                    'text'      => __('Google Webfonts', 'redux-framework'),
                    'children'  => array(),
                );
                
                foreach ($this->parent->fonts['google'] as $font => $extra) {
                    $this->parent->font_groups['google']['children'][] = array(
                        'id'    => $font,
                        'text'  => $font
                    );
                }
            }
        }
    }

    /**
     * getGoogleFonts Function.
     *
     * Used to retrieve Google Web Fonts from their API
     *
     * @since ReduxFramework 0.2.0
     */
    function getGoogleFonts() {
        global $wp_filesystem;

        $this->getGoogleArray();

        if (!isset($this->parent->fonts['google']) || empty($this->parent->fonts['google'])) {
            return;
        }


        $gfonts = '<optgroup label="' . __('Google Webfonts', 'redux-framework') . '">';
        foreach ($this->parent->fonts['google'] as $i => $face) {
            $gfonts.= '<option data-google="true" value="' . $i . '">' . $i . '</option>';
        }

        $gfonts.= '</optgroup>';

        if (empty($this->parent->fonts['google'])) {
            $gfonts = "";
        }

        $wp_filesystem->put_contents($this->google_html, $gfonts, FS_CHMOD_FILE
                // predefined mode settings for WP files
        );
    }  //function

    /**
     * getGoogleFonts Function.
     *
     * Clean up the Google Webfonts subsets to be human readable
     *
     * @since ReduxFramework 0.2.0
     */
    function getSubsets($var) {
        $result = array();

        foreach ($var as $v) {
            if (strpos($v, "-ext")) {
                $name = ucfirst(str_replace("-ext", " Extended", $v));
            } else {
                $name = ucfirst($v);
            }

            array_push($result, array(
                'id'    => $v,
                'name'  => $name
            ));
        }
        return array_filter($result);
    }  //function

    /**
     * getGoogleFonts Function.
     *
     * Clean up the Google Webfonts variants to be human readable
     *
     * @since ReduxFramework 0.2.0
     */
    function getVariants($var) {
        $result = array();
        $italic = array();

        foreach ($var as $v) {
            $name = "";
            if ($v[0] == 1) {
                $name = 'Ultra-Light 100';
            } else if ($v[0] == 2) {
                $name = 'Light 200';
            } else if ($v[0] == 3) {
                $name = 'Book 300';
            } else if ($v[0] == 4 || $v[0] == "r" || $v[0] == "i") {
                $name = 'Normal 400';
            } else if ($v[0] == 5) {
                $name = 'Medium 500';
            } else if ($v[0] == 6) {
                $name = 'Semi-Bold 600';
            } else if ($v[0] == 7) {
                $name = 'Bold 700';
            } else if ($v[0] == 8) {
                $name = 'Extra-Bold 800';
            } else if ($v[0] == 9) {
                $name = 'Ultra-Bold 900';
            }

            if ($v == "regular") {
                $v = "400";
            }

            if (strpos($v, "italic") || $v == "italic") {
                $name.= " Italic";
                $name = trim($name);
                if ($v == "italic") {
                    $v = "400italic";
                }
                $italic[] = array(
                    'id'    => $v,
                    'name'  => $name
                );
            } else {
                $result[] = array(
                    'id'    => $v,
                    'name'  => $name
                );
            }
        }

        foreach ($italic as $item) {
            $result[] = $item;
        }

        return array_filter($result);
    }  //function
}  //class
