<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Latest Posts
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Latest_Posts extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $post_columns_count = $animation_loading = $animation_loading_effects = $post_number = $post_categories = $el_class = '';
      extract( shortcode_atts( array(
	  	'post_columns_count' => '',
		'animation_loading' => '',
		'animation_loading_effects' => '',
		'post_number' => 'all',
		'post_categories' => '',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
	  global $post;
	  
	  // Post teasers count
      if ( $post_number != '' && !is_numeric($post_number) ) $post_number = -1;
      if ( $post_number != '' && is_numeric($post_number) ) $post_number = $post_number;
	  
	  if ( $post_columns_count=="2clm") { $post_columns_count = 'col-md-6'; }
	  if ( $post_columns_count=="3clm") { $post_columns_count = 'col-md-4'; }
	  if ( $post_columns_count=="4clm") { $post_columns_count = 'col-md-3'; }
	  
	  $args = array( 
			'showposts' => $post_number,
			'category_name' => $post_categories,
			'ignore_sticky_posts' => 1
		);
		
		$animation_loading_class = null;
		if ($animation_loading == "yes") {
			$animation_loading_class = 'animated-content';
		}
		
		$animation_effect_class = null;
		if ($animation_loading == "yes") {
			$animation_effect_class = $animation_loading_effects;
	 	}

	  // Run query
	  $my_query = new WP_Query($args);
	  
	  $output .= '<div class="row no-sortable'. $el_class .'">';
	  $output .= '<ul id="latest-posts">';
	  
	  while($my_query->have_posts()) : $my_query->the_post();
	    
		$post_id = $my_query->post->ID;
		
		$thumb = get_post_thumbnail_id();
		$img_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'latest-post-thumb' );
		
		$num_comments = get_comments_number(); 	
		$comments_output = null;
		
		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$comments = __('No Comments', INFINITE_LANGUAGE);
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments . __(' Comments', INFINITE_LANGUAGE);
			} else {
				$comments = __('1 Comment', INFINITE_LANGUAGE);
			}
			$comments_output .= '<a href="' . get_comments_link() .'">'. $comments.'</a>';
		}

		$output .= '<li class="item-blog '.$post_columns_count.'">
					<div class="item-container-post '. $animation_loading_class .' '. $animation_effect_class .'">';
		
		$output .= '<article class="post">';
		
		if(!empty($thumb)) {
		
		$output .= '<div class="post-thumb">
						<a title="'. get_the_title() .'" href="'. get_permalink($post_id) .'" class="hover-wrap">
		 			 	<img class="img-responsive" src="'. $img_thumb[0] .'" width="'.$img_thumb[1].'" height="'.$img_thumb[2].'" alt="'. get_the_title() .'" />
        			 	<span class="overlay"><span class="circle"><i class="icon-plus22"></i></span></span>
					 	</a>
					</div>';
		}
		
		$output .= '<div class="post-name">
						<h2 class="entry-title">
					 		<a href="'. get_permalink($post_id) .'" title="'. get_the_title() .'"> '. get_the_title() .'</a>
					 	</h2>
					</div>';
					 
		$output .= '<div class="entry-content"><p>' .get_the_excerpt(). '</p></div>';
		
		$output .= '<div class="entry-meta entry-header">
						<span class="published">'. get_the_time( get_option('date_format') ) .'</span>
						<span class="meta-sep"> / </span>
						<span class="comment-count">'. $comments_output .'</span>
					</div>';
					
		$output .= '</article>';		

		$output .= '</div>
					</li>';
	
	  endwhile;
	  
	  wp_reset_query();
	  
	  $output .= '</ul>';
	  
	  $output .= '</div>';
	
	  return $output . $this->endBlockComment('ig_latest_posts') . "\n";
  }
}

?>