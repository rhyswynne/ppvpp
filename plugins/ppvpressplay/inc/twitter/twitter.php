<?php

use Abraham\TwitterOAuth\TwitterOAuth;

function ppvpp_get_latest_tweets() {

	$twitterConnection = new TwitterOAuth(
					'kXrJ5Nsbrt0n2JhPfBRbtfNRQ',	// Consumer Key
					'ALFsKauOsYeTFd33wo9kee3SZXoZKoZFCbfh0s0tN80z8kLv6q',   	// Consumer secret
					'7226742-BbFvnwWZTWZtM41LjHRT2LRVQMMQKHJG5GDthV9sXf',       // Access token
					'cfdasEq0gQCK5KWbvaeEeu9Nwz85kqzp65998CBx3cpBX'    	// Access token secret
					);

	$twitterData = $twitterConnection->get(
		'statuses/user_timeline',
		array(
			'screen_name'     	=> 'WWE',
			'count'           	=> 200,
			'exclude_replies' 	=> true,
			
			)
		);

	$allppvs = ppvpp_get_all_ppv_times();

	foreach ( $twitterData as $tweet ) {

		$timestring = strtotime( $tweet->created_at );

		foreach ( $allppvs as $ppv ) {

			if ( $timestring > $ppv['starttime'] && $timestring < $ppv['endtime'] ) {
				
				if ( !ppvpp_does_tweet_already_exist( $tweet->id ) ) {

					$post_content = 'https://twitter.com/WWE/status/' . $tweet->id;

					$post = array( 
						'post_content'   => $post_content,
						'post_title'	 => $tweet->id,
						'post_status'	 => 'publish',
						'post_type'		 => 'ppv_item',	
						);

					$new_id = wp_insert_post( $post );

					$timetoshow 	= $timestring - $ppv['starttime'];
					$associatedppv 	= $ppv['id'];

					update_post_meta( $new_id, '_ppvpp_time_to_show', $timetoshow ); 
					update_post_meta( $new_id, '_ppvpp_associated_ppv', $associatedppv );
					update_post_meta( $new_id, '_ppvpp_tweet_id', $tweet->id );
					update_post_meta( $new_id, '_ppvpp_tweet_time', $timestring );

					//print_r( $tweet );
				}

			}

		}
	}

	//wp_die( $ppv['starttime'] );

} add_action('ppvpp_event_hook_10_minutes', 'ppvpp_get_latest_tweets' );

?>