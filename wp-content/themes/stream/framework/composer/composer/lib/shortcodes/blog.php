<?php
/**
 * WPBakery Visual Composer shortcodes
 *
 * @package WPBakeryVisualComposer
 *
 */

/* Latest Posts
---------------------------------------------------------- */

class WPBakeryShortCode_IG_Blog extends WPBakeryShortCode {
  protected function content($atts, $content = null) {
    $blog_layout = $post_columns_count = $pagination_blog = $post_number = $post_categories = $el_class = '';
      extract( shortcode_atts( array(
	  	'blog_layout' => '',
	  	'post_columns_count' => '',
		'pagination_blog' => '',
		'post_number' => '',
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
	  
	  // Blog Type
	  if($blog_layout == 'mbwls_blog' || $blog_layout == 'mbwrs_blog'  || $blog_layout == 'mbns_blog'){
	  		$blog_type = 'masonry-blog';
	  }
	  
	  elseif($blog_layout == 'sbwls_blog' || $blog_layout == 'sbwrs_blog'  || $blog_layout == 'sbns_blog'){
	  		$blog_type = 'standard-blog';
	  }
	  
	  elseif($blog_layout == 'cb_blog'){
	  		$blog_type = 'center-blog';
	  }
	  
	  elseif($blog_layout == 'bwds_blog'){
	  		$blog_type = 'dual-sidebar-blog';
	  }
	  
	  // Padding blog
	  $sectionpadding = null;

	  if($blog_type == 'standard-blog' || $blog_type == 'masonry-blog' || $blog_type == 'dual-sidebar-blog'){
		$sectionpadding = 'default-padding-mod';
	  }

	  else if($blog_type == 'center-blog'){
		$sectionpadding = 'default-padding-mod-center';
	  }
	  
	  // Posts and Sidebar Align
	  if($blog_layout == 'mbwls_blog' || $blog_layout == 'sbwls_blog'){
	  		$alignment = 'left_side';
	  }
	  
	  elseif($blog_layout == 'mbwrs_blog' || $blog_layout == 'sbwrs_blog'){
	  		$alignment = 'right_side';
	  }
	  
	  else { $alignment = 'no_side'; }
				
	  switch ($alignment) {
	  case 'right_side' :
			$align_sidebar = 'right_side';
			$align_main = 'left_side';
	  break;
					
	  case 'left_side' :
			$align_sidebar = 'left_side';
			$align_main = 'right_side';
	  break;
	  }	
	  
	  		if ( get_query_var('paged') ) {
				  $paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				  $paged = get_query_var('page');
			} else {
				  $paged = 1;
			}
			
			//incase only all was selected
			if($post_categories == 'all') {
				$post_categories = null;
			}
	
			$temp = $wp_query; 
			$wp_query = null; 
			$args = array( 
				'posts_per_page' => $post_number,
				'post_type' => 'post',
				'category_name' => $post_categories,
				'paged'=> $paged
			);
		
			$wp_query = new WP_Query(); 
	  		$wp_query->query( $args );
      
       ?>
	  
		<section id="blog" class="<?php echo $sectionpadding; ?> <?php echo $blog_type; ?>">
		<div class="container">
		<div class="row">
        <?php
			if($blog_layout == 'bwds_blog'){ ?>
					  
					<div class="col-md-3 left_side">
						<aside id="sidebar">
                        	<?php dynamic_sidebar( 'side-left-blog' ); ?>
                        </aside>
                    </div>
		<?php } ?>
      
      <?php
	  
		if($blog_layout == null) $blog_layout = 'standard-blog';
				
			$masonry_class = null;
			$masonry_class = 'masonry-area';
				
			if($blog_layout == 'sbwls_blog' || $blog_layout == 'sbwrs_blog'  || $blog_layout == 'sbns_blog'){
				if($alignment == 'no_side') {
					echo '<div id="post-area" class="col-md-12">';
				}
				else if($alignment == 'left_side' || $alignment == 'right_side') {
					echo '<div id="post-area" class="col-md-9 '.$align_main.'">';
				}
			}
				 
			else if($blog_layout == 'mbwls_blog' || $blog_layout == 'mbwrs_blog'  || $blog_layout == 'mbns_blog'){
				if($alignment == 'no_side') {
					echo '<div id="post-area" class="'.$masonry_class.'">';
				}
				else if($alignment == 'left_side' || $alignment == 'right_side') {
					echo '<div id="post-area" class="col-md-9 '.$align_main .' '. $masonry_class.'">';
				}
			}

			else if($blog_layout == 'cb_blog'){
				echo '<div id="post-area" class="col-md-8 col-md-offset-2">';
			}
			
			else if($blog_layout == 'bwds_blog'){
				echo '<div id="post-area" class="col-md-6">';
			}
      ?>          
	  <!-- Content Post Types -->
	  <?php while($wp_query->have_posts()) : $wp_query->the_post();
	    
      if( get_post_format() == 'quote' ) {$format = 'quote';}
	  elseif( get_post_format() == 'video' ) {$format = 'video';}
      elseif( get_post_format() == 'audio' ) {$format = 'audio';}
	  elseif( get_post_format() == 'image' ) {$format = 'image';}
	  elseif( get_post_format() == 'gallery' ) {$format = 'gallery';}
      elseif( get_post_format() == 'link' ) {$format = 'link';}
	  else {$format = 'standard';}
      
      if($blog_layout == 'mbwls_blog' || $blog_layout == 'mbwrs_blog'  || $blog_layout == 'mbns_blog'){ ?> 
      <article <?php post_class('item-blog '.$post_columns_count.''); ?> id="post-<?php the_ID(); ?>">
      <?php }	
      
      elseif($blog_layout == 'sbwls_blog' || $blog_layout == 'sbwrs_blog'  || $blog_layout == 'sbns_blog'){ ?> 
      <article <?php post_class('item-blog'); ?> id="post-<?php the_ID(); ?>">
      <?php }
      
      elseif($blog_layout == 'cb_blog'){ ?> 
      <article <?php post_class('item-blog'); ?> id="post-<?php the_ID(); ?>">
      <?php }
	  
	  elseif($blog_layout == 'bwds_blog'){ ?> 
      <article <?php post_class('item-blog dual-blog'); ?> id="post-<?php the_ID(); ?>">
      <?php } ?>
      		
				<div class="post-container">
                
				<?php if($format != 'image' && $format != 'gallery' && $format != 'video') {
					if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
				<div class="post-thumb">
					<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="hover-wrap">
						<?php the_post_thumbnail(); /* post thumbnail settings configured in functions.php */ ?>
						<span class="overlay"><span class="circle"><i class="icon-plus22"></i></span></span>
					</a>
				</div>
					<?php } ?>
                <?php } ?>
                
                <?php if($format == 'audio') { ?>
					<div class="audio-thumb">
						<?php ig_post_audio(get_the_ID()); ?>
                    </div>
                <?php } ?>
                
                <?php if($format == 'video') { ?>
					<div class="video-thumb">
						<?php ig_post_video(get_the_ID()); ?>
                    </div>
                <?php } ?>
                
                <?php if($format == 'gallery') { ?>
                <?php $rev_slider_alias = get_post_meta($post->ID, '_ig_gallery', true); ?>
					<div class="post-thumb">
						<?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
                    </div>
                    
                    <div class="post-name">
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a>
                        </h2>
                        <?php get_template_part( 'content' , 'meta-header' ); ?>
                    </div>
                <?php } ?>
                
                <?php if($format == 'quote') { ?>
                <?php $quote = get_post_meta($post->ID, '_ig_quote', true); ?>
					<div class="post-quote">

                    <h2 class="entry-title">
                        <?php echo $quote; ?>
                    </h2>
                    
                    <p class="quote-source"><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', INFINITE_LANGUAGE), get_the_title()); ?>"><?php the_title(); ?> </a></p>
                    </div>
                <?php } ?>
                
                <?php if($format == 'image') {
					if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                    ?>
                    <div class="post-thumb">
                        <a title="<?php the_title(); ?>" href="<?php echo $featured_image[0]; ?>" class="hover-wrap fancybox">
                            <?php the_post_thumbnail('blog-post-thumb'); /* post thumbnail settings configured in functions.php */ ?>
                            <span class="overlay"><span class="circle"><i class="icon-search"></i></span></span>
                        </a>
                    </div>
                    <?php } ?>
                <?php } ?>
                
                
                
                <?php if($format == 'link') { ?>
                	<?php $link_url = get_post_meta($post->ID, '_ig_link', true); ?>
					<div class="post-link">

                    <h2 class="entry-title">
                        <a href="<?php echo $link_url; ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a>
                    </h2>
                    
                    <p class="link-source">
                        <a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_url; ?></a>
                        <a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', INFINITE_LANGUAGE), get_the_title()); ?>"></a>
                    </p>
                    
                    </div>
                <?php } ?>
                
                
				<?php if($format != 'link' && $format != 'quote'  && $format != 'gallery') { ?>
				<div class="post-name">
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a>
					</h2>
					<?php get_template_part( 'content' , 'meta-header' ); ?>
				</div>
				
				<div class="entry-content">
					<?php echo get_the_excerpt();?>
				</div>
                <?php } ?> <!-- End Content Post Types -->
                
                
                
            </div>
			</article>	<!-- End Core Post Types -->	
        
	  <?php
	  endwhile;
	  ?>
	  
	    </div> 
        
        <?php
			if($blog_type == 'standard-blog' || $blog_type == 'masonry-blog'){
				if($alignment == 'left_side' || $alignment == 'right_side') { ?>
					  
					<div class="col-md-3 <?php echo $align_sidebar; ?>">
						<aside id="sidebar">
                            <?php get_sidebar(); ?>
                        </aside>
                    </div>
			<?php	}
			}elseif($blog_layout == 'bwds_blog'){ ?>
					  
					<div class="col-md-3 right_side">
						<aside id="sidebar">
                            <?php dynamic_sidebar( 'side-right-blog' ); ?>
                        </aside>
                    </div>
			 <?php } ?>
        </div>
        
        <?php 
		if($pagination_blog == 'yes') {
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1; 
				    $total_pages = $wp_query->max_num_pages; 
				      
				    if ($total_pages > 1){  
				      
				      $permalink_structure = get_option('permalink_structure');
				      $query_type = (count($_GET)) ? '&' : '?';	
			      	  $format = empty( $permalink_structure ) ? $query_type.'paged=%#%' : 'page/%#%/';  
					
					  echo '<div id="pagination">';
					   
				      echo paginate_links(array(  
				          'base' => get_pagenum_link(1) . '%_%',  
				          'format' => $format,  
				          'current' => $current,  
				          'total' => $total_pages,  
				        )); 
						
					  echo  '</div>'; 
						
				    }  
		}
        $wp_query = null;
        $wp_query = $temp;  // Reset
        ?>
        </section>
        
<?php
	
	  return $output . $this->endBlockComment('ig_blog') . "\n";
  }
}

?>