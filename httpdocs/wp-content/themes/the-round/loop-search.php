<?php
/**
 * Custom loop-index
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>




	<div id="entry-edit-region">	
<h2 id="blog-title" ><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h2>	

<?php /* If there are no posts to display, such as an empty archive page */ ?>

<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<!-- presents a simple list of blog posts by date -->
<?php while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div id="post-list-date" class="post-list">
			<?php echo get_the_date(); ?>
		</div>
		<div id="post-list-title" class="post-list">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			<?php the_excerpt(); ?>
		</div>
	</div><!-- #post-## -->
	<div class="spacer"></div>
<?php endwhile; // End the loop. Whew. ?>
</div>
			<?php wp_pagenavi(); ?>
