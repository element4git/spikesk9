<?php 

/*-----------------------------------------------------------------------------------*/
/*  Set Max Content Width
/* ----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) )
	$content_width = 1170;

/*-----------------------------------------------------------------------------------*/
/*	Default Theme Constant
/*-----------------------------------------------------------------------------------*/

define('IG_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/framework/');
define('INFINITE_LANGUAGE', 'stream-theme');

/*-----------------------------------------------------------------------------------*/
/*	Infinite Options
/*-----------------------------------------------------------------------------------*/

$options = get_option('infinite_options');

/*-----------------------------------------------------------------------------------*/
/*	Theme Setup
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ig_theme_setup' ) ) {
	function ig_theme_setup(){
		$options = get_option('infinite_options');
		// Load Translation Domain
		load_theme_textdomain(INFINITE_LANGUAGE, get_template_directory() . '/languages');

		// Remove Generator for Security
		remove_action( 'wp_head', 'wp_generator' );

		// Register Menus
		register_nav_menus(array('primary_menu' => __('Primary Menu', INFINITE_LANGUAGE) ));
		register_nav_menus(array('side_menu' => __('Primary Side Menu', INFINITE_LANGUAGE) ));
		
		if($options['extra-menus'] == '1') {

			$extra_menus_number = $options['extra-menus-number'];
			
			for($i = 1; $i <= $extra_menus_number; $i++)
			{
				register_nav_menus(array('extra_menu_'. $i .'' => __('Extra Menu '. $i .'', INFINITE_LANGUAGE) ));
			}
		}

		// Add RSS Feed links to HTML
		add_theme_support('automatic-feed-links');

		// Add Support for Post Formats
		add_theme_support('post-formats', array('quote','video','audio', 'image', 'gallery','link'));

		// Configure Thumbnails
		add_theme_support('post-thumbnails');
		add_image_size('portfolio-thumb', 400, 400, true); // Portfolio Thumb Only
		add_image_size('portfolio-wall-thumb', 400, 400, true); // Portfolio Wall Thumb
		add_image_size('team-thumb', 400, 400, true); // Team Thumb Only
		add_image_size('latest-post-thumb', 400, 300, true); // Latest Post Only
	}
}
add_action('after_setup_theme', 'ig_theme_setup');


/*-----------------------------------------------------------------------------------*/
/*	Custom Login Area
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ig_custom_login' ) ) {
	function ig_custom_login() {
	    echo '<style type="text/css">';
			$options = get_option('infinite_options');
			if($options['login-logo'] != ''){
			
	        echo 'h1 a { background-image:url('. $options['login-logo']['url'] .') !important; width: auto !important; height: 98px !important; background-size: auto auto !important; }';
			} 
			else {
				echo 'h1 a { background-image:url('.get_template_directory_uri().'/includes/img/logo-admin.png) !important; width: auto !important; height: 98px !important; background-size: auto auto !important; }';
				  }
			
			if($options['enable-custom-wplogin'] == '1'){
				if($options['body-typo-background'] != ''){
				echo 'body { background:'.$options['body-typo-background'].'; }';
				}
				echo '.login form { background: transparent; box-shadow: none; padding: 0; }';
				echo '.login form .input, .login input[type=text] { background-color: #efefef; font-size: 12px; padding: 10px; line-height: 22px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.09) inset; -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.09) inset; -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.09) inset; -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.09) inset; transition: all 0.2s linear; -moz-transition: all 0.2s linear; -webkit-transition: all 0.2s linear; -o-transition: all 0.2s linear; border: 0; }';
				echo '.wp-core-ui .button-primary { background: #3e3e3e; padding: 3px 18px 30px !important; border: none; box-shadow: none; border-radius: 300px; transition: all 0.2s linear; -moz-transition: all 0.2s linear; -webkit-transition: all 0.2s linear; -o-transition: all 0.2s linear; }';
				echo '.wp-core-ui .button-primary:hover, .wp-core-ui .button-primary:focus { background: #1c1c1c; border: none; box-shadow: none; }';
				echo 'input[type=checkbox] {border-radius: 300px; box-shadow: none; border: 2px solid rgba(0,0,0,.12); padding: 3px 10px 17px !important; }';
				echo 'input[type=checkbox]:focus, input[type=email]:focus, input[type=number]:focus, input[type=radio]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=url]:focus, select:focus, textarea:focus { border: 2px solid rgba(0,0,0,.12); box-shadow: none; transition: all 0.2s linear; -moz-transition: all 0.2s linear; -webkit-transition: all 0.2s linear; -o-transition: all 0.2s linear; }';
				echo 'input[type=checkbox]:checked { background: #3e3e3e !important; border-color: transparent; }';
				echo 'input[type=checkbox]:checked:before { color: #FFFFFF; margin: -3px 0 0 -11px; }';
				echo '.login form .forgetmenot { margin-top: 7px; }';
				echo '.login form .forgetmenot label { color:#797979; font-size: 13px; }';
				echo '.login #backtoblog, .login #nav { display: none; }';
				echo '@-moz-document url-prefix() { .wp-core-ui .button-primary { padding: 0px 18px 32px !important; } }';
				echo '@media screen and (max-width: 782px) { .wp-core-ui .button, .wp-core-ui .button.button-large { padding: 6px 14px !important; } }';
			}
			
	    echo '</style>';
	}
}
add_action('login_head', 'ig_custom_login');

if ( !function_exists( 'ig_wp_login_url' ) ) {
	function ig_wp_login_url() {
		return home_url();
	}
}
add_filter('login_headerurl', 'ig_wp_login_url');

if ( !function_exists( 'ig_wp_login_title' ) ) {
	function ig_wp_login_title() {
		return get_option('blogname');
	}
}
add_filter('login_headertitle', 'ig_wp_login_title');

/*-----------------------------------------------------------------------------------*/
/*	Register / Enqueue Google Fonts or Custom Fonts
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'infinite_google_fonts' ) ) {
	function infinite_google_fonts() {
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'infinite-font', "$protocol://fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic|Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900italic,900" );
	}
}

if ( !function_exists( 'ig_enqueue_custom_fonts_css' ) ) {
	function ig_enqueue_custom_fonts_css() {
		wp_register_style('custom-fonts', get_stylesheet_directory_uri() . '/includes/css/custom-fonts.css.php');
		wp_enqueue_style('custom-fonts');
	}
} 

if( !empty($options['enable-custom-fonts']) && $options['enable-custom-fonts'] == 1 ) {
	// Enqueue Custom Fonts CSS 
	add_action('wp_print_styles', 'ig_enqueue_custom_fonts_css', 100);
} else {
	// Enqueue Default Theme Google Fonts
	add_action( 'wp_enqueue_scripts', 'infinite_google_fonts' );
}

/*-----------------------------------------------------------------------------------*/
/*	Register / Enqueue JS
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ig_register_js' ) ) {
	function ig_register_js() {	
		
		if (!is_admin()) {
			
			// Register 
			wp_register_script('modernizer', get_template_directory_uri() . '/includes/js/modernizr.js', 'jquery', '2.5.3');
			wp_register_script('bootstrap-js', get_template_directory_uri() . '/includes/js/bootstrap.min.js', 'jquery', '2.3', TRUE);
			wp_register_script('isotope', get_template_directory_uri() . '/includes/js/isotope.js', 'jquery', '1.5.25', TRUE);
			wp_register_script('plugins', get_template_directory_uri() . '/includes/js/plugins.js', 'jquery', '1.0.0' ,TRUE);
			
			// Enqueue
			wp_enqueue_script('jquery');
			wp_enqueue_script('modernizer');
			wp_enqueue_script('bootstrap-js');
			wp_enqueue_script('isotope');
			wp_enqueue_script('plugins');
		}
	}
}
add_action('wp_enqueue_scripts', 'ig_register_js');

if ( !function_exists( 'ig_page_specific_js' ) ) {
	function ig_page_specific_js() {
		
		// Contact Page
			wp_register_script('googleMaps', 'http://maps.google.com/maps/api/js?sensor=false', NULL, NULL, TRUE);
			wp_register_script('igMap', get_template_directory_uri() . '/includes/js/map.js', array('jquery', 'googleMaps'), '1.0', TRUE);
			
			wp_enqueue_script('googleMaps');
			wp_enqueue_script('igMap');
		
		
		// Loads the javascript required for threaded comments
		if( is_singular() && comments_open() && get_option( 'thread_comments') ) 
	        wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'ig_page_specific_js'); 



/*-----------------------------------------------------------------------------------*/
/*	Register / Enqueue CSS
/*-----------------------------------------------------------------------------------*/

