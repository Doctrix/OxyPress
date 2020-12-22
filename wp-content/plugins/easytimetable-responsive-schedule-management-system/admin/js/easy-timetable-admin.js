jQuery(document).ready(function($) {
	'use strict';

	jQuery('.sy-eachplanning').tooltipster({
	    contentCloning: true,
	    side: 'right',
	    distance: 20,
	    theme: 'tooltipster-borderless',
	    trigger:'hover',
	    functionPosition: function(instance, helper, position){
	        position.coord.top += 50;
	        position.coord.left += 0;
        	return position;
    	}
	});
	jQuery('.copyTagButton').tooltipster({
	    contentCloning: true,
	    side: 'left',
	    theme: 'tooltipster-light'
	});
	
	jQuery('.copyTagButton').on('click', function(e){
		e.preventDefault();
	})

	//Save function to record data of a new or edited planning
	function send_data(data, nonce) {
		var id;
		var datas;
		jQuery.post(ajaxurl, data, function(responseText) {
			url: MyAjax.ajaxurl,
			console.log(responseText);
			// Revove the unwanted "0" at the end of the returned id
			id = parseInt(responseText.slice(0, -1));
			console.log(id + " la good id");
			datas = {
				'action': 'syet_edit_planning',
				'id': id,
				'saveSecurity': nonce	
			};
			// ON récupère les données sauvegardées
			get_data(datas);
		});
	}

	function get_data(data) {
		jQuery.post(ajaxurl, data, function(responseText) {
			url: MyAjax.ajaxurl,
			//ON affiche le planning
			jQuery('.sy-admin-container').html(responseText.slice(0, -1));
		});
	}

	function delete_planning(data) {
		jQuery.post(ajaxurl, data, function(responseText) {
			url: MyAjax.ajaxurl
		});	
	}

	/*function duplicate_planning(data) {
		jQuery.post(ajaxurl, data, function(responseText) {
			url: MyAjax.ajaxurl
			jQuery('.sy-admin-container').html(responseText.slice(0, -1));
		});	
	}*/
	jQuery('#newone').find(':text').each(function(){
		jQuery(this).blur(function(){
			if(jQuery(this).val() == "")
			{
				jQuery(this).addClass("sy-emptyfield");
			}
			else {
				if (jQuery(this).hasClass("sy-emptyfield"))
				{
					jQuery(this).removeClass("sy-emptyfield");
				}
			}
		})
	})

	// Au clic on sauvegarde les données du nouveau planning fonction send_data() et on affiche le planning après récup des données function get_data()
	jQuery('#et_save').on('click', function(e){
		e.preventDefault();
		var p_name = jQuery('#p_name').val();
		var creation_date = jQuery('#creation_date').val();
		var time_mode = jQuery('#time_mode').val();
		var type = jQuery('#type').val();
		var display_title = jQuery('#display_title').val();
		var display_filters = jQuery('#display_filters').val();
		var start_h = jQuery('#start_h').val();
		var rows = jQuery('#rows').val();
		var rows_name = jQuery('#rows_name').val();
		var cells = jQuery('#cells').val();
		var cell_color = jQuery('#cell_color').val();
		var height = jQuery('#height').val();
		var description = jQuery('#description').val();
		var activities = jQuery('#activities').val();
		var scheduledact = '{\"timetables\":{\"0\":{\"scheduledacts\":{},\"weeks\":{"1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10,"11":11,"12":12,"13":13,"14":14,"15":15,"16":16,"17":17,"18":18,"19":19,"20":20,"21":21,"22":22,"23":23,"24":24,"25":25,"26":26,"27":27,"28":28,"29":29,"30":30,"31":31,"32":32,"33":33,"34":34,"35":35,"36":36,"37":37,"38":38,"39":39,"40":40,"41":41,"42":42,"43":43,"44":44,"45":45,"46":46,"47":47,"48":48,"49":49,"50":50,"51":51,"52":52}}}}';
		//calcul des jours
		var jsondays = '{\"days\":{';
		var wkTtStart = parseInt(jQuery('#days').attr('data-start-week'));
		for (var i = 0; i < parseInt(rows); i++) {
				var theday = i + wkTtStart;
				if (theday > 6)
				{
					theday = theday % 7;
					console.log(theday);
				}
				else
				{
					theday = i + wkTtStart;
				}
				if (i < parseInt(rows)-1)
				{	
					jsondays += '\"' + i + '\":\"' + theday + '\",';
				}
				else 
				{
					jsondays += '\"' + i + '\":\"' + theday + '\"';
				}
			};
		jsondays += '},\"format\":{}}';

		var days = jsondays;
		var print = jQuery('#print').val();
		var cell_color = jQuery('#cell_color').val();
		var created_by = jQuery('#created_by').val();
		var access = jQuery('#access').val();
		var nonce = jQuery('#saveSecurity').val();
		if (p_name == "" || start_h == "" || rows == "" || cells == "" )
		{
			jQuery('#newone').find('input').each(function(){
				//console.log(jQuery(this).val());
				if(jQuery(this).val() == "")
				{
					jQuery(this).addClass("sy-emptyfield");
				}
			})
		}
		else
		{
			var datas = {
				'action': 'syet_save_planning',
				'p_name': p_name,
				'creation_date': creation_date,
				'time_mode': time_mode,
				'type': type,
				'display_title': display_title,
				'display_filters': display_filters,
				'start_h': start_h,
				'rows': rows,
				'rows_name': rows_name,
				'cells': cells,
				'cell_color': cell_color,
				'height': height,
				'description': description,
				'activities': activities,
				'scheduledact': scheduledact,
				'days': days,
				'print': print,
				'cell_color': cell_color,
				'created_by': created_by,
				'access': access,
				'saveSecurity': nonce
			};
			// On sauvegarde les données
			send_data(datas, nonce);
		}
	});
	
	//Edit planning in the list
	jQuery('#ulformlistplanning').find('li').each(function(){
		var id = jQuery(this).attr('data-form');
		var nonce = jQuery("#saveSecurity").val();
		jQuery('#et_edit_planning_'+id).on('click', function(e){
			e.preventDefault();
			var datas = {
				'action': 'syet_edit_planning',
				'id': id,
				'saveSecurity': nonce	
			};
			get_data(datas);
		});
		new Clipboard('#copytag_'+id);

	})// Fin find li

	var deleteopt = {
        dialogClass: "no-close",
        autoOpen: false,
        height: 250,
        width: 300,
        modal: true,
        title: "Are you sure?",
        open: function(event,ui) {
        	jQuery('body').addClass('nooverflow');
        },
        show: {
        	effect: "drop",
        	direction: "up",
        	duration: 200
        },
        hide: {
        	effect: "drop",
        	direction: "up",
        	duration: 200
        },
        buttons: [{
            text:"No", 
            click: function() {
            	jQuery(this).dialog("close");
            	setTimeout(function(){ jQuery('body').removeClass('nooverflow'); }, 200);
            },
        }],
        create:function () {
        	jQuery(".ui-dialog").addClass("syet-dialog");
	        jQuery(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-cancel");		            		            
	    }
    };

	//Delete planning in the list
	jQuery('#ulformlistplanning').find('li').each(function(){
		var id = jQuery(this).attr('data-form');
		var nonce = jQuery("#saveSecurity").val();
		var deleteDialog = jQuery('#et_delete_planning_'+id).dialog(deleteopt);
		jQuery('#et_delete_planning_'+id).on('click', function(e){
			e.preventDefault();
			
			var datas = {
				'action': 'syet_delete_planning',
				'id': id,
				'saveSecurity': nonce	
			};
			delete_planning(datas);
			jQuery('.ulformlistplanning').find('li').each(function(){
				if (jQuery(this).attr('data-form') == id) {
					jQuery(this).remove();
				}
			})
			deleteDialog.dialog('close');
			setTimeout(function(){ jQuery('body').removeClass('nooverflow'); }, 200);

			//console.log(id);
		});	
		jQuery('#trash_'+id).on('click', function(e) {
			e.preventDefault();			
			deleteDialog.dialog('open');
		})		
	})// Fin find li

	//Duplicate planning in the list
	jQuery('#ulformlistplanning').find('li').each(function(){
		var id = jQuery(this).attr('data-form');
		jQuery('#et_duplicate_planning').tooltipster({
			side: 'left',
	    	theme: 'tooltipster-light'
		})
		jQuery('#et_duplicate_planning').on('click', function(e){
			e.preventDefault();
			
			
		});		
	})// Fin find li
	
});
