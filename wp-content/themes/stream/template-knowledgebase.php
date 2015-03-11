<?php
/* Template Name: Knowledgebase */
?>

<?php get_header(); ?>

<?php ig_page_header($post->ID); ?>

<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php //edit_post_link( __('Edit', INFINITE_LANGUAGE), '<span class="edit-post">[', ']</span>' ); ?>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>