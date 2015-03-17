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

            $fonts = json_decode('{"ABeeZee":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Abel":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Abril Fatface":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Aclonica":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Acme":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Actor":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Adamina":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Advent Pro":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"}]},"Aguafina Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Akronim":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Aladin":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Aldrich":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alef":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alegreya":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Alegreya SC":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Alegreya Sans":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"},{"id":"100italic","name":"Ultra-Light 100 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"500italic","name":"Medium 500 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"800italic","name":"Extra-Bold 800 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"vietnamese","name":"Vietnamese"}]},"Alegreya Sans SC":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"},{"id":"100italic","name":"Ultra-Light 100 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"500italic","name":"Medium 500 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"800italic","name":"Extra-Bold 800 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"vietnamese","name":"Vietnamese"}]},"Alex Brush":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Alfa Slab One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alice":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alike":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alike Angular":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Allan":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Allerta":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Allerta Stencil":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Allura":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Almendra":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Almendra Display":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Almendra SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Amarante":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Amaranth":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Amatic SC":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Amethysta":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Anaheim":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Andada":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Andika":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Angkor":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Annie Use Your Telescope":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Anonymous Pro":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Antic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Antic Didone":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Antic Slab":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Anton":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Arapey":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Arbutus":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Arbutus Slab":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Architects Daughter":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Archivo Black":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Archivo Narrow":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Arimo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Arizonia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Armata":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Artifika":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Arvo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Asap":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Asset":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Astloch":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Asul":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Atomic Age":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Aubrey":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Audiowide":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Autour One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Average":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Average Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Averia Gruesa Libre":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Averia Libre":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Averia Sans Libre":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Averia Serif Libre":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bad Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Balthazar":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bangers":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Basic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Battambang":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Baumans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bayon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Belgrano":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Belleza":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"BenchNine":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Bentham":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Berkshire Swash":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Bevan":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bigelow Rules":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Bigshot One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bilbo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Bilbo Swash Caps":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Bitter":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Black Ops One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Bokor":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Bonbon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Boogaloo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bowlby One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bowlby One SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Brawler":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bree Serif":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Bubblegum Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Bubbler One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Buda":{"variants":[{"id":"300","name":"Book 300"}],"subsets":[{"id":"latin","name":"Latin"}]},"Buenard":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Butcherman":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Butterfly Kids":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Cabin":{"variants":[{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"500italic","name":"Medium 500 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cabin Condensed":{"variants":[{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cabin Sketch":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Caesar Dressing":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cagliostro":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Calligraffitti":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cambo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Candal":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cantarell":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cantata One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Cantora One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Capriola":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Cardo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"}]},"Carme":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Carrois Gothic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Carrois Gothic SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Carter One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Caudex":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"}]},"Cedarville Cursive":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Ceviche One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Changa One":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Chango":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Chau Philomene One":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Chela One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Chelsea Market":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Chenla":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Cherry Cream Soda":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cherry Swash":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Chewy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Chicle":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Chivo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"900","name":"Ultra-Bold 900"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cinzel":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cinzel Decorative":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Clicker Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Coda":{"variants":[{"id":"400","name":"Normal 400"},{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin","name":"Latin"}]},"Coda Caption":{"variants":[{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin","name":"Latin"}]},"Codystar":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Combo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Comfortaa":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Coming Soon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Concert One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Condiment":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Content":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Contrail One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Convergence":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cookie":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Copse":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Corben":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Courgette":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Cousine":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Coustard":{"variants":[{"id":"400","name":"Normal 400"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Covered By Your Grace":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Crafty Girls":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Creepster":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Crete Round":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Crimson Text":{"variants":[{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Croissant One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Crushed":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cuprum":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Cutive":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Cutive Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Damion":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Dancing Script":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Dangrek":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Dawning of a New Day":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Days One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Delius":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Delius Swash Caps":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Delius Unicase":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Della Respira":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Denk One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Devonshire":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Didact Gothic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Diplomata":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Diplomata SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Domine":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Donegal One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Doppio One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Dorsa":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Dosis":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Dr Sugiyama":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Droid Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Droid Sans Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Droid Serif":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Duru Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Dynalight":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"EB Garamond":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Eagle Lake":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Eater":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Economica":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Electrolize":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Elsie":{"variants":[{"id":"400","name":"Normal 400"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Elsie Swash Caps":{"variants":[{"id":"400","name":"Normal 400"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Emblema One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Emilys Candy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Engagement":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Englebert":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Enriqueta":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Erica One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Esteban":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Euphoria Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ewert":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Exo":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"},{"id":"100italic","name":"Ultra-Light 100 Italic"},{"id":"200italic","name":"Light 200 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"500italic","name":"Medium 500 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"800italic","name":"Extra-Bold 800 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Exo 2":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"},{"id":"100italic","name":"Ultra-Light 100 Italic"},{"id":"200italic","name":"Light 200 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"500italic","name":"Medium 500 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"800italic","name":"Extra-Bold 800 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Expletus Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"500italic","name":"Medium 500 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fanwood Text":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fascinate":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fascinate Inline":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Faster One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fasthand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Fauna One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Federant":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Federo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Felipa":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Fenix":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Finger Paint":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fjalla One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Fjord One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Flamenco":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Flavors":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fondamento":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Fontdiner Swanky":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Forum":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Francois One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Freckle Face":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Fredericka the Great":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fredoka One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Freehand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Fresca":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Frijole":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fruktur":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Fugaz One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"GFS Didot":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"greek","name":"Greek"}]},"GFS Neohellenic":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"greek","name":"Greek"}]},"Gabriela":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Gafata":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Galdeano":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Galindo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Gentium Basic":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Gentium Book Basic":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Geo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Geostar":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Geostar Fill":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Germania One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Gilda Display":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Give You Glory":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Glass Antiqua":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Glegoo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Gloria Hallelujah":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Goblin One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Gochi Hand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Gorditas":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Goudy Bookletter 1911":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Graduate":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Grand Hotel":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Gravitas One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Great Vibes":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Griffy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Gruppo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Gudea":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Habibi":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Hammersmith One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Hanalei":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Hanalei Fill":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Handlee":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Hanuman":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Happy Monkey":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Headland One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Henny Penny":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Herr Von Muellerhoff":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Holtwood One SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Homemade Apple":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Homenaje":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"IM Fell DW Pica":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell DW Pica SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell Double Pica":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell Double Pica SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell English":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell English SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell French Canon":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell French Canon SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell Great Primer":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell Great Primer SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Iceberg":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Iceland":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Imprima":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Inconsolata":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Inder":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Indie Flower":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Inika":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Irish Grover":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Istok Web":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Italiana":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Italianno":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Jacques Francois":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Jacques Francois Shadow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Jim Nightshade":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Jockey One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Jolly Lodger":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Josefin Sans":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"100italic","name":"Ultra-Light 100 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Josefin Slab":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"100italic","name":"Ultra-Light 100 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Joti One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Judson":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Julee":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Julius Sans One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Junge":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Jura":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Just Another Hand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Just Me Again Down Here":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Kameron":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Kantumruy":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Karla":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Kaushan Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Kavoon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Kdam Thmor":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Keania One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Kelly Slab":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Kenia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Khmer":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Kite One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Knewave":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Kotta One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Koulen":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Kranky":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Kreon":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Kristi":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Krona One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"La Belle Aurore":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lancelot":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lato":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"100italic","name":"Ultra-Light 100 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"League Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Leckerli One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Ledger":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Lekton":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Lemon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Libre Baskerville":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Life Savers":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Lilita One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Lily Script One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Limelight":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Linden Hill":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lobster":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Lobster Two":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Londrina Outline":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Londrina Shadow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Londrina Sketch":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Londrina Solid":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lora":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Love Ya Like A Sister":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Loved by the King":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lovers Quarrel":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Luckiest Guy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lusitana":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lustria":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Macondo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Macondo Swash Caps":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Magra":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Maiden Orange":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mako":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Marcellus":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Marcellus SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Marck Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Margarine":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Marko One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Marmelad":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Marvel":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mate":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mate SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Maven Pro":{"variants":[{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"McLaren":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Meddon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"MedievalSharp":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Medula One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Megrim":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Meie Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Merienda":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Merienda One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Merriweather":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Merriweather Sans":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"800italic","name":"Extra-Bold 800 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Metal":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Metal Mania":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Metamorphous":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Metrophobic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Michroma":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Milonga":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Miltonian":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Miltonian Tattoo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Miniver":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Miss Fajardose":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Modern Antiqua":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Molengo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Molle":{"variants":[{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Monda":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Monofett":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Monoton":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Monsieur La Doulaise":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Montaga":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Montez":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Montserrat":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Montserrat Alternates":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Montserrat Subrayada":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Moul":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Moulpali":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Mountains of Christmas":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mouse Memoirs":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Mr Bedfort":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Mr Dafoe":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Mr De Haviland":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Mrs Saint Delafield":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Mrs Sheppards":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Muli":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mystery Quest":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Neucha":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Neuton":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"New Rocker":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"News Cycle":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Niconne":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Nixie One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nobile":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nokora":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Norican":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Nosifer":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Nothing You Could Do":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Noticia Text":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"vietnamese","name":"Vietnamese"}]},"Noto Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"},{"id":"devanagari","name":"Devanagari"}]},"Noto Serif":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Nova Cut":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Flat":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"}]},"Nova Oval":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Round":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Slim":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Square":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Numans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nunito":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Odor Mean Chey":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Offside":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Old Standard TT":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Oldenburg":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Oleo Script":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Oleo Script Swash Caps":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Open Sans":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"800italic","name":"Extra-Bold 800 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"},{"id":"devanagari","name":"Devanagari"}]},"Open Sans Condensed":{"variants":[{"id":"300","name":"Book 300"},{"id":"700","name":"Bold 700"},{"id":"300italic","name":"Book 300 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Oranienbaum":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Orbitron":{"variants":[{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Oregano":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Orienta":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Original Surfer":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Oswald":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Over the Rainbow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Overlock":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Overlock SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ovo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Oxygen":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Oxygen Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"PT Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"PT Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"PT Sans Caption":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"PT Sans Narrow":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"PT Serif":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"PT Serif Caption":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Pacifico":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Paprika":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Parisienne":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Passero One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Passion One":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Pathway Gothic One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Patrick Hand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"vietnamese","name":"Vietnamese"}]},"Patrick Hand SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"vietnamese","name":"Vietnamese"}]},"Patua One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Paytone One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Peralta":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Permanent Marker":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Petit Formal Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Petrona":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Philosopher":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Piedra":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Pinyon Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Pirata One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Plaster":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Play":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Playball":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Playfair Display":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Playfair Display SC":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Podkova":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Poiret One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Poller One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Poly":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Pompiere":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Pontano Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Port Lligat Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Port Lligat Slab":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Prata":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Preahvihear":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Press Start 2P":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"}]},"Princess Sofia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Prociono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Prosto One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Puritan":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Purple Purse":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Quando":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Quantico":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Quattrocento":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Quattrocento Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Questrial":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Quicksand":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Quintessential":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Qwigley":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Racing Sans One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Radley":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Raleway":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Raleway Dots":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Rambla":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Rammetto One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ranchers":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Rancho":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Rationale":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Redressed":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Reenie Beanie":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Revalia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ribeye":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ribeye Marrow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Righteous":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Risque":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Roboto":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"100italic","name":"Ultra-Light 100 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"500italic","name":"Medium 500 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Roboto Condensed":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Roboto Slab":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Rochester":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Rock Salt":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Rokkitt":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Romanesco":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ropa Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Rosario":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Rosarivo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Rouge Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Ruda":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Rufina":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ruge Boogie":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ruluko":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Rum Raisin":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Ruslan Display":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Russo One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Ruthie":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Rye":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sacramento":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sail":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Salsa":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sanchez":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sancreek":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sansita One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sarina":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Satisfy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Scada":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Schoolbell":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Seaweed Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sevillana":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Seymour One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Shadows Into Light":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Shadows Into Light Two":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Shanti":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Share":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Share Tech":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Share Tech Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Shojumaru":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Short Stack":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Siemreap":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Sigmar One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Signika":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Signika Negative":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Simonetta":{"variants":[{"id":"400","name":"Normal 400"},{"id":"900","name":"Ultra-Bold 900"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sintony":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sirin Stencil":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Six Caps":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Skranji":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Slackey":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Smokum":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Smythe":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sniglet":{"variants":[{"id":"400","name":"Normal 400"},{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Snippet":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Snowburst One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sofadi One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sofia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sonsie One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Sorts Mill Goudy":{"variants":[{"id":"400","name":"Normal 400"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Source Code Pro":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Source Sans Pro":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"200italic","name":"Light 200 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"vietnamese","name":"Vietnamese"}]},"Special Elite":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Spicy Rice":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Spinnaker":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Spirax":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Squada One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Stalemate":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Stalinist One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Stardos Stencil":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Stint Ultra Condensed":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Stint Ultra Expanded":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Stoke":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Strait":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sue Ellen Francisco":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sunshiney":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Supermercado One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Suwannaphum":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Swanky and Moo Moo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Syncopate":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Tangerine":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Taprom":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Tauri":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Telex":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Tenor Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Text Me One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"The Girl Next Door":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Tienne":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Tinos":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"vietnamese","name":"Vietnamese"}]},"Titan One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Titillium Web":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"200italic","name":"Light 200 Italic"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"600italic","name":"Semi-Bold 600 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Trade Winds":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Trocchi":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Trochut":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Trykker":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Tulpen One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Ubuntu":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"300italic","name":"Book 300 Italic"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"500italic","name":"Medium 500 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Ubuntu Condensed":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Ubuntu Mono":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"greek","name":"Greek"},{"id":"greek-ext","name":"Greek Extended"},{"id":"cyrillic-ext","name":"Cyrillic Extended"}]},"Ultra":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Uncial Antiqua":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Underdog":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Unica One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"UnifrakturCook":{"variants":[{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"UnifrakturMaguntia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Unkempt":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Unlock":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Unna":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"VT323":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vampiro One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Varela":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Varela Round":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vast Shadow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vibur":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vidaloka":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Viga":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Voces":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Volkhov":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vollkorn":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"400italic","name":"Normal 400 Italic"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Voltaire":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Waiting for the Sunrise":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Wallpoet":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Walter Turncoat":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Warnes":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Wellfleet":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Wendy One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Wire One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Yanone Kaffeesatz":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"}]},"Yellowtail":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Yeseva One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin-ext","name":"Latin Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Yesteryear":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Zeyada":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]}}');


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
