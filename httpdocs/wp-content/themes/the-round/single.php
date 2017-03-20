<?php get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
			<?php theround_defunct_blog(); ?>
			<?php	get_template_part( 'loop', 'single' );
			?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>