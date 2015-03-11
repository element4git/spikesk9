<?php get_header();

if(is_shop()) {
ig_page_woocommerce_header($post->ID);
}

if(is_shop() || is_product_category() || is_product_tag()) {
	
	//page header for main shop page
	get_permalink(woocommerce_get_page_id('shop'));
	
} 

//change to 3 columsn per row when using sidebar
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

?>


<div class="content">
	
	<section class="main-content shadow-off">
    
    	<div class="container">
		
			<div class="row">
			
			<?php
			
			$options = get_option('infinite_options'); 

 			$main_shop_layout = (!empty($options['main_shop_layout'])) ? $options['main_shop_layout'] : 'no-sidebar';
			$single_product_layout = (!empty($options['single_product_layout'])) ? $options['single_product_layout'] : 'no-sidebar';
			
			//single product layout
			if(is_product()){
				
				if($single_product_layout == 'right-sidebar' || $single_product_layout == 'left-sidebar'){ 
					add_filter('loop_shop_columns', 'loop_columns');
				}
				
				switch($single_product_layout) {
					case 'no-sidebar':
						woocommerce_content(); 
						break; 
					case 'right-sidebar':

						echo '<div id="post-area" class="col-md-9 left_side">';
							woocommerce_content(); 
						echo '</div><!--/span_9-->';
						
						echo '<div id="sidebar" class="col-md-3 right_side">';
							dynamic_sidebar( 'sidebar-woo-page' ); 
						echo '</div><!--/span_9-->';

						break; 
						
					case 'left-sidebar':
						echo '<div id="sidebar" class="col-md-3 left_side">';
						 	dynamic_sidebar( 'sidebar-woo-page' ); 
						echo '</div><!--/span_9-->';
						
						echo '<div id="post-area" class="col-md-9 right_side">';
							woocommerce_content(); 
						echo '</div><!--/span_9-->';
						
						break; 
					default: 
						woocommerce_content(); 
						break; 
				}
		
			}
			
			//Main Shop page layout 
			elseif(is_shop() || is_product_category() || is_product_tag()) {
				
				if($main_shop_layout == 'right-sidebar' || $main_shop_layout == 'left-sidebar'){ 
					add_filter('loop_shop_columns', 'loop_columns');
				}
				
				switch($main_shop_layout) {
					case 'no-sidebar':
						woocommerce_content(); 
						break; 
					case 'right-sidebar':

						echo '<div id="post-area" class="col-md-9 left_side">';
							woocommerce_content(); 
						echo '</div><!--/span_9-->';
						
						echo '<div id="sidebar" class="col-md-3 right_side">';
						 	dynamic_sidebar( 'sidebar-woo' );  
						echo '</div><!--/span_9-->';
						
						break; 
						
					case 'left-sidebar':
						echo '<div id="sidebar" class="col-md-3 left_side">';
						 	dynamic_sidebar( 'sidebar-woo' );
						echo '</div><!--/span_9-->';
						
						echo '<div id="post-area" class="col-md-9 right_side">';
							woocommerce_content(); 
						echo '</div><!--/span_9-->';
						break; 
					default: 
						woocommerce_content(); 
						break; 
				}

			}
			
			//regular WooCommerce page layout 
			else {
				 woocommerce_content(); 
			}
			
			?>

	
			</div><!--/row-->
		
		</div><!--/container-->

	</section><!--/main-content-->

</div><!--/content-->

<?php get_footer(); ?>