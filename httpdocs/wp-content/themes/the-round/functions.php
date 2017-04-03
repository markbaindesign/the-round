<?php

// error_reporting(E_ALL | E_STRICT);

/**
 * Custom comment.
 */
require get_template_directory() . '/lib/inc/custom-comment.php';

/**
 * Load bundled Advanced Custom Fields plugin.
 */
require get_template_directory() . '/lib/inc/acf-bundled.php';

// Set up

add_action( 'init', 'theround_theme_setup' );
add_action( 'widgets_init', 'theround_widgets_init' );

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


		
	// Images
set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
	
		add_image_size( 'homepage-thumb', 100, 100, true ); 
		add_image_size( 'labs-thumb', 100, 141, true ); 
		add_image_size( 'small-thumb', 50, 71, true ); 
		add_image_size( 'labs-image', 250, 354, true );
		add_image_size( 'creatives-image', 100, 100, true );
		add_filter('twentyten_header_image_height','theround_header_height');
		add_filter('twentyten_header_image_width','theround_header_width');

}	

	// Theme support
	add_theme_support( 'post-thumbnails' );


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

/**
 * Register Widget Areas
 */
function theround_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', '_mbbasetheme' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

}

function theround_load_scripts() {
	
	if ( !is_admin() ) {
		
		wp_enqueue_script( 'jquery' );

		// Typekit script 
		wp_enqueue_script( 'mbdtheround78-typekit', '//use.typekit.net/zxe7tjh.js');

		// Custom scripts
		wp_enqueue_script( 'customplugins', get_stylesheet_directory_uri() . '/assets/js/plugins.min.js', array(), NULL, true );
		wp_enqueue_script( 'customscripts', get_stylesheet_directory_uri() . '/assets/js/main.min.js', array(), NULL, true );
	}

}

/**
 * Add Typekit Webfonts Inline Script
 */	
function mbdtheround78_typekit_inline() {
	
	/* Conditionally loads the Typekit script inline if fonts are enqueued */
	
	if ( wp_script_is( 'mbdround-typekit', 'done' ) ) { 
		echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>'; 
	}
}

	// Typekit Webfonts Inline Script
	add_action( 'wp_head', 'mbdtheround78_typekit_inline' );



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
  

if ( ! function_exists( 'theround_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function theround_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', '_mbbasetheme' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

//	Post meta ( Categories/Tags/etc. )

function theround_post_meta() {

	$categories_list = get_the_category_list( __( ', ', 'mbdmaster' ) );
	$tag_list = get_the_tag_list( '', __( ', ', 'mbdmaster' ) );

	if ( $categories_list || $tag_list ) {
		echo '<div class="post-meta">';
	}

		if ( $categories_list ) {
			echo '<div class="categories-links"><h4>Categories</h4> ' . $categories_list . '</div>';
		}

		if ( $tag_list ) {
			echo '<div class="tags-links"><h4>Tags</h4> ' . $tag_list . '</div>';
		}
	
	if ( $categories_list || $tag_list ) {
		echo '</div>';
	}

}

function theround_defunct_blog() {
	?>
		<div class="card">
			<header><h2>The round blog</h2></header>
			<div class="subtitle">23rd September, 2011 &mdash; 30th July, 2015</div>
			<p>We began the round in 2011 with the clear idea that we wanted to release innovative, different and cheap ebooks for language teachers. And for the years following our launch, that&apos;s where we focused most of our energies. At first we also decided to keep a blog, where we would share our mission statement, announcements about new titles and details about our journey. But as the years went by, we found ourselves neglecting this part of the site more and more.</p>
			<p>There are still some interesting posts in there for anyone interested in self-publishing or finding out more about how the round began. However, we will no longer be providing any updates until further notice.</p>
			<p>Thanks!</p>
		</div>
	<?php
}