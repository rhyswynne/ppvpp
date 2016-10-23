<?php

// Register Custom Post Type
function ppvpp_create_ppv() {

	$labels = array(
		'name'                  => _x( 'PPVs', 'Post Type General Name', 'ppv' ),
		'singular_name'         => _x( 'PPV', 'Post Type Singular Name', 'ppv' ),
		'menu_name'             => __( 'PPV', 'ppv' ),
		'name_admin_bar'        => __( 'PPV', 'ppv' ),
		'parent_item_colon'     => __( 'Parent PPV:', 'ppv' ),
		'all_items'             => __( 'All PPVs', 'ppv' ),
		'add_new_item'          => __( 'Add New PPV', 'ppv' ),
		'add_new'               => __( 'Add New', 'ppv' ),
		'new_item'              => __( 'New PPV', 'ppv' ),
		'edit_item'             => __( 'Edit PPV', 'ppv' ),
		'update_item'           => __( 'Update PPV', 'ppv' ),
		'view_item'             => __( 'View PPV', 'ppv' ),
		'search_items'          => __( 'Search PPV', 'ppv' ),
		'not_found'             => __( 'Not found', 'ppv' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ppv' ),
		'items_list'            => __( 'PPVs list', 'ppv' ),
		'items_list_navigation' => __( 'PPVs list navigation', 'ppv' ),
		'filter_items_list'     => __( 'Filter PPV list', 'ppv' ),
	);
	$args = array(
		'label'                 => __( 'PPV', 'ppv' ),
		'description'           => __( 'The PPV/Show', 'ppv' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', ),
		'taxonomies'            => array( 'show_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'ppv', $args );

}
add_action( 'init', 'ppvpp_create_ppv', 0 );

// Register Custom Post Type
function ppvpp_create_item() {

	$labels = array(
		'name'                  => _x( 'Social Media Items', 'Post Type General Name', 'ppvpp' ),
		'singular_name'         => _x( 'Social Media Item', 'Post Type Singular Name', 'ppvpp' ),
		'menu_name'             => __( 'Social Media Item', 'ppvpp' ),
		'name_admin_bar'        => __( 'Social Media Item', 'ppvpp' ),
		'parent_item_colon'     => __( 'Parent Social Media Item:', 'ppvpp' ),
		'all_items'             => __( 'All Social Media Items', 'ppvpp' ),
		'add_new_item'          => __( 'Add New Social Media Item', 'ppvpp' ),
		'add_new'               => __( 'Add New', 'ppvpp' ),
		'new_item'              => __( 'New Social Media Item', 'ppvpp' ),
		'edit_item'             => __( 'Edit Social Media Item', 'ppvpp' ),
		'update_item'           => __( 'Update Social Media Item', 'ppvpp' ),
		'view_item'             => __( 'View Social Media Item', 'ppvpp' ),
		'search_items'          => __( 'Search Social Media Item', 'ppvpp' ),
		'not_found'             => __( 'Not found', 'ppvpp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ppvpp' ),
		'items_list'            => __( 'Social Media Items list', 'ppvpp' ),
		'items_list_navigation' => __( 'Social Media Items list navigation', 'ppvpp' ),
		'filter_items_list'     => __( 'Filter Social Media Item list', 'ppvpp' ),
	);
	$args = array(
		'label'                 => __( 'Social Media Item', 'ppvpp' ),
		'description'           => __( 'Social Media Item', 'ppvpp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'taxonomies'            => array( 'show_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-share-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'ppv_item', $args );

}
add_action( 'init', 'ppvpp_create_item', 0 );


?>