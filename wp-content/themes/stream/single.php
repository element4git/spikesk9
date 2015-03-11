<?php get_header(); ?>

<?php ig_post_header($post->ID); ?>

<?php $options = get_option('infinite_options'); 
    $sectionpadding = null;
    $blog_type = $options['blog_type'];

    if($blog_type == 'standard-blog' || $blog_type == 'masonry-blog'){
        $sectionpadding = 'default-padding';
    }

    else if($blog_type == 'center-blog'){
        $sectionpadding = 'default-padding-mod-center';
    }
?>

<div id="content">
	<section id="blog" class="<?php echo $sectionpadding; ?> single-post">
		<div class="container">
			<div class="row">

			<?php
                        
            $alignment = (!empty($options['blog_post_sidebar_layout'])) ? $options['blog_post_sidebar_layout'] : 'no_side' ;
            
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
            
            if($alignment == 'no_side') {
                echo '<div id="post-area" class="col-md-12">';
            }
            else if($alignment == 'left_side' || $alignment == 'right_side') {
                echo '<div id="post-area" class="col-md-9 '.$align_main.'">';
            }
            else if($alignment == 'center_side') {
                echo '<div id="post-area" class="col-md-8 col-md-offset-2">';
            }

            ?>          
  
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
				<?php 
                    $format = get_post_format(); 
                    get_template_part( 'content', $format );
                ?>
			</article>

            <?php if( !empty($options['blog-social']) && $options['blog-social'] == 1 ) {
                                   
                   echo '<div class="ig-social-share single-post">';
                   ?>
                   
                        <div class="navigation-controls">
                            <ul>
                                <li class="prev"><?php previous_post_link(('%link'), '<i class="icon-arrow-left72"></i>'.__('Prev', 'INFINITE_LANGUAGE').'') ?></li><?php
                                if( !empty($options['blog-index']) ) { ?>
									<li class="port-index"><a href="<?php echo $options['blog-index'] ?>" rel="index"><i class="icon-layers2"></i>'.__('Blog Index', 'INFINITE_LANGUAGE').'') ?></a></li>
								<?php } ?>
                                <li class="next"><?php next_post_link(('%link'), '<i class="icon-uniE6F8"></i>'.__('Next', 'INFINITE_LANGUAGE').'') ?></li>
                            </ul>
                        </div>
                    
                   		<div id="single-meta" data-sharing="<?php echo ( !empty($options['blog-social']) && $options['blog-social'] == 1 ) ? '1' : '0'; ?>"> <?php

						// portfolio social sharting icons
						if( !empty($options['blog-social']) && $options['blog-social'] == 1 ) {
					
							echo '<div class="infinite-share woo">';
							
								//facebook
								if(!empty($options['blog-facebook-sharing']) && $options['blog-facebook-sharing'] == 1) {
									echo "<a class='facebook-share infinite-sharing' href='#' title=''> <i class='icon-facebook11'></i> <span class='count'></span></a>";
								}
								//twitter
								if(!empty($options['blog-twitter-sharing']) && $options['blog-twitter-sharing'] == 1) {
									echo "<a class='twitter-share infinite-sharing' href='#' title=''> <i class='icon-twitter22'></i> <span class='count'></span></a>";
								}
								//pinterest
								if(!empty($options['blog-pinterest-sharing']) && $options['blog-pinterest-sharing'] == 1) {
									echo "<a class='pinterest-share infinite-sharing' href='#' title=''> <i class='icon-pinterest4'></i> <span class='count'></span></a>";
								}
						
							echo '</div>';
						} ?>
                   		
                    </div> <?php
                   
                   echo '</div>';

            } ?>
            

			<?php comments_template('', true); ?>

			<?php endwhile; endif; ?>

			</div><!-- End Container Span -->

			<?php
            if($alignment == 'left_side' || $alignment == 'right_side') { ?>
              
            <div class="col-md-3 <?php echo $align_sidebar; ?>">
                <aside id="sidebar">
                    <?php get_sidebar(); ?>
                </aside>
            </div>
            <?php } ?>
                
			</div> 
		</div>
	</section>
</div>

<?php get_footer(); ?>