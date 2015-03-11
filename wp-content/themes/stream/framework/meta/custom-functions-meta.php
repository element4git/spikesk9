<?php 

/*-----------------------------------------------------------------------------------*/
/*	Custom-Functions
/*-----------------------------------------------------------------------------------*/

// Page Header Settings
if ( !function_exists( 'ig_page_header' ) ) {
    function ig_page_header($postid) {
		
		global $options;
		global $post;
		
		$check_page_settings = get_post_meta($postid, '_ig_header_settings', true);
        $check_page_text_settings = get_post_meta($postid, '_ig_header_text', true);
        $bg_height = get_post_meta($postid, '_ig_header_height', true);
    	$bg = get_post_meta($postid, '_ig_header_bg', true);
        $bg_overlay = get_post_meta($postid, '_ig_header_overlay', true);
        $bg_opacity = get_post_meta($postid, '_ig_header_overlay_bg_opacity', true);
        $bg_color = get_post_meta($postid, '_ig_header_overlay_bg_color', true);
		$bgattachment = get_post_meta($postid, '_ig_header_bg_attachment', true);
		$page_title = get_post_meta($postid, '_ig_page_title', true);
		$page_caption = get_post_meta($postid, '_ig_page_caption', true);
		$page_align_text = get_post_meta($postid, '_ig_page_text_align', true);
		$singular_accent_color = get_post_meta($postid, '_ig_accent_color', true);
		$singular_header_background_color = get_post_meta($postid, '_ig_header_background_color', true);
		$singular_header_background_color_first_level = get_post_meta($postid, '_ig_header_background_color_first_level', true);
		$singular_header_background_color_active_first_level = get_post_meta($postid, '_ig_header_background_color_active_first_level', true);
		$singular_header_background_color_search = get_post_meta($postid, '_ig_header_background_color_search', true);
		$singular_header_text_color_first_level = get_post_meta($postid, '_ig_header_text_color_first_level', true);
		$singular_header_text_color_active_first_level = get_post_meta($postid, '_ig_header_text_color_active_first_level', true);
		$singular_header_background_color_dropdown_elements = get_post_meta($postid, '_ig_header_background_color_dropdown_elements', true);
		$singular_header_background_color_dropdown_menu_item = get_post_meta($postid, '_ig_header_background_color_dropdown_menu_item', true);
		$singular_header_background_color_dropdown_active_menu_item = get_post_meta($postid, '_ig_header_background_color_dropdown_active_menu_item', true);
		$singular_header_border_color_between_dropdown_menu_items = get_post_meta($postid, '_ig_header_border_color_between_dropdown_menu_items', true);
		$singular_header_text_color_dropdown_menu_item = get_post_meta($postid, '_ig_header_text_color_dropdown_menu_item', true);
		$singular_header_text_color_dropdown_active_menu_item = get_post_meta($postid, '_ig_header_text_color_dropdown_active_menu_item', true);
		$singular_body_color = get_post_meta($postid, '_ig_body_color', true);
		$singular_heading_color = get_post_meta($postid, '_ig_heading_color', true);
		$singular_back_to_top_color = get_post_meta($postid, '_ig_back_to_top_color', true);
		$singular_footer_widget_background = get_post_meta($postid, '_ig_footer_widget_background', true);
		$singular_footer_widget_heading_font_color = get_post_meta($postid, '_ig_footer_widget_heading_font_color', true);
		$singular_footer_widget_font_color = get_post_meta($postid, '_ig_footer_widget_font_color', true);
		$singular_footer_credits_background = get_post_meta($postid, '_ig_footer_credits_background', true);
		$singular_footer_credits_font_color = get_post_meta($postid, '_ig_footer_credits_font_color', true);
        $page_color_text = get_post_meta($postid, '_ig_page_text_color', true);
		$rev_slider_alias = get_post_meta($postid, '_ig_intro_slider_header', true);

        $overlay_mode = null;
        $fill_mode = null;	
		$post_icon = get_post_meta( $postid, 'mm_post_icon', true) ? get_post_meta( $postid, 'mm_post_icon', true) : '';	
		?>
        
			  <style type="text/css">  
			  
			  <?php if (!empty($singular_accent_color)) { ?>
					a,
					header #logo a:hover,
					header #logo a:focus,
					header #logo a:active,
					#menu ul li.current_page_item a,
					#menu ul li.current-menu-item a,
					#latest-posts .post-name .entry-title a:hover,
					.entry-meta.entry-header a:hover,
					.entry-meta.entry-header a:active,
					.entry-meta.entry-header a:focus,
					.standard-blog .post-name .entry-title a:hover,
					.masonry-blog .post-name .entry-title a:hover,
					.center-blog .post-name .entry-title a:hover,
					.comment-author cite a:hover,
					.comment-meta a:hover,
					#commentform span.required,
					#copyright p a,
					.social_widget a i,
					.dropmenu-active ul li a:hover,
					.color-text,
					.dropcap-color,
					.social-icons li a:hover i,
					.counter-number .count-number-icon {
						color: <?php echo $singular_accent_color; ?>;
					}
					
					#menu ul .sub-menu li a:hover {
						color: <?php echo $singular_accent_color; ?> !important;
					}
					
					.overlay-bg,
					.item-project i,
					.standard-blog .post-link,
					.standard-blog .post-quote,
					.masonry-blog .post-link,
					.masonry-blog .post-quote,
					.center-blog .post-link,
					.center-blog .post-quote,
					.badge_author,
					#error-page .error-btn,
					.social_widget a:hover,
					.tooltip-inner,
					.highlight-text,
					.progress-bar .bar,
					.pricing-table.selected .price,
					.pricing-table.selected .confirm,
					.mejs-overlay:hover .mejs-overlay-button,
					.mejs-controls .mejs-time-rail .mejs-time-current,
					.mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current,
					.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
					#jpreOverlay,
					#jSplash,
					#jprePercentage {
						background-color: <?php echo $singular_accent_color; ?>;
					}
					
					.navigation-projects ul li.prev a:hover,
					.navigation-projects ul li.next a:hover,
					.navigation-projects ul li.back-page a:hover,
					.post-type-navi .prev a:hover, 
					.post-type-navi .next a:hover {
						background-color: <?php echo $singular_accent_color; ?>;
						border-color: <?php echo $singular_accent_color; ?>;
					}
					
					.wpcf7 .wpcf7-submit:hover,
					.wpcf7 .wpcf7-submit:focus,
					.wpcf7 .wpcf7-submit:active,
					#commentform #submit:hover,
					.button-main:hover,
					.button-main:active,
					.button-main:focus,
					.button-main.inverted,
					#back-top a:hover i {
						background-color: <?php echo $singular_accent_color; ?>;
						border-color: <?php echo $singular_accent_color; ?>;
					}
					
					.wpcf7-form.invalid input.wpcf7-not-valid,
					.wpcf7-form.invalid textarea.wpcf7-not-valid,
					.wpcf7-form input:focus:invalid:focus,
					.wpcf7-form textarea:focus:invalid:focus,
					.social_widget a {
						border-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tagcloud a {
						border-color: <?php echo $singular_accent_color; ?>;
						color: <?php echo $singular_accent_color; ?>;
					}
					
					.tagcloud a:hover,
					.tagcloud a:active,
					.tagcloud a:focus {
						background-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tooltip.top .tooltip-arrow {
						border-top-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tooltip.right .tooltip-arrow {
						border-right-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tooltip.left .tooltip-arrow {
						border-left-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tooltip.bottom .tooltip-arrow {
						border-bottom-color: <?php echo $singular_accent_color; ?>;
					}
					
					.box .icon.circle-mode-box {
						border-color: rgba(<?php echo $rgb; ?>, 0.5);
					}
					
					.box:hover .icon.circle-mode-box,
					.box:active .icon.circle-mode-box,
					.box:focus .icon.circle-mode-box {
						border-color: <?php echo $singular_accent_color; ?>;
						background-color: <?php echo $singular_accent_color; ?>;
					}
					
					.box .icon.circle-mode-box i,
					.box.boxed-version .icon-boxed i,
					.box .icon.icon-only-mode-box {
						color: <?php echo $singular_accent_color; ?>;
					}
			  <?php } ?>
			  
              <?php if (!empty($singular_header_background_color)) { ?>
			  		#mega_main_menu > .menu_holder > .mmm_fullwidth_container,
			  		.sticky-header, .normal-header {background-color: <?php echo $singular_header_background_color; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_first_level)) { ?>
			  		#mega_main_menu > primary_style-buttons > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link {background-color: <?php echo $singular_header_background_color_first_level; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_active_first_level)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link {background-color: <?php echo $singular_header_background_color_active_first_level; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_search)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_search_box > #mega_main_menu_searchform {background-color: <?php echo $singular_header_background_color_search; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_text_color_first_level)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link * {color: <?php echo $singular_header_text_color_first_level; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_text_color_active_first_level)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link *,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link * {color: <?php echo $singular_header_text_color_active_first_level; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_dropdown_elements)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .mega_dropdown,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown > li .post_details {background-color: <?php echo $singular_header_background_color_dropdown_elements; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_dropdown_menu_item)) { ?>
			  		#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link {background-color: <?php echo $singular_header_background_color_dropdown_menu_item; ?> !important; color: <?php echo $singular_header_text_color_dropdown_menu_item; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_dropdown_active_menu_item)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li:hover > .item_link,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li:hover > .item_link,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .item_link:hover,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li.current-menu-item > .item_link,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .processed_image,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .item_link,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link:hover,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li.current-menu-item > .item_link,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .processed_image:hover {background-color: <?php echo $singular_header_background_color_dropdown_active_menu_item; ?> !important; color: <?php echo $singular_header_text_color_dropdown_active_menu_item; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_border_color_between_dropdown_menu_items)) { ?>
			  		#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link {border-color: <?php echo $singular_header_border_color_between_dropdown_menu_items; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_text_color_dropdown_menu_item)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li .post_details > .post_icon > i,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link *,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown a,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown a *,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link *,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link *,
					#mega_main_menu ul li li .post_details a {color: <?php echo $singular_header_text_color_dropdown_menu_item; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_text_color_dropdown_active_menu_item)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover *,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus *,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li:hover > .item_link *,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li:hover > .item_link *,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .item_link *,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li a:hover *,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .processed_image:hover > .cover > a > i {color: <?php echo $singular_header_text_color_dropdown_active_menu_item; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_body_color)) { ?>
			  		body, a:hover, a:active, a:focus, .entry-meta.entry-header a, .comment-meta, .comment-meta a,
#twitter-feed .tweet_list li .tweet_time a, .box p, .dropmenu-active ul li a {color: <?php echo $singular_body_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_heading_color)) { ?>
			  		h1, h2, h3, h4, h5, h6, #latest-posts .post-name .entry-title a, .standard-blog .post-name .entry-title a, .masonry-blog .post-name .entry-title a, .center-blog .post-name .entry-title a, .comment-author cite,
.comment-author cite a, .dropmenu p, .accordion-heading .accordion-toggle, .nav > li > a, .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus, .dropcap, .easyPieChart, .pricing-table .price, .counter-number .number-value {color: <?php echo $singular_heading_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_back_to_top_color)) { ?>
			  		#back-top a i {border-color: <?php echo $singular_back_to_top_color; ?>; color: <?php echo $singular_back_to_top_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_widget_background)) { ?>
			  		footer {background-color: <?php echo $singular_footer_widget_background; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_widget_heading_font_color)) { ?>
			  		.footer-widgets-wrap h3, .footer-widgets-wrap .tweet_timestamp > a {color: <?php echo $singular_footer_widget_heading_font_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_widget_font_color)) { ?>
			  		.footer-widgets-wrap {color: <?php echo $singular_footer_widget_font_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_credits_background)) { ?>
			  		#copyright {background-color: <?php echo $singular_footer_credits_background; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_credits_font_color)) { ?>
			  		#copyright p {color: <?php echo $singular_footer_credits_font_color; ?>; }
			  <?php } ?>
			  
              </style>  
        
        <?php

        if (!empty($bg_color) && !empty($bg_opacity)) { $overlay_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $overlay_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $overlay_mode = ' style="opacity: '.$bg_opacity.';"'; }
		
		if (!empty($page_color_text)) { $page_color_text = ' style="color: '.$page_color_text.';"'; }

        if (!empty($bg_color) && !empty($bg_opacity)) { $fill_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $fill_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $fill_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($bg_height)) { $bg_height = 'style="padding-top: '.$bg_height.'px; padding-bottom: '.$bg_height.'px;"'; }

?>		
	
<?php if ( $check_page_settings == "enabled") { ?>
		
        <?php if( !empty($bg) ) { ?> 
        <section id="image-static">
        <?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo '<span class="overlay-bg"'.$overlay_mode.'></span>'; } ?>
    
        <div class="fullimage-container<?php if( !empty($page_title) || !empty($page_caption) ) { ?> <?php echo 'titlize'; ?><?php } ?>" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-attachment: <?php echo $bgattachment; ?>; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">  
        <?php if ( $check_page_text_settings == "enabled") { ?>
            <div class="container pagize" <?php echo $bg_height; ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
                    <?php if( !empty($page_title) ) { ?>
                        <h2<?php echo $page_color_text; ?>><?php if ($post_icon != '') { ?> <i class="<?php echo $post_icon; ?>"></i> <?php } ?><?php echo $page_title; ?></h2>
                    <?php } else { ?>
                        <h2<?php echo $page_color_text; ?>><?php if ($post_icon != '') { ?> <i class="<?php echo $post_icon; ?>"></i> <?php } ?><?php echo the_title(); ?></h2>
                    <?php } ?>
                    <?php if( !empty($page_caption) ) { ?>
                        <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                    <?php } ?>
                    </div>
            	</div>
            </div>
        <?php } ?>            
        </div>
        </section>
        <?php } else if( !empty($rev_slider_alias) ) { ?>
        <section id="slider-header">
            <?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
        </section>
        <?php } else { ?>
        <section id="title-page">
        	<span class="overlay-bg-fill"<?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo $fill_mode; } ?>></span>
        	<div class="container pagize" <?php echo $bg_height; ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
                    <?php if( !empty($page_title) ) { ?>
                    	
                        <h2<?php echo $page_color_text; ?>><?php if ($post_icon != '') { ?> <i class="<?php echo $post_icon; ?>"></i> <?php } ?><?php echo $page_title; ?></h2>
                    <?php } else { ?>
                        <h2<?php echo $page_color_text; ?>><?php if ($post_icon != '') { ?> <i class="<?php echo $post_icon; ?>"></i> <?php } ?><?php echo the_title(); ?></h2>
                    <?php } ?>
                    <?php if( !empty($page_caption) ) { ?>
                        <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                    <?php } ?>
            		</div>
            	</div>
            </div>
        </section>
        <?php } ?>
    <?php }
    }
}

