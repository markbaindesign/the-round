<?php get_header(); ?>
<div id="primary">

			<div id="content" role="main">
						<h1><?php printf( __( 'Author Archives: %s', 'twentyeleven' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?>
<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) : ?>
				<div id="author-info">
					<div id="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 60 ) ); ?>
					</div><!-- #author-avatar -->
					<div id="author-description">
						<h2><?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?></h2>
						<?php the_author_meta( 'description' ); ?>
					</div><!-- #author-description	-->
				</div><!-- #entry-author-info -->
				<?php endif; ?></h1>

			<?php if ( have_posts() ) : ?>
			
				<?php twentyeleven_content_nav( 'nav-above' ); ?>
				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'home'); ?>

				<?php endwhile; ?>

				<div class="entry-content"><?php twentyeleven_content_nav( 'nav-below' ); ?></div>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
			</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>