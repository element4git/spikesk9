<?php

	if ( !function_exists( 'mmm_menu_options_array' ) ) {
		function mmm_menu_options_array(){
			global $mmm_menu_options_array;
			global $mega_main_menu;
			$options = get_option('infinite_options');
			if ( isset( $mmm_menu_options_array ) && $mmm_menu_options_array !== false ) {
				$options = $mmm_menu_options_array;
			} else {
				/* Additional styles */
				$additional_styles_presets = $mega_main_menu->get_option( 'additional_styles_presets' );
				unset( $additional_styles_presets['0'] );
				$additional_styles[ __( 'Default', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) ] = 'default_style';
				if ( is_array( $additional_styles_presets ) ) {
					foreach ( $additional_styles_presets as $key => $value) {
						$additional_styles[ $key . '. ' . $value['style_name'] ] = 'additional_style_' . $key;
					}
				}
				/* Submenu types */
				$submenu_types = array(
					__( 'Standard Dropdown', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'default_dropdown',
					__( 'Multicolumn Dropdown', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'multicolumn_dropdown',
					__( 'Grid Dropdown', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'grid_dropdown',
					__( 'Posts Grid Dropdown', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'post_type_dropdown',
				);

				$number_of_widgets = $options['number_of_widgets'];
				if ( is_numeric( $number_of_widgets ) && $number_of_widgets > 0 ) {
					for ( $i=1; $i <= $number_of_widgets; $i++ ) { 
						$submenu_widgets[ __( 'Widgets area ', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) . $i ] = $mega_main_menu->constant[ 'MM_WARE_PREFIX' ] . '_menu_widgets_area_' . $i;
					}
					$submenu_types = array_merge( $submenu_types, $submenu_widgets );
				}
				/* options */
				$options = array(
						array(
							'descr' => __( 'Description', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'key' => 'item_descr',
							'type' => 'textarea',
							'col_width' => 2
						),
						array(
							'descr' => __( 'Style of This Item', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'key' => 'item_style',
							'type' => 'select',
							'values' => $additional_styles,
							'default' => 'default',
						),
						array(
							'descr' => __( 'Visibility Control', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'key' => 'item_visibility',
							'type' => 'select',
							'values' => array(
								__( 'Always Visible', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'all',
								__( 'Visible Only to Logged Users', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'logged',
								__( 'Visible Only to Unlogged visitors', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'visitors',
							),
						),
						array(
							'descr' => __( 'Icon of This Item (set empty to hide)', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'key' => 'item_icon',
							'type' => 'icons',
						),
						array(
							'key' => 'disable_text',
							'type' => 'checkbox',
							'values' => array(
								__( 'Hide Text of This Item', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'true',
							),
						),
						array(
							'key' => 'disable_link',
							'type' => 'checkbox',
							'values' => array(
								__( 'Disable Link', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'true',
							),
						),
						array(
							'name' => __( 'Options of Dropdown', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'descr' => __( 'Submenu Type', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'key' => 'submenu_type',
							'type' => 'select',
							'values' => $submenu_types,
							'dependency' => array(
								'element' => array( 
									'submenu_post_type', 
								),
								'value' => 'post_type_dropdown',
							),

					   ),
						array(
							'key' => 'submenu_post_type',
							'descr' => __( 'Post Type for Display in Dropdown', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'type' => 'select',
							'values' => mm_common::get_all_taxonomies(),
							'dependency' => array(
								'parent' => 'menu-item-submenu_type[__ID__]', 
								'values' => array(
									'post_type_dropdown',
								),
							),
						),
						array(
							'key' => 'submenu_drops_side',
							'descr' => __( 'Side of Dropdown Elements', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'type' => 'select',
							'values' => array(
								__( 'Drop To Right Side', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'drop_to_right',
								__( 'Drop To Left Side', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'drop_to_left',
								__( 'Drop To Center', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'drop_to_center',
							),
						),
						array(
							'descr' => __( 'Submenu Columns (Not For Standard Drops)', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'key' => 'submenu_columns',
							'type' => 'select',
							'values' => range(1, 10),
						),
						array(
							'key' => 'submenu_enable_full_width',
							'type' => 'checkbox',
							'values' => array(
								__( 'Enable Full Width Dropdown (only for horizontal menu)', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ) => 'true',
							),
						),
						array(
							'name' => __( 'Dropdown Background Image', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'descr' => __( '', $mega_main_menu->constant[ 'INFINITE_LANGUAGE' ] ),
							'key' => 'submenu_bg_image',
							'type' => 'background_image',
							'default' => '',
						),
				);
				$GLOBALS['mmm_menu_options_array'] = $options;
			}
			return $options;
		}
	}
?>