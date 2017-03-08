<div id="testimonial" class="title-meta">
	<div class="testimonial-text">
		<div class="testimonial-image">
			<?php $image = get_post_meta($post->ID, 'testimonial-image', true); ?>
			<img src="<?php echo $image; ?>" alt="" width="50" height="50"/>
			<p class="test-name">
				<?php echo get_post_meta($post->ID, 'testimonial-name-1', true); ?>
			</p>
		</div>
		<?php echo get_post_meta($post->ID, 'testimonial-1', true); ?>
	</div>
</div>
<div class="spacer"></div>