// Page Team Header Settings
if ( !function_exists( 'ig_page_header_team' ) ) {
    function ig_page_header_team($postid) {
		
		global $options;
		global $post;

		$check_page_settings = get_post_meta($postid, '_ig_header_settings', true);
        $check_page_text_settings = get_post_meta($postid, '_ig_header_text', true);
        $bg_height = get_post_meta($postid, '_ig_header_height', true);
    	$bg = get_post_meta($postid, '_ig_header_bg', true);
		$bg_overlay = get_post_meta($postid, '_ig_header_overlay', true);
        $bg_opacity = get_post_meta($postid, '_ig_header_overlay_bg_opacity', true);
        $bg_color = get_post_meta($postid, '_ig_header_overlay_bg_color', true);
		$bgattachment = get_post_meta($postid, '_ig_header_bg_attachment', true);
		$page_title = get_post_meta($postid, '_ig_page_title', true);
		$page_caption = get_post_meta($postid, '_ig_page_caption', true);
		$page_align_text = get_post_meta($postid, '_ig_page_text_align', true);
        $page_color_text = get_post_meta($postid, '_ig_page_text_color', true);
		$rev_slider_alias = get_post_meta($postid, '_ig_intro_slider_header', true);

        $overlay_mode = null;
        $fill_mode = null;

        if (!empty($bg_color) && !empty($bg_opacity)) { $overlay_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $overlay_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $overlay_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($page_color_text)) { $page_color_text = ' style="color: '.$page_color_text.';"'; }

        if (!empty($bg_color) && !empty($bg_opacity)) { $fill_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $fill_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $fill_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($bg_height)) { $bg_height = 'style="padding-top: '.$bg_height.'px; padding-bottom: '.$bg_height.'px;"'; }
		
        // Attrs
		$attrs = get_the_terms( $post->ID, 'attributes' );
		$attributes_fields = null;
		
		if ( !empty($attrs) ){
		 foreach ( $attrs as $attr ) {
		   $attributes_fields[] = $attr->name;
		 }
		 
		 $on_attributes = join( " - ", $attributes_fields );
		}
	?>		
	
    <?php if ( $check_page_settings == "enabled") { ?>
		
    <?php if( !empty($bg) ) { ?> 
        <section id="image-static">
        <?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo '<span class="overlay-bg"'.$overlay_mode.'></span>'; } ?>
		
        <div class="fullimage-container<?php if( !empty($page_title) || !empty($page_caption) ) { ?> <?php echo 'titlize'; ?><?php } ?>" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-attachment: <?php echo $bgattachment; ?>; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">  
        <?php if ( $check_page_text_settings == "enabled") { ?>
            <div class="container pagize" <?php echo $bg_height; ?>>
                <div class="row">
                    <div class="col-md-12 <?php echo $page_align_text; ?>">
                        <?php if( !empty($page_title) ) { ?>
                            <h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                        <?php } else { ?>
                            <h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                        <?php } ?>
                        <?php if( !empty($page_caption) ) { ?>
                            <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                        <?php } else { ?>
                            <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $on_attributes; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>            
        </div>
        </section>
	    <?php } else if( !empty($rev_slider_alias) ) { ?>
        <section id="slider-header">
            <?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
        </section>
		<?php } else { ?>
        <section id="title-page">
        	<span class="overlay-bg-fill"<?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo $fill_mode; } ?>></span>
        	<div class="container pagize" <?php echo $bg_height; ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
                        <?php if( !empty($page_title) ) { ?>
                        	<h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                        <?php } else { ?>
                        	<h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                        <?php } ?>
                        <?php if( !empty($page_caption) ) { ?>
                        	<p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                        <?php } else { ?>
                        	<p class="page-caption"<?php echo $page_color_text; ?>><?php echo $on_attributes; ?></p>
                        <?php } ?>
            		</div>
            	</div>
            </div>
        </section>
		<?php } ?>
    
    <?php }
    }
}

