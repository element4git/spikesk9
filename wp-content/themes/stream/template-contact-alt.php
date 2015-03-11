<?php
/* Template Name: Contact Alt */
?>

<?php
	if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
		wpcf7_enqueue_scripts();
		wpcf7_enqueue_styles();
	}
?>

<?php get_header();

$options = get_option('infinite_options'); 
?>

<?php ig_page_header($post->ID); ?>

<div id="content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <?php //edit_post_link( __('Edit', INFINITE_LANGUAGE), '<span class="edit-post">[', ']</span>' ); ?>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</div>

<!-- Start Map -->
<section id="map-area">
	<div class="map" id="map_1" data-mapLat="<?php if(!empty($options['center-lat'])) echo $options['center-lat']; ?>" data-mapLon="<?php if(!empty($options['center-lng'])) echo $options['center-lng']; ?>" data-mapZoom="<?php if(!empty($options['zoom-level'])) echo $options['zoom-level']; ?>" data-extra-color="<?php if(!empty($options['accent-color'])) echo $options['accent-color']; ?>" data-mapTitle="<?php if(!empty($options['title-marker'])) echo $options['title-marker']; ?>" data-marker-img="<?php if(!empty($options['marker-img'])) echo $options['marker-img']['url']; ?>" data-info="<?php if(!empty($options['map-info'])) echo $options['map-info']; ?>"></div>
</section>
<!-- End Map -->

<?php get_footer(); ?>