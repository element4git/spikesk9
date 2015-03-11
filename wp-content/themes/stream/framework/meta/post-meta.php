<?php 
add_action('add_meta_boxes', 'ig_metabox_posts');
function ig_metabox_posts(){
    
/*-----------------------------------------------------------------------------------*/
/*	Post Header Setting
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
		'id' => 'ig-metabox-post-header',
		'title' => __('Post Header Settings', INFINITE_LANGUAGE),
		'description' => __('Here you can configure how your post header will appear.', INFINITE_LANGUAGE),
		'post_type' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('Post Header Settings', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable the Header Post Settings.', INFINITE_LANGUAGE),
					'id' => '_ig_header_settings',
					'type' => 'select',
					'std' => 'enabled',
					'options' => array(
						"enabled" => "Enabled",
						"disabled" => "Disabled"
					)
				),
			array( 
					'name' => __('Post Page Header Height', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number for your height (padding-top and padding-bottom) of page header. Default 100.<br/>
								  <strong>Not works if you use a slider</strong>.', INFINITE_LANGUAGE),
					'id' => '_ig_header_height',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Post Header Image', INFINITE_LANGUAGE),
					'desc' => __('Upload your image should be between 1600px x 800px (or more) for best results.', INFINITE_LANGUAGE),
					'id' => '_ig_header_bg',
					'type' => 'file',
					'std' => ''
				),
			array( 
					'name' => __('Post Header Image Overlay', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable Overlay Background.', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay',
					'type' => 'checkbox_fade',
					'std' => 'on'
				),
			array( 
					'name' => __('Post Header Backgroun Opacity Overlay', INFINITE_LANGUAGE),
					'desc' => __('Optional. Enter a number 0 - 1 for your background color opacity. Default 0.70', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay_bg_opacity',
					'type' => 'opacity',
					'std' => ''
				),
			array( 
					'name' => __('Post Header Background Color Overlay', INFINITE_LANGUAGE),
					'desc' => __('Optional. Choose a background color overlay for your title block.', INFINITE_LANGUAGE),
					'id' => '_ig_header_overlay_bg_color',
					'type' => 'color',
					'std' => ''
				),
			array( 
					'name' => __('Post Header Image Background Attachment', INFINITE_LANGUAGE),
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
					'name' => __('Post Header Text', INFINITE_LANGUAGE),
					'desc' => __('Enable or Disable the Header Post Text.', INFINITE_LANGUAGE),
					'id' => '_ig_header_text',
					'type' => 'select',
					'std' => 'enabled',
					'options' => array(
						"enabled" => "Enabled",
						"disabled" => "Disabled"
					)
				),
			array( 
					'name' => __('Post Title', INFINITE_LANGUAGE),
					'desc' => __('You can insert a custom page title instead of default post title.', INFINITE_LANGUAGE),
					'id' => '_ig_page_title',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Post Caption', INFINITE_LANGUAGE),
					'desc' => __('You can insert a custom text caption.', INFINITE_LANGUAGE),
					'id' => '_ig_page_caption',
					'type' => 'text',
					'std' => ''
				),
			array( 
					'name' => __('Post Title and Caption Align', INFINITE_LANGUAGE),
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
					'name' => __('Post Title and Caption Color', INFINITE_LANGUAGE),
					'desc' => __('Optional. Choose a text color for your title block.', INFINITE_LANGUAGE),
					'id' => '_ig_page_text_color',
					'type' => 'color_text',
					'std' => ''
				),
		)
	);
	$callback = create_function( '$post,$meta_box', 'ig_create_meta_box( $post, $meta_box["args"] );' );
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
    
	
/*-----------------------------------------------------------------------------------*/
/*	Gallery Setting
/*-----------------------------------------------------------------------------------*/

    $meta_box = array(
		'id' => 'ig-metabox-post-gallery',
		'title' =>  __('Gallery Settings', INFINITE_LANGUAGE),
		'description' => '',
		'post_type' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
				'name' => __('Revolution Slider Alias', INFINITE_LANGUAGE),
				'desc' => __('Select your Revolution Slider Alias for the slider that you want to show.', INFINITE_LANGUAGE),
				'id' => '_ig_gallery',
				'type' => 'select_slider',
				'options' => $revsliders,
				'std' => ''
			)
		)
	);
    add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
	