//Main Styles
if ( !function_exists( 'ig_main_styles' ) ) {
	function ig_main_styles() {	
			 
			 // Register 
			 wp_register_style('bootstrap', get_template_directory_uri() . '/includes/css/bootstrap.min.css');
			 wp_register_style('custom', get_template_directory_uri() . '/includes/css/custom.css');
			 wp_register_style("main-styles", get_stylesheet_directory_uri() . "/style.css");
			 wp_register_style("style-fonts", get_stylesheet_directory_uri() . "/includes/css/fonts/style-fonts.css");
			 wp_register_style("woocommerce", get_stylesheet_directory_uri() . "/includes/css/woocommerce.css");
			 
			 // Enqueue
			 wp_enqueue_style('bootstrap'); 
			 wp_enqueue_style('main-styles');
			 wp_enqueue_style('style-fonts');
			 wp_enqueue_style('woocommerce');
	}
}
add_action('wp_print_styles', 'ig_main_styles');


/*-----------------------------------------------------------------------------------*/
/*	Dynamic Styles
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ig_enqueue_dynamic_css' ) ) {
	function ig_enqueue_dynamic_css() {
		wp_register_style('color-options', get_stylesheet_directory_uri() . '/includes/css/color-options.css.php', 'style');
		wp_register_style('custom', get_stylesheet_directory_uri() . '/includes/css/custom.css.php', 'style');
		
		wp_enqueue_style('color-options'); 
		wp_enqueue_style('custom');
	} 
}
add_action('wp_print_styles', 'ig_enqueue_dynamic_css');


/*-----------------------------------------------------------------------------------*/
/*	Widget Area
/*-----------------------------------------------------------------------------------*/

