<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    Easy_Timetable
 * @subpackage Easy_Timetable/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Easy_Timetable
 * @subpackage Easy_Timetable/includes
 * @author     Stereonomy <contact@stereonomy.com>
 */
class Easy_Timetable_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function syet_activate() {

	}

	public static function syet_easy_timetable_create_table($nom_table){

        global $wpdb;
        $table_name = $wpdb->prefix . "easytimetable_" . $nom_table;
        
        /*
            On définit ici le charset et la collation pour éviter
            l'apparition de caractères spéciaux au moment de la sauvegarde
         */

        $charset_collate = '';

        if ( ! empty( $wpdb->charset ) ) {
          $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
        }

        if ( ! empty( $wpdb->collate ) ) {
          $charset_collate .= " COLLATE {$wpdb->collate}";
        }

        if ($nom_table == "planning") {
            $sql = "CREATE TABLE $table_name (
            `id` INT(9) NOT NULL AUTO_INCREMENT,
            `p_name` VARCHAR(255)  NOT NULL ,
            `creation_date` VARCHAR(20)  NOT NULL ,
            `type` VARCHAR(1)  NOT NULL ,
            `display_title` VARCHAR(1)  NOT NULL ,
            `display_filters` VARCHAR(1)  NOT NULL ,
            `time_mode` VARCHAR(1)  NOT NULL ,
            `start_h` VARCHAR(8)  NOT NULL ,
            `rows` INT(1)  NOT NULL ,
            `rows_name` TEXT NOT NULL ,
            `cells` INT(2)  NOT NULL ,
            `cell_color` VARCHAR(6)  NOT NULL ,
            `height` INT(3)  NOT NULL ,
            `description` TEXT NOT NULL ,
            `activities` TEXT NOT NULL ,
            `scheduledact` TEXT NOT NULL ,
            `days` TEXT NOT NULL ,
            `print` INT(1)  NOT NULL ,
            created_by INT(11)  NOT NULL ,
            access INT(11)  NOT NULL ,
            UNIQUE KEY id (id)
            ) $charset_collate;";
            // On charge upgrade.php depuis le dossier includes du répertoire wp-admin
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
    }
}
