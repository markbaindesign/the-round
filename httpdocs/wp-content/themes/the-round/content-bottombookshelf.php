<div id="bottom-bookshelf">	
	<div id="recent-resources">	
		<h2>Recent Titles</h2>
		<?php $loop = new WP_Query( array( 
			'post_type' => 'resource',
			'post__not_in' => array($post->ID),
			'posts_per_page' => 5
			) ); ?>  
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="recent-resources-content">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Go to <?php the_title(); ?>">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(array( 100,100 )); } ?></a>
			<!-- <div class="resource-meta">
				<p class="resource-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</p>
				<p class="resource-author">
					<?php echo get_the_term_list( get_the_ID(), 'creatives', "By ", ", " ) ?>
				</p>
			</div> -->
		</div>
		<?php endwhile; ?>	
	</div>
<div class="spacer"></div>
</div>
