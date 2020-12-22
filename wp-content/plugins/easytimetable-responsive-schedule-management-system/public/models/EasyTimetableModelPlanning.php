<?php 

/**
 * Provide Public display
 *
 *
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    easy-timetable
 * @subpackage easy-timetable/public/models
 */

if (!defined('WPINC')){die;}

class EasyTimetableModelPlanning  {

	function __construct()
	{

	}
	public static function syet_displayPlanning($id) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'easytimetable_planning';
    	$results = $wpdb->get_results(
            $wpdb->prepare("
            SELECT *
            FROM $table_name
            WHERE id = %d
            ",$id)
        );
        return $results;
	}

}
?>