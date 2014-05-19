<?php get_header(); ?>
<div id="container">
	<div id="content" role="main">			<h2 id="blog-title">Titles</h2>

		<div id="recent-resources" class="clearfix masonrycontainer">	
			
			<?php 
				$loop = new WP_Query( array( 
					'post_type' => 'resource',
					'posts_per_page' => 15
				) ); 
			?> 
			
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
				<div class="recent-resources-content clearfix">
					
					<div class="resource-thumb">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ) { 
							  the_post_thumbnail('labs-thumb');
							} 
							?>
						</a>
					</div>
					
					<div class="resource-meta">
						<p class="resource-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
						
						<p class="resource-author">
							By <a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative', true); ?></a>
							
							<?php if ( get_post_meta($post->ID, 'creative2', true)) {?>
								& <a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative2-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative2', true); ?></a>
							<?php } ?>
						</p>
						
					</div><!-- .resource-meta -->
				</div>

			<?php endwhile; ?>
			<div class="spacer"></div>	
		</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
