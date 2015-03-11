<?php

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Meta
/*-----------------------------------------------------------------------------------*/


add_action('add_meta_boxes', 'ig_metabox_portfolio');
function ig_metabox_portfolio(){
    
	
/*-----------------------------------------------------------------------------------*/
/*	Thumbnails Setting
/*-----------------------------------------------------------------------------------*/

	$meta_box = array(
		'id' => 'ig-metabox-portfolio-settings',
		'title' =>  __('Portfolio Item Settings', INFINITE_LANGUAGE),
		'description' => __('Here you can configure how your portfolio item appear.', INFINITE_LANGUAGE),
		'post_type' => 'portfolio',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
    		array( 
				'name' => __('FancyBox Gallery Name (Optional)', INFINITE_LANGUAGE),
				'desc' => __('Please enter gallery name if you want create a gallery images/video between portfolio posts.', INFINITE_LANGUAGE),
				'id' => '_ig_fancy_gallery',
				'type' => 'text',
				'std' => ''
			),
			array( 
				'name' => __('FancyBox PopUp Video (Optional)', INFINITE_LANGUAGE),
				'desc' => __('Please enter Video URL instead of Featured Image.', INFINITE_LANGUAGE),
				'id' => '_ig_fancy_video',
				'type' => 'text',
				'std' => ''
			),
			array( 
				'name' => __('FancyBox Image PopUp (Optional)', INFINITE_LANGUAGE),
				'desc' => __('Please upload Image if you want a different image instead of Featured Image PopUp.', INFINITE_LANGUAGE),
				'id' => '_ig_fancy_image_full',
				'type' => 'file',
				'std' => ''
			),
			array( 
				'name' => __('FancyBox Gallery Images (Optional)', INFINITE_LANGUAGE),
				'desc' => __('Please upload Images if you want a gallery images for this post.', INFINITE_LANGUAGE),
				'id' => '_ig_fancy_image_gallery',
				'type' => 'images',
				'std' => ''
			),
		)
	);
	
	$callback = create_function( '$post,$meta_box', 'ig_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	

/*-----------------------------------------------------------------------------------*/
/*	Page Portfolio Header Setting Meta
/*-----------------------------------------------------------------------------------*/

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

    $meta_box = array(
		'id' => 'ig-metabox-page-header',
		'title' => __('Portfolio Page Header Settings', INFINITE_LANGUAGE),
		'description' => __('Here you can configure how your page header will appear.', INFINITE_LANGUAGE),
		'post_type' => 'portfolio',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('Portfolio Page Header Settings', INFINITE_LANGUAGE),
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
					'name' => __('Portfolio Page Header Height Top', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number for your height (padding-top) of page header. Default 100.<br/>
								  <strong>Not works if you use a slider</strong>.', INFINITE_LANGUAGE),
					'id' => '_ig_header_height_top',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Portfolio Page Header Height Bottom', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number for your height (padding-bottom) of page header. Default 100.<br/>
								  <strong>Not works if you use a slider</strong>.', INFINITE_LANGUAGE),
					'id' => '_ig_header_height_bottom',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Portfolio Page Header Image', INFINITE_LANGUAGE),
					'desc' => __('Upload your image should be between 1600px x 800px (or more) for best results.', INFINITE_LANGUAGE),
					'id' => '_ig_header_bg',
					'type' => 'file',
					'std' => ''
				),
			array( 
					'name' => __('Portfolio Page Header Image Overlay', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable Overlay Background.', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay',
					'type' => 'checkbox_fade',
					'std' => 'on'
				),
			array( 
					'name' => __('Portfolio Page Header Backgroun Opacity Overlay', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number 0 - 1 for your background color opacity. Default 0.70', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay_bg_opacity',
					'type' => 'opacity',
					'std' => ''
				),
			array( 
					'name' => __('Portfolio Page Header Background Color Overlay', INFINITE_LANGUAGE),
					'desc' => __('Optional. Choose a background color overlay for your title block.', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay_bg_color',
					'type' => 'color',
					'std' => ''
				),
			array( 
					'name' => __('Portfolio Page Header Image Background Attachment', INFINITE_LANGUAGE),
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
					'name' => __('Portfolio Header Text', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable the Header Portfolio Text.', INFINITE_LANGUAGE),
					'id' => '_ig_header_text',
					'type' => 'select',
					'std' => 'enabled',
					'options' => array(
						"enabled" => "Enabled",
						"disabled" => "Disabled"
					)
				),
			array( 
					'name' => __('Portfolio Page Title', INFINITE_LANGUAGE),
					'desc' => __('You can insert a custom page title instead of default page title.', INFINITE_LANGUAGE),
					'id' => '_ig_page_title',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Portfolio Page Caption', INFINITE_LANGUAGE),
					'desc' => __('You can insert a custom text caption instead of project attributes.', INFINITE_LANGUAGE),
					'id' => '_ig_page_caption',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Portfolio Page Title and Caption Align', INFINITE_LANGUAGE),
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

	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
}