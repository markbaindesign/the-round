	<?php 
				$loop = new WP_Query( array( 
					'post_type' => 'creatives',
					'posts_per_page' => 5
				) ); 
			?> 
			<h3>Latest creatives</h3>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
				<div>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ) { 
							  the_post_thumbnail( 'creatives-image' );
							} 
							?>
						</a>
					</div>

			<?php endwhile; ?>
			<a href="<?php bloginfo( 'url' ); ?>/creatives/" class="readmore">See all &rarr;</a>
