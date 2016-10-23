<?php

/**
 * Define the PPV Details Metabox
 * 
 * @return void
 */
function ppvpp_ppv_metabox() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_ppvpp_';
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$ppv_details = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'PPV Details', 'ppvpp' ),
		'object_types'  => array( 'ppv', ), // Post type
	) );

	$ppv_details->add_field( array(
		'name' => __( 'Start time of the PPV', 'ppvpp' ),
		'desc' => __( '', 'ppvpp' ),
		'id'   => $prefix . 'start_time',
		'type' => 'text_datetime_timestamp',
	) );

	$ppv_details->add_field( array(
		'name' => __( 'End time of the PPV', 'ppvpp' ),
		'desc' => __( 'Usually add 4 hours to the PPV', 'ppvpp' ),
		'id'   => $prefix . 'end_time',
		'type' => 'text_datetime_timestamp',
	) );

} add_action( 'cmb2_admin_init', 'ppvpp_ppv_metabox' );

?>