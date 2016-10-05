<?php get_header(); ?>
<div id="primary">
	<div id="content" role="main">
		<div id="recent-resources">	
			 <h2 id="blog-title">Labs</h2>
			 <div id="more-info">
				<p>
					<a href="<?php echo home_url(); ?>/about-labs/" title="Read more about the 'labs' section of the round">What is <i>labs</i>?</a>
				</p>
			</div>
			<?php $loop = new WP_Query( array( 
				'post_type' => 'labs',
				'posts_per_page' => 15
				) ); 
			?> 
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="recent-resources-content">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
						<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  the_post_thumbnail('labs-thumb');
						} 
						?>
					</a>
					<div class="resource-meta">
						<p class="resource-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
						<p class="resource-author">
							<a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative', true); ?></a>
							
							<?php if ( get_post_meta($post->ID, 'creative2', true)) {?>
								| <a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative2-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative2', true); ?></a>
							<?php } ?>

							<?php if ( get_post_meta($post->ID, 'creative3', true)) {?>
								| <a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative3-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative3', true); ?></a>
							<?php } ?>
						</p>
					</div>
				</div>
			<?php endwhile; ?>
			<div class="spacer"></div>	
			
			
		</div>
	</div>
</div>
 <?php get_sidebar(); ?>
<?php get_footer(); ?>
