<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Cleanead
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="copyright">
			<?php echo esc_html(cleanead_get_option( 'cleanead_copyright_text' )); ?>
			</div>
			<?php if ( !cleanead_get_option('cleanead_theme_info') ) : ?>
				<div class="theme-info">
					<?php printf( __( 'Proudly powered by %s', 'cleanead' ), '<a href="http://wordpress.org" class ="powerby" rel="designer">WordPress</a>' ); ?>
					<span class="sep"> | </span>
					<span class="theme-author"><?php printf( __( 'Theme: %1$s by %2$s.', 'cleanead' ), 'Cleanead', '<a href="http://themecountry.com" rel="designer">ThemeCountry</a>' ); ?></span>
				</div>
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
