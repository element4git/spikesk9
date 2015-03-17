<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Cleanead
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'cleanead' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-content">
			<div class="header-bar clear">
				<div class="site-branding">
					<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'description' ); ?>">
						<?php if (cleanead_get_option( 'cleanead_logo' )) : ?>
							<img src="<?php echo esc_url(cleanead_get_option( 'cleanead_logo' )); ?>" alt="<?php bloginfo( 'description' ); ?>" />
	                    <?php else : ?>
	                    <?php bloginfo( 'name' ); ?>
	            		<?php endif; ?></a></h1>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="menu-toggle-wrapper">
						<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'cleanead' ); ?></button>
					</div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu nav-menu clear' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
