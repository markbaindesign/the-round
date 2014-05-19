<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
						<!-- code for line of recent title thumbnails -->
<!-- <div id="recent-resources-small">
	<div id="more-link">
		<a href="<?php //bloginfo('url'); ?>/titles">All titles <span class="meta-nav">&rarr;</span></a>
	</div>
	 <?php //$loop = new WP_Query( array( 
		//'post_type' => 'resource',
		//'posts_per_page' => 8
		//) ); ?>  
	<?php// while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<div id="recent-resources-content-small">
		<a href="<?php// the_permalink() ?>" rel="bookmark" title="Go to <?php// the_title(); ?>"><?php// if ( has_post_thumbnail() ) { the_post_thumbnail(array( 50,50 )); } ?></a>
			<!-- <div class="resource-meta">
				<p class="resource-title"><a href="<?php// the_permalink() ?>" rel="bookmark" title="<?php// the_title_attribute(); ?>"><?php// the_title(); ?></a></p>
				<p class="resource-author"><?php// echo get_the_term_list( get_the_ID(), 'creators', "By ", ", " ) ?></p>
			</div> 
	</div>
	<?php// endwhile; ?>	
	<?php// if ($i % 6 == 0) echo '<div style="clear: both;"></div>'?> 
</div> -->
<!-- END code for line of recent title thumbnails -->
<div id="entry-edit-region">
<?php if ( have_posts() ) : ?>
				<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
				</div><!-- #entry-edit-region -->
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