global $woocommerce; 
	if ($woocommerce) {

// Page WooCommerce Header Main Page Settings
if ( !function_exists( 'ig_page_woocommerce_header' ) ) {
    function ig_page_woocommerce_header($postid) {
		
		global $options;
		global $post;
		$options = get_option('infinite_options');
		
		$check_page_settings = $options['enable-woo-header-options'];
        $check_page_text_settings = $options['check-woo-header-text-settings'];
    	$bg = $options['bg-woo-header']['url'];
        $bg_height = $options['bg-woo-header-height'];
		$bg_overlay = $options['bg-woo-header-overlay'];
        $bg_opacity = $options['bg-woo-header-opacity'];
        $bg_color = $options['bg-woo-header-color'];
		$bgattachment = $options['bg-woo-header-attachment'];
		$page_title = $options['title-woo-header'];
		$page_caption = $options['caption-woo-header'];
		$page_align_text = $options['text-woo-header-align'];
        $page_color_text = $options['text-woo-header-color'];
		$rev_slider_alias = $options['slide-woo-header'];
		
        $overlay_mode = null;
        $fill_mode = null;

        if (!empty($bg_color) && !empty($bg_opacity)) { $overlay_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $overlay_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $overlay_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($page_color_text)) { $page_color_text = ' style="color: '.$page_color_text.';"'; }

        if (!empty($bg_color) && !empty($bg_opacity)) { $fill_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $fill_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $fill_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($bg_height)) { $bg_height = 'style="padding-top: '.$bg_height.'px; padding-bottom: '.$bg_height.'px;"'; }

        // Attrs
		$attrs = get_the_terms( $post->ID, 'project-attribute' );
		$attributes_fields = null;
		
		if ( !empty($attrs) ){
		 foreach ( $attrs as $attr ) {
		   $attributes_fields[] = $attr->name;
		 }
		 
		 $on_attributes = join( " - ", $attributes_fields );
		}
	?>		
	
    <?php if ( $check_page_settings == "1") { ?>
		
    <?php if( !empty($bg) ) { ?> 
        <section id="image-static" class="woo-header-margin">
        <?php if(!empty($bg_overlay) && $bg_overlay == '1') { echo '<span class="overlay-bg"'.$overlay_mode.'></span>'; } ?>
		
        <div class="fullimage-container<?php if( !empty($page_title) || !empty($page_caption) ) { ?> <?php echo 'titlize'; ?><?php } ?>" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-attachment: <?php echo $bgattachment; ?>; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">  
        <?php if ( $check_page_text_settings == "1") { ?>
            <div class="container pagize" <?php echo $bg_height; ?>>
                <div class="row">
                    <div class="col-md-12 <?php echo $page_align_text; ?>">
                        <?php if( !empty($page_title) ) { ?>
                            <h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                        <?php } else { ?>
                            <h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                        <?php } ?>
                        <?php if( !empty($page_caption) ) { ?>
                            <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                        <?php } else { ?>
                            <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $on_attributes; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>            
        </div>
        </section>
	    <?php } else if( !empty($rev_slider_alias) ) { ?>
        <section id="slider-header" class="woo-header-margin">
            <?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
        </section>
		<?php } else { ?>
        <section id="title-page" class="woo-header-margin">
        	<span class="overlay-bg-fill"<?php if(!empty($bg_overlay) && $bg_overlay == '1') { echo $fill_mode; } ?>></span>
        	<div class="container pagize" <?php echo $bg_height; ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
						<?php if( !empty($page_title) ) { ?>
                        	<h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                        <?php } else { ?>
                        	<h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                        <?php } ?>
                        <?php if( !empty($page_caption) ) { ?>
                        	<p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                        <?php } else { ?>
                        	<p class="page-caption"<?php echo $page_color_text; ?>><?php echo $on_attributes; ?></p>
                        <?php } ?>
            		</div>
            	</div>
            </div>
        </section>
		<?php } ?>
    
    <?php }
    }
}

}

// Page Portfolio Header Settings
if ( !function_exists( 'ig_page_header_portfolio' ) ) {
    function ig_page_header_portfolio($postid) {
		
		global $options;
		global $post;
		
		$check_page_settings = get_post_meta($postid, '_ig_header_settings', true);
        $check_page_text_settings = get_post_meta($postid, '_ig_header_text', true);
        $bg_height_top = get_post_meta($postid, '_ig_header_height_top', true);
		$bg_height_bottom = get_post_meta($postid, '_ig_header_height_bottom', true);
    	$bg = get_post_meta($postid, '_ig_header_bg', true);
        $bg_overlay = get_post_meta($postid, '_ig_header_overlay', true);
        $bg_opacity = get_post_meta($postid, '_ig_header_overlay_bg_opacity', true);
        $bg_color = get_post_meta($postid, '_ig_header_overlay_bg_color', true);
		$bgattachment = get_post_meta($postid, '_ig_header_bg_attachment', true);
		$page_title = get_post_meta($postid, '_ig_page_title', true);
		$page_caption = get_post_meta($postid, '_ig_page_caption', true);
		$page_align_text = get_post_meta($postid, '_ig_page_text_align', true);
		$singular_accent_color = get_post_meta($postid, '_ig_accent_color', true);
		$singular_header_background_color = get_post_meta($postid, '_ig_header_background_color', true);
		$singular_header_background_color_first_level = get_post_meta($postid, '_ig_header_background_color_first_level', true);
		$singular_header_background_color_active_first_level = get_post_meta($postid, '_ig_header_background_color_active_first_level', true);
		$singular_header_background_color_search = get_post_meta($postid, '_ig_header_background_color_search', true);
		$singular_header_text_color_first_level = get_post_meta($postid, '_ig_header_text_color_first_level', true);
		$singular_header_text_color_active_first_level = get_post_meta($postid, '_ig_header_text_color_active_first_level', true);
		$singular_header_background_color_dropdown_elements = get_post_meta($postid, '_ig_header_background_color_dropdown_elements', true);
		$singular_header_background_color_dropdown_menu_item = get_post_meta($postid, '_ig_header_background_color_dropdown_menu_item', true);
		$singular_header_background_color_dropdown_active_menu_item = get_post_meta($postid, '_ig_header_background_color_dropdown_active_menu_item', true);
		$singular_header_border_color_between_dropdown_menu_items = get_post_meta($postid, '_ig_header_border_color_between_dropdown_menu_items', true);
		$singular_header_text_color_dropdown_menu_item = get_post_meta($postid, '_ig_header_text_color_dropdown_menu_item', true);
		$singular_header_text_color_dropdown_active_menu_item = get_post_meta($postid, '_ig_header_text_color_dropdown_active_menu_item', true);
		$singular_body_color = get_post_meta($postid, '_ig_body_color', true);
		$singular_heading_color = get_post_meta($postid, '_ig_heading_color', true);
		$singular_back_to_top_color = get_post_meta($postid, '_ig_back_to_top_color', true);
		$singular_footer_widget_background = get_post_meta($postid, '_ig_footer_widget_background', true);
		$singular_footer_widget_heading_font_color = get_post_meta($postid, '_ig_footer_widget_heading_font_color', true);
		$singular_footer_widget_font_color = get_post_meta($postid, '_ig_footer_widget_font_color', true);
		$singular_footer_credits_background = get_post_meta($postid, '_ig_footer_credits_background', true);
		$singular_footer_credits_font_color = get_post_meta($postid, '_ig_footer_credits_font_color', true);
        $page_color_text = get_post_meta($postid, '_ig_page_text_color', true);
		$rev_slider_alias = get_post_meta($postid, '_ig_intro_slider_header', true);

        $overlay_mode = null;
        $fill_mode = null;		
		?>
        
			  <style type="text/css">  
			  
			  <?php if (!empty($singular_accent_color)) { ?>
					a,
					header #logo a:hover,
					header #logo a:focus,
					header #logo a:active,
					#menu ul li.current_page_item a,
					#menu ul li.current-menu-item a,
					#latest-posts .post-name .entry-title a:hover,
					.entry-meta.entry-header a:hover,
					.entry-meta.entry-header a:active,
					.entry-meta.entry-header a:focus,
					.standard-blog .post-name .entry-title a:hover,
					.masonry-blog .post-name .entry-title a:hover,
					.center-blog .post-name .entry-title a:hover,
					.comment-author cite a:hover,
					.comment-meta a:hover,
					#commentform span.required,
					#copyright p a,
					.social_widget a i,
					.dropmenu-active ul li a:hover,
					.color-text,
					.dropcap-color,
					.social-icons li a:hover i,
					.counter-number .count-number-icon {
						color: <?php echo $singular_accent_color; ?>;
					}
					
					#menu ul .sub-menu li a:hover {
						color: <?php echo $singular_accent_color; ?> !important;
					}
					
					.overlay-bg,
					.item-project i,
					.standard-blog .post-link,
					.standard-blog .post-quote,
					.masonry-blog .post-link,
					.masonry-blog .post-quote,
					.center-blog .post-link,
					.center-blog .post-quote,
					.badge_author,
					#error-page .error-btn,
					.social_widget a:hover,
					.tooltip-inner,
					.highlight-text,
					.progress-bar .bar,
					.pricing-table.selected .price,
					.pricing-table.selected .confirm,
					.mejs-overlay:hover .mejs-overlay-button,
					.mejs-controls .mejs-time-rail .mejs-time-current,
					.mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current,
					.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
					#jpreOverlay,
					#jSplash,
					#jprePercentage {
						background-color: <?php echo $singular_accent_color; ?>;
					}
					
					.navigation-projects ul li.prev a:hover,
					.navigation-projects ul li.next a:hover,
					.navigation-projects ul li.back-page a:hover,
					.post-type-navi .prev a:hover, 
					.post-type-navi .next a:hover {
						background-color: <?php echo $singular_accent_color; ?>;
						border-color: <?php echo $singular_accent_color; ?>;
					}
					
					.wpcf7 .wpcf7-submit:hover,
					.wpcf7 .wpcf7-submit:focus,
					.wpcf7 .wpcf7-submit:active,
					#commentform #submit:hover,
					.button-main:hover,
					.button-main:active,
					.button-main:focus,
					.button-main.inverted,
					#back-top a:hover i {
						background-color: <?php echo $singular_accent_color; ?>;
						border-color: <?php echo $singular_accent_color; ?>;
					}
					
					.wpcf7-form.invalid input.wpcf7-not-valid,
					.wpcf7-form.invalid textarea.wpcf7-not-valid,
					.wpcf7-form input:focus:invalid:focus,
					.wpcf7-form textarea:focus:invalid:focus,
					.social_widget a {
						border-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tagcloud a {
						border-color: <?php echo $singular_accent_color; ?>;
						color: <?php echo $singular_accent_color; ?>;
					}
					
					.tagcloud a:hover,
					.tagcloud a:active,
					.tagcloud a:focus {
						background-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tooltip.top .tooltip-arrow {
						border-top-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tooltip.right .tooltip-arrow {
						border-right-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tooltip.left .tooltip-arrow {
						border-left-color: <?php echo $singular_accent_color; ?>;
					}
					
					.tooltip.bottom .tooltip-arrow {
						border-bottom-color: <?php echo $singular_accent_color; ?>;
					}
					
					.box .icon.circle-mode-box {
						border-color: rgba(<?php echo $rgb; ?>, 0.5);
					}
					
					.box:hover .icon.circle-mode-box,
					.box:active .icon.circle-mode-box,
					.box:focus .icon.circle-mode-box {
						border-color: <?php echo $singular_accent_color; ?>;
						background-color: <?php echo $singular_accent_color; ?>;
					}
					
					.box .icon.circle-mode-box i,
					.box.boxed-version .icon-boxed i,
					.box .icon.icon-only-mode-box {
						color: <?php echo $singular_accent_color; ?>;
					}
			  <?php } ?>
			  
              <?php if (!empty($singular_header_background_color)) { ?>
			  		#mega_main_menu > .menu_holder > .mmm_fullwidth_container,
			  		.sticky-header, .normal-header {background-color: <?php echo $singular_header_background_color; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_first_level)) { ?>
			  		#mega_main_menu > primary_style-buttons > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link {background-color: <?php echo $singular_header_background_color_first_level; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_active_first_level)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link {background-color: <?php echo $singular_header_background_color_active_first_level; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_search)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li.nav_search_box > #mega_main_menu_searchform {background-color: <?php echo $singular_header_background_color_search; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_text_color_first_level)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link * {color: <?php echo $singular_header_text_color_first_level; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_text_color_active_first_level)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:hover,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .item_link:focus,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li:hover > .item_link *,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-ancestor > .item_link *,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li.current-menu-item > .item_link * {color: <?php echo $singular_header_text_color_active_first_level; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_dropdown_elements)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li > .mega_dropdown,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown > li .post_details {background-color: <?php echo $singular_header_background_color_dropdown_elements; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_dropdown_menu_item)) { ?>
			  		#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link {background-color: <?php echo $singular_header_background_color_dropdown_menu_item; ?> !important; color: <?php echo $singular_header_text_color_dropdown_menu_item; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_background_color_dropdown_active_menu_item)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li:hover > .item_link,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li:hover > .item_link,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .item_link:hover,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li.current-menu-item > .item_link,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .processed_image,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .item_link,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link:hover,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li.current-menu-item > .item_link,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .processed_image:hover {background-color: <?php echo $singular_header_background_color_dropdown_active_menu_item; ?> !important; color: <?php echo $singular_header_text_color_dropdown_active_menu_item; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_border_color_between_dropdown_menu_items)) { ?>
			  		#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link {border-color: <?php echo $singular_header_border_color_between_dropdown_menu_items; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_text_color_dropdown_menu_item)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li .post_details > .post_icon > i,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link *,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown a,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown a *,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li > .item_link *,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li > .item_link *,
					#mega_main_menu ul li li .post_details a {color: <?php echo $singular_header_text_color_dropdown_menu_item; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_header_text_color_dropdown_active_menu_item)) { ?>
			  		#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:hover *,
					#mega_main_menu > .menu_holder > .menu_inner > ul > li .mega_dropdown .item_link:focus *,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li:hover > .item_link *,
					#mega_main_menu ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *,
					#mega_main_menu ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li:hover > .item_link *,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li:hover > .item_link *,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li a:hover *,
					#mega_main_menu ul li.grid_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
					#mega_main_menu ul li.post_type_dropdown .mega_dropdown > li > .processed_image:hover > .cover > a > i {color: <?php echo $singular_header_text_color_dropdown_active_menu_item; ?> !important; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_body_color)) { ?>
			  		body, a:hover, a:active, a:focus, .entry-meta.entry-header a, .comment-meta, .comment-meta a,
#twitter-feed .tweet_list li .tweet_time a, .box p, .dropmenu-active ul li a {color: <?php echo $singular_body_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_heading_color)) { ?>
			  		h1, h2, h3, h4, h5, h6, #latest-posts .post-name .entry-title a, .standard-blog .post-name .entry-title a, .masonry-blog .post-name .entry-title a, .center-blog .post-name .entry-title a, .comment-author cite,
.comment-author cite a, .dropmenu p, .accordion-heading .accordion-toggle, .nav > li > a, .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus, .dropcap, .easyPieChart, .pricing-table .price, .counter-number .number-value {color: <?php echo $singular_heading_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_back_to_top_color)) { ?>
			  		#back-top a i {border-color: <?php echo $singular_back_to_top_color; ?>; color: <?php echo $singular_back_to_top_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_widget_background)) { ?>
			  		footer {background-color: <?php echo $singular_footer_widget_background; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_widget_heading_font_color)) { ?>
			  		.footer-widgets-wrap h3, .footer-widgets-wrap .tweet_timestamp > a {color: <?php echo $singular_footer_widget_heading_font_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_widget_font_color)) { ?>
			  		.footer-widgets-wrap {color: <?php echo $singular_footer_widget_font_color; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_credits_background)) { ?>
			  		#copyright {background-color: <?php echo $singular_footer_credits_background; ?>; }
			  <?php } ?>
			  
			  <?php if (!empty($singular_footer_credits_font_color)) { ?>
			  		#copyright p {color: <?php echo $singular_footer_credits_font_color; ?>; }
			  <?php } ?>
			  
              </style>  
        
        <?php

        if (!empty($bg_color) && !empty($bg_opacity)) { $overlay_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $overlay_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $overlay_mode = ' style="opacity: '.$bg_opacity.';"'; }
		
		if (!empty($page_color_text)) { $page_color_text = ' style="color: '.$page_color_text.';"'; }

        if (!empty($bg_color) && !empty($bg_opacity)) { $fill_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $fill_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $fill_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($bg_height_top)) { $bg_height_top = 'padding-top: '.$bg_height_top.'px;'; }
		if (!empty($bg_height_bottom)) { $bg_height_bottom = 'padding-bottom: '.$bg_height_bottom.'px;'; }
		if (!empty($bg_height_top) || !empty($bg_height_bottom)) { $bg_height = 'style=" '.$bg_height_top.' '.$bg_height_bottom.' "'; }

?>		
	
<?php if ( $check_page_settings == "enabled") { ?>
		
        <?php if( !empty($bg) ) { ?> 
        <section id="image-static">
        <?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo '<span class="overlay-bg"'.$overlay_mode.'></span>'; } ?>
    
        <div class="fullimage-container<?php if( !empty($page_title) || !empty($page_caption) ) { ?> <?php echo 'titlize'; ?><?php } ?>" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-attachment: <?php echo $bgattachment; ?>; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">  
        <?php if ( $check_page_text_settings == "enabled") { ?>
            <div class="container pagize" <?php echo $bg_height ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
                    <?php if( !empty($page_title) ) { ?>
                        <h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                    <?php } else { ?>
                        <h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                    <?php } ?>
                    <?php if( !empty($page_caption) ) { ?>
                        <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                    <?php } ?>
                    </div>
            	</div>
            </div>
        <?php } ?>            
        </div>
        </section>
        <?php } else if( !empty($rev_slider_alias) ) { ?>
        <section id="slider-header">
            <?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
        </section>
        <?php } else { ?>
        <section id="title-page">
        	<span class="overlay-bg-fill"<?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo $fill_mode; } ?>></span>
        	<div class="container pagize" <?php echo $bg_height ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
                    <?php if( !empty($page_title) ) { ?>
                        <h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                    <?php } else { ?>
                        <h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                    <?php } ?>
                    <?php if( !empty($page_caption) ) { ?>
                        <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                    <?php } ?>
            		</div>
            	</div>
            </div>
        </section>
        <?php } ?>
    <?php }
    }
}

// Page Knowledgebase Header Settings
if ( !function_exists( 'ig_page_header_knowledgebase' ) ) {
    function ig_page_header_knowledgebase($postid) {
		
		global $options;
		global $post;
		
		$check_page_settings = get_post_meta($postid, '_ig_header_settings', true);
        $check_page_text_settings = get_post_meta($postid, '_ig_header_text', true);
    	$bg = get_post_meta($postid, '_ig_header_bg', true);
        $bg_height = get_post_meta($postid, '_ig_header_height', true);
		$bg_overlay = get_post_meta($postid, '_ig_header_overlay', true);
        $bg_opacity = get_post_meta($postid, '_ig_header_overlay_bg_opacity', true);
        $bg_color = get_post_meta($postid, '_ig_header_overlay_bg_color', true);
		$bgattachment = get_post_meta($postid, '_ig_header_bg_attachment', true);
		$page_title = get_post_meta($postid, '_ig_page_title', true);
		$page_caption = get_post_meta($postid, '_ig_page_caption', true);
		$page_align_text = get_post_meta($postid, '_ig_page_text_align', true);
        $page_color_text = get_post_meta($postid, '_ig_page_text_color', true);
		$rev_slider_alias = get_post_meta($postid, '_ig_intro_slider_header', true);
		
        $overlay_mode = null;
        $fill_mode = null;

        if (!empty($bg_color) && !empty($bg_opacity)) { $overlay_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $overlay_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $overlay_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($page_color_text)) { $page_color_text = ' style="color: '.$page_color_text.';"'; }

        if (!empty($bg_color) && !empty($bg_opacity)) { $fill_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $fill_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $fill_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($bg_height)) { $bg_height = 'style="padding-top: '.$bg_height.'px; padding-bottom: '.$bg_height.'px;"'; }

        // Attrs
		$attrs = get_the_terms( $post->ID, 'project-attribute' );
		$attributes_fields = null;
		
		if ( !empty($attrs) ){
		 foreach ( $attrs as $attr ) {
		   $attributes_fields[] = $attr->name;
		 }
		 
		 $on_attributes = join( " - ", $attributes_fields );
		}
	?>		
	
    <?php if ( $check_page_settings == "enabled") { ?>
		
    <?php if( !empty($bg) ) { ?> 
        <section id="image-static">
        <?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo '<span class="overlay-bg"'.$overlay_mode.'></span>'; } ?>
		
        <div class="fullimage-container<?php if( !empty($page_title) || !empty($page_caption) ) { ?> <?php echo 'titlize'; ?><?php } ?>" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-attachment: <?php echo $bgattachment; ?>; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">  
        <?php if ( $check_page_text_settings == "enabled") { ?>
            <div class="container pagize" <?php echo $bg_height; ?>>
                <div class="row">
                    <div class="col-md-12 <?php echo $page_align_text; ?>">
                        <?php if( !empty($page_title) ) { ?>
                            <h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                        <?php } else { ?>
                            <h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                        <?php } ?>
                        <?php if( !empty($page_caption) ) { ?>
                            <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                        <?php } else { ?>
                            <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $on_attributes; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>            
        </div>
        </section>
	    <?php } else if( !empty($rev_slider_alias) ) { ?>
        <section id="slider-header">
            <?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
        </section>
		<?php } else { ?>
        <section id="title-page">
        	<span class="overlay-bg-fill"<?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo $fill_mode; } ?>></span>
        	<div class="container pagize" <?php echo $bg_height; ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
						<?php if( !empty($page_title) ) { ?>
                        	<h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                        <?php } else { ?>
                        	<h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                        <?php } ?>
                        <?php if( !empty($page_caption) ) { ?>
                        	<p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                        <?php } else { ?>
                        	<p class="page-caption"<?php echo $page_color_text; ?>><?php echo $on_attributes; ?></p>
                        <?php } ?>
            		</div>
            	</div>
            </div>
        </section>
		<?php } ?>
    
    <?php }
    }
}

// Single Posts Header Settings
if ( !function_exists( 'ig_post_header' ) ) {
    function ig_post_header($postid) {
		
		global $options;
		global $post;
		
		$check_page_settings = get_post_meta($postid, '_ig_header_settings', true);
        $check_page_text_settings = get_post_meta($postid, '_ig_header_text', true);
        $bg_height = get_post_meta($postid, '_ig_header_height', true);
    	$bg = get_post_meta($postid, '_ig_header_bg', true);
		$bg_overlay = get_post_meta($postid, '_ig_header_overlay', true);
        $bg_opacity = get_post_meta($postid, '_ig_header_overlay_bg_opacity', true);
        $bg_color = get_post_meta($postid, '_ig_header_overlay_bg_color', true);
		$bgattachment = get_post_meta($postid, '_ig_header_bg_attachment', true);
		$page_title = get_post_meta($postid, '_ig_page_title', true);
		$page_caption = get_post_meta($postid, '_ig_page_caption', true);
		$page_align_text = get_post_meta($postid, '_ig_page_text_align', true);
        $page_color_text = get_post_meta($postid, '_ig_page_text_color', true);
		$rev_slider_alias = get_post_meta($postid, '_ig_intro_slider_header', true);

        $overlay_mode = null;
        $fill_mode = null;

        if (!empty($bg_color) && !empty($bg_opacity)) { $overlay_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $overlay_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $overlay_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($page_color_text)) { $page_color_text = ' style="color: '.$page_color_text.';"'; }

        if (!empty($bg_color) && !empty($bg_opacity)) { $fill_mode = ' style="background-color: '.$bg_color.'; opacity: '.$bg_opacity.';"'; }
        else if (!empty($bg_color)) { $fill_mode = ' style="background-color: '.$bg_color.';"'; }
        else if (!empty($bg_opacity)) { $fill_mode = ' style="opacity: '.$bg_opacity.';"'; }

        if (!empty($bg_height)) { $bg_height = 'style="padding-top: '.$bg_height.'px; padding-bottom: '.$bg_height.'px;"'; }
		
	?>		
	
    <?php if ( $check_page_settings == "enabled") { ?>
		
    <?php if( !empty($bg) ) { ?> 
        <section id="image-static">
        <?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo '<span class="overlay-bg"'.$overlay_mode.'></span>'; } ?>

        <div class="fullimage-container<?php if( !empty($page_title) || !empty($page_caption) ) { ?> <?php echo 'titlize'; ?><?php } ?>" style="background: url('<?php echo $bg; ?>') center center no-repeat; background-attachment: <?php echo $bgattachment; ?>; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
        <?php if ( $check_page_text_settings == "enabled") { ?>
            <div class="container pagize" <?php echo $bg_height; ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
                         <?php if( !empty($page_title) ) { ?>
                            <h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                        <?php } else { ?>
                            <h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                        <?php } ?>
                        <?php if( !empty($page_caption) ) { ?>
                            <p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                        <?php } else { ?>
                            <div class="entry-meta entry-header">
                                <span class="published"><?php the_time( get_option('date_format') ); ?></span>
                                <span class="meta-sep"> / </span>
                                <span class="comment-count"><?php comments_popup_link(__('No Comments', INFINITE_LANGUAGE), __('1 Comment', INFINITE_LANGUAGE), __('% Comments', INFINITE_LANGUAGE)); ?></span>
                                <?php edit_post_link( __('Edit', INFINITE_LANGUAGE), ' / <span class="edit-post">', '</span>' ); ?>
                            </div>
                        <?php } ?>
                    </div>
            	</div>
            </div>
        <?php } ?>
        </div>
        </section>
	    <?php } else if( !empty($rev_slider_alias) ) { ?>
        <section id="slider-header">
            <?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
        </section>
		<?php } else { ?>
        <section id="title-page">
        	<span class="overlay-bg-fill"<?php if(!empty($bg_overlay) && $bg_overlay == 'on') { echo $fill_mode; } ?>></span>
        	<div class="container pagize" <?php echo $bg_height; ?>>
            	<div class="row">
                	<div class="col-md-12 <?php echo $page_align_text; ?>">
						 <?php if( !empty($page_title) ) { ?>
                        	<h2<?php echo $page_color_text; ?>><?php echo $page_title; ?></h2>
                        <?php } else { ?>
                        	<h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                        <?php } ?>
                        <?php if( !empty($page_caption) ) { ?>
                        	<p class="page-caption"<?php echo $page_color_text; ?>><?php echo $page_caption; ?></p>
                        <?php } else { ?>
                            <div class="entry-meta entry-header">
                                <span class="published"><?php the_time( get_option('date_format') ); ?></span>
                                <span class="meta-sep"> / </span>
                                <span class="comment-count"><?php comments_popup_link(__('No Comments', INFINITE_LANGUAGE), __('1 Comment', INFINITE_LANGUAGE), __('% Comments', INFINITE_LANGUAGE)); ?></span>
                                <?php edit_post_link( __('Edit', INFINITE_LANGUAGE), ' / <span class="edit-post">', '</span>' ); ?>
                            </div>
                        <?php } ?>
            		</div>
            	</div>
            </div>
        </section>
		<?php } ?>
    
    <?php }
    }
}

