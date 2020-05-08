jQuery(document).ready(function($){


	var myWindow = $(window);

	$(window).load(function(){
	
		var $container = $('.itemsContainer');
		var $itemsFilter=$('.itemsFilter');

		// Izotope load
		try {	
			var selectedItem = $('.itemsFilter').find('a.active').attr('data-filter');
			
			$container.show();
			
				$container.isotope({
					filter: selectedItem,
					animationOptions: {
						duration: 250,
						easing: 'linear',
						queue: false,
						layoutMode: 'fitRows'
			}
		});
		} catch(err){ }
		
		// On resize
		try {		
		myWindow.bind('resize', function(){
				var selectedItem = $('.itemsFilter').find('a.active').attr('data-filter');

				$container.isotope({ 
					filter	: selectedItem,
					animationOptions: {
						duration: 250,
						easing	: 'linear',
						queue	: false,
						layoutMode: 'fitRows'
					}
				});
		});
		} catch(err){ }


		// FILTERS
		$('.itemsFilter a').click(function(){
			$('.itemsFilter .current').removeClass('current');
			$(this).addClass('current');
			
			var selector = $(this).attr('data-filter');
			$container.isotope({
				filter: selector,
				animationOptions: {
					duration: 250,
					easing: 'linear',
					queue: false
				}
			 });
			 return false;
			});
	
	
	
	}); // /end window load	
	
	
}); // end jQuery