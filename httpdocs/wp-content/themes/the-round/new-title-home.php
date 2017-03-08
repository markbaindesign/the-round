<?php /* Template Name: New Title Home */ ?>

<?php get_header(); ?>

<div id="new-title-container">

	<div id="content" role="main">
	
		<div id="entry-edit-region">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div id="page-title">New In The Round</div>
			
			<div class="entry-content">
			
				<?php the_content(); ?>
				
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
				
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
				
			</div>
			
			<?php endwhile; ?>
			
		</div>	

	</div>		
				
</div>

<?php get_footer(); ?>
