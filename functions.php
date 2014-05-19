<?php

// error_reporting(E_ALL | E_STRICT);

// Set up

add_action( 'after_setup_theme', 'theround_theme_setup' );

// Functions
 
function theround_theme_setup() {
	
		add_action(	'wp_head', 'theround_get_favicon_from_theme_folder');
		add_action( 'wp_enqueue_scripts', 'theround_load_scripts' );
		add_action( 'after_setup_theme', 'theround_custom_logo_selection' );
		add_action( 'after_setup_theme', 'theround_remove_default_headers', 11 );
		add_action( 'init', 'theround_register_menus' );
		add_action( 'admin_head', 'theround_creatives_icons' );

		add_filter( 'wp_page_menu_args', 'theround_add_home_to_menu');
	
	// Custom Admin Interface
	
		add_action(	'login_head', 'theround_custom_login_styles');  
		add_filter('admin_footer_text', 'theround_custom_footer_admin');  

	// Custom Posts
	
		add_action('init', 'theround_register_custom_post_types');
		add_filter('request', 'theround_custom_post_feed_request');		
		
	// Images
	
		add_image_size( 'homepage-thumb', 100, 100, true ); 
		add_image_size( 'labs-thumb', 100, 141, true ); 
		add_image_size( 'small-thumb', 50, 71, true ); 
		add_image_size( 'labs-image', 250, 354, true );
		add_image_size( 'creatives-image', 100, 100, true );
		add_filter('twentyten_header_image_height','theround_header_height');
		add_filter('twentyten_header_image_width','theround_header_width');

}	
	
define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));
// Menus

function theround_register_menus() {
  
  register_nav_menus(
  
    array( 
		'mobile-menu' 			=> __( 'Mobile Header Menu' ), 
		'select-menu' 			=> 'Select Menu',
	)
	
  );
  
}

function wp_nav_menu_select( $args = array() ) {
     
    $defaults = array(
        'theme_location' => '',
        'menu_class' => 'select-menu',
    );
     
    $args = wp_parse_args( $args, $defaults );
     
    if ( ( $menu_locations = get_nav_menu_locations() ) && isset( $menu_locations[ $args['theme_location'] ] ) ) {
        $menu = wp_get_nav_menu_object( $menu_locations[ $args['theme_location'] ] );
         
        $menu_items = wp_get_nav_menu_items( $menu->term_id );
        ?>
            <select id="menu-<?php echo $args['theme_location'] ?>" class="<?php echo $args['menu_class'] ?>">
                <option value=""><?php _e( 'Menu' ); ?></option>
                <?php foreach( (array) $menu_items as $key => $menu_item ) : ?>
                    <option value="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></option>
                <?php endforeach; ?>
            </select>
        <?php
    }
     
    else {
        ?>
            <select class="menu-not-found">
                <option value=""><?php _e( 'Menu Not Found' ); ?></option>
            </select>
			
        <?php
    }
 
}

/**
 * Custom Menu Walker for Responsive Menus
 *
 * Creates a <select> menu instead of the default
 * unordered list menus.
 *
 **/

class Walker_Responsive_Menu extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
    }

    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){
      // add spacing to the title based on the depth
      $item->title = str_repeat("&nbsp;", $depth * 4).$item->title;

      parent::start_el(&$output, $item, $depth, $args);

      // no point redefining this method too, we just replace the li tag...
      $output = str_replace('<li', '<option', $output);
    }

    function end_el(&$output, $item, $depth){
      $output .= "</option>\n"; // replace closing </li> with the option tag
    }
}
 
