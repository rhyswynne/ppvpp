<?php

/**
 * Edit the login system to show only last 3 posts to non-registered users
 * 
 * @param  object $query the query object
 * @return void
 */
function ppvpp_login_system( $query ) {
	if ( is_admin() || ! $query->is_main_query() )
		return;

	if ( is_post_type_archive( 'ppv' ) ) {
        
		if ( is_user_logged_in() ) {
			$query->set( 'posts_per_page', 10 );
			return;
		} else {
			$query->set( 'posts_per_page', 3 );
			return;
		}
	}
}
add_action( 'pre_get_posts', 'ppvpp_login_system', 1 );

?>