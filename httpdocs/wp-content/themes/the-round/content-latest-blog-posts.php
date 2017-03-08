<?php 
	$loop = new WP_Query( array( 
		'post_type' => 'post',
		'posts_per_page' => 3
	) ); 
?> 
<h3>Latest blog posts</h3>
<ul>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<li>	<span>
			<?php echo get_the_date(); ?>
		</span><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'theround' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a> &rarr;</li>
	<?php endwhile; ?>
</ul>
