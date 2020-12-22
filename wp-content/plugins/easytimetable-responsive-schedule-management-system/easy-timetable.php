<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.stereonomy.com
 * @since             1.0.0
 * @package           easy-timetable
 *
 * @wordpress-plugin
 * Plugin Name:       EasyTimetable
 * Plugin URI:        http://www.stereonomy.com
 * Description:       A very easy-to-use schedule management system to create beautiful responsive Timetable
 * Version:           1.4.12
 * Author:            Stereonomy - Anthony Ceccarelli
 * Author URI:        http://www.stereonomy.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easytimetable-responsive-schedule-management-system
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')){die;}
define( 'SYET_PATH', plugin_dir_path( __FILE__ ) );
define( 'SYET_URL', plugin_dir_url( __FILE__ ) );
add_filter('widget_text', 'do_shortcode');
load_theme_textdomain( 'easytimetable-responsive-schedule-management-system', false, SYET_PATH.'/languages' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-timetable-activator.php
 */
function syet_activate_easy_timetable() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-timetable-activator.php';
	Easy_Timetable_Activator::syet_activate();
	Easy_Timetable_Activator::syet_easy_timetable_create_table("planning");
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-timetable-deactivator.php
 */
function syet_deactivate_easy_timetable() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-timetable-deactivator.php';
	Easy_Timetable_Deactivator::syet_deactivate();
}

