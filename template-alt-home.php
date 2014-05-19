<?php
/*

		Template Name: 			Alt Home

*/

?>
<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">
	
	<div id="recent-resources">	
		 <h2 id="blog-title">Available titles</h2>
		<?php $loop = new WP_Query( array( 
			'post_type' => 'resource',
			'posts_per_page' => 15
			) ); ?> <!-- Custom Post Loop -->
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="recent-resources-content">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				  the_post_thumbnail('labs-thumb');
				} 
				?>
			</a>
			<div class="resource-meta">
				<p class="resource-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				<p class="resource-author"><?php echo get_the_term_list( get_the_ID(), 'creatives', "By ", ", " ) ?></p>
			</div>
		</div>
		<?php endwhile; ?>	
	<div class="spacer"></div>	
	</div>
	
	
		<!-- latest-posts-block -->
		<h2 class="entry-title" >Latest blog posts
			<span id="rss-feed"><a href="<?php bloginfo('rss2_url'); ?>" title="Get updates from The Round by RSS"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss2.png" /></a></span>
		</h2>
		<?php 
			$args = array(
			'posts_per_page' => 1,
			'post__in'  => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' => 1
			);
			query_posts( $args );
		?>
		<?php 
			if(have_posts()) : while(have_posts()) : the_post(); 
		?>
			<div id="latest-post">
				<div id="latest-post-excerpt">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Go to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'homepage-thumb' ); } ?></a>  <span id="latest-post-meta"><?php the_date() ?> (<?php comments_number() ?>)</span>
					<?php the_excerpt(); ?>
				</div>
			</div>
			<div class="spacer"></div>
			<?php endwhile; endif; ?>

	
		<?php
		
/////////////////////////////////////////////////////////////////////////////////////
//
//
// 		"Coming soon in Labs"
//
//
/////////////////////////////////////////////////////////////////////////////////////

		?>
		<div id="coming-soon-in-labs">
			<h3>Currently in Labs</h3>
			<div id="more-info">
				<p><a href="<?php echo home_url(); ?>/about-labs/" title="Read more about the 'labs' section of the round">What is <i>labs</i>?</a>
				<p>
			</div>

			<?php $loop = new WP_Query( array( 
				'post_type' => 'labs',
				'posts_per_page' => 15
				) ); ?> 
					
			<!-- Custom Post Loop -->
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="recent-resources-content">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
						<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  the_post_thumbnail('small-thumb');
						} 
						?>
					</a>
					
					<div class="resource-meta">
						<p class="resource-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						<p class="resource-author"><?php echo get_the_term_list( get_the_ID(), 'creatives', "By ", ", " ) ?></p>
					</div>
					
				</div>
			<?php endwhile; ?>	
		</div>
	</div>
</div>
 <?php get_sidebar(); ?>
<?php get_footer(); ?>
