/*
	
	Masonry
	
*/

jQuery(document).ready(function($){

	// initialize Masonry

	var $container = $('.masonrycontainer').masonry({
		itemSelector: '.recent-resources-content'
	});
	
	// layout Masonry again after all images have loaded
	
	$container.imagesLoaded( function() {
 	$container.masonry();
	});
	
	$container(".recent-resources-content img").lazyload({
		effect : "fadeIn"
	});
	
});

/*
	
	Sources:
		http://web.admcomputing.co.uk/masonry/sample-page/
		http://masonry.desandro.com/appendix.html
	
*/