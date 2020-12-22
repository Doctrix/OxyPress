	<?php 
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.stereonomy.com
 * @since      1.4.0
 *
 * @package    EasyTimetable
 * @subpackage EasyTimetable/admin/models
 */

if (!defined('WPINC')){die;}

class EasyTimetableControllerSettings 
{
	public function __construct() {
  	}
  	
	public static function syet_settings_page() 
	{
	    
	    require_once SYET_PATH . "admin/views/EasyTimetableViewSettings.php";
	    $view = new EasyTimetableViewSettings();
	    $view->syet_settings_page();
  	}

}