<?php

/**
 * @link       http://www.stereonomy.com
 * @since      1.0.0
 *
 * @package    Easy_Timetable
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
global $wpdb;
$table_name = $wpdb->prefix . 'easytimetable_planning';
$wpdb->query("DROP TABLE IF EXISTS $table_name");