// Video
if ( !function_exists( 'ig_post_video' ) ) {
    function ig_post_video($id){

    	$webm = get_post_meta($id, '_ig_video_webm', true);
        $mp4 = get_post_meta($id, '_ig_video_mp4', true);
    	$ogv = get_post_meta($id, '_ig_video_ogv', true);
    	$poster_video = get_post_meta($id, '_ig_video_poster_url', true);
    	$video_embed = get_post_meta($id, '_ig_video_embed', true);
    	
    	if( !empty( $video_embed ) ) {?>
            <div class="video-wrap">
                <div class="video-embed">
                <?php echo stripslashes(htmlspecialchars_decode($video_embed)); ?>
                </div>
            </div>
    	<?php } else { ?>
    		<video id="video-<?php echo $id; ?>" class="video-js vjs-default-skin" preload="auto" style="width:100%; height:100%;" poster="<?php echo $poster_video; ?>">
    			<?php if(!empty($webm)) { ?> <source src="<?php echo $webm; ?>" type="video/webm"> <?php } ?>
                <?php if(!empty($mp4)) { ?> <source src="<?php echo $mp4; ?>" type="video/mp4"> <?php } ?>
    			<?php if(!empty($ogv)) { ?> <source src="<?php echo $ogv; ?>" type="video/ogg"> <?php } ?>
    		</video>
    	<?php }
    }
}

