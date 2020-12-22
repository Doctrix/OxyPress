<?php 

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    Easyscroller
 * @subpackage Easyscroller/admin/models
 */

if (!defined('WPINC')){die;}

class EasyTimetableModelCreate  {

	function __construct()
	{
	}

	public static function syet_display()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'easytimetable_' .'planning';
		$count = $wpdb->query("
					SELECT *
		            FROM $table_name
					");
		return $count;
	}
	// get the menu of the wordpress installation (id)
	public static function syet_getPlannings()
	{
		//$all_plannings = wp_get_nav_menus();
		//return $all_menus;		
	}
	// Get menu items of the wordpress installation (link & name)
	public static function syet_getMenuItems($menu_name)
	{
		//$menu_items = wp_get_nav_menu_items($menu_name);
		//return $menu_items;
	}

	public static function syet_saveTimetable($data)
	{
		global $wpdb;
		$id;
		//var_dump($data);
		$table_name = $wpdb->prefix . 'easytimetable_' .'planning';
		if ((int)$data['display_filters'] > 0) {
			$data['display_filters'] = "0";
		}
		if ((int)$data['print'] > 0) {
			$data['print'] = "0";
		}
		if ((int)$data['rows'] > 7) {
			$data['rows'] = "7";
		}
		if ((int)$data['cells'] > 10) {
			$data['cells'] = "10";
		}
		if(!isset($data['id']))
		{
			
			if ($wpdb->insert( 
        	$table_name,
        	array( 
	            'p_name' => $data['p_name'], 
	            'creation_date' => $data['creation_date'], 
	            'type' => $data['type'],
	            'display_title' => $data['display_title'],
	            'display_filters' => $data['display_filters'],
	            'time_mode' => $data['time_mode'],
	            'start_h' => $data['start_h'],
	            'rows' => $data['rows'],
	            'rows_name' => $data['rows_name'],
	            'cells' => $data['cells'],
	            'cell_color' => $data['cell_color'],
	            'height' => $data['height'],
	            'description' => $data['description'],
	            'activities' => $data['activities'],
	            'scheduledact' => $data['scheduledact'],
	            'days' => $data['days'],
	            'print' => $data['print'],
	            'created_by' => $data['created_by'],
	            'access' => $data['access']
	        ))==FALSE)
			{
				echo "Error";
				var_dump($data);
			}
			else {
				// Get the Id of the new menu
				$p_name = htmlspecialchars($data['p_name']);
				$creation_date = htmlspecialchars($data['creation_date']);
				$id = $wpdb->get_results(
		            $wpdb->prepare("	
    		            SELECT id
    		            FROM $table_name
    		            WHERE p_name= %s AND creation_date= %s
    		            ", $p_name, $creation_date)
	        	);
			}
		}
		else 
		{
			if ($wpdb->update( 
        	$table_name,
        	array( 
	            'p_name' => $data['p_name'], 
	            'creation_date' => $data['creation_date'], 
	            'type' => $data['type'],
	            'display_title' => $data['display_title'],
	            'display_filters' => $data['display_filters'],
	            'time_mode' => $data['time_mode'],
	            'start_h' => $data['start_h'],
	            'rows' => $data['rows'],
	            'rows_name' => $data['rows_name'],
	            'cells' => $data['cells'],
	            'cell_color' => $data['cell_color'],
	            'height' => $data['height'],
	            'description' => $data['description'],
	            'activities' => $data['activities'],
	            'scheduledact' => $data['scheduledact'],
	            'days' => $data['days'],
	            'print' => $data['print'],
	            'created_by' => $data['created_by'],
	            'access' => $data['access']
	        ), array( 'id' =>(int)$data['id']))==FALSE)
			{
				echo "Error big";
				//echo $data['activities'];
			}
			else {
				// Get the Id of the planning
				$id = $data['id'];
			}
			$id = $data['id'];
		}
		//var_dump($data['id']);
		return $id;	
	}

	public static function syet_editPlanning($id)
	{
		global $wpdb;	
		$table_name = $wpdb->prefix . 'easytimetable_' . 'planning';
		$id = (int)$id;
		$planning = $wpdb->get_results(
		            $wpdb->prepare("
    		            SELECT *
    		            FROM $table_name
    		            WHERE id=%d
    		            ", $id)
	        	);
		//	echo $planning;
		return $planning;
	}

}
