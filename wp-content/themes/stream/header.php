<?php $options = get_option('infinite_options');
global $mega_main_menu;

$animation_effects_options = null;
if( !empty($options['enable-animation-effects']) && $options['enable-animation-effects'] == 1) { 
	$animation_effects_options = 'animation-effects-enabled'; 
} else { 
	$animation_effects_options = 'no-animation-effects';
} 
?>
<!DOCTYPE html>
<!--[if gte IE 9]>
<html class="no-js lt-ie9 animated-content no-animation no-animation-effects" lang="en-US">     
<![endif]-->
<html <?php language_attributes(); ?> class="<?php echo $animation_effects_options; ?>">
<head>
<!-- Google Analytics -->
<?php if(!empty($options['tracking-code'])) echo $options['tracking-code']; ?> 
<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on"><![endif]-->

<?php
	$header_wide_fullwidth = get_post_meta($post->ID, '_ig_header_wide_fullwidth', true);
	$header_menu_overlap = get_post_meta($post->ID, '_ig_header_menu_overlap', true);
	$header_menu_overlap_image = get_post_meta($post->ID, '_ig_header_bg', true);
	$rev_slider_alias = get_post_meta($post->ID, '_ig_intro_slider_header', true);
	$extra_menu = get_post_meta($post->ID, '_ig_extra_menu', true);
	
	if( !empty($rev_slider_alias) && $header_menu_overlap == "on") {
		$header_menu_overlap = 'header-menu-overlap';
	}
	
	elseif( !empty($header_menu_overlap_image) && $header_menu_overlap == "on") {
		$header_menu_overlap = 'header-menu-overlap-image';
	}
	
	else {
		$header_menu_overlap = '';
	}
	
	if ($options['menu_fullwidth_container'] == '1' || $header_wide_fullwidth == '1') { 
		$header_wide_fullwidth_container = 'header-wide-fullwidth-container';
	}
	
	else {
		$header_wide_fullwidth_container = '';
	}

if(!empty($options['favicon']['url'])) { ?>
<!--Shortcut icon-->
<link rel="shortcut icon" href="<?php echo $options['favicon']['url']; ?>" />
<?php } ?>

<!-- Title -->
<title><?php wp_title(''); ?></title>

<!-- RSS & Pingbacks -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Oswald|Montserrat:400,700|Fjalla+One' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Start Wrap All -->
<?php
$boxed = null;
if(!empty($options['enable-boxed-layout']) && $options['enable-boxed-layout'] == '1') { 
    $boxed = ' boxed'; 
} 
?>
<!-- Start Side Menu -->
<?php if( $options['side_menu_include_component'] == '1' ) {
		//generate side area classes
		$side_area_classes = '';

		if(isset($qode_options_proya['side_area_close_icon_style']) && $qode_options_proya['side_area_close_icon_style'] != '') {
			$side_area_classes .= $qode_options_proya['side_area_close_icon_style'];
		}

	?>
		<section class="primary-side-menu">
            <?php 
                    if(has_nav_menu('side_menu')) {
						echo wp_nav_menu( array( "theme_location" => "side_menu" ) );
                    }
			?>
					<div class="sidebar-side-menu">
						<aside id="sidebar">
                        	<?php dynamic_sidebar( 'side-main-menu' ); ?>
                        </aside>
                    </div>	
		</section>
<?php } ?>
<!-- End Side Menu -->
<div class="wrap_all<?php echo $boxed; ?>">

<!-- Header -->
<?php


$header_class = null;
$main_class = null;

if($options['sticky_menu'] != '1'){
    $header_class = 'normal-header';
    $main_class = 'normal-header-enabled';
} 
elseif( !empty($rev_slider_alias) && $options['sticky_menu'] == '1') {
	$header_class = 'sticky-header sticky-header-with-slider';
    $main_class = 'sticky-header-enabled sticky-header-enabled-with-slider';
}

elseif( $header_menu_overlap  == 'header-menu-overlap-image') {
	$header_class = 'sticky-header sticky-header-with-slider';
    $main_class = 'sticky-header-enabled sticky-header-enabled-with-slider';
}
	
else {
	$header_class = 'sticky-header';
    $main_class = 'sticky-header-enabled';
}
?>
<header class="<?php echo $header_class .' '.  $header_menu_overlap ?>">
	<div class="container <?php echo $header_wide_fullwidth_container; ?>">
    	<div class="row">
        <?php 
				if($extra_menu == '') {
                    if(has_nav_menu('primary_menu')) {
						echo wp_nav_menu( array( "theme_location" => "primary_menu" ) );
                    }
                    else {
						echo '<p class="without-menu">No Menu Assigned!</p>';
                    }
				}
				else {
					echo wp_nav_menu( array( "theme_location" => $extra_menu ) );
				}
        ?>
        </div>
    </div>
</header>
<!-- End Header -->
<?php
if( $options['search_include_component'] == '1' ) {
	include('framework/menu/extensions/html_templates/search.php'); 
} 
if( $options['login_include_component'] == '1' ) {
	include('framework/menu/extensions/html_templates/login.php'); 
}
?>
<!-- Start Main -->
<div id="main" class="<?php echo $main_class; ?>">