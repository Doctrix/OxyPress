<?php

/**
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    Easyscroller
 * @subpackage Easyscroller/admin/views
 */

if (!defined('WPINC')){die;}

require_once SYET_PATH . 'admin/models/EasyTimetableModelCreate.php';

class EasyTimetableViewCreate {

	public function __construct($model) {
		
	}

	public static function syet_display() 
	{
		global $wp_roles;
	    $roles = $wp_roles->get_names();
	    global $wp_locale;
	    $wkTtStart = (int)get_option("start_of_week");
		$ajax_nonce = wp_create_nonce( "nonce_easytimetable" );		
		?>
		<div class="sy-admin-container">
			<h1><?php _e( 'EasyTimetable - Generate a schedule', 'easytimetable-responsive-schedule-management-system' ); ?></h1>
			<div class="sy-form-container newplanning">
				<form id="newone" method="POST" action="">
					<input id="planning_id" type="hidden" name="planning_id" value="">
					<input id="creation_date" type="hidden" name="creation_date" value="<?php echo date("Y-m-d H:i:s") ?>">
					<div class="forminput">
						<div class="labeldecadix">
							<label  for="p_name"><?php _e( 'Title', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="p_name" type="text" placeholder="<?php _e( 'Enter a title', 'easytimetable-responsive-schedule-management-system' ); ?>" name="p_name" value="">
					</div>
					<input id="planning_id" type="hidden" name="planning_id" value="">
					<div class="forminput">
						<div class="labeldecadix">
							<label for="time_mode"><?php _e( 'Time mode', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="time_mode" name="time_mode">
							<option value="0"><?php _e( '24h', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<option value="1"><?php _e( '12h', 'easytimetable-responsive-schedule-management-system' ); ?></option>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="type"><?php _e( 'Type', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="type" name="type">
							<option value="0" selected><?php _e( 'Fixed', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<option value="1" disabled><?php _e( 'Adaptative', 'easytimetable-responsive-schedule-management-system' ); ?></option>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="display_title"><?php _e( 'Display Title', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="display_title" name="display_title">
							<option value="0"><?php _e( 'No', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<option value="1" selected><?php _e( 'Yes', 'easytimetable-responsive-schedule-management-system' ); ?></option>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="display_filters"><?php _e( 'Display filters', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="display_filters" name="display_filters">
							<option value="0" selected><?php _e( 'No', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<option value="1" disabled><?php _e( 'Yes', 'easytimetable-responsive-schedule-management-system' ); ?></option>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="start_h"><?php _e( 'Start Time', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="start_h" class="start_h" type="text" placeholder="Start Time" name="start_h" value="">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="rows"><?php _e( 'Columns', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="rows" type="number" name="rows" max="7"  placeholder="columns" value="5">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="cells"><?php _e( 'Cells', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="cells" type="number" name="cells" max="10" placeholder="Cells" value="8">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="height"><?php _e( 'Height', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="height" type="number" name="height" min="50" value="60">
					</div>
					<div class="forminput cellcolor">
						<div class="labeldecadix">
							<label for="cell_color"><?php _e( 'Cell color', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="cell_color" type="text" name="cell_color" value="f5f5f5">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="rows_name"><?php _e( 'Custom column names', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<textarea form="newone" id="rows_name" name="rows_name" placeholder="<?php _e( 'Enter names separated by comma', 'easytimetable-responsive-schedule-management-system' ); ?>"></textarea>
					</div>
					<div class="forminput description">
						<div class="labeldecadix">
							<label for="description"><?php _e( 'Description', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<textarea form="newone" id="description" name="description" placeholder="<?php _e( 'Enter a description', 'easytimetable-responsive-schedule-management-system' ); ?>"></textarea>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="print"><?php _e( 'Print', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="print" name="print">
							<option value="0" selected><?php _e( 'No', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<option value="1" disabled><?php _e( 'Yes', 'easytimetable-responsive-schedule-management-system' ); ?></option>
						</select>
					</div>
					<div class="forminput">
						<input id="activities" type="hidden" name="activities" value=''>
					</div>
					<div class="forminput">
						<input id="scheduledact" type="hidden" name="scheduledact" value=''>
					</div>
					<div class="forminput">
						<input id="days" type="hidden" name="days" data-start-week="<?php echo $wkTtStart ?>" value=''>
					</div>
					<input id="created_by" type="hidden" name="created_by" value="<?php echo wp_get_current_user()->ID ?>">
					<input id="access" type="hidden" name="access" value="0">
					<div class="forminput">
						<div class="labeldecadix">
							<label class="editortip" for="editor" data-tooltip-content=".syet_role_tooltip_free"><?php _e( 'Editor', 'easytimetable-responsive-schedule-management-system' ); ?><i>
								<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="16px" height="15.089px" viewBox="0 0 16 15.089" enable-background="new 0 0 16 15.089" xml:space="preserve">
									<g>
										<g>
											<g>
												<path fill="#FA971E" d="M15.882,13.609L8.903,0.532C8.729,0.205,8.388,0,8.017,0H8.016C7.644,0,7.304,0.204,7.129,0.531
													l-7.01,13.077c-0.167,0.314-0.158,0.69,0.023,0.992c0.182,0.303,0.51,0.489,0.863,0.489h13.988c0.354,0,0.681-0.185,0.863-0.489
													C16.039,14.297,16.048,13.921,15.882,13.609z M8.016,13.077c-0.555,0-1.006-0.451-1.006-1.006c0-0.555,0.451-1.006,1.006-1.006
													c0.554,0,1.006,0.451,1.006,1.006C9.021,12.626,8.571,13.077,8.016,13.077z M9.022,9.069c0,0.556-0.452,1.006-1.006,1.006
													c-0.555,0-1.006-0.45-1.006-1.006V5.046c0-0.555,0.451-1.006,1.006-1.006c0.554,0,1.006,0.451,1.006,1.006V9.069z"/>
											</g>
										</g>
									</g>
								</svg>
							</i></label>
							
						</div>
						<select id="editor" name="editor">
							<option value="0">Select a user</option>
							<?php $blogusers = get_users( 'blog_id=1&orderby=nicename' ); ?>
							<?php $syet_editor = $data[0]->editor ?>
							<?php foreach ( $blogusers as $user ): ?>
									<option value="<?php echo esc_html( $user->ID ) ?>" disabled><?php echo esc_html( $user->user_nicename ) ?></option>

							<?php endforeach ?>	
							
						</select>
					</div>
					<input id="saveSecurity" type="hidden" name="saveSecurity" value="<?php echo esc_html($ajax_nonce) ?>">
					<div class="sy-form-button">
					  	<a class="exitButton" id="et_exit" href="admin.php?page=easy-timetable"><?php _e( 'Cancel', 'easytimetable-responsive-schedule-management-system' ); ?></a>
					  	<input class="saveButton" id="et_save" type="submit" value="<?php _e( 'Save', 'easytimetable-responsive-schedule-management-system' ); ?>" >
				  	</div>
				</form>	
			</div>
		</div>
		<div style="display:none">
			<div class="syet_role_tooltip_free"><?php _e( '<strong>Extended version feature.</strong><br/>Only an Administrator can attribute a schedule to a user. <br/>An Administrator can always edit the schedule. <br/>If schedule creation is allowed to a lower access role, the user who creates the schedule is by default the manager of this schedule.', 'easytimetable-responsive-schedule-management-system' ); ?></div>
			<div class="syet_role_tooltip"><?php _e( 'Only an Administrator can attribute a schedule to a user. <br/>An Administrator can always edit the schedule. <br/>If schedule creation is allowed to a lower access role, the user who creates the schedule is by default the manager of this schedule.', 'easytimetable-responsive-schedule-management-system' ); ?></div>
		</div>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			jQuery("#rows_name").tooltipster({
				theme: 'tooltipster-light',
				side: 'right',
				distance: 20
			});

			jQuery(".editortip").tooltipster({
				theme: 'tooltipster-borderless',
				side: 'top',
				maxWidth: 250,
				distance: 20
			});
			// Colpick selecteur
			jQuery('#cell_color').colpick({
		        layout:'hex',
				submit:0,
				colorScheme:'dark',
				onChange:function(hsb,hex,rgb,el,bySetColor) {
			        jQuery('.ui-dialog-buttonset').find('button').eq(1).css('display', "inline-block");    
					jQuery(el).css('border-color','#'+hex);
					// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
					if(!bySetColor) jQuery(el).val(hex);
				}
			}).keyup(function(){
				jQuery(this).colpickSetColor(this.value);   
	        });
		
			// Datetimepicker
			var counter = 0;
			var starth1;
			if (!jQuery(".fullplanning").attr('data-time-mode')) {
	            jQuery(".start_h").datetimepicker({
	                format:'H:i',
	                formatTime:'H:i',
	                step:5,
	                closeOnTimeSelect:true,
	                timepicker:true,
	                datepicker:false,
	                onSelectTime:function(ct){
	                    start_h1 = jQuery("#start_h").val();
	                    jQuery("#start_h").attr('value', start_h1);
	                    if (jQuery("#start_h").hasClass("sy-emptyfield"))
						{
							jQuery("#start_h").removeClass("sy-emptyfield");
						}
	                }
	            });
	        }
	        else {
	            if (jQuery(".fullplanning").attr('data-time-mode') == 0) { 
	                jQuery(".start_h").datetimepicker({
	                    format:'H:i',
	                    formatTime:'H:i',
	                    step:5,
	                    closeOnTimeSelect:true,
	                    timepicker:true,
	                    datepicker:false,
	                    onSelectTime:function(ct){
		                    start_h1 = jQuery("#start_h").val();
		                    jQuery("#start_h").attr('value', start_h1);
		                    if (jQuery("#start_h").hasClass("sy-emptyfield"))
							{
								jQuery("#start_h").removeClass("sy-emptyfield");
							}
		                }
	                });
	            }
	            else {
	                jQuery(".start_h").datetimepicker({
	                    format:'g:i a',
	                    formatTime:'g:i a',
	                    step:5,
	                    closeOnTimeSelect:true,
	                    timepicker:true,
	                    datepicker:false,
	                    onSelectTime:function(ct){
		                    start_h1 = jQuery("#start_h").val();
		                    jQuery("#start_h").attr('value', start_h1);
		                    if (jQuery("#start_h").hasClass("sy-emptyfield"))
							{
								jQuery("#start_h").removeClass("sy-emptyfield");
							}
		                }
	                });
	            }
	        } // Fin else
	        
	        jQuery("#time_mode").mousedown(function() {
	        	if (jQuery(this).val() == 1) 
	        	{
	        		jQuery(".start_h").datetimepicker({
		                format:'g:i a',
		                formatTime:'g:i a',
		                step:5,
		                closeOnTimeSelect:true,
		                timepicker:true,
		                datepicker:false,
		                onSelectTime:function(ct){
		                    start_h1 = jQuery("#start_h").val();
		                    jQuery("#start_h").attr('value', start_h1);
		                    if (jQuery("#start_h").hasClass("sy-emptyfield"))
							{
								jQuery("#start_h").removeClass("sy-emptyfield");
							}
		                }
		            });
	        	}
	        	else 
	        	{
	        		jQuery(".start_h").datetimepicker({
		                format:'H:i',
		                formatTime:'H:i',
		                step:5,
		                closeOnTimeSelect:true,
		                timepicker:true,
		                datepicker:false,
		                onSelectTime:function(ct){
		                    start_h1 = jQuery("#start_h").val();
		                    jQuery("#start_h").attr('value', start_h1);
		                    if (jQuery("#start_h").hasClass("sy-emptyfield"))
							{
								jQuery("#start_h").removeClass("sy-emptyfield");
							}
		                }
		            });
	        	}
	        });    
			jQuery(".start_h").disableSelection();
            
        });
		</script>
		<?php 
	}// fin Save planning

	public static function syet_editPlanning($data) 
	{
		add_action("admin_enqueue_scripts", "syet_my_media_gallery_to_insert_in_activity");
		global $wp_roles;
	    $roles = $wp_roles->get_names();
	    global $wp_locale;
	    $wkTtStart = (int)get_option("start_of_week");
		// On récupère les activités
		$activities = stripslashes($data[0]->activities);
		// On récupère les activités planifiées
		$scheduledacts = stripslashes($data[0]->scheduledact);

		// update to v 1.3.0
		if ($data[0]->scheduledact)
		{	
			if (preg_match('/^{"d/', $scheduledacts))
			{
				$arrayplanAct = explode(",{", $scheduledacts);
				$arrayplanAct_length = count($arrayplanAct);
				$finalString = "";
				$debutSched = '{"timetables":{"0":{"scheduledacts":{';
				$finSched = '},"weeks":{"1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10,"11":11,"12":12,"13":13,"14":14,"15":15,"16":16,"17":17,"18":18,"19":19,"20":20,"21":21,"22":22,"23":23,"24":24,"25":25,"26":26,"27":27,"28":28,"29":29,"30":30,"31":31,"32":32,"33":33,"34":34,"35":35,"36":36,"37":37,"38":38,"39":39,"40":40,"41":41,"42":42,"43":43,"44":44,"45":45,"46":46,"47":47,"48":48,"49":49,"50":50,"51":51,"52":52}}}}';
				for ($i = 0 ; $i < $arrayplanAct_length ; $i++) {
					
					if ( $i >= 1 && preg_match('/^"d/', $arrayplanAct[$i])) {
						// on ajoute le délimiteur de json enlevé lors de la conversion en tableau ci-dessus
						$arrayplanAct[$i] = '{' . $arrayplanAct[$i];
						$arrayplanAct[$i] = '"' . $i . '":' . $arrayplanAct[$i];

						// On décode la string en objet json
						$decodedplanAct = json_decode($arrayplanAct[$i]);
					} // Fin if $i >= 1
					else {
						$arrayplanAct[$i] = '"' . $i . '":' . $arrayplanAct[$i];
						$decodedplanAct = json_decode($arrayplanAct[$i]);
					} // fin else
					if ($i != ($arrayplanAct_length - 1))
					{
						$finalString .= $arrayplanAct[$i].",";
					}
					else
					{
						$finalString .= $arrayplanAct[$i];
					}
				}
				$finalString = $debutSched . $finalString . $finSched;
				$scheduledacts = $finalString;
			}
		}

		// fin update to v 1.3.0
		if (empty($data[0]->days) || $data[0]->days == "")
		{
			
			$jsondays = '{"days":{';
			$daysTab = array();
			// On recherche le jour de début de la semaine (option wp)
			// On défini le nom des jours en fonction du jour de début de semaine et du nombre de colonnes
			for ($i = 0 ; $i < (int)$data[0]->rows ; $i++) {
				
				if ($i < (int)$data[0]->rows-1)
				{
					$theday = $i+$wkTtStart;
					$jsondays .= '"'.$i.'":"'.$theday.'",';
				}
				else 
				{
					$theday = $i+$wkTtStart;
					$jsondays .= '"'.$i.'":"'.$theday.'"';
				}
			}
			$jsondays .= '}}';
			$jsondays = json_encode($jsondays);
			$jsondays = json_decode($jsondays, false);
		}
		else 
		{
			$jsondaysArray = json_decode(stripslashes($data[0]->days), true);
			$jsondays = stripslashes($data[0]->days);
		}
		// On définie les noms des jours
		if (!empty($data[0]->rows_name))
		{
			//Custom names si renseignés
			$dayname = explode(",", $data[0]->rows_name);
		}
		else
		{
			// sinon, les jours de la semaine dans la langue du site
			$dayname = array();
			foreach ($jsondaysArray['days'] as $key => $days) {
				array_push($dayname, $wp_locale->get_weekday($days));
			}	
		}
		$listofDays = array();
		for ($i=0; $i < 7 ; $i++) 
		{
			$oneday = $i;
			if ($oneday == 7)
		{
			$oneday = 0;
		} 
			array_push($listofDays, $wp_locale->get_weekday($oneday));
		}
		// On récupère les activités planifiées
		$jsonTimetable = json_decode($scheduledacts, true);
		// On transforme la chaîne des activités en tableau
		$arrayAct = explode(",{", $activities);
		// On transforme la chaîne des activités planifiées en tableau

		$arrayAct_length = count($arrayAct);
		$ajax_nonce = wp_create_nonce( "nonce_easytimetable" );	
	?>
		
			<h1><?php printf(__( 'EasyTimetable - Edit Timetable - %s', 'easytimetable-responsive-schedule-management-system' ), esc_html($data[0]->p_name)); ?></h1>
			<div class="sy-configuration button"><?php _e( 'Timetable Configuration', 'easytimetable-responsive-schedule-management-system' ); ?></div>
			<div id="create" class="createnew button"><?php _e( 'Create a new activity', 'easytimetable-responsive-schedule-management-system' ); ?></div>
			<div id="sydays" class="daysbutton button"><?php _e( 'Days', 'easytimetable-responsive-schedule-management-system' ); ?></div>			
			<div class="ultimate-submit button" data-changes="0">
				<label for="et_modify"><?php _e( 'Save', 'easytimetable-responsive-schedule-management-system' ); ?></label><div class="preloader" style="display:none;"><img src="<?php echo plugins_url( 'images/loading.png', __FILE__ ); ?>"></div>
			</div>
			<div id="sy-exit" class="sy-exit button"><a href="admin.php?page=easy-timetable" target="_self"><?php _e( 'Exit', 'easytimetable-responsive-schedule-management-system' ); ?></a></div>
			<div class="sy-form-container">
				<h3><?php _e( 'Timetable configuration', 'easytimetable-responsive-schedule-management-system' ); ?></h3>
				<form id="newone" name="newone" method="POST" action="">
					<input id="planning_id" type="hidden" name="planning_id" value="<?php echo esc_attr($data[0]->id) ?>">
					<input id="creation_date" type="hidden" name="creation_date" value="<?php echo esc_attr($data[0]->creation_date) ?>">
					<div class="forminput">
						<div class="labeldecadix">
							<label  for="p_name"><?php _e( 'Title', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="p_name" class="p_name" type="text" name="p_name" placeholder="<?php _e( 'Enter a title', 'easytimetable-responsive-schedule-management-system' ); ?>" value="<?php echo $data[0]->p_name ?>">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="time_mode"><?php _e( 'Time mode', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="time_mode" class="time_mode" name="time_mode" disabled>
							<?php if( $data[0]->time_mode == 0): ?>
								<option value="0" selected><?php _e( '24h', 'easytimetable-responsive-schedule-management-system' ); ?></option>
								<option value="1"><?php _e( '12h', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<?php else: ?>
								<option value="0"><?php _e( '24h', 'easytimetable-responsive-schedule-management-system' ); ?></option>
								<option value="1" selected><?php _e( '12h', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<?php endif ?>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="type"><?php _e( 'Type', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="type" class="sy-type" name="type" disabled>
							<?php if( $data[0]->type == 0): ?>	
								<option value="0" selected><?php _e( 'Fixed', 'easytimetable-responsive-schedule-management-system' ); ?></option>
								<option value="1"><?php _e( 'Adaptative', 'easytimetable-responsive-schedule-management-system' ); ?></option>	
							<?php else: ?>
								<option value="0"><?php _e( 'Fixed', 'easytimetable-responsive-schedule-management-system' ); ?></option>
								<option value="1" selected><?php _e( 'Adaptative', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<?php endif ?>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="display_title"><?php _e( 'Display Title', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="display_title" class="display-title" name="display_title">
							<?php if( $data[0]->display_title == 0): ?>
								<option value="0" selected><?php _e( 'No', 'easytimetable-responsive-schedule-management-system' ); ?></option>
								<option value="1"><?php _e( 'Yes', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<?php else: ?>
								<option value="0"><?php _e( 'No', 'easytimetable-responsive-schedule-management-system' ); ?></option>
								<option value="1" selected><?php _e( 'Yes', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<?php endif ?>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="display_filters"><?php _e( 'Display filters', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="display_filters" name="display_filters">
							<option value="0" selected><?php _e( 'No', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<option value="1" disabled><?php _e( 'Yes', 'easytimetable-responsive-schedule-management-system' ); ?></option>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="start_h"><?php _e( 'Start Time', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="start_h" class="start_h" type="text" name="start_h" placeholder="<?php _e( 'Start Time', 'easytimetable-responsive-schedule-management-system' ); ?>" value="<?php echo $data[0]->start_h ?>">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="rows"><?php _e( 'Columns', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="rows" type="number" name="rows" max="7" value="<?php echo esc_attr($data[0]->rows) ?>">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="cells"><?php _e( 'Cells', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="cells" type="number" name="cells" max="10" value="<?php echo esc_attr($data[0]->cells) ?>">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="cell_color"><?php _e( 'Cell color', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="cell_color" type="text" name="cell_color" value="<?php echo esc_attr($data[0]->cell_color) ?>">
					</div>
					
					<div class="forminput">
						<div class="labeldecadix">
							<label for="height"><?php _e( 'Height', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<input id="height" type="number" min="50" name="height" value="<?php echo esc_attr($data[0]->height) ?>">
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="print"><?php _e( 'Print', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<select id="print" name="print">
							<option value="0" selected><?php _e( 'No', 'easytimetable-responsive-schedule-management-system' ); ?></option>
							<option value="1" disabled><?php _e( 'Yes', 'easytimetable-responsive-schedule-management-system' ); ?></option>
						</select>
					</div>
					<div class="forminput">
						<div class="labeldecadix">
							<label for="rows_name"><?php _e( 'Column names', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<textarea form="newone" id="rows_name" rows="2" cols="45" name="rows_name" placeholder="<?php _e( 'Enter names separated by comma', 'easytimetable-responsive-schedule-management-system' ); ?>"><?php echo esc_html($data[0]->rows_name) ?></textarea>
					</div>
					<div class="forminput description">
						<div class="labeldecadix">
							<label for="description"><?php _e( 'Description', 'easytimetable-responsive-schedule-management-system' ); ?></label>
						</div>
						<textarea form="newone" id="description" rows="4" cols="45" name="description" ><?php echo esc_textarea($data[0]->description) ?></textarea>
					</div>
					<div class="forminput">
						<input id="activities" type="hidden" name="activities" value='<?php echo esc_attr($activities) ?>'>
					</div>
					<div class="forminput">
						<input id="scheduledact" type="hidden" name="scheduledact" value='<?php echo esc_attr($scheduledacts) ?>'>
					</div>
					<div class="forminput">
						<input id="days" type="hidden" name="days" data-start-week="<?php echo $wkTtStart ?>" data-days-names="<?php echo implode(",", $listofDays); ?>" value='<?php echo $jsondays ?>'>
					</div>
					<div class="forminput">
						<input id="created_by" type="hidden" name="created_by" value="<?php echo esc_attr($data[0]->created_by) ?>">
					</div>
					<div class="forminput">
						<input id="access" type="hidden" name="access" value="0">
					</div>
					<input id="saveSecurity" type="hidden" name="saveSecurity" value="<?php echo esc_html($ajax_nonce) ?>">
					<div class="forminput">
					  	<input id="et_modify" name="et_modify" type="submit" value="<?php _e( 'Save', 'easytimetable-responsive-schedule-management-system' ); ?>" style="display:none;">
					  	<input id="et_exit" type="submit" value="Exit" style="display:none;">
				  	</div>
				</form>	
			</div> <!-- Fin formcontainer -->
			
			<?php if (esc_html($data[0]->type) == 0): ?>
				<div class="timetable-container">
					<div class="button-container">
		            	
		            	<!--<div id="loadAct" class="loadact button">Manage activities</div>-->
			    	</div>
			    	<div class="variation-option">
			    		<div id="period-settings" class="periodbutton button"><?php _e( 'Period', 'easytimetable-responsive-schedule-management-system' ); ?></div>
			    		<div id="add-variation" class="addvariation button" data-tooltip-content=".variation-extended"><?php _e( '+', 'easytimetable-responsive-schedule-management-system' ); ?></div>
			    		<div id="prev-variation" data-current="0" class="prevvariation button" style="display:none;"><?php _e( 'Previous', 'easytimetable-responsive-schedule-management-system' ); ?></div>
			    		<div id="next-variation" data-current="0" class="nextvariation button" style="display:none;"><?php _e( 'Next', 'easytimetable-responsive-schedule-management-system' ); ?></div>
			    	</div>
		    	<div id="theactivities" class="theactivities">
		    		<?php
		    		if ($data[0]->activities) {
				    	for ($i = 0 ; $i < $arrayAct_length ; $i++) {
							if ( $i >= 1) {
								// on ajoute le délimiteur de json enlevé lors de la conversion en tableau ci-dessus
								$arrayAct[$i] = '{'.$arrayAct[$i];
								// On décode la string en objet json
								$decodedAct = json_decode($arrayAct[$i]);
							} // Fin if $i >= 1
							else {
								$decodedAct = json_decode($arrayAct[$i]);
							} // fin else

								$re = '/%{3}/';
								$acttitle1 = preg_replace($re, "'", $decodedAct->{'actname'});
								//var_dump($acttitle1);
								$acttitle = rawurldecode(urldecode($acttitle1));
								//var_dump($acttitle1);
								/*
								$re = '/%{3}/g';
								$acttitle = preg_replace($re, "'", $acttitle1);
								*/
								?>
								<li id="activity-<?php echo $decodedAct->{'actid'} ?>" data-actincelltext="<?php echo esc_attr($decodedAct->{'actincelltext'}) ?>" data-tooltiptext="<?php echo esc_attr($decodedAct->{'acttooltiptext'}) ?>" data-imgtooltip="<?php echo esc_attr($decodedAct->{'imgtooltip'}) ?>" data-showdesc="<?php echo esc_attr($decodedAct->{'showdesc'}) ?>" data-name="<?php echo esc_attr($decodedAct->{'actname'}) ?>" data-description="<?php echo esc_attr($decodedAct->{'actdescription'}) ?>" data-color="<?php echo esc_attr($decodedAct->{'actcolor'}) ?>" data-overcolor="<?php echo esc_attr($decodedAct->{'actovercolor'}) ?>" data-fontcolor="<?php echo esc_attr($decodedAct->{'fontcolor'}) ?>" data-fontovercolor="<?php echo esc_attr($decodedAct->{'fontovercolor'}) ?>" data-image="<?php echo esc_attr($decodedAct->{'actimage'}) ?>" data-duration="<?php echo esc_attr($decodedAct->{'actduration'}) ?>" data-idacti="<?php echo esc_attr($decodedAct->{'actid'}) ?>" data-merge="<?php echo esc_attr($decodedAct->{'merge'}) ?>" class="activity-<?php echo esc_attr($decodedAct->{'actid'}) ?> activity act-<?php echo esc_attr($decodedAct->{'actid'}) ?>" style="background-color:#<?php echo esc_attr($decodedAct->{'actcolor'}) ?>;color:#<?php echo esc_attr($decodedAct->{'fontcolor'}) ?>;">
	            	                <form id="planactform" enctype="application/json">
		            	                <div id="nom" class="sy-name" style="color:#<?php esc_attr($decodedAct->{'fontcolor'}) ?>;"><?php echo $acttitle ?><div class="editacti" ></div><div class="deleteacti" ></div></div>
		                                <?php if ((int)$data[0]->type == 1): ?>
		                                    <input id="duree" name="duree" class="sy-duration-blank" style="width:45% !important;" type="text" value ="<?php echo esc_attr($decodedAct->{'actduration'}) ?>">
		                                <?php else: ?>
		                                    <input id="duree" name="duree" type="hidden" value ="<?php echo esc_attr($decodedAct->{'actduration'}) ?>">
		                                    <div id="duration" class="duration"><?php echo esc_attr($decodedAct->{'actduration'}) ?>'</div>
		                                <?php endif ?>
		            	                <input id="title" name="title" type="hidden" value = "<?php echo esc_attr($decodedAct->{'actname'}) ?>">
		            	                <input id="idacti" name="idacti" type="hidden" value = "">
		                                <input id="count" name="count" type="hidden" value = "">
		            	                <input id="id_cell" name="id_cell" type="hidden" value = "">
		            	                <input id="id_activity" name="id_activity" type="hidden" value ="<?php echo esc_attr($decodedAct->{'actid'}) ?>">
		            	                <input id="start_t" name="start_t" type="text" value = "" class="start invisible" placeholder="Début" style="color:#<?php echo esc_attr($decodedAct->{'fontcolor'}) ?>;">
		            	                <span class="invisible to" style="color:#<?php echo ($decodedAct->{'fontcolor'}) ?>;"> > </span>
		            	                <input id="end_t" name="end_t" type="text" value = "" class="end invisible" placeholder="Fin" style="color:#<?php echo esc_attr($decodedAct->{'fontcolor'}) ?>;">
		            	                <input id="status" name="status" type="hidden" value="1">
		            	            	<input id="htomove" name="htomove" type="hidden" value="">
		                                <input id="index" name="index" type="hidden" value="0">
		                                <input id="dateid" name="dateid" type="hidden" value="">
		                                <input id="merge" name="merge" type="hidden" value="0">
		                                <div class="sy-mergebutton invisible" data-tooltip-content=".merge-extended"></div>
		                            </form>
	            	            </li>
							<?php	
						} // fin for $i $arrayAct_length
					} // if $data[0]->activities
					?>
				</div>
				<?php $variationCount = 0; ?>
				<?php foreach ($jsonTimetable['timetables'] as $variation): ?>
				
				<?php $arrayplanAct = $variation["scheduledacts"]; ?>
				<?php $arrayplanAct_length = count($arrayplanAct); ?>
				<div class="thisplanning-<?php echo $variationCount ?>">
					<div class="fullplanning" data-columns="<?php echo $data[0]->rows ?>" data-variation="<?php echo $variationCount ?>" data-id="<?php echo esc_attr($data[0]->id) ?>" data-type="<?php echo esc_attr($data[0]->type) ?>" data-time-mode="<?php echo esc_attr($data[0]->time_mode) ?>" data-display-title="<?php echo esc_attr($data[0]->display_title) ?>" data-display-filters="<?php echo esc_attr($model[0]->display_filters) ?>" data-start-h="<?php echo esc_attr($data[0]->start_h) ?>" data-color="<?php echo esc_attr($data[0]->cell_color) ?>" data-rows="<?php echo esc_attr($data[0]->rows) ?>" data-cells="<?php echo esc_attr($data[0]->cells) ?>" data-height="<?php echo esc_attr($data[0]->height) ?>" data-column-names="<?php echo esc_attr($data[0]->rows_name) ?>">
						<h3><?php _e( 'Schedule ', 'easytimetable-responsive-schedule-management-system' ); ?><?php echo ($variationCount + 1) ?></h3>
						<?php $rows = $data[0]->rows;
		   				$rwidth= 95/$rows;

		   				for ($number=1;$number<=$rows;$number++) { ?>
		   				<div class="sy-row-container"  style="width:<?php echo $rwidth ?>%;">
						   	<div id="<?php echo $number ?>" class="row-<?php echo $number ?> rows" >
						   		<div class="col-title"><?php echo $dayname[$number-1] ?></div>
						   		<?php	
							   		$cells = $data[0]->cells;
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
							   			$tabAct = array();
							   			?>
							   			<ul id="cellule_<?php echo $idul ?>" class="creneau creneau<?php echo $idcell ?> <?php /*echo $empty*/ ?>" style="background-color:#<?php echo $data[0]->cell_color ?>;height:<?php echo $data[0]->height ?>px;">
							   			<?php if ($data[0]->scheduledact) { ?> 
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
													} // Fin if $i >= 1
													else {
														$decodedAct = json_decode($arrayAct[$actId]);
													} // fin else

													$re = '/%{3}/';
													$acttitle1 = preg_replace($re, "'", $decodedAct->{'actname'});
													//var_dump($acttitle1);
													$acttitle = rawurldecode(urldecode($acttitle1));
											        
											        if ($data[0]->time_mode == 1)
											        {
											            $timemodeStyle = "twelve";
											            $start = esc_attr($decodedplanAct->{'start_t'});
											            $end = esc_attr($decodedplanAct->{'end_t'}); 
											        }
											        else {
											            $start = substr(esc_attr($decodedplanAct->{'start_t'}), -8, 5);
											            $end = substr(esc_attr($decodedplanAct->{'end_t'}), -8, 5);
											            $timemodeStyle = "twentyfour";
											        } ?> 
											        <li id="act-<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?>-<?php echo $actCount ?>-<?php echo $variationCount ?>" data-count="<?php echo $actCount ?>" class="act-<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?> activite" style="background-color:#<?php echo esc_attr($decodedAct->{'actcolor'}) ?>;color:#<?php echo  esc_attr($decodedAct->{'fontcolor'}) ?>;">
												        <a class="supprimer-<?php echo $decodedplanAct->{'id_cell'} ?> del" data-showdesc="<?php echo $decodedplanAct->{'showdesc'} ?>" data-idacti="<?php echo $decodedplanAct->{'idacti'} ?>" data-idcell="<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?>" style="display: inline-block;"><script type='text/javascript'>jQuery(document).ready(function(){
												        	jQuery('.supprimer-<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?>').click(function() {
			                                                    idul = '#' + jQuery(this).parent('li').parent('ul').attr('id');
			                                                    jQuery(idul).removeClass('onlyone');
			                                                    var dataVariation = jQuery(this).parents('.fullplanning').attr('data-variation');
			                                                    var id_activity = jQuery(this).parent('li').find("input#id_activity").val();
												            	var idacti = parseInt(jQuery(this).parent('li').find("input#idacti").val());
																var id_cell = jQuery(this).parent('li').find("input#id_cell").val();
																var start_t = jQuery(this).parent('li').find("input#start_t").val();
																var end_t = jQuery(this).parent('li').find("input#end_t").val();
																
																function getPlanActData(variation) 
														        {
																	// Récupération et parse Json des données des activités plannifiées
																	var planActCount = 0;
																	if (jQuery('#scheduledact').val().length == 0) {
															        	var planActivityJSON = JSON.parse('{"timetables":{"0":{"scheduledacts":{}}}}');
															        	
															        	planActivities = planActivityJSON["timetables"]["0"]["scheduledacts"];
															        	id = 0;
															        	jQuery(this).find('#idacti').val(id);
															        }
															        else {
															        	var planActivityJSON = JSON.parse(jQuery('#scheduledact').val());
															        	
															        	var scheduledacts = planActivityJSON["timetables"][variation]["scheduledacts"];
															        	for ( property in scheduledacts )
																		{
																		   if(scheduledacts.hasOwnProperty(property))
																		   {
																		      planActCount++;
																		   }
																		}	
															        }
															        var planActDataArray = [planActivityJSON, planActCount]
															        return planActDataArray;
																}// Fin getPlanActData()

																//On récupère en JSON les données de input#scheduledact
																var planActData = getPlanActData(dataVariation);
																var planActivityJSON = planActData[0];
																var planActsCount = planActData[1];
														        for (var i = idacti; i < planActsCount; i++) 
														        {
														        	var j = parseInt(i) + 1;
														        	if (j < planActsCount) 
														        	{
														        		planActivityJSON["timetables"][dataVariation]["scheduledacts"][i] = planActivityJSON["timetables"][dataVariation]["scheduledacts"][j];
																		planActivityJSON["timetables"][dataVariation]["scheduledacts"][i]["idacti"] = i;
																		//On modifie l'idacti de l'activité dans le planning
																		jQuery('.fullplanning').find('li').each(function()
																		{
														        			// si la dateid correspond
														        			if (jQuery(this).find('#dateid').val() == planActivityJSON["timetables"][dataVariation]["scheduledacts"][i]["dateid"]) {
														        				jQuery(this).find('#idacti').val(planActivityJSON["timetables"][dataVariation]["scheduledacts"][i]["idacti"]);
														        			}
														        		})
														        	}
														            else if (j == planActsCount)
														            {
														            	delete planActivityJSON["timetables"][dataVariation]["scheduledacts"][i];
														            }	
														        }

													        	function hastobesaved() {
																	if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
																		jQuery('.ultimate-submit').addClass('hastobesaved');
																		jQuery(window).on('beforeunload', function(){
																		  return 'Are you sure you want to leave?';
																		});
																	}
																	var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
														        	changes = changes +1;
														        	var saveText = jQuery('.sy-text-save').html();
														        	jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
														        	jQuery('.ultimate-submit').attr('data-changes', changes);
																}
											                	hastobesaved();
													        														        	
											                	jQuery('#scheduledact').val(JSON.stringify(planActivityJSON));
			                                                    jQuery(this).parent().remove();	
		                                                    });
												        });</script></a>
												        <div id="nom" title="<?php echo $acttitle ?>" class="sy-name"><?php echo $acttitle ?></div>
												        <fieldset>
													        <input id="duree" name="duree" type="hidden" value ="<?php echo esc_attr($decodedplanAct->{'duree'}) ?>">
													        <input id="title" name="title" type="hidden" value = "<?php echo esc_attr($acttitle) ?>">
													        <input id="idacti" name="idacti" type="hidden" value ="<?php echo esc_attr($decodedplanAct->{'idacti'}) ?>">
													        <input id="nom" name="nom" type="hidden" value = "<?php echo esc_attr($acttitle) ?>">
													        <input id="id_cell" name="id_cell" type="hidden" value = "<?php echo esc_attr($decodedplanAct->{'id_cell'}) ?>">
													        <input id="id_activity" name="id_activity" type="hidden" value ="<?php echo esc_attr($decodedplanAct->{'id_activity'}) ?>">
													        <input id="start_t" name="start_t" type="text" value = "<?php echo esc_attr($start) ?>" class="start <?php echo $timemodeStyle ?>" style="color:#<?php  echo $decodedAct->{'fontcolor'} ?>;">
													        <span style="color:#<?php echo  esc_attr($decodedAct->{'fontcolor'}) ?>;"> > </span>
													        <input id="end_t" name="end_t" type="text" title="Modify end time with the extended version" value = "<?php echo esc_attr($end) ?>" class="end <?php echo $timemodeStyle ?>" style="color:#<?php echo $decodedAct->{'fontcolor'} ?>;">
													        <input id="status" name="status" type="hidden" value="<?php echo esc_attr($decodedplanAct->{'print'}) ?>">
													        <input id="htomove" name="htomove" type="hidden" value="<?php echo esc_attr($start) ?>">
													        <input id="dateid" name="dateid" type="hidden" value="<?php echo esc_attr($decodedplanAct->{'dateid'}) ?>">
													        <input id="merge" name="merge" type="hidden" value="<?php echo esc_attr($decodedplanAct->{'merge'}) ?>">
												        </fieldset>
												        <div class="sy-mergebutton" data-tooltip-content=".merge-extended"></div>
												    </li>
											<?php	}// fin if id_cell == idul
											}// fin for arrayplanAct
										}// fin if $data[0]->scheduledact ?>

							   			</ul>	
							   		<?php }// fin for $cell
							   	?>
						   	</div>
				   		</div>  					
		   				<?php } // fin for $number ?>
		   				<div class="syet_gallery-container" style="display:none;"></div>
					</div> <!-- fin fullplanning -->
				</div>
				<?php $variationCount++; ?>
			<?php endforeach ?>
				<div class="sy-text-script">
					<div class="sy-easy-title"><?php _e( 'Title', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-text-save"><?php _e( 'Save', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-text-cancel"><?php _e( 'Cancel', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-text-apply"><?php _e( 'Apply', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-text-weeks"><?php _e( 'Weeks', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-help-weeks"><?php _e( 'Hold ctrl to select/deselect week numbers manually', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-text-help"><?php _e( 'Help', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-text-edit"><?php _e( 'Edit', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-text-yes"><?php _e( 'Yes', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-text-no"><?php _e( 'No', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-new-schedule-variation"><?php _e( 'Add a new schedule variation', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-want-to-leave"><?php _e( 'Are you sure you want to leave?', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-display-period"><?php _e( 'Manage display period', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-empty-schedule"><?php _e( 'Empty schedule', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-copy-current"><?php _e( 'Copy current schedule', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-please-choose"><?php _e( 'Please, choose an option', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="prev-variation"><?php _e( 'Previous', 'easytimetable-responsive-schedule-management-system' ); ?></div>
		    		<div class="next-variation"><?php _e( 'Next', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-display-period"><?php _e( 'Manage display period', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-option-to-delete"><?php _e( 'Choose an option to delete', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-option-to-delete1"><?php _e( 'Delete activity & activities in the schedule', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-option-to-delete2"><?php _e( 'Delete activities in the schedule only', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-option-period0"><?php _e( 'Select an option', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-option-period1"><?php _e( 'Even weeks', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-option-period2"><?php _e( 'Odd weeks', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-option-period3"><?php _e( 'No recurrence', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-option-period4"><?php _e( 'Every weeks', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-period-help"><?php _e( 'Hold ctrl + click to select/deselect several weeks manualy', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-duration"><?php _e( 'Duration', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-bgcolor"><?php _e( 'BG Color', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-bgovercolor"><?php _e( 'BG over Color', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-fontcolor"><?php _e( 'Font color', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-fontovercolor"><?php _e( 'Font over color', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-chooseimage"><?php _e( 'Choose an image', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-linkdescription"><?php _e( 'Link to description', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-imagetooltip"><?php _e( 'Image in tooltip', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-tooltiptext"><?php _e( 'Tooltip text', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-textinthecell"><?php _e( 'Text in the cell', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-description"><?php _e( 'Description', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-placeholderdescription"><?php _e( 'Enter a description (optional)', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-helptootip"><?php _e( 'No HTML inside', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-helpdescription"><?php _e( 'HTML allowed in the Extended edition (div, span, link, styles...)', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-helptextincell"><?php _e( 'Will be displayed only if there is enough place in the activity\'s cell<br>Adjust cell\'s height if needed in "Timetable configuration"<br>HTML allowed in the Extended edition', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-tooltipplaceholder"><?php _e( 'Enter the text displayed when the mouse enters the activity\'s cell (optional).', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="sy-easy-textincellplaceholder"><?php _e( 'Enter the text to be displayed inside the cell (optional)', 'easytimetable-responsive-schedule-management-system' ); ?></div>
					<div class="merge-extended">
						<div>
							<?php _e( 'Put 2 different activities in one cell', 'easytimetable-responsive-schedule-management-system' ); ?>
							<br> <?php _e( 'with the ', 'easytimetable-responsive-schedule-management-system' ); ?><a style="color:orange;" href="http://www.stereonomy.com/wordpress-products/easytimetable-plugin-for-wordpress/item/easytimetable-extended-for-wordpress" target="_blank">
							<?php _e( 'extended edition', 'easytimetable-responsive-schedule-management-system' ); ?></a>
						</div>
					</div>
					<div class="variation-extended">
						<div>
							<?php _e( 'What you can do with the ', 'easytimetable-responsive-schedule-management-system' ); ?><a style="color:orange;" href="http://www.stereonomy.com/wordpress-products/easytimetable-plugin-for-wordpress/item/easytimetable-extended-for-wordpress" target="_blank"><?php _e( 'Extended edition:', 'easytimetable-responsive-schedule-management-system' ); ?></a>
							<br>
							<ul>
								<li><?php _e( 'Create as many schedule variations as you need', 'easytimetable-responsive-schedule-management-system' ); ?></li>
								<li><?php _e( 'Display them on the same page', 'easytimetable-responsive-schedule-management-system' ); ?></li>
								<li><?php _e( 'and/or alternate schedules weekly', 'easytimetable-responsive-schedule-management-system' ); ?></li>
								<li><?php _e( 'by choosing a display period (weeks) for each variation', 'easytimetable-responsive-schedule-management-system' ); ?></li>
							</ul>
							<a style="color:orange;" href="http://www.stereonomy.com/wordpress-products/easytimetable-plugin-for-wordpress/item/easytimetable-extended-for-wordpress" target="_blank"><?php _e( 'More info on Stereonomy\'s website', 'easytimetable-responsive-schedule-management-system' ); ?></a>
						</div>
					</div>
				</div>
					
			</div> 
			<?php endif ?> <!-- fin if ($data[0]->type == 0) -->
			<div id="result"></div>	
		<div id="dialogform"></div>
		<div id="dialogeditactform"></div>
		<div id="deleteactform"></div>
		<div id="dayform"></div>
		<div id="periodform"></div>
		<div id="deleteactinfo"><?php _e( 'Please <span class="save-info">SAVE</span> to validate your choice or <span class="exit-info">EXIT</span> to cancel', 'easytimetable-responsive-schedule-management-system' ); ?></div>
		<script type="text/javascript">
		
		jQuery(document).ready(function($){
			jQuery('#theactivities').disableSelection();
			jQuery('.end, .start').disableSelection();

			jQuery(".addvariation").tooltipster({
				trigger: "click",
				delay:0,
				theme: "tooltipster-borderless",
				side: "left",
				interactive:true
			})

			jQuery("#theactivities").find(".sy-name").each(function()
			{	
				if (jQuery(this).text().length > 13 && jQuery(this).text().length < 24) {
	                jQuery(this).css({
	                	"font-size": "12px",
	                	"line-height": "16px"
	                })
	            }
	            else if (jQuery(this).text().length > 23 && jQuery(this).text().length < 30) {
	                jQuery(this).css({
	                	"font-size": "10px",
	                	"line-height": "16px"
	                })
	            }
	            else if (jQuery(this).text().length > 29) {
	                jQuery(this).css({
	                	"font-size": "10px",
	                	"line-height": "12px"
	                })
	            }
	            else {
	                jQuery(this).css({
	                	"font-size": "",
	                	"line-height": ""
	                })
	            }
            })
			jQuery('.sy-mergebutton').tooltipster({
				trigger: "click",
				delay:0,
				theme: "tooltipster-borderless", 
				side: "right",
				interactive:true
			});

			// Delete activity

			function hastobesaved() {
				if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
					jQuery('.ultimate-submit').addClass('hastobesaved');
					//On empèche la fenêtre de se fermer
					jQuery(window).on('beforeunload', function(){
					  return 'Are you sure you want to leave?';
					});
				}
				var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
            	changes = changes +1;
            	var saveText = jQuery('.sy-text-save').html();
	        	jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
            	jQuery('.ultimate-submit').attr('data-changes', changes);
			}
				
			/********************************************************************/
			/************** DEPLACEMENT DATETIMEPICKER*************************/
			/********************************************************************/
			var counter = 0;
			var startingtime = jQuery('#start_h').val();
			// On enlève le bouton trash au début du drag/sort	
			jQuery('.fullplanning').find("ul").on("sortstart", function (event, ui){
				var getIdCell = jQuery(this).attr('id');
				var number = getIdCell.replace(/cellule_/g, "");
			    // function delete
			    function deleteSupp(el) {
			    	el.find('.del').remove();
			    }
		    	deleteSupp(jQuery(this).find("li"));

			}); // End sortstart
			//On rajoute le bouton trash à la fin du drag/sort
			jQuery('.fullplanning').find("ul").on("sortreceive", function (event, ui){
				var getIdCell = jQuery(this).attr('id');
				var number = getIdCell.replace(/cellule_/g, "");
				var pattern = new RegExp("^\"d");
				function addSupp(el) {
					var del ='<script type="text/javascript">jQuery(document).ready(function(){jQuery(".supprimer-'+number+'").click(function(){function f(){var a=0,b=JSON.parse(jQuery("#scheduledact").val()),c=b.timetables[0].scheduledacts;for(property in c)c.hasOwnProperty(property)&&a++;var d=[b,a];return d}function l(){jQuery(".ultimate-submit").hasClass("hastobesaved")||jQuery(".ultimate-submit").addClass("hastobesaved");var a=parseInt(jQuery(".ultimate-submit").attr("data-changes"));var saveText = jQuery(".sy-text-save").html();a+=1,jQuery(jQuery(".ultimate-submit").find("label").html(saveText + " ("+a+")")),jQuery(".ultimate-submit").attr("data-changes",a)}idul="#"+jQuery(this).parent("li").parent("ul").attr("id"),jQuery(idul).removeClass("onlyone");for(var b=(jQuery(this).parent("li").find("input#id_activity").val(),parseInt(jQuery(this).parent("li").find("input#idacti").val())),g=(jQuery(this).parent("li").find("input#id_cell").val(),jQuery(this).parent("li").find("input#start_t").val(),jQuery(this).parent("li").find("input#end_t").val(),f()),h=g[0],i=g[1],j=b;j<i;j++){var k=parseInt(j)+1;k<i?(h.timetables[0].scheduledacts[j]=h.timetables[0].scheduledacts[k],h.timetables[0].scheduledacts[j].idacti=j,jQuery(".fullplanning").find("li").each(function(){jQuery(this).find("#dateid").val()==h.timetables[0].scheduledacts[j].dateid&&jQuery(this).find("#idacti").val(h.timetables[0].scheduledacts[j].idacti)})):k==i&&delete h.timetables[0].scheduledacts[j]}l(),jQuery("#scheduledact").val(JSON.stringify(h)),jQuery(this).parent().remove()})});<\/script>';
				    el.prepend("<a class='supprimer-"+number+" del' title='Click to delete the item'>"+del+"</a>");
				}
				addSupp(jQuery(this).find("li"));
			}); // End sortstop
			jQuery('.fullplanning').find('.creneau').each(function(){

				if (jQuery(this).find('li').length!=0) {
					jQuery(this).addClass('onlyone');
				}
				//ajout
				var getIdCell = jQuery(this).attr('id');
				var number = getIdCell.replace(/cellule_/g, "");
				jQuery(this).find("li").each(function(){
					// On actualise sa position
					var index = parseInt(jQuery(this).index()+1);
					jQuery(this).addClass('count');
					// On la met à jour dans la page
					jQuery(this).find(".count").text(index);
					// On définie l'Id de l'activité nouvellement créée
					nomActiviteGlobal = jQuery(this).attr('id'); //jQuery(this).find("#title").val()+'_'+number;
					//jQuery(this).attr('id', nomActiviteGlobal);
					
					//On ajoute l'id de la cellule à la valeur du champ "id_cell"
					jQuery(this).find('#id_cell').attr('value', number);
					jQuery(this).find(".duration").remove();
					var dataVariation = jQuery(this).parents('.fullplanning').attr('data-variation');
			        //console.log("dataVariation : " + dataVariation);
					var planActCount = 0;

					function saveNewTime(idacti, variation, startId)
					{
						//On récupère en JSON les donnée de input#scheduledact
						var planActData = getPlanActData(variation);
						var planActivityJSON = planActData[0];

			        	//On modifie les heures de début et de fin de l'objet
			        	planActivityJSON["timetables"][variation]["scheduledacts"][idacti]['start_t'] = jQuery(startId).find('input#start_t').val();
			        	planActivityJSON["timetables"][variation]["scheduledacts"][idacti]['end_t'] = jQuery(startId).find('input#end_t').val();
			        	
			        	//On ajoute l'objet transformé en string à l'input
		            	jQuery('#scheduledact').val(JSON.stringify(planActivityJSON));
					}

					function getPlanActData(variation) {
						// Récupération et parse Json des données des activités plannifiées
						var planActCount = 0;
						//console.log(jQuery('#scheduledact').val());
						if (jQuery('#scheduledact').val().length == 0) {
			        	var planActivityJSON = JSON.parse('{"timetables":{"0":{"scheduledacts":{}}}}');
			        	
			        	planActivities = planActivityJSON["timetables"]["0"]["scheduledacts"];
			        	id = 0;
			        	jQuery(this).find('#idacti').val(id);
				        }
				        else {
				        	var planActivityJSON = JSON.parse(jQuery('#scheduledact').val());
				        	
				        	var scheduledacts = planActivityJSON["timetables"][variation]["scheduledacts"];
				        	for ( property in scheduledacts )
							{
							   if(scheduledacts.hasOwnProperty(property))
							   {
							      planActCount++;
							   }
							}
							
				        }
				        var planActDataArray = [planActivityJSON, planActCount]
				        return planActDataArray;
					}// Fin getPlanActData()

					// Affichage des champs cachés pour la définition de l'heure de début si la class hastimepicker n'est pas encore présente et si ce n'est pas une pause
					
					if (jQuery(this).find('#start_t').hasClass('invisible') ){
						jQuery(this).find('#start_t').removeClass('invisible');	
					}
					if (jQuery(this).find('span').hasClass('invisible') ){
						jQuery(this).find('span').removeClass('invisible');	
					}
					if (jQuery(this).find('#end_t').hasClass('invisible') ){
						jQuery(this).find('#end_t').removeClass('invisible');	
					}

					var startId = '#'+ nomActiviteGlobal;
					
					if (jQuery('.fullplanning').attr('data-time-mode') == 0) // Mode 24
					{

						/****************************************************************************/
						// Recherche si une cellule précédente existe et si elle contient une heure de fin
						// Si oui, on limite l'heure de début en fonction de l'heure de fin de la précédente activité ajoutée
						/****************************************************************************/
						var prevId = number-1;
						var prevIdCell = "#cellule_"+prevId;
						//SI il y a une cellule ul précédente et s'il n'y a pas de 'li' dans cette cellule et si l'id de la de la colonne de la 'ul' courante est identique à la 'ul' précédente
						if (jQuery(prevIdCell).length >= 1 && jQuery(prevIdCell).find('li').length == 0 && (jQuery(prevIdCell).parents('div').attr('id') ==  jQuery('#'+getIdCell).parents('div').attr('id'))) {
							// Tant qu'il n'y a pas de 'li' dans cette 'ul' on continue de chercher à la cellule précédente
							while (jQuery(prevIdCell).find('li').length == 0 ) {
								prevId = prevId-1;
								prevIdCell = "#cellule_"+prevId;

								if (jQuery('#'+getIdCell).parents('div').attr('id') != jQuery(prevIdCell).parents('div').attr('id'))  {
									var valPrevCell = startingtime;
									break;
								}

								else if (jQuery(prevIdCell).find('li').length >= 1 ) {
							   		var valPrevCell = jQuery(prevIdCell).find('li').find('.end').val();
							   		break;
							   	}
							}
						}
						else if (jQuery(prevIdCell).length == 0 && (jQuery('#'+getIdCell).parents('div').attr('id') != jQuery(prevIdCell).parents('div').attr('id')) ) {
							valPrevCell = startingtime;
						}
						else {
							valPrevCell = jQuery(prevIdCell).find('li').find('.end').val();
						}
						/******************************************************************************/
						//On recherche s'il y a une activité précédent et si oui on attribue l'heure de fin de la cellule précédente
						// à l'heure de début de la nouvelle cellule crée
						/******************************************************************************/
						if (valPrevCell && jQuery(this).find('.start').val().length == 0) {
							jQuery(this).find('.start').val(valPrevCell);
							var duree = parseInt(jQuery(startId).find('#duree').val());
					  		var debutprev = jQuery(prevIdCell).find('li').find('.end').val();

					  		var heureDebut = jQuery(startId).find('.start').val();
					  		var getH = parseInt(heureDebut.substr(0,2));
					  		if (heureDebut.substr(3,2)=="00") {
								if (duree <= 59){
									var minFin = duree;
									var heuFin = getH;
								}
								if (duree >= 60) {
						  			minFin = duree - 60;
						  			heuFin = getH + 1;
					  			}
					  			if (minFin <= 9) {
					  				minFin = "0"+String(minFin);
					  			}
					  			if (heuFin >=24) {
					  				heuFin = heuFin - 24;
					  			}
								if (heuFin <= 9) {
									var heureFinal = "0" + String(heuFin) + ":"+ minFin;
								}
								else {
									heureFinal = String(heuFin) + ":"+ minFin;
								}
								
						  		jQuery(this).find('.end').val(heureFinal);
						  		
					  		}
					  		else {
					  			var getM = parseInt(heureDebut.substr(3,2));
					  			if (duree < 60) { 
						  			minFin = getM + duree;
						  			if (minFin >= 60) {
							  			minFin = minFin - 60;
							  			heuFin = getH + 1;
						  			}
						  			else {
						  				heuFin = getH;
						  			}
						  		}
						  		else if (duree >= 60 && duree <= 90) {
						  			minFin = getM + duree;
						  			if (minFin >= 60 && minFin < 120) {
						  				minFin = minFin - 60;
						  				heuFin = getH + 1;
						  			}
						  			else if (minFin >= 120) {
						  				minFin = minFin - 120;
						  				heuFin = getH + 2;
						  			}
						  		}
					  			if (minFin <= 9){
					  				minFin = "0"+String(minFin);	
					  			}
					  			if (heuFin >=24) {
					  				heuFin = heuFin - 24;
					  			}
					  			if (heuFin <= 9) {
									var heureFinal = "0" + String(heuFin) + ":"+ String(minFin);
								}
								else {
									heureFinal = String(heuFin) + ":"+ String(minFin);
								}
					  			jQuery(this).find('.end').val(heureFinal);
							}
						} //fin if (valPrevCell && jQuery(this).find('.start').val().length == 0)
						
						/******************************************************************************/
						// limite du choix de l'heure de début en fonction de l'heure de début de la prochaine activité. 
						/******************************************************************************/
						var nextId = parseInt(number)+1;
						
						var nextIdCell = "#cellule_"+nextId;
						if (jQuery(nextIdCell).length >= 1 && jQuery(nextIdCell).find('li').length == 0 && (jQuery(nextIdCell).parents('div').attr('id') ==  jQuery('#'+getIdCell).parents('div').attr('id'))) {
							while (jQuery(nextIdCell).find('li').length == 0 ) {
								nextId = nextId+1;
								nextIdCell = "#cellule_"+nextId;

								if (jQuery(nextIdCell).length == 0 || (jQuery('#'+getIdCell).parents('div').attr('id') != jQuery(nextIdCell).parents('div').attr('id')) ) {
									var valNextCell = '24:00'
									break;
								}
								else if (jQuery(nextIdCell).find('li').length >= 1 ) {
							   		var valNextCell = jQuery(nextIdCell).find('li').find('.start').val();
							   		break;
							   	}
							}
						}
						else {
							var valNextCell = jQuery(nextIdCell).find('li').find('.start').val();
						}
						// On définie l'id de la planact
				var planactId = jQuery(this).find('#idacti').val();
				jQuery(this).find('.start').datetimepicker({
				  	format:'H:i',
				  	step:5,
				  	closeOnTimeSelect:true,
				  	onShow:function( ct ){  	
				  	}, // FIN onshow
				  	// Sélection de l'heure de début de l'activité et calcul de son heure de fin à partir de sa durée
				  	onSelectTime:function(ct){			  		
				  		var duree = parseInt(jQuery(startId).find('#duree').val());

				  		var heureDebut = jQuery(startId).find('.start').val();
				  		var getH = parseInt(heureDebut.substr(0,2));
				  		var heuFin = parseInt(duree / 60) + getH;
				  		var getM = parseInt(heureDebut.substr(3,2));
				  		var minFin = getM + (duree % 60);
			  			if (minFin >= 60) {
							minFin = minFin-60;
							heuFin = heuFin +1;
						}
			  			if (minFin <= 9){
			  				minFin = "0"+String(minFin);	
			  			}
			  			if (heuFin >=24) {
			  				heuFin = heuFin - 24;
			  			}
			  			if (heuFin <= 9) {
							var heureFinal = "0" + String(heuFin) + ":"+ String(minFin);
						}
						else {
							heureFinal = String(heuFin) + ":"+ String(minFin);
						}
				  		
				  		jQuery(startId).find('input#end_t').val(heureFinal);
			        	//**************Enregistrement de l'activité******************
			        	
						//On récupère l'idacti de l'activité modifiée
						var idacti = jQuery(startId).find('#idacti').val(); 
						saveNewTime(planactId, dataVariation, startId);
						
		            	
		            	//****************Fin enregistrement de l'activité**********************
		            	hastobesaved();
		            	
				  	},// Fin selecttime
					timepicker:true,
					datepicker:false,
				}); // datetimepicker

				
					} // mode 24h
					else { // le script 12h
						function calculateEndTimeSelect(el) {
							console.log(el.attr('id'));
							var duree = parseInt(el.find('#duree').val());
							console.log(el.find('.start').val());

					  		var heureDebut = el.find('.start').val();
					  		var hour = parseInt(heureDebut.substr(0,2));
					  		if (hour < 10) {
								postfix = heureDebut.substr(5,2);
								var minute = parseInt(heureDebut.substr(2,2));
							} 
							else {
								postfix = heureDebut.substr(6,2);
								var minute = parseInt(heureDebut.substr(3,2));
							}
							var endHour = parseInt(duree / 60) + hour;
							var endMin = minute + (duree % 60);
							if (endMin >= 60 ) {
								var endMin = endMin - 60;
								var endHour = endHour + 1;
							} 
				  			if (endMin <= 9){
				  				endMin = "0"+String(endMin);	
				  			}
				  			if (hour < 12 && endHour >= 12 ) {
								if (postfix == "am") {
									postfix = "pm";
								}
								else if (postfix == "pm") {
									postfix = "am";
								}
							}
							else {
								if (postfix == "am") {
									postfix = "am";
								}
								else if (postfix == "pm") {
									postfix = "pm";
								}
							}
							if (endHour > 12) {
								endHour = endHour - 12;
							}	
							heureFinal = String(endHour) + ":"+ String(endMin)+ " "+ postfix;
							console.log(heureFinal);
					  		var heureDeFin = el.find('.end').attr("value", heureFinal);	
						} // Fin calculateEndTimeSelect
						var planactId = jQuery(this).find('#idacti').val();
						jQuery(this).find('.start').datetimepicker({
						  	format:'g:i a',
						  	formatTime:'g:i a',
						  	step:5,
						  	closeOnTimeSelect:true,
						  	
						  	// Sélection de l'heure de début de l'activité et calcul de son heure de fin à partir de sa durée
						  	onSelectTime:function(ct){
						  		calculateEndTimeSelect(jQuery(startId));
								// On ajoute la valeur de l'heure de début à la valeur du champ "start_t"
								var start = jQuery(startId).find('.start').val();
								jQuery(startId).find('#start_t').attr('value', start);
								// On ajoute la valeur de l'heure de fin à la valeur du champ "end_t"
								var end = jQuery(startId).find('.end').val();
								jQuery(startId).find('#end_t').attr('value', end);
								
					        	//**************Enregistrement de l'activité******************
					        	var idacti = jQuery(startId).find('#idacti').val(); 
								saveNewTime(idacti, dataVariation, startId);
				            	//****************Fin enregistrement de l'activité**********************
				            	hastobesaved();
						  	},
							timepicker:true,
							datepicker:false,
						}); // datetimepicker

					}
				})
			})// Fin DEPLACEMENT DATETIMEPICKER

			jQuery('#theactivities').find('li').draggable({
		        connectToSortable: "ul:not(#theactivities, .onlyone)",
		        handle: "#nom", // droppable dans les listes jour
		        helper: "clone", // 
		        revert: "invalid",
		        revertDuration: 200
		    });
			// Colpick selecteur
			jQuery("#cell_color").colpick({
		        layout:"hex",
				submit:0,
				colorScheme:"dark",
				onChange:function(hsb,hex,rgb,el,bySetColor) {
			        jQuery(".ui-dialog-buttonset").find("button").eq(1).css("display", "inline-block");    
					jQuery(el).css("border-color","#"+hex);
					// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
					if(!bySetColor) jQuery(el).val(hex);
				},
				onShow:function(hsb,hex,rgb,el,bySetColor) {
					var currentColor = "#" + jQuery(this).val();
					jQuery(this).css("border-color","#"+currentColor);
					jQuery(this).colpickSetColor(this.value);
				}	
			}).keyup(function(){
					jQuery(this).colpickSetColor(this.value);   
		    });
		});

		// Datetimepicker
		//console.log(jQuery(".start_h").datetimepicker());
	    if (!jQuery(".fullplanning").attr('data-time-mode')) {
		    jQuery(".start_h").datetimepicker({
		        format:'H:i',
		        formatTime:'H:i',
		        step:5,
		        closeOnTimeSelect:true,
		        timepicker:true,
		        datepicker:false,
		        onSelectTime:function(ct){
		            start_h1 = jQuery("#start_h").val();
		            jQuery("#start_h").attr('value', start_h1);
		        }
		    });
		}
		else {
		    if (jQuery(".fullplanning").attr('data-time-mode') == 0) { 
		        jQuery(".start_h").datetimepicker({
		            format:'H:i',
		            formatTime:'H:i',
		            step:5,
		            closeOnTimeSelect:true,
		            timepicker:true,
		            datepicker:false
		        });
		    }
		    else {
		        jQuery(".start_h").datetimepicker({
		            format:'g:i a',
		            formatTime:'g:i a',
		            step:5,
		            closeOnTimeSelect:true,
		            timepicker:true,
		            datepicker:false
		        });
		    }
		}
    
	    // to save the modification
	    //Save function to record data of a new or edited planning
		function send_data(data) {
			var menuitem;
			var reg;
			jQuery.post(ajaxurl, data, function(responseText) {
				url: MyAjax.ajaxurl,
				loadPlanning2();
			});
		}
		// Enregistre les données après une edition d'un planning
		function send_data2(data, id, nonce) {

			jQuery.post(ajaxurl, data, function(responseText) {
				url: MyAjax.ajaxurl,
				datas = {
					'action': 'syet_edit_planning',
					'id': id,
					'saveSecurity': nonce	
				};
				// ON récupère les données sauvegardées et on les affiche avec get_data()
				get_data(datas);
			});
		}
		// Affichage du planning
		function get_data(data) {
			jQuery.post(ajaxurl, data, function(responseText) {
				url: MyAjax.ajaxurl,
				//ON affiche le planning dans la div globale
				jQuery('.sy-admin-container').html(responseText.slice(0, -1));
			});
		}

		function syet_my_media_gallery_to_insert_in_activity(data) {
			jQuery.post(ajaxurl, data, function(responseText) {
				url: MyAjax.ajaxurl,
				//ON affiche le planning dans la div globale
				jQuery('.syet_gallery-container').append(responseText.slice(0, -1));
				//jQuery('.sy-admin-container').html(responseText.slice(0, -1));
			});
		}
		var mediaData = {'action': 'syet_my_media_gallery_to_insert_in_activity'};
		syet_my_media_gallery_to_insert_in_activity(mediaData);

		// Click on the button "save"
	    jQuery('#et_modify').on('click', function(e){
			e.preventDefault();
			jQuery(window).unbind('beforeunload');
			jQuery(".ultimate-submit").find('.preloader').css('display', 'inline-block');
			//function to load the timetable
			var id = jQuery('#planning_id').val();
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
			var scheduledact = jQuery('#scheduledact').val();
			if (jQuery("#days").val().length == "")
			{
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
			}
			else
			{
				var jsondays = jQuery('#days').val(); 
			}
			
			var days = jsondays;

			var print = jQuery('#print').val();
			var cell_color = jQuery('#cell_color').val();
			var created_by = jQuery('#created_by').val();
			var access = jQuery('#access').val();
			var nonce = jQuery('#saveSecurity').val();
			console.log(nonce);
			var datas = {
				'action': 'syet_save_planning',
				'id': id,
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

			send_data2(datas, id, nonce);
			
		});// Fin on click et_modify

		function makeItSortable() {
		// Sortable
		function hastobesaved() {
			if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
				jQuery('.ultimate-submit').addClass('hastobesaved');
			}
			var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
        	changes = changes +1;
        	var saveText = jQuery('.sy-text-save').html();
			jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
        	jQuery('.ultimate-submit').attr('data-changes', changes);
        	jQuery(window).on('beforeunload', function(){
			  return 'Are you sure you want to leave?';
			});
		}
		function getPlanActData(variation) 
		{
			// Récupération et parse Json des données des activités plannifiées
			var planActCount = 0;
			//console.log(jQuery('#scheduledact').val());
			if (jQuery('#scheduledact').val().length == 0) {
        	var planActivityJSON = JSON.parse('{"timetables":{"0":{"scheduledacts":{}}}}');
        	
        	planActivities = planActivityJSON["timetables"]["0"]["scheduledacts"];
        	id = 0;
        	jQuery(this).find('#idacti').val(id);
	        }
	        else {
	        	var planActivityJSON = JSON.parse(jQuery('#scheduledact').val());
	        	
	        	var scheduledacts = planActivityJSON["timetables"][variation]["scheduledacts"];
	        	for ( property in scheduledacts )
				{
				   if(scheduledacts.hasOwnProperty(property))
				   {
				      planActCount++;
				   }
				}
				
	        }
	        var planActDataArray = [planActivityJSON, planActCount]
	        return planActDataArray;
		}// Fin getPlanActData()
		jQuery(".timetable-container").find('.fullplanning').each(function(){
			jQuery(this).find("ul").each(function(){
				jQuery(this).sortable({
				    revert: false,
				    tolerance: "intersect",
				    handle: "#nom",
				    connectWith: 'ul:not(.activity, .onlyone)',
				    items: "> li:not(.sy-doubleclass)",
				    placeholder: "placeholder",
				    start: function(){
						jQuery(this).find('.activite').css('height', "60px");
						jQuery(this).find('li').css('z-index',"10020");
						jQuery(this).find('li').css({
			        		"width": "180px"
			        	});	
				    }, // Fin start
				    out: function() {
				    	jQuery(this).find('li').css('z-index',"1");
				    },
				    beforeStop: function( event, ui ) {
				    	numberOfItem = jQuery(this).find('li').length;	
				    }, // Fin beforestop
				    stop: function(){
				        jQuery('.creneau > li').addClass('has-been-drop activite');
				        jQuery(this).find('li').css('z-index',"1");
				        jQuery('.creneau > li').removeClass('activity');
				        jQuery(this).find('.editacti').remove();
			        	jQuery('.has-been-drop > .publish').css(
			        	"display" , "inline-block" );
			        	jQuery(this).find('li').css({
			        		"height": "100%"
			        	});
			        	if (jQuery(this).find('li').attr('data-merge') == 1) {
			        		jQuery(this).find('li').css({
			        			"width": "50%"
			        		})
			        	}
			        	else {
			        		jQuery(this).find('li').css({
			        			"width": "100%"
			        		})
			        	}
			        	
			        	// choix de la couleur du bouton de publication, en attribuant la clase published ou notpublished
			        	if (parseInt(jQuery(this).find("input#status").val()) == 0) {
			        		jQuery(this).find('.publish').addClass('notpublished');
			        		jQuery(this).find('.publish').removeClass('published');
			        	}
			        	else if (parseInt(jQuery(this).find("input#status").val()) == 1) {
			        		jQuery(this).find('.publish').addClass('published');
			        		jQuery(this).find('.publish').removeClass('notpublished');
			        	}	
				    },// Fin Stop
				    receive: function(event, ui){
				    	// Fonction pour convertir le contenu du formulaire createactivity en JSON !Important
			        	jQuery.fn.serializeObject = function()
						{
						    var o = {};
						    var a = this.serializeArray();
						    jQuery.each(a, function() {
						        if (o[this.name] !== undefined) {
						            if (!o[this.name].push) {
						                o[this.name] = [o[this.name]];
						            }
						            o[this.name].push(this.value || '');
						        } else {
						            o[this.name] = this.value || '';
						        }
						    });
						    return o;
						};
						var dataVariation = jQuery(this).parents(".fullplanning").attr('data-variation');
						var planActCount = 0;
				    	var startingtime = jQuery('#start_h').val();
						var getIdCell = jQuery(this).attr('id');
						//var fullIdJour= "#" + getIdCell;
						var idJour = getIdCell.substring(getIdCell.indexOf("_")+5);
						
						var idSectionType = getIdCell.substring(getIdCell.indexOf("-")+1);
						
			            var number = getIdCell.replace(/cellule_/g, "");
			            // Ajout de la classe onlyone pour éviter la superposition de plusieurs activités sur une seule cellule
			            jQuery(this).addClass('onlyone');

			            var planActCount = 0;
						function getPlanActData(variation) {
							// Récupération et parse Json des données des activités plannifiées
							var planActCount = 0;
							//alert(jQuery('#scheduledact').val());
							if (jQuery('#scheduledact').val().length == 0) {
				        	var planActivityJSON = JSON.parse('{"timetables":{"0":{"scheduledacts":{}}}}');
				        	
				        	planActivities = planActivityJSON["timetables"]["0"]["scheduledacts"];
				        	id = 0;
				        	jQuery(this).find('#idacti').val(id);
					        }
					        else {
					        	var planActivityJSON = JSON.parse(jQuery('#scheduledact').val());
					        	
					        	var scheduledacts = planActivityJSON["timetables"][variation]["scheduledacts"];
					        	for ( property in scheduledacts )
								{
								   if(scheduledacts.hasOwnProperty(property))
								   {
								      planActCount++;
								   }
								}
								
					        }
					        var planActDataArray = [planActivityJSON, planActCount]
					        return planActDataArray;
						}// Fin getPlanActData()

				        // Pour chaque item de liste
						jQuery(this).find("li").each(function(){
							jQuery('.end, .start').disableSelection();
							jQuery(this).find('.sy-mergebutton').tooltipster({
								trigger: "click",
								delay:0,
								theme: "tooltipster-borderless", 
								side: "right",
								interactive:true
							});
							jQuery(this).find(".deleteacti").remove();
							var dataVariation = jQuery(this).parents('.fullplanning').attr('data-variation');
							// En cas de doublon ()
							//console.log(numberOfItem);
							var alreadyThere = jQuery(this).attr('id');
							//console.log(alreadyThere);
							// On ajoute la class onlyone si 2 activités dans la cellule
							if (numberOfItem == 3 ) {
								jQuery(this).parent('ul').addClass('onlyone');
							}
							// Si l'activité n'existe pas encore (pour eviter le doublon lors de cellule double)
							if (numberOfItem == 0 || numberOfItem == 2 || (numberOfItem == 3 && typeof alreadyThere === "undefined")) {
								//console.log(jQuery(this).prev().find('#merge').val());
								if (jQuery(this).prev().find('#merge').val() == 1) {
									jQuery(this).attr('data-merge', 1);
									jQuery(this).find('#merge').val(1);
									//console.log(jQuery(this).find('#merge').val());
									//console.log(jQuery(this).attr('data-merge'));
									jQuery(this).addClass('sy-doubleclass');
									jQuery(this).css({
										'float': 'right',
										'width': '50%',
										'height': '100%'
									});
									jQuery(this).prev().css({
										'width': '50%'
									});
									// On réduit la taille du nom pour que ça rentre
									if (jQuery(this).find('.name').text().length > 9) {
										var smallName = jQuery(this).find('.name').text().substr(0,9) + "...";
										jQuery(this).find('.name').text(smallName);
									}
								}
								else {
									jQuery(this).css({
					        		"height": "100%",
					        		"width": "100%"
					        		});
								}
								// On actualise sa position
								var index = parseInt(jQuery(this).index()+1);
								if (jQuery('.fullplanning').attr('data-time-mode') == 0) 
								{
									jQuery(this).find('.start').addClass('twentyfour');
									jQuery(this).find('.end').addClass('twentyfour');
								}
								else 
								{
									jQuery(this).find('.start').addClass('twelve');
									jQuery(this).find('.end').addClass('twelve');
								}
								jQuery(this).addClass('count');
								jQuery(this).css('margin-left', '0');
								// On la met à jour dans la page
								jQuery(this).find(".count").text(index);
								// On définie l'Id de l'activité nouvellement créée
								var nameacti = jQuery(this).find("#title").val();
								var thisVariation = jQuery(".prev-variation").attr("data-current");
								var nospace = "act";
								var actCount = (parseInt(jQuery(this).find('li').length) + 1);
								nomActiviteGlobal = nospace + '-' + number + '-' + actCount + '-' + thisVariation;
								jQuery(this).attr('id', nomActiviteGlobal);
								jQuery(this).attr('data-idcell', number);
								console.log(jQuery(this).attr('data-idcell'));
								var dateId = Date.now();
								jQuery(this).find('#dateid').val(dateId);
								//On ajoute l'id de la cellule à la valeur du champ "id_cell"
								jQuery(this).find('#id_cell').attr('value', number);
								jQuery(this).find(".duration").remove();
								
								// Affichage des champs cachés pour la définition de l'heure de début si la class hastimepicker n'est pas encore présente et si ce n'est pas une pause
								if (jQuery(this).find('#start_t').hasClass('invisible') ){
									jQuery(this).find('#start_t').removeClass('invisible');	
								}
								if (jQuery(this).find('span').hasClass('invisible') ){
									jQuery(this).find('span').removeClass('invisible');	
								}
								if (jQuery(this).find('#end_t').hasClass('invisible') ){
									jQuery(this).find('#end_t').removeClass('invisible');	
								}
								if (jQuery(this).find('.sy-mergebutton').hasClass('invisible') ){
									jQuery(this).find('.sy-mergebutton').removeClass('invisible');	
								}

								var startId = '#'+ nomActiviteGlobal;
								//console.log(startId);
								var thecellsender = jQuery(ui.sender).attr('class');
								console.log(thecellsender);
								sender = jQuery(ui.sender).attr('id');
					            senderId = sender.substring(sender.lastIndexOf("_")+1);
					            senderId = parseInt(senderId);

					            if (jQuery(this).parents('.fullplanning').attr('data-time-mode') == 0)
					            {
									/****************************************************************************/
									// Recherche si une cellule précédente existe et si elle contient une heure de fin
									// Si oui, on limite l'heure de début en fonction de l'heure de fin de la précédente activité ajoutée
									/****************************************************************************/
									prevId = number-1;
									prevIdCell = "#cellule_"+prevId;
									var counter = 1;
									//Si il y a une cellule ul précédente et s'il n'y a pas de 'li' dans cette cellule et si l'id de la de la colonne de la 'ul' courante est identique à la 'ul' précédente
									if (jQuery(prevIdCell).length >= 1 && jQuery(prevIdCell).find('li').length == 0 && (jQuery(prevIdCell).parents('div').attr('id') ==  jQuery('#'+getIdCell).parents('div').attr('id'))) {
										// Tant qu'il n'y a pas de 'li' dans cette 'ul' on continue de chercher à la cellule précédente
										while (jQuery(prevIdCell).find('li').length == 0 ) {
											prevId = prevId-1;
											prevIdCell = "#cellule_"+prevId;
											
											if (jQuery('#'+getIdCell).parents('div').attr('id') != jQuery(prevIdCell).parents('div').attr('id'))  {
												var prevH = parseInt(startingtime.substr(0,2))+counter;
												if (prevH >=24) {
									  				prevH = prevH - 24;
									  			}
									  			if (prevH < 0) {
									  				prevH = 24+counter;
									  			}
												var prevM = startingtime.substr(3,2);
												if (prevH <= 9) {
													valPrevCell = "0" + String(prevH) + ":"+ prevM;
													valMin = "0" + String(prevH-1) + ":"+ prevM;
												}
												else {
													valPrevCell = String(prevH) + ":"+ prevM;
													valMin = String(prevH-1) + ":"+ prevM;
												}
												break;
											}
											else if (jQuery(prevIdCell).find('li').length >= 1 && !senderId ) {
												var prevHm = jQuery(prevIdCell).children('li').find('.end').val();
												var prevH = parseInt(prevHm.substr(0,2))+counter;
												if (prevH >=24) {
									  				prevH = prevH - 24;
									  			}
									  			if (prevH < 0) {
									  				prevH = 24+counter;
									  			}
												var prevM = parseInt(prevHm.substr(3,2));
												if (prevM < 10) {
													prevM = '0'+ String(prevM);
												}
												if (prevH <= 9) {
													valPrevCell = "0" + String(prevH) + ":"+ prevM;
													valMin = "0" + String(prevH-1) + ":"+ prevM;
												}
												else {
													valPrevCell = String(prevH) + ":"+ prevM;
													valMin = String(prevH-1) + ":"+ prevM;
												}
										   		break;
										   	}
										   	counter = counter+1;
										}
										if (senderId) {
											var idtoneg = String(senderId);
									   		counter =  parseInt(number.substr(2,2)) - parseInt(idtoneg.substr(2,2));
											var prevHm = jQuery(this).find('#htomove').val();
											var prevH = parseInt(prevHm.substr(0,2))+counter;
											if (prevH >=24) {
								  				prevH = prevH - 24;
								  			}
								  			if (prevH < 0) {
								  				prevH = 24+counter;
								  			}
											var prevM = parseInt(prevHm.substr(3,2));
											if (prevM < 10) {
												prevM = '0'+ String(prevM);
											}
											if (prevH <= 9) {
												valPrevCell = "0" + String(prevH) + ":"+ prevM;
												valMin = "0" + String(prevH-1) + ":"+ prevM;
												jQuery(this).find('#htomove').attr('value', valPrevCell);
											}
											else {
												valPrevCell = String(prevH) + ":"+ prevM;
												valMin = String(prevH-1) + ":"+ prevM;
												jQuery(this).find('#htomove').attr('value', valPrevCell);
											}
										}
									}
									else if (jQuery(prevIdCell).length == 0 && (jQuery('#'+getIdCell).parents('div').attr('id') != jQuery(prevIdCell).parents('div').attr('id')) ) {
										valPrevCell = startingtime;
										//console.log(valPrevCell);
									}
									else {
										valPrevCell = jQuery(prevIdCell).children('li').find('.end').val();
										//console.log(valPrevCell);
									}
									jQuery(this).find('#htomove').attr('value', valPrevCell);
									/******************************************************************************/
									//On recherche s'il y a une activité précédent et si oui on attribue l'heure de fin de la cellule précédente
									// à l'heure de début de la nouvelle cellule crée
									/******************************************************************************/
									if (valPrevCell && jQuery(this).find('.start').val().length == 0) {
										//console.log(valPrevCell);
										jQuery(this).find('.start').val(valPrevCell);
										var duree = parseInt(jQuery(startId).find('#duree').val());
										//console.log(duree);
								  		var debutprev = jQuery(prevIdCell).children('li').find('.end').val();
								  		//console.log(debutprev);
								  		var heureDebut = jQuery(startId).find('.start').val();
								  		//console.log(heureDebut);
								  		var getH = parseInt(heureDebut.substr(0,2));
								  		//console.log(getH);
								  		var heuFin = parseInt(duree / 60) + getH;
								  		//console.log(heuFin);
								  		var getM = parseInt(heureDebut.substr(3,2));
								  		//console.log(getM);
								  		var minFin = getM + (duree % 60);
								  		//console.log(minFin);
							  			if (minFin >= 60) {
											minFin = minFin-60;
											heuFin = heuFin +1;
										}
							  			if (minFin <= 9){
							  				minFin = "0"+String(minFin);	
							  			}
							  			if (heuFin >=24) {
							  				heuFin = heuFin - 24;
							  			}
							  			if (heuFin <= 9) {
											var heureFinal = "0" + String(heuFin) + ":"+ String(minFin);
										}
										else {
											heureFinal = String(heuFin) + ":"+ String(minFin);
										}
							  			//console.log(heureFinal);
							  			jQuery(this).find('.end').val(heureFinal);
									}
									// S'il y a une activité précédente et une valeur start à cette activité
									if (valPrevCell && jQuery(this).find('.start').val().length > 0) {
										//console.log(valPrevCell);
										// si on avance l'activité d'une j=heure ou plus, l'heure de début augmente d'autant de case
										if (parseInt(jQuery(this).find('.start').val().substr(0,2)) < parseInt(valPrevCell.substr(0,2))) {
											jQuery(this).find('.start').val(valPrevCell);
											//console.log(startId);
											var duree = parseInt(jQuery(startId).find('#duree').val());
									  		var debutprev = jQuery(prevIdCell).find('li').find('.end').val();
									  		var heureDebut = jQuery(startId).find('.start').val();
									  		var getH = parseInt(heureDebut.substr(0,2));
									  		var heuFin = parseInt(duree / 60) + getH;
								  			var getM = parseInt(heureDebut.substr(3,2));
								  			var minFin = getM + (duree % 60);
									  		if (minFin >= 60) {
												minFin = minFin-60;
												heuFin = heuFin +1;
											}
								  			if (minFin <= 9){
								  				minFin = "0"+String(minFin);	
								  			}
								  			if (heuFin >=24) {
								  				heuFin = heuFin - 24;
								  			}
								  			if (heuFin <= 9) {
												var heureFinal = "0" + String(heuFin) + ":"+ String(minFin);
											}
											else {
												heureFinal = String(heuFin) + ":"+ String(minFin);
											}
											//console.log(heureFinal);
									  		jQuery(this).find('.end').val(heureFinal);
										}
										// sinon si on recule l'activité d'une heure ou plus, l'heure de début réduit d'autant de case
										else if (parseInt(jQuery(this).find('.start').val().substr(0,2)) > parseInt(valPrevCell.substr(0,2))) {
											jQuery(this).find('.start').val(valPrevCell);
											var duree = parseInt(jQuery(startId).find('#duree').val());
									  		var debutprev = jQuery(prevIdCell).find('li').find('.end').val();
									  		var heureDebut = jQuery(startId).find('.start').val();
									  		var getH = parseInt(heureDebut.substr(0,2));
									  		var heuFin = parseInt(duree / 60) + getH;
								  			var getM = parseInt(heureDebut.substr(3,2));
								  			var minFin = getM + (duree % 60);
									  		if (minFin >= 60) {
												minFin = minFin-60;
												heuFin = heuFin +1;
											}
								  			if (minFin <= 9){
								  				minFin = "0"+String(minFin);	
								  			}
								  			if (heuFin >=24) {
								  				heuFin = heuFin - 24;
								  			}
								  			if (heuFin <= 9) {
												var heureFinal = "0" + String(heuFin) + ":"+ String(minFin);
											}
											else {
												heureFinal = String(heuFin) + ":"+ String(minFin);
											}
											//console.log(heureFinal);
									  		
									  		jQuery(this).find('.end').val(heureFinal);
										}
									}
									/******************************************************************************/
									// limite du choix de l'heure de début en fonction de l'heure de début de la prochaine activité. 
									/******************************************************************************/
									nextId = parseInt(number)+1;
									//On récupère en JSON les donnée de input#scheduledact
									//alert("dataVariation 2259 " + dataVariation);
									var planActData = getPlanActData(dataVariation);
									//console.log(planActData[0]);
									//alert("planActData 2262" + planActData);
									var planActivityJSON = planActData[0];
									jQuery(this).find('#idacti').val(planActData[1]);
									
									var nextIdCell = "#cellule_"+nextId;
									if (jQuery(nextIdCell).length >= 1 && jQuery(nextIdCell).find('li').length == 0 && (jQuery(nextIdCell).parents('div').attr('id') ==  jQuery('#'+getIdCell).parents('div').attr('id'))) {
										while (jQuery(nextIdCell).find('li').length == 0 ) {
											nextId = nextId+1;
											nextIdCell = "#cellule_"+nextId;

											if (jQuery(nextIdCell).length == 0 || (jQuery('#'+getIdCell).parents('div').attr('id') != jQuery(nextIdCell).parents('div').attr('id')) ) {
												var valNextCell = '24:00'
												break;
											}
											else if (jQuery(nextIdCell).find('li').length >= 1 ) {
										   		var valNextCell = jQuery(nextIdCell).children('li').find('.start').val();
										   		break;
										   	}
										}
									}
									else {
										var valNextCell = jQuery(nextIdCell).children('li').find('.start').val();
									}
									
								} // fin if data-time-mode
								else // Time mode 12h
								{
									//On récupère en JSON les donnée de input#scheduledact
									//alert("dataVariation " + dataVariation)
									var planActData = getPlanActData(dataVariation);

									//console.log(planActData[0]);
									var planActivityJSON = planActData[0];
									jQuery(this).find('#idacti').val(planActData[1]);
									//Fin
									var prevId = number-1;
									var prevIdStr = number.toString();
									var cell = prevIdStr.substr(2,4);
									//console.log("cell : "+cell);
									prevIdCell = "#cellule_"+prevId;
									var counter = 1;
									var postfix, postfix1, postfix2;
									var hour, minute;
									var duree = parseInt(jQuery(startId).find('#duree').val());
									//console.log("duree : "+duree);
									var hour01 = parseInt(startingtime.substr(0,2));
									//console.log("hour01 : "+hour01);
									
									if (hour01 < 10) {
										postfix = startingtime.substr(5,2);
										//console.log("postfix : "+postfix);

										var minute01 = startingtime.substr(2,2);
										//console.log("minute011 : "+minute01);
									} 
									else {
										postfix = startingtime.substr(6,2);
										//console.log("postfix : "+postfix);

										var minute01 = startingtime.substr(3,2);
										//console.log("minute012 : "+minute01);
									}

									function calculateFirstTime(el)	{
										var firstTime;
										
										if (jQuery(prevIdCell).find('.end').val()) {
											firstTime = jQuery(prevIdCell).find('.end').val();
										}
										else {
											var startHour = hour01 + (cell-1);
											if (startHour >= 12 && startHour < 24 && hour01 !=12) {
												if (postfix == "am") {
													postfix = "pm";
												}
												else if (postfix == "pm") {
													postfix = "am";
												}
											}
											else if (startHour >= 24 && hour01 == 12) {
												if (postfix == "am") {
													postfix = "pm";
												}
												else if (postfix == "pm") {
													postfix = "am";
												}
											}
											else if(startHour == 12 && hour01 == 12 ) {
												if (postfix == "am") {
													postfix = "am";
												}
												else if (postfix == "pm") {
													postfix = "pm";
												}
											}
											else {
												if (postfix == "am") {
													postfix = "am";
												}
												else if (postfix == "pm") {
													postfix = "pm";
												}
											}
											if (startHour > 12 && startHour <= 24) {
												startHour = startHour - 12;	
											}
											if (startHour > 24) {
												startHour = startHour - 24;	
											}
											var startMin = minute01;
											var firstTime = startHour+":"+startMin+" "+postfix;
										}
										
										//console.log("firstTime : "+firstTime);
										el.find('.start').attr('value', firstTime);
										el.find('#htomove').attr('value', firstTime);
									}// fin calculateFirstTime


									function calculateEndTime(el) {
										var startTime = jQuery(startId).find('.start').val();
										

										var hour = parseInt(startTime.substr(0,2));
										if (hour < 10) {
											postfix = startTime.substr(5,2);
											var minute = parseInt(startTime.substr(2,2));
										} 
										else {
											postfix = startTime.substr(6,2);
											var minute = parseInt(startTime.substr(3,2));
										}
										var endHour = parseInt(duree / 60) + hour;
										var endMin = minute + (duree % 60);
										if (endMin >= 60 ) {
											var endMin = endMin - 60;
											var endHour = endHour + 1;
										} 
										if (endMin <= 9) {
							  				endMin = "0"+String(endMin);
							  			}					
										if (endHour >= 12 && hour != 12) {
											if (postfix == "am") {
												postfix = "pm";
												console.log(postfix+" 1");
											}
											else if (postfix == "pm") {
												postfix = "am";
												console.log(postfix+" 2");
											}
										}
										else {
											if (postfix == "am") {
												postfix = "am";
												console.log(hour+" "+endHour+" "+postfix+" 3");
											}
											else if (postfix == "pm") {
												postfix = "pm";
												console.log(postfix+" 4");
											}
										}
										if (endHour > 12) {
											endHour = endHour - 12;
										}
										var endtime = endHour+":"+endMin+" "+postfix;
										el.attr('value', endtime);	
									} // Fin calculateEndTime

									function calculateEndTimeSelect(el) {
										console.log(el.attr('id'));
										var duree = parseInt(el.find('#duree').val());
										console.log(el.find('.start').val());

								  		var heureDebut = el.find('.start').val();
								  		var hour = parseInt(heureDebut.substr(0,2));
								  		if (hour < 10) {
											postfix = heureDebut.substr(5,2);
											var minute = parseInt(heureDebut.substr(2,2));
										} 
										else {
											postfix = heureDebut.substr(6,2);
											var minute = parseInt(heureDebut.substr(3,2));
										}
										var endHour = parseInt(duree / 60) + hour;
										var endMin = minute + (duree % 60);
										if (endMin >= 60 ) {
											var endMin = endMin - 60;
											var endHour = endHour + 1;
										} 
							  			if (endMin <= 9){
							  				endMin = "0"+String(endMin);	
							  			}
							  			if (hour < 12 && endHour >= 12 ) {
											if (postfix == "am") {
												postfix = "pm";
											}
											else if (postfix == "pm") {
												postfix = "am";
											}
										}
										else {
											if (postfix == "am") {
												postfix = "am";
											}
											else if (postfix == "pm") {
												postfix = "pm";
											}
										}
										if (endHour > 12) {
											endHour = endHour - 12;
										}	
										heureFinal = String(endHour) + ":"+ String(endMin)+ " "+ postfix;
										console.log(heureFinal);
								  		var heureDeFin = el.find('.end').attr("value", heureFinal);	
									} // Fin calculateEndTimeSelect
									
									if (jQuery(prevIdCell).length == 0) {
										jQuery(startId).find('.start').attr('value', startingtime);
									}
									else {
										calculateFirstTime(jQuery(startId));
										console.log(jQuery(prevIdCell).attr('id'));
									}
									calculateEndTime(jQuery(startId).find('.end'));

								}// Fin else data-time-mode time mode 12h

								/*****************************************************************/
					            	// Si l'activité est déplacée, on modifie l'id de la cellule uniquement
						            if (senderId) {
						            	var id_activity = jQuery(this).find("input#id_activity").val();
						            	var idacti = jQuery(this).find("input#idacti").val();
										var id_cell = jQuery(this).find("input#id_cell").val();
										var start_t = jQuery(this).find("input#start_t").val();
										var end_t = jQuery(this).find("input#end_t").val();
										//On modifie les données de l'objet JSON
							        	jQuery.each(planActivityJSON["timetables"][dataVariation]["scheduledacts"], function(){
							        		if(this.id_cell == senderId) 
							        		{
							        			this.id_cell = id_cell;
							        			this.start_t = start_t;
							        			this.end_t = end_t;
							        		}
							        	});

							        	//On ajoute la string complète à l'input
					                	jQuery('#scheduledact').val(JSON.stringify(planActivityJSON));
					                	
					                	hastobesaved();
						            } // Fin If senderId
						            else {
					            	/*****************************************************************/
													/*Enregistrement de l'activité*/
									/*****************************************************************/									
										var thisScheduledActivity = JSON.stringify(jQuery(this).find('form').serializeObject());

			        					// On transform le string en objet JSON
							        	var thisScheduledActivityJson = JSON.parse(thisScheduledActivity);
							        	var idacti = thisScheduledActivityJson["idacti"];

							        	planActivityJSON["timetables"][dataVariation]["scheduledacts"][idacti] = thisScheduledActivityJson;
							        	// on transforme l'objet JSON en string
							        	var StringplanActivity = JSON.stringify(planActivityJSON);
							        	//On ajoute la string complète à l'input
					                	jQuery('#scheduledact').val(StringplanActivity);
					                	//alert(jQuery('#scheduledact').val());
					                	hastobesaved();
						            }	

									/*****************************************************************/	
								// On attribue le datetimepicker aux champs ".start" et ".end"

								var planactId = jQuery(this).find('#idacti').val();
								var variation = jQuery('.nextvariation').attr('data-current');
								if (jQuery('.fullplanning').attr('data-time-mode') == 0)
								{
									jQuery(this).find('.start').datetimepicker({
									  	format:'H:i',
									  	step:5,
									  	closeOnTimeSelect:true,
									  	onShow:function(ct){	
									  	}, // Fin onShow
									  	// Sélection de l'heure de début de l'activité et calcul de son heure de fin à partir de sa durée
									  	onSelectTime:function(ct){
									  		//console.log(planactId);
									  		var duree = parseInt(jQuery(startId).find('#duree').val());
									  		var debutprev = jQuery(prevIdCell).find('li').find('.end').val();
									  		//console.log(startId);
									  		//console.log(jQuery(startId).find('.start').val());
									  		var heureDebut = jQuery(startId).find('.start').val();
									  		var getH = parseInt(heureDebut.substr(0,2));
									  		var heuFin = parseInt(duree / 60) + getH;
									  		var getM = parseInt(heureDebut.substr(3,2));
									  		var minFin = getM + (duree % 60);
								  			if (minFin >= 60) {
												minFin = minFin-60;
												heuFin = heuFin +1;
											}
								  			if (minFin <= 9){
								  				minFin = "0"+String(minFin);	
								  			}
								  			if (heuFin >=24) {
								  				heuFin = heuFin - 24;
								  			}
								  			if (heuFin <= 9) {
												var heureFinal = "0" + String(heuFin) + ":"+ String(minFin);
											}
											else {
												heureFinal = String(heuFin) + ":"+ String(minFin);
											}
								  			//console.log(heureFinal);
								  			var heureDeFin = jQuery(startId).find('.end').val(heureFinal);

											// On charge le tableau des planacts
											var planActivityArray = JSON.parse(jQuery('#scheduledact').val());
								        	//console.log(planActivityArray);
								        	//**************Enregistrement de l'activité******************
								        	//On récupère la string JSON et on la parse en objet json
								        	var thisPlanActJson = planActivityArray['timetables'][variation]['scheduledacts'][planactId];
								        	//On modifie les heures de début et de fin de l'objet
								        	thisPlanActJson['start_t'] = jQuery(startId).find('input#start_t').val();
								        	thisPlanActJson['end_t'] = jQuery(startId).find('input#end_t').val();
								        	
								        	//On ajoute la string complète à l'input
							            	jQuery('#scheduledact').val(JSON.stringify(planActivityArray));
							            	//****************Fin enregistrement de l'activité**********************
							            	hastobesaved();
									  	}, //Fin onSelectTime
										timepicker:true,
										datepicker:false
									}); //Fin dateTimePicker Start
									
								} // fin if fullplanning time mode == 0
								else {
									jQuery(this).find('.start').datetimepicker({
									  	format:'g:i a',
									  	formatTime:'g:i a',
									  	step:5,
									  	closeOnTimeSelect:true,
									  	onShow:function(ct){
										  	this.setOptions({    
										   }) 
									  	}, // Fin onShow
									  	
									  	// Sélection de l'heure de début de l'activité et calcul de son heure de fin à partir de sa durée
										////////////////////
									  	onSelectTime:function(ct){
									  		console.log(startId);
									  		calculateEndTimeSelect(jQuery(startId));

											jQuery( "#master-drag > li ").unbind("click");
											jQuery( "#master-drag > li ").draggable("option", "disabled", false );

											// On ajoute la valeur de l'heure de début à la valeur du champ "start_t"
											var start = jQuery(startId).find('.start').val();
											jQuery(startId).find('#start_t').attr('value', start);
											// On ajoute la valeur de l'heure de fin à la valeur du champ "end_t"
											var end = jQuery(startId).find('.end').val();
											jQuery(startId).find('#end_t').attr('value', end);
											var id_activity = jQuery(startId).find("input#id_activity").val();
											var id_planning = jQuery(startId).find("input#id_planning").val();
											var id_cell = jQuery(startId).find("input#id_cell").val();
											if (jQuery(startId).find('#htomove').length == 0) {
											jQuery(startId).append('<input id="htomove" name="htomove" type="hidden" value="'+start+'">');
											}
											else {
												jQuery(startId).find('#htomove').attr('value', start);
											}
											var id = jQuery(startId).find("input#idacti").val();
											// ON charge le tableau des planacts
											//console.log(planactId);
											var planActivityString = jQuery('#scheduledact').val();
								        	//console.log(planActivityString);
								        	var planActivityArray = planActivityString.split(',{');
								        	// On formate correctement le tableau
								        	for (var i = 0; i < planActivityArray.length; i++) {
								        		//console.log(planActivityArray[i]);
								        		var pattern = new RegExp("^\"d");
								        		//console.log(pattern.test(planActivityArray[i]));
								        		if (pattern.test(planActivityArray[i]) == true) {
								        			planActivityArray[i] = "{"+planActivityArray[i];
								        		}
								        	};
								        	//**************Enregistrement de l'activité******************
								        	console.log(planActivityArray[planactId]);
								        	//On récupère la string JSON et on la parse en objet json
								        	var thisPlanActJson = JSON.parse(planActivityArray[planactId]);
								        	//On modifie les heures de début et de fin de l'objet
								        	thisPlanActJson['start_t'] = jQuery(startId).find('input#start_t').val();
								        	thisPlanActJson['end_t'] = jQuery(startId).find('input#end_t').val();
								        	//On retransforme l'objet en string json
								        	var thisPlanActString =  JSON.stringify(thisPlanActJson);
								        	//console.log(thisPlanActJson);
								        	//console.log(thisPlanActString);
								        	
								        	//On modifie l'entrée correspondante du tableau
								        	planActivityArray[planactId] = thisPlanActString;
								        	console.log(planActivityArray[planactId]);
								        	
								        	// on transforme le tableau en string
								        	var StringplanActivity = planActivityArray.join(',');
								        	console.log(StringplanActivity)
								        	
								        	//On ajoute la string complète à l'input
							            	jQuery('#scheduledact').val(StringplanActivity);
							            	//****************Fin enregistrement de l'activité**********************
							            	hastobesaved();
									  	}, //Fin onSelectTime
										timepicker:true,
										datepicker:false
									}); //Fin dateTimePicker Start
									
									
								}
							}// fin if undefined
						});
					//console.log(jQuery(this).length);
					}, // FIN receive
					remove: function(event, ui) {
						jQuery(this).removeClass('onlyone');
					}
				}); // Fin sortable
			}) // fin fullplanning ul each()
		})
		}// Fin makeItSortable()
		makeItSortable();


/**************************************************************/
/*                       NEW ACTIVITY                         */
/**************************************************************/
        var name = jQuery(this).find("#actname"),
        duration = jQuery(this).find("#actduration"),
        id, goodId, linked,
        idTimetable = jQuery(this).find("#acttimetable"),
        linked = jQuery(this).find("#actlink"),
        color = jQuery(this).find("#actcolor"),
        overcolor = jQuery(this).find("#actovercolor"),
        fontcolor = jQuery(this).find("#fontcolor"),
        fontovercolor = jQuery(this).find("#fontovercolor"),
        status = jQuery(this).find("#actstatus"),
        access = jQuery(this).find("#jform_access"),
        book = jQuery(this).find("#actbook"),
        place = jQuery(this).find("#actplace"),
        placelimit = jQuery(this).find("#actplacelimit"),
        newid, newid2;
        
        // Création ou chargement du tableau des activités
        if (jQuery('#activities').val().length == 0) {
        	var activityArray = [];
        	//console.log(activityArray);
        }
        else {
        	var activityArray = jQuery('#activities').val();
        	//console.log(activityArray);
        	var activityArray = activityArray.split(',{');
        	for (var i = 0; i < activityArray.length; i++) {
        		//console.log(planActivityArray[i]);
        		var pattern = new RegExp("^\"a");
        		//console.log(pattern.test(activityArray[i]));
        		if (pattern.test(activityArray[i]) == true) {
        			activityArray[i] = "{"+ activityArray[i];
        		}
        	};

        }
        var textCreate = jQuery('.sy-text-create').text();
        var textCancel = jQuery('.sy-text-cancel').text();
        var textApply = jQuery('.sy-text-apply').text();
        // Option pour la dialog de la configuration du planning
        var configopt = {
            dialogClass: "no-close",
            closeOnEscape: false,
            autoOpen: false,
            height: 750,
            width: 500,
            modal: true,
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
                text: textApply, 
                click: function() {
                jQuery(this).dialog("close");
                
                function hastobesaved() {
					if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
						jQuery('.ultimate-submit').addClass('hastobesaved');
						//On empèche la fenêtre de se fermer
						jQuery(window).on('beforeunload', function(){
						  return 'Are you sure you want to leave?';
						});
					}
					var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
	            	changes = changes +1;
	            	var saveText = jQuery('.sy-text-save').html();
		        	jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
	            	jQuery('.ultimate-submit').attr('data-changes', changes);
				}
                hastobesaved();
                }
            }],
            open:function () {
            	jQuery(".ui-dialog ").addClass("syet-dialog");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-apply");
		    }
        };

        if (configDialog) {
        	
        	var baddialog = jQuery(".sy-form-container").dialog(configopt);
        }
        else {
        	var configDialog = jQuery(".sy-form-container").dialog(configopt);
        }
        
    	
        jQuery('.sy-configuration').on('click', function(){
        	configDialog.dialog('open');
        	
        })

        
        var opt = {
            dialogClass: "no-close",
            closeOnEscape: false,
            autoOpen: false,
            width: 450,
            modal: true,
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
                text: textApply, 
                click: function() {
                	// ON récupère les datas du formulaire transformé en string json
		        	var thisActivity = jQuery('#actiform').serializeObject();
					
					thisActivity['actname'] = encodeURIComponent(thisActivity['actname']);
		        	thisActivity['actname'] = thisActivity['actname'].replace(/'/g, "%%%");
		        	console.log(thisActivity['actname'])
		        	
		        	var thisActivity = JSON.stringify(thisActivity);
		        	// On transform le string en objet JSON
		        	var thisActivityJson = JSON.parse(thisActivity);
		        	// On récupère l'id de la nouvelle activité
		        	var idActivity = thisActivityJson['actid'];
		        	if (thisActivityJson['actduration'] > 60)
		        	{
		        		thisActivityJson['actduration'] = 60;
		        	}
		        	
		        	var duration = thisActivityJson['actduration'];
		        	//console.log(duration);
		        	thisActivityJson['actname'] = thisActivityJson['actname'].replace(/%%%/g, "'");
		        	//thisActivityJson['actname'] = encodeURIComponent(thisActivityJson['actname']);
		        	var name = decodeURIComponent(thisActivityJson['actname']);
		        	var encodeName = thisActivityJson['actname'];
		        	console.log(name);
		        	console.log(encodeName);
		        	var color = thisActivityJson['actcolor'];
		        	var fontcolor = thisActivityJson['fontcolor'];
		        	var tooltiptext = thisActivityJson['acttooltiptext'];
		        	var description = thisActivityJson['actdescription'];
		        	var textincell = thisActivityJson['actincelltext'];
		        	//console.log(tooltiptext);
		        	var restooltip = tooltiptext.replace(/["']/g, "");
		        	var resdesc = description.replace(/["']/g, "");
		        	var restextcell = textincell.replace(/["']/g, "");
		        	thisActivityJson['acttooltiptext'] = restooltip;
		        	thisActivityJson['actdescription'] = resdesc;
		        	thisActivityJson['actincelltext'] = restextcell;
		        	
		        	activityArray.push(thisActivity);
		        	//console.log(activityArray);
		        	var StringActivity = activityArray.join(',');
		        	//console.log(StringActivity)
                	jQuery('#activities').val(StringActivity);
                	
                	 if (name.length > 13 && name.length < 24) {
		                fontSize = "font-size:12px;";
		                lineHeight = "line-height:16px";
		            }
		            else if (name.length > 23 && namelength < 30) {
		                fontSize = "font-size:10px;";
		                lineHeight = "line-height:16px";
		            }
		            else if (name.length > 29) {
		                fontSize = "font-size:10px;";
		                lineHeight = "line-height:12px";
		            }
		            else {
		                fontSize = "";
		                lineHeight = "";
		            }
		            var newid = name.replace(/\s+/g,"");
		            newid = newid.replace(/[#$,.;:!€£"&?%()’'-\*]/g, "");
		            newid = newid.replace(/[\"\/~\\<|>@]/g, "");
		            newid = newid.replace(/[áàâÂäÄæÆãÃåÅÀÁ]+/g,"a");
		            newid = newid.replace(/[éèêëÉÈÊË]+/g,"e");
		            newid = newid.replace(/[ïîìíÍÌÎÏ]+/g,"i");
		            newid = newid.replace(/[ûüùúÚÙÛÜ]+/g,"u");
		            newid = newid.replace(/[ôöòÓóÒØøõÕœŒÔ]+/g,"o");
		            newid = newid.replace(/[ÝýÿŸ]+/g,"y");
		            newid = newid.replace(/[žŽ]+/g,"z");
		            newid = newid.replace(/[šŠß]+/g,"s");
		            newid = newid.replace(/[çÇ]+/g,"c");
		            newid = newid.replace(/[ñÑ]+/g,"n");
		            newid = newid.replace(/^1/g,"one");
		            newid = newid.replace(/^2/g,"two");
		            newid = newid.replace(/^3/g,"three");
		            newid = newid.replace(/^4/g,"four");
		            newid = newid.replace(/^5/g,"five");
		            newid = newid.replace(/^6/g,"six");
		            newid = newid.replace(/^7/g,"seven");
		            newid = newid.replace(/^8/g,"eight");
		            newid = newid.replace(/^9/g,"nine");
		            newid = newid.replace(/^0/g,"zero");
		            var IdActFinal = '#' + newid+"-"+idActivity;
		            //console.log(newid);
		            var scriptDragg   = document.createElement("script");
					scriptDragg.type  = "text/javascript";
					
		            jQuery(newid).draggable({
		                connectToSortable: "ul:not(#theactivities, .onlyone)",
		                handle: "#nom", // droppable dans les listes jour
		                helper: "clone", // 
		                revert: "invalid",
		                revertDuration: 200
		            });
                	if (name != "blank") {
						jQuery( "#theactivities" ).append( 
							'<li id="'+newid+'" data-idcell="" class="'+newid+idActivity+' activity ui-draggable ui-draggable-handle act-'+'" style="background-color:#'+color+';color:#'+fontcolor+';margin-left: 3px;">'+
			            	'<div id="nom" class="sy-name" style="'+ fontSize + lineHeight + '">' + name + '</div>' +
			                '<form enctype="application/json">' +
			                '<input id="duree" name="duree" type="hidden" value ="' + duration + '">' +
			                '<div id="duration" class="duration">'+duration+'\'</div>' +
			                '<input id="title" name="title" type="hidden" value ="' + encodeName + '">' +
			                '<input id="idacti" type="hidden" value="" name="idacti">' +
			                '<input id="count" name="count" type="hidden" value = "">' +
							'<input id="id_cell" type="hidden" value="" name="id_cell">' +
			                '<input id="id_activity" name="id_activity" type="hidden" value ="'+idActivity+'">'+
			                '<input id="start_t" name="start_t" type="text" value = "" class="start invisible" placeholder="Début" style="color:#'+fontcolor+';">' +
			                '<div class="invisible to" style="color:#'+fontcolor+';"> > </div>' +
			                '<input id="end_t" name="end_t" type="text" value = "" class="end invisible" placeholder="Fin" style="color:#'+fontcolor+';">' +
			                '<input id="status" name="status" type="hidden" value="1">'+
			                '<input id="htomove" name="htomove" type="hidden" value="">' +
			                '<input id="index" name="index" type="hidden" value="0">' +
			                '</form>' +
			            	'</li>');
		            }   
		            else {
		                jQuery( "#theactivities" ).append( 
		                    '<li id="'+name+'" data-idcell="" class="activity ui-draggable ui-draggable-handle" style="background-color:#fff;color:#000">' +
		                    '<div id="nom" class="sy-name">' + name + '</div>' +
		                    '<input id="duree" name="duree" type="hidden" value ="' + duration + '">' +
		                    '<div id="duration" class="duration">'+duration+'"</div>' +
		                    '<div id="slider-range" class="slider-range"></div>' +
		                    '<input id="title" name="title" type="hidden" value ="' + encodeName + '">' +
		                    '<input id="idacti" type="hidden" value="" name="idacti">' +
		                    '<input id="count" name="count" type="hidden" value = "">' +
		                    '<input id="id_cell" type="hidden" value="" name="id_cell">' +
		                    '<input id="id_activity" name="id_activity" type="hidden" value ="'+idActivity+'">'+
		                    '<input id="start_t" name="start_t" type="hidden" value = "" class="start invisible" placeholder="Start">' +
		                    '<div class="invisible to"> > </div>' +
		                    '<input id="end_t" name="end_t" type="hidden" value = "" class="end invisible" placeholder="End">' +
		                    '<input id="status" name="status" type="hidden" value="1">'+
		                    '<input id="htomove" name="htomove" type="hidden" value="">' +
		                    '<input id="index" name="index" type="hidden" value="0">' +
		                    '</li>');
		            }// Fin creation de la li
		            /*jQuery("#activities").find(li).each(function(){
		            	console.log(jQuery(this).attr('id'));
		        	});*/
					scriptDragg.text  = 'jQuery("#theactivities").find("li").each(function(){jQuery(this).draggable({connectToSortable: "ul:not(#theactivities, .onlyone)",handle: "#nom",helper: "clone",revert: "invalid",revertDuration: 200});});';               // use this for inline script
					document.body.appendChild(scriptDragg);
            		jQuery(this).dialog( "destroy" );
            		//setTimeout(function(){ jQuery(this).dialog("destroy"); }, 200);
            		jQuery(".sy-dialog-form").remove();
            		
					function hastobesaved() {
						if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
							jQuery('.ultimate-submit').addClass('hastobesaved');
						}
						var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
			        	changes = changes +1;
			        	var saveText = jQuery('.sy-text-save').html();
		        		jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
			        	jQuery('.ultimate-submit').attr('data-changes', changes);
			        	jQuery(window).on('beforeunload', function(){
						  	return 'Are you sure you want to leave?';
						});
					}
            		hastobesaved();
                },
            },
            {
                text: textCancel, 
                click: function() {
                //jQuery( this ).dialog( "close" );
                jQuery(".sy-dialog-form").remove();
                jQuery(this).dialog("destroy");
                //setTimeout(function(){ jQuery(this).dialog("destroy"); }, 200);
                
                },
            }],
            open:function () {
            	jQuery(".ui-dialog ").addClass("syet-dialog");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-apply");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:last").addClass("sy-cancel");
		    },
		      classes: {
			    "ui-dialog": "highlight"
			  }
        };

        function changeDelActId(variation, oldId, newId)
 		{
 			var planActivityJSON = JSON.parse(jQuery('#scheduledact').val());
 			jQuery.each(planActivityJSON["timetables"][variation]["scheduledacts"], function()
 			{
 				console.log(this.id_activity);
 				if (this.id_activity == oldId)
 				{
 					this.id_activity = newId;
 				}
 			})
 			console.log(planActivityJSON);
 			jQuery('#scheduledact').val(JSON.stringify(planActivityJSON));
 		}

        function deletePlanAct(variation)
        {
	        // Suppression des activités plannifiées
	       	var actId = jQuery('.sy-delete-info').attr('data-id');
	       	var deletedAct = [];
	       	var keptAct = [];
	       	var planActJSONFinal;
	       	var planActArrayFinal = [];
	       	// Récupération et parse Json des données des activités plannifiées
			var planActCount = 0;
			
        	var planActivityJSON = JSON.parse(jQuery('#scheduledact').val());
        	//console.log(jQuery('#scheduledact').val());
        	//console.log(planActivityJSON);
        	var scheduledacts = planActivityJSON["timetables"][variation]["scheduledacts"];
        	//console.log(scheduledacts);
        	//console.log(variation);
        	for ( property in scheduledacts )
			{
			   if(scheduledacts.hasOwnProperty(property))
			   {
			      planActCount++;
			   }
			}	
	        	
        	for (var i = 0; i < planActCount; i++) {
        		//console.log(variation);
        		var planActJSON = scheduledacts[i];
        		//console.log(i);
        		//console.log(planActJSON);
        		// Si l'id de l'activité planninfiée est égale à l'id de l'activité
        		if (planActJSON['id_activity'] == actId) 
        		{
        			// On ajoute l'index de l'activité plannifiée dans le tableau des activités plannifiées à effacer
        			deletedAct.push(i);
        		}
        		else 
        		{
        			keptAct.push(i);
        		}		
        	}
        	// On supprime les activités plannifiées grâce au tableau deletedAct
        	var deletedActLength =  deletedAct.length-1;
        	//console.log(deletedActLength);
        	//console.log(keptAct);
        	var finalCount = keptAct.length;
        	var totalCount = finalCount + deletedActLength;
        	//console.log(finalCount);
        	//console.log(totalCount);
        	for (var k = deletedActLength ; k >= 0 ; k--)
        	{
        		//console.log(k);
        		//console.log(variation);
        		scheduledacts[deletedAct[k]] = "";
        	}
        	
        	//On ajuste l'ordre des activités plannifiées
        	// On commence par calculer le nombre d'activté	
        	var planActCount2 = 0;
        	
			jQuery.each(scheduledacts, function(){
				//On ajuste l'idacti
				//console.log(planActCount2);
				//console.log(scheduledacts[planActCount2]);

				if (scheduledacts[planActCount2] == "")
				{
					var theCounter = planActCount2+1;
					while (scheduledacts[theCounter] == "")
					{
						//console.log("c'est vide");
						//console.log(theCounter);
						theCounter++;
					}
					
					if (typeof scheduledacts[theCounter] !== "undefined")
					{
						scheduledacts[planActCount2] = scheduledacts[theCounter];
						scheduledacts[planActCount2]["idacti"] = planActCount2;
						scheduledacts[theCounter] = "";
					}		
				}
				//On incrémente le compte
				planActCount2++;
			})
			//On supprimes les activités vides à la fin de l'objet
			for (var o = totalCount ; o >= finalCount ; o--)
			{

				if (scheduledacts[o] == "")
				{
					delete scheduledacts[o];
				}
			}
			console.log(planActivityJSON);
	        //On ajoute l'objet stringifié comme valeur du champs #scheduledact
			jQuery('#scheduledact').val(JSON.stringify(planActivityJSON));
		}

        // Option pour supprimer un activité et/ou les activités plannifiées de cette activité
        var chooseOption1 = jQuery(".sy-option-to-delete1").text();
        var chooseOption2 = jQuery(".sy-option-to-delete2").text();
        // Option pour supprimer un activité et/ou les activités plannifiées de cette activité
        var deleteopt = {
        	dialogClass: "no-close",
            closeOnEscape: false,
            autoOpen: false,
            width: 500,
            modal: true,
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
            buttons: [
	            {
	            	text: chooseOption2,
	            	click: function() {
	            		if (jQuery('#activities').val().length == 0) {
				        	var activityArray = [];
				        	id = 0;
				        }
				        else {
				        	var activityString = jQuery('#activities').val();
				        	//console.log(activityArray);
				        	var activityArray = activityString.split(',{');
				        	for (var i = 0; i < activityArray.length; i++) {
				        		//console.log(activityArray[i]);
				        		var pattern = new RegExp("^\"a");
				        		//console.log(pattern.test(activityArray[i]));
				        		if (pattern.test(activityArray[i]) == true) {
				        			activityArray[i] = "{"+ activityArray[i];
				        		}
				        		JSON.parse(activityArray[i]);
				        		//console.log(JSON.parse(activityArray[i]));
				        	};	
				        } // Fin else
				        //console.log(jQuery(".nextvariation").attr("data-current"));
		        		deletePlanAct(jQuery(".nextvariation").attr("data-current"));
				        
				        jQuery(this).dialog("destroy");
				        jQuery("#deleteactform").html('');
				        jQuery("#deleteactinfo").css("display", "block");
				        jQuery("#deleteactinfo").css("opacity", "1");

				        setTimeout(function(){ 
				        	jQuery("#deleteactinfo").animate({
				        	opacity: 0
				        }, 1000); 
				        }, 3000);
				        
				        function hastobesaved() {
							if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
								jQuery('.ultimate-submit').addClass('hastobesaved');
							}
							var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
				        	changes = changes +1;
				        	var saveText = jQuery('.sy-text-save').html();
				        	jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
				        	jQuery('.ultimate-submit').attr('data-changes', changes);
				        	var wantToLeave = jQuery(".sy-want-to-leave").text();
				        	jQuery(window).on('beforeunload', function(){
							  	return wantToLeave;
							});
						}
				        hastobesaved();
	            	}
	            	
	            },
	            {
	            	text: chooseOption1,
	            	click: function() {

	            		var actId = jQuery('.sy-delete-info').attr('data-id');
	            		//console.log(actId);
	            		var arrayActFinal = [], oldActId, newActId;
	            		if (jQuery('#activities').val().length == 0) 
	            		{
				        	var activityArray = [];
				        	id = 0;
				        }
				        else 
				        {
				        	var activityString = jQuery('#activities').val();
				        	//console.log(activityArray);
				        	var activityArray = activityString.split(',{');
				        	for (var i = 0; i < activityArray.length; i++) 
				        	{
				        		//console.log(activityArray[i]);
				        		var pattern = new RegExp("^\"a");
				        		//console.log(pattern.test(activityArray[i]));
				        		if (pattern.test(activityArray[i]) == true) {
				        			activityArray[i] = "{"+ activityArray[i];
				        		}
				        		JSON.parse(activityArray[i]);
				        		//console.log(JSON.parse(activityArray[i]));
				        	};
				        	//console.log(activityArray[actId]);
				        	activityArray.splice(actId, 1);
				        	
				        	for (var j = 0; j < activityArray.length; j++)
				        	{
				        		var actJSON = JSON.parse(activityArray[j]);
				        		oldActId = actJSON["actid"];
				        		//console.log(oldActId);
								actJSON["actid"] = j;
								newActId = actJSON["actid"];
				        		//console.log(actJSON["actid"]);
								arrayActFinal.push(JSON.stringify(actJSON));
				        	}
				        	//console.log(arrayActFinal);
				        } // Fin else

				        //On transforme en string  le tableau des activités restantes arrayActFinal						
				        var stringActivity = arrayActFinal.toString();
				        //et on l'ajoute comme valeur du champs scheduledact
	        			jQuery('#activities').val(stringActivity);
	        			jQuery(".timetable-container").find(".fullplanning").each(function()
	        				{
	        					console.log(jQuery(this).attr("data-variation"));
	        					deletePlanAct(jQuery(this).attr("data-variation"));
	        					changeDelActId(jQuery(this).attr("data-variation"), oldActId, newActId);
	        				});
				        //deletePlanAct(jQuery(".nextvariation").attr("data-current"));
				        //changeDelActId(oldActId, newActId);
				        jQuery(this).dialog("destroy");
				        jQuery("#deleteactinfo").css("display", "block");
				        jQuery("#deleteactinfo").css("opacity", "1");

				        setTimeout(function(){ 
				        	jQuery("#deleteactinfo").animate({
					        	opacity: 0
					        }, 1500);
					        jQuery("#deleteactinfo").css("display", "none"); 
				        }, 3000);
				        
				        jQuery("#deleteactform").html('');
				        function hastobesaved() {
							if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
								jQuery('.ultimate-submit').addClass('hastobesaved');
							}
							var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
				        	changes = changes +1;
				        	var saveText = jQuery('.sy-text-save').html();
				        	jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
				        	jQuery('.ultimate-submit').attr('data-changes', changes);
				        	var wantToLeave = jQuery(".sy-want-to-leave").text();
				        	jQuery(window).on('beforeunload', function(){
							  	return wantToLeave;
							});
						}
				        hastobesaved();
	            	}
	            	
	            },
	            {
	            	text: textCancel,
	            	click: function() {
	            		
	            		jQuery(this).dialog("destroy");
	            		jQuery("#deleteactform").html('');
	            	}
	            }
            ],
            open:function () {
            	jQuery(".ui-dialog").addClass("sy-delete-act");
		        jQuery(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-option1");		            
		        jQuery(".ui-dialog-buttonset").find(".ui-button:eq(1)").addClass("sy-option2");		            
		        jQuery(".ui-dialog-buttonset").find(".ui-button:last").addClass("sy-option3");		            
		    }
        }// deleteopt
        var chooseOption = jQuery(".sy-option-to-delete").text();
        jQuery(".deleteacti").on( "click", function() {
        	
	        var actli = jQuery(this).parents('li');
	        //console.log(actli);
	        var idacti = actli.attr('data-idacti');
	        var idname = decodeURIComponent(actli.attr('data-name').replace(/%%%/g, "'"));
	        //console.log(idacti);
	        
    		var deleteinfo = "<div class='sy-delete-act'>";
    		deleteinfo = deleteinfo +"<div class='sy-delete-info' data-id='" + idacti + "'>";
    		deleteinfo = deleteinfo +"<h3 class='sy-delete-dialog-content'>" + chooseOption + " \"" + idname +"\"";
    		deleteinfo = deleteinfo +"</h3>";
    		deleteinfo = deleteinfo +"</div>";
    		deleteinfo = deleteinfo +"</div>";

    		jQuery('#deleteactform').html('');
	        if (jQuery('#deleteactform').html() == '')	{
	        	// On ajoute le formulaire à la div qui s'ouvre en dialog box
	        	jQuery('#deleteactform').append(deleteinfo);
	        }

    		var deleteDialog = jQuery("#deleteactform").dialog(deleteopt);
    		deleteDialog.dialog('open');
	    }) // fin delete activité   
        
        // Option pour la dialog de l'édition d'une activité
        var editactopt = {
            dialogClass: "no-close",
            closeOnEscape: false,
            autoOpen: false,
            width: 450,
            modal: true,
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
            buttons: [
            {
                text: textApply, 
                click: function() {

                	if (jQuery('#activities').val().length == 0) {
			        	var activityArray = [];
			        	id = 0;
			        }
			        else {
			        	var activityArray = jQuery('#activities').val();
			        	//console.log(activityArray);
			        	var activityArray = activityArray.split(',{');
			        	for (var i = 0; i < activityArray.length; i++) {
			        		//console.log(activityArray[i]);
			        		var pattern = new RegExp("^\"a");
			        		//console.log(pattern.test(activityArray[i]));
			        		if (pattern.test(activityArray[i]) == true) {
			        			activityArray[i] = "{"+ activityArray[i];
			        		}
			        		JSON.parse(activityArray[i]);
			        	};
			        	
			        } // Fin else
                	
                	// ON récupère les datas du formulaire transformé en string json
		        	var thisActivity = JSON.stringify(jQuery('#actiform').serializeObject());
		        	// On transform le string en objet JSON
		        	var thisActivityJson = JSON.parse(thisActivity);
		        	// On récupère l'id de la nouvelle activité
		        	var idActivity = thisActivityJson['actid'];
		        	if(thisActivityJson['actduration'] > 60)
		        	{
		        		thisActivityJson['actduration'] = 60;
		        	}
		        	var duration = thisActivityJson['actduration'];
		        	console.log('line 3072');
		        	if (thisActivityJson['actnamenew'] != "")
		        	{
		        		thisActivityJson['actname'] = encodeURIComponent(thisActivityJson['actnamenew']);
		        		thisActivityJson['actname'] = thisActivityJson['actnamenew'].replace(/'/g, "%%%");
		        		thisActivityJson['actnamenew'] = encodeURIComponent(thisActivityJson['actnamenew']);
		        		thisActivityJson['actnamenew'] = thisActivityJson['actnamenew'].replace(/'/g, "%%%");
		        	}
		        	
		        	
		        	
		        	
		        	var color = thisActivityJson['actcolor'];
		        	var fontcolor = thisActivityJson['fontcolor'];
		        	var tooltiptext = thisActivityJson['acttooltiptext'];
		        	var description = thisActivityJson['actdescription'];
		        	var textincell = thisActivityJson['actincelltext'];
		        	
		        	var restooltip = tooltiptext.replace(/["']/g, "");
		        	var resdesc = description.replace(/["']/g, "");
		        	var restextcell = textincell.replace(/["']/g, "");
		        	thisActivityJson['acttooltiptext'] = restooltip;
		        	thisActivityJson['actdescription'] = resdesc;
		        	thisActivityJson['actincelltext'] = restextcell;
		        	
		        	var oldActiJson = JSON.parse(activityArray[idActivity]);
		        	
		        	var oldname = oldActiJson['actname'];
		        	
		        	thisActivity = JSON.stringify(thisActivityJson);
		        	// On modifie l'activité dans le tableau du champ du formulaire
		        	activityArray[idActivity] = thisActivity;
		        	
		        	var StringActivity = activityArray.join(',');
		        	console.log(StringActivity)
                	jQuery('#activities').val(StringActivity);

                	// On modifie l'activité dans la liste draggable
                	var newid = oldname.replace(/\s+/g,"");
		            newid = newid.replace(/[#$,.;:!€£"&?%()’'-\*]/g, "");
		            newid = newid.replace(/[\"\/~\\<|>@]/g, "");
		            newid = newid.replace(/[áàâÂäÄæÆãÃåÅÀÁ]+/g,"a");
		            newid = newid.replace(/[éèêëÉÈÊË]+/g,"e");
		            newid = newid.replace(/[ïîìíÍÌÎÏ]+/g,"i");
		            newid = newid.replace(/[ûüùúÚÙÛÜ]+/g,"u");
		            newid = newid.replace(/[ôöòÓóÒØøõÕœŒÔ]+/g,"o");
		            newid = newid.replace(/[ÝýÿŸ]+/g,"y");
		            newid = newid.replace(/[žŽ]+/g,"z");
		            newid = newid.replace(/[šŠß]+/g,"s");
		            newid = newid.replace(/[çÇ]+/g,"c");
		            newid = newid.replace(/[ñÑ]+/g,"n");
		            newid = newid.replace(/^1/g,"one");
		            newid = newid.replace(/^2/g,"two");
		            newid = newid.replace(/^3/g,"three");
		            newid = newid.replace(/^4/g,"four");
		            newid = newid.replace(/^5/g,"five");
		            newid = newid.replace(/^6/g,"six");
		            newid = newid.replace(/^7/g,"seven");
		            newid = newid.replace(/^8/g,"eight");
		            newid = newid.replace(/^9/g,"nine");
		            newid = newid.replace(/^0/g,"zero");
		            var ActFinal = newid+"-"+idActivity;
		            var IdActFinal = '#' + ActFinal;

		            var oldnameRegex = new RegExp(oldname);
	        		console.log(oldnameRegex.test(jQuery(IdActFinal).find('#nom').html()));

		            jQuery(IdActFinal).attr('data-name', thisActivityJson['actname']);
		            jQuery(IdActFinal).attr('data-description', thisActivityJson['actdescription']);
		            jQuery(IdActFinal).attr('data-color', thisActivityJson['actcolor']);
		            jQuery(IdActFinal).attr('data-overcolor', thisActivityJson['actovercolor']);
		            jQuery(IdActFinal).attr('data-fontolor', thisActivityJson['fontcolor']);
		            jQuery(IdActFinal).attr('data-fontoverolor', thisActivityJson['fontovercolor']);
		            jQuery(IdActFinal).attr('data-image', thisActivityJson['actimage']);
		            jQuery(IdActFinal).attr('data-duration', thisActivityJson['actduration']);
		            
		            jQuery(IdActFinal).find('#nom').html(thisActivityJson['actname']);

		            jQuery(IdActFinal).find('#duree').val(thisActivityJson['actduration']);
		            jQuery(IdActFinal).find('.duration').html(thisActivityJson['actduration'] +"'");
		            jQuery(IdActFinal).css('background-color', '#' + thisActivityJson['actcolor']);
		            jQuery(IdActFinal).css('color', '#' + thisActivityJson['fontcolor']);

                	jQuery(".sy-editact-form").remove();
                	jQuery(this).dialog("destroy");
                	// Info bulle pour sauver le planning
                	jQuery("#deleteactinfo").css("display", "block");
			        jQuery("#deleteactinfo").css("opacity", "1");

			        setTimeout(function(){ 
			        	jQuery("#deleteactinfo").animate({
				        	opacity: 0
				        }, 1500); 
				        jQuery("#deleteactinfo").css("display", "none");
			        }, 3000);

                	function hastobesaved() {
						if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
							jQuery('.ultimate-submit').addClass('hastobesaved');
						}
						var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
			        	changes = changes +1;
			        	var saveText = jQuery(".sy-text-save").text();
            			jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
			        	jQuery('.ultimate-submit').attr('data-changes', changes);
			        	jQuery(window).on('beforeunload', function(){
						  	return 'Are you sure you want to leave?';
						});
					}
                	hastobesaved();
                }
            },
            {
            	text: textCancel,
            	click: function(){
            		jQuery(".sy-editact-form").remove();
                	jQuery(this).dialog("destroy");
            	}
            }],
            open:function () {
            	jQuery(".ui-dialog ").addClass("syet-dialog");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-apply");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:last").addClass("sy-cancel");
		    },
		      classes: {
			    "ui-dialog": "highlight"
			  }
        };

        jQuery(".editacti").on( "click", function() {
        	
	        var actli = jQuery(this).parents('li');
	        var idacti = actli.attr('data-idacti');
	        //console.log(idacti);
	        var image = actli.attr('data-image');
	        //console.log(image);
	        var name = actli.attr('data-name');
	        var name2 = name.replace(/%%%/g, "'");
	        //console.log(name2);
	        var finalName = decodeURIComponent(name2);
	        
	        var color = actli.attr('data-color');
	        var overcolor = actli.attr('data-overcolor');
	        var fontcolor = actli.attr('data-fontcolor');
	        var fontovercolor = actli.attr('data-fontovercolor');
	        var description = actli.attr('data-description');
	        var duration = actli.attr('data-duration');
	        var showDesc = actli.attr('data-showdesc');
	        var imgtooltip = actli.attr('data-imgtooltip');
	        var tooltiptext = actli.attr('data-tooltiptext');
	        var actincelltext = actli.attr('data-actincelltext');
	        var syTitle = jQuery('.sy-easy-title').html();
	        var syDuration = jQuery('.sy-easy-duration').html();
	        var sybgcolor = jQuery('.sy-easy-bgcolor').html();
	        var sybgovercolor = jQuery('.sy-easy-bgovercolor').html();
	        var syfontcolor = jQuery('.sy-easy-fontcolor').html();
	        var syfontovercolor = jQuery('.sy-easy-fontovercolor').html();
	        var sychooseimage = jQuery('.sy-easy-chooseimage').html();
	        var sylinkdescription = jQuery('.sy-easy-linkdescription').html();
	        var syimagetooltip = jQuery('.sy-easy-imagetooltip').html();
	        var sytooltiptext = jQuery('.sy-easy-tooltiptext').html();
	        var sytextinthecell = jQuery('.sy-easy-textinthecell').html();
	        var sydescription = jQuery('.sy-easy-description').html();
	        var syplaceholderdescription = jQuery('.sy-easy-placeholderdescription').html();
	        var syhelptootip = jQuery('.sy-easy-helptootip').html();
	        var syhelpdescription = jQuery('.sy-easy-helpdescription').html();
	        var syhelptextincell = jQuery('.sy-easy-helptextincell').html();
	        var sytooltipplaceholder = jQuery('.sy-easy-tooltipplaceholder').html();
	        var sytextincellplaceholder = jQuery('.sy-easy-textincellplaceholder').html();
			var editText = jQuery(".sy-text-edit").text();
			var yesText = jQuery(".sy-text-yes").text();
			var noText = jQuery(".sy-text-no").text();
	        // Ajoute le formulaire de création d'une activité avec le colpick
			var editactivity = '<div id="editact-form" class="sy-editact-form" class="">';
	        editactivity +=    '<h3>' + editText + ' ' + finalName + '</h3>';
	        editactivity +=    '<form id="actiform" enctype="application/json">';
	        editactivity +=       '<fieldset class="editactform">';
	        editactivity +=            '<label for="actid"></label>';
	        editactivity +=           '<input id="actid" type="hidden" value="'+idacti+'" name="actid">';
	        editactivity +=            '<!--<div class="sy-namelink">-->';
	        editactivity +=                '<div class="sy-namepart">';
	        editactivity +=                   '<label for="actname" >'+syTitle+'</label>';
	        editactivity +=                    '<input id="actnamenew" type="text" title="Enter a new name only if you want to change the name of this activity" placeholder="New name or leave empty" value="" name="actnamenew">';
	        editactivity +=                    '<input id="actname" type="hidden" title="Enter a new name only if you want to change the name of this activity" value="'+name+'" name="actname">';
	        editactivity +=                '</div>'  ;  
	        editactivity +=           '<!--</div>-->';
	        editactivity +=            '<div class="sy-duration">';
	        editactivity +=                '<label for="actduration" >'+syDuration+'</label>';
	        editactivity +=                '<input id="actduration" type="number" max="60" name="actduration" value="' + duration + '">';
	        editactivity +=            '</div>';
	        editactivity +=            '<label for="acttimetable" ></label>';
	        editactivity +=            '<input id="acttimetable" type="hidden" value="" name="acttimetable" disabled>'; 
	        editactivity +=            '<div class="sy-formcolors">';
	        editactivity +=                '<div class="sy-labelcolors">'; 
	        editactivity +=                '</div>';  
	        editactivity +=                '<div class="sy-color thecolors">';
	        editactivity +=                    '<label for="actcolor" >'+sybgcolor+'</label> ';
	        editactivity +=                    '<input id="actcolor" class="sy-colorfield" type="text" value="'+color+'" name="actcolor">' ; 
	        editactivity +=                    '<div class="sy-showcolor" style="" ></div>';   
	        editactivity +=                '</div>';
	        editactivity +=                '<div class="sy-overcolor thecolors">';
	        editactivity +=                    '<label for="actovercolor" >'+sybgovercolor+'</label>';
	        editactivity +=                    '<input id="actovercolor" class="sy-colorfield" type="text" value="'+overcolor+'" name="actovercolor"> ' ; 
	        editactivity +=                    '<div class="sy-showcolor" style=""></div>'; 	        
	        editactivity +=               '</div>';
	        editactivity +=                '<div class="sy-fontcolor thecolors">';
	        editactivity +=                    '<label for="fontcolor" >'+syfontcolor+'</label>' ;
	        editactivity +=                    '<input id="fontcolor" class="sy-colorfield" type="text" value="'+fontcolor+'" name="fontcolor">' ;  
	        editactivity +=                    '<div class="sy-showcolor" style=""></div>'; 	        
	        editactivity +=                '</div>';
	        editactivity +=                '<div class="sy-fontovercolor thecolors">';
	        editactivity +=                    '<label for="fontovercolor" >'+syfontovercolor+'</label>'; 
	        editactivity +=                    '<input id="fontovercolor" class="sy-colorfield" type="text" value="'+fontovercolor+'" name="fontovercolor">';   
	        editactivity +=                    '<div class="sy-showcolor" style=""></div>';    
	        editactivity +=                '</div>';
	        editactivity +=            '</div>';
	        editactivity +=            '<div class="sy-choose-image">';
	        editactivity +=            		'<a class="actloadimage button" href="javascript:void(0);">'+sychooseimage+'</a>';
	        editactivity +=            		'<input id="actimage" type="hidden" name="actimage" class="sy-act-image" value="'+image+'">';
	        editactivity +=            		'<div class="sy-act-image" style="display:inline-block;"><div class="sy-cancel-image">x</div><img src="'+image+'" /></div>';
	        editactivity +=            '</div>';
	        editactivity +=            '<div class="sy-linkpart" data-showdesc="'+showDesc+'">';
	        editactivity +=               '<label for="actlinkdescription" >'+sylinkdescription+'</label>';
	        editactivity +=                '<select id="showdesc" name="showdesc">';
	        editactivity +=                    '<option value="0">'+noText+'</option>';
	        editactivity +=                    '<option value="1">'+yesText+'</option>';
	        editactivity +=                '</select>';
	        editactivity +=            '</div>';
	        editactivity +=            '<div class="sy-image-tooltip" data-imgtooltip="'+imgtooltip+'">';
	        editactivity +=               '<label for="imgtooltip" >'+syimagetooltip+'</label>';
	        editactivity +=                '<select id="imgtooltip" name="imgtooltip">';
	        editactivity +=                    '<option value="0">'+noText+'</option>';
	        editactivity +=                    '<option value="1">'+yesText+'</option>';
	        editactivity +=                '</select>';
	        editactivity +=            '</div>';
	        editactivity +=            '<div class="sy-act-tooltiptext">';
	        editactivity +=                 '<label for="acttooltiptext" >'+sytooltiptext+'</label>'; 
	        editactivity +=                 '<textarea id="acttooltiptext" data-tooltip-content=".sy-help-text-tooltip" class="sy-acttooltiptext" rows="3" cols="35" form="actiform" class="sy-acttooltiptext" name="acttooltiptext" placeholder="'+sytooltipplaceholder+'">'+tooltiptext+'</textarea>';     
	        editactivity +=            '</div>';
	        editactivity +=            '<div class="sy-act-incelltext">';
	        editactivity +=                 '<label for="actincelltext" >'+sytextinthecell+'</label>'; 
	        editactivity +=                 '<textarea id="actincelltext" data-tooltip-content=".sy-help-text-incelltext" rows="3" cols="35" form="actiform" class="sy-actincelltext" name="actincelltext" placeholder="'+sytextincellplaceholder+'">'+actincelltext+'</textarea>';     
	        editactivity +=            '</div>';
	        editactivity +=            '<div class="sy-act-description">';
	        editactivity +=                 '<label for="actdescription" >'+sydescription+'</label>'; 
	        editactivity +=                 '<textarea id="actdescription" data-tooltip-content=".sy-help-text-description" rows="3" cols="35" form="actiform" class="sy-actdescription" name="actdescription" placeholder="'+syplaceholderdescription+'">'+description+'</textarea>';     
	        editactivity +=            '</div>';
	        editactivity +=            '<label for="actstatus" ></label>';
	        editactivity +=            '<input id="actstatus" type="hidden" value="1" name="actstatus">';
	        editactivity +=        '</fieldset>';
	        editactivity +=    '</form>';
	        editactivity +='</div>';
	        editactivity +='<div class="sy-help-text-container">';
	        editactivity +='     <div class="sy-help-text-tooltip">';
	        editactivity +=           syhelptootip ;
	        editactivity +='     </div>';
	        editactivity +='     <div class="sy-help-text-description">';
	        editactivity += 			syhelpdescription;
	        editactivity +='     </div>';
	        editactivity +='     <div class="sy-help-text-incelltext">';
	        editactivity +=           syhelptextincell;
	        editactivity +='     </div>';	        
	        editactivity +='</div>';
	        editactivity += '<script type="text/javascript">if(jQuery(".sy-act-image > img").attr("src") != ""){jQuery(".sy-cancel-image").css("display", "inline-block")};jQuery(".sy-cancel-image").on("click", function(){jQuery(".sy-act-image > img").attr("src","");jQuery("#actimage").val("");jQuery(this).css("display", "none");});jQuery(".sy-acttooltiptext, .sy-actdescription, .sy-actincelltext").tooltipster({trigger: "hover",delay:0,theme: "tooltipster-borderless", side: "left"});if(jQuery(".sy-image-tooltip").attr("data-imgtooltip") == 1){jQuery("#imgtooltip").val("1");}else{jQuery("#imgtooltip").val(0);}if(jQuery(".sy-linkpart").attr("data-showdesc") == 1){jQuery("#showdesc").val("1");}else{jQuery("#showdesc").val(0);}jQuery(".actloadimage").on("click", function(){jQuery(".syet_gallery-container").css("display", "block");});jQuery("#syet_media-gallery > img").on("click", function(){var imgUrl = jQuery(this).attr("src");jQuery(".sy-choose-image").val(imgUrl);jQuery(".sy-act-image > img").attr("src", imgUrl);jQuery("#actimage").val(imgUrl);jQuery(".sy-act-image").css("display", "inline-block");jQuery(".sy-cancel-image").css("display", "inline-block");jQuery(".syet_gallery-container").css("display", "none");});jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:last").addClass("sy-cancel");jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-apply");var actcolor = "#" + jQuery("#actcolor").val();jQuery(".sy-color > .sy-showcolor").css("background-color", actcolor);var actovercolor = "#" + jQuery("#actovercolor").val();jQuery(".sy-overcolor > .sy-showcolor").css("background-color", actovercolor);var fontcolor = "#" + jQuery("#fontcolor").val();jQuery(".sy-fontcolor > .sy-showcolor").css("background-color", fontcolor);var fontovercolor = "#" + jQuery("#fontovercolor").val();jQuery(".sy-fontovercolor > .sy-showcolor").css("background-color", fontovercolor);jQuery("#actcolor,#actovercolor,#fontcolor,#fontovercolor").colpick({layout:"hex",submit:0,colorScheme:"dark",onChange:function(hsb,hex,rgb,el,bySetColor){jQuery(".ui-dialog-buttonset").find("button").eq(1).css("display","inline-block");var inputId = "#" + jQuery(el).attr("id");jQuery(inputId).parent("div").find(".sy-showcolor").css("background-color","#"+hex);if(!bySetColor)jQuery(el).val(hex);},onShow:function(hsb,hex,rgb,el,bySetColor){var currentColor ="#" + jQuery(this).val();jQuery(this).css("border-color","#"+currentColor);jQuery(this).colpickSetColor(this.value);}}).keyup(function(){jQuery(this).colpickSetColor(this.value);});jQuery(".syet_close").click(function(){jQuery(".syet_gallery-container").hide();});<\/script>';

	        jQuery('#dialogeditactform').html('');
	        if (jQuery('#dialogeditactform').html() == '')	{
	        	// On ajoute le formulaire à la div qui s'ouvre en dialog box
	        	jQuery('#dialogeditactform').append(editactivity);
	        }

	      	var theeditDialog = jQuery("#dialogeditactform").dialog(editactopt);
        	theeditDialog.dialog('open');
        	
        	// Fonction pour convertir le contenu du formulaire createactivity en JSON !Important
        	jQuery.fn.serializeObject = function()
			{
			    var o = {};
			    var a = this.serializeArray();
			    jQuery.each(a, function() {
			        if (o[this.name] !== undefined) {
			            if (!o[this.name].push) {
			                o[this.name] = [o[this.name]];
			            }
			            o[this.name].push(this.value || '');
			        } else {
			            o[this.name] = this.value || '';
			        }
			    });
			    return o;
			};

        }) // fin editacti on click

        // Lance la dialog de création d'activité au click du bouton create
        jQuery( "#create" ).on( "click", function() {
        	
        	if (jQuery('#activities').val().length == 0) {
        	var activityArray = [];
        	id = 0;
	        }
	        else {
	        	var activityArray = jQuery('#activities').val();
	        	//console.log(activityArray);
	        	var activityArray = activityArray.split(',{');
	        	for (var i = 0; i < activityArray.length; i++) {
	        		//console.log(activityArray[i]);
	        		var pattern = new RegExp("^\"a");
	        		console.log(pattern.test(activityArray[i]));
	        		if (pattern.test(activityArray[i]) == true) {
	        			activityArray[i] = "{"+ activityArray[i];
	        		}
	        	};
	        	//Calcul de l'id en fonction du nombre d'élément du tableau
	        	// A modifier si on ajoute des champs au tableau
	        	id = activityArray.length;
	        	console.log(activityArray.length);
	        }
	        if (activityArray.length <= 7)
	        {
		        // Texte formulaire
		        var syTitle = jQuery('.sy-easy-title').html();
		        var syDuration = jQuery('.sy-easy-duration').html();
		        var sybgcolor = jQuery('.sy-easy-bgcolor').html();
		        var sybgovercolor = jQuery('.sy-easy-bgovercolor').html();
		        var syfontcolor = jQuery('.sy-easy-fontcolor').html();
		        var syfontovercolor = jQuery('.sy-easy-fontovercolor').html();
		        var sychooseimage = jQuery('.sy-easy-chooseimage').html();
		        var sylinkdescription = jQuery('.sy-easy-linkdescription').html();
		        var syimagetooltip = jQuery('.sy-easy-imagetooltip').html();
		        var sytooltiptext = jQuery('.sy-easy-tooltiptext').html();
		        var sytextinthecell = jQuery('.sy-easy-textinthecell').html();
		        var sydescription = jQuery('.sy-easy-description').html();
		        var syplaceholderdescription = jQuery('.sy-easy-placeholderdescription').html();
		        var syhelptootip = jQuery('.sy-easy-helptootip').html();
		        var syhelpdescription = jQuery('.sy-easy-helpdescription').html();
		        var syhelptextincell = jQuery('.sy-easy-helptextincell').html();
		        var sytooltipplaceholder = jQuery('.sy-easy-tooltipplaceholder').html();
		        var sytextincellplaceholder = jQuery('.sy-easy-textincellplaceholder').html();
		        
		        // Ajoute le formulaire de création d'une activité avec le colpick
				var newactivity = '<div id="dialog-form" class="sy-dialog-form" class="">';
		        newactivity +=    '<h3>Create a new activity</h3>';
		        newactivity +=    '<form id="actiform" enctype="application/json">';
		        newactivity +=       '<fieldset class="newactform">';
		        newactivity +=            '<label for="actid"></label>';
		        newactivity +=           '<input id="actid" type="hidden" value="'+id+'" name="actid">';
		        newactivity +=                '<div class="sy-namepart">';
		        newactivity +=                   '<label for="actname" >'+syTitle+'</label>';
		        newactivity +=                    '<input id="actname" type="text" value="Activity" name="actname">';
		        newactivity +=                '</div>'  ;  
		        newactivity +=            '<div class="sy-duration">';
		        newactivity +=                '<label for="actduration" >'+syDuration+'</label>';
		        newactivity +=                '<input id="actduration" type="number" max="60" name="actduration" value="60">';
		        newactivity +=            '</div>';
		        newactivity +=            '<label for="acttimetable" ></label>';
		        newactivity +=            '<input id="acttimetable" type="hidden" value="" name="acttimetable" disabled>'; 
		        newactivity +=            '<div class="sy-formcolors">';
		        newactivity +=                '<div class="sy-labelcolors">'; 
		        newactivity +=                '</div>';  
		        newactivity +=                '<div class="sy-color thecolors">';
		        newactivity +=                    '<label for="actcolor" >'+sybgcolor+'</label> ';
		        newactivity +=                    '<input id="actcolor" class="sy-colorfield" type="text" value="ffcc00" name="actcolor">' ; 
		        newactivity +=                    '<div class="sy-showcolor" style="" ></div>';   
		        newactivity +=                '</div>';
		        newactivity +=                '<div class="sy-overcolor thecolors">';
		        newactivity +=                    '<label for="actovercolor" >'+sybgovercolor+'</label>';
		        newactivity +=                    '<input id="actovercolor" class="sy-colorfield" type="text" value="ff7f17" name="actovercolor"> ' ; 
		        newactivity +=                    '<div class="sy-showcolor" style=""></div>'; 	        
		        newactivity +=               '</div>';
		        newactivity +=                '<div class="sy-fontcolor thecolors">';
		        newactivity +=                    '<label for="fontcolor" >'+syfontcolor+'</label>' ;
		        newactivity +=                    '<input id="fontcolor" class="sy-colorfield" type="text" value="ffffff" name="fontcolor">' ;  
		        newactivity +=                    '<div class="sy-showcolor" style=""></div>'; 	        
		        newactivity +=                '</div>';
		        newactivity +=                '<div class="sy-fontovercolor thecolors">';
		        newactivity +=                    '<label for="fontovercolor" >'+syfontovercolor+'</label>'; 
		        newactivity +=                    '<input id="fontovercolor" class="sy-colorfield" type="text" value="ffffff" name="fontovercolor">';   
		        newactivity +=                    '<div class="sy-showcolor" style=""></div>';    
		        newactivity +=                '</div>';
		        newactivity +=            '</div>';
		        newactivity +=            '<div class="sy-choose-image">';
		        newactivity +=            		'<a class="actloadimage button" href="javascript:void(0);">'+sychooseimage+'</a>';
		        newactivity +=            		'<input id="actimage" type="hidden" name="actimage" class="sy-act-image" value="">';
		        newactivity +=            		'<div class="sy-act-image" style="display:none;"><img src="" /></div>';
		        newactivity +=            '</div>';
		        newactivity +=            '<div class="sy-linkpart" data-showdesc="">';
		        newactivity +=               '<label for="actlinkdescription" >'+sylinkdescription+'</label>';
		        newactivity +=                '<select id="showdesc" name="showdesc">';
		        newactivity +=                    '<option value="0">No</option>';
		        newactivity +=                    '<option value="1">Yes</option>';
		        newactivity +=                '</select>';
		        newactivity +=            '</div>';
		        newactivity +=            '<div class="sy-image-tooltip" data-imgtooltip="">';
		        newactivity +=               '<label for="imgtooltip" >'+syimagetooltip+'</label>';
		        newactivity +=                '<select id="imgtooltip" name="imgtooltip">';
		        newactivity +=                    '<option value="0">No</option>';
		        newactivity +=                    '<option value="1">Yes</option>';
		        newactivity +=                '</select>';
		        newactivity +=            '</div>';
		        newactivity +=            '<div class="sy-act-tooltiptext">';
		        newactivity +=                 '<label for="acttooltiptext" >'+sytooltiptext+'</label>'; 
		        newactivity +=                 '<textarea id="acttooltiptext" data-tooltip-content=".sy-help-text-tooltip" rows="3" cols="35" form="actiform" class="sy-acttooltiptext" name="acttooltiptext" placeholder="Enter text displayed on rollover the activity"></textarea>';     
		        newactivity +=            '</div>';
		        newactivity +=            '<div class="sy-act-incelltext">';
		        newactivity +=                 '<label for="actincelltext" >'+sytextinthecell+'</label>'; 
		        newactivity +=                 '<textarea id="actincelltext" data-tooltip-content=".sy-help-text-incelltext" rows="3" cols="35" form="actiform" class="sy-actincelltext" name="actincelltext" placeholder="Enter text displayed on rollover the activity"></textarea>';     
		        newactivity +=            '</div>';
		        newactivity +=            '<div class="sy-act-description">';
		        newactivity +=                 '<label for="actdescription" >'+sydescription+'</label>'; 
		        newactivity +=                 '<textarea id="actdescription" data-tooltip-content=".sy-help-text-description" rows="3" cols="35" form="actiform" class="sy-actdescription" name="actdescription" placeholder="Enter a description"></textarea>';     
		        newactivity +=            '</div>';
		        newactivity +=            '<label for="actstatus" ></label>';
		        newactivity +=            '<input id="actstatus" type="hidden" value="1" name="actstatus">';
		        newactivity +=        '</fieldset>';
		        newactivity +=    '</form>';
		        newactivity +='</div>';
		        newactivity +='<div class="sy-help-text-container">';
		        newactivity +='     <div class="sy-help-text-tooltip">';
		        newactivity +=           syhelptootip ;
		        newactivity +='     </div>';
		        newactivity +='     <div class="sy-help-text-description">';
		        newactivity += 			syhelpdescription;
		        newactivity +='     </div>';
		        newactivity +='     <div class="sy-help-text-incelltext">';
		        newactivity +=           syhelptextincell;
		        newactivity +='     </div>';	        
		        newactivity +='</div>';	        
		        newactivity += '<script type="text/javascript">jQuery(".sy-acttooltiptext, .sy-actdescription, .sy-actincelltext").tooltipster({trigger: "hover",delay:0,theme: "tooltipster-borderless", side: "left"});jQuery(".actloadimage").on("click", function(){jQuery(".syet_gallery-container").css("display", "block");});jQuery("#syet_media-gallery > img").on("click", function(){var imgUrl = jQuery(this).attr("src");jQuery(".sy-choose-image").val(imgUrl);jQuery(".sy-act-image > img").attr("src", imgUrl);jQuery("#actimage").val(imgUrl);jQuery(".sy-act-image").css("display", "inline-block");jQuery(".syet_gallery-container").css("display", "none");});jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:last").addClass("sy-cancel");jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-apply");var actcolor = "#" + jQuery("#actcolor").val();jQuery(".sy-color > .sy-showcolor").css("background-color", actcolor);var actovercolor = "#" + jQuery("#actovercolor").val();jQuery(".sy-overcolor > .sy-showcolor").css("background-color", actovercolor);var fontcolor = "#" + jQuery("#fontcolor").val();jQuery(".sy-fontcolor > .sy-showcolor").css("background-color", fontcolor);var fontovercolor = "#" + jQuery("#fontovercolor").val();jQuery(".sy-fontovercolor > .sy-showcolor").css("background-color", fontovercolor);jQuery("#actcolor,#actovercolor,#fontcolor,#fontovercolor").colpick({layout:"hex",submit:0,colorScheme:"dark",onChange:function(hsb,hex,rgb,el,bySetColor){jQuery(".ui-dialog-buttonset").find("button").eq(1).css("display","inline-block");var inputId = "#" + jQuery(el).attr("id");jQuery(inputId).parent("div").find(".sy-showcolor").css("background-color","#"+hex);if(!bySetColor)jQuery(el).val(hex);},onShow:function(hsb,hex,rgb,el,bySetColor){var currentColor ="#" + jQuery(this).val();jQuery(this).css("border-color","#"+currentColor);jQuery(this).colpickSetColor(this.value);}}).keyup(function(){jQuery(this).colpickSetColor(this.value);});jQuery(".syet_close").click(function(){jQuery(".syet_gallery-container").hide();});<\/script>';

		        jQuery('#dialogform').html('');
		        if (jQuery('#dialogform').html() == '')	{
		        	// On ajoute le formulaire à la div qui s'ouvre en dialog box
		        	jQuery('#dialogform').append(newactivity);
		        }
		    }
		    else {
		    	var newactivity = '<div id="dialog-form" class="sy-dialog-form-limit">';
		        newactivity +=    '<h3>You have reach the limit number of activity you can create with the free version</h3>';
		        newactivity +=    '<p>Get Extended version to be able to create unlimited activities & more</p>';
		        newactivity +=    '</div>';
		        jQuery('#dialogform').html('');
		        if (jQuery('#dialogform').html() == '')	{
		        	// On ajoute le formulaire à la div qui s'ouvre en dialog box
		        	jQuery('#dialogform').append(newactivity);
		        }
		    }
	      	//console.log(newactivity);
	      	var theDialog = jQuery("#dialogform").dialog(opt);
        	theDialog.dialog('open');
        	
        	// Fonction pour convertir le contenu du formulaire createactivity en JSON !Important
        	jQuery.fn.serializeObject = function()
			{
			    var o = {};
			    var a = this.serializeArray();
			    jQuery.each(a, function() {
			        if (o[this.name] !== undefined) {
			            if (!o[this.name].push) {
			                o[this.name] = [o[this.name]];
			            }
			            o[this.name].push(this.value || '');
			        } else {
			            o[this.name] = this.value || '';
			        }
			    });
			    return o;
			};
			
			// Fin fonction serialize
			jQuery("#theactivities").find("li").each(function(){
				jQuery(this).draggable({
					connectToSortable: "ul:not(#theactivities, .onlyone)",
					handle: "#nom",
					helper: "clone",
					revert: "invalid",
					revertDuration: 200
				});
			});

			makeItSortable();
			
    	});// fin edit planning

		//Option pour la gestion des jours
		var daysopt = {
			dialogClass: "no-close",
            closeOnEscape: false,
            autoOpen: false,
            width: 550,
            modal: true,
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
            buttons: [
	            {
	            	text: textApply,
	            	click: function(){
	            		//console.log(jQuery('#dayform').html());
	            		var theseDays = jQuery('#day-form').find('form').serializeObject();
	            		var days = JSON.parse(jQuery("#days").val());
	            		days['days'] = theseDays;
	            		console.log(days);
	            		var stringDays = JSON.stringify(days);
	            		jQuery("#days").val(stringDays);
	            		//console.log(theseDays);
	            		
	            		jQuery(".sy-day-form").remove();
	                	jQuery(this).dialog("destroy");

	                	function hastobesaved() {
							if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
								jQuery('.ultimate-submit').addClass('hastobesaved');
							}
							var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
				        	changes = changes +1;
				        	var saveText = jQuery('.sy-text-save').html();
				        	jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
				        	jQuery('.ultimate-submit').attr('data-changes', changes);
				        	jQuery(window).on('beforeunload', function(){
							  	return 'Are you sure you want to leave?';
							});
						}
	                	hastobesaved();
		            	}
	            },
	            {
	            	text: textCancel,
	            	click: function(){
	            		
	            		jQuery(".sy-day-form").remove();
	                	jQuery(this).dialog("destroy");
	            	}
	            }
            ],
            open:function () {
            	jQuery(".ui-dialog ").addClass("syet-dialog");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-apply");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:last").addClass("sy-cancel");
		    },
		    classes: {
			  "ui-dialog": "highlight"
			}
		}//fin daysopt

		jQuery( "#sydays" ).on( "click", function() {
        	
        	var startOfWeek = parseInt(jQuery('#days').attr('data-start-week'));
        	//console.log(startOfWeek);
        	var numberOfDays = parseInt(jQuery('#rows').val());
			//console.log(numberOfDays); 
			var daysNames = jQuery('#days').attr('data-days-names').split(",");
			//console.log(daysNames);
			// les jours avec la liste des jours
			var dayz = '<div class="sy-list-of-days">';
			var selectedDays = JSON.parse(jQuery("#days").val());
			//console.log(selectedDays);
			// nombre des jours (nombre de colonnes)
			for (var j = 0; j < numberOfDays; j++) 
			{
				dayz += '<div class="sy-a-day">';
				dayz += 'Column ' + (j+1);
				var daylist = '<select id="' + j +'" name="' + j +'" class="daynames">';
				//On défini la liste des jours et le jour sélectionné pour le jour actuel
				for (var i = 0; i < 7; i++) {
					//console.log('option : ' + i);
					//console.log(i);
					//console.log(selectedDays["days"][j]);
					if ( i == selectedDays["days"][j] )
					{
						daylist += '<option value="' + (i) +'" selected>' + daysNames[i] + '</option>';
					}
					else 
					{
						daylist += '<option value="' + (i) +'">' + daysNames[i] + '</option>';
					}
					
				};
				daylist += '</select>';
				dayz += daylist;
				dayz += '</div>';
			} 
			
			dayz += '</div>';
        	// On créé le formulaire
        	var newday = '<div id="day-form" class="sy-day-form" class="">';
        	newday +=   '<h3>Manage days</h3>';
	        newday +=     '<form id="dayform" enctype="application/json">';
	        newday +=        '<fieldset class="managedayform">';
	        newday += 		dayz;
	        newday +=        '</fieldset>';
	        newday +=     '</form>';
	        newday += '</div>';

	        jQuery('#dayform').html('');
	        if (jQuery('#dayform').html() == '')	{
	        	// On ajoute le formulaire à la div qui s'ouvre en dialog box
	        	jQuery('#dayform').append(newday);
	        }

        	var dayDialog = jQuery("#dayform").dialog(daysopt);
        	dayDialog.dialog('open');
        	
        	// Fonction pour convertir le contenu du formulaire createactivity en JSON !Important
        	jQuery.fn.serializeObject = function()
			{
			    var o = {};
			    var a = this.serializeArray();
			    jQuery.each(a, function() {
			        if (o[this.name] !== undefined) {
			            if (!o[this.name].push) {
			                o[this.name] = [o[this.name]];
			            }
			            o[this.name].push(this.value || '');
			        } else {
			            o[this.name] = this.value || '';
			        }
			    });
			    return o;
			};
        });
		//Option pour la gestion des semaines
		var periodopt = {
			dialogClass: "no-close",
            closeOnEscape: false,
            autoOpen: false,
            width: 550,
            modal: true,
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
            buttons: [
	            {
	            	text: textApply,
	            	click: function(){
	            		var dataVariation = jQuery('.nextvariation').attr('data-current');
	            		var theseWeeks = [];
	            		jQuery('#period-form').find('.withwithout').find('div').each(function(){
	            			if (jQuery(this).hasClass('ui-selected')) 
	            			{
	            				theseWeeks.push(parseInt(jQuery(this).text()));
	            			}
	            		});
	            		var scheduledact = JSON.parse(jQuery("#scheduledact").val());
	            		scheduledact['timetables'][dataVariation]['weeks'] = {};
	            		for (var i = 0 ; i < theseWeeks.length ; i++)
	            		{
	            			scheduledact['timetables'][dataVariation]['weeks'][theseWeeks[i]] = theseWeeks[i];
	            		}
	            		jQuery.each(theseWeeks, function(){

	            		})

	            		jQuery('#scheduledact').val(JSON.stringify(scheduledact));
	            		
	            		jQuery(".sy-period-form").remove();
	                	jQuery(this).dialog("destroy");

	                	function hastobesaved() {
							if (!jQuery('.ultimate-submit').hasClass('hastobesaved')) {
								jQuery('.ultimate-submit').addClass('hastobesaved');
							}
							var changes = parseInt(jQuery('.ultimate-submit').attr('data-changes'));
				        	changes = changes +1;
				        	var saveText = jQuery('.sy-text-save').html();
				        	jQuery(jQuery('.ultimate-submit').find('label').html(saveText + " ("+ changes + ")"));
				        	jQuery('.ultimate-submit').attr('data-changes', changes);
				        	jQuery(window).on('beforeunload', function(){
							  	return 'Are you sure you want to leave?';
							});
						}
	                	hastobesaved();
		            	}
	            },
	            {
	            	text: textCancel,
	            	click: function(){
	            		
	            		jQuery(".sy-period-form").remove();
	                	jQuery(this).dialog("destroy");
	            	}
	            }
            ],
            open:function () {
            	jQuery(".ui-dialog ").addClass("syet-dialog");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:first").addClass("sy-apply");
		        jQuery(".ui-dialog ").find(".ui-dialog-buttonset").find(".ui-button:last").addClass("sy-cancel");
		    },
		    classes: {
			  "ui-dialog": "highlight"
			}
		}//fin periodsopt
		jQuery( "#period-settings" ).on( "click", function() {

        	var thisdata = JSON.parse(jQuery('#scheduledact').val());

        	var vNo = parseInt(jQuery(".nextvariation").attr("data-current"));
        	//console.info(vNo);
        	thisdata = thisdata["timetables"][vNo]["weeks"];
        	//console.log(JSON.stringify(thisdata));
        	var dataWeeksTab = [];
        	jQuery.each(thisdata, function(){
        		//console.log(this);
        		var item = 1;
        		dataWeeksTab.push(this[item]);
        		item++;
        	})
        	//alert(dataWeeksTab);
        	if (typeof thisdata === "undefined" || thisdata == "")
        	{
        		thisdata={1:1,2:2,3:3,4:4,5:5,6:6,7:7,8:8,9:9,10:10,11:11,12:12,13:13,14:14,15:15,16:16,17:17,18:18,19:19,20:20,21:21,22:22,23:23,24:24,25:25,26:26,27:27,28:28,29:29,30:30,31:31,32:32,33:33,34:34,35:35,36:36,37:37,38:38,39:39,40:40,41:41,42:42,43:43,44:44,45:45,46:46,47:47,48:48,49:49,50:50,51:51,52:52};
        	}
        	//console.log(thisdata);
        	var thisDataString = JSON.stringify(thisdata);
        	//alert(thisDataString);
        	var sySelectOpt0 = jQuery(".sy-option-period0").text();
        	var sySelectOpt1 = jQuery(".sy-option-period1").text();
        	var sySelectOpt2 = jQuery(".sy-option-period2").text();
        	var sySelectOpt3 = jQuery(".sy-option-period3").text();
        	var sySelectOpt4 = jQuery(".sy-option-period4").text();
        	function createSelect()
        	{
        		var recurrenceList = '<select id="recurring" name="recurring">';
	        	recurrenceList += '<option value="0" selected="selected">'+ sySelectOpt0 +'</option>'
	        	recurrenceList += '<option value="1">' + sySelectOpt1 + '</option>'
	        	recurrenceList += '<option value="2">' + sySelectOpt2 + '</option>'
	        	recurrenceList += '<option value="3">' + sySelectOpt3 + '</option>'
	        	recurrenceList += '<option value="4">' + sySelectOpt4 + '</option>'
	        	recurrenceList += '</select>'
	        	return recurrenceList;
        	}
        	
        	
        	// Grille des semaines
        	var withorWithout = '<div class="withwithout">';
        	for (var x = 1; x < 53; x++) {
        			withorWithout += '<div>' + x + '</div>';	
        	};
        	withorWithout += '</div>';
			var sytextWeeks = jQuery(".sy-text-weeks").text();
			var sydisplayPeriod = jQuery(".sy-display-period").text();
			var syHelpWeeks = jQuery(".sy-help-weeks").text();
        	var period = '<div id="period-form" class="sy-period-form">';
        	period +=   '<h3>' + sydisplayPeriod + '</h3>';
	        period +=     '<form id="syperiodform" enctype="application/json">';
	        period +=        '<fieldset class="manageperiodform">';
	        period += 		    createSelect();
	        period += 		    '<div class="sy-period-weeks">';
	        period += 		      '<h3>' + sytextWeeks + '</h3>';
	        period += 		      '<p>' + syHelpWeeks + '</p>';
	        period += 		         '<div class="sy-with">' + withorWithout + '</div>';
	        period += 		       '</div>';
	        period += 		       '<input id="weeksdata" name="weeksdata" type="hidden" val="' + thisDataString.replace(/["']/g, "") + '">';
	        period +=        '</fieldset>';
	        period +=     '</form>';
        	period += '</div>';
	        period += '<script type="text/javascript">var thisdata = JSON.parse(jQuery("#scheduledact").val());var vNo = parseInt(jQuery(".nextvariation").attr("data-current"));thisdata = thisdata["timetables"][vNo]["weeks"];"undefined"!=typeof thisdata&&""!=thisdata||(thisdata={1:1,2:2,3:3,4:4,5:5,6:6,7:7,8:8,9:9,10:10,11:11,12:12,13:13,14:14,15:15,16:16,17:17,18:18,19:19,20:20,21:21,22:22,23:23,24:24,25:25,26:26,27:27,28:28,29:29,30:30,31:31,32:32,33:33,34:34,35:35,36:36,37:37,38:38,39:39,40:40,41:41,42:42,43:43,44:44,45:45,46:46,47:47,48:48,49:49,50:50,51:51,52:52});jQuery(".withwithout").find("div").each(function(){var thisNum = parseInt(jQuery(this).text());if(thisdata[thisNum] == thisNum){jQuery(this).addClass("ui-selected");}});if (jQuery("#recurring").find("option:selected").val() == 4){jQuery(".sy-with").find(".withwithout").find("div").each(function(){jQuery(this).addClass("ui-selected");})};jQuery("#recurring").change(function(){if(jQuery(this).find("option:selected").val() == 1){jQuery(".sy-with").find(".withwithout").find("div").each(function(){var textNum = parseInt(jQuery(this).text());if (textNum % 2 == 0){jQuery(this).addClass("ui-selected");thisdata[textNum] = textNum;}else{jQuery(this).removeClass("ui-selected");thisdata[textNum] = "";}})}if(jQuery(this).find("option:selected").val() == 2){jQuery(".sy-with").find(".withwithout").find("div").each(function(){var textNum = parseInt(jQuery(this).text());if (parseInt(jQuery(this).text()) % 2 == 1){jQuery(this).addClass("ui-selected");thisdata[textNum] = textNum;}else{jQuery(this).removeClass("ui-selected");thisdata[textNum] = "";}})}if(jQuery(this).find("option:selected").val() == 3){jQuery(".sy-with").find(".withwithout").find("div").each(function(){var textNum = parseInt(jQuery(this).text());jQuery(this).removeClass("ui-selected");thisdata[textNum] = "";})}if(jQuery(this).find("option:selected").val() == 4){jQuery(".sy-with").find(".withwithout").find("div").each(function(){var textNum = parseInt(jQuery(this).text());jQuery(this).addClass("ui-selected");thisdata[textNum] = textNum;})}});jQuery(".sy-with").find(".withwithout").selectable({});<\/script>';


        	jQuery('#periodform').html('');
	        if (jQuery('#periodform').html() == '')	{
	        	// On ajoute le formulaire à la div qui s'ouvre en dialog box
	        	jQuery('#periodform').append(period);
	        }

        	var periodDialog = jQuery("#periodform").dialog(periodopt);
        	periodDialog.dialog('open');
        	
        	// Fonction pour convertir le contenu du formulaire createactivity en JSON !Important
        	jQuery.fn.serializeObject = function()
			{
			    var o = {};
			    var a = this.serializeArray();
			    jQuery.each(a, function() {
			        if (o[this.name] !== undefined) {
			            if (!o[this.name].push) {
			                o[this.name] = [o[this.name]];
			            }
			            o[this.name].push(this.value || '');
			        } else {
			            o[this.name] = this.value || '';
			        }
			    });
			    return o;
			};
        });
		</script>
		<?php
	}// fin edit planning

	public static function syet_afterSave($id) 
	{
		echo $id;
	}
	public static function syet_displayToo() 
	{
		?>
		<div class="sy-admin-container">
			<h1><?php _e( 'EasyTimetable - Generate a schedule', 'easytimetable-responsive-schedule-management-system' ); ?></h1>
			<h3>
				You can only create one schedule with the free version, get Extended to build unlimited number of timetable and more features<br>
			</h3>
			<p>More informations about the Extended version<br>
				<a class="page-title-action button" style="text-align:center;" href="http://www.stereonomy.com/wordpress-products/easytimetable-plugin-for-wordpress/item/easytimetable-extended-for-wordpress" target="_blank"><?php _e( 'Buy it now!', 'easytimetable-responsive-schedule-management-system' ); ?></a>
			</p>
		</div>
		<?php
	}
}

?>
