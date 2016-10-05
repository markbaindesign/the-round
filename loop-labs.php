 

<?php if ( have_posts() ) : ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="post_home"><!-- wordpress class - leave it be -->
	<div id="nav-above" class="navigation">
		<div class="next-post"
			<?php next_post('% &rarr; ', '', 'yes'); ?>
		</div>
		<div class="previous-post">
			<?php previous_post('&larr; %', '', 'yes'); ?>
		</div>
	</div>
	<div id="content-block">
		<div id="textual-content-block">
			<div id="resource-image" class="floatright">
				<?php if ( has_post_thumbnail() ) { 
					the_post_thumbnail('labs-image'); } 
				?>
			</div> 
			<div id="title-block" >
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
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
	
		<div id="resource-content">
			<div id="custom-post-the-content" >
				<?php the_content(); ?>
			</div>
		</div>

		<div class="spacer"></div>
	
		
			<?php endwhile; ?>
				<?php endif; ?>
		</div>
	</div>
	<div class="spacer">
	</div>





	
	<?php comments_template( '', true ); ?>
</div>