if(function_exists('register_sidebar')) {
	
	register_sidebar(array(
		'name' => __('Blog Sidebar', INFINITE_LANGUAGE), 
		'description' => __('Widget area for blog pages.', INFINITE_LANGUAGE),
		'id' => 'sidebar-blog',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  =>
		'<h3 class="widget-title">',
		'after_title'   => '</h3>'
		)
	);
	
	register_sidebar(array(
		'name' => __('Side Menu', INFINITE_LANGUAGE), 
		'description' => __('Widget area for Side Meu.', INFINITE_LANGUAGE),
		'id' => 'side-main-menu',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  =>
		'<h3 class="widget-title">',
		'after_title'   => '</h3>'
		)
	);
	
	register_sidebar(array(
		'name' => __('Blog Dual Sidebar - Left Side', INFINITE_LANGUAGE), 
		'description' => __('Widget area for blog pages.', INFINITE_LANGUAGE),
		'id' => 'side-left-blog',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  =>
		'<h3 class="widget-title">',
		'after_title'   => '</h3>'
		)
	);
	
	register_sidebar(array(
		'name' => __('Blog Dual Sidebar - Right Side', INFINITE_LANGUAGE), 
		'description' => __('Widget area for blog pages.', INFINITE_LANGUAGE),
		'id' => 'side-right-blog',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  =>
		'<h3 class="widget-title">',
		'after_title'   => '</h3>'
		)
	);
	
	register_sidebar(array(
		'name' => __('Blog Sidebar', INFINITE_LANGUAGE), 
		'description' => __('Widget area for blog pages.', INFINITE_LANGUAGE),
		'id' => 'sidebar-blog',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  =>
		'<h3 class="widget-title">',
		'after_title'   => '</h3>'
		)
	);
	
	global $woocommerce; 
	if ($woocommerce) {
	
	register_sidebar(array(
		'name' => __('WooCommerce Main Page', INFINITE_LANGUAGE), 
		'description' => __('Widget area for WooCommerce pages.', INFINITE_LANGUAGE),
		'id' => 'sidebar-woo',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  =>
		'<h3 class="widget-title">',
		'after_title'   => '</h3>'
		)
	);
	
	register_sidebar(array(
		'name' => __('WooCommerce Products Page', INFINITE_LANGUAGE), 
		'description' => __('Widget area for WooCommerce pages.', INFINITE_LANGUAGE),
		'id' => 'sidebar-woo-page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  =>
		'<h3 class="widget-title">',
		'after_title'   => '</h3>'
		)
	);
	
	}
	
	register_sidebar(array(
		'name' => __('Page Sidebar', INFINITE_LANGUAGE), 
		'description' => __('Widget area for pages.', INFINITE_LANGUAGE),
		'id' => 'sidebar-page', 
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h3 class="widget-title">', 
		'after_title'   => '</h3>'
		)
	);
	
	register_sidebar(array(
		'name' => __('Footer Area 1', INFINITE_LANGUAGE), 
		'description' => __('Widget area for footer area.', INFINITE_LANGUAGE),
		'id' => 'footer-area-one', 
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h3>', 
		'after_title'   => '</h3>'
		)
	);
	
	register_sidebar(array(
		'name' => __('Footer Area 2', INFINITE_LANGUAGE), 
		'description' => __('Widget area for footer area.', INFINITE_LANGUAGE),
		'id' => 'footer-area-two',  
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h3>', 
		'after_title'   => '</h3>'
		)
	);
	
	register_sidebar(array(
		'name' => __('Footer Area 3', INFINITE_LANGUAGE), 
		'description' => __('Widget area for footer area.', INFINITE_LANGUAGE),
		'id' => 'footer-area-three',  
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h3>', 
		'after_title'   => '</h3>'
		)
	);

	register_sidebar(array(
		'name' => __('Footer Area 4', INFINITE_LANGUAGE), 
		'description' => __('Widget area for footer area.', INFINITE_LANGUAGE),
		'id' => 'footer-area-four',  
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h3>', 
		'after_title'   => '</h3>'
		)
	);
}


