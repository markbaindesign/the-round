<?php

/////////////////////////////////////////////////////////////////////////////////////
//
//
// 		Show Template
//
//
/////////////////////////////////////////////////////////////////////////////////////

	//  add_action('wp_head', 'show_template'); 
	//  function show_template() {
	//  global $template;
	//  print_r($template);
	//  }

/////////////////////////////////////////////////////////////////////////////////////
//
//
// 		Error Reporting
//
//
/////////////////////////////////////////////////////////////////////////////////////

	// error_reporting(E_ALL | E_STRICT);

/////////////////////////////////////////////////////////////////////////////////////

define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));
 
// Setting up custom post types: http://coding.smashingmagazine.com/2011/06/02/how-to-build-a-media-site-on-wordpress-part-1/
add_action('init', 'register_rc', 1); // Set priority to avoid plugin conflicts
add_theme_support( 'menus' );
function register_rc() { // A unique name for our function
 	$labels = array( // Used in the WordPress admin
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
		'labels' => $labels, // Set above
		'public' => true, // Make it publicly accessible
		'hierarchical' => false, // No parents and children here
		'menu_position' => 5, // Appear right below "Posts"
		'has_archive' => 'resources', // Activate the archive
		'supports' => array('title','editor','comments','thumbnail','custom-fields'),
		'taxonomies' => array('creators','topics','formats')
	);
	register_post_type( 'resource', $args ); // Create the post type, use options above
}
// End custom post types



/////////////////////////////////////////////////////////////////////////////////////
//
//
// 		CUSTOM TAXONOMIES
//
//
/////////////////////////////////////////////////////////////////////////////////////
//
//
// 			-- Creatives Taxonomy
//
//
/////////////////////////////////////////////////////////////////////////////////////


$labels_creatives = array(
	'name' => _x( 'Creatives', 'taxonomy general name' ),
	'singular_name' => _x( 'Creative', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Creatives' ),
	'popular_items' => __( 'Popular Creatives' ),
	'all_items' => __( 'All Creatives' ),
	'edit_item' => __( 'Edit Creative' ),
	'update_item' => __( 'Update Creative' ),
	'add_new_item' => __( 'Add New Creative' ),
	'new_item_name' => __( 'New Creative Name' ),
	'separate_items_with_commas' => __( 'Separate multiple Creatives with commas' ),
	'add_or_remove_items' => __( 'Add or remove Creatives' ),
	'choose_from_most_used' => __( 'Choose from the most prolific Creatives' ),
); 

register_taxonomy(
	'creatives', 
	array( 'resource' ), 
	array(
		'rewrite' => array( 
			'slug' => 'creative'
			),
		'labels' => $labels_creatives
		)
	);
	
/////////////////////////////////////////////////////////////////////////////////////
//
//
// 		Thumbnails
//
//
/////////////////////////////////////////////////////////////////////////////////////

add_theme_support('post-thumbnails');

add_image_size( 'homepage-thumb', 100, 100, true ); 

add_image_size( 'labs-thumb', 100, 141, true ); 

add_image_size( 'small-thumb', 50, 71, true ); 

add_image_size( 'labs-image', 250, 354, true );

add_action("admin_init", "admin_init");
 
function admin_init(){
}

// SETS HEADER SIZE (LOGO)
function brick_header_height($size){
   return 185;
}
function brick_header_width($size){
   return 200;
}
add_filter('twentyten_header_image_height','brick_header_height');
add_filter('twentyten_header_image_width','brick_header_width');

// de-register default header images
function jorbin_remove_twenty_ten_headers(){
    unregister_default_headers( array(
        'berries',
        'cherryblossom',
        'concave',
        'fern',
        'forestfloor',
        'inkwell',
        'path' ,
        'sunset')
    );
}
 
add_action( 'after_setup_theme', 'jorbin_remove_twenty_ten_headers', 11 );
// END de-register default header images

add_action( 'after_setup_theme', 'thirtyten_setup' );
function thirtyten_setup(){
 
    $thirty_ten_dir =   get_bloginfo('stylesheet_directory');
    register_default_headers( array (
        'logo1' => array (
            'url' => "$thirty_ten_dir/images/logo1.png",
            'thumbnail_url' => "$thirty_ten_dir/images/logo1.png",
            'description' => __( 'Logo version 1', 'seconds-out' )
        ),
        'logo2' => array (
            'url' => "$thirty_ten_dir/images/logo2.png",
            'thumbnail_url' => "$thirty_ten_dir/images/logo2.png",
            'description' => __( 'Logo version 2', 'seconds-out' )
        ),
        'logo3' => array (
            'url' => "$thirty_ten_dir/images/logo3.png",
            'thumbnail_url' => "$thirty_ten_dir/images/logo3.png",
            'description' => __( 'Logo version 3', 'seconds-out' )
		),
        'logo4' => array (
            'url' => "$thirty_ten_dir/images/logo4.png",
            'thumbnail_url' => "$thirty_ten_dir/images/logo4.png",
            'description' => __( 'Logo version 4', 'seconds-out' )
        ),
    ));
}

// ADDS FAVICON FROM IMAGES FOLDER 
// SOURCE: HTTP://WORDPRESS.ORG/SUPPORT/TOPIC/INSERTING-A-FAVICON-IN-TWENTY-TEN-CHILD-THEME
function add_theme_favicon() {
echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >';
}
add_action('wp_head', 'add_theme_favicon');

//  Custom LABS post type

// http://coding.smashingmagazine.com/2011/06/02/how-to-build-a-media-site-on-wordpress-part-1/

add_action('init', 'register_labs', 1); // Set priority to avoid plugin conflicts
add_theme_support( 'menus' );
function register_labs() { // A unique name for our function
 	$labels = array( // Used in the WordPress admin
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
		'labels' => $labels, // Set above
		'public' => true, // Make it publicly accessible
		'hierarchical' => false, // No parents and children here
		'menu_position' => 7, 
		'has_archive' => 'resources', // Activate the archive
		'supports' => array('title','editor','comments','thumbnail','custom-fields'),
		'taxonomies' => array('creatives','topics','formats')
	);
	register_post_type( 'labs', $args ); // Create the post type, use options above
}
// End custom post types

// Set up custom taxonomies on custom posts 


/////////////////////////////////////////////////////////////////////////////////////
//
//
// 		Custom Log-in Screen
//
//
/////////////////////////////////////////////////////////////////////////////////////


function login_styles() {  
echo '<style type="text/css">h1 a { height: 180px;background: url('. get_bloginfo("stylesheet_directory") .'/images/logo3.png) no-repeat center top; }</style>';  
echo '<style type="text/css">body { height: 2000px;background: url('. get_bloginfo("stylesheet_directory") .'/images/double_lined.png) repeat; }</style>';  
}  

add_action('login_head', 'login_styles');  

function modify_footer_admin () {  
  echo 'Created by <a href="http://design.markcbain.com">Mark Bain</a>. Powered by <a href="http://www.wordpress.org">WordPress</a>';  
}  
  
add_filter('admin_footer_text', 'modify_footer_admin');  

// add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );  

 // adds custom posts to main rss feed
 function myfeed_request($qv) {
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'myfeed_request');
// end
?>