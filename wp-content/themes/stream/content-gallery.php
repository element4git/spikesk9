<?php $rev_slider_alias = get_post_meta($post->ID, '_ig_gallery', true); ?>

<?php if( !is_single() ) { ?>

<div class="post-thumb">
	<?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
</div>

<div class="post-name">
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a>
	</h2>
	<?php get_template_part( 'content' , 'meta-header' ); ?>
</div>
  
<div class="entry-content">
    <?php the_content( __("Read More", INFINITE_LANGUAGE) );?>
</div>

<?php } ?>

<?php if( is_single() ) { ?>

<div class="post-thumb">
    <?php echo do_shortcode('[rev_slider '.$rev_slider_alias.']'); ?>
</div>

<div class="entry-content">
    <?php the_content( __("Read More", INFINITE_LANGUAGE) );?>
</div>

<?php get_template_part( 'content', 'meta-footer' ); ?>

<?php } ?>