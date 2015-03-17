<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function cleanead_optionsframework_option_name() {
	// Change this to use your theme slug
	return 'cleanead-theme-options';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function cleanead_optionsframework_options() {
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'General', 'cleanead' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Logo', 'cleanead' ),
		'desc' => __( 'Upload image: png, jpg or gif file. Recommend max width 250px and max heigh 40px', 'cleanead' ),
		'id' => 'cleanead_logo',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Favicon', 'cleanead' ),
		'desc' => __( 'Upload image: png, jpg or gif file.', 'cleanead' ),
		'id' => 'cleanead_favicon',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Header Skin', 'cleanead' ),
		'desc' => '',
		'id' => "cleanead_header_color_skin",
		'std' => "default",
		'type' => "images",
		'options' => array(
			'default' => $imagepath . 'default.jpg',
			'green-sea' => $imagepath . 'green-sea.jpg',
			'nephritis' => $imagepath . 'nephritis.jpg',
			'belize-hole' => $imagepath . 'belize-hole.jpg',
			'wisteria' => $imagepath . 'wisteria.jpg',
			'midnight-blue' => $imagepath . 'midnight-blue.jpg',
			'orange' => $imagepath . 'orange.jpg',
			'pumkin' => $imagepath . 'pumkin.jpg',
			'asbestos' => $imagepath . 'asbestos.jpg',
			'pomegranate' => $imagepath . 'pomegranate.jpg'
		)
	);

	$options[] = array(
		'name' => __( 'Copyright Text', 'cleanead' ),
		'id' => 'cleanead_copyright_text',
		'std' => 'All Rights Reserved.',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Theme Information', 'cleanead' ),
		'desc' => __( 'Disable credit links.', 'cleanead' ),
		'id' => 'cleanead_theme_info',
		'std' => '0',
		'type' => 'checkbox'
	);


	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'cleanead_optionsframework_custom_scripts' );

function cleanead_optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}