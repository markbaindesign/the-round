<?php get_header(); ?>

<?php
    query_posts(
	array(
	'post_type' => 'resources', 
	'posts_per_page' => 5
	)
	);
?>

<?php get_template_part('loop-resources');  // Loop template for portfolio (loop-portfolio.php) ?>
<?php  wp_reset_query(); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>