
	<div id="footer" role="contentinfo">
			
		<div id="colophon">
				
			<div id="fullpage-footer">
					
				<?php //get_template_part( 'content', 'bottombookshelf'); ?>
				
				<ul id="fullpage-footer-list">
					 <li><span style="color: #B30000;">&copy;</span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &#8212; <?php bloginfo( 'description' ); ?></li>
					 <li><a href="<?php bloginfo('rss2_url'); ?>" title="Get updates from The Round by RSS">RSS</a></li>
					 <li><a href="http://www.facebook.com/pages/The-round/196089150427646" title="Befriend The Round on Facebook">Facebook</a></li>
					 <li><a href="http://twitter.com/#!/wetheround" title="Follow The Round on Twitter">Twitter</a></li>
					 <li>Site, logo &amp; covers by <a href="http://markbaindesign.com">markbaindesign</a></li>
				 </ul> 
					 
			</div>
				
			<div id="iphone-footer">	 
				
				
				
								

				<div id="social-mobile">
					<ul id="fullpage-footer-list">
					
						<li>
							<a href="<?php bloginfo('rss2_url'); ?>" title="Get updates from The Round by RSS"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/rss.png" alt="RSS" width="32px" height="32px" /></a>
						</li>
						
						<li>
							<a href="http://www.facebook.com/pages/The-round/196089150427646" title="Befriend The Round on Facebook"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/facebook.png" alt="Facebook" width="32px" height="32px" /></a>
						</li>
						 
						<li>
							<a href="http://twitter.com/#!/wetheround" title="Follow The Round on Twitter"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/twitter.png" alt="Twitter" width="32px" height="32px" /></a>
						</li>
					
					</ul> 
				
				
				

				</div>


					
					<div id="copyright">
					
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">&copy; <?php bloginfo( 'name' ); ?></a>
						
					</div>
					
					<div id="tagline">
						
						<?php bloginfo( 'description' ); ?>
					
					</div>
				
				<div id="credit">
					Website by <a href="http://markbaindesign.com">Mark Bain Design</a>
				</div>
				
				 <div id="back-to-top">
					 <a href="#wrapper" title="You've reached the end; click here to go back to the top">Back to top &uarr;</a> 
				</div>

			</div><!-- iPhone footer -->
			
		</div><!-- #colophon -->
		
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php wp_footer();?>

</body>

</html>
