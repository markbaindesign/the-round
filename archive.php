<?php
/**
 * Custom template for displaying Archive, Taxonomy pages, including recent titles at top.
 
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
<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

			<h1 class="entry-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Blog Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Blog Archives: <span>%s</span>', 'twentyten' ), get_the_date( 'F Y' ) ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Blog Archives: <span>%s</span>', 'twentyten' ), get_the_date( 'Y' ) ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'twentyten' ); ?>
<?php endif; ?>
			</h1>

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archive.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'archive' );
?>
</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
