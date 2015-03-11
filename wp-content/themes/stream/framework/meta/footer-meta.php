<?php 


add_action('add_meta_boxes', 'ig_metabox_page_post');

function ig_metabox_page_post(){
    
/*-----------------------------------------------------------------------------------*/
/*	Footer Widget Setting Meta
/*-----------------------------------------------------------------------------------*/

$post_types = array( 'page', 'post', 'portfolio', 'team', 'knowledgebase');

$meta_box = array(
	'id' => 'ig-metabox-footer-widget',
	'title' => __('Footer Widget Settings', INFINITE_LANGUAGE),
	'description' => __('Here you can configure how your footer widget will appear.', INFINITE_LANGUAGE),
	'post_type' => $post_types,
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 
			'name' => __('Footer Widget Settings', INFINITE_LANGUAGE),
			'desc' => __('Enable or Disable Footer Widget Area.', INFINITE_LANGUAGE),
			'id' => '_ig_footer_widget_settings',
			'type' => 'select',
			'std' => 'enabled',
			'options' => array(
				"enabled" => "Enabled",
				"disabled" => "Disabled"
			)
		)
	)
);
$callback = create_function( '$post,$meta_box', 'ig_create_meta_box( $post, $meta_box["args"] );' );

foreach( $post_types as $post_type) {
    add_meta_box(
        $meta_box['id'],
		$meta_box['title'],
		$callback,
		$post_type,
        $meta_box['context'],
		$meta_box['priority'],
		$meta_box
    );
}

}


?>