register_activation_hook( __FILE__, 'syet_activate_easy_timetable' );
register_deactivation_hook( __FILE__, 'syet_deactivate_easy_timetable' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-easy-timetable.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function syet_run_easy_timetable() {

	$plugin = new Easy_Timetable();
	$plugin->run();

}
syet_run_easy_timetable();

add_action('admin_menu', 'syet_add_admin_et_menu');

function syet_add_admin_et_menu()
{
    add_menu_page('EasyTimetable - Schedule management system', 
    	'EasyTimetable', 
    	'manage_options', 
    	'easy-timetable', 
    	array('Easy_Timetable_Admin', 'syet_displayAdmin'), 
    	plugins_url('admin/images/logo-rond-stereonomy-white.svg', __FILE__));
    add_submenu_page('easy-timetable', 
    	'EasyTimetable - Schedule management system', 
    	__( 'Manage timetables', 'easytimetable-responsive-schedule-management-system' ), 
    	'manage_options', 
    	'easy-timetable', 
    	array('Easy_Timetable_Admin', 'syet_displayAdmin'));
    add_submenu_page('easy-timetable', 
    	'EasyTimetable - Create new', 
    	__( 'Add new', 'easytimetable-responsive-schedule-management-system' ), 'manage_options', 
    	'et_create', 
    	array('Easy_Timetable_Admin', 'syet_createNew'));

    add_submenu_page('easy-timetable', 
    	'EasyTimetable - Settings', 
    	__( 'Settings', 'easytimetable-responsive-schedule-management-system' ), 
    	'manage_options', 
    	'et_settings', 
    	array('Easy_Timetable_Admin', 'syet_settings_page'));
    add_submenu_page('easy-timetable', 
    	'EasyTimetable - Get Extended', 
    	__( 'Get Extended', 'easytimetable-responsive-schedule-management-system' ), 
    	'manage_options', 
    	'et_extended', 
    	array('Easy_Timetable_Admin', 'syet_etExtended'));
    add_submenu_page('easy-timetable', 
    	'EasyTimetable - About', 
    	__( 'About', 'easytimetable-responsive-schedule-management-system' ), 
    	'manage_options', 
    	'et_about', 
    	array('Easy_Timetable_Admin', 'syet_etAbout'));
}


function syet_save_planning() {
	$data = $_POST;
	//Validating 
	if(isset($data["id"]))
	{
		$data["id"] = intval($data["id"]);
	}
		
	if (!preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $data["creation_date"]) || !isset($data["creation_date"])) { 
        $data["creation_date"] = date("Y-m-d H:i:s");
    } 

    if (!isset($data["p_name"]))
    {
    	$data["p_name"] = "My first Schedule";
    }
    $data["p_name"] = sanitize_text_field( $data["p_name"] );
    
    $data["time_mode"] = intval($data["time_mode"]);
    if ( strlen( $data["time_mode"] ) > 1 ) {
	  	$data["time_mode"] = substr( $data["time_mode"], 0, 1 );
	}

    if ( strlen( $data["type"] ) > 1 ) {
	  	$data["type"] = substr( $data["type"], 0, 1 );
	}
	$data["type"] = intval($data["type"]);

	
    if ( strlen( $data["display_title"] ) > 1 ) {
	  	$data["display_title"] = substr( $data["display_title"], 0, 1 );
	}
	$data["display_title"] = intval($data["display_title"]);
	
	
    if ( strlen( $data["display_filters"] ) > 1 ) {
	  	$data["display_filters"] = substr( $data["display_filters"], 0, 1 );
	}
	$data["display_filters"] = intval($data["display_filters"]);
	
	
    if ( strlen( $data["rows"] ) > 2 ) {
	  	$data["rows"] = substr( $data["rows"], 0, 2 );
	}
	$data["rows"] = intval($data["rows"]);
	
	
    if ( strlen( $data["cells"] ) > 2 ) {
	  	$data["cells"] = substr( $data["cells"], 0, 2 );
	}
	$data["cells"] = intval($data["cells"]);
	
	$data["cell_color"] = strip_tags($data["cell_color"]);
    $data["cell_color"] = htmlspecialchars($data["cell_color"]);
    if ( strlen( $data["cell_color"] ) > 6 ) {
	  	$data["cell_color"] = substr( $data["cell_color"], 0, 6 );
	}

	$hexpattern = '/([a-fA-F0-9]{3}){1,2}\b/';
	if (!preg_match($hexpattern, $data["cell_color"]))
	{
		$data["cell_color"] = "f5f5f5";
	}

	
    if ( strlen( $data["print"] ) > 3 ) {
	  	$data["height"] = substr( $data["print"], 0, 3 );
	}
	$data["height"] = intval($data["height"]);
	$data["description"] = htmlspecialchars($data["description"]);


	$data["print"] = intval($data["print"]);
    if ( strlen( $data["print"] ) > 1 ) {
	  	$data["print"] = substr( $data["print"], 0, 1 );
	}
	$data["access"] = intval($data["access"]);
    if ( strlen( $data["access"] ) > 1 ) {
	  	$data["access"] = substr( $data["access"], 0, 1 );
	}
	$data["created_by"] = intval($data["created_by"]);
    
    // Validate json data activities
    $arrayAct = explode(",{", stripslashes($data["activities"]));
    foreach ($arrayAct as $actjson) 
    {
    	if (preg_match('/^"a/', $actjson))
    	{
    		$actjson = '{'.$actjson;
    	}
		if (json_decode($actjson))
        {	
        	$isJson = TRUE;
        }
        else 
        {
        	$isJson = FALSE;
        }
    }
    if ($isJson == TRUE)
    {
    	$data["activities"] = stripslashes($data["activities"]);
    }
    else 
    {
    	$data["activities"] = "";
    }

	// Validate json data scheduledact
	$arrayPlanAct = explode(",{", stripslashes($data["scheduledact"]));
	foreach ($arrayPlanAct as $planactjson) 
	{
		//var_dump($planactjson);
		if(preg_match('/^"d/', $planactjson))
		{
			$planactjson = '{'.$planactjson;
		}
		if (json_decode($planactjson))
        {	
        	$isJsonP = TRUE;
        }
        else 
        {	
        	$isJsonP = FALSE;
        }
        //var_dump($planactjson);
	}
	if ($isJsonP == TRUE)
    {
    	$data["scheduledact"] = stripslashes($data["scheduledact"]);

    }
    else 
    {
    	$data["scheduledact"] = "";
    }
	
	//Sanitazing data
	$data["action"] = sanitize_post_field('action', $data['action'], $data['id'], 'db');
	if (isset($data['id'])) {
		$data["id"] = sanitize_post_field('id', $data['id'], $data['id'], 'db');
	}
	$data["p_name"] = sanitize_text_field($data['p_name']);
	$data["creation_date"] = sanitize_post_field('creation_date', $data['creation_date'], $data['id'], 'db');
	$data["time_mode"] = sanitize_post_field('time_mode', $data['time_mode'], $data['id'], 'db');
	$data["type"] = sanitize_post_field('type', $data['type'], $data['id'], 'db');
	$data["display_title"] = sanitize_post_field('display_title', $data['display_title'], $data['id'], 'db');
	$data["display_filters"] = sanitize_post_field('display_filters', $data['display_filters'], $data['id'], 'db');
	$data["start_h"] = sanitize_post_field('start_h', $data['start_h'], $data['id'], 'db');
	$data["rows"] = sanitize_post_field('rows', $data['rows'], $data['id'], 'db');
	$data["rows_name"] = sanitize_post_field('rows_name', $data['rows_name'], $data['id'], 'db');
	$data["cells"] = sanitize_post_field('cells', $data['cells'], $data['id'], 'db');
	$data["cell_color"] = sanitize_post_field('cell_color', $data['cell_color'], $data['id'], 'db');
	$data["height"] = sanitize_post_field('height', $data['height'], $data['id'], 'db');
	$data["description"] = sanitize_text_field($data['description']);
	$data["activities"] = sanitize_post_field('activities', $data['activities'], $data['id'], 'db');
	$data["scheduledact"] = sanitize_post_field('scheduledact', $data['scheduledact'], $data['id'], 'db');
	$data["days"] = sanitize_post_field('days', $data['days'], $data['id'], 'db');
	$data["print"] = sanitize_post_field('print', $data['print'], $data['id'], 'db');
	$data["created_by"] = sanitize_post_field('created_by', $data['created_by'], $data['id'], 'db');
	$data["access"] = sanitize_post_field('access', $data['access'], $data['id'], 'db');
	//var_dump($data);
	require_once SYET_PATH . 'admin/class-easy-timetable-admin.php';
	$save = Easy_Timetable_Admin::syet_saveTimetable($data);
	return $save;
}

