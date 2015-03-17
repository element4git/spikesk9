<?php 
if ( ! function_exists( 'cleanead_header_skin' ) ) :
/**
 * Customize favicon
 * 
 */
function cleanead_favicon () {
	if (function_exists('cleanead_get_option') && cleanead_get_option('cleanead_favicon')):
	?>
	<link rel="shortcut icon" href="<?php echo esc_url(cleanead_get_option('cleanead_favicon')); ?>"/>
	<?php
	endif;
}
add_action('wp_head','cleanead_favicon');
endif;

if ( ! function_exists( 'cleanead_header_skin' ) ) :
/**
 * Header skin color
 * 
 */
function cleanead_header_skin() {
	if (function_exists('cleanead_get_option')) {
		cleanead_header_skin_switch(cleanead_get_option('cleanead_header_color_skin'));
	}
}
add_action('wp_head','cleanead_header_skin');
endif;
function cleanead_header_skin_switch($skin_name) {
	switch ($skin_name) {
		case 'green-sea':
			$first_color = '#16a085';
			$second_color = '#1abc9c';
			break;

		case 'nephritis':
			$first_color = '#27ae60';
			$second_color = '#2ecc71';
			break;

			case 'belize-hole':
			$first_color = '#2980b9';
			$second_color = '#3498db';
			break;

		case 'wisteria':
			$first_color = '#8e44ad';
			$second_color = '#9b59b6';
		break;

		case 'midnight-blue':
			$first_color = '#2c3e50';
			$second_color = '#34495e';
		break;

		case 'orange':
			$first_color = '#f39c12';
			$second_color = '#f1c40f';
		break;

		case 'pumkin':
			$first_color = '#d35400';
			$second_color = '#e67e22';
		break;

		case 'pomegranate':
			$first_color = '#c0392b';
			$second_color = '#e74c3c';
		break;

		case 'asbestos':
			$first_color = '#7f8c8d';
			$second_color = '#95a5a6';
		break;
		default:
			$first_color = '#000';
			$second_color = '#333';
			
			break;
	}
	?>
		<style type="text/css">
				.site-header,
				.main-navigation ul ul {
					background: <?php echo $first_color ?>; 
				}
				.site-header .site-branding a,
				.main-navigation .nav-menu li a {
					color: #fff;
				}
				
				.main-navigation .nav-menu li a:hover {
					background: <?php echo $second_color ?>; 
				}
				.main-navigation .nav-menu .current_page_item > a, 
				.main-navigation .nav-menu .current-menu-item > a, 
				.main-navigation .nav-menu .current_page_ancestor > a {
					background: <?php echo $second_color ?>; 
				}
		</style>
	<?php
}
