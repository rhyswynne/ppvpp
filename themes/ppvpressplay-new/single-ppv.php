<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ppvpressplay
 */

get_header();

while ( have_posts() ) : the_post();

	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'ppv-featured-image', array( 'class' => 'img-responsive' ) );

	}
?>
<div id="primary" class="content-area ppv-fullwidth">
	<main id="main" class="site-main" role="main">

		

		<?php		

		get_template_part( 'template-parts/content', 'ppv' );

		if ( is_user_logged_in() ) {

			the_post_navigation();

		}

			// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
				//comments_template();
			endif;
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php

endwhile; // End of the loop.

get_footer();
