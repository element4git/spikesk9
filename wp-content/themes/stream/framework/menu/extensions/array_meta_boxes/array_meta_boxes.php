<?php

	if ( !function_exists( 'mega_main_menu__array_meta_boxes' ) ) {
		function mega_main_menu__array_meta_boxes( $constants ){
			return array(
				array( // START single element params array
					'key' => 'mm_general', // HTML atribute "id" for metabox
					'title' => __( 'Infinite Menu Options', $constants[ 'INFINITE_LANGUAGE'] ), // Caption for metabox
					'post_type' => 'all_post_types', // Post types where will be displayed this metabox
					'context' => 'normal', // Position where will be displayed this metabox
					'priority' => 'high', // Priority for this metabox
					'options' => array(
						array(
							'name' => __( 'Custom Icon', $constants[ 'INFINITE_LANGUAGE'] ),
							'descr' => __( 'Select icon for this post, which will be displayed in the Title Page and "Post Grid Dropdown Menu"', $constants[ 'INFINITE_LANGUAGE'] ),
							'key' => 'post_icon',
							'default' => 'icon-atom5',
							'type' => 'icons',
						),
					), // END element options
				), // END single element params array
			);
		}
	}
?>