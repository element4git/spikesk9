<?php get_header(); 

$options = get_option('infinite_options');

?>

<?php ig_page_header_team($post->ID); ?>

<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php //edit_post_link( __('Edit', 'INFINITE_LANGUAGE'), '<span class="edit-post">[', ']</span>' ); ?>
        <?php the_content(); ?>
        
        <?php if( !empty($options['enable-comment-team-area']) && $options['enable-comment-team-area'] == 1) { ?>
        <!-- Comments Template Area -->
        <section class="comment-area">
			<div class="container">
            	<div class="row">
                	<div class="col-md-12">
						<?php comments_template('', true); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Comments Template Area -->
        <?php } ?>

        <!-- Navigation Area -->
        <section class="main-content small-padding post-type-navi">
        	<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navigation-projects">
                            <ul>
                                <li class="prev"><?php previous_post_link(('%link'), '<i class="icon-arrow-left72"></i>'.__('Prev', 'INFINITE_LANGUAGE').'') ?></li><?php
                                if( !empty($options['team-index']) ) { ?>
									<li class="port-index"><a href="<?php echo $options['team-index'] ?>" rel="index"><i class="icon-layers2"></i>'.__('Team Index', 'INFINITE_LANGUAGE').'') ?></a></li>
								<?php } ?>
                                <li class="next"><?php next_post_link(('%link'), '<i class="icon-uniE6F8"></i>'.__('Next', 'INFINITE_LANGUAGE').'') ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Navigation Area -->

        <!-- Navigation Area Mobile -->
        <section class="main-content-navi team mobile default-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navigation-projects">
                            <ul>
                                <li class="prev"><?php previous_post_link(('%link'), '<i class="icon-arrow-left72"></i>'.__('Prev', 'INFINITE_LANGUAGE').'') ?></li><?php
                                if( !empty($options['team-index']) ) { ?>
									<li class="port-index"><a href="<?php echo $options['team-index'] ?>" rel="index"><i class="icon-layers2"></i>'.__('Team Index', 'INFINITE_LANGUAGE').'') ?></a></li>
								<?php } ?>
                                <li class="next"><?php next_post_link(('%link'), '<i class="icon-uniE6F8"></i>'.__('Next', 'INFINITE_LANGUAGE').'') ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Navigation Area Mobile -->
        
    <?php endwhile; endif; ?>

    
</div>
            
<?php get_footer(); ?>