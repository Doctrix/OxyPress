<?php

/**
 * Provide public display of a planning
 *
 *
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    easy-timetable
 * @subpackage easy-timetable/public/views
 */

if (!defined('WPINC')){die;}

require_once SYET_PATH . 'public/models/EasyTimetableModelPlanning.php';

class EasyTimetableViewPlanning {
	
	

	public static function syet_displayPlanning($model, $content) { 
		//var_dump($model);
		if (array_key_exists(0, $model))
		{
		global $wp_locale;
		$wkTtStart = (int)get_option("start_of_week");
		//if(is_array($model) == 1)
		//{
			
		// On récuère les activités
		//$activities is a JSON string, each data of this string is escape individually later
		//datas are not usable if they are not JSON formatted
		//var_dump($model);
		$activities = stripslashes($model[0]->activities);
		// Array des jours de la semaine
		$jsondaysArray = json_decode(stripslashes($model[0]->days), true);

		// On récupère les activités planifiées
		//$scheduledacts is a JSON string, easch data of this string is escape individually later
		//datas are not usable if they are not JSON formatted
		$scheduledacts = stripslashes($model[0]->scheduledact);
		// On récupère les activités planifiées
		$jsonTimetable = json_decode($scheduledacts, true);
		
		// On transforme la chaîne des activités en tableau
		$arrayAct = explode(",{", $activities);
		$arrayAct_length = count($arrayAct);
		echo $content;
		
		 ?>
		
		<input class="at" type="hidden" value="<?php echo $model[0]->time_mode ?>" >
		<input class="ttm" type="hidden" value="<?php echo $model[0]->type ?>" >
			<?php if ($model[0]->display_title == 1): ?>
		    	<h2 class="timetable-title"><?php echo esc_html($model[0]->p_name) ?></h2>
		    <?php endif ?>
		    <?php if($model[0]->description): ?>
		    	<div class="sy-description-front">
		    		<?php echo esc_textarea($model[0]->description); ?>
		    	</div>
		    <?php endif ?>
		    <?php $variationCount = 0; ?>
		<?php if ($model[0]->type == 0):
			$thisdate = new DateTime();
			//var_dump(implode(",", $weeks));
			$year = $thisdate->format('Y');
			$thisweek = (int)$thisdate->format('W');
			if($thisweek == 53)
			{
				$thisweek = 1;
			}
		 ?>
		<?php if(empty($model[0]->rows_name)): ?>
			<div class="timetable-nav">
				<div class="prev-variation sy-button button" data-variation="0" data-thisweek="<?php echo $thisweek ?>" title="<?php _e( 'Previous week', 'easytimetable-responsive-schedule-management-system' ); ?>"><?php _e( 'Prev', 'easytimetable-responsive-schedule-management-system' ); ?></div>
				<div class="next-variation sy-button button" data-variation="0" data-thisweek="<?php echo $thisweek ?>" title="<?php _e( 'Next week', 'easytimetable-responsive-schedule-management-system' ); ?>"><?php _e( 'Next', 'easytimetable-responsive-schedule-management-system' ); ?></div>
			</div>
		<?php endif ?>
		<div class="timetable-container">
			<?php foreach ($jsonTimetable['timetables'] as $variation): ?>		
			<?php $arrayplanAct = $variation["scheduledacts"]; ?>
			<?php $weeks = $variation["weeks"];
			
			//var_dump($thisweek); ?>
			<?php if (in_array($thisweek, $weeks)):  ?>
				<?php $isVisible = "" ?>
			<?php else: ?>
				<?php $isVisible = "invisible" ?>
			<?php endif ?>
			<?php $arrayplanAct_length = count($arrayplanAct); ?>
			<div id="easytimetable-<?php echo $variationCount ?>" data-weeks="<?php echo implode(",", $weeks); ?>" data-variation="<?php echo $variationCount ?>" class="fullplanning easytimetable-<?php echo esc_attr($model[0]->id) ?> <?php echo $isVisible ?> variation-<?php echo $variationCount ?>" data-id="<?php echo esc_attr($model[0]->id) ?>" data-type="<?php echo esc_attr($model[0]->type) ?>" data-time-mode="<?php echo esc_attr($model[0]->time_mode) ?>" data-display-title="<?php echo esc_attr($model[0]->display_title) ?>" data-display-filters="<?php echo esc_attr($model[0]->display_filters) ?>" data-start-h="<?php echo esc_attr($model[0]->start_h) ?>" data-color="<?php echo esc_attr($model[0]->cell_color) ?>" data-rows="<?php echo esc_attr($model[0]->rows) ?>" data-cells="<?php echo esc_attr($model[0]->cells) ?>">
				<!-- Display title -->
				
			    <?php $rows = esc_attr($model[0]->rows);
	   				$rwidth= 95/$rows;
	   				if(!empty($model[0]->rows_name)) 
	   				{
	   					$name = explode(",", esc_html($model[0]->rows_name));
	   				}
	   				else
	   				{
	   					// sinon, les jours de la semaine traduits
	   					$name = array();
	   					foreach ($jsondaysArray['days'] as $key => $day) {
	   						$day4date = $day;

	   						//var_dump($day);
	   						if ($key >= $day4date && $day == 0)
	   						{
	   							//var_dump($day4date);
	   							$day4date .= 7;
	   						}
	   						else if ($key >= $day4date) {
	   							$day4date = (int)$day + 7;
	   						}
	   						$date = new DateTime();
	   						//var_dump($day4date);
							$year = $date->format('Y');
							$week = $date->format('W');
							$date->setISODate($year,$week, $day4date);
	   						//array_push($name, $wp_locale->get_weekday($days));
	   						array_push($name, "<div class='sy-dayname' data-day=".$day.">".$wp_locale->get_weekday($day)."</div><div class='sy-thedate'>".$date->format('d.m.Y')."</div>");
	   					}
	   					
	   				}
	   				
	   				for ($number=1;$number<=$rows;$number++) { ?>
	   				<div class="sy-row-container" style="width:<?php echo $rwidth ?>%" >
					   	<div id="<?php echo $number ?>" class="row-<?php echo $number ?> rows" >
					   		<div class="col-title"><?php  if(isset($name[$number-1]) && !empty($name)) {echo $name[$number-1]; } else {echo "";}?></div>
					   		<?php	
						   		$cells = $model[0]->cells;
						   		$rheight = 65*$cells;
						   		for ($cell=1;$cell<=$cells;$cell++) {
						   			$idcell = $cell;
						   			if ($idcell < 10) {
			                            $zero = "00";
			                        }
			                        else {
			                            $zero = "0";
			                        } 
						   			global $empty;
						   			$empty;
						   			$idul = $number.$zero.$idcell;	
						   			//Tableau pour définir le nombre d'activité dans la cellule	
						   			$tabAct = array();	
						   			?>
						   			<ul id="cellule_<?php echo $idul ?>" class="creneau creneau<?php echo $idcell ?>" style="background-color:#<?php echo esc_attr($model[0]->cell_color) ?>;height:<?php echo esc_attr($model[0]->height) ?>px;">
						   			<?php if ($model[0]->scheduledact) { ?> 
											<?php for ($i = 0 ; $i < $arrayplanAct_length ; $i++) {
												
												$encodedplanAct = json_encode($arrayplanAct[$i]);
												$decodedplanAct = json_decode($encodedplanAct);
												
												if ((int)$decodedplanAct->{'id_cell'} == (int)$idul) { 
													$actId = (int)$decodedplanAct->{'id_activity'};
													// On ajoute le nom de l'activité dans le tableau
													array_push($tabAct, $decodedplanAct->{'title'});
													//On compte le nombre d'élément du tableau pour l'ajouter à l'id de l'activité
													$actCount = count($tabAct);

													if ($actId >= 1 && preg_match('/^"a/', $arrayAct[$actId])) {
														// on ajoute le délimiteur de json enlevé lors de la conversion en tableau ci-dessus
														$arrayAct[$actId] = '{'.$arrayAct[$actId];
														// On décode la string en objet json
														$decodedAct = json_decode($arrayAct[$actId]);
														//var_dump($decodedAct);
													} // Fin if $i >= 1
													else {
														$decodedAct = json_decode($arrayAct[$actId]);
														//var_dump($decodedAct);
													} // fin else
													$re = '/%{3}/';
													$acttitle1 = preg_replace($re, "'", $decodedAct->{'actname'});

													$acttitle = rawurldecode(urldecode($acttitle1));
													//var_dump($acttitle1);
													

											    	$acttitleid = preg_replace("/\s+/", "", preg_replace("/[#$,;:!€£%§?&.()'-\*]/", "", $acttitle));
											        $acttitleid = preg_replace("/[\"’\/~\\<|>@]+/", "", $acttitleid);
											        $acttitleid = preg_replace("/[áàâÂäÄæÆãÃåÅÀÁ]+/", "a", $acttitleid);
											        $acttitleid = preg_replace("/[éèêëÉÈÊË]+/", "e", $acttitleid);
											        $acttitleid = preg_replace("/[ïîìíÍÌÎÏ]+/", "i", $acttitleid);
											        $acttitleid = preg_replace("/[ûüùúÚÙÛÜ]+/", "u", $acttitleid);
											        $acttitleid = preg_replace("/[ñÑ]+/", "n", $acttitleid);
											        $acttitleid = preg_replace("/[çÇ]+/", "c", $acttitleid);
											        $acttitleid = preg_replace("/[šŠß]+/", "s", $acttitleid);
											        $acttitleid = preg_replace("/[žŽ]+/", "z", $acttitleid);
											        $acttitleid = preg_replace("/[ÝýÿŸ]+/", "y", $acttitleid);
											        $acttitleid = preg_replace("/[ôöòÓóÒØøõÕœŒÔ]+/", "o", $acttitleid);
											        $acttitleid = preg_replace("/^1/", "one", $acttitleid);
											        $acttitleid = preg_replace("/^2/", "two", $acttitleid);
											        $acttitleid = preg_replace("/^3/", "three", $acttitleid);
											        $acttitleid = preg_replace("/^4/", "four", $acttitleid);
											        $acttitleid = preg_replace("/^5/", "five", $acttitleid);
											        $acttitleid = preg_replace("/^6/", "six", $acttitleid);
											        $acttitleid = preg_replace("/^7/", "seven", $acttitleid);
											        $acttitleid = preg_replace("/^8/", "eight", $acttitleid);
											        $acttitleid = preg_replace("/^9/", "nine", $acttitleid);
											        $acttitleid = preg_replace("/^0/", "zero", $acttitleid);
											        
											        if ($model[0]->time_mode == 1)
											        {
											            $start = esc_html($decodedplanAct->{'start_t'});
											            $end = esc_html($decodedplanAct->{'end_t'});   
											        }
											        else {
											            $start = substr($decodedplanAct->{'start_t'}, -8, 5);
											            $end = substr($decodedplanAct->{'end_t'}, -8, 5);
											        } 
											        if (!empty($decodedAct->{'actovercolor'}))
										            {
										            	$overColor = "#".$decodedAct->{'actovercolor'};
										            }
										            else 
										            {
										            	$overColor = "#".$decodedAct->{'actcolor'};
										            }

										            if (!empty($decodedAct->{'fontcolor'}))
										            {
										            	//var_dump($decodedAct->{'fontcolor'});
										            	$fontColor = "#".$decodedAct->{'fontcolor'};
										            }
										            else 
										            {
										            	$fontColor = "#ffffff";
										            }

										            if (!empty($decodedAct->{'fontovercolor'}))
										            {
										            	$fontOverColor = "#".$decodedAct->{'fontovercolor'};
										            }
										            else 
										            {
										            	$fontOverColor = "#ffffff";
										            }
											        ?> 
											        <li id="<?php echo $acttitleid ?>-<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?>" data-tooltiptext="<?php if(!is_null($decodedAct->{'acttooltiptext'})) {echo esc_attr($decodedAct->{'acttooltiptext'});} ?>" data-imgtooltip="<?php if(!is_null($decodedAct->{'imgtooltip'})) {echo esc_attr($decodedAct->{'imgtooltip'});} ?>" data-showdesc="<?php if(!is_null($decodedAct->{'showdesc'})) {echo esc_attr($decodedAct->{'showdesc'});} ?>" data-li-id="<?php echo $acttitleid ?>-<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?>" data-tooltip-content=".sy-infofields-<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?>" data-id-activity="<?php echo esc_attr($decodedplanAct->{'id_activity'}) ?>" data-color="<?php echo esc_attr($decodedAct->{'actcolor'}) ?>" data-overcolor="<?php echo esc_attr($decodedAct->{'actovercolor'}) ?>" data-fontcolor="<?php echo esc_attr($decodedAct->{'fontcolor'}) ?>" data-image="<?php echo esc_attr($decodedAct->{'actimage'}) ?>" data-fontovercolor="<?php echo esc_attr($decodedAct->{'fontovercolor'}) ?>" data-idcell="<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?>" data-idacti="<?php echo esc_attr($decodedplanAct->{'idacti'}) ?>" data-title="<?php echo $acttitle ?>" data-duree="<?php echo esc_attr($decodedplanAct->{'duree'}) ?>" class="<?php echo $acttitleid ?> activite" style="background-color:#<?php echo esc_attr($decodedAct->{'actcolor'}) ?>;color:#<?php echo  esc_attr($decodedAct->{'fontcolor'}) ?>;">
												        <div class="time">
										   					<span class="sy-start"><?php echo $start ?></span>
										   					<span class="sy-separator">></span>
										   					<span class="sy-end"><?php echo $end ?></span>
									   					</div>
												        <div id="nom" class="acttitle" title="<?php echo $acttitle ?>"><?php echo $acttitle ?></div>
												        <?php if ($decodedAct->{'actincelltext'} != ""):?>
													        <div class="sy-actincelltext"><?php echo esc_attr($decodedAct->{'actincelltext'}) ?></div>
													    <?php endif ?>
												        <div class="sy-description-container">
												        	<?php if ($decodedAct->{'showdesc'} == 1 && ($decodedAct->{'actimage'} != "" || $decodedAct->{'actdescription'} != "")): ?>
													        	<div class="sy-description-<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?> sy-description-style ">
													        		<div class="sy_modal_desc uk-modal-body">
													        			<a class="sy_close_modal_desc uk-modal-close" uk-icon="icon: close" ></a>
													        			<h3><?php echo $acttitle ?></h3>
														        		<?php if ($decodedAct->{'actimage'} != ""): ?>
														        			<div class="sy-image-desc"><img src="<?php echo esc_attr($decodedAct->{'actimage'}) ?>"></div>
														        		<?php endif ?>
														        		<?php if ($decodedAct->{'actdescription'} != ""): ?>
														        			<div class="sy-text-desc"><?php echo esc_attr($decodedAct->{'actdescription'}) ?></div>
														        		<?php endif ?>
														        	</div>
													        	</div>
												        	<?php endif ?>
												        </div>
												    </li>
												    <div class="sy-infofields-container">
												    	<div class="sy-infofields-<?php echo $decodedplanAct->{'id_cell'} ?> sy-infofield">
												    		<?php if ($decodedAct->{'actimage'} && $decodedAct->{'imgtooltip'}):?>
												    		<div class="sy-imagefield">
												    			<img src="<?php echo esc_attr($decodedAct->{'actimage'}) ?>">
												    		</div>
												    		<div class="sy-actTitle">
													    		<?php echo $decodedAct->{'actname'} ?>
													    	</div>
												    		<?php endif ?>
												    		<?php if ($decodedAct->{'acttooltiptext'} != ""):?>
												    		<div class="sy-tooltipfield">
												    			<?php echo esc_attr($decodedAct->{'acttooltiptext'}) ?>
												    		</div>
												    		<?php endif ?>
												    	</div>
												    </div>
											<?php	}// fin if id_cell == idul
											}// fin for arrayplanAct
										}// fin if $data[0]->scheduledact ?>
						   			</ul>	
						   		<?php }// fin for $cell
						   	?>
					   	</div>
			   		</div>  					
	   				<?php } // fin for $number ?>
			</div> <!-- fin fullplanning -->
			<?php $variationCount++; ?>
			<?php endforeach ?>
		</div> 
		<?php endif ?> <!-- fin if ($model[0]->type == 0) -->
		<script type="text/javascript">
		//Créé une class avec les style de l'activité'
			function createClass(name,rules, data){
			    var style = document.createElement('style');
			    style.type = 'text/css';
			    document.getElementsByTagName('head')[0].appendChild(style);
			    if(!(style.sheet||{}).insertRule) 
			        (style.styleSheet || style.sheet).addRule(name, rules, data);
			    else
			        style.sheet.insertRule(name+"{"+rules+":"+data+"}",0);
			}

			var easyId = jQuery('.fullplanning').attr('data-id');
			/*
			var descOpt = {
	            closeText: "x",
	            autoOpen: false,
	            width: 'auto',
	            modal: true,
	            show: {
	            	effect: "fadeIn",
	            	direction: "up",
	            	duration: 200
	            },
	            hide: {
	            	effect: "fadeOut",
	            	direction: "up",
	            	duration: 200
	            },
	            open:function () {
	            	jQuery(".ui-dialog ").addClass("syet-description");

	            	var windowWidth = jQuery(window).width();
	            	console.log(windowWidth);
		        }
	        };
*/
	        jQuery('.easytimetable-'+easyId).find('ul').each(function(){
	        	if (jQuery(this).find('li').length == 0)
	        	{
	        		//On signale que la ul est vide
	        		jQuery(this).addClass('empty');
	        	}
	        	else {
	        		//On signale que la ul est pleine
	        		jQuery(this).addClass('full');
	        		var timeH = jQuery(this).find('.time').height();
	        		var nameH = jQuery(this).find('.acttitle').height();
	        		var infoH = jQuery(this).find('.sy-actincelltext').height();
	        		var thisH = jQuery(this).height();

	        		//ON calcule la hauteur du contenu
	        		var contentH = timeH + nameH + infoH;
	        		//SI la hauteur du contenu est plus gd que la hauteur de la ul on n'affiche pas le contenu
	        		if(contentH > thisH) {
	        			jQuery(this).find('.sy-actincelltext').css('display', 'none');
	        		}
	        	}
	        })


			jQuery('.easytimetable-'+easyId).find('li').each(function(){
				var thisWidth = jQuery(this).css("width")+ " !important";
				jQuery('.sy-infofields-'+thisIdCell).css('width',thisWidth);
				var thisId = "#" + jQuery(this).attr('data-li-id');
				var thisIdCell = jQuery(this).attr('data-idcell');
				var thisClass = "." + jQuery(this).attr('data-li-id');
				var thisColor = "#" +  jQuery(this).attr('data-color')+ " !important";
				var thisFontColor = "#" +  jQuery(this).attr('data-fontcolor')+ " !important";
				var thisFontOColor = "#" +  jQuery(this).attr('data-fontovercolor')+ " !important";
				var bgover = "#" + jQuery(this).attr('data-overcolor') + " !important";
				var showdesc = jQuery(this).attr('data-showdesc');
				var imgtooltip = jQuery(this).attr('data-imgtooltip');
				// lance la dialog de description si showdesc == 1
				if (showdesc == 1)
				{
					jQuery(this).addClass('sy-displaydesc');
					var thisDesc = jQuery(this).find('.sy-description-'+thisIdCell).html();
					/*
					jQuery(this).on('click', function(){
						//thisDesc.dialog('open');
						//jQuery('body').addClass('nooverflow'); 
					})
					*/
					UIkit.util.on(this, 'click', function (e) {
			           e.preventDefault();
			           e.target.blur();
			           UIkit.modal.dialog(thisDesc);
			       });
				}
				// Lance le tooltip
				if ((jQuery(this).attr('data-image') != "" && imgtooltip == 1) || jQuery(this).attr('data-tooltiptext') != "")
				{
					jQuery(thisId).tooltipster({
						trigger: "hover",
						delay:0,
						theme: 'tooltipster-borderless'
					});
				}
				
				jQuery(this).on('mouseover', function(){
					createClass(thisClass,"background",bgover);
					createClass(".arrowborder","border-top-color",bgover);
					jQuery('.tooltipster-base').find('.tooltipster-box').addClass(jQuery(this).attr('data-li-id'));
					jQuery('.tooltipster-arrow').find('.tooltipster-arrow-background').addClass("arrowborder");
					jQuery('.tooltipster-arrow').find('.tooltipster-arrow-border').addClass("arrowborder");
				})

				jQuery(this).on('mouseenter', function(){
        			jQuery(this).css('background-color', bgover);
        			jQuery(this).css('color', thisFontOColor);
        		});
        		jQuery(this).on('mouseleave', function(){
        			jQuery(this).css('background-color', thisColor);
        			jQuery(this).css('color', thisFontColor);
        		});
			})
			var lid = jQuery('.fullplanning').attr('data-id');
			var scaledElement = jQuery("#easytimetable-"+ lid).clone().css({
				'transform': 'scale(3,3)',
				'-ms-transform': 'scale(3,3)',
				'-webkit-transform': 'scale(3,3)'
			}).addClass("scaled-element");
			
			jQuery("body").append("<div style='display:none;width:200%' class='sy-print-container'><div id='sy-thisprint'>"+scaledElement.html()+"</div></div>");
			var timetableTitle = jQuery('.timetable-title').text();
			jQuery('#sy-thisprint').prepend("<h1>"+timetableTitle+"</h1>");
			var ulHeight = jQuery('#sy-thisprint').find('ul').height() * 3;
			jQuery('#sy-thisprint').find('ul').each(function(){
				jQuery(this).height(ulHeight);
				jQuery(this).find('.acttitle').css("font-size", "38px");
				jQuery(this).find('.time').css("font-size", "38px");
				jQuery(this).find('.time').css("padding", "30px");
				jQuery(this).find('.sy-actincelltext').css("padding", "20px");
				jQuery(this).find('.sy-actincelltext').css("font-size", "30px");
				jQuery(this).find('.sy-actincelltext').css("line-height", "42px");
			}); 
			jQuery('#sy-thisprint').find('.col-title').each(function(){
				jQuery(this).css("font-size", "38px");
				jQuery(this).css("text-align", "center");
			}); 

			jQuery('.sy-print').on('click', function(){
				jQuery('.sy-print-container').css('display', 'block');
				html2canvas(jQuery('#sy-thisprint'), {
			    	useCORS: true,
					allowTaint: true,
					letterRendering: true,
  					onrendered: function(canvas) {
  						var w=window.open();
    					//w.document.write("<h3 style='text-align:center;'>Titre</h3>");
				      	w.document.write("<div style='width:100%;'><img style='margin: 0 auto;' width='100%' src='"+canvas.toDataURL()+"' /></div>");
				      	w.print();
			      	}
			    });
			    
			})
			jQuery(".next-variation").click(function()
			{
				var varNumber = parseInt(jQuery(this).attr("data-variation"));
				var thisweek = parseInt(jQuery(this).attr("data-thisweek"));
				var nextWeek = thisweek + 1;
				var thisYear = new Date();
				if(thisweek > 51 )
				{
					thisYear = thisYear.getFullYear()+1;
				}
				else{
					thisYear = thisYear.getFullYear();
				}
				
				//console.log(thisYear);
				
				var nextWeek = thisweek + 1;
				if (thisweek > 51)
				{
					var realNextWeek = nextWeek - 52;
				}
				else
				{
					var realNextWeek = nextWeek;
				}
				// Fonction pour récupérer le jour correspondant à la semaine et à la colonne
				function getDateOfWeek(day, w, y) {
							    var d = (1 + (w - 1) * 7); // 1st of January + 7 days for each week
							    d += day;
							    
							    if(y == 2018)
							    {
							    	d = d-1;
							    }
							    
							    else if (y == 2019)
							    {
							    	d = d-2;
							    }
							    else if (y == 2020)
							    {
							    	d = d-3;
							    }
							    else if (y == 2021)
							    {
							    	d = d-5;
							    }
							    else if (y == 2022)
							    {
							    	d = d-6;
							    }
							    else if (y == 2023)
							    {
							    	d = d-7;
							    }
							    //console.log(new Date(y, 0, d));
						    	return new Date(y, 0, d);
							}
				jQuery(".timetable-container").find(".fullplanning").each(function()
				{
					var arrayWeeks = jQuery(this).attr("data-weeks").split(",");

					if (arrayWeeks.indexOf(realNextWeek.toString()) != -1)
					{
						
						jQuery(this).removeClass("invisible");
					}
					else
					{
						jQuery(this).addClass("invisible");
						
					}
					if (!jQuery(this).hasClass("invisible"))
					{
						jQuery(this).find(".col-title").each(function()
						{
							var colNumber = jQuery(this).parent(".rows").attr("id");

							var thizDay = parseInt(jQuery(this).find(".sy-dayname").attr("data-day"));

							
							var difference = parseInt(colNumber) - thizDay;

							if (difference > 0)
							{
								thizDay += 7;
							}
							var myDay = getDateOfWeek(thizDay, realNextWeek, thisYear);
							var syDay, syMonth, syYear;
							if (myDay.getDate() < 10)
							{
								syDay = "0" + myDay.getDate();
							}
							else 
							{
								syDay = myDay.getDate();
							}
							if ((myDay.getMonth() +1) < 10)
							{
								syMonth = "0" + (myDay.getMonth() + 1);
							}
							else 
							{
								syMonth = myDay.getMonth() + 1;
							}
							var finalDay = syDay + "." + syMonth + "." + myDay.getFullYear();
							jQuery(this).find(".sy-thedate").html(finalDay);
						})
					}
				})
				jQuery(this).attr("data-thisweek", nextWeek);
				jQuery(".prev-variation").attr("data-thisweek", nextWeek);
				//jQuery(".sy-variation-to-print").remove();
				//getvariation();
				//tooltipPrint();
			})

			jQuery(".prev-variation").click(function()
			{
				var varNumber = parseInt(jQuery(this).attr("data-variation"));
				var thisweek = parseInt(jQuery(this).attr("data-thisweek"));
				var prevWeek = thisweek - 1;
				var thisYear = new Date();
				if(thisweek > 53 )
				{
					thisYear = thisYear.getFullYear()+1;
				}
				else{
					thisYear = thisYear.getFullYear();
				}
				
				console.log(thisYear);
				
//console.log(thisweek);				
				if (thisweek > 53)
				{
					var realPrevWeek = prevWeek - 52;
				}
				else
				{
					var realPrevWeek = prevWeek;
				}
				// Fonction pour récupérer le jour correspondant à la semaine et à la colonne
				function getDateOfWeek(day, w, y) {
				    var d = (1 + (w - 1) * 7); // 
					    d += day;
		
						if(thisYear == 2018)
						{
							d = d-1;
						}	
						else if (y == 2019)
					    {
					    	d = d-2;
					    }
					    else if (y == 2020)
					    {
					    	d = d-3;
					    }
					    else if (y == 2021)
					    {
					    	d = d-5;
					    }
					    else if (y == 2022)
					    {
					    	d = d-6;
					    }
					    else if (y == 2023)
					    {
					    	d = d-7;
					    }
					    //console.log(new Date(y, 0, d));		    
				    	return new Date(y, 0, d);
				}
				jQuery(".timetable-container").find(".fullplanning").each(function()
				{
					var arrayWeeks = jQuery(this).attr("data-weeks").split(",");

					if (arrayWeeks.indexOf(realPrevWeek.toString()) != -1)
					{
						
						jQuery(this).removeClass("invisible");
					}
					else
					{
						jQuery(this).addClass("invisible");
						
					}
					if (!jQuery(this).hasClass("invisible"))
					{
						jQuery(this).find(".col-title").each(function()
						{
							var colNumber = jQuery(this).parent(".rows").attr("id");
							var thizDay = parseInt(jQuery(this).find(".sy-dayname").attr("data-day"));

							
							var difference = parseInt(colNumber) - thizDay;

							if (difference > 0)
							{
								thizDay += 7;
							}
							var myDay = getDateOfWeek(thizDay, realPrevWeek, thisYear);
							var syDay, syMonth, syYear;
							if (myDay.getDate() < 10)
							{
								syDay = "0" + myDay.getDate();
							}
							else 
							{
								syDay = myDay.getDate();
							}
							if ((myDay.getMonth() +1) < 10)
							{
								syMonth = "0" + (myDay.getMonth() + 1);
							}
							else 
							{
								syMonth = myDay.getMonth() + 1;
							}
							var finalDay = syDay + "." + syMonth + "." + myDay.getFullYear();
							jQuery(this).find(".sy-thedate").html(finalDay);
						})
					}
				})

				jQuery(this).attr("data-thisweek", prevWeek);
				jQuery(".next-variation").attr("data-thisweek", prevWeek);
				//jQuery(".sy-variation-to-print").remove();
				//getvariation();
				//tooltipPrint();
			})
		</script>
	<?php }
	else 
	{ 
		_e( 'This timetable does not exist, please try another id.','easytimetable-responsive-schedule-management-system' ); 

	}
}

}