// Audio
if ( !function_exists( 'ig_post_audio' ) ) {
    function ig_post_audio($id){

    	$mp3 = get_post_meta($id, '_ig_audio_mp3', true);    	
    	?>
        	
        <div id="audio-<?php echo $id; ?>">
    		<audio style="width:100%; height:30px;" class="audio-js" controls preload src="<?php echo $mp3; ?>"></audio>
        </div>
    	
    <?php 
    }
}

// Footer Widget Area
if ( !function_exists( 'ig_footer_widget' ) ) {
function ig_footer_widget($postid) {

	global $post;
	$options = get_option('infinite_options');
	$check_page_settings = get_post_meta($postid, '_ig_footer_widget_settings', true);
?>		

<?php if ( $check_page_settings == "enabled" || $check_page_settings == "" ) { ?>
		
<!-- Start Footer with Widgets -->
<div class="footer-widgets-wrap">
    <div class="container">
        <div class="row">
            <?php
            $footerColumns = (!empty($options['footer-widget-columns'])) ? $options['footer-widget-columns'] : '3'; 
                
            if($footerColumns == '2'){
                $footerColumnClass = 'col-md-6';
            } else if($footerColumns == '4'){
                $footerColumnClass = 'col-md-3';
            } else {
                $footerColumnClass = 'col-md-4';
            }
            ?>
            <div class="<?php echo $footerColumnClass;?>">
                <?php if ( function_exists('dynamic_sidebar') ) { ?>
                    <?php dynamic_sidebar('footer-area-one'); ?>
                <?php } ?>
            </div>

            <div class="<?php echo $footerColumnClass;?>">
                <?php if ( function_exists('dynamic_sidebar') ) { ?>
                    <?php dynamic_sidebar('footer-area-two'); ?>
                <?php } ?>
            </div>

            <?php if($footerColumns == '3' || $footerColumns == '4') { ?>
            <div class="<?php echo $footerColumnClass;?>">
                <?php if ( function_exists('dynamic_sidebar') ) { ?>
                    <?php dynamic_sidebar('footer-area-three'); ?>
                <?php } ?>
            </div>
            <?php } ?>

            <?php if($footerColumns == '4') { ?>
            <div class="<?php echo $footerColumnClass;?>">
                <?php if ( function_exists('dynamic_sidebar') ) { ?>
                    <?php dynamic_sidebar('footer-area-four'); ?>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Footer with Widgets -->
        
        
		<?php } ?>
    <?php }
}
    
?>