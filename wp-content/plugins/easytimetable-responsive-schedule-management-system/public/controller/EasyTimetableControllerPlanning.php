<?php 
/**
 * Provide public display
 *
 *
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    easy-timetable
 * @subpackage easy-timetable/public/controller
 */

if (!defined('WPINC')){die;}

class EasyTimetableControllerPlanning {

	public function __construct() {
  	}

  	public static function syet_displayPlanning($id, $nonce, $content) {
  		
  		

			require_once SYET_PATH . "public/models/EasyTimetableModelPlanning.php";
		    $model = new EasyTimetableModelPlanning();
		    $modelForView = $model->syet_displayPlanning($id);
		    //var_dump($model->syet_displayPlanning($id));

		    require_once SYET_PATH . "public/views/EasyTimetableViewPlanning.php";
		    $view = new EasyTimetableViewPlanning($model);
		    $view->syet_displayPlanning($modelForView, $content);
		
	    
  	}
}

?>