		<div id="secondary" class="widget-area" role="complementary">
			<ul >
				<li id="search" class="widget-container">
				<h3 class="widget-title">Search the round</h3>
				<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
						<input type="text" size="11" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
						<input type="hidden" id="searchsubmit" value="Search" class="btn" />
					</form>
				</li>
				
			<!-- Feedburner signup form -->
			
			<div id="subscribe-form" class="widget-container clearfix">
				<h3 class="widget-title">Get round updates</h3>
				<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=TheRound', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
					
					<label>Enter your email address:</label>
					<div><input type="text" name="email"/></div>
					<span><input type="hidden" value="TheRound" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" value="Go" /></span>
				
				</form>	
			</div>
<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			
			
		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul >
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
