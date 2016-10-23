<?php

function ppvpp_enqueue_css() {
	wp_enqueue_style( 'ppvpp-style', PPVPRESSPLAY_PLUGIN_URL . '/inc/css/custom.css' );
} add_action( 'wp_enqueue_scripts', 'ppvpp_enqueue_css' );

function ppvpp_enqueue_js() {

	if ( is_singular( 'ppv' ) ) {

		global $post;
		$post_id = $post->ID;

		wp_register_script( 'press-play', PPVPRESSPLAY_PLUGIN_URL . '/inc/js/press-play-button.js', array( 'jquery' ), '1.0' );

		$ppvarray = array(
			'ppv_id' => $post_id
			);

		wp_localize_script( 'press-play', 'ppvdetails', $ppvarray );

		wp_enqueue_script( 'press-play' );
		wp_enqueue_style( 'dashicons' );

	}

} add_action( 'wp_enqueue_scripts', 'ppvpp_enqueue_js' );

?>