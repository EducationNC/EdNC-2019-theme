<?php

namespace Roots\Sage\CPT;

function register_post_types() {
	register_post_type( 'ad',
		array('labels' => array(
				'name' => 'Ads',
				'singular_name' => 'Ad',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Ad',
				'edit' => 'Edit',
				'edit_item' => 'Edit Ad',
				'new_item' => 'New Ad',
				'view_item' => 'View Ad',
				'search_items' => 'Search Ads',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => false,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions'),
			'has_archive' => false,
			'rewrite' => false,
			'query_var' => true
	 	)
	);

	register_post_type( 'gallery',
		array('labels' => array(
				'name' => 'Galleries',
				'singular_name' => 'Gallery',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Gallery',
				'edit' => 'Edit',
				'edit_item' => 'Edit Gallery',
				'new_item' => 'New Gallery',
				'view_item' => 'View Gallery',
				'search_items' => 'Search Gallery',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'ednews',
		array('labels' => array(
				'name' => 'EdDaily',
				'singular_name' => 'EdDaily',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New EdDaily',
				'edit' => 'Edit',
				'edit_item' => 'Edit EdDaily',
				'new_item' => 'New EdDaily',
				'view_item' => 'View EdDaily',
				'search_items' => 'Search EdDaily',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'needtoknow',
		array('labels' => array(
				'name' => 'Need to Know',
				'singular_name' => 'Need to Know',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Need to Know Page',
				'edit' => 'Edit',
				'edit_item' => 'Edit Need to Know',
				'new_item' => 'New Need to Know',
				'view_item' => 'View Need to Know',
				'search_items' => 'Search Need to Know',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'boardnotes',
		array('labels' => array(
				'name' => 'Board Notes',
				'singular_name' => 'Board Notes',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Board Notes',
				'edit' => 'Edit',
				'edit_item' => 'Edit Board Notes',
				'new_item' => 'New Board Notes',
				'view_item' => 'View Board Notes',
				'search_items' => 'Search Board Notes',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'wrapnotes',
		array('labels' => array(
				'name' => 'Weekly Wrapup Notes',
				'singular_name' => 'Weekly Wrapup Notes',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Weekly Wrapup Notes',
				'edit' => 'Edit',
				'edit_item' => 'Edit Weekly Wrapup Notes',
				'new_item' => 'New Weekly Wrapup Notes',
				'view_item' => 'View Weekly Wrapup Notes',
				'search_items' => 'Search Weekly Wrapup Notes',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'excerpt', 'revisions'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'district',
		array('labels' => array(
				'name' => 'Districts',
				'singular_name' => 'District',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New District',
				'edit' => 'Edit',
				'edit_item' => 'Edit District',
				'new_item' => 'New District',
				'view_item' => 'View District',
				'search_items' => 'Search District',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			'menu_icon' => 'dashicons-admin-site-alt3',
			'capability_type' => array('district','districts'),
			'map_meta_cap' => true,
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions', 'thumbnail'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'legislator',
		array('labels' => array(
				'name' => 'Legislators',
				'singular_name' => 'Legislator',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Legislator',
				'edit' => 'Edit',
				'edit_item' => 'Edit Legislator',
				'new_item' => 'New Legislator',
				'view_item' => 'View Legislator',
				'search_items' => 'Search Legislator',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions', 'thumbnail', 'page-attributes'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'bio',
		array('labels' => array(
				'name' => 'Bios',
				'singular_name' => 'Bio',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Bio',
				'edit' => 'Edit',
				'edit_item' => 'Edit Bio',
				'new_item' => 'New Bio',
				'view_item' => 'View Bio',
				'search_items' => 'Search Bio',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'excerpt', 'revisions', 'thumbnail', 'page-attributes'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'map',
		array('labels' => array(
				'name' => 'Maps',
				'singular_name' => 'Map',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Map',
				'edit' => 'Edit',
				'edit_item' => 'Edit Map',
				'new_item' => 'New Map',
				'view_item' => 'View Map',
				'search_items' => 'Search Map',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'author', 'revisions', 'thumbnail', 'comments'),
			'has_archive' => false,
			'rewrite' => false,	// set to false and then create custom rewrite rules below
			'query_var' => true
		)
	);

	register_post_type( 'resource',
		array('labels' => array(
				'name' => 'Resources',
				'singular_name' => 'Resource',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Resource',
				'edit' => 'Edit',
				'edit_item' => 'Edit Resource',
				'new_item' => 'New Resource',
				'view_item' => 'View Resource',
				'search_items' => 'Search Resources',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => false,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'revisions'),
			'has_archive' => false,
			'rewrite' => false,
			'query_var' => true
		)
	);

	register_post_type( 'bill',
		array('labels' => array(
				'name' => 'Bills',
				'singular_name' => 'Bill',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Bill',
				'edit' => 'Edit',
				'edit_item' => 'Edit Bill',
				'new_item' => 'New Bill',
				'view_item' => 'View Bill',
				'search_items' => 'Search Bills',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => false,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions', 'page-attributes'),
			'has_archive' => false,
			'rewrite' => false,
			'query_var' => true
		)
	);

	register_post_type( 'flash-cards',
		array('labels' => array(
				'name' => 'Flash Cards',
				'singular_name' => 'Flash Cards',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Flash Cards',
				'edit' => 'Edit',
				'edit_item' => 'Edit Flash Cards',
				'new_item' => 'New Flash Cards',
				'view_item' => 'View Flash Cards',
				'search_items' => 'Search Flash Cards',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'taxonomies' => array('category'),
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'revisions', 'thumbnail', 'author'),
			'has_archive' => false,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'edtalk',
		array('labels' => array(
				'name' => 'EdTalk',
				'singular_name' => 'EdTalk Episode',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New EdTalk Episode',
				'edit' => 'Edit',
				'edit_item' => 'Edit EdTalk Episode',
				'new_item' => 'New EdTalk Episode',
				'view_item' => 'View EdTalk Episode',
				'search_items' => 'Search EdTalk Episode',
				'not_found' =>  'Nothing found in the Database.',
				'not_found_in_trash' => 'Nothing found in Trash',
				'parent_item_colon' => ''
			), /* end of arrays */
			'taxonomies' => array('category', 'podcast'),
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 8,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'author', 'revisions', 'editor', 'comments', 'thumbnail'),
			// 'show_in_rest' => true,
			'has_archive' => true,
			'rewrite' => true,
			'query_var' => true
		)
	);

	register_post_type( 'reach-question',

		array(
			'labels' => array(
				'name' => __( 'Reach NC Questions' ),
				'singular_name' => __( 'Reach NC Question' ),
				'add_new_item' => 'Add New Reach NC Question',
			),
			//'taxonomies' => array('category'),
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'rewrite' => true,
			'supports' => array( 'title', 'author', 'revisions', 'editor', 'thumbnail' ),
			'query_var' => true
		)
	);

	register_post_type( 'reach-nc-poll',

		array(
			'labels' => array(
				'name' => __( 'Reach NC Polls' ),
				'singular_name' => __( 'Reach NC Poll' ),
				'add_new_item' => 'Add New Reach NC Poll',
			),
			//'taxonomies' => array('category'),
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'has_archive' => true,
			'rewrite' => true,
			'supports' => array( 'title', 'author', 'revisions', 'editor', 'thumbnail' ),
			'query_var' => true
		)
	);

}
add_action( 'init', __NAMESPACE__ . '\\register_post_types');


register_taxonomy( 'ad-type',
	array('ad'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
	'labels' => array(
		'name' => 'Ad Types', /* name of the custom taxonomy */
		'singular_name' => 'Ad Type', /* single taxonomy name */
		'search_items' =>  'Search Ad Types', /* search title for taxomony */
		'all_items' => 'All Ad Types',  /*all title for taxonomies */
		'parent_item' => 'Parent Ad Type', /* parent title for taxonomy */
		'parent_item_colon' => 'Parent Ad Type:', /* parent taxonomy title */
		'edit_item' => 'Edit Ad Type', /* edit custom taxonomy title */
		'update_item' => 'Update Ad Type', /* update title for taxonomy */
		'add_new_item' => 'Add New Ad Type', /* add new title for taxonomy */
		'new_item_name' => 'New Ad Type Name' /* name title for taxonomy */
	),
	'show_ui' => true,
	'query_var' => true,
	'public' => false,
	'show_in_rest' => true,
	)
);

register_taxonomy( 'district-type',
	array('district'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
	'labels' => array(
		'name' => 'District Types', /* name of the custom taxonomy */
		'singular_name' => 'District Type', /* single taxonomy name */
		'search_items' =>  'Search District Types', /* search title for taxomony */
		'all_items' => 'All District Types',  /*all title for taxonomies */
		'parent_item' => 'Parent District Type', /* parent title for taxonomy */
		'parent_item_colon' => 'Parent District Type:', /* parent taxonomy title */
		'edit_item' => 'Edit District Type', /* edit custom taxonomy title */
		'update_item' => 'Update District Type', /* update title for taxonomy */
		'add_new_item' => 'Add New District Type', /* add new title for taxonomy */
		'new_item_name' => 'New District Type Name' /* name title for taxonomy */
	),
	'show_ui' => true,
	'query_var' => true,
	'public' => false,
	'show_in_rest' => true,
	)
);

register_taxonomy( 'author-type',
	array('bio'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => 'Author Types', /* name of the custom taxonomy */
			'singular_name' => 'Author Type', /* single taxonomy name */
			'search_items' =>  'Search Author Types', /* search title for taxomony */
			'all_items' => 'All Author Types',  /*all title for taxonomies */
			'parent_item' => 'Parent Author Type', /* parent title for taxonomy */
			'parent_item_colon' => 'Parent Author Type:', /* parent taxonomy title */
			'edit_item' => 'Edit Author Type', /* edit custom taxonomy title */
			'update_item' => 'Update Author Type', /* update title for taxonomy */
			'add_new_item' => 'Add New Author Type', /* add new title for taxonomy */
			'new_item_name' => 'New Author Type Name' /* name title for taxonomy */
		),
		'show_ui' => true,
		'query_var' => true,
		'public' => false,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'author-year',
	array('bio'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => 'Contributing Years', /* name of the custom taxonomy */
			'singular_name' => 'Contributing Year', /* single taxonomy name */
			'search_items' =>  'Search Contributing Years', /* search title for taxomony */
			'all_items' => 'All Contributing Years',  /*all title for taxonomies */
			'parent_item' => 'Parent Contributing Year', /* parent title for taxonomy */
			'parent_item_colon' => 'Parent Contributing Year:', /* parent taxonomy title */
			'edit_item' => 'Edit Contributing Year', /* edit custom taxonomy title */
			'update_item' => 'Update Contributing Year', /* update title for taxonomy */
			'add_new_item' => 'Add New Contributing Year', /* add new title for taxonomy */
			'new_item_name' => 'New Contributing Year Name' /* name title for taxonomy */
		),
		'show_ui' => true,
		'query_var' => true,
		'public' => false,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'resource-type',
	array('resource'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Resource Types' ),
			'singular_name' => __( 'Resource Type' ),
			'search_items' =>  __( 'Search Resource Types' ),
			'all_items' => __( 'All Resource Types' ),
			'parent_item' => __( 'Parent Resource Type' ),
			'parent_item_colon' => __( 'Parent Resource Type:' ),
			'edit_item' => __( 'Edit Resource Type' ),
			'update_item' => __( 'Update Resource Type' ),
			'add_new_item' => __( 'Add New Resource Type' ),
			'new_item_name' => __( 'New Resource Type Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'session',
	array('bill'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Sessions' ),
			'singular_name' => __( 'Session' ),
			'search_items' =>  __( 'Search Sessions' ),
			'all_items' => __( 'All Sessions' ),
			'parent_item' => __( 'Parent Session' ),
			'parent_item_colon' => __( 'Parent Session:' ),
			'edit_item' => __( 'Edit Session' ),
			'update_item' => __( 'Update Session' ),
			'add_new_item' => __( 'Add New Session' ),
			'new_item_name' => __( 'New Session Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'bill-type',
	array('bill'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Bill Types' ),
			'singular_name' => __( 'Bill Type' ),
			'search_items' =>  __( 'Search Bill Types' ),
			'all_items' => __( 'All Bill Types' ),
			'parent_item' => __( 'Parent Bill Type' ),
			'parent_item_colon' => __( 'Parent Bill Type:' ),
			'edit_item' => __( 'Edit Bill Type' ),
			'update_item' => __( 'Update Bill Type' ),
			'add_new_item' => __( 'Add New Bill Type' ),
			'new_item_name' => __( 'New Bill Type Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'bill-status',
	array('bill'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Bill Status' ),
			'singular_name' => __( 'Bill Status' ),
			'search_items' =>  __( 'Search Bill Statuses' ),
			'all_items' => __( 'All Bill Statuses' ),
			'parent_item' => __( 'Parent Bill Status' ),
			'parent_item_colon' => __( 'Parent Bill Status:' ),
			'edit_item' => __( 'Edit Bill Status' ),
			'update_item' => __( 'Update Bill Status' ),
			'add_new_item' => __( 'Add New Bill Status' ),
			'new_item_name' => __( 'New Bill Status Name' )
		),
		'show_ui' => true,
		'query_var' => true
	)
);

register_taxonomy( 'sector',
	array('post', 'map', 'edtalk'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Sectors' ),
			'singular_name' => __( 'Sector' ),
			'search_items' =>  __( 'Search Sectors' ),
			'all_items' => __( 'All Sectors' ),
			'parent_item' => __( 'Parent Sector' ),
			'parent_item_colon' => __( 'Parent Sector:' ),
			'edit_item' => __( 'Edit Sector' ),
			'update_item' => __( 'Update Sector' ),
			'add_new_item' => __( 'Add New Sector' ),
			'new_item_name' => __( 'New Sector Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'public' => true,
		'rewrite' => true,
		'hierarchical' => true,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'topic',
	array('post', 'map', 'edtalk'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Topics' ),
			'singular_name' => __( 'Topic' ),
			'search_items' =>  __( 'Search Topics' ),
			'all_items' => __( 'All Topics' ),
			'parent_item' => __( 'Parent Topic' ),
			'parent_item_colon' => __( 'Parent Topic:' ),
			'edit_item' => __( 'Edit Topic' ),
			'update_item' => __( 'Update Topic' ),
			'add_new_item' => __( 'Add New Topic' ),
			'new_item_name' => __( 'New Topic Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'public' => true,
		'rewrite' => true,
		'hierarchical' => true,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'appearance',
	array('post', 'map', 'edtalk', 'flash-cards'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Appearances' ),
			'singular_name' => __( 'Appearance' ),
			'search_items' =>  __( 'Search Appearances' ),
			'all_items' => __( 'All Appearances' ),
			'parent_item' => __( 'Parent Appearance' ),
			'parent_item_colon' => __( 'Parent Appearance:' ),
			'edit_item' => __( 'Edit Appearance' ),
			'update_item' => __( 'Update Appearance' ),
			'add_new_item' => __( 'Add New Appearance' ),
			'new_item_name' => __( 'New Appearance Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'public' => true,
		'rewrite' => true,
		'hierarchical' => true,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'organization',
	array('post', 'map', 'edtalk'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Organizations' ),
			'singular_name' => __( 'Organization' ),
			'search_items' =>  __( 'Search Organizations' ),
			'all_items' => __( 'All Organizations' ),
			'parent_item' => __( 'Parent Organization' ),
			'parent_item_colon' => __( 'Parent Organization:' ),
			'edit_item' => __( 'Edit Organization' ),
			'update_item' => __( 'Update Organization' ),
			'add_new_item' => __( 'Add New Organization' ),
			'new_item_name' => __( 'New Organization Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'public' => true,
		'rewrite' => true,
		'hierarchical' => true,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'podcast',
	array('post', 'edtalk'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Podcast' ),
			'singular_name' => __( 'Podcast' ),
			'search_items' =>  __( 'Search Podcasts' ),
			'all_items' => __( 'All Podcasts' ),
			'parent_item' => __( 'Parent Podcast' ),
			'parent_item_colon' => __( 'Parent Podcast:' ),
			'edit_item' => __( 'Edit Podcast' ),
			'update_item' => __( 'Update Podcast' ),
			'add_new_item' => __( 'Add New Podcast' ),
			'new_item_name' => __( 'New Podcast Name' )
		),
		'show_ui' => false,
		'query_var' => true,
		'show_in_rest' => true,
		'public' => true,
		'rewrite' => true,
		'hierarchical' => true,
	)
);

register_taxonomy( 'column',
	array('post', 'map', 'edtalk', 'flash-cards', 'reach-nc-poll', 'reach-question', ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Series' ),
			'singular_name' => __( 'Series' ),
			'search_items' =>  __( 'Search Series' ),
			'all_items' => __( 'All Series' ),
			'parent_item' => __( 'Parent Series' ),
			'parent_item_colon' => __( 'Parent Series:' ),
			'edit_item' => __( 'Edit Series' ),
			'update_item' => __( 'Update Series' ),
			'add_new_item' => __( 'Add New Series' ),
			'new_item_name' => __( 'New Series Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
		'hierarchical' => true,
	)
);

register_taxonomy( 'district-posts',
	array('post'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Districts' ),
			'singular_name' => __( 'District' ),
			'search_items' =>  __( 'Search Districts' ),
			'all_items' => __( 'All Districts' ),
			'parent_item' => __( 'Parent District' ),
			'parent_item_colon' => __( 'Parent District:' ),
			'edit_item' => __( 'Edit District' ),
			'update_item' => __( 'Update District' ),
			'add_new_item' => __( 'Add New District' ),
			'new_item_name' => __( 'New District Name' )
		),
		'show_ui' => true,
		'rewrite' => 'district-posts',
		'show_in_rest' => true,
	)
);

register_taxonomy( 'community-college-posts',
	array('post'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Community Colleges' ),
			'singular_name' => __( 'Community College' ),
			'search_items' =>  __( 'Search Community Colleges' ),
			'all_items' => __( 'All Community Colleges' ),
			'parent_item' => __( 'Parent Community College' ),
			'parent_item_colon' => __( 'Parent Community College:' ),
			'edit_item' => __( 'Edit Community College' ),
			'update_item' => __( 'Update Community College' ),
			'add_new_item' => __( 'Add New Community College' ),
			'new_item_name' => __( 'New Community College Name' )
		),
		'show_ui' => true,
		'rewrite' => 'community-college-posts',
		'show_in_rest' => true,
	)
);


register_taxonomy( 'grants',
	array('post'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Grants' ),
			'singular_name' => __( 'Grant' ),
			'search_items' =>  __( 'Search Grants' ),
			'all_items' => __( 'All Grants' ),
			'parent_item' => __( 'Parent Grant' ),
			'parent_item_colon' => __( 'Parent Grant:' ),
			'edit_item' => __( 'Edit Grant' ),
			'update_item' => __( 'Update Grant' ),
			'add_new_item' => __( 'Add New Grant' ),
			'new_item_name' => __( 'New Grant Name' )
		),
		'show_ui' => true,
		'rewrite' => 'grants-posts',
		'show_in_rest' => true,
	)
);

register_taxonomy( 'map-category',
	array('map'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Map Categories' ),
			'singular_name' => __( 'Map Category' ),
			'search_items' =>  __( 'Search Map Categories' ),
			'all_items' => __( 'All Map Categories' ),
			'parent_item' => __( 'Parent Map Category' ),
			'parent_item_colon' => __( 'Parent Map Category:' ),
			'edit_item' => __( 'Edit Map Category' ),
			'update_item' => __( 'Update Map Category' ),
			'add_new_item' => __( 'Add New Map Category' ),
			'new_item_name' => __( 'New Map Category Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
	)
);

register_taxonomy( 'map-column',
	array('map'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true it acts like categories */
		'labels' => array(
			'name' => __( 'Map Columns' ),
			'singular_name' => __( 'Map Column' ),
			'search_items' =>  __( 'Search Map Column' ),
			'all_items' => __( 'All Map Column' ),
			'parent_item' => __( 'Parent Map Column' ),
			'parent_item_colon' => __( 'Parent Map Column:' ),
			'edit_item' => __( 'Edit Map Column' ),
			'update_item' => __( 'Update Map Column' ),
			'add_new_item' => __( 'Add New Map Column' ),
			'new_item_name' => __( 'New Map Column Name' )
		),
		'show_ui' => true,
		'query_var' => true,
		'show_in_rest' => true,
	)
);


/**
 * Modify queries on specific templates
 */
function pre_get_posts($query) {
	if (is_admin()) { return; }

	// all archives should hide anything tagged with 'hide from archives'
	if ($query->is_author() || $query->is_category() || $query->is_date()) {
		$tax_query = array(
			array(
				'taxonomy' => 'appearance',
				'field' => 'slug',
				'terms' => 'hide-from-archives',
				'operator' => 'NOT IN'
			)
		);
		$query->set('tax_query', $tax_query);
	}

	// resource-type should query the resource CPT
	if ($query->is_tax('resource-type')) {
		$query->set('post_type', 'resource');
	}

	// bill-type and session taxonomies should query bills and show them in menu order
	if ($query->is_tax('bill-type') || $query->is_tax('session')) {
		$query->set('post_type', 'bill');
		$query->set('orderby', 'menu_order');
		$query->set('order', 'ASC');
		$query->set('posts_per_page', -1);
	}

	// author archives should query posts and maps
	if ($query->is_author()) {
		$query->set('post_type', array('post', 'map', 'edtalk', 'reach-nc-poll', 'reach-question'));
	}

	// 1868 category archives should show in asc order
	if ($query->is_category('1868-constitutional-convention')) {
		$query->set('order' , 'ASC');
	}

	// include ednews podcasts in category archives
	if ($query->is_category() && $query->is_main_query()) {
		$query->set('post_type', ['post', 'edtalk']);
	}

	// date archives should show extra post types
	if ($query->is_date()) {
		$query->set('post_type', ['post', 'map', 'ednews', 'edtalk', 'flash-cards', 'wrapup','reach-nc-poll', 'reach-question']);
		$tax_query = array(
			array(
				'taxonomy' => 'appearance',
				'field' => 'slug',
				'terms' => 'hide-from-archives',
				'operator' => 'NOT IN'
			)
		);
		$query->set('tax_query', $tax_query);
		$query->set('posts_per_page', '-1');
		$query->set('nopaging', true);
	}

	// additional date archive for taxonomy archives
	if ($query->is_tax() || $query->is_category()) {
		if (isset($_GET['date'])) {
			if ($query->get('fields') != 'ids') {
				$date_array = explode('/', $_GET['date']);
				$date_query = array(
					array(
						'year' => $date_array[0],
						'month' => $date_array[1],
						'day' => $date_array[2]
					)
				);
				$query->set('date_query', $date_query);
			}
		}
	}
}
add_action('pre_get_posts', __NAMESPACE__ . '\\pre_get_posts');

/**
 * Add rewrite rules for map and edtalk permalinks
 * http://shibashake.com/wordpress-theme/custom-post-type-permalinks-part-2
 *
 */
function rewrite_rules() {
	global $wp_rewrite;

	$map_permalink_structure = '/map/%year%/%monthnum%/%map%';
	$wp_rewrite->add_rewrite_tag("%map%", '([^/]+)', "map=");
	$wp_rewrite->add_permastruct('map', $map_permalink_structure, false);

	$edtalk_permalink_structure = '/edtalk/%year%/%monthnum%/%day%/%edtalk%';
	$wp_rewrite->add_rewrite_tag("%edtalk%", '([^/]+)', "edtalk=");
	$wp_rewrite->add_permastruct('edtalk', $edtalk_permalink_structure, false);
}
add_action('init', __NAMESPACE__ . '\\rewrite_rules');

// Translate custom post type permalink tokens (%year% and %monthnum%)
// Adapted from get_permalink function in wp-includes/link-template.php
function replace_permalink_tokens($permalink, $post_id, $leavename) {
  $post = get_post($post_id);
  $rewritecode = array(
    '%year%',
    '%monthnum%',
    '%day%',
    '%hour%',
    '%minute%',
    '%second%',
    $leavename? '' : '%postname%',
    '%post_id%',
    '%category%',
    '%author%',
    $leavename? '' : '%pagename%',
  );

  if ( '' != $permalink && !in_array($post->post_status, array('draft', 'pending', 'auto-draft')) ) {
      $unixtime = strtotime($post->post_date);

      $category = '';
      if ( strpos($permalink, '%category%') !== false ) {
          $cats = get_the_category($post->ID);
          if ( $cats ) {
              usort($cats, '_usort_terms_by_ID'); // order by ID
              $category = $cats[0]->slug;
              if ( $parent = $cats[0]->parent )
                  $category = get_category_parents($parent, false, '/', true) . $category;
          }
          // show default category in permalinks, without
          // having to assign it explicitly
          if ( empty($category) ) {
              $default_category = get_category( get_option( 'default_category' ) );
              $category = is_wp_error( $default_category ) ? '' : $default_category->slug;
          }
      }

      $author = '';
      if ( strpos($permalink, '%author%') !== false ) {
          $authordata = get_userdata($post->post_author);
          $author = $authordata->user_nicename;
      }

      $date = explode(" ",date('Y m d H i s', $unixtime));
      $rewritereplace =
      array(
          $date[0],
          $date[1],
          $date[2],
          $date[3],
          $date[4],
          $date[5],
          $post->post_name,
          $post->ID,
          $category,
          $author,
          $post->post_name,
      );
      $permalink = str_replace($rewritecode, $rewritereplace, $permalink);
  } else { // if they're not using the fancy permalink option
  }
  return $permalink;
}
add_filter('post_type_link', __NAMESPACE__ . '\\replace_permalink_tokens', 10, 3);

/*
function addTitleFieldToCat(){
    $cat_title = get_term_meta($_GET['tag_ID'], '_pagetitle', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_page_title"><?php _e('Category Page Title'); ?></label></th>
        <td>
				<input name="option_name" id="cat_title" type="checkbox" value="1" <?php checked( '1', get_option( 'option_name' ) ); ?> />
        <!-- <input type="checkbox" name="Issue" id="cat_title" value="<?php //echo $cat_title ?>"><br />
            <span class="description"><?php //_e('Title for the Category '); ?></span> -->
        </td>
    </tr>
    <?php

}
add_action ( 'edit_category_form_fields', 'addTitleFieldToCat');

function saveCategoryFields() {
    if ( isset( $_POST['cat_title'] ) ) {
        update_term_meta($_POST['tag_ID'], '_pagetitle', $_POST['cat_title']);
    }
}
add_action ( 'edited_category', 'saveCategoryFields');
*/
