<?php get_header(); ?>
	<div id="primary">
		<div id="content" role="main">


	<?php 
				// Custom query to display creatives in random order
				$args = array(
					'post_type' => 'creatives',
					'orderby' => 'post_title',
					'order' => 'ASC',
					'paged' => $paged
				);

				$query = new WP_Query( $args );

				if ( $query->have_posts() ) : ?>
					<header class="entry-header">
						<h1 class="entry-title">Creatives</h1>
				</header><!-- .entry-header -->
		<?php 
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'content', 'archive-creatives' );
			}
			wp_reset_postdata();
		?>



			<?php wp_pagenavi(); ?>
			<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>				
			<?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
