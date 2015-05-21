<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<div class="footer_top">
			
			<footer id="colophon" class="site-footer" role="contentinfo">
				
				<?php get_sidebar( 'footer' ); ?>
	
				<div class="site-info">
					<p>Copyright &copy; 2014-<?php echo date('Y'); ?>　<?php bloginfo('name'); ?>,ALL rights reserved.</p>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
			
			<div class="footer_bottom"></div>
		</div>
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>