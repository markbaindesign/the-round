<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">
	<div id="entry-edit-region">	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php if ( is_front_page() ) { ?>
							<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php } else { ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php } ?>

						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
							<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-content -->
					</div><!-- #post-## -->


				<?php endwhile; // end of the loop. ?>
				
				
		</div>
		<!-- latest-posts-block -->
			<?php 
				$args = array(
				'posts_per_page' => 1,
				'post__in'  => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => 1
				);
				query_posts( $args );
			?>
			<?php 
				if(have_posts()) : while(have_posts()) : the_post(); 
			?>
			<div <?php post_class(); ?>>
				<div class="spacer"></div>
				<?php endwhile; endif; ?>
			</div>
	</div>
</div>

<?php get_footer(); ?>
