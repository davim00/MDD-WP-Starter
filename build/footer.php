<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package William_Boles
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">

			<?php // The footer features 3 widget areas. If no widgets are active, the entire row does not display
			if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="row">
				  <div class="col-sm-4">
				    <?php dynamic_sidebar( 'footer-1' ); ?>
				  </div>
					<div class="col-sm-4">
				    <?php dynamic_sidebar( 'footer-2' ); ?>
				  </div>
					<div class="col-sm-4">
				    <?php dynamic_sidebar( 'footer-3' ); ?>
				  </div>
				</div>
			<?php endif; ?>

			<?php // The bottom of the footer can hold copyright info. and other arbitrary text, set through the customizer
			wp_starter_footer_text(); ?>

		</div><!-- .container -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
