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
For more information or permission to use any photos, contact <a href="mailto:james@spikesk9fund.org">james@spikesk9fund.org</a>
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