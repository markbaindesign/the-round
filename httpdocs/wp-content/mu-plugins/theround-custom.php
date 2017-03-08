<?php
/*
 * Plugin Name: The Round Custom
 * Description: Add CPTs, etc to the round
 * Version: 1.0.1
 * Author: Mark Bain
 * Author URI: http://markbaindesign.com
*/

add_action( 'init', 'mbd_theround_create_cpt_resources' );
add_action( 'init', 'mbd_theround_create_cpt_labs' );
add_action( 'init', 'mbd_theround_create_cpt_creatives' );

function mbd_theround_create_cpt_resources() {

	// Register the Resources custom post type
	
 	$labels = array(
	
		'name' => _x('Resources', 'post type general name'),
		'singular_name' => _x('Resource', 'post type singular name'),
		'add_new' => _x('Add New', 'Resource'),
		'add_new_item' => __('Add New Resource'),
		'edit_item' => __('Edit Resource'),
		'new_item' => __('New Resource'),
		'view_item' => __('View Resource '),
		'search_items' => __('Search Resources'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash')
		
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true, 
		'hierarchical' => false, 
		'menu_position' => 5, 
		'has_archive' => 'resources', 
		'supports' => array(
			'title',
			'editor',
			'comments',
			'thumbnail',
			'custom-fields'
			),
	
	);
	
	register_post_type( 'resource', $args ); 

}

function mbd_theround_create_cpt_labs() {

	// Labs
	
	$labels = array( 
	
		'name' => _x('Labs', 'post type general name'),
		'singular_name' => _x('Labs', 'post type singular name'),
		'add_new' => _x('Add New', 'Labs'),
		'add_new_item' => __('Add New Labs'),
		'edit_item' => __('Edit Labs'),
		'new_item' => __('New Labs'),
		'view_item' => __('View Labs '),
		'search_items' => __('Search Labs'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash')
	);
	
	$args = array(
		'labels' => $labels, 
		'public' => true, 
		'hierarchical' => false, 
		'menu_position' => 7, 
		'has_archive' => 'labs', 
		'supports' => array(
			'title',
			'editor',
			'comments',
			'thumbnail',
			'custom-fields'
		),
	);
	
	register_post_type( 'labs', $args );

}

function mbd_theround_create_cpt_creatives() {

	// Creatives 
	
	$labels = array( 
	
		'name' => _x('Creatives', 'post type general name'),
		'singular_name' => _x('Creatives', 'post type singular name'),
		'add_new' => _x('Add New', 'Creatives'),
		'add_new_item' => __('Add New Creatives'),
		'edit_item' => __('Edit Creatives'),
		'new_item' => __('New Creatives'),
		'view_item' => __('View Creatives '),
		'search_items' => __('Search Creatives'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash')
	);
	
	$args = array(
		'labels' => $labels, 
		'public' => true, 
		'hierarchical' => false, 
		'menu_position' => 8,
		'has_archive' => 'creatives', 
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			'excerpt'
		),
	);
	
	register_post_type( 'creatives', $args );

}

// Add the custom post types to the RSS feed
add_filter( 'request', 'mbd_theround_custom_post_feed_request' );	
	
function mbd_theround_custom_post_feed_request($qv) {

	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
	
}
