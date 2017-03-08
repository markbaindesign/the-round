	<div class="archive-item clearfix">
			<a class="image" href="<?php 
				the_permalink() ?>" title="<?php the_title(); ?>"><?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail('creatives-image');
						} 
				?>
			</a>

		<div class="archive-item-content">
			<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>	
			<?php the_excerpt(); ?>
	</div>
</div>
