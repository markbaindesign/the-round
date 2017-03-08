jQuery(document).ready(function($) { // Wrap all scripts in this

	var navigation = responsiveNav(".nav-collapse", {
			animate: true,                    // Boolean: Use CSS3 transitions, true or false
			transition: 284,                  // Integer: Speed of the transition, in milliseconds
			customToggle: "custom-menu-toggle-link",                 // Selector: Specify the ID of a custom toggle
			closeOnNavClick: false,           // Boolean: Close the navigation when one of the links are clicked
			openPos: "relative",              // String: Position of the opened nav, relative or static
			navClass: "nav-collapse",         // String: Default CSS class. If changed, you need to edit the CSS too!
			navActiveClass: "js-nav-active",  // String: Class that is added to <html> element when nav is active
			// jsClass: " ",                    // String: 'JS enabled' class which is added to <html> element
			// Swapping no-js to js with Modernizr instead
			init: function(){},               // Function: Init callback
			open: function(){},               // Function: Open callback
			close: function(){}               // Function: Close callback
		});
}); // end Wrap all scripts in this

// Google Analytics

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-25853766-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  
// Facebook
  
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=333318886695266";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


// Typekit

try{Typekit.load();}catch(e){}


/*

* Mobile Navigation for twentyeleven created by Jesse Hallett http://bowesales.com
* With Special Thanks to these two lads:

* Chris Coyier's Mobile Navigation Technique
* http://css-tricks.com/convert-menu-to-dropdown/
* Article Date: 05/15/2011

* Demo Taken from Ian Yates' tutorial on Tuts+
* http://webdesign.tutsplus.com/tutorials/complete-websites/building-a-responsive-layout-with-skeleton-navigation/
* Article Date: 03/19/2012
*/

/* Mobile Navigation
================================================== */
jQuery(function($){
$(document).ready(function() {

//build dropdown
$("<select />").appendTo("nav .menu-mobile-container");

// Create default option
$("<option />", {
"selected": "selected",
"value"   : "",
"text"    : "Select Page" //Change default text
}).appendTo("nav select");

// Populate dropdowns with dash for child pages
$("nav .menu a").each(function() {
var el = $(this);
var padding = "";
for (var i = 0; i < el.parentsUntil('div > ul').length - 1; i++)
padding += "";
$("<option />", {
"value"   : el.attr("href"),
"html"    : padding + el.text(),
}).appendTo("nav select");
});

//make responsive dropdown menu actually work
$("nav select").change(function() {
window.location = $(this).find("option:selected").val();
});

});
});

// Back to top scrolling effect

jQuery(function($){

	$(document).ready(function(){

		// hide #back-top first
		$("#back-to-top").hide();
		
		// fade in #back-top
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('#back-to-top').fadeIn();
				} else {
					$('#back-to-top').fadeOut();
				}
			});

			// scroll body to 0px on click
			$('#back-to-top a').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
				return false;
			});
		});

	});
	
});

// Select Menu

jQuery(function($){

	jQuery(document).ready(
		function() {
			jQuery( ".select-menu" ).change(
				function() { 
					window.location = jQuery(this).find("option:selected").val();
				}
			);
		}
	);

});


