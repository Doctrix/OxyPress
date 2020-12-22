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


class EasyTimetableModelList
{
	
	function __construct()
	{

	}
	
	public static function syet_listItems() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'easytimetable_planning';
    	$results = $wpdb->get_results(
            "
            SELECT *
            FROM $table_name
            LIMIT 1
            "
        );	
        return $results;
	}

	/**
	* Recherche si la colonne days existe dans la table
	* @link       http://www.stereonomy.com
	* @since      1.3.0
	*
	* @package    EasyTimetable
	* @subpackage EasyTimetable/admin/models
	*/

	public static function syet_column_exist() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'easytimetable_planning';
		if (!$wpdb->get_col_length($table_name, 'days' ))
		{
			$wpdb->query(
				"
				ALTER TABLE $table_name
				ADD days text NOT NULL
				");
		}
	}
	
	public static function syet_deleteItem($data) {
		global $wpdb;
		var_dump($data);
		$table_name = $wpdb->prefix . 'easytimetable_planning';

    	if(isset($data['id']))
		{
			$wpdb->delete( 
        	$table_name,
        	array( 
	            'id' => $data['id']
	        ));
			$results = $wpdb->get_results(
	            "	
	            SELECT *
	            FROM $table_name
	            "
        	);
		}
		else 
		{	
			echo "Error big";
		}
        
        //var_dump($results);
        return $data['id'];
	}

	public static function syet_displayAbout()
	{
		return;
	}

	public static function syet_displayExtended()
	{
		return;
	}
	
}

