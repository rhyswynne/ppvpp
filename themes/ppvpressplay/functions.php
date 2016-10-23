<?php

/**
* Enqueue the parent style, the right way.
*
* @return void
*/
function ppvpressplay_enqueue_stylesheets() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'ppvpressplay_enqueue_stylesheets' );

?>