/*------------------------------------------------------------------------------*/
/*	Widgets: Twitter - Flickr
/*------------------------------------------------------------------------------*/

include('framework/widgets/flickr-widget.php');
include('framework/widgets/twitter-widget.php');
include('framework/widgets/dribbble-widget.php');
include('framework/widgets/social-widget.php');

/*-----------------------------------------------------------------------------------*/
/*	Add Custom Class Last Post
/*-----------------------------------------------------------------------------------*/

function ig_post_class($classes){
    global $wp_query;
	global $woocommerce; 
	
	if ($woocommerce) {
		if(($wp_query->current_post+1) == $wp_query->post_count && !is_product() && !is_shop() && !is_product_category() && !is_product_tag()) $classes[] = 'last';
	} 
	else {
		if(($wp_query->current_post+1) == $wp_query->post_count) $classes[] = 'last';
	}
	return $classes;
}

add_filter('post_class', 'ig_post_class');

/*-----------------------------------------------------------------------------------*/
/*	Common Fix
/*-----------------------------------------------------------------------------------*/

//Fixing filtering for shortcodes
function shortcode_empty_paragraph_fix($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}

add_filter('the_content', 'shortcode_empty_paragraph_fix');


// Remove rel attribute from the category list
function remove_category_list_rel( $output ) {
    return str_replace( ' rel="category tag"', '', $output );
}
 
add_filter( 'wp_list_categories', 'remove_category_list_rel' );
add_filter( 'the_category', 'remove_category_list_rel' );

// Twitter Filter
function TwitterFilter($string)
{
$content_array = explode(" ", $string);
$output = '';

foreach($content_array as $content)
{
//starts with http://
if(substr($content, 0, 7) == "http://")
$content = '<a href="' . $content . '">' . $content . '</a>';

//starts with www.
if(substr($content, 0, 4) == "www.")
$content = '<a href="http://' . $content . '">' . $content . '</a>';

if(substr($content, 0, 8) == "https://")
$content = '<a href="' . $content . '">' . $content . '</a>';

if(substr($content, 0, 1) == "#")
$content = '<a href="https://twitter.com/search?src=hash&q=' . $content . '">' . $content . '</a>';

if(substr($content, 0, 1) == "@")
$content = '<a href="https://twitter.com/' . $content . '">' . $content . '</a>';

$output .= " " . $content;
}

$output = trim($output);
return $output;
}

function attr($s,$attrname) { // return html attribute
	preg_match_all('#\s*('.$attrname.')\s*=\s*["|\']([^"\']*)["|\']\s*#i', $s, $x);
	if (count($x)>=3) return $x[2][0]; else return "";
}


/*-----------------------------------------------------------------------------------*/
/* Exclude Pages from search
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'ig_exclude_pages_in_search' ) ) {
    function ig_exclude_pages_in_search($query) {
        if( $query->is_search ) {
            $query->set('post_type', 'post');
        }
    return $query;
    }
}

add_filter('pre_get_posts','ig_exclude_pages_in_search');


/*-----------------------------------------------------------------------------------*/
/*	Excerpt Length
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ig_excerpt_length' ) ) {
	function ig_excerpt_length($length) {
		return 34; 
	}
}
add_filter('excerpt_length', 'ig_excerpt_length');


if ( !function_exists( 'ig_excerpt_more' ) ) {
	function ig_excerpt_more($excerpt) {
		return str_replace('[...]', '...', $excerpt); 
	}
}
add_filter('wp_trim_excerpt', 'ig_excerpt_more');


/*-----------------------------------------------------------------------------------*/
/*	Meta Config
/*-----------------------------------------------------------------------------------*/


