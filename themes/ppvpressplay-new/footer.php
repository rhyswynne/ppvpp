<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ppvpressplay
 */

?>

</div><!-- #content -->
<aside class="above-footer">
	<div class="placement">
		<?php dynamic_sidebar( 'above-footer' ); ?>
	</div>
</aside>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info placement">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ppvpressplay' ) ); ?>"><?php printf( esc_html__( 'Produdly powered by %1$s', 'ppvpressplay' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
		<?php printf( esc_html__( 'A %1$s product.', 'ppvpressplay' ), '<a href="https://winwar.co.uk" rel="designer">Winwar Media</a>' ); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
