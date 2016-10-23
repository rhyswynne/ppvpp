<?php


function ppvpp_get_all_ppv_times() {

	global $wpdb;

	// Get all Post ID's
	$all_ids = $wpdb->get_col( "
		SELECT ID
		FROM $wpdb->posts
		WHERE post_type = 'ppv'
		AND post_status = 'publish'
		");

	$ppvtimes = array();

	if ( $all_ids ) {
		foreach ( $all_ids as $id ) {
			$starttime 	= get_post_meta( $id, '_ppvpp_start_time', true );
			$endtime 	= get_post_meta( $id, '_ppvpp_end_time', true );
			array_push( $ppvtimes, array( 'id' => $id, 'starttime' => $starttime, 'endtime' => $endtime ) );
		}
	}

	return $ppvtimes;
}


function ppvpp_does_tweet_already_exist( $tweetid ) {
	global $wpdb;

	// Get all Post ID's
	$post_id = $wpdb->get_var( "
		SELECT post_id
		FROM $wpdb->postmeta
		WHERE meta_key = '_ppvpp_tweet_id'
		AND meta_value = " . $tweetid
		);

	//wp_die( $tweetid . " " . $post_id );

	return $post_id;
}