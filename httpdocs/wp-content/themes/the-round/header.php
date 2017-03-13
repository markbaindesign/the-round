<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if lt IE 8]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<title>
	<?php
	
		global $page, $paged;

		wp_title( '|', true, 'right' );

		bloginfo( 'name' );

		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
			
	?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1" >

<link rel="apple-touch-icon" href="/apple-touch-icon.png"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
</head>
<body <?php body_class(); ?>>

<div id="fb-root"></div>



<div id="wrapper" class="hfeed clearfix">

	<div id="header" class="clearfix">
		
		<div id="site-title">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<h2 class="visuallyhidden">the round</h2></a>
		</div>

		<div id="custom-menu-toggle" >
			<a href="#nav" id="custom-menu-toggle-link" aria-hidden="false"><h2 class="visuallyhidden">menu</h2></a>
		</div>

			<?php wp_nav_menu( array( 
				'menu' => 'Header', 
				'container' => 'nav',
				'container_class' => 'nav-collapse navigation' ) 
			); ?>


					

			

			<div id="social-media-block">
				<ul>
					<li id="twitter"><a href="http://twitter.com/#!/wetheround" title="Follow The Round on Twitter"><i class="fa fa-twitter"></i> <span class="visuallyhidden">Twitter</span></a></li>
					<li id="facebook"><a href="http://www.facebook.com/pages/The-round/196089150427646" title="Befriend The Round on Facebook"><i class="fa fa-facebook"></i> <span class="visuallyhidden">Facebook</span></a></li>
				</ul>	
			</div><!-- #social-media-block -->
			

	</div><!-- #header -->
<main>
