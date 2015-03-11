<?php 


add_action('add_meta_boxes', 'ig_metabox_page');

function ig_metabox_page(){
    
/*-----------------------------------------------------------------------------------*/
/*	Page Header Setting Meta
/*-----------------------------------------------------------------------------------*/

// Rev Slider

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

// Extra Menus

// Get existing menu locations assignments
$locations = get_registered_nav_menus();
$menu_locations = get_nav_menu_locations();
$num_locations = count( array_keys( $locations ) );

foreach ( $locations as $location => $menu_id ) {
$locations[ $location ] = $nav_menu_selected_id;
break; // There should only be 1
}
if (($exclude_menu = array_search('Primary Side Menu', $locations)) !== false) {
    unset($locations[$exclude_menu]);
}

    $meta_box = array(
		'id' => 'ig-metabox-page-header',
		'title' => __('Page Header Settings', INFINITE_LANGUAGE),
		'description' => __('Here you can configure how your page header will appear.', INFINITE_LANGUAGE),
		'post_type' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('Page Header Settings', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable the Header Page Settings.', INFINITE_LANGUAGE),
					'id' => '_ig_header_settings',
					'type' => 'select',
					'std' => 'enabled',
					'options' => array(
						"enabled" => "Enabled",
						"disabled" => "Disabled"
					)
				),
			array( 
					'name' => __('Extra Menu', INFINITE_LANGUAGE),
					'desc' => __('Select the Menu that you want to show.', INFINITE_LANGUAGE),
					'id' => '_ig_extra_menu',
					'type' => 'select',
					'options' => $locations,
					'std' => ''
				),
			array( 
					'name' => __('Header Layout Option', INFINITE_LANGUAGE),
					'desc' => __('Choose wide or fullwidth.', INFINITE_LANGUAGE),
					'id' => '_ig_header_wide_fullwidth',
					'type' => 'select',
					'std' => '0',
					'options' => array(
						"0" => "Wide",
						"1" => "Fullwidth"
					)
				),
			array( 
					'name' => __('Header Layout Option for slides', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable overlap of the menu for slides.', INFINITE_LANGUAGE),
					'id' => '_ig_header_menu_overlap',
					'type' => 'checkbox_fade',
					'std' => 'on'
				),
			array( 
					'name' => __('Logo Color Style', INFINITE_LANGUAGE),
					'desc' => __('Choose black or white color.', INFINITE_LANGUAGE),
					'id' => '_ig_logo_color',
					'type' => 'select',
					'std' => '0',
					'options' => array(
						"0" => "Black",
						"1" => "White"
					)
				),
			array( 
					'name' => __('Logo Color Style On Sticky Menu With Transparency', INFINITE_LANGUAGE),
					'desc' => __('Choose black or white color.', INFINITE_LANGUAGE),
					'id' => '_ig_logo_color_sticky_menu',
					'type' => 'select',
					'std' => '0',
					'options' => array(
						"0" => "None",
						"1" => "Black",
						"2" => "White"
					)
				),
			array( 
					'name' => __('Logo Color Style On Sticky Menu With Transparency on Mobile', INFINITE_LANGUAGE),
					'desc' => __('Choose black or white color.', INFINITE_LANGUAGE),
					'id' => '_ig_logo_color_sticky_menu_mobile',
					'type' => 'select',
					'std' => '1',
					'options' => array(
						"0" => "None",
						"1" => "Black",
						"2" => "White"
					)
				),
			array( 
					'name' => __('Color Style On Transparent Menu', INFINITE_LANGUAGE),
					'desc' => __('Choose black or white color.', INFINITE_LANGUAGE),
					'id' => '_ig_color_transparent_menu',
					'type' => 'select',
					'std' => '0',
					'options' => array(
						"0" => "None",
						"1" => "Black",
						"2" => "White"
					)
				),
			array( 
					'name' => __('Page Header Height', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number for your height (padding-top and padding-bottom) of page header. Default 100.<br/>
								  <strong>Not works if you use a slider</strong>.', INFINITE_LANGUAGE),
					'id' => '_ig_header_height',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Page Header Image', INFINITE_LANGUAGE),
					'desc' => __('Upload your image should be between 1600px x 800px (or more) for best results.', INFINITE_LANGUAGE),
					'id' => '_ig_header_bg',
					'type' => 'file',
					'std' => ''
				),
			array( 
					'name' => __('Page Header Background Overlay', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable Overlay Background.', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay',
					'type' => 'checkbox_fade',
					'std' => 'on'
				),
			array( 
					'name' => __('Page Header Background Opacity Overlay', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number 0 - 1 for your background color opacity. Default 0.70', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay_bg_opacity',
					'type' => 'opacity',
					'std' => ''
				),
			array( 
					'name' => __('Page Header Background Color Overlay', INFINITE_LANGUAGE),
					'desc' => __('Optional. Choose a background color overlay for your title block.', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay_bg_color',
					'type' => 'color',
					'std' => ''
				),
			array( 
					'name' => __('Page Header Image Background Attachment', INFINITE_LANGUAGE),
					'desc' => __('Background Image Attachment.', INFINITE_LANGUAGE),
					'id' => '_ig_header_bg_attachment',
					'type' => 'select',
					'std' => 'fixed',
					'options' => array(
						"scroll" => "Scroll",
						"fixed" => "Fixed"
					)
				),
			array( 
					'name' => __('Revolution Slider Alias', INFINITE_LANGUAGE),
					'desc' => __('Select your Revolution Slider Alias for the slider that you want to show.', INFINITE_LANGUAGE),
					'id' => '_ig_intro_slider_header',
					'type' => 'select_slider',
					'options' => $revsliders,
					'std' => ''
				),
			array( 
					'name' => __('Page Header Text', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable the Header Page Text.', INFINITE_LANGUAGE),
					'id' => '_ig_header_text',
					'type' => 'select',
					'std' => 'enabled',
					'options' => array(
						"enabled" => "Enabled",
						"disabled" => "Disabled"
					)
				),
			array( 
					'name' => __('Page Title', INFINITE_LANGUAGE),
					'desc' => __('You can insert a custom page title instead of default page title.', INFINITE_LANGUAGE),
					'id' => '_ig_page_title',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Page Caption', INFINITE_LANGUAGE),
					'desc' => __('You can insert a custom text caption.', INFINITE_LANGUAGE),
					'id' => '_ig_page_caption',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Page Title and Caption Align', INFINITE_LANGUAGE),
					'desc' => __('You can align the text in three different ways.', INFINITE_LANGUAGE),
					'id' => '_ig_page_text_align',
					'type' => 'select',
					'std' => 'textalignleft',
					'options' => array(
						"textalignleft" => "Left Align",
						"textaligncenter" => "Center Align",
						"textalignright" => "Right Align"
					)
				),
			array( 
					'name' => __('Accent Color', INFINITE_LANGUAGE),
					'desc' => __('Change this color to alter the accent color globally for your site. Try one of the six pre-picked colors that are guaranteed to look awesome!', INFINITE_LANGUAGE),
					'id' => '_ig_accent_color',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Header Background', INFINITE_LANGUAGE),
					'desc' => __('Choose a Background Color for Header.', INFINITE_LANGUAGE),
					'id' => '_ig_header_background_color',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Header Background Color Of The First Level Item', INFINITE_LANGUAGE),
					'desc' => __('Choose a Background Color Of The First Level Item.', INFINITE_LANGUAGE),
					'id' => '_ig_header_background_color_first_level',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Header Background Color Of The Active First Level Item', INFINITE_LANGUAGE),
					'desc' => __('Choose a Background Color Of The Active First Level Item.', INFINITE_LANGUAGE),
					'id' => '_ig_header_background_color_active_first_level',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Text And Icon Color Of The Search Box', INFINITE_LANGUAGE),
					'desc' => __('Choose a Background Color Of The Searxh Box.', INFINITE_LANGUAGE),
					'id' => '_ig_header_background_color_search',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Text Color Of The First Level Item', INFINITE_LANGUAGE),
					'desc' => __('', INFINITE_LANGUAGE),
					'id' => '_ig_header_text_color_first_level',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Text Color Of The Active First Level Item', INFINITE_LANGUAGE),
					'desc' => __('', INFINITE_LANGUAGE),
					'id' => '_ig_header_text_color_active_first_level',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Background Color Of The Dropdown Elements', INFINITE_LANGUAGE),
					'desc' => __('', INFINITE_LANGUAGE),
					'id' => '_ig_header_background_color_dropdown_elements',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Background Color Of The Dropdown Menu Item', INFINITE_LANGUAGE),
					'desc' => __('', INFINITE_LANGUAGE),
					'id' => '_ig_header_background_color_dropdown_menu_item',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Background Color Of The Dropdown Active Menu Item', INFINITE_LANGUAGE),
					'desc' => __('', INFINITE_LANGUAGE),
					'id' => '_ig_header_background_color_dropdown_active_menu_item',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Border color between dropdown menu items', INFINITE_LANGUAGE),
					'desc' => __('', INFINITE_LANGUAGE),
					'id' => '_ig_header_border_color_between_dropdown_menu_items',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Text Color Of The Dropdown Menu Item', INFINITE_LANGUAGE),
					'desc' => __('', INFINITE_LANGUAGE),
					'id' => '_ig_header_text_color_dropdown_menu_item',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Text Color Of The Dropdown Active Menu Item', INFINITE_LANGUAGE),
					'desc' => __('', INFINITE_LANGUAGE),
					'id' => '_ig_header_text_color_dropdown_active_menu_item',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Body Color', INFINITE_LANGUAGE),
					'desc' => __('Choose a Color for Body.(i.e. body, shortcodes etc.)', INFINITE_LANGUAGE),
					'id' => '_ig_body_color',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Heading Color', INFINITE_LANGUAGE),
					'desc' => __('Choose a Color for Heading.(i.e. headings, shortcodes etc.)', INFINITE_LANGUAGE),
					'id' => '_ig_heading_color',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Back To Top Icon Color', INFINITE_LANGUAGE),
					'desc' => __('Choose a Color for Icon Back To Top.', INFINITE_LANGUAGE),
					'id' => '_ig_back_to_top_color',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Footer Widget Background', INFINITE_LANGUAGE),
					'desc' => __('Choose a Background for Footer Widget.', INFINITE_LANGUAGE),
					'id' => '_ig_footer_widget_background',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Footer Widget Heading Font Color', INFINITE_LANGUAGE),
					'desc' => __('Choose a Heading Font Color for Footer Widget Area.', INFINITE_LANGUAGE),
					'id' => '_ig_footer_widget_heading_font_color',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Footer Widget Font Color', INFINITE_LANGUAGE),
					'desc' => __('Choose a Font Color for Footer Widget Area.', INFINITE_LANGUAGE),
					'id' => '_ig_footer_widget_font_color',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Footer Credits Background', INFINITE_LANGUAGE),
					'desc' => __('Choose a Background for Footer Credits Area.', INFINITE_LANGUAGE),
					'id' => '_ig_footer_credits_background',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Footer Credits Font Color', INFINITE_LANGUAGE),
					'desc' => __('Choose a Font Color for Footer Credits Area.', INFINITE_LANGUAGE),
					'id' => '_ig_footer_credits_font_color',
					'type' => 'color_text',
					'std' => ''
				),
			array( 
					'name' => __('Page Title and Caption Color', INFINITE_LANGUAGE),
					'desc' => __('Optional. Choose a text color for your title block.', INFINITE_LANGUAGE),
					'id' => '_ig_page_text_color',
					'type' => 'color_text',
					'std' => ''
				),
		)
	);
	$callback = create_function( '$post,$meta_box', 'ig_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
	
}


?>