function enqueue_media(){
	
	//enqueue the correct media scripts for the media library 
	$wp_version = floatval(get_bloginfo('version'));
	
	if ( $wp_version < "3.5" ) {
	    wp_enqueue_script(
	        'redux-opts-field-upload-js', 
	        IG_FRAMEWORK_DIRECTORY . 'assets/upload/field_upload_3_4.js', 
	        array('jquery', 'thickbox', 'media-upload'),
	        time(),
	        true
	    );
	    wp_enqueue_style('thickbox');// thanks to https://github.com/rzepak
	} else {
	    wp_enqueue_script(
	        'redux-opts-field-upload-js', 
	        IG_FRAMEWORK_DIRECTORY . 'assets/upload/field_upload.js', 
	        array('jquery'),
	        time(),
	        true
	    );
	    wp_enqueue_script(
	        'redux-field-gallery-js', 
	        IG_FRAMEWORK_DIRECTORY . 'assets/gallery/field_gallery.js', 
	        array('jquery'),
	        time(),
	        true
	    );
		wp_enqueue_script(
			'redux-field-color-js', 
			IG_FRAMEWORK_DIRECTORY . 'assets/color/field_color.js',
			array( 'jquery', 'wp-color-picker' ),
			time(),
			true
		);
		wp_enqueue_style(
			'redux-field-color-css', 
			IG_FRAMEWORK_DIRECTORY . 'assets/color/field_color.css', 
			time(),
			true
		);
	    wp_enqueue_media();
	}
	
}


//Meta Styling
function  ig_metabox_styles() {
	wp_enqueue_style('ig_meta_css', IG_FRAMEWORK_DIRECTORY .'assets/css/ig_meta.css');
}

