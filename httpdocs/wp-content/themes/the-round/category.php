<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="primary">
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
				<h1 class="entry-title"><?php
					printf( __( 'Blog Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>
				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
