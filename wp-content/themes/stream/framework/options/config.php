<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            //$this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css, $changed_values) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r($changed_values); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'INFINITE_LANGUAGE'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'INFINITE_LANGUAGE'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'INFINITE_LANGUAGE'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'INFINITE_LANGUAGE'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'INFINITE_LANGUAGE'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'INFINITE_LANGUAGE') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'INFINITE_LANGUAGE'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }

            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
		'title' => __('General Settings', 'INFINITE_LANGUAGE'),
		'desc' => __('Welcome to the Stream Theme Options Panel! Control and configure the general setup of your theme.', 'INFINITE_LANGUAGE'),
		'icon' => 'el-icon-cogs',
		'fields' => array(
			array(
				'id'=>'favicon',
				'type' => 'media', 
				'title' => __('Favicon Upload', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.', 'INFINITE_LANGUAGE'),
				'desc'=> ''
			),
			array(
				'id'=>'login-logo',
				'type' => 'media', 
				'title' => __('WP-login Logo Upload', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Upload a 80px x 80px Png/Gif image that will represent your WP-LOGIN website\'s logo.', 'INFINITE_LANGUAGE'),
				'desc'=> ''
			),
			array(
                'id' => 'enable-custom-wplogin',
                'type' => 'switch',
                'title' => __('Do you want Customize your Login?', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable customizations on WP-LOGIN.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
            array(
                'id' => 'enable-animation-effects',
                'type' => 'switch',
                'title' => __('Do you want Animation Effects on mobile devices?', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable animation effects on mobile devices for items.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
            array(
                'id' => 'enable-back-to-top',
                'type' => 'switch',
                'title' => __('Back to Top?', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable Back to Top Feature.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 1
            ),
			array(
                'id' => 'extra-menus',
                'type' => 'switch',
                'title' => __('Do You Want Extra Menus?', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
                'id'            => 'extra-menus-number',
                'type'          => 'slider',
				'required' 		=> array('extra-menus','equals','1'),
                'title'         => __('How many menus?', 'INFINITE_LANGUAGE'),
                'subtitle'      => __('', 'INFINITE_LANGUAGE'),
                'desc'          => __('Enter a number. Min: 1, max: 50, step: 1, default value: 1', 'INFINITE_LANGUAGE'),
                'default'       => 1,
                'min'           => 1,
                'step'          => 1,
                'max'           => 50,
                'display_value' => 'text'
            ),
            array(
				'id'=>'tracking-code',
				'type' => 'textarea',
				'title' => __('Tracking Code', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Paste your Google Analytics (or other) tracking code here.<br/> It will be inserted before the closing head tag of your theme.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id'=>'custom-html',
				'type' => 'ace_editor',
				'title' => __('HTML Code', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Paste your HTML code here.', 'INFINITE_LANGUAGE'),
				'mode' => 'html',
	            'theme' => 'monokai',
				'desc' => '',
	            'default' => ""
				),
			array(
				'id'=>'custom-css',
				'type' => 'ace_editor',
				'title' => __('CSS Code', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Paste your CSS code here.', 'INFINITE_LANGUAGE'),
				'mode' => 'css',
	            'theme' => 'monokai',
				'desc' => '',
	            'default' => ""
				),
			array(
				'id'=>'custom-js',
				'type' => 'ace_editor',
				'title' => __('JS Code', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Paste your JS code here.', 'INFINITE_LANGUAGE'),
				'mode' => 'javascript',
	            'theme' => 'monokai',
				'desc' => '',
	            'default' => ""
				),
			array(
                'id' => 'blog-social',
                'type' => 'switch',
                'title' => __('Social Media Sharing Buttons', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Activate this to enable social sharing buttons on your blog posts / single potfolio / single knowledgebase.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),  
             array(
                'id' => 'blog-facebook-sharing',
                'type' => 'checkbox',
                'title' => __('Facebook', 'INFINITE_LANGUAGE'), 
                'subtitle' => 'Share it.',
                'desc' => '',
                'default' => '1'
            ),
            array(
                'id' => 'blog-twitter-sharing',
                'type' => 'checkbox',
                'title' => __('Twitter', 'INFINITE_LANGUAGE'), 
                'subtitle' => 'Tweet it.',
                'desc' => '',
                'default' => '1'
            ),
            array(
                'id' => 'blog-pinterest-sharing',
                'type' => 'checkbox',
                'title' => __('Pinterest', 'INFINITE_LANGUAGE'), 
                'subtitle' => 'Pin it.',
                'desc' => '',
                'default' => '1'
            )
		)
	);

	
	// Color Options
    $this->sections[] = array(
        'title' => __('Color Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Welcome to the Stream Theme Options Panel! Control and configure the colors of your theme.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-brush',
        'fields' => array(
			// Global Color
            array(
                'id' => 'accent-color',
                'type' => 'color',
                'title' => __('Accent Color', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Change this color to alter the accent color globally for your site. Try one of the six pre-picked colors that are guaranteed to look awesome!', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#24AFD0'
            ),
			array(
				'id'=>'21',
				'type' => 'divide'
				),
			// Custom Header Colors
			array(
                'id' => 'menu_bg_gradient',
                'type' => 'color',
                'title' => __('Menu Background Color Of The Primary Container', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#FFF'
            ),
			array(
                'id' => 'menu_first_level_link_color',
                'type' => 'color',
                'title' => __('Menu Text Color Of The First Level Item', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#888'
            ),
			array(
                'id' => 'menu_first_level_link_color_hover',
                'type' => 'color',
                'title' => __('Menu Text Color Of The Active First Level Item', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#3498db'
            ),
			array(
                'id' => 'menu_dropdown_wrapper_gradient',
                'type' => 'color',
                'title' => __('Background Color Of The Dropdown Elements', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#252728'
            ),
			array(
                'id' => 'menu_dropdown_link_color',
                'type' => 'color',
                'title' => __('Text Color Of The Dropdown Menu Item', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#ccc'
            ),
			array(
                'id' => 'menu_dropdown_link_bg',
                'type' => 'color',
                'title' => __('Background Color Of The Dropdown Menu Item', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#252728'
            ),
			array(
                'id' => 'menu_dropdown_link_border_color',
                'type' => 'color',
                'title' => __('Border Color Between Dropdown Menu Items', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#2f2f2f'
            ),
			array(
                'id' => 'menu_dropdown_link_color_hover',
                'type' => 'color',
                'title' => __('Text Color Of The Dropdown Active Menu Item', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#3498db'
            ),
			array(
                'id' => 'menu_dropdown_link_bg_hover',
                'type' => 'color',
                'title' => __('Background Color Of The Dropdown Active Menu Item', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#222'
            ),
			array(
                'id' => 'menu_dropdown_plain_text_color',
                'type' => 'color',
                'title' => __('Plain Text Color Of The Dropdown', 'INFINITE_LANGUAGE'),
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#fff'
            ),
			array(
				'id'=>'21',
				'type' => 'divide'
				),
			// Custom Typography Colors		
            array(
                'id' => 'body-typo-color',
                'type' => 'color',
                'title' => __('Body Color', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Color for Body.<br/><br/>
                                  <em>(i.e. body, shortcodes etc.)</em>', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#818B92'
            ),
			array(
                'id' => 'body-typo-background',
                'type' => 'color',
                'title' => __('Body Background Color', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Background for Body.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#F7F7F7'
            ),
            array(
                'id' => 'heading-typo-color',
                'type' => 'color',
                'title' => __('Heading Color', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Color for Heading.<br/><br/>
                                  <em>(i.e. headings, shortcodes etc.)</em>', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#2D3C48'
            ),

            // Custom Back to Top Colors
			array(
				'id'=>'21',
				'type' => 'divide'
				),	
            array(
                'id' => 'back-top-background',
                'type' => 'color',
                'title' => __('Back To Top Background', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Background for Back To Top.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#171717'
            ),
            array(
                'id' => 'back-top-color',
                'type' => 'color',
                'title' => __('Back To Top Icon Color', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Color for Icon Back To Top.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#FFFFFF'
            ),

            // Custom Footer Colors
			array(
				'id'=>'21',
				'type' => 'divide'
				),	
            array(
                'id' => 'footer-widget-background',
                'type' => 'color',
                'title' => __('Footer Widget Background', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Background for Footer Widget.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#222222'
            ),
            array(
                'id' => 'footer-widget-heading-color',
                'type' => 'color',
                'title' => __('Footer Widget Heading Font Color', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Heading Font Color for Footer Widget Area.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#777777'
            ),
            array(
                'id' => 'footer-widget-font-color',
                'type' => 'color',
                'title' => __('Footer Widget Font Color', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Font Color for Footer Widget Area.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#777777'
            ),
            array(
                'id' => 'copyright-background',
                'type' => 'color',
                'title' => __('Footer Credits Background', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Background for Footer Credits Area.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#1c1c1c'
            ),
            array(
                'id' => 'copyright-font-color',
                'type' => 'color',
                'title' => __('Footer Credits Font Color', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a Font Color for Footer Credits Area.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#FFFFFF'
            ),
        )
    );

	// Typography Options
	$this->sections[] = array(
		'title' => __('Typography Options', 'INFINITE_LANGUAGE'),
		'desc' => __('Control and configure the typography of your theme.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-font',
		'fields' => array(
			array(
				'id'=>'enable-custom-fonts',
				'type' => 'switch', 
				'title' => __('Use Custom Fonts?', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Do you want enable custom fonts features?', 'INFINITE_LANGUAGE'),
				'desc'=> '',
				'default' => 0
			),
            // Menu Font of the First Level Items
			array(
                'id' => 'menu_first_level_link_font',
                'type' => 'typography',
                'title' => __('Header Menu Font Of The First Level Items', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for logo.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'line-height'=>false,
                'font-style' => false,
				'text-align' => false,
				'subsets' => false,
                'font-weight' => true,
                'letter-spacing' => false,
                'subset' => false,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Source Sans Pro',
                    'font-size' => '14px',
                    'font-weight' => '400'
                ),
            ),
           // Font Of The Dropdown Menu Item
			array(
                'id' => 'menu_dropdown_link_font',
                'type' => 'typography',
                'title' => __('Font Of The Dropdown Menu Item', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for logo.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'line-height'=>false,
                'font-style' => false,
				'text-align' => false,
				'subsets' => false,
                'font-weight' => true,
                'letter-spacing' => false,
                'subset' => false,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Open Sans',
                    'font-size' => '12px',
                    'font-weight' => '400'
                ),
            ),
            // Body
            array(
				'id' => 'body-font',
				'type' => 'typography',
				'title' => __('Body Font', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Select the font for body.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em>', 'INFINITE_LANGUAGE'),
				'compiler' => false,
				'google' => true,
				'font-backup' => false,
				'font-style' => true,
				'font-weight' => true,
				'subset' => true,
                'color' => false,

				'preview' => true,
				'units' => 'px',
				'default' => array(
					'font-family' => 'Muli',
					'font-size' => '14px',
					'font-style' => 'normal',
					'font-weight' => '300',
					'line-height' => '24'
				),
			),
            // Page Header and Caption
			array(
                'id' => 'pageheader-font',
                'type' => 'typography',
                'title' => __('Page Header Font', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for page header.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'font-style' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'subset' => true,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Source Sans Pro',
                    'font-size' => '42px',
                    'font-style' => 'normal',
                    'font-weight' => '600',
                    'line-height' => '54',
                    'letter-spacing' => '-2'
                ),
            ),
            array(
                'id' => 'pagecaption-font',
                'type' => 'typography',  
                'title' => __('Page Header Caption Font', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for page header caption.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'font-style' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'subset' => true,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Source Sans Pro',
                    'font-size' => '28px',
                    'font-style' => 'italic',
                    'font-weight' => '300',
                    'line-height' => '39',
                    'letter-spacing' => '-1'
                ),
            ),
            // Headings 
            array(
				'id' => 'heading1-font',
				'type' => 'typography',
				'title' => __('Heading Font - H1', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Select the font for H1.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
				'compiler' => false,
				'google' => true,
				'font-backup' => false,
				'font-style' => true,
				'font-weight' => true,
                'letter-spacing' => true,
				'subset' => true,
                'color' => false,
				'preview' => true,
				'units' => 'px',
				'default' => array(
					'font-family' => 'Source Sans Pro',
					'font-size' => '32px',
					'font-style' => 'normal',
					'font-weight' => '400',
					'line-height' => '48',
                    'letter-spacing' => '-1'
				),
			),
            array(
                'id' => 'heading2-font',
                'type' => 'typography',
                'title' => __('Heading Font - H2', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for H2.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'font-style' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'subset' => true,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Source Sans Pro',
                    'font-size' => '28px',
                    'font-style' => 'normal',
                    'font-weight' => '400',
                    'line-height' => '42',
                    'letter-spacing' => '-1'
                ),
            ),
            array(
                'id' => 'heading3-font',
                'type' => 'typography', 
                'title' => __('Heading Font - H3', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for H3.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'font-style' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'subset' => true,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Source Sans Pro',
                    'font-size' => '24px',
                    'font-style' => 'normal',
                    'font-weight' => '400',
                    'line-height' => '36',
                    'letter-spacing' => '-1'
                ),
            ),
            array(
                'id' => 'heading4-font',
                'type' => 'typography',
                'title' => __('Heading Font - H4', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for H4.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'font-style' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'subset' => true,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Source Sans Pro',
                    'font-size' => '20px',
                    'font-style' => 'normal',
                    'font-weight' => '400',
                    'line-height' => '30',
                    'letter-spacing' => '-1'
                ),
            ),
            array(
                'id' => 'heading5-font',
                'type' => 'typography',
                'title' => __('Heading Font - H5', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for H5.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'font-style' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'subset' => true,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Source Sans Pro',
                    'font-size' => '18px',
                    'font-style' => 'normal',
                    'font-weight' => '400',
                    'line-height' => '27',
                    'letter-spacing' => '-1'
                ),
            ),
            array(
                'id' => 'heading6-font',
                'type' => 'typography',
                'title' => __('Heading Font - H6', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the font for H6.<br/>
                                  <em>Font Family</em><br/>
                                  <em>Font Weight - Font Style</em><br/>
                                  <em>Subset</em><br/>
                                  <em>Font Size</em><br/>
                                  <em>Line Height</em><br/>
                                  <em>Letter Spacing</em>', 'INFINITE_LANGUAGE'),
                'compiler' => false,
                'google' => true,
                'font-backup' => false,
                'font-style' => true,
                'font-weight' => true,
                'letter-spacing' => true,
                'subset' => true,
                'color' => false,
                'preview' => true,
                'units' => 'px',
                'default' => array(
                    'font-family' => 'Source Sans Pro',
                    'font-size' => '16px',
                    'font-style' => 'normal',
                    'font-weight' => '400',
                    'line-height' => '24',
                    'letter-spacing' => '-1'
                ),
            )
		)
	);
	
	// Boxed Layout Options
	$this->sections[] = array(
		'title' => __('Boxed Layout Options', 'INFINITE_LANGUAGE'),
		'desc' => __('Control and configure the general setup of your boxed layout.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-website',
		'fields' => array(
			array(
				'id' => 'enable-boxed-layout',
				'type' => 'switch',
				'title' => __('Enable Boxed Layout?', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Do you enable boxed layout?', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'default' => 0
			),
			array(
				'id'=>'boxed-background-color',
				'type' => 'color', 				
				'title' => __('Background Color', 'INFINITE_LANGUAGE'),
				'subtitle'=> __('If you would rather simply use a solid color for your background, select one here.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'default' => ''
			),
			array(
                'id' => 'boxed-background-image',
                'type' => 'media',	
                'title' => __('Background Image', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Upload your background here. You can find sample elements here:<br/><br/>
                                  <em>/includes/img/sample_bg_images/</em><br/>
                                  <em>/includes/img/sample_patterns/</em>', 'INFINITE_LANGUAGE'),
                'desc' => ''
            ),
            array(
                'id' => 'boxed-background-repeat',
                'type' => 'select',
                'title' => __('Background Repeat', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Do you want your background to repeat? (Turn on when using patterns)', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'options' => array(
                	'no-repeat'=>'No-Repeat', 
                	'repeat'=>'Repeat'
                ),
				'default' => 'no-repeat'
            ),
            array(
                'id' => 'boxed-background-position', 
                'type' => 'select',
                'title' => __('Background Position', 'INFINITE_LANGUAGE'),
                'subtitle' => __('How would you like your background image to be aligned?', 'INFINITE_LANGUAGE'),
                'options' => array(
                     'left top' => 'Left Top',
                     'left center' => 'Left Center',
                     'left bottom' => 'Left Bottom',
                     'center top' => 'Center Top',
                     'center center' => 'Center Center',
                     'center bottom' => 'Center Bottom',
                     'right top' => 'Right Top',
                     'right center' => 'Right Center',
                     'right bottom' => 'Right Bottom'
                ),
                'default' => 'left top'
            ),
            array(
                'id' => 'boxed-background-attachment', 
                'type' => 'select',
                'title' => __('Background Attachment', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Would you prefer your background to scroll with your site or be fixed and not move', 'INFINITE_LANGUAGE'),

                'options' => array(
                    'scroll' => 'Scroll',
                    'fixed' => 'Fixed'
                ),
                'default' => 'scroll'
            ),
			array(
                'id' => 'boxed-background-cover',
                'type' => 'switch',
                'title' => __('Auto resize background image to fit window?', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('This will ensure your background image always fits no matter what size screen the user has. (Don\'t use with patterns)', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
		)
	);
	
	// Header Options
	$this->sections[] = array(
        'title' => __('Header Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure the general setup of your header.', 'INFINITE_LANGUAGE'),
		'icon' => 'el-icon-lines',
		'fields' => array(
			array(
                'id' => 'logo_include_component',
                'type' => 'switch',
                'title' => __('Company Logo (on left side)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable customizations on Menu.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 1
            ),
			array(
                'id' => 'search_include_component',
                'type' => 'switch',
                'title' => __('Search overlay (on right side)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable customizations on Menu.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 1
            ),
			array(
                'id' => 'login_include_component',
                'type' => 'switch',
                'title' => __('Login overlay (on right side)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable customizations on Menu.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 1
            ),
			array(
                'id' => 'buddypress_include_component',
                'type' => 'switch',
                'title' => __('BuddyPress Bar (on right side)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable customizations on Menu.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
                'id' => 'woocart_include_component',
                'type' => 'switch',
                'title' => __('WooCart (on right side)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable customizations on Menu.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
                'id' => 'wpml_include_component',
                'type' => 'switch',
                'title' => __('WPML switcher (on right side)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable customizations on Menu.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
                'id' => 'side_menu_include_component',
                'type' => 'switch',
                'title' => __('Side Menu (on right side)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable customizations on Menu.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
                'id' => 'primary_style', 
                'type' => 'select',
                'title' => __('Primary Style', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the button style that fits the style of your site.', 'INFINITE_LANGUAGE'),
                'options' => array(
                     'flat' => 'Flat',
                     'buttons' => 'Buttons'
                ),
                'default' => 'flat'
            ),
			array(
				'id' => 'first_level_button_height',
				'type' => 'slider',
				'required' => array('primary_style','equals','buttons'),
				'title' => __('Buttons Height', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Only for "Buttons" style. Specify here height of the first level buttons.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 30 - 100px.', 'INFINITE_LANGUAGE'),
				"default" => 30,
				"min" => 30,
				"step" => 1,
				"max" => 100,
				'resolution' => 1,
				'display_value' => 'text'
			),
			array(
                'id' => 'dropdowns_animation', 
                'type' => 'select',
                'title' => __('Dropdowns Animation:', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select the type of animation to displaying dropdowns. Warning: Animation correctly works only in the latest versions of progressive browsers.', 'INFINITE_LANGUAGE'),
                'options' => array(
                     'none' => 'None',
                     'anim_1' => 'Unfold',
					 'anim_2' => 'Fading',
					 'anim_3' => 'Scale',
					 'anim_4' => 'Down to Up',
					 'anim_5' => 'Dropdown'
                ),
                'default' => 'anim_1'
            ),
			array(
                'id' => 'first_level_item_align', 
                'type' => 'select',
                'title' => __('Alignment Of The First Level Items.', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose how to locate menu elements of the first level.', 'INFINITE_LANGUAGE'),
                'options' => array(
                     'left' => 'Left',
                     'center' => 'Center',
					 'right' => 'Right'
                ),
                'default' => 'right'
            ),
			array(
                'id' => 'first_level_icons_position', 
                'type' => 'select',
                'title' => __('Location Of Icon In First Level Elements', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose where to locate icon for first level items.', 'INFINITE_LANGUAGE'),
                'options' => array(
                     'left' => 'Left',
                     'top' => 'Above',
					 'right' => 'Right',
					 'disable_first_lvl' => 'Disable Icons In First Level Items',
					 'disable_globally' => 'Disable Icons Globally'
                ),
                'default' => 'left'
            ),
			array(
                'id' => 'first_level_separator', 
                'type' => 'select',
                'title' => __('Separator', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select type of separator between the first level items of this menu.', 'INFINITE_LANGUAGE'),
                'options' => array(
                     'none' => 'None',
                     'smooth' => 'Smooth',
					 'sharp' => 'Sharp'
                ),
                'default' => 'none'
            ),
			array(
				'id' => 'first_level_item_height',
				'type' => 'slider',
				'title' => __('Height Of The Initial Container And Menu Items Of The First Level.', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Set the extent for the initial menu container and items of the first level.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 20 - 200px.', 'INFINITE_LANGUAGE'),
				"default" => 85,
				"min" => 20,
				"step" => 1,
				"max" => 200,
				'resolution' => 1,
				'display_value' => 'text'
			),
			array(
				'id' => 'first_level_item_height_sticky',
				'type' => 'slider',
				'title' => __('Height Of The First Level Items When Menu Is Sticky (Or Mobile).', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Set the extent for the initial menu container and items of the first level.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 20 - 200px.', 'INFINITE_LANGUAGE'),
				"default" => 65,
				"min" => 20,
				"step" => 1,
				"max" => 200,
				'resolution' => 1,
				'display_value' => 'text'
			),
			array(
                'id' => 'menu_fullwidth_container',
                'type' => 'switch',
                'title' => __('Full Width Initial Container', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('If this option is enabled then the primary container will try to be the full width.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
                'id' => 'sticky_menu',
                'type' => 'switch',
                'title' => __('Sticky Menu', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Check this option to make the menu sticky. Not working on mobile devices.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 1
            ),
			array(
				'id' => 'sticky_offset',
				'type' => 'slider',
				'title' => __('Sticky Scroll Offset', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Set the length of the scroll for each user to pass before the menu will stick to the top of the window.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 0 - 2000px.', 'INFINITE_LANGUAGE'),
				"default" => 340,
				"min" => 0,
				"step" => 10,
				"max" => 2000,
				'resolution' => 1,
				'display_value' => 'text'
			),
			array(
				'id' => 'corners_rounding',
				'type' => 'slider',
				'title' => __('Rounded Corners', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Set the length of the scroll for each user to pass before the menu will stick to the top of the window.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 0 - 100px.', 'INFINITE_LANGUAGE'),
				"default" => 0,
				"min" => 0,
				"step" => 1,
				"max" => 100,
				'resolution' => 1,
				'display_value' => 'text'
			),
			array(
				'id' => 'menu_first_level_icon_font',
				'type' => 'slider',
				'title' => __('Icons In The First Level Items', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Set the length of the scroll for each user to pass before the menu will stick to the top of the window.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 0 - 100px.', 'INFINITE_LANGUAGE'),
				"default" => 15,
				"min" => 0,
				"step" => 1,
				"max" => 100,
				'resolution' => 1,
				'display_value' => 'text'
			),
			array(
				'id' => 'menu_dropdown_icon_font',
				'type' => 'slider',
				'title' => __('Icons Of The Dropdown Menu Items', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Set the length of the scroll for each user to pass before the menu will stick to the top of the window.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 0 - 100px.', 'INFINITE_LANGUAGE'),
				"default" => 16,
				"min" => 0,
				"step" => 1,
				"max" => 100,
				'resolution' => 1,
				'display_value' => 'text'
			),
			array(
                'id' => 'mobile_minimized',
                'type' => 'switch',
                'title' => __('Minimized On Handheld Devices', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('If this option is activated you get the folded menu on handheld devices.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 1
            ),
			array(
            	'id'        => 'mobile_label',
                'type'      => 'text',
                'title'     => __('Label For Mobile Menu', 'INFINITE_LANGUAGE'),
                'subtitle'  => __('Here you can specify label that will be displayed on the mobile version of the menu.', 'INFINITE_LANGUAGE'),
                'desc'      => __('', 'INFINITE_LANGUAGE'),
                'default'   => '',
            ),
		)
	);
	
	$this->sections[] = array(
        'title' => __('Logo Settings', 'INFINITE_LANGUAGE'),
		'subsection' => true,
        'desc' => __('Control and configure the general setup of your header.', 'INFINITE_LANGUAGE'),
		'icon' => 'el-icon-adjust-alt',
		'fields' => array(
            array(
                'id' => 'logo_src',
                'type' => 'media',
                'title' => __('Logo Upload (Black color)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Upload your logo.', 'INFINITE_LANGUAGE'),
                'desc' => ''  
            ),
			array(
                'id' => 'logo_src_alt',
                'type' => 'media',
                'title' => __('Logo Upload (White color)', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Upload your logo.', 'INFINITE_LANGUAGE'),
                'desc' => ''  
            ),
			array(
                'id' => 'logo_src_mobile',
                'type' => 'media',
                'title' => __('Mobile Logo Upload', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Upload your mobile logo.', 'INFINITE_LANGUAGE'),
                'desc' => ''  
            ),
            array(
				'id' => 'logo_height',
				'type' => 'slider',
				'title' => __('Maximum logo height', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Maximum logo height in terms of percentage in regard to the height of the initial container.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 10 - 100%.', 'INFINITE_LANGUAGE'),
				"default" => 100,
				"min" => 10,
				"step" => 1,
				"max" => 100,
				'resolution' => 1,
				'display_value' => 'text'
			),
		)
	);
	
	$this->sections[] = array(
        'title' => __('Specifc Options', 'INFINITE_LANGUAGE'),
		'subsection' => true,
        'desc' => __('Control and configure the general setup of your header.', 'INFINITE_LANGUAGE'),
		'icon' => 'el-icon-wrench',
		'fields' => array(
			array(
                'id' => 'responsive_styles',
                'type' => 'switch',
                'title' => __('Responsive For Handheld Devices', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable responsive properties. If this option is enabled, then the menu will be transformed, if the user uses the handheld device.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 1
            ),
			array(
                'id' => 'responsive_resolution', 
                'type' => 'select',
                'title' => __('Responsive Resolution', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Select on which screen resolution menu will be transformed for mobile devices.', 'INFINITE_LANGUAGE'),
                'options' => array(
                     '480px' => '480px (iPhone Landscape)',
                     '768px' => '768px (iPad Portrait)',
					 '960px' => ' 960px',
					 '1024px' => ' 1024px (iPad Landscape)'
                ),
                'default' => '1024px'
            ),
			array(
				'id' => 'number_of_widgets',
				'type' => 'slider',
				'title' => __('Number Of Widget Areas', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Set here how many independent widget areas you need.', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number between 0 - 100px.', 'INFINITE_LANGUAGE'),
				"default" => 1,
				"min" => 0,
				"step" => 1,
				"max" => 100,
				'resolution' => 1,
				'display_value' => 'text'
			),
			array(
                'id' => 'language_direction', 
                'type' => 'select',
                'title' => __('Language Text Direction', 'INFINITE_LANGUAGE'),
                'subtitle' => __('You can select direction of the text for this plugin. LTR - sites where text is read from left to right. RTL - sites where text is read from right to left.', 'INFINITE_LANGUAGE'),
                'options' => array(
                     'ltr' => 'Left To Right',
                     'rtl' => 'Right To Left'
                ),
                'default' => 'ltr'
            ),
            
		)
	);
	
	// Footer Options
	$this->sections[] = array(
        'title' => __('Footer Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure of your footer area.', 'INFINITE_LANGUAGE'),
		'icon' => 'el-icon-chevron-down',
        'fields' => array(
        	array(
				'id' => 'footer-widget-columns',
				'type' => 'image_select',
				'title' => __('Footer Widget Area Columns', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Select the columns for footer widget area.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'options' => array(
					'2' => array('title' => '2 Columns', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/2col.png'),
					'3' => array('title' => '3 Columns', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/3col.png'),
					'4' => array('title' => '4 Columns', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/4col.png')
				),
				'default' => '3'
			),   
			array(
                'id' => 'enable-footer-social-area',
                'type' => 'switch',
                'title' => __('Footer Social Area', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Do you want enable social profiles?<br/>You can set your social profile in <b>Social Options Tabs</b>.', 'INFINITE_LANGUAGE'),
                'desc' => '',
				'default' => 0
            ),
			array(
                'id' => 'footer-infinitegrids-signature-text',
                'type' => 'switch',
                'title' => __('Footer 8Grids Signature Text', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('', 'INFINITE_LANGUAGE'),
                'desc' => '',
				'default' => 1
            ),
			array(
				'id'=>'footer-copyright-text',
				'type' => 'editor',
				'title' => __('Footer Copyright Section Text', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Create your custom footer text', 'INFINITE_LANGUAGE'),
				'default' => 'Powered by Infinite Grids.',
				)		
        )
    );
	
	// Knowledgebase Options
	$this->sections[] = array(
        'title' => __('Knowledgebase Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure the general setup of your knowledgebase.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-compass-alt',
        'fields' => array( 
			array(
                'id' => 'enable-comment-knowledgebase-area',
                'type' => 'switch',
                'title' => __('Enable Comments Template on Single Knowledgebase Post?', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable Comments Template.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
            	'id'        => 'kb-index',
                'type'      => 'text',
                'title'     => __('URL Knowledgebase Index', 'INFINITE_LANGUAGE'),
                'subtitle'  => __('Enter an URL valid of the Index Knowledgebase.', 'INFINITE_LANGUAGE'),
                'desc'      => __('', 'INFINITE_LANGUAGE'),
                'default'   => '',
            ),
			array(
				'id' => 'knowledgebase_rewrite_slug', 
				'type' => 'text', 
				'title' => __('Custom Slug', 'INFINITE_LANGUAGE'),
				'subtitle' => __('If you want your knowledgebase post type to have a custom slug in the url, please enter it here. <br/><br/>
								 <b>You will still have to refresh your permalinks after saving this!</b><br/><br/>
								 This is done by going to <b>Settings -> Permalinks</b> and clicking save.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			)                          
        )
    );

	// Portfolio Options
	$this->sections[] = array(
        'title' => __('Portfolio Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure the general setup of your portfolio.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-briefcase',
        'fields' => array( 
			array(
                'id' => 'enable-comment-portfolio-area',
                'type' => 'switch',
                'title' => __('Enable Comments Template on Single Portfolio Post?', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable Comments Template.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
            	'id'        => 'portfolio-index',
                'type'      => 'text',
                'title'     => __('URL Portfolio Index', 'INFINITE_LANGUAGE'),
                'subtitle'  => __('Enter an URL valid of the Index Portfolio.', 'INFINITE_LANGUAGE'),
                'desc'      => __('', 'INFINITE_LANGUAGE'),
                'default'   => '',
            ),
			array(
				'id' => 'portfolio_rewrite_slug', 
				'type' => 'text', 
				'title' => __('Custom Slug', 'INFINITE_LANGUAGE'),
				'subtitle' => __('If you want your portfolio post type to have a custom slug in the url, please enter it here. <br/><br/>
								 <b>You will still have to refresh your permalinks after saving this!</b><br/><br/>
								 This is done by going to <b>Settings -> Permalinks</b> and clicking save.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			)                          
        )
    );

	// Team Options
	$this->sections[] = array(
        'title' => __('Team Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure the general setup of your team.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-group',
        'fields' => array( 
			array(
                'id' => 'enable-comment-team-area',
                'type' => 'switch',
                'title' => __('Enable Comments Template on Single Team Post?', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Enable/Disable Comments Template.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => 0
            ),
			array(
            	'id'        => 'team-index',
                'type'      => 'text',
                'title'     => __('URL Team Index', 'INFINITE_LANGUAGE'),
                'subtitle'  => __('Enter an URL valid of the Index Team.', 'INFINITE_LANGUAGE'),
                'desc'      => __('', 'INFINITE_LANGUAGE'),
                'default'   => '',
            ),
			array(
				'id' => 'team_rewrite_slug', 
				'type' => 'text', 
				'title' => __('Custom Slug', 'INFINITE_LANGUAGE'),
				'subtitle' => __('If you want your team post type to have a custom slug in the url, please enter it here.<br/><br/>
								 <b>You will still have to refresh your permalinks after saving this!</b><br/><br/>
								 This is done by going to <b>Settings -> Permalinks</b> and clicking save.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			)                          
        )
    );

	// Blog Options
	$this->sections[] = array(
        'title' => __('Blog Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure the general setup of your blog.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-book',
        'fields' => array( 		
			array(
            	'id'        => 'blog-index',
                'type'      => 'text',
                'title'     => __('URL Blog Index', 'INFINITE_LANGUAGE'),
                'subtitle'  => __('Enter an URL valid of the Index Blog.', 'INFINITE_LANGUAGE'),
                'desc'      => __('', 'INFINITE_LANGUAGE'),
                'default'   => '',
            ),

			array(
				'id' => 'blog_type',
				'type' => 'select',
				'title' => __('Blog Type', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Please select your blog format here.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'options' => array(
					'standard-blog' => 'Standard Blog',
					'masonry-blog' => 'Masonry Blog',
                    'center-blog' => 'Center Blog'
				),
				'default' => 'standard-blog'
			),
			array(
				'id' => 'blog_sidebar_layout',
				'type' => 'image_select',
				'required' => array('blog_type','=','standard-blog'),
				'title' => __('Standard Blog Layout', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Select main content and sidebar alignment.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'options' => array(
					'no_side' => array('title' => 'No Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/no_side.png'),
					'left_side' => array('title' => 'Left Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/left_side.png'),
					'right_side' => array('title' => 'Right Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/right_side.png')
				),
				'default' => 'right_side'
			),
			array(
				'id' => 'masonry_layout',
				'type' => 'image_select',
				'required' => array('blog_type','=','masonry-blog'),
				'title' => __('Masonry Blog Layout', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Select the column for masonry blog.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'options' => array(
					'2' => array('title' => '2 Columns', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/2col.png'),
					'3' => array('title' => '3 Columns', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/3col.png'),
					'4' => array('title' => '4 Columns', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/4col.png')
				),
				'default' => '3'
			),
			array(
				'id' => 'blog_post_sidebar_layout',
				'type' => 'image_select',
				'title' => __('Single Post Blog Layout', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Select main content and sidebar alignment for single post.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'options' => array(
					'no_side' => array('title' => 'No Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/no_side.png'),
					'left_side' => array('title' => 'Left Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/left_side.png'),
					'right_side' => array('title' => 'Right Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/right_side.png'),
                    'center_side' => array('title' => 'No Sidebar - Center Layout', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/center-no-sidebar.png')
				),
				'default' => 'right_side'
			)
        )
    );
	
	// 404 Options
    $this->sections[] = array(
        'title' => __('404 Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure the general setup of your 404 page.', 'INFINITE_LANGUAGE'),
        'icon' => ' el-icon-error',
        'fields' => array(
            array(
                'id' => '404-img',
                'type' => 'media',
                'title' => __('Background Image Upload', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Please upload an image that will be used for background image.', 'INFINITE_LANGUAGE'),
                'desc' => ''
            ),
			array(
                'id' => '404-color-overlay',
                'type' => 'color',
                'title' => __('Background Color Overlay', 'INFINITE_LANGUAGE'),
                'subtitle' => __('Choose a background color overlay for your title block.', 'INFINITE_LANGUAGE'),
                'desc' => '',
                'default' => '#fff'
            ),
			array(
				'id' => '404-opacity-overlay',
				'type' => 'slider',
				'title' => __('Background Opacity Overlay', 'INFINITE_LANGUAGE'),
				'subtitle' => __('This example displays float values', 'INFINITE_LANGUAGE'),
				'desc' => __('Enter a number 0 - 1 for your background color opacity.', 'INFINITE_LANGUAGE'),
				"default" => .5,
				"min" => 0,
				"step" => .1,
				"max" => 1,
				'resolution' => 0.1,
				'display_value' => 'text'
			),
            array(
                'id' => '404-title',
                'type' => 'text',
                'title' => __('Insert your 404 Title', 'INFINITE_LANGUAGE'), 
                'subtitle' => __('Please Enter here your title for 404 Page.', 'INFINITE_LANGUAGE'),
                'desc' => ''
            ),
			array(
				'id'=>'404-caption',
				'type' => 'editor',
				'title' => __('Insert your 404 Caption', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Please Enter here your caption for 404 Page.', 'INFINITE_LANGUAGE'),
				'default' => '',
			),
			array(
                 'id'        => '404-text-header-align',
                 'type'      => 'button_set',
                 'title'     => __('Title and Caption Align', 'INFINITE_LANGUAGE'),
                 'subtitle'  => __('You can align the text in three different ways.', 'INFINITE_LANGUAGE'),
                 'desc'      => __('', 'INFINITE_LANGUAGE'),
                 'options'   => array(
					 'textalignleft' => 'Left Align',
					 'textaligncenter' => 'Center Align',
					 'textalignright' => 'Right Align'
                  ), 
                  'default'   => 'textaligncenter'
             )
        )
    );

    // Contact Map Options
	$this->sections[] = array(
        'title' => __('Contact Map Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure the general setup of your contact and map page.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-map-marker',
        'fields' => array(
			array(
				'id' => 'title-marker',
				'type' => 'text',
				'title' => __('Insert your Title Marker', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Please Enter here your text of Title Marker.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'zoom-level',
				'type' => 'text',
				'title' => __('Default Map Zoom Level', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Value should be between 1-18, 1 being the entire earth and 18 being right at street level.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'validate' => 'numeric'
			),
			array(
				'id' => 'center-lat',
				'type' => 'text',
				'title' => __('Map Center Latitude', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Please enter the latitude for the maps center point.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'validate' => 'numeric'
			),
			array(
				'id' => 'center-lng',
				'type' => 'text',
				'title' => __('Map Center Longitude', 'INFINITE_LANGUAGE'), 
				'sub_desc' => __('Please enter the longitude for the maps center point.', 'INFINITE_LANGUAGE'),
				'desc' => '',
				'validate' => 'numeric'
			),
			array(
				'id' => 'marker-img',
				'type' => 'media',
				'title' => __('Marker Icon Upload', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('Please upload an image that will be used for the marker on your map.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id'=>'map-info',
				'type' => 'editor',
				'title' => __('Map Infowindow Text', 'INFINITE_LANGUAGE'), 
				'subtitle' => __('If you would like to display any text in an info window for location, please enter it here.<br/><br/>
								  <em>HTML is allowed.</em>', 'INFINITE_LANGUAGE'),
				'default' => '',
				)	
        )
    );

	// Social Options
	$this->sections[] = array(
        'title' => __('Social Options', 'INFINITE_LANGUAGE'),
        'desc' => __('Control and configure the general setup of your social profile. <br/>Will be visible in the footer area (if enabled) and the social profile widget.', 'INFINITE_LANGUAGE'),
        'icon' => 'el-icon-globe',
        'fields' => array(
			array(
				'id' => 'aim-url', 
				'type' => 'text', 
				'title' => __('Aim URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Aim URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'aim_alt-url', 
				'type' => 'text', 
				'title' => __('Aim alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Aim URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'amazon-url', 
				'type' => 'text', 
				'title' => __('Amazon URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Amazon URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'app_store-url', 
				'type' => 'text', 
				'title' => __('App Store URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your App Store URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'apple-url', 
				'type' => 'text', 
				'title' => __('Apple URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Apple URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'arto-url', 
				'type' => 'text', 
				'title' => __('Arto URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Arto URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'aws-url', 
				'type' => 'text', 
				'title' => __('AWS URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your AWS URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'baidu-url', 
				'type' => 'text', 
				'title' => __('Baidu URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Baidu URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'basecamp-url', 
				'type' => 'text', 
				'title' => __('Basecamp URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Basecamp URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'bebo-url', 
				'type' => 'text', 
				'title' => __('Bebo URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Bebo URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'behance-url', 
				'type' => 'text', 
				'title' => __('Behance URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Behance URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'bing-url', 
				'type' => 'text', 
				'title' => __('Bing URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Bing URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'blip-url', 
				'type' => 'text', 
				'title' => __('Blip URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Blip URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'blogger-url', 
				'type' => 'text', 
				'title' => __('Blogger URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Blogger URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'bnter-url', 
				'type' => 'text', 
				'title' => __('Bnter URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Bnter URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'brightkite-url', 
				'type' => 'text', 
				'title' => __('Brightkite URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Brightkite URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'cinch-url', 
				'type' => 'text', 
				'title' => __('Cinch URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Cinch URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'cloudapp-url', 
				'type' => 'text', 
				'title' => __('Cloudapp URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Cloudapp URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'coroflot-url', 
				'type' => 'text', 
				'title' => __('Coroflot URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Coroflot URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'creative_commons-url', 
				'type' => 'text', 
				'title' => __('Creative Commons URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Creative Commons URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'dailybooth-url', 
				'type' => 'text', 
				'title' => __('Dailybooth URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Dailybooth URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'delicious-url', 
				'type' => 'text', 
				'title' => __('Delicious URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Delicious URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'designbump-url', 
				'type' => 'text', 
				'title' => __('Designbump URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Designbump URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'designfloat-url', 
				'type' => 'text', 
				'title' => __('Designfloat URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Designfloat URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'designmoo-url', 
				'type' => 'text', 
				'title' => __('Designmoo URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Designmoo URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'deviantart-url', 
				'type' => 'text', 
				'title' => __('Deviantart URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Deviantart URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'digg-url', 
				'type' => 'text', 
				'title' => __('Digg URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Digg URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'digg_alt-url', 
				'type' => 'text', 
				'title' => __('digg alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Digg URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'diigo-url', 
				'type' => 'text', 
				'title' => __('Diigo URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Diigo URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'dribbble-url', 
				'type' => 'text', 
				'title' => __('Dribbble URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Dribbble URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'dropbox-url', 
				'type' => 'text', 
				'title' => __('Dropbox URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Dropbox URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'drupal-url', 
				'type' => 'text', 
				'title' => __('Drupal URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Drupal URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'dzone-url', 
				'type' => 'text', 
				'title' => __('Dzone URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Dzone URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'ebay-url', 
				'type' => 'text', 
				'title' => __('Ebay URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Ebay URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'ember-url', 
				'type' => 'text', 
				'title' => __('Ember URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Ember URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'etsy-url', 
				'type' => 'text', 
				'title' => __('Etsy URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Etsy URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'evernote-url', 
				'type' => 'text', 
				'title' => __('Evernote URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Evernote URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'facebook11-url', 
				'type' => 'text', 
				'title' => __('Facebook URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Facebook URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'facebook_alt-url', 
				'type' => 'text', 
				'title' => __('Facebook alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Facebook URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'facebook_places-url', 
				'type' => 'text', 
				'title' => __('Facebook Places URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Facebook Places URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'facto-me-url', 
				'type' => 'text', 
				'title' => __('Facto.me URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Facto.me URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'feedburner-url', 
				'type' => 'text', 
				'title' => __('Feedburner URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Feedburner URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'flickr-url', 
				'type' => 'text', 
				'title' => __('Flickr URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Flickr URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'folkd-url', 
				'type' => 'text', 
				'title' => __('Folkd URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Folkd URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'formspring-url', 
				'type' => 'text', 
				'title' => __('Formspring URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Formspring URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'forrst-url', 
				'type' => 'text', 
				'title' => __('Forrst URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Forrst URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'foursquare-url', 
				'type' => 'text', 
				'title' => __('Foursquare URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Foursquare URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'friendfeed-url', 
				'type' => 'text', 
				'title' => __('Friendfeed URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Friendfeed URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'friendster-url', 
				'type' => 'text', 
				'title' => __('Friendster URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Friendster URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'gdgt-url', 
				'type' => 'text', 
				'title' => __('Gdgt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Gdgt URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'github-url', 
				'type' => 'text', 
				'title' => __('Github URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Github URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'github_alt-url', 
				'type' => 'text', 
				'title' => __('Github Alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Github URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'goodreads-url', 
				'type' => 'text', 
				'title' => __('Goodreads URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Goodreads URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'google-url', 
				'type' => 'text', 
				'title' => __('Google URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Google URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'google_buzz-url', 
				'type' => 'text', 
				'title' => __('Google Buzz URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Google Buzz URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'google_talk-url', 
				'type' => 'text', 
				'title' => __('Google Talk URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Google Talk URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'googleplus2-url', 
				'type' => 'text', 
				'title' => __('Google Plus URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Google Plus URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'gowalla-url', 
				'type' => 'text', 
				'title' => __('Gowalla URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Gowalla URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'gowalla_alt-url', 
				'type' => 'text', 
				'title' => __('Gowalla alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Gowalla URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'grooveshark-url', 
				'type' => 'text', 
				'title' => __('Grooveshark URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Grooveshark URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'hacker_news-url', 
				'type' => 'text', 
				'title' => __('Hacker News URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Hacker News URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'hi5-url', 
				'type' => 'text', 
				'title' => __('hi5 URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your hi5 URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'hype_machine-url', 
				'type' => 'text', 
				'title' => __('Hype Machine URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Hype Machine URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'hyves-url', 
				'type' => 'text', 
				'title' => __('Hyves URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Hyves URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'icq-url', 
				'type' => 'text', 
				'title' => __('icq URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your icq URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'identi-ca-url', 
				'type' => 'text', 
				'title' => __('identi.ca URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your identi.ca URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'instagram-url', 
				'type' => 'text', 
				'title' => __('Instagram URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Instagram URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'instapaper-url', 
				'type' => 'text', 
				'title' => __('Instapaper URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Instapaper URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'itunes-url', 
				'type' => 'text', 
				'title' => __('iTunes URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your iTunes URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'kik-url', 
				'type' => 'text', 
				'title' => __('Kik URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Kik URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'krop-url', 
				'type' => 'text', 
				'title' => __('Krop URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Krop URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'last-fm-url', 
				'type' => 'text', 
				'title' => __('last.fm URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your last.fm URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'linkedin-url', 
				'type' => 'text', 
				'title' => __('Linkedin URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Linkedin URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'linkedin_alt-url', 
				'type' => 'text', 
				'title' => __('Linkedin alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Linkedin URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'livejournal-url', 
				'type' => 'text', 
				'title' => __('Livejournal URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Livejournal URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'lovedsgn-url', 
				'type' => 'text', 
				'title' => __('Lovedsgn URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Lovedsgn URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'meetup-url', 
				'type' => 'text', 
				'title' => __('Meetup URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Meetup URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'metacafe-url', 
				'type' => 'text', 
				'title' => __('Metacafe URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Metacafe URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'ming-url', 
				'type' => 'text', 
				'title' => __('Ming URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Ming URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'mister_wong-url', 
				'type' => 'text', 
				'title' => __('Mister Wong URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Mister Wong URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'mixx-url', 
				'type' => 'text', 
				'title' => __('Mixx URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Mixx URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'mixx_alt-url', 
				'type' => 'text', 
				'title' => __('Mixx alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Mixx URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'mobileme-url', 
				'type' => 'text', 
				'title' => __('Mobileme URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Mobileme URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'msn_messenger-url', 
				'type' => 'text', 
				'title' => __('Msn Messenger URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Msn Messenger URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'myspace-url', 
				'type' => 'text', 
				'title' => __('Myspace URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Myspace URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'myspace_alt-url', 
				'type' => 'text', 
				'title' => __('Myspace alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Myspace URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'newsvine-url', 
				'type' => 'text', 
				'title' => __('Newsvine URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Newsvine URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'official-fm-url', 
				'type' => 'text', 
				'title' => __('official.fm URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your official.fm URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'openid-url', 
				'type' => 'text', 
				'title' => __('Openid URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Openid URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'orkut-url', 
				'type' => 'text', 
				'title' => __('Orkut URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Orkut URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'pandora-url', 
				'type' => 'text', 
				'title' => __('Pandora URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Pandora URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'path-url', 
				'type' => 'text', 
				'title' => __('Path URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Path URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'paypal-url', 
				'type' => 'text', 
				'title' => __('Paypal URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Paypal URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'photobucket-url', 
				'type' => 'text', 
				'title' => __('Photobucket URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Photobucket URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'picasa-url', 
				'type' => 'text', 
				'title' => __('Picasa URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Picasa URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'pinboard-in-url', 
				'type' => 'text', 
				'title' => __('pinboard.in URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your pinboard.in URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'ping-url', 
				'type' => 'text', 
				'title' => __('Ping URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Ping URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'pingchat-url', 
				'type' => 'text', 
				'title' => __('Pingchat URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Pingchat URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'pinterest-url', 
				'type' => 'text', 
				'title' => __('Pinterest URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Pinterest URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'playstation-url', 
				'type' => 'text', 
				'title' => __('Playstation URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Playstation URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'plixi-url', 
				'type' => 'text', 
				'title' => __('Plixi URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Plixi URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'plurk-url', 
				'type' => 'text', 
				'title' => __('Plurk URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Plurk URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'podcast-url', 
				'type' => 'text', 
				'title' => __('Podcast URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Podcast URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'posterous-url', 
				'type' => 'text', 
				'title' => __('Posterous URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Posterous URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'qik-url', 
				'type' => 'text', 
				'title' => __('Qik URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Qik URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'quik-url', 
				'type' => 'text', 
				'title' => __('Quik URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Quik URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'quora-url', 
				'type' => 'text', 
				'title' => __('Quora URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Quora URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'rdio-url', 
				'type' => 'text', 
				'title' => __('rdio URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your rdio URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'readernaut-url', 
				'type' => 'text', 
				'title' => __('Readernaut URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Readernaut URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'reddit-url', 
				'type' => 'text', 
				'title' => __('Reddit URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Reddit URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'retweet-url', 
				'type' => 'text', 
				'title' => __('Retweet URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Retweet URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'robo-to-url', 
				'type' => 'text', 
				'title' => __('robo.to URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your robo.to URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'rss-url', 
				'type' => 'text', 
				'title' => __('rss URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your rss URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'scribd-url', 
				'type' => 'text', 
				'title' => __('Scribd URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Scribd URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'sharethis-url', 
				'type' => 'text', 
				'title' => __('Sharethis URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Sharethis URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'simplenote-url', 
				'type' => 'text', 
				'title' => __('Simplenote URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Simplenote URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),array(
				'id' => 'skype-url', 
				'type' => 'text', 
				'title' => __('Skype URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Skype URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'slashdot-url', 
				'type' => 'text', 
				'title' => __('Slashdot URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Slashdot URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),array(
				'id' => 'slideshare-url', 
				'type' => 'text', 
				'title' => __('Slideshare URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Slideshare URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'smugmug-url', 
				'type' => 'text', 
				'title' => __('Smugmug URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Smugmug URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'soundcloud-url', 
				'type' => 'text', 
				'title' => __('Soundcloud URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Soundcloud URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'spotify-url', 
				'type' => 'text', 
				'title' => __('Spotify URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Spotify URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'squarespace-url', 
				'type' => 'text', 
				'title' => __('Squarespace URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Squarespace URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'squidoo-url', 
				'type' => 'text', 
				'title' => __('Squidoo URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Squidoo URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),array(
				'id' => 'steam-url', 
				'type' => 'text', 
				'title' => __('Steam URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Steam URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),array(
				'id' => 'stumbleupon-url', 
				'type' => 'text', 
				'title' => __('Stumbleupon URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Stumbleupon URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'technorati-url', 
				'type' => 'text', 
				'title' => __('Technorati URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Technorati URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),array(
				'id' => 'threewords-me-url', 
				'type' => 'text', 
				'title' => __('threewords.me URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your threewords.me URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'tribe-net-url', 
				'type' => 'text', 
				'title' => __('tribe.net URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your tribe.net URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'tripit-url', 
				'type' => 'text', 
				'title' => __('Tripit URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Tripit URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'tumblr-url', 
				'type' => 'text', 
				'title' => __('Tumblr URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Tumblr URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'twitter-url', 
				'type' => 'text', 
				'title' => __('Twitter URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Twitter URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'twitter_alt-url', 
				'type' => 'text', 
				'title' => __('twitter alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your twitter URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'vcard-url', 
				'type' => 'text', 
				'title' => __('Vcard URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Vcard URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'viddler-url', 
				'type' => 'text', 
				'title' => __('Viddler URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Viddler URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'vimeo-url', 
				'type' => 'text', 
				'title' => __('Vimeo URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Vimeo URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'virb-url', 
				'type' => 'text', 
				'title' => __('Virb URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Virb URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'w3-url', 
				'type' => 'text', 
				'title' => __('W3 URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your W3 URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'whatsapp-url', 
				'type' => 'text', 
				'title' => __('Whatsapp URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Whatsapp URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'wikipedia-url', 
				'type' => 'text', 
				'title' => __('Wikipedia URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Wikipedia URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'windows-url', 
				'type' => 'text', 
				'title' => __('Windows URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Windows URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'wists-url', 
				'type' => 'text', 
				'title' => __('Wists URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Wists URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'wordpress-url', 
				'type' => 'text', 
				'title' => __('Wordpress URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Wordpress URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'wordpress_alt-url', 
				'type' => 'text', 
				'title' => __('Wordpress alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Wordpress URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'xing-url', 
				'type' => 'text', 
				'title' => __('Xing URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Xing URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'yahoo-url', 
				'type' => 'text', 
				'title' => __('Yahoo URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Yahoo URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'yahoo-buzz-url', 
				'type' => 'text', 
				'title' => __('Yahoo Buzz URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Yahoo Buzz URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'yahoo-messenger-url', 
				'type' => 'text', 
				'title' => __('Yahoo Messenger URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Yahoo Messenger URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'yelp-url', 
				'type' => 'text', 
				'title' => __('Yelp URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Yelp URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'youtube-url', 
				'type' => 'text', 
				'title' => __('Youtube URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Youtube URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'youtube_alt-url', 
				'type' => 'text', 
				'title' => __('Youtube alt URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Youtube URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'zerply-url', 
				'type' => 'text', 
				'title' => __('Zerply URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Zerply URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'zootool-url', 
				'type' => 'text', 
				'title' => __('Zootool URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Zootool URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			),
			array(
				'id' => 'zynga-url', 
				'type' => 'text', 
				'title' => __('Zynga URL', 'INFINITE_LANGUAGE'),
				'subtitle' => __('Please enter in your Zynga URL.', 'INFINITE_LANGUAGE'),
				'desc' => ''
			)
        )
    );
	global $woocommerce; 
	if ($woocommerce) {
		
		global $wpdb;
		$rs = $wpdb->get_results( 
		"
		SELECT id, title, alias
		FROM ".$wpdb->prefix."revslider_sliders
		ORDER BY id ASC LIMIT 100
		"
		);
		$revsliders = array();
		if ($rs) {
		foreach ( $rs as $slider ) {
		  $revsliders[$slider->alias] = $slider->alias;
		}
		} else {
		$revsliders["No sliders found"] = 0;
		}
		 
		 	$this->sections[] = array(
				'icon' => 'el-icon-shopping-cart',
		        'title' => __('WooCommerce', 'INFINITE_LANGUAGE'),
		        'desc' => __('Control and configure the general setup of your store.', 'INFINITE_LANGUAGE'),
		        'fields' => array( 
				array(
					'id' => 'enable-cart',
					'type' => 'switch',
					'title' => __('Do you want WooCommerce Cart In Nav?', 'INFINITE_LANGUAGE'), 
					'subtitle' => __('Enable/Disable Cart to your main navigation.', 'INFINITE_LANGUAGE'),
					'desc' => '',
					'default' => 0
				), 
				array(
					'id' => 'main_shop_layout',
					'type' => 'image_select',
					'title' => __('Main Shop Structure', 'INFINITE_LANGUAGE'), 
					'subtitle' => __('Select sidebar alignment.', 'INFINITE_LANGUAGE'),
					'desc' => '',
					'options' => array(
						'no-sidebar' => array('title' => 'No Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/no_side.png'),
						'left-sidebar' => array('title' => 'Left Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/left_side.png'),
						'right-sidebar' => array('title' => 'Right Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/right_side.png')
					),
					'default' => 'no-sidebar'
				),
				array(
					'id' => 'single_product_layout',
					'type' => 'image_select',
					'title' => __('Single Product Structure', 'INFINITE_LANGUAGE'), 
					'subtitle' => __('Select sidebar alignment.', 'INFINITE_LANGUAGE'),
					'desc' => '',
					'options' => array(
						'no-sidebar' => array('title' => 'No Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/no_side.png'),
						'left-sidebar' => array('title' => 'Left Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/left_side.png'),
						'right-sidebar' => array('title' => 'Right Sidebar', 'img' => IG_FRAMEWORK_DIRECTORY.'options/assets/img/right_side.png')
					),
					'default' => 'no-sidebar'
				),  
				array(
					'id' => 'woo_social',
					'type' => 'switch',
					'title' => __('Do you want WooCommerce Cart In Nav?', 'INFINITE_LANGUAGE'), 
					'subtitle' => __('Enable/Disable Cart to your main navigation.', 'INFINITE_LANGUAGE'),
					'desc' => '',
					'default' => 0
				), 
				array(
					'id' => 'woo-facebook-sharing',
					'type' => 'switch',
					'title' => __('Facebook', 'INFINITE_LANGUAGE'), 
					'subtitle' => __('Enable/Disable for Facebook Share', 'INFINITE_LANGUAGE'),
					'desc' => '',
					'default' => 0
				), 
				array(
					'id' => 'woo-twitter-sharing',
					'type' => 'switch',
					'title' => __('Twitter', 'INFINITE_LANGUAGE'), 
					'subtitle' => __('Enable/Disable for Twitter Share', 'INFINITE_LANGUAGE'),
					'desc' => '',
					'default' => 0
				),
				array(
					'id' => 'woo-pinterest-sharing',
					'type' => 'switch',
					'title' => __('Pinterest', 'INFINITE_LANGUAGE'), 
					'subtitle' => __('Enable/Disable for Pinterest Share', 'INFINITE_LANGUAGE'),
					'desc' => '',
					'default' => 0
				)     
		        )
		    );
			
			$this->sections[] = array(
                'icon'      => 'el-icon-chevron-up',
                'title'     => __('Header Main Page', 'INFINITE_LANGUAGE'),
                'subsection' => true,
                'fields'    => array(
					array(
						'id' => 'enable-woo-header-options',
						'type' => 'switch',
						'title' => __('Do You Want Customize WooCommerce Header?', 'INFINITE_LANGUAGE'), 
						'subtitle' => __('Activate this to enable the options below.', 'INFINITE_LANGUAGE'),
						'desc' => '',
						'default' => 0
            		),
					array(
						'id' => 'check-woo-header-text-settings',
						'type' => 'switch',
						'title' => __('Title and Caption', 'INFINITE_LANGUAGE'), 
						'subtitle' => __('Enable or Disable the Header Page Text.', 'INFINITE_LANGUAGE'),
						'desc' => '',
						'default' => 0
            		),
					array(
                        'id'    => 'opt-divide',
                        'type'  => 'divide'
                    ),
					array(
						'id'=>'bg-woo-header',
						'type' => 'media', 
						'title' => __('Page Header Image', 'INFINITE_LANGUAGE'),
						'subtitle' => __('Upload your image should be between 1600px x 800px (or more) for best results.', 'INFINITE_LANGUAGE'),
						'desc'=> ''
					),
					array(
                        'id'            => 'bg-woo-header-height',
                        'type'          => 'slider',
                        'title'         => __('Page Header Height', 'INFINITE_LANGUAGE'),
                        'subtitle'      => __('This example displays the value in a text box', 'INFINITE_LANGUAGE'),
                        'desc'          => __('Enter a number for your height (padding-top and padding-bottom) of page header. Min: 100, max: 2000, step: 5, default value: 100 <strong>Not works if you use a slider</strong>', 'INFINITE_LANGUAGE'),
                        'default'       => 100,
                        'min'           => 100,
                        'step'          => 5,
                        'max'           => 2000,
                        'display_value' => 'text'
                    ),
					array(
						'id' => 'bg-woo-header-overlay',
						'type' => 'switch',
						'title' => __('Background Overlay', 'INFINITE_LANGUAGE'), 
						'subtitle' => __('Enable or Disable Overlay Background.', 'INFINITE_LANGUAGE'),
						'desc' => '',
						'default' => 0
            		),
					array(
                        'id'            => 'bg-woo-header-opacity',
                        'type'          => 'slider',
                        'title'         => __('Background Opacity Overlay', 'INFINITE_LANGUAGE'),
                        'subtitle'      => __('This example displays the value in a text box', 'INFINITE_LANGUAGE'),
                        'desc'          => __('Min: 0, max: 1, step: 0.1, default value: 0.7', 'INFINITE_LANGUAGE'),
                        'default'       => .7,
                        'min'           => 0,
                        'step'          => .1,
                        'max'           => 1,
                        'resolution'    => 0.1,
                        'display_value' => 'text'
                    ),
					array(
                        'id'        => 'bg-woo-header-color',
                        'type'      => 'color',
                        'title'     => __('Background Color Overlay', 'INFINITE_LANGUAGE'),
                        'subtitle'  => __('Optional. Choose a background color overlay for your title block. (default: #26accb).', 'INFINITE_LANGUAGE'),
                        'default'   => '#26accb',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'bg-woo-header-attachment',
                        'type'      => 'button_set',
                        'title'     => __('Image Background Attachment', 'INFINITE_LANGUAGE'),
                        'subtitle'  => __('Background Image Attachment.', 'INFINITE_LANGUAGE'),
                        'desc'      => __('', 'INFINITE_LANGUAGE'),
                        'options'   => array(
                            'scroll' => 'Scroll', 
                            'fixed' => 'Fixed'
                        ), 
                        'default'   => 'fixed'
                    ),
					array(
                        'id'        => 'title-woo-header',
                        'type'      => 'text',
                        'title'     => __('Title', 'INFINITE_LANGUAGE'),
                        'subtitle'  => __('You can insert a custom page title instead of default page title.', 'INFINITE_LANGUAGE'),
                        'desc'      => __('', 'INFINITE_LANGUAGE'),
                        'default'   => 'Shop',
            		),
					array(
                        'id'        => 'caption-woo-header',
                        'type'      => 'text',
                        'title'     => __('Caption', 'INFINITE_LANGUAGE'),
                        'subtitle'  => __('You can insert a custom text caption.', 'INFINITE_LANGUAGE'),
                        'desc'      => __('', 'INFINITE_LANGUAGE'),
                        'default'   => 'Sell Anything. Beautifully.',
            		),
					array(
                        'id'        => 'text-woo-header-align',
                        'type'      => 'button_set',
                        'title'     => __('Page Title and Caption Align', 'INFINITE_LANGUAGE'),
                        'subtitle'  => __('You can align the text in three different ways.', 'INFINITE_LANGUAGE'),
                        'desc'      => __('', 'INFINITE_LANGUAGE'),
                        'options'   => array(
							'textalignleft' => 'Left Align',
							'textaligncenter' => 'Center Align',
							'textalignright' => 'Right Align'
                        ), 
                        'default'   => 'textalignleft'
                    ),
					array(
                        'id'        => 'text-woo-header-color',
                        'type'      => 'color',
                        'title'     => __('Page Title and Caption Color', 'INFINITE_LANGUAGE'),
                        'subtitle'  => __('Optional. Choose a text color for your title block.', 'INFINITE_LANGUAGE'),
                        'default'   => '',
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'slide-woo-header',
                        'type'      => 'select',
                        'title'     => __('Revolution Slider Alias', 'INFINITE_LANGUAGE'),
                        'subtitle'  => __('Select your Revolution Slider Alias for the slider that you want to show.', 'INFINITE_LANGUAGE'),
                        'options'   => $revsliders,
                        'default' => '',
                    ),
                )
            );
	}
			
			
		
            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon'      => 'el-icon-book',
                    'title'     => __('Documentation', 'INFINITE_LANGUAGE'),
                    'content'   => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'INFINITE_LANGUAGE'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'INFINITE_LANGUAGE')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'INFINITE_LANGUAGE'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'INFINITE_LANGUAGE')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'INFINITE_LANGUAGE');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'infinite_options',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'menu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('Theme Options', 'INFINITE_LANGUAGE'),
                'page_title'        => __('Theme Options', 'INFINITE_LANGUAGE'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyBLR1pjLpgvWmEW4iaLK1N9G9tQ7RqX6qM', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.


                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => 'dashicons-screenoptions',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                'footer_credit'     => 'Infinite Options 3.1',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/visualmodo',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/visualmodo',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}


/**
  Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):
    function redux_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**
  Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):
    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }
endif;
