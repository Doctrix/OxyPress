jQuery(document).ready(function($) {
	'use strict';
	// Filters
	var arrayFilters = [];
	var arrayTitle = [] ;// = [{"title": "Activity 1", "id_activity": "0", "color": "ffcc00", "overcolor": "ccff00"}];
	//console.log(arrayFilters[0]);
	jQuery('.fullplanning').find('li').each(function(){
		var thetitle = jQuery(this).attr('data-title');
		var arrayActi = {"title": thetitle, "id_activity": jQuery(this).attr('data-id-activity'), "color": jQuery(this).attr('data-color'), "overcolor": jQuery(this).attr('data-overcolor'), "fontcolor": jQuery(this).attr('data-fontcolor')};
		
		//On ajoute les titre et objet de la 1ère activité du planning dans arrayTitle et arrayFilters
		if (typeof arrayFilters[0] === "undefined") 
		{
			arrayTitle.push(thetitle);
			arrayFilters.push(arrayActi);
		}
		//On recherche dans le tableau des titres s'il y a lenom de l'activité
		if (arrayTitle.indexOf(thetitle) == -1) 
		{
			//S'il n'y est pas on ajoute le nom de la'activité dans arrayTitle
			//Et l'objet dans arrayFilters
			arrayTitle.push(thetitle);
			arrayFilters.push(arrayActi);
		}
		
	});
	
	for (var i = 0; i < arrayFilters.length; i++) {
		var title = arrayFilters[i]['title'];
		var bgcolor = arrayFilters[i]['color'];
		var overcolor = arrayFilters[i]['overcolor'];
		var fontcolor = arrayFilters[i]['fontcolor'];
		var id_activity = arrayFilters[i]['id_activity'];
		jQuery('.sy-filters').append('<div id="sy-filter '+ i +'"' +
			'class="sy-actsingle button" activated="notactivated"' +
			'style="background-color:#'+ bgcolor +';color:#'+ fontcolor +'";' +
			'data-act-id="'+ id_activity +'">'+ title +'</div>'
			);
	};
	jQuery('.sy-actsingle:not(".allfilter")').on('click', function(){
		jQuery('.sy-actsingle').not(this).attr('activated', "notactivated");
		jQuery(this).attr('activated', "activated");
		var linked = 0 //jQuery(this).attr('data-linked');
		console.log(linked);
		jQuery('.sy-actsingle').not(this).css({
			 "opacity":"0.6",
			 "transition": "opacity 0.3s"
		});

		jQuery(this).css({
			 "opacity":"1",
			 "transition": "opacity 0.3s"
		});

		var nameRef = jQuery(this).text(); // le nom de l'activité du 
		//On enlève l'éventuel espace au début du nom de l'activité
		nameRef = nameRef.replace(/^\s/,"");
		jQuery('.creneau').each(function(){
			var id, idNum, idName;
			if (jQuery(this).find('li').length > 0) {
				jQuery(this).find('li').addClass('liempty');
				var opt = {"html": true};
				//jQuery(this).tooltip(opt).tooltip("disable");
				jQuery(this).find('li').animate({
					opacity: "0"
					},  {
					    	duration: 100
					    });
				jQuery(this).find('li').css('display', 'none');
				if (linked == 0) 
				{
					console.log(jQuery(this).find('.acttitle').text());
					while(jQuery(this).find('.acttitle').text() == nameRef)
					{
						id = jQuery(this).find('li').attr('id');
						console.log(id);
						idNum = id.substr(-5, 5);
						idName = id.replace(idNum, "");
						var syClass = '#'+ id;
						jQuery(this).find('li').css('display', 'block');
						jQuery(this).find('li').removeClass('empty');
						jQuery(this).find('li').animate({
							opacity: "1"
						},  {
						    	duration: 100
						    });
						break;
					}
				}
				else 
				{
					//console.log(jQuery(this).find('.acttitle > a').html());
					if (jQuery(this).find('.acttitle > a').html()) {
						var nameActi = jQuery(this).find('.acttitle > a').text();
						console.log(nameActi);
						var space = ' ';
						nameActi = nameActi.replace(/\s$/g,"");
						console.log(nameActi);
						
						console.log(nameActi);
						console.log(nameRef);
					}
					
					while(nameActi == nameRef)
					{
						id = jQuery(this).find('li').attr('id');
						idNum = id.substr(-5, 5);
						idName = id.replace(idNum, "");
						syClass = '#'+ id;
						jQuery(this).find('li').css('display', 'block');
						//console.log(jQuery(this).find('li').attr('id'));
						jQuery(this).find('li').removeClass('empty');
						jQuery(this).find('li').animate({
							opacity: "1"
						},  {
						    	duration: 100
						    });
						break;
					}
				}
			} // Fin if
		});
	})// on click 

	jQuery('.allfilter').on('click', function(){
		jQuery('.sy-actsingle').not(this).attr('activated', "notactivated");
		jQuery('.sy-actsingle').css({
			 "opacity":"1",
			 "transition": "opacity 0.3s"
		});
		jQuery('.creneau').each(function(){
			jQuery(this).find('li').removeClass('liempty');
			jQuery(this).find('li').css('display', 'block');
			jQuery(this).find('li').animate(
			{
				opacity: "1"
			},  
			{
			    duration: 100
			});
		});
	});
	// End filters
	

});
