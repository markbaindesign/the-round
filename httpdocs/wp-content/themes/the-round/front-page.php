<?php get_header(); ?>
<div id="primary">
	<div id="content" role="main">			
		<div class="hero clearfix">
		<?php while ( have_posts() ) : the_post(); ?>			
			<?php the_content(); ?>			
		<?php endwhile; ?>
		</div><!-- .hero -->
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
