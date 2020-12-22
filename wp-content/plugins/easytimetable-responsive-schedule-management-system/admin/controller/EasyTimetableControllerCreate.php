<?php 
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    easy-timetable
 * @subpackage easy-timetable/admin/controller
 */

if (!defined('WPINC')){die;}

class EasyTimetableControllerCreate {

	public function __construct() {
  	}

  	public static function syet_display() {
	    require_once SYET_PATH . "admin/models/EasyTimetableModelCreate.php";
	    $model = new EasyTimetableModelCreate();
	    $count = $model->syet_display();

	    require_once SYET_PATH . "admin/views/EasyTimetableViewCreate.php";
	    $view = new EasyTimetableViewCreate($model);
	    if ($count == 0)
	    {
	    	$view->syet_display($model);
	    }
	    else 
	    {
	    	$view->syet_displayToo($model);
	    }
  	}

  	public static function syet_saveTimetable($data) {
  		check_ajax_referer('nonce_easytimetable', 'saveSecurity');
	    require_once SYET_PATH . "admin/models/EasyTimetableModelCreate.php";
	    $model = EasyTimetableModelCreate::syet_saveTimetable($data);
	    
	    require_once SYET_PATH . "admin/views/EasyTimetableViewCreate.php";
	    
	    EasyTimetableViewCreate::syet_afterSave((int)$model[0]->id);
  	}

  	public static function syet_editPlanning($data) {
  		check_ajax_referer('nonce_easytimetable', 'saveSecurity');
	    require_once SYET_PATH . "admin/models/EasyTimetableModelCreate.php";
	    $model = EasyTimetableModelCreate::syet_editPlanning((int)$data['id']);

	    require_once SYET_PATH . "admin/views/EasyTimetableViewCreate.php";
	    $view = new EasyTimetableViewCreate($model);
	    $view->syet_editPlanning($model);
  	}
	
}