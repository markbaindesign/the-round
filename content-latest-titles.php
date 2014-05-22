	<?php 
				$loop = new WP_Query( array( 
					'post_type' => 'resource',
					'posts_per_page' => 3
				) ); 
			?> 
			<h3>Latest titles</h3>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
				<div>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ) { 
							  the_post_thumbnail('labs-image');
							} 
							?>
						</a>
					</div>

			<?php endwhile; ?>
			<a href="<?php bloginfo( 'url' ); ?>/resources/" class="readmore">See all titles &rarr;</a>
