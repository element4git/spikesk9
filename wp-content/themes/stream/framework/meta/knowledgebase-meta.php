<?php

/*-----------------------------------------------------------------------------------*/
/*	Knowledgebase Meta
/*-----------------------------------------------------------------------------------*/


add_action('add_meta_boxes', 'ig_metabox_knowledgebase');
function ig_metabox_knowledgebase(){
    
	
/*-----------------------------------------------------------------------------------*/
/*	Thumbnails Setting
/*-----------------------------------------------------------------------------------*/

	$meta_box = array(
		'id' => 'ig-metabox-knowledgebase-settings',
		'title' =>  __('Knowledgebase Item Settings', INFINITE_LANGUAGE),
		'description' => __('Here you can configure how your knowledgebase item appear.', INFINITE_LANGUAGE),
		'post_type' => 'knowledgebase',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
				'name' => __('Icon Cover', INFINITE_LANGUAGE),
				'desc' => __('Enter a name of the icon. Search the name on Post Icon. Ex: icon-atom5.', INFINITE_LANGUAGE),
				'id' => '_ig_cover_icon',
				'type' => 'text',
				'std' => 'icon-bookmark10'
			),
    		array( 
				'name' => __('FancyBox Gallery Name (Optional)', INFINITE_LANGUAGE),
				'desc' => __('Please enter gallery name if you want create a gallery images/video between knowledgebase posts.', INFINITE_LANGUAGE),
				'id' => '_ig_fancy_gallery',
				'type' => 'text',
				'std' => ''
			),
		)
	);
	
	$callback = create_function( '$post,$meta_box', 'ig_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	

/*-----------------------------------------------------------------------------------*/
/*	Page Knowledgebase Header Setting Meta
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
		'title' => __('Knowledgebase Page Header Settings', INFINITE_LANGUAGE),
		'description' => __('Here you can configure how your page header will appear.', INFINITE_LANGUAGE),
		'post_type' => 'knowledgebase',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('Knowledgebase Page Header Settings', INFINITE_LANGUAGE),
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
					'name' => __('Knowledgebase Page Header Height', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number for your height (padding-top and padding-bottom) of page header. Default 100.<br/>
								  <strong>Not works if you use a slider</strong>.', INFINITE_LANGUAGE),
					'id' => '_ig_header_height',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Knowledgebase Page Header Image', INFINITE_LANGUAGE),
					'desc' => __('Upload your image should be between 2500px x 1250px (or more) for best results.', INFINITE_LANGUAGE),
					'id' => '_ig_header_bg',
					'type' => 'file',
					'std' => ''
				),
			array( 
					'name' => __('Knowledgebase Page Header Image Overlay', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable Overlay Background.', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay',
					'type' => 'checkbox_fade',
					'std' => 'on'
				),
			array( 
					'name' => __('Knowledgebase Page Header Backgroun Opacity Overlay', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number 0 - 1 for your background color opacity. Default 0.70', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay_bg_opacity',
					'type' => 'opacity',
					'std' => ''
				),
			array( 
					'name' => __('Knowledgebase Page Header Background Color Overlay', INFINITE_LANGUAGE),
					'desc' => __('Optional. Choose a background color overlay for your title block.', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay_bg_color',
					'type' => 'color',
					'std' => ''
				),
			array( 
					'name' => __('Knowledgebase Page Header Image Background Attachment', INFINITE_LANGUAGE),
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
					'name' => __('Knowledgebase Header Text', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable the Header Knowledgebase Text.', INFINITE_LANGUAGE),
					'id' => '_ig_header_text',
					'type' => 'select',
					'std' => 'enabled',
					'options' => array(
						"enabled" => "Enabled",
						"disabled" => "Disabled"
					)
				),
			array( 
					'name' => __('Knowledgebase Page Title', INFINITE_LANGUAGE),
					'desc' => __('You can insert a custom page title instead of default page title.', INFINITE_LANGUAGE),
					'id' => '_ig_page_title',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Knowledgebase Page Caption', INFINITE_LANGUAGE),
					'desc' => __('You can insert a custom text caption instead of project attributes.', INFINITE_LANGUAGE),
					'id' => '_ig_page_caption',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Knowledgebase Page Title and Caption Align', INFINITE_LANGUAGE),
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
					'name' => __('Knowledgebase Page Title and Caption Color', INFINITE_LANGUAGE),
					'desc' => __('Optional. Choose a text color for your title block.', INFINITE_LANGUAGE),
					'id' => '_ig_page_text_color',
					'type' => 'color_text',
					'std' => ''
				),
		)
	);

	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
}