function syet_edit_planning() {

	$data["action"] = sanitize_post_field('action', $_POST['action'], $_POST['id'], 'db');
	$data["id"] = intval($_POST["id"]);
	$data["id"] = sanitize_post_field('id', $data['id'], $data['id'], 'db');
	//var_dump($data);
	require_once SYET_PATH . 'admin/class-easy-timetable-admin.php';
	$save = Easy_Timetable_Admin::syet_editPlanning($data);
	//var_dump($save);
	return $save;
}

function syet_delete_planning() {
	$data["action"] = sanitize_post_field('action', $_POST['action'], $_POST['id'], 'db');
	$data["id"] = intval($_POST["id"]);
	$data["id"] = sanitize_post_field('id', $data['id'], $data['id'], 'db');
	require_once SYET_PATH . 'admin/class-easy-timetable-admin.php';
	$delete = Easy_Timetable_Admin::syet_deletePlanning($data);
	//var_dump($save);
	return $delete;
}

function syet_settings_page()
{
	require_once SYET_PATH . 'admin/class-easy-timetable-admin.php';
	$settings = Easy_Timetable_Admin::syet_settings_page();
	return $settings;
}

// FOnction pour aller chercher les données des images dans la media library
function syet_get_images_from_media_library_to_add_it_to_activity() {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' =>'image',
        'post_status' => 'inherit',
        'posts_per_page' => 300,
        'orderby' => 'asc'
    );
    $query_images = new WP_Query( $args );
    $images = array();
    foreach ( $query_images->posts as $image) {
        $images[]= $image->guid;
    }
    return $images;
}
// fonction pour afficher les images via ajax
function syet_my_media_gallery_to_insert_in_activity() {
    $imgs = syet_get_images_from_media_library_to_add_it_to_activity();
	$html = '<div id="syet_media-gallery">';
	$html .= '<div class="syet_close">x</div>';
	foreach($imgs as $img) {
		$html .= '<img style="max-width:150px;" src="' . $img . '" alt="" />';
	}
	$html .= '</div>';
	echo $html;
}

add_action('wp_ajax_syet_save_planning', 'syet_save_planning');
add_action('wp_ajax_syet_edit_planning', 'syet_edit_planning');
add_action('wp_ajax_syet_delete_planning', 'syet_delete_planning');
add_action('wp_ajax_syet_my_media_gallery_to_insert_in_activity', 'syet_my_media_gallery_to_insert_in_activity');
global $arrayAtts;
$arrayAtts = array();

//Function to build the shortcode for front-end display
function easytimetable( $atts, $content = null ){
	global $arrayAtts;
	extract(shortcode_atts(array(
        'id' => 1
    ), $atts));

	array_push($arrayAtts, $atts);
	//var_dump($arrayAtts);
	$id = (int)$id;
	$nonce = wp_create_nonce('displayPlanning');
    $content = do_shortcode($content);
    
    ob_start();

    displayTheTT($id,$nonce, $content );
    $output = do_shortcode(ob_get_contents());
    ob_end_clean();
    
    return $output;	
}

function displayTheTT($id,$nonce, $content ){
	
	require_once SYET_PATH . 'public/class-easy-timetable-public.php';
	$display = Easy_Timetable_Public::syet_displayPlanning($id, $nonce, $content);
}
function register_easytimetable_shortcodes(){

   add_shortcode('easytimetable', 'easytimetable');
}

add_action( 'init', 'register_easytimetable_shortcodes');

//Creation d'un widget
class sy_easytimetable_widget extends WP_Widget {

	// constructor
	public function __construct() {
    $widget_options = array( 
      'classname' => 'easytimetable_widget',
      'description' => 'Display a timetable from EasyTimetable plugin. Select an id to make it work!',
    );
    parent::__construct( 'easytimetable_widget', 'Easytimetable widget', $widget_options );
  }

  	public function widget( $args, $instance) {
		$id = (int)(apply_filters( 'widget_title', $instance[ 'easytimetableId' ] ));
		//var_dump($id);
		$nonce = wp_create_nonce('displayPlanning');
		$content = "";
		displayTheTT($id,$nonce, $content );	
	}

	// widget form creation
	public function form( $instance ) {
	  	$easytimetableId = ! empty( $instance['easytimetableId'] ) ? $instance['easytimetableId'] : ''; ?>
	  	<p>
	   	 	<label for="<?php echo $this->get_field_id( 'easytimetableId' ); ?>">Id:</label>
	    	<input type="number" id="<?php echo $this->get_field_id( 'easytimetableId' ); ?>" name="<?php echo $this->get_field_name( 'easytimetableId' ); ?>" value="<?php echo esc_attr( $easytimetableId ); ?>" />
	  	</p><?php 
	}

	// widget update
	public function update( $new_instance, $old_instance ) {
	  	$instance = $old_instance;
	  	$instance[ 'easytimetableId' ] = strip_tags( $new_instance[ 'easytimetableId' ] );
	  	return $instance;
	}
}
function sy_easytimetable_widget_reg() { 
  register_widget( 'sy_easytimetable_widget' );
}
add_action( 'widgets_init', 'sy_easytimetable_widget_reg' );
