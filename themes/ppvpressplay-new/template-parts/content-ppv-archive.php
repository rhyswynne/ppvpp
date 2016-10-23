<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ppvpressplay
 */

$image = array();

if ( has_post_thumbnail( ) ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'ppv-featured-image' );
}
?>


<article id="post-<?php the_ID(); ?> ppv-fullwidth">

	<header class="archive-header" 

	<?php 
	if (!empty( $image ) ) {

		echo ' style="background-image:url('. $image[0] .');"';

	}
	?>
	>
	<div class="overlay">
			<?php

			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			?>
	</div>
</header><!-- .entry-header -->

</article><!-- #post-## -->
