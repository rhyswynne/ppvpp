<?php

/**
* Enqueue the added style, the right way.
*
* @return void
*/
function ppvpp_enqueue_stylesheets() {
	wp_enqueue_style( 'ppvpp-site-style', get_stylesheet_directory_uri() . '/added.css' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Oswald:400,700|Oxygen:400,700' );
}
add_action( 'wp_enqueue_scripts', 'ppvpp_enqueue_stylesheets' );