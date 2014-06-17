<?php if ( have_posts() ) : ?>
    <?php $i = 0; ?>
    <?php while ( have_posts() ) : the_post(); $i++; ?>
<div class="post_home"><!----- wordpress class - leave it be ----->
	<div id="nav-above" class="navigation">
		<div class="next-post">
			<?php next_post('% &rarr; ', '', 'yes'); ?>
		</div>
		<div class="previous-post">
			<?php previous_post('&larr; %', '', 'yes'); ?>
		</div>
	</div>
	<div id="content-block">
	
	<div id="textual-content-block">
		<div id="resource-image" class="floatright">
			
			<a href="#purchase-options" title="Go to purchase options&nbsp;&darr;"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(array( 250,354 )); } ?></a>
		</div>
		<div id="title-block" >
			<h2>
				<a href="<?php the_permalink() ?>" ><?php the_title(); ?></a>
			</h2>
				
						<p class="resource-author">
							By <a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative', true); ?></a>
							
							<?php if ( get_post_meta($post->ID, 'creative2', true)) {?>
								& <a href="<?php bloginfo('url'); ?>/creatives/<?php echo get_post_meta($post->ID, 'creative2-slug', true); ?>"><?php echo get_post_meta($post->ID, 'creative2', true); ?></a>
							<?php } ?>
						</p>
				
				<?php // get_template_part( 'content', 'testimonial'); ?>
				
				<?php if( get_post_meta($post->ID, 'price-pounds', true)|| get_post_meta($post->ID, 'price-euros', true)||get_post_meta($post->ID, 'price-dollars', true))   { ?>

					<div id="prices">
						<ul>
							<li id="title">Guide price</li>
							
							<?php if(get_post_meta($post->ID, 'price-pounds', true)) { ?>
								<li>&pound;<?php echo get_post_meta($post->ID, 'price-pounds', true); ?></li>
								
							<?php } ?>
							
							<?php if(get_post_meta($post->ID, 'price-euros', true)) { ?>
									
								<li>&euro;<?php echo get_post_meta($post->ID, 'price-euros', true); ?></li>
							<?php } ?>
							
							<?php if(get_post_meta($post->ID, 'price-dollars', true)) { ?>
								<li>&dollar;<?php echo get_post_meta($post->ID, 'price-dollars', true); ?></li>
							<?php } ?>
							
							<?php if(get_post_meta($post->ID, 'price-yen', true)) { ?>
								<li>&yen;<?php echo get_post_meta($post->ID, 'price-yen', true); ?></li>
							<?php } ?>

						</ul>
						<span style="font-size: 12px;padding-top: 5px;">These prices can change depending on your location</span>
					</div>
				<?php } else { ?>
					<div id="prices">
						Prices coming soon!
					</div>
				<?php } ?>
					<div id="purchase-link">
						<a href="#purchase-options">Go to purchase options&nbsp;&darr;</a>
					</div>


		</div>
	</div>
	
	<div id="resource-content">
		<div id="custom-post-the-content" >
			<?php the_content(); ?>
		</div>

		<div id="purchase-options">
			<h2><a name="purchase-options">Purchase options for <em><?php the_title(); ?></em></a></h2>
			
			<?php 	
				// Notes
					// !is_post_type means "NOT is_post_type"
					// && means AND - both conditions must apply
					// || means OR: only one condition needs to apply
			?>
			<?php if( 
				get_post_meta($post->ID, 'amazon-us', true)|| 
				get_post_meta($post->ID, 'amazon-uk', true)||
				get_post_meta($post->ID, 'amazon-es', true)||
				get_post_meta($post->ID, 'amazon-fr', true)||
				get_post_meta($post->ID, 'amazon-jp', true) || 
				get_post_meta($post->ID, 'amazon-br', true)||
				get_post_meta($post->ID, 'amazon-de', true)||
				get_post_meta($post->ID, 'smashwords-epub', true)||
				get_post_meta($post->ID, 'smashwords-multiple', true)||
				get_post_meta($post->ID, 'gumroad', true)				
				)   { ?>

				<div id="purchase-links">
					<ul>
						
						<!-- Amazon.com Affiliate Link -->
						<?php if(get_post_meta($post->ID, 'amazon-us', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'amazon-us', true); ?>">
									Amazon.com
								</a>
							</li>
						<?php } ?>
						
						<!-- Amazon.co.uk Affiliate Link -->
						<?php if(get_post_meta($post->ID, 'amazon-uk', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'amazon-uk', true); ?>">
									Amazon.co.uk
								</a>
							</li>
						<?php } ?>
						
						<!-- Amazon.es Affiliate Link -->
						<?php if(get_post_meta($post->ID, 'amazon-es', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'amazon-es', true); ?>">
									Amazon.es
								</a>
							</li>
						<?php } ?>
						
						<!-- Amazon.fr Affiliate Link -->
						<?php if(get_post_meta($post->ID, 'amazon-fr', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'amazon-fr', true); ?>">
									Amazon.fr
								</a>
							</li>
						<?php } ?>

						<?php if(get_post_meta($post->ID, 'amazon-de', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'amazon-de', true); ?>">
									Amazon.de
								</a>
							</li>
						<?php } ?>
						
						<?php if(get_post_meta($post->ID, 'amazon-jp', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'amazon-jp', true); ?>">
									Amazon.jp
								</a>
							</li>
						<?php } ?>
						
						<!-- Amazon.br Affiliate Link -->
						<?php if(get_post_meta($post->ID, 'amazon-br', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'amazon-br', true); ?>">
									Amazon.br
								</a>
							</li>
						<?php } ?>

						<!-- Smashwords E-pub Affiliate Link -->
						<?php if(get_post_meta($post->ID, 'smashwords-epub', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'smashwords-epub', true); ?>">
									Smashwords (epub)
								</a>
							</li>
						<?php } ?>
						<!-- Smashwords Multiple Formats Affiliate Link -->
						<?php if(get_post_meta($post->ID, 'smashwords-multiple', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'smashwords-multiple', true); ?>">
									Smashwords (multiple formats)
								</a>
							</li>
						<?php } ?>
						<!-- Gumroad Link -->
						<?php if(get_post_meta($post->ID, 'gumroad', true)) { ?>
							<li>
								<a href="<?php echo get_post_meta($post->ID, 'gumroad', true); ?>">
									Gumroad
								</a>
							</li>
						<?php } ?>
						</ul>
				</div>
	
				
				<?php } else { ?>Coming soon!
				<?php } ?>
		</div>
		<ul>
			<li><?php the_title(); ?><em> is now available at Amazon in Kindle format.</em></li>
			<li><em>To read </em><?php the_title(); ?><em> you need a Kindle, PC, Mac, Android device or iPhone/iPad.</em></li>
			<li><em>If you want to read the book on a device other than a kindle then you can <a href="http://www.amazon.com/gp/feature.html?ie=UTF8&amp;docId=1000493771">download a free Kindle reader here</a>.</em></li>
		</ul>
	</div>
	<div class="spacer">

		
			<?php endwhile; ?>
				<?php endif; ?>
		</div>
	</div>
	<div class="spacer">
	</div>

	
	<?php if ($i % 6 == 0) echo '<div style="clear: both;"></div>'?> 
	<?php comments_template( '', true ); ?>
</div>

