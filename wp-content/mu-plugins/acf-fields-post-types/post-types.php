<?php

register_post_type( 'community-college',
	array('labels' => array(
			'name' => 'Community Colleges',
			'singular_name' => 'Community College',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Community College',
			'edit' => 'Edit',
			'edit_item' => 'Edit Community College',
			'new_item' => 'New Community College',
			'view_item' => 'View Community College',
			'search_items' => 'Search Community Colleges',
			'not_found' =>  'Nothing found in the Database.',
			'not_found_in_trash' => 'Nothing found in Trash',
			'parent_item_colon' => ''
		),
		'public' => true,
		'exclude_from_search' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'menu_position' => 9,
		'menu_icon' => 'dashicons-welcome-learn-more',
		// 'capability_type' => array('page'),
		'map_meta_cap' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'revisions', 'thumbnail'),
		'has_archive' => false,
		'rewrite' => true,
		'query_var' => true
	)
);