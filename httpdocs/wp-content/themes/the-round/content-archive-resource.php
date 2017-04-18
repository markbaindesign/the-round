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
			<a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative', true); ?></a>
			
			<?php if ( get_post_meta($post->ID, 'creative2', true)) {?>
				| <a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative2-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative2', true); ?></a>
			<?php } ?>

			<?php if ( get_post_meta($post->ID, 'creative3', true)) {?>
				| <a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative3-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative3', true); ?></a>
			<?php } ?>
		</p>
		
	</div><!-- .resource-meta -->
</div>