	<?php 
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    EasyTimetable
 * @subpackage EasyTimetable/admin/models
 */

if (!defined('WPINC')){die;}

class EasyTimetableControllerList {

	public function __construct() {
  	}

  	public static function syet_displayPlanning() {
	    require_once SYET_PATH . "admin/models/EasyTimetableModelList.php";
	    $model = new EasyTimetableModelList();

	    require_once SYET_PATH . "admin/views/EasyTimetableViewList.php";
	    $view = new EasyTimetableViewList($model);
	    $view->syet_displayPlanning($model);
  	}
  	public static function syet_displayAbout() {
	    require_once SYET_PATH . "admin/models/EasyTimetableModelList.php";
	    $model = new EasyTimetableModelList();

	    require_once SYET_PATH . "admin/views/EasyTimetableViewList.php";
	    $view = new EasyTimetableViewList($model);
	    $view->syet_displayAbout($model);
  	}

  	public static function syet_displayExtended() {
	    require_once SYET_PATH . "admin/models/EasyTimetableModelList.php";
	    $model = new EasyTimetableModelList();

	    require_once SYET_PATH . "admin/views/EasyTimetableViewList.php";
	    $view = new EasyTimetableViewList($model);
	    $view->syet_displayExtended($model);
  	}

  	public static function syet_deletePlanning($data) {
  		check_ajax_referer('nonce_easytimetable', 'saveSecurity');
	    require_once SYET_PATH . "admin/models/EasyTimetableModelList.php";
	    $model = new EasyTimetableModelList($data);
	    $result = $model->syet_deleteItem($data);

	    require_once SYET_PATH . "admin/views/EasyTimetableViewList.php";
	    $view = new EasyTimetableViewList($model);
	    $view->syet_displayPlanning($model);
  	}
	
}