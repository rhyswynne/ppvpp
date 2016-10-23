<?php

function ppvpp_add_endpoints() {
	register_rest_route( 'ppvpp/v1', '/get-current-social/(?P<ppv>\d+)/(?P<time>\d+)', array(
		'methods' => 'GET',
		'callback' => 'ppvpp_get_current_social' 
	)
	);
} add_action( 'rest_api_init', 'ppvpp_add_endpoints' );


function ppvpp_get_current_social( $data ) {

	$args = array(
			
			'post_type'   => 'ppv_item',
			
			'post_status' => 'publish',
			
			//Order & Orderby Parameters
			'orderby' 	  => 'meta_value_num',
			
			//Pagination Parameters
			'posts_per_page'         => -1,
			
			//Custom Field Parameters
			'meta_query'     => array(
				'relation'	=> 'AND',
				array(
					'key' => '_ppvpp_associated_ppv',
					'value' => $data['ppv'],
					'compare' => '='
				),
				array(
					'key' => '_ppvpp_time_to_show',
					'value' => array( $data['time'] - 10, $data['time'] ),
					'compare' => 'BETWEEN',
					'type'	 => 'NUMERIC'
			)
			)
			
		);
	
	$posts = new WP_Query( $args );

	//wp_die( $posts->request );

	return $posts;
	
}