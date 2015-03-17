<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Cleanead
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function cleanead_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'cleanead_jetpack_setup' );