/*-----------------------------------------------------------------------------------*/
/*	Quote Setting
/*-----------------------------------------------------------------------------------*/

    $meta_box = array(
		'id' => 'ig-metabox-post-quote',
		'title' =>  __('Quote Settings', INFINITE_LANGUAGE),
		'description' => '',
		'post_type' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
					'name' =>  __('Quote Content', INFINITE_LANGUAGE),
					'desc' => __('Please type the text for your quote here.', INFINITE_LANGUAGE),
					'id' => '_ig_quote',
					'type' => 'textarea',
                    'std' => ''
				)
		)
	);
    add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
/*-----------------------------------------------------------------------------------*/
/*	Link Setting
/*-----------------------------------------------------------------------------------*/

	$meta_box = array(
		'id' => 'ig-metabox-post-link',
		'title' =>  __('Link Settings', INFINITE_LANGUAGE),
		'description' => '',
		'post_type' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
					'name' =>  __('Link URL', INFINITE_LANGUAGE),
					'desc' => __('Please input the URL for your link.', INFINITE_LANGUAGE),
					'id' => '_ig_link',
					'type' => 'text',
					'std' => ''
				)
		)
	);
    add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
    
/*-----------------------------------------------------------------------------------*/
/*	Video Setting
/*-----------------------------------------------------------------------------------*/

    $meta_box = array(
		'id' => 'ig-metabox-post-video',
		'title' => __('Video Settings', INFINITE_LANGUAGE),
		'description' => '',
		'post_type' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
					'name' => __('WEBM File URL', INFINITE_LANGUAGE),
					'desc' => __('Please Upload WEBM video file.<br/><strong>You must include both formats.</strong>', INFINITE_LANGUAGE),
					'id' => '_ig_video_webm',
					'type' => 'media',
					'std' => ''
				),
			array( 
					'name' => __('MP4 File URL', INFINITE_LANGUAGE),
					'desc' => __('Please Upload MP4 video file.<br/><strong>You must include both formats.</strong>', INFINITE_LANGUAGE),
					'id' => '_ig_video_mp4',
					'type' => 'media',
					'std' => ''
				),
			array( 
					'name' => __('OGV File URL', INFINITE_LANGUAGE),
					'desc' => __('Please Upload OGV video file.<br/><strong>You must include both formats.</strong>', INFINITE_LANGUAGE),
					'id' => '_ig_video_ogv',
					'type' => 'media',
					'std' => ''
				),
			array( 
					'name' => __('Preview Image', INFINITE_LANGUAGE),
					'desc' => __('This will be the image displayed when the video has not been played yet.', INFINITE_LANGUAGE),
					'id' => '_ig_video_poster_url',
					'type' => 'file',
					'std' => ''
				),
			array(
					'name' => __('Embedded Code', INFINITE_LANGUAGE),
					'desc' => __('If the video is an embed rather than self hosted, enter in a Youtube or Vimeo embed code here.', INFINITE_LANGUAGE),
					'id' => '_ig_video_embed',
					'type' => 'textarea',
					'std' => ''
				)
		)
	);
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
	
/*-----------------------------------------------------------------------------------*/
/*	Audio Setting
/*-----------------------------------------------------------------------------------*/

	$meta_box = array(
		'id' => 'ig-metabox-post-audio',
		'title' =>  __('Audio Settings', INFINITE_LANGUAGE),
		'description' => '',
		'post_type' => 'post',
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array( 
				'name' => __('MP3 File URL', INFINITE_LANGUAGE),
				'desc' => __('Please Upload MP3 file', INFINITE_LANGUAGE),
				'id' => '_ig_audio_mp3',
				'type' => 'media',
				'std' => ''
			)
		)
	);
	add_meta_box( $meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box );
}

?>