<div id="recent-resources-small">
		<div id="more-link">
			<a href="<?php bloginfo('url'); ?>/labs">All labs <span class="meta-nav">&rarr;</span></a>
		</div>	
		 <?php $loop = new WP_Query( array( 
			'post_type' => 'labs',
			'post__not_in' => array($post->ID),
			'posts_per_page' => 9
			) ); ?>  
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div id="recent-resources-content-small">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Go to <?php the_title(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(array( 50,71 )); } ?></a>
				<!--<div class="resource-meta">
					<p class="resource-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
					<p class="resource-author"><?php echo get_the_term_list( get_the_ID(), 'authors', "By ", ", " ) ?></p> 
				</div> -->
		</div>
		<?php endwhile; ?>	
		<?php if ($i % 6 == 0) echo '<div style="clear: both;"></div>'?> 
	</div>