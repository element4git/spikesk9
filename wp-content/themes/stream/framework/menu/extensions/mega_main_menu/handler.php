<?php


	/** 
	 * actions what we need for call all functions in this file.
	 * @return void
	 */
	global $mega_main_menu;
	if ( is_array( $mega_main_menu->get_option( 'coercive_styles' ) ) && in_array( 'true', $mega_main_menu->get_option( 'coercive_styles', array() ) ) ) {
		remove_all_filters( 'wp_nav_menu_items', 60 ); 
		remove_all_filters( 'wp_nav_menu_args', 60 ); 
	}
	add_filter( 'wp_nav_menu_items', 'mmm_nav_woo_cart', 2000, 8 );
	add_filter( 'wp_nav_menu_items', 'mmm_nav_buddypress', 2010, 8 );
	add_filter( 'wp_nav_menu_items', 'mmm_nav_wpml_switcher', 2020, 8 );
	add_filter( 'wp_nav_menu_items', 'mmm_login_menu', 2030, 8 );
	add_filter( 'wp_nav_menu_items', 'mmm_nav_search', 2040, 8 );
	add_filter( 'wp_nav_menu_items', 'mmm_nav_social', 2060, 8 );
	add_filter( 'wp_nav_menu_items', 'mmm_nav_donate', 2070, 8 );
	add_filter( 'wp_nav_menu_items', 'mmm_nav_side_menu', 2050, 8 );
    add_filter( 'wp_nav_menu_args', 'mmm_set_walkers', 3000000, 8 );

    if ( function_exists( 'theme_get_menu' ) && function_exists( 'theme_get_list_menu' ) ) {
        $mega_menu_locations = $mega_main_menu->get_option( 'mega_menu_locations' );
		static $mega_menu_location_id = 0;
		$mega_menu_location_id ++;
        $indefinite_location_mode = ( is_array( $mega_main_menu->get_option( 'indefinite_location_mode' ) ) && in_array( 'true', $mega_main_menu->get_option( 'indefinite_location_mode' ) ) ) ? true : false;
        if ( isset( $mega_menu_locations[ $mega_menu_location_id ] ) && ( $indefinite_location_mode === true ) ) {
        	$args['theme_location'] = $mega_menu_locations[ $mega_menu_location_id ];
        	$args['echo'] = false;
			$GLOBALS['wp_nav_menu_html'] = wp_nav_menu( $args );
	    	function artisteer_nav_menu () {
	    		global $wp_nav_menu_html;
		    	return $wp_nav_menu_html;
	    	}
			add_filter( 'wp_nav_menu', 'artisteer_nav_menu', 50 );
        }
    }
	/** 
	 * Check current location and set args.
	 * @return $items
	 */
    function mmm_set_walkers ( $args ){
		$options = get_option('infinite_options');
		global $mega_main_menu;
		global $post;
		
		$logo_color = get_post_meta($post->ID, '_ig_logo_color', true);
		$logo_color_sticky_menu = get_post_meta($post->ID, '_ig_logo_color_sticky_menu', true);
		$logo_color_sticky_menu_mobile = get_post_meta($post->ID, '_ig_logo_color_sticky_menu_mobile', true);
		$color_transparent_menu = get_post_meta($post->ID, '_ig_color_transparent_menu', true);
		$color_transparent_menu_mobile = get_post_meta($post->ID, '_ig_color_transparent_menu_mobile', true);
		
		$logo_src = $options['logo_src']['url'];
		$logo_src_alt = $options['logo_src_alt']['url'];
		$logo_src_mobile = $options['logo_src_mobile']['url'];
		
		if ($logo_color_sticky_menu_mobile == "1" ) {  
		
			if ( $logo_color == "0" || $logo_color == "" ) { $logo = $logo_src; $logo_control_show = 'logo-black logo-mobile'; }
			else { $logo = $logo_src_alt; $logo_control_show = 'logo-white'; }
			
			
			if ( $logo_color_sticky_menu == "0" || $logo_color_sticky_menu == "" ) { $logo_sticky = ''; $logo_sticky_control_show = 'logo-control-show'; }
			else if ( $logo_color_sticky_menu == "1" ) { $logo_sticky = $logo_src; $logo_sticky_control_show = 'logo-black logo-mobile'; }
			else { $logo_sticky = $logo_src_alt; $logo_sticky_control_show = 'logo-white'; }
		
		}
		
		else if ($logo_color_sticky_menu_mobile == "2" ) { 
			
			if ( $logo_color == "0" || $logo_color == "" ) { $logo = $logo_src; $logo_control_show = 'logo-black'; }
			else { $logo = $logo_src_alt; $logo_control_show = 'logo-white logo-mobile'; }
			
			if ( $logo_color_sticky_menu == "0" || $logo_color_sticky_menu == "" ) { $logo_sticky = ''; $logo_sticky_control_show = 'logo-control-show'; }
			else if ( $logo_color_sticky_menu == "1" ) { $logo_sticky = $logo_src; $logo_sticky_control_show = 'logo-black'; }
			else { $logo_sticky = $logo_src_alt; $logo_sticky_control_show = 'logo-white logo-mobile'; }
		
		}
		
		else { 
			
			if ( $logo_color == "0" || $logo_color == "" ) { $logo = $logo_src; $logo_control_show = 'logo-black'; }
			else { $logo = $logo_src_alt; $logo_control_show = 'logo-white'; }
			
			if ( $logo_color_sticky_menu == "0" || $logo_color_sticky_menu == "" ) { $logo_sticky = ''; $logo_sticky_control_show = 'logo-control-show'; }
			else if ( $logo_color_sticky_menu == "1" ) { $logo_sticky = $logo_src; $logo_sticky_control_show = 'logo-black'; }
			else { $logo_sticky = $logo_src_alt; $logo_sticky_control_show = 'logo-white'; }
		
		}
		
		
		
		if ( $color_transparent_menu == "0" || $color_transparent_menu == "" ) { $menu_pre_color = ''; }
		
		else if ( $color_transparent_menu == "1" ) { $menu_pre_color = 'menu-pre-color-black'; }
		
		else { $menu_pre_color = 'menu-pre-color-white'; }
		
		
       $args = (array)$args;
        $mega_menu_locations = $mega_main_menu->get_option( 'mega_menu_locations' );
        $indefinite_location_mode = ( is_array( $mega_main_menu->get_option( 'indefinite_location_mode' ) ) && in_array( 'true', $mega_main_menu->get_option( 'indefinite_location_mode' ) ) ) ? true : false;
		static $mega_menu_location_id = 0;
		$mega_menu_location_id ++;
        if ( $indefinite_location_mode === true && isset( $args['theme_location'] ) && $args['theme_location'] == '' && isset( $mega_menu_locations[1] ) ) {
        	$args['theme_location'] = $mega_menu_locations[ $mega_menu_location_id ];
        }
        $original_theme_location_name = $args['theme_location'];
        $args['theme_location'] = str_replace( ' ', '-', $args['theme_location'] );
		if ( $options['menu_fullwidth_container'] == '1' ) { $fullwith_control = 'enable'; } else { $fullwith_control = 'disable'; }
		if ( $options['mobile_minimized'] == '1' ) { $mobile_minimized_control = 'enable'; } else { $mobile_minimized_control = 'disable'; }
		if ( $options['responsive_styles'] == '1' ) { $responsive_styles_control = 'enable'; } else { $responsive_styles_control = 'disable'; }
        if ( $original_theme_location_name != 'side_menu') {
            $args['items_wrap'] = '<ul id="%1$s" class="%2$s">%3$s</ul>';
            $args['walker'] = new Mega_Main_Menu_Frontend_Walker;
            $args['container'] = false;
            $args['container_id'] = '';
            $args['container_class'] = '';
            $container_class = $args['theme_location'] . 
            ' primary_style-' . $mega_main_menu->get_option( $args['theme_location'] . '_primary_style', 'flat' ) . 
            ' icons-' . $options['first_level_icons_position'] . 
           	' first-lvl-align-' . $options['first_level_item_align'] . 
           	' first-lvl-separator-' . $options['first_level_separator'] . 
           	' language_direction-' . $options['language_direction'] . 
           	' direction-horizontal' . 
           	' responsive-' . $responsive_styles_control . 
           	' mobile_minimized-' . $mobile_minimized_control . 
           	' fullwidth-' . $fullwith_control . 
           	' dropdowns_animation-' . $options['dropdowns_animation'] . 
            ' version-' . str_replace('.', '-', $mega_main_menu->constant['MM_WARE_VERSION'] );
            $args['menu_id'] = 'mega_main_menu_ul';
            $args['menu_class'] = 'mega_main_menu_ul';
            $args['before'] = '';
            $args['after'] = '';
            $args['link_before'] = '';
            $args['link_after'] = '';
            $args['depth'] = 5;
			$items_wrap = '';
			if( $options['sticky_menu'] == '1') {
				$data_sticky .= ' data-sticky="1"  data-stickyoffset="' . $options['sticky_offset'] . '"';
			}
			if( $options['logo_include_component'] == '1' && $options['logo_src'] ) {
				$container_class .= ' include-logo';
			} else {
				$container_class .= ' no-logo';
			}
			if( $options['search_include_component'] == '1' ) {
				$container_class .= ' include-search';
			} else {
				$container_class .= ' no-search';
			}
			if( $options['woocart_include_component'] == '1' ) {
				$container_class .= ' include-woo_cart';
			} else {
				$container_class .= ' no-woo_cart';
			}
			if( $options['buddypress_include_component'] == '1' ) {
				$container_class .= ' include-buddypress';
			} else {
				$container_class .= ' no-buddypress';
			}
			if ( has_filter( 'mmm_container_class' ) ) {
	            $container_class .= ' ' . esc_attr( apply_filters( 'mmm_container_class', '', explode( '', $container_class ) ) );
			}

			$items_wrap .= mm_common::ntab(0) . '<div id="mega_main_menu" class="mega_main mega_main_menu ' . $container_class . '">';
			$items_wrap .= mm_common::ntab(1) . '<div class="menu_holder ' .  $menu_pre_color .  '"' . $data_sticky . '>';
			$items_wrap .= mm_common::ntab(1) . '<div class="mmm_fullwidth_container"></div><!-- class="fullwidth_container" -->';
			$items_wrap .= mm_common::ntab(2) . '<div class="menu_inner">';
			$items_wrap .= mm_common::ntab(3) . '<span class="nav_logo">';
			if( $options['logo_include_component'] == '1' ) {
					$items_wrap .= mm_common::ntab(4) . '<a class="logo_link" href="' . home_url() . '" title="' . get_bloginfo( 'name' ) . '">';
								 $items_wrap .= mm_common::ntab(5) . '<img class="default-logo' .' '. $logo_control_show . '" alt="'. get_bloginfo('name') .'" src="' . str_replace( array('%','$'), array('',''), $logo ) . '" alt="' . get_bloginfo( 'name' ) . '" />';
								 
								 if($logo_sticky != ''){
								 $items_wrap .= mm_common::ntab(5) . '<img class="alternative-logo' .' '. $logo_sticky_control_show . '"  alt="'. get_bloginfo('name') .'" src="' . str_replace( array('%','$'), array('',''), $logo_sticky ) . '" alt="' . get_bloginfo( 'name' ) . '" />'; 
								 }
								 
								 if($logo_src_mobile != ''){
								 $items_wrap .= mm_common::ntab(5) . '<img class="mobile-logo"  alt="'. get_bloginfo('name') .'" src="' . str_replace( array('%','$'), array('',''), $logo_src_mobile ) . '" alt="' . get_bloginfo( 'name' ) . '" />'; 
								 }
								 else {
								 $items_wrap .= mm_common::ntab(5) . '<img class="mobile-logo"  alt="'. get_bloginfo('name') .'" src="' . str_replace( array('%','$'), array('',''), $logo_sticky ) . '" alt="' . get_bloginfo( 'name' ) . '" />'; 
								 }
					$items_wrap .= mm_common::ntab(4) . '</a>';
				$args['container_class'] .= ' include-logo';
			} else {
				$args['container_class'] .= ' no-logo';
			}

			$items_wrap .= mm_common::ntab(4) . '<a class="mobile_toggle">';
			$items_wrap .= mm_common::ntab(5) . '<span class="mobile_button">';
			$items_wrap .= mm_common::ntab(6) . $options['mobile_label'] . ' &nbsp;';
			$items_wrap .= mm_common::ntab(6) . '<span class="symbol_menu">&equiv;</span>'; // "Open menu" symbol
			$items_wrap .= mm_common::ntab(6) . '<span class="symbol_cross">&#x2573;</span>'; // "Close menu" symbol
			$items_wrap .= mm_common::ntab(5) . '</span><!-- class="mobile_button" -->';
			$items_wrap .= mm_common::ntab(4) . '</a>';
			$items_wrap .= mm_common::ntab(3) . '</span><!-- /class="nav_logo" -->';
			$items_wrap .= mm_common::ntab(4) . $args['items_wrap'];
			$items_wrap .= mm_common::ntab(2) . '</div><!-- /class="menu_inner" -->';
			$items_wrap .= mm_common::ntab(1) . '</div><!-- /class="menu_holder" -->';
			$items_wrap .= mm_common::ntab(0) . '</div><!-- /id="mega_main_menu" -->';
			$args['items_wrap'] = $items_wrap;
        $args['theme_location'] = $original_theme_location_name;
        }
		
		/** 
		 * Custom Side Menu.
		 */
		
		if ( $original_theme_location_name == 'side_menu' && $options['side_menu_include_component'] == '1') {
            $args['items_wrap'] = '<ul id="%1$s" class="%2$s">%3$s</ul>';
            $args['walker'] = new Mega_Main_Menu_Frontend_Walker;
            $args['container'] = false;
            $args['container_id'] = '';
            $args['container_class'] = '';
            $container_class = $args['theme_location'] . 
            ' icons-' . $options['first_level_icons_position'] . 
           	' first-lvl-align-' . $options['first_level_item_align'] . 
           	' first-lvl-separator-' . $options['first_level_separator'] . 
           	' language_direction-' . $options['language_direction'] . 
           	' direction-vertical';

			$items_wrap .= mm_common::ntab(0) . '<div id="mega_main_menu" class="mega_main mega_main_menu ' . $container_class . '">';
			$items_wrap .= mm_common::ntab(1) . '<div class="menu_holder side-menu">';
			$items_wrap .= mm_common::ntab(1) . '<div class="mmm_fullwidth_container"></div><!-- class="fullwidth_container" -->';
			$items_wrap .= mm_common::ntab(2) . '<div class="menu_inner">';
			$items_wrap .= mm_common::ntab(4) . $args['items_wrap'];
			$items_wrap .= mm_common::ntab(2) . '</div><!-- /class="menu_inner" -->';
			$items_wrap .= mm_common::ntab(1) . '</div><!-- /class="menu_holder" -->';
			$items_wrap .= mm_common::ntab(0) . '</div><!-- /id="mega_main_menu" -->';
			$args['items_wrap'] = $items_wrap;
        $args['theme_location'] = $original_theme_location_name;
        }
		/** 
		 * Ending Custom Side Menu.
		 */
        return $args;
    }
	
	/** 
	 * Include Side Menu in menu.
	 * @return $items
	 */
	function mmm_nav_side_menu( $items, $args ) {
		$options = get_option('infinite_options');
		global $mega_main_menu;
		$args = (object) $args;
		if( isset( $args->theme_location ) ) {
	        $args->theme_location = str_replace( ' ', '-', $args->theme_location );
			if( $options['side_menu_include_component'] == '1' && $args->theme_location != 'side_menu' ) {
					$drop_side = ( $options['language_direction'] == 'ltr' ) ? 'drop_to_left' : 'drop_to_right';
					$primary_side_menu = mm_common::ntab(1) . '<li class="side_menu_button_wrapper menu-item multicolumn_dropdown ' . $drop_side . ' submenu_default_width">';
					$primary_side_menu .= mm_common::ntab(2) . '<a class="item_link menu_item_without_text side_menu_button_link " href="javascript:void(0)">'; 
					$primary_side_menu .= mm_common::ntab(3) . '<i class="icon-align-justify3"></i>'; 
					$primary_side_menu .= mm_common::ntab(2) . '</a><!-- class="item_link" -->'; 
					$primary_side_menu .= mm_common::ntab(1) . '</li><!-- class="side_menu_button_wrapper" -->';
					$items = $items . $primary_side_menu;
			}
		}
		return $items;
	}

	/** 
	 * Include search box in menu.
	 * @return $items
	 */
	function mmm_nav_search( $items, $args ) {
		global $mega_main_menu;
		$options = get_option('infinite_options');
		$args = (object) $args;
		if( isset( $args->theme_location ) ) {
	        $args->theme_location = str_replace( ' ', '-', $args->theme_location );
			if( $options['search_include_component'] == '1'  && $args->theme_location != 'side_menu' ) {
				$searchform = '';
				$searchform .= '<li class="menu-item">';
				$searchform .= '<a class="search-overlay item_link menu_item_without_text ">'; 
				$searchform .= '<i class="icon-search"></i>'; 
				$searchform .= '</a><!-- class="item_link" -->'; 
				$searchform .= '</li><!-- class="nav_search_box" -->';
				$items = $items . $searchform;
			}
		}
		return $items;
	}

	function mmm_nav_social( $items, $args ) {
		global $mega_main_menu;
		$options = get_option('infinite_options');
		$args = (object) $args;
		if( isset( $args->theme_location ) ) {
	        $args->theme_location = str_replace( ' ', '-', $args->theme_location );
			if( $args->theme_location != 'side_menu' ) {
				$socialnav = '';
				$socialnav .= '<li class="menu-item pullsmall">';
				$socialnav .= '<a class="item_link menu_item_without_text ">'; 
				$socialnav .= '<img src="'.get_template_directory_uri().'/includes/img/Facebook_icon.png" />'; 
				$socialnav .= '</a><!-- class="item_link" -->'; 
				$socialnav .= '</li><!-- class="nav_search_box" -->';
				$socialnav .= '<li class="menu-item pullsmall">';
				$socialnav .= '<a class="item_link menu_item_without_text ">';
				$socialnav .= '<img src="'.get_template_directory_uri().'/includes/img/Twitter_icon.png" />'; 
				$socialnav .= '</a><!-- class="item_link" -->'; 
				$socialnav .= '</li><!-- class="nav_search_box" -->';
				$socialnav .= '<li class="menu-item pullsmall">';
				$socialnav .= '<a class="item_link menu_item_without_text ">';
				$socialnav .= '<img src="'.get_template_directory_uri().'/includes/img/Instagram_icon.png" />'; 
				$socialnav .= '</a><!-- class="item_link" -->'; 
				$socialnav .= '</li><!-- class="nav_search_box" -->';
				$items = $items . $socialnav;
			}
		}
		return $items;
	}

	function mmm_nav_donate( $items, $args ) {
		global $mega_main_menu;
		$options = get_option('infinite_options');
		$args = (object) $args;
		if( isset( $args->theme_location ) ) {
	        $args->theme_location = str_replace( ' ', '-', $args->theme_location );
			if( $args->theme_location != 'side_menu' ) {
				$donatenav = '';
				$donatenav .= '<li class="menu-item pullsmall">';
				$donatenav .= '<a class="tp-button  blue small tp-button blue small donate">'; 
				$donatenav .= 'donate now'; 
				$donatenav .= '</a><!-- class="item_link" -->'; 
				$donatenav .= '</li><!-- class="nav_search_box" -->';
				$items = $items . $donatenav;
			}
		}
		return $items;
	}
	
	/** 
	 * Include Login in menu.
	 * @return $items
	 */
	function mmm_login_menu( $items, $args ) {
		global $mega_main_menu;
		$options = get_option('infinite_options');
		$args = (object) $args;
		if( isset( $args->theme_location ) ) {
	        $args->theme_location = str_replace( ' ', '-', $args->theme_location );
			if( $options['login_include_component'] == '1'  && $args->theme_location != 'side_menu' ) {
				$login_menu = '';
				$login_menu .= '<li class="menu-item">';
				$login_menu .= '<a class="login-overlay item_link menu_item_without_text ">'; 
				$login_menu .= '<i class="icon-user9"></i>'; 
				$login_menu .= '</a><!-- class="item_link" -->'; 
				$login_menu .= '</li><!-- class="nav_search_box" -->';
				$items = $items . $login_menu;
			}
		}
		return $items;
	}

	/** 
	 * Include woo_cart in menu.
	 * @return $items
	 */
	function mmm_nav_woo_cart( $items, $args ) {
		$options = get_option('infinite_options');
		global $mega_main_menu;
		$args = (object) $args;
		if( isset( $args->theme_location ) ) {
	        $args->theme_location = str_replace( ' ', '-', $args->theme_location );
			if( $options['woocart_include_component'] == '1'  && $args->theme_location != 'side_menu' ) {
				if ( class_exists( 'Woocommerce' ) ){
					$drop_side = ( $options['language_direction'] == 'ltr' ) ? 'drop_to_left' : 'drop_to_right';
					$woo_cart_item = mm_common::ntab(1) . '<li class="menu-item nav_woo_cart multicolumn_dropdown ' . $drop_side . ' submenu_default_width">';
					$woo_cart_item .= mm_common::ntab(2) . '<span tabindex="0" class="item_link menu_item_without_text">'; 
					$woo_cart_item .= mm_common::ntab(3) . '<i class="icon-bag3"></i>'; 
					$woo_cart_item .= mm_common::ntab(2) . '</span><!-- class="item_link" -->'; 
					$woo_cart_item .= mm_common::ntab(2) . '<ul class="mega_dropdown">';
					$woo_cart_item .= mm_common::ntab(3) . '<div class="woocommerce">';
					$woo_cart_item .= mm_common::ntab(3) . '<div class="widget_shopping_cart_content"></div>';
					$woo_cart_item .= mm_common::ntab(3) . '</div><!-- class="woocommerce" -->';
					$woo_cart_item .= mm_common::ntab(2) . '</ul><!-- class="mega_dropdown" -->';
					$woo_cart_item .= mm_common::ntab(1) . '</li><!-- class="nav_woo_cart" -->';
					$items = $items . $woo_cart_item;
				}
			}
		}
		return $items;
	}

	/** 
	 * Include WPML switcher in menu.
	 * @return $items
	 */
	function mmm_nav_wpml_switcher ( $items, $args ) {
		$options = get_option('infinite_options');
		global $mega_main_menu;
		$args = (object) $args;
		if( isset( $args->theme_location ) ) {
	        $args->theme_location = str_replace( ' ', '-', $args->theme_location );
			if( $options['wpml_include_component'] == '1'  && $args->theme_location != 'side_menu' ) {
				if ( function_exists( 'icl_get_languages' ) ){
					$languages = icl_get_languages('skip_missing=0');
					if ( 1 < count( $languages ) ) {
						$wpml_switcher_dropdown = '';
						foreach( $languages as $l ){
							$wpml_switcher_dropdown .= mm_common::ntab(3) . '<li class="menu-item">';
							$wpml_switcher_dropdown .= mm_common::ntab(4) . '<a href="' . $l[ 'url' ] . '" title="' . $l[ 'translated_name' ] . '" tabindex="0" class="item_link with_icon">';
							$wpml_switcher_dropdown .= mm_common::ntab(3) . '<i class="ci-icon-' . $l[ 'language_code' ] . '"><style>.ci-icon-' . $l[ 'language_code' ] . ':before{ background-image: url("' . $l[ 'country_flag_url' ] . '"); }</style></i>';
							$wpml_switcher_dropdown .= mm_common::ntab(5) . '<span class="link_content">';
							$wpml_switcher_dropdown .= mm_common::ntab(6) . '<span class="link_text">' . $l[ 'native_name' ] . '</span>';
							$wpml_switcher_dropdown .= mm_common::ntab(5) . '</span>';
							$wpml_switcher_dropdown .= mm_common::ntab(4) . '</a><!-- class="item_link" -->';
							$wpml_switcher_dropdown .= mm_common::ntab(3) . '</li>';
							if ( $l[ 'active' ] == 1 ) {
								$primary_item[ 'language_code' ] = $l[ 'language_code' ];
								$primary_item[ 'translated_name' ] = $l[ 'translated_name' ];
								$primary_item[ 'country_flag_url' ] = $l[ 'country_flag_url' ];
							}
						}

	  					$drop_side = ( $options['language_direction'] == 'ltr' ) ? 'drop_to_left' : 'drop_to_right';
						$wpml_switcher_item = mm_common::ntab(1) . '<li class="menu-item nav_wpml_switcher default_dropdown ' . $drop_side . ' submenu_default_width">';
						$wpml_switcher_item .= mm_common::ntab(2) . '<span class="item_link menu_item_without_text">'; 
						$wpml_switcher_item .= mm_common::ntab(3) . '<i class="ci-icon-' . $primary_item[ 'language_code' ] . '"><style>.ci-icon-' . $primary_item[ 'language_code' ] . ':before{ background-image: url("' . $primary_item[ 'country_flag_url' ] . '"); }</style></i>'; 
						$wpml_switcher_item .= mm_common::ntab(2) . '</span><!-- class="item_link" -->'; 
						$wpml_switcher_item .= mm_common::ntab(2) . '<ul class="mega_dropdown">';
						$wpml_switcher_item .= $wpml_switcher_dropdown;
						$wpml_switcher_item .= mm_common::ntab(2) . '</ul><!-- class="mega_dropdown" -->';
						$wpml_switcher_item .= mm_common::ntab(1) . '</li><!-- class="nav_wpml_switcher" -->';
						$items = $items . $wpml_switcher_item;
					}
				}
			}
		}
		return $items;
	}

	/** 
	 * Include buddypress in menu.
	 * @return $items
	 */
	function mmm_nav_buddypress( $items, $args ) {
		$options = get_option('infinite_options');
		global $mega_main_menu;
		$args = (object) $args;
		if( isset( $args->theme_location ) ) {
	        $args->theme_location = str_replace( ' ', '-', $args->theme_location );
			if( $options['buddypress_include_component'] == '1'  && $args->theme_location != 'side_menu' ) {
				if ( class_exists( 'BuddyPress' ) ){
					global $bp;

					$bp_avatar = bp_core_fetch_avatar( array( 'item_id'=>$bp->loggedin_user->id, 'html'=>false ) );
					if ( strpos( $bp_avatar, 'gravatar' ) !== false ) {
						$bp_avatar = $bp->avatar->thumb->default;
					}
					$buddypress_item = '';
					$drop_side = ( $options['language_direction'] == 'ltr' ) ? 'drop_to_left' : 'drop_to_right';
					if ( is_user_logged_in() ) {
						$notifications = bp_notifications_get_notifications_for_user( bp_loggedin_user_id(), 'object' );
						$count = ! empty( $notifications ) ? count( $notifications ) : 0;
						$menu_link = trailingslashit( bp_loggedin_user_domain() . bp_get_notifications_slug() );
						$notification_class = (int) $count > 0 ? 'notification-yes' : 'notification-none';

						$buddypress_item .= mm_common::ntab(1) . '<li class="menu-item nav_buddypress default_dropdown ' . $drop_side . ' submenu_default_width">';
						$buddypress_item .= mm_common::ntab(2) . '<a href="' . $menu_link . '" tabindex="0" class="item_link ">';
						$buddypress_item .= mm_common::ntab(3) . '<i class="ci-icon-buddypress-user"><style>.ci-icon-buddypress-user:before{ background-image: url("' . $bp_avatar . '"); }</style><span class="mega_notifications ' . $notification_class . '">' . $count . '</span></i>';
						$buddypress_item .= mm_common::ntab(3) . '';
						$buddypress_item .= mm_common::ntab(2) . '</a><!--  class="item_link" -->';
						$buddypress_item .= mm_common::ntab(2) . '<ul class="mega_dropdown">';
						foreach ( $bp->bp_nav as $key => $component ) {
							switch ( $component[ 'slug' ] ) {
								case 'activity':
									$icon = 'health';
									break;
								case 'profile':
									$icon = 'user';
									break;
								case 'notifications':
									$icon = 'notification-2';
									break;
								case 'messages':
									$icon = 'envelop-opened';
									break;
								case 'friends':
									$icon = 'users';
									break;
								case 'groups':
									$icon = 'tree-5';
									break;
								default:
									$icon = 'cog';
									break;
							}
							$buddypress_item .= mm_common::ntab(3) . '<li class="menu-item">';
							$buddypress_item .= mm_common::ntab(4) . '<a href="' . $component[ 'link' ] . '" tabindex="0" class="item_link with_icon">';
							$buddypress_item .= mm_common::ntab(5) . '<i class="im-icon-' . $icon . '"></i>';
							$buddypress_item .= mm_common::ntab(5) . '<span class="link_content">';
							$buddypress_item .= mm_common::ntab(6) . '<span class="link_text">' . $component[ 'name' ] . '</span>';
							$buddypress_item .= mm_common::ntab(5) . '</span>';
							$buddypress_item .= mm_common::ntab(4) . '</a><!-- class="item_link" -->';
							if ( is_array( $bp->bp_options_nav[ $component[ 'slug' ] ] ) ) {
								$buddypress_item .= mm_common::ntab(4) . '<ul class="mega_dropdown">';
								foreach ( $bp->bp_options_nav[ $component[ 'slug' ] ] as $key => $sub_component ) {
									$buddypress_item .= mm_common::ntab(5) . '<li class="menu-item">';
									$buddypress_item .= mm_common::ntab(6) . '<a href="' . $sub_component[ 'link' ] . '" tabindex="0" class="item_link">';
									$buddypress_item .= mm_common::ntab(7) . '<span class="link_content">';
									$buddypress_item .= mm_common::ntab(8) . '<span class="link_text">' . $sub_component[ 'name' ] . '</span>';
									$buddypress_item .= mm_common::ntab(7) . '</span>';
									$buddypress_item .= mm_common::ntab(6) . '</a><!-- class="item_link" -->';
									$buddypress_item .= mm_common::ntab(5) . '</li>';
								}
								$buddypress_item .= mm_common::ntab(4) . '</ul><!-- class="mega_dropdown" -->';
							}
							$buddypress_item .= mm_common::ntab(3) . '</li>';
						}

						$buddypress_item .= mm_common::ntab(3) . '<li class="menu-item">';
						$buddypress_item .= mm_common::ntab(4) . '<a href="' . wp_logout_url() . '" title="' . __( 'Log Out' ) . '" tabindex="0" class="item_link with_icon">';
						$buddypress_item .= mm_common::ntab(5) . '<i class="im-icon-switch"></i>';
						$buddypress_item .= mm_common::ntab(5) . '<span class="link_content">';
						$buddypress_item .= mm_common::ntab(6) . '<span class="link_text">';
						$buddypress_item .= mm_common::ntab(7) . __( 'Log Out' );
						$buddypress_item .= mm_common::ntab(6) . '</span>';
						$buddypress_item .= mm_common::ntab(5) . '</span>';
						$buddypress_item .= mm_common::ntab(4) . '</a>';
						$buddypress_item .= mm_common::ntab(3) . '</li>';
						$buddypress_item .= mm_common::ntab(2) . '</ul><!-- class="mega_dropdown" -->';
						$buddypress_item .= mm_common::ntab(1) . '</li><!-- class="nav_buddypress" -->' . mm_common::ntab(0);
					} else {
						$buddypress_item .= mm_common::ntab(1) . '<li class="nav_buddypress not_logged default_dropdown ' . $drop_side . ' submenu_default_width">';
						$buddypress_item .= mm_common::ntab(2) . '<span class="item_link">';
						$buddypress_item .= mm_common::ntab(3) . '<i class="im-icon-user"></i>';
						$buddypress_item .= mm_common::ntab(2) . '</span><!--  class="item_link" -->';
						$buddypress_item .= mm_common::ntab(2) . '<ul class="mega_dropdown">';
						$buddypress_item .= mm_common::ntab(3) . wp_login_form( array( 'echo' => false ) );
						$buddypress_item .= mm_common::ntab(2) . '</ul><!-- class="mega_dropdown" -->';
						$buddypress_item .= mm_common::ntab(1) . '</li><!-- class="nav_buddypress" -->' . mm_common::ntab(0);
					}
					$items = $items . $buddypress_item;
				}
			}
		}
		return $items;
	}
?>