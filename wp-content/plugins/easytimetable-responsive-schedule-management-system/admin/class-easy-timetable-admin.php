<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    easy-timetable
 * @subpackage easy-timetable/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    easy-timetable
 * @subpackage easy-timetable/admin
 * @author     Stereonomy <contact@stereonomy.com>
 */
class Easy_Timetable_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public static function syet_displayAdmin()
	{			
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerList.php';
		$controller = EasyTimetableControllerList::syet_displayPlanning();
		return $controller;
	}

	public static function syet_createNew() {
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerCreate.php';
		$display = EasyTimetableControllerCreate::syet_display();
		return $display;
	}
	public static function syet_etDoc() {
		//require_once SYET_PATH . 'admin/controller/EasyTimetableControllerCreate.php';
		$display = "https://www.stereonomy.com";
		return $display;
	}
	public static function syet_etAbout() {
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerList.php';
		$display = EasyTimetableControllerList::syet_displayAbout();
		return $display;
	}
	public static function syet_etExtended() {
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerList.php';
		$display = EasyTimetableControllerList::syet_displayExtended();
		return $display;
	}
	public static function syet_saveTimetable($data) {
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerCreate.php';
		$save = EasyTimetableControllerCreate::syet_saveTimetable($data);
		return $save;
	}
	
	public static function syet_editPlanning($data) {
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerCreate.php';
		$edit = EasyTimetableControllerCreate::syet_editPlanning($data);
		return $edit;
	}
	public static function syet_deletePlanning($id) {
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerList.php';
		$delete = EasyTimetableControllerList::syet_deletePlanning($id);
		return $delete;
	}
	public static function syet_duplicatePlanning($id) {
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerList.php';
		$duplicate = EasyTimetableControllerList::syet_duplicatePlanning($id);
		return $duplicate;
	}
	
	public static function syet_settings_page() {
		require_once SYET_PATH . 'admin/controller/EasyTimetableControllerSettings.php';
		$display = EasyTimetableControllerSettings::syet_settings_page();
		return $display;
	}
	

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-timetable-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " colpick", plugin_dir_url( __FILE__ ) . 'css/colpick.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " datetimepicker", plugin_dir_url( __FILE__ ) . 'css/jquery.datetimepicker.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " tooltipster", plugin_dir_url( __FILE__ ) . 'js/tooltipster/css/tooltipster.bundle.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " tooltipster2", plugin_dir_url( __FILE__ ) . 'js/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-borderless.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. " tooltipster3", plugin_dir_url( __FILE__ ) . 'js/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script('jQuery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', "", "", true);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-timetable-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " colpick", plugin_dir_url( __FILE__ ) . 'js/colpick.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " datetimepicker", plugin_dir_url( __FILE__ ) . 'js/jquery.datetimepicker.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " copytoclipboard", plugin_dir_url( __FILE__ ) . 'js/clipboard.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name. " tooltipster", plugin_dir_url( __FILE__ ) . 'js/tooltipster/js/tooltipster.bundle.min.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-timetable-admin.js', array('jquery') );
		wp_enqueue_script('jquery');
	}

}
