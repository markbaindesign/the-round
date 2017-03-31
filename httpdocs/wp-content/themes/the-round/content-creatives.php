<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
<div class="entry-content clearfix">
						<div class="creative-featured-image" ><?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail('creatives-image');
						} 
?></div>

						<?php the_content(); ?>
						<div class="clearfix"></div>
						<?php
							/**
							 * Show the connected Titles
							 */

							$post_type = get_post_type();
							$connected_type = 'creatives_to_titles';
								
							$connected_posts = new WP_Query( array( // Find connected pages
								'connected_type' => $connected_type,
								'connected_items' => $post,
								'nopaging' => true,
								'post__not_in' => get_option("sticky_posts"),
							) ); 
						?>
						<?php if ( $connected_posts->have_posts() ) : ?>
							<div class="connect-titles clearfix">
								<h2>Titles</h2>
									<?php while ( $connected_posts->have_posts() ) : $connected_posts->the_post(); 
										$post_link = get_the_permalink();
										$post_title = get_the_title();
									?>
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
									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
							</div><!-- .connect-titles -->
						<?php endif; ?>
					</div><!-- .entry-content -->
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">

						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->


<?php endwhile; // end of the loop. ?>
