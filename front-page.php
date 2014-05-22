<?php get_header(); ?>
<div id="primary">
	<div id="content" role="main">			
		<div class="hero clearfix">
					<h1><?php bloginfo( 'description' ); ?><h1>
			</div><!-- .hero -->
		<div class="latest-titles clearfix">
			<?php get_template_part( 'content', 'latest-titles' ); ?>
		</div><!-- .latest-titles -->
		<div class="latest-blog-posts  clearfix">
			<?php get_template_part( 'content', 'latest-blog-posts' ); ?>
		</div><!-- .latest-blog-posts -->		
		<div class="latest-creatives clearfix">
			<?php get_template_part( 'content', 'latest-creatives' ); ?>
		</div><!-- .latest-blogs -->		

	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
