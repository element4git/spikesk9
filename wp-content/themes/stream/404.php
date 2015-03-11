<?php get_header(); ?>
<?php $options = get_option('infinite_options'); 

$error_image = null;
if( !empty($options['404-img']['url'])) {
    $error_image = ' class="error-404-image" style="background-image: url('.$options['404-img']['url'].');"';
}
?>




		<section id="image-static">
        <?php if(!empty($options['404-color-overlay'])) { echo '<span class="overlay-bg" style="background:'.$options['404-color-overlay'].'; opacity:'.$options['404-opacity-overlay'].';"></span>'; } ?>
    
        <div class="fullimage-container<?php if( !empty($options['404-title']) || !empty($options['404-caption']) ) { ?> <?php echo 'titlize'; ?><?php } ?>" style="background: url('<?php echo $options['404-img']['url']; ?>') center center no-repeat; background-attachment: <?php echo $bgattachment; ?>; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">  
            <div class="container pagize error-404-container">
            	<div class="row">
                	<div class="col-md-12 <?php echo $options['404-text-header-align']; ?>">
                    <?php if( !empty($options['404-title']) ) { ?>
                        <h2><?php echo $options['404-title'] ?></h2>
                    <?php } else { ?>
                        <h2<?php echo $page_color_text; ?>><?php echo the_title(); ?></h2>
                    <?php } ?>
                    <?php if( !empty($options['404-caption']) ) { ?>
                        <p class="page-caption"><?php echo $options['404-caption']; ?></p>
                    <?php } ?>
                    	<a class="button-main button-error button-small custom-button-color softly-rounded-button" href="<?php echo home_url(); ?>"><?php _e('BACK TO HOMEPAGE', INFINITE_LANGUAGE) ?></a>
                    </div>
            	</div>
            </div>          
        </div>
        </section>
	
<?php get_footer(); ?>