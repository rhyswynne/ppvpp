<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ppvpressplay
 */

get_header(); ?>

<div id="primary" class="content-area ppv-fullwidth">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php

		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$ppvargs = array(
			
			'post_type'   => 'ppv',
			
			//Pagination Parameters
			'posts_per_page'         => 3,

			'meta_key' => '_ppvpp_start_time',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'meta_value'	 => time(),
			'meta_compare'   => '<',
			
			);
		

		$ppvquery = new WP_Query( $ppvargs );

		if ( $ppvquery->have_posts() ) {

			echo '<h3 class="front-page-shows">Latest Shows</h3>';

			while ( $ppvquery->have_posts() ) {

				$ppvquery->the_post();
				?>
				<div class="shows-front-page-archive">
					<?php get_template_part( 'template-parts/content', 'ppv-archive' ); ?>
				</div>
				<?php

			}

		}

//get_sidebar();
		get_footer();
