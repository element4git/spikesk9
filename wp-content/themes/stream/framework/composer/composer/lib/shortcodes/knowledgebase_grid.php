<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Knowledgebase Grid
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Knowledgebase_Grid extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $knowledgebase_columns_count = $knowledgebase_post_number = $knowledgebase_sortable_name = $knowledgebase_sortable_mode = $knowledgebase_categories = $orderby = $order = $el_class = '';
      extract( shortcode_atts( array(
	  	'knowledgebase_columns_count' => '',
		'knowledgebase_post_number' => 'all',
		'knowledgebase_sortable_name' => '',
		'knowledgebase_sortable_mode' => 'yes',
		'knowledgebase_categories' => '',
		'orderby' => NULL,
        'order' => 'DESC',
        'el_class' => ''
      ), $atts ) );
      $output = '';
	  $el_class = $this->getExtraClass($el_class);
	  
	  global $post;
	  
	  // Narrow by categories
	  if($knowledgebase_categories == 'knowledgebase')
      	$knowledgebase_categories = '';
	  
	  // Post teasers count
      if ( $knowledgebase_post_number != '' && !is_numeric($knowledgebase_post_number) ) $knowledgebase_post_number = -1;
      if ( $knowledgebase_post_number != '' && is_numeric($knowledgebase_post_number) ) $knowledgebase_post_number = $knowledgebase_post_number;
	  
	  // Add Custom Class For Knowledgebase

	  	if ( $knowledgebase_columns_count=="2clm") { $knowledgebase_columns_count = 'col-md-6'; }
	  	if ( $knowledgebase_columns_count=="3clm") { $knowledgebase_columns_count = 'col-md-4'; }
	  	if ( $knowledgebase_columns_count=="4clm") { $knowledgebase_columns_count = 'col-md-3'; }
	  	if ( $knowledgebase_columns_count=="5clm") { $knowledgebase_columns_count = 'col-md-3'; }
	  	if ( $knowledgebase_columns_count=="6clm") { $knowledgebase_columns_count = 'col-md-3'; }

	  $args = array( 
	  		'posts_per_page' => $knowledgebase_post_number, 
		   	'post_type' => 'knowledgebase',
			'knowledgebase-category' => $knowledgebase_categories,
			'orderby' => $orderby,
			'order' => $order
	  );

	  // Run query
	  $my_query = new WP_Query($args);
	  
	  if($knowledgebase_sortable_mode == "yes") {
	  	
  		$output .= '
				  	<div id="portfolio-filter" class="row desktop-filter">
						<div class="col-md-12">
							<div class="portfolio-left">
								<p class="selected">'.$knowledgebase_sortable_name.'</p>
							</div>
							<div class="portfolio-right">
								<ul class="option-set" data-option-key="filter">
										<li><a class="selected drop-selected" href="#filter" data-option-value="*">'. $knowledgebase_sortable_name . '</a></li>';
										$list_categories = get_categories("taxonomy=knowledgebase-category");
										foreach ($list_categories as $list_category) :
										if(empty($knowledgebase_categories)){
											$output .= '<li><a href="#filter" data-option-value=".' . strtolower(str_replace(" ","-", ($list_category->slug))) . '">' . $list_category->name . '</a></li>';
										}
										else{
											if(strstr($knowledgebase_categories, $list_category->slug))
											{	
												$output .= '<li><a href="#filter" data-option-value=".' . strtolower(str_replace(" ","-", ($list_category->slug))) . '">' . $list_category->name . '</a></li>';
											}
										}
										endforeach;
		$output .= '			</ul>	
							</div>
						</div>
					</div>';

		// Mobile Version
  		$output .= '
				  	<div id="portfolio-filter" class="row mobile-filter">
						<div class="col-md-12">
							<div class="dropdown">
								<div class="dropmenu">
									<p class="selected">'.$knowledgebase_sortable_name.'</p>
									<i class="icon-angle-down"></i>
								</div>					
								<div class="dropmenu-active">
									<ul class="option-set" data-option-key="filter">
										<li><a class="selected drop-selected" href="#filter" data-option-value="*">'. $knowledgebase_sortable_name . '</a></li>';
										$list_categories = get_categories("taxonomy=knowledgebase-category");
										foreach ($list_categories as $list_category) :
										if(empty($knowledgebase_categories)){
											$output .= '<li><a href="#filter" data-option-value=".' . strtolower(str_replace(" ","-", ($list_category->slug))) . '">' . $list_category->name . '</a></li>';
										}
										else{
											if(strstr($knowledgebase_categories, $list_category->slug))
											{	
												$output .= '<li><a href="#filter" data-option-value=".' . strtolower(str_replace(" ","-", ($list_category->slug))) . '">' . $list_category->name . '</a></li>';
											}
										}
										endforeach;       										
		$output .= '				</ul>
								</div>
							</div>							
						</div>
					</div>';

	  	
	  }
	  
	  $sortable_class = '';
	  if ($knowledgebase_sortable_mode == "no") {
		$sortable_class = ' no-sortable';
	  }
	  
	  $output .= '<div class="row '. $el_class .'">';
	  $output .= '<div id="portfolio-projects" class="'.$sortable_class.' '.$knowledgebase_layout .'">';
	  $output .= '<ul id="knowledgebase">';
	  
	  
	  
	  while($my_query->have_posts()) : $my_query->the_post();
	  
	    $terms = get_the_terms($post->id,"knowledgebase-category");
		$list_categories = NULL;
		
			if ( !empty($terms) ){
			 foreach ( $terms as $term ) {
			   $list_categories .= strtolower($term->slug) . ' ';
			 }
		}
		
		$attrs = get_the_terms( $post->ID, 'knowledgebase-tag' );
		$attributes_fields = NULL;
		
		if ( !empty($attrs) ){
		 foreach ( $attrs as $attr ) {
		   $attributes_fields[] = $attr->name;
		 }
		 
		 $on_attributes = join( " / ", $attributes_fields );
		}
	    
		$post_id = $my_query->post->ID;
		
		$cover_icon = get_post_meta($post->ID, '_ig_cover_icon', true);
		$fancy_gallery = get_post_meta($post->ID, '_ig_fancy_gallery', true);
		
		$cover_icon = '<i class="kb-icon '. $cover_icon .'"></i>';
		

		$output .= '<li class="item-project '.$knowledgebase_columns_count. ' ' . $list_categories .'">
					<div class="item-container knowledgebase-item-container">';
		
			$output .= '<div class="knowledgebase-content-wrap">';

			$output .= '<div class="knowledgebase-name">
								<div class="va">';
								
									$output .= '<a class="project-title" href="'. get_permalink($post_id) .'" title="'. get_the_title() .'">
														'. $cover_icon .'
													<h3>'. get_the_title() .'</h3>
													<span>'. $on_attributes .'</span>
												</a>
								
					</div>
							</div>
							</div>';
        
		
		
		
		
		$output .= '</div>
					</li>';
	
	  endwhile;

	  wp_reset_query();
	  
	  
	  $output .= '</ul>';
	  $output .= '</div>';
	  $output .= '</div>';
	
	  return $output . $this->endBlockComment('ig_knowledgebase_grid') . "\n";
  }
}

?>