function theround_load_scripts() {
	
	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jquery-masonry', array( 'jquery' ) );

	// Modernizer
	wp_register_script( 'jquery-modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array( 'jquery' ), TRUE);
	wp_enqueue_script( 'jquery-modernizr' );
	
	// imagesLoaded
	wp_register_script( 'imagesloaded', get_stylesheet_directory_uri() . '/js/vendor/imagesLoaded.pkgd.min.js', array( 'jquery' ), TRUE);
	wp_enqueue_script( 'imagesloaded' );
		
	wp_register_script( 'html5-shiv', get_stylesheet_directory_uri() . '/js/vendor/html5-shiv.js', array( 'jquery' ), TRUE);
	wp_enqueue_script( 'html5-shiv' );

	wp_register_script( 'responsive-nav', get_stylesheet_directory_uri() . '/js/vendor/responsive-nav.js', array( ), TRUE);
	wp_enqueue_script( 'responsive-nav' );

	// Masonry configuration	
	/*wp_register_script( 'custom-masonry', get_stylesheet_directory_uri() . '/js/custom/custom-masonry.js', array( 'jquery' ), TRUE);
    wp_enqueue_script( 'custom-masonry' );*/

	// Custom jQuery Functions	
	wp_register_script( 'custom-functions', get_stylesheet_directory_uri() . '/js/custom/functions.js', array( 'jquery' ), TRUE);
    wp_enqueue_script( 'custom-functions' );
	
	?>

		<!-- TypeKit -->
		
		<script type="text/javascript" src="http://use.typekit.com/zxe7tjh.js"></script>
	
	<?php

}

function theround_register_custom_post_types () {

	// Resources
	
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

// Styling for the custom post type icons


function theround_creatives_icons() {
    ?>
    <style type="text/css" media="screen">
		
        #menu-posts-creatives .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/light-bulb-off.png) no-repeat 6px 6px !important;
        }
	#menu-posts-creatives:hover .wp-menu-image, #menu-posts-creatives.wp-has-current-submenu .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/light-bulb.png) no-repeat 6px 6px !important;
        }
	#icon-edit.icon32-posts-creatives {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/light-bulb-32.png) no-repeat !important;
			}
			
	#menu-posts-labs .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/flask-off.png) no-repeat 6px 6px !important;
        }
	#menu-posts-labs:hover .wp-menu-image, #menu-posts-labs.wp-has-current-submenu .wp-menu-image {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/flask.png) no-repeat 6px 6px !important;
        }
	#icon-edit.icon32-posts-labs {
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/flask-off-32.png) no-repeat !important;
			}

    </style>
<?php }


function theround_show_template () {
	
	global $template;
	
	print_r($template);
	
}

function theround_header_height ($size) {
   
   return 185;

}

function theround_header_width ($size) {
   
   return 200;
   
}

function theround_remove_default_headers () {
    
	unregister_default_headers( 
	
		array(
			'berries',
			'cherryblossom',
			'concave',
			'fern',
			'forestfloor',
			'inkwell',
			'path' ,
			'sunset'
		)
		
    );

}
 
function theround_custom_logo_selection () {
 
    $theround_theme_dir =   get_bloginfo('stylesheet_directory');
    register_default_headers( array (
        'logo1' => array (
            'url' => "$theround_theme_dir/images/logo1.png",
            'thumbnail_url' => "$theround_theme_dir/images/logo1.png",
            'description' => __( 'Logo version 1', 'seconds-out' )
        ),
        'logo2' => array (
            'url' => "$theround_theme_dir/images/logo2.png",
            'thumbnail_url' => "$theround_theme_dir/images/logo2.png",
            'description' => __( 'Logo version 2', 'seconds-out' )
        ),
        'logo3' => array (
            'url' => "$theround_theme_dir/images/logo3.png",
            'thumbnail_url' => "$theround_theme_dir/images/logo3.png",
            'description' => __( 'Logo version 3', 'seconds-out' )
		),
        'logo4' => array (
            'url' => "$theround_theme_dir/images/logo4.png",
            'thumbnail_url' => "$theround_theme_dir/images/logo4.png",
            'description' => __( 'Logo version 4', 'seconds-out' )
        ),
    ));
}

function theround_get_favicon_from_theme_folder() {
	echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >';
}

function theround_add_home_to_menu( $args ) {
     
	 $args['show_home'] = true;
     
	 return $args;
	 
}

function theround_custom_login_styles () {  

	echo '<style type="text/css">h1 a { height: 180px;background: url('. get_bloginfo("stylesheet_directory") .'/images/logo3.png) no-repeat center top; }</style>';
	
	echo '<style type="text/css">body { height: 2000px;background: url('. get_bloginfo("stylesheet_directory") .'/images/double_lined.png) repeat; }</style>'; 
	
}  

function theround_custom_footer_admin () {  
  
  echo 'Created by <a href="http://design.markcbain.com">Mark Bain</a>. Powered by <a href="http://www.wordpress.org">WordPress</a>';  

}  
  
function theround_custom_post_feed_request($qv) {

	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
	
}

?>
