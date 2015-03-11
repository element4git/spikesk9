<?php get_header(); 

$options = get_option('infinite_options');

?>

<?php ig_page_header_knowledgebase($post->ID); ?>

<div id="content">
	<section class="main-content default-padding shadow-off">
    	<div class="container">
        	<div class="row">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <?php //edit_post_link( __('Edit', INFINITE_LANGUAGE), '<span class="edit-post">[', ']</span>' ); ?>
                <?php the_content(); ?>
        	</div>
        </div>
    </section>

        <!-- Navigation Area -->
        <section class="main-content small-padding">
        	<div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="ig-social-share single-post">
                        <div class="navigation-controls">
                            <ul>
                                <li class="prev"><?php previous_post_link(('%link'), '<i class="icon-arrow-left72"></i>'.__('Prev', 'INFINITE_LANGUAGE').'') ?></li><?php
                                if( !empty($options['kb-index']) ) { ?>
									<li class="port-index"><a href="<?php echo $options['kb-index'] ?>" rel="index"><i class="icon-layers2"></i>'.__('Knowledgebase Index', 'INFINITE_LANGUAGE').'') ?></a></li>
								<?php } ?>
                                <li class="next"><?php next_post_link(('%link'), '<i class="icon-uniE6F8"></i>'.__('Next', 'INFINITE_LANGUAGE').'') ?></li>
                            </ul>
                        </div>
                    
                   		<div id="single-meta" data-sharing="<?php echo ( !empty($options['blog-social']) && $options['blog-social'] == 1 ) ? '1' : '0'; ?>"> <?php

						// knowledgebase social sharting icons
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
                   		
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Navigation Area -->
        
        <?php if( !empty($options['enable-comment-knowledgebase-area']) && $options['enable-comment-knowledgebase-area'] == 1) { ?>
        <!-- Comments Template Area -->
        <section class="comment-area">
			<div class="container">
            	<div class="row-fluid">
                	<div class="span12">
						<?php comments_template('', true); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Comments Template Area -->
        <?php } ?>
        
    <?php endwhile; endif; ?>
    
</div>
            
<?php get_footer(); ?>