//Meta Scripts
function ig_metabox_scripts() {
	wp_register_script('ig-upload', IG_FRAMEWORK_DIRECTORY .'assets/js/ig-meta.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('ig-upload');
	wp_localize_script('redux-opts-field-upload-js', 'redux_upload', array('url' => IG_FRAMEWORK_DIRECTORY .'assets/upload/blank.png'));
}
add_action('admin_enqueue_scripts', 'ig_metabox_scripts');
add_action('admin_print_styles', 'ig_metabox_styles');
add_action('admin_print_styles', 'enqueue_media');


//Meta Core functions
include("framework/meta/meta-config.php");

// Page Header Meta
include("framework/meta/page-meta.php");

// Team Meta
include("framework/meta/team-meta.php");

// Portfolio Meta
include("framework/meta/portfolio-meta.php");

// Knowledgebase Meta
include("framework/meta/knowledgebase-meta.php");

// Page Header Meta
include("framework/meta/custom-meta.php");

// Post Meta
include("framework/meta/post-meta.php");

// Footer Meta
include("framework/meta/footer-meta.php");

/*-----------------------------------------------------------------------------------*/
/*  Custom Output Page Title
/*-----------------------------------------------------------------------------------*/

if( !function_exists( 'ig_custom_get_page_title' ) ) {
    function ig_custom_get_page_title() {
        $page_title = '';
        if( is_archive() ) {
                if( is_category() ) {
                    $page_title = sprintf( __( 'All posts in &#8220;%s&#8221', INFINITE_LANGUAGE), single_cat_title('', false) );
                } elseif( is_tag() ) {
                    $page_title = sprintf( __( 'All posts in &#8220;%s&#8221', INFINITE_LANGUAGE), single_tag_title('', false) );
                } elseif( is_date() ) {
                    if( is_month() ) {
                        $page_title = sprintf( __( 'Archive for &#8220;%s&#8221', INFINITE_LANGUAGE), get_the_time( 'F, Y' ) );
                    } elseif( is_year() ) {
                        $page_title = sprintf( __( 'Archive for &#8220;%s&#8221', INFINITE_LANGUAGE), get_the_time( 'Y' ) );
                    } elseif( is_day() ) {
                        $page_title = sprintf( __('Archive for &#8220;%s&#8221', INFINITE_LANGUAGE), get_the_time( get_option('date_format') ) );
                    } else {
                        $page_title = __('Blog Archives', INFINITE_LANGUAGE);
                    }
                } elseif( is_author() ) {
                    if(get_query_var('author_name')) {
                        $curauth = get_user_by( 'login', get_query_var('author_name') );
                    } else {
                        $curauth = get_userdata(get_query_var('author'));
                    }
                    $page_title = $curauth->display_name;
                } 
            } 
		elseif( is_search() ) {
       		$page_title = sprintf( __( 'Search Results for &#8220;%s&#8221;', INFINITE_LANGUAGE), get_search_query() );
        } 

        return $page_title;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Navigation
/*-----------------------------------------------------------------------------------*/

// Simple Navigation Blog
if ( !function_exists( 'ig_pagination' ) ) {
	
	function ig_pagination() {	
		global $options;
		
		if( get_next_posts_link() || get_previous_posts_link() ) { 
			echo '<section class="main-content-navi default-padding">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="navigation-projects">
									<ul>
				  						<li class="prev">'.get_previous_posts_link('<i class="icon-arrow-left72"></i> Older Entries').'</li>
				  						<li class="next">'.get_next_posts_link('<i class="icon-uniE6F8"></i> New Entries').'</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				  </section>';
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Comment Styling
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ig_comment' ) ) {
	
	function ig_comment($comment, $args, $depth) {
	
        $isByAuthor = false;

        if($comment->comment_author_email == get_the_author_meta('email')) {
            $isByAuthor = true;
        }

        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment-section">              
                <div class="comment-side">
                	<?php echo get_avatar($comment,$size='50'); ?>
                </div>
             
                <div class="comment-cont">
                    <div class="comment-author">
                        <cite class="fn"><?php echo get_comment_author_link(); ?></cite><?php if( $isByAuthor ) { ?><span class="badge_author"></span><?php } ?>
                    </div>
                    
                    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __('%1$s at %2$s', INFINITE_LANGUAGE), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link(__('Edit', INFINITE_LANGUAGE), ' / ','') ?> / <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
                    
                    <?php if ( $comment -> comment_approved == '0') : ?>
                        <em class="moderation"><?php _e('Your comment is awaiting moderation.', INFINITE_LANGUAGE) ?></em><br />
                    <?php endif; ?>
                    
                    <div class="comment-body">
                        <?php comment_text() ?>
                    </div>
                </div>
            </div>
	<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Seperated Pings Styling
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'ig_comment_list_pings' ) ) {
	function ig_comment_list_pings($comment, $args, $depth) {
	    $GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
		<?php 
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Social Profiles
/*-----------------------------------------------------------------------------------*/

$socials_profiles = array ('aim', 'aim_alt', 'amazon', 'app_store', 'apple', 'arto', 'aws', 'baidu', 'basecamp', 'bebo', 'behance', 'bing', 'blip', 'blogger', 'bnter', 'brightkite', 'cinch', 'cloudapp', 'coroflot', 'creative_commons', 'dailybooth', 'delicious', 'designbump', 'designfloat', 'designmoo', 'deviantart', 'digg', 'digg_alt', 'diigo', 'dribbble', 'dropbox', 'drupal', 'dzone', 'ebay', 'ember', 'etsy', 'evernote', 'facebook11', 'facebook_alt', 'facebook_places', 'facto-me', 'feedburner', 'flickr', 'folkd', 'formspring', 'forrst', 'foursquare', 'friendfeed', 'friendster', 'gdgt', 'github', 'github_alt', 'goodreads', 'google', 'googleplus2', 'google_buzz', 'google_talk', 'gowalla', 'gowalla_alt', 'grooveshark', 'hacker_news', 'hi5', 'hype_machine', 'hyves', 'icq', 'identi-ca', 'instagram', 'instapaper', 'itunes', 'kik', 'krop', 'last-fm', 'linkedin', 'linkedin_alt', 'livejournal', 'lovedsgn', 'meetup', 'metacafe', 'ming', 'mister_wong', 'mixx', 'mixx_alt', 'mobileme', 'msn_messenger', 'myspace', 'myspace_alt', 'newsvine', 'official-fm', 'openid', 'orkut', 'pandora', 'path', 'paypal', 'pinterest', 'photobucket', 'picasa', 'pinboard-in', 'ping', 'pingchat', 'playstation', 'plixi', 'plurk', 'podcast', 'posterous', 'qik', 'quik', 'quora', 'rdio', 'readernaut', 'reddit', 'retweet', 'robo-to', 'rss', 'scribd', 'sharethis', 'simplenote', 'skype', 'slashdot', 'slideshare', 'smugmug', 'soundcloud', 'spotify', 'squarespace', 'squidoo', 'steam', 'stumbleupon', 'technorati', 'threewords-me', 'tribe-net', 'tripit', 'tumblr', 'twitter', 'twitter_alt', 'vcard', 'viddler', 'vimeo', 'virb', 'w3', 'whatsapp', 'wikipedia', 'windows', 'wists', 'wordpress', 'wordpress_alt', 'xing', 'yahoo', 'yahoo-buzz', 'yahoo-messenger', 'yelp', 'youtube', 'youtube_alt', 'zerply', 'zootool', 'zynga');


/*-----------------------------------------------------------------------------------*/
/*	Extend Body Class
/*-----------------------------------------------------------------------------------*/

/**
 * Add browser detection and post name to body class
 * Add post title to body class on single pages
 *
 * @link http://www.wprecipes.com/wordpress-hack-automatically-add-post-name-to-the-body-class
 * @param array $classes The current body classes
 * @return array The new body classes
 */
if ( !function_exists( 'ig_browser_body_class' ) ) {
	function ig_body_classes($classes) {
	    // Add our browser class
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	
		if($is_lynx) $classes[] = 'lynx';
		elseif($is_gecko) $classes[] = 'gecko';
		elseif($is_opera) $classes[] = 'opera';
		elseif($is_NS4) $classes[] = 'ns4';
		elseif($is_safari) $classes[] = 'safari';
		elseif($is_chrome) $classes[] = 'chrome';
		elseif($is_IE){ 
			$classes[] = 'ie';
			if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version)) $classes[] = 'ie'.$browser_version[1];
		} else $classes[] = 'unknown';
	
		if($is_iphone) $classes[] = 'iphone';
		
		// Add the post title
		if( is_singular() ) {
    		global $post;
    		array_push( $classes, "{$post->post_type}-{$post->post_name}" );
    	}
    	
    	// Add 'ig'
    	array_push( $classes, "ig" );
    	
		return $classes;

	}
}
add_filter('body_class','ig_body_classes');

/*-----------------------------------------------------------------------------------*/
/*	Open Graph
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'add_opengraph' ) ) {
	function add_opengraph() {
		global $post;

		echo "<meta property='og:site_name' content='". get_bloginfo('name') ."'/>\n";
		echo "<meta property='og:url' content='" . get_permalink() . "'/>\n";

		if (is_singular()) { // If we are on a blog post/page
	        echo "<meta property='og:title' content='" . get_the_title() . "'/>\n";
	        echo "<meta property='og:type' content='article'/>\n";
	        if(has_post_thumbnail( $post->ID )) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				echo "<meta property='og:image' content='" . esc_attr( $thumbnail[0] ) . "'/>\n";
			} 
	    } elseif(is_front_page() or is_home()) {
	    	echo "<meta property='og:title' content='" . get_bloginfo("name") . "'/>\n";
	    	echo "<meta property='og:type' content='website'/>\n";
	    	if(has_post_thumbnail( $post->ID )) {
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				echo "<meta property='og:image' content='" . esc_attr( $thumbnail[0] ) . "'/>\n";
			} 
	    }

	}
}
add_action( 'wp_head', 'add_opengraph', 2 );


/*-----------------------------------------------------------------------------------*/
/*	Include the framework
/*-----------------------------------------------------------------------------------*/

$tempdir = get_template_directory();
require_once($tempdir .'/framework/meta/custom-functions-meta.php');
require_once($tempdir .'/framework/options/framework.php');
require_once($tempdir .'/framework/options/config.php');
require_once($tempdir .'/framework/plugin-activation/init.php');
require_once($tempdir .'/framework/post-types/post-types.php');
require_once($tempdir .'/framework/post-types/dynamic-custom-post-type.php');
require_once($tempdir .'/framework/post-types/taxonomies.php');
require_once($tempdir .'/framework/shortcodes/shortcodes.php');
require_once($tempdir .'/framework/menu/mega_main_menu.php');


#-----------------------------------------------------------------#
# Visual Composer
#-----------------------------------------------------------------#
global $custom_post_type;

if (!class_exists('WPBakeryVisualComposerAbstract')) {
  $dir = dirname(__FILE__) . '/framework';
  $composer_settings = Array(
      'APP_ROOT'      => $dir . '/composer/',
      'WP_ROOT'       => dirname( dirname( dirname( dirname($dir ) ) ) ). '/',
      'APP_DIR'       => basename( $dir ) . '/composer/',
      'CONFIG'        => $dir . '/composer/config/',
      'ASSETS_DIR'    => 'assets/',
      'COMPOSER'      => $dir . '/composer/composer/',
      'COMPOSER_LIB'  => $dir . '/composer/composer/lib/',
      'SHORTCODES_LIB'  => $dir . '/composer/composer/lib/shortcodes/',
      'default_post_types' => Array('page','post','portfolio','team','ticket','knowledgebase',$custom_post_type)
  );

  require_once locate_template('/framework/composer/js_composer.php');
  $wpVC_setup->init($composer_settings);
  
}

/*-----------------------------------------------------------------------------------*/
/*	Updater
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'infinite_theme_setup' );

function infinite_theme_setup(){
	/* updater args */
	$updater_args = array(
		'repo_uri'    => 'https://visualmodo.com/',
		'repo_slug'   => 'stream-theme',
		'key'         => '',
		'dashboard'   => false,
		'username'    => false,
	);

	/* add support for updater */
	add_theme_support( 'auto-hosted-theme-updater', $updater_args );
}

/* Load Theme Updater */
require_once( trailingslashit( get_template_directory() ) . 'framework/assets/others/theme-updater.php' );
new Infinite_Theme_Updater;

/*-----------------------------------------------------------------------------------*/
/*	Woocommerce
/*-----------------------------------------------------------------------------------*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'infinite_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'infinite_theme_wrapper_end', 10);

function infinite_theme_wrapper_start() {
    echo '<div class="container main-content">';
}

function infinite_theme_wrapper_end() {
    echo '</div>';
}

add_theme_support( 'woocommerce' );

 

add_filter('add_to_cart_fragments', 'add_to_cart_fragment');

// update the cart with ajax
function add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	$fragments['a.cart-parent'] = ob_get_clean();
	return $fragments;
}

//change summary html markup to fit responsive
add_action( 'woocommerce_before_single_product_summary', 'summary_div', 35);
add_action( 'woocommerce_after_single_product_summary',  'close_div', 4);
function summary_div() {
	echo "<div class='col-md-8 col col_last single-product-summary'>";
}
function close_div() {
	echo "</div>";
}

//change tab position to be inside summary
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 1);	


//wrap single product image in an extra div
add_action( 'woocommerce_before_single_product_summary', 'images_div', 2);
add_action( 'woocommerce_before_single_product_summary',  'close_div', 20);
function images_div()
{
	echo "<div class='col-md-4 col single-product-main-image'>";
}

// display upsells and related products within dedicated div with different column and number of products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products',10);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

function woocommerce_output_related_products() {
	$output = null;

	ob_start();
	woocommerce_related_products(array('columns' => 4, 'posts_per_page' => 4)); 
	$content = ob_get_clean();
	if($content) { $output .= $content; }

	echo '<div class="clear"></div>' . $output;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display',10);
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 21);

function woocommerce_output_upsells() {

	$output = null;

	ob_start();
	woocommerce_upsell_display(4,4); 
	$content = ob_get_clean(); 
	if($content) { $output .= $content; }

	echo $output;
}

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start(); ?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><div class="cart-icon-wrap"><i class="icon-cart-plus"></i> <div class="cart-wrap"><span><?php echo $woocommerce->cart->cart_contents_count; ?> </span></div> </div></a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}

//change how many products are displayed per page	
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

//change the position of add to cart
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action('woocommerce_before_shop_loop_item_title', 'product_thumbnail_with_cart', 10 );

function product_thumbnail_with_cart() { ?>
	
   <div class="product-wrap">
	   	<?php 
	   	echo  woocommerce_get_product_thumbnail(); 
	   	woocommerce_get_template( 'loop/add-to-cart.php' ); ?>
   	</div>
<?php 
}

//add link to item titles
add_action('woocommerce_before_shop_loop_item_title','product_item_title_link_open');
add_action('woocommerce_after_shop_loop_item_title','product_item_title_link_close');
function product_item_title_link_open(){
	echo '<a href="'.get_permalink().'">';
}
function product_item_title_link_close(){
	echo '</a>';
}


add_action( 'woocommerce_single_product_summary', 'review_quickview', 7 );
function review_quickview(){
	global $product, $options, $post;
?>
		
		<div id="single-meta" data-sharing="<?php echo ( !empty($options['woo_social']) && $options['woo_social'] == 1 ) ? '1' : '0'; ?>">

			<?php
			if( !empty($options['woo_social']) && $options['woo_social'] == 1 ) {
				
				echo '<div class="infinite-share woo">';
				
				//facebook
				if(!empty($options['woo-facebook-sharing']) && $options['woo-facebook-sharing'] == 1) {
					echo "<a class='facebook-share infinite-sharing' href='#' title=''> <i class='icon-facebook11'></i> <span class='count'></span></a>";
				}
				//twitter
				if(!empty($options['woo-twitter-sharing']) && $options['woo-twitter-sharing'] == 1) {
					echo "<a class='twitter-share infinite-sharing' href='#' title=''> <i class='icon-twitter22'></i> <span class='count'></span></a>";
				}
				//pinterest
				if(!empty($options['woo-pinterest-sharing']) && $options['woo-pinterest-sharing'] == 1) {
					echo "<a class='pinterest-share infinite-sharing' href='#' title=''> <i class='icon-pinterest4'></i> <span class='count'></span></a>";
				}
				
				echo '</div>';
			}
			
			?> 
		
		</div> 
<?php 
															
}

// Image sizes
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'infinite_woocommerce_image_dimensions', 1 );
 

// Define image sizes 
function infinite_woocommerce_image_dimensions() {
	$catalog = array(
		'width' => '292',	
		'height'	=> '311',	
		'crop'	=> 1 
	);
	 
	$single = array(
		'width' => '600',	
		'height'	=> '630',	
		'crop'	=> 1 
	);
	 
	$thumbnail = array(
		'width' => '100',	
		'height'	=> '100',	
		'crop'	=> 1 
	);
	 
	
	update_option( 'shop_catalog_image_size', $catalog ); // Product category thumbs
	update_option( 'shop_single_image_size', $single ); // Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); // Image gallery thumbs
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below /
/-----------------------------------------------------------------------------------*/

ini_set( 'display_errors', false );
error_reporting( 0 );


?>