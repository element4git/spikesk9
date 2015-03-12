<?php $options = get_option('infinite_options'); ?>
<?php $custom_js = $options['custom-js']; ?>
</div>
<!-- End Main -->

<?php if( !empty($options['enable-back-to-top']) && $options['enable-back-to-top'] == 1) { ?>
<!-- Back To Top -->
	<p id="back-top">
        <a href="#"><i class="icon-angle-up"></i></a>
    </p>
<!-- End Back to Top -->
<?php } ?>
<footer>
<?php 
global $woocommerce; 
if ($woocommerce) {
	if ( is_home() || is_search() || is_404() || is_shop() || is_product_category() || is_product_tag() || is_product() ) {
	// Blog Page and Search Page
	ig_footer_widget(get_option('page_for_posts'));
	} else {
	// All Other Pages and Posts
	ig_footer_widget(get_the_ID());
	}	
} elseif ( is_home() || is_search() || is_404() ) {
	// Blog Page and Search Page
	ig_footer_widget(get_option('page_for_posts'));
} else {
	// All Other Pages and Posts
	ig_footer_widget(get_the_ID());
}
?>

<section id="copyright">
	<div class="container">
		<div class="row">

			<?php if( !empty($options['enable-footer-social-area']) && $options['enable-footer-social-area'] == 1) { ?>
            <div class="col-md-6">
                <?php if( $options['footer-infinitegrids-signature-text'] == 1) { ?><p class="copyright-text">&copy; <?php _e('Copyright ', INFINITE_LANGUAGE); echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> / <?php _e('Powered by', INFINITE_LANGUAGE) ?> <a href="http://wordpress.org/" target="_blank">WordPress</a></p><?php } ?>
                <?php if(!empty($options['footer-copyright-text'])) { ?> <p class="credits"><?php echo $options['footer-copyright-text']; ?></p> <?php } ?>
            </div>
            
            <div class="col-md-6">
            <!-- Social Icons -->
            <nav id="social-footer">
                <ul>
                    <?php
                        global $socials_profiles;
                        
                        foreach($socials_profiles as $social_profile):
                            if( $options[$social_profile.'-url'] )
                            {
                                echo '<li><a href="'.$options[$social_profile.'-url'].'" target="_blank"><i class="icon-'.$social_profile.'"></i></a></li>';
                            }
                        endforeach;
                    ?>
                </ul>
            </nav>
            <!-- End Social Icons -->
            </div>
            <?php } else { ?>
            
            <div class="col-md-12">
                <?php if( $options['footer-infinitegrids-signature-text'] == 1) { ?><p class="copyright-text">&copy; <?php _e('Copyright ', INFINITE_LANGUAGE); echo date( 'Y' ); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a> / <?php _e('Powered by', INFINITE_LANGUAGE) ?> <a href="http://wordpress.org/" target="_blank">WordPress</a></p><?php } ?>
                <?php if(!empty($options['footer-copyright-text'])) { ?><p class="credits"><?php echo $options['footer-copyright-text']; ?></p> <?php } ?>
            </div>
    
            <?php } ?>
            
		</div>
	</div>
</section>

</footer>

</div>
<!-- End Wrap All -->


<?php 	
	wp_register_script('functions', get_template_directory_uri() . '/includes/js/functions.js', array('jquery'), NULL, true);
	wp_enqueue_script('functions');
	
	wp_localize_script(
		'functions', 
		'theme_objects',
		array(
			'base' => get_template_directory_uri()
		)
	);

	wp_footer();  
?>	
<!-- Custom HTML -->
<?php if(!empty($options['custom-html'])) echo $options['custom-html']; ?>
<!-- Custom JS -->
<?php if(!empty($options['custom-js'])) echo '<script type="text/javascript">' . $options['custom-js'] . '</script>'; ?>
<div>
<div id="modalBoxes">

</div>
</body>
</html>