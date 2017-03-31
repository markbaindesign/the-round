<?php
	global $post;  
 	$orig_post = $post;  
	$args = array(
	'post_type' => 'resource',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'orderby' => 'rand',
	'post__not_in' => array ($post->ID),
	); 
	
	$my_query = new wp_query( $args );
?>

<?php if ( $my_query->have_posts() ) : ?>
	<div class="suggested-titles">
		<h2>Suggested Titles</h2>
		<?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>
	    	<?php get_template_part('content-archive-resource' ); ?>
		<?php endwhile; ?>
		<?php $post = $orig_post; wp_reset_query(); ?>
		<div class="spacer"></div>
	</div><!--.suggested-titles -->

<?php endif; ?>