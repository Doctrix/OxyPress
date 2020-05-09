<?php
/**
* Plugin Name: Oxy DB
*/

defined('ABSPATH') or die('oups il y a rien à voir');

register_activation_hook(__FILE__, function() {
	touch(__DIR__ . '/oxy-db');
});

register_deactivation_hook(__FILE__, function() {
	unlink(__DIR__ . '/oxy-db');
});


/**
 * Si inexistante, on créée la table SQL "commissions" après l'activation du thème
 */
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();

$commissions_table_name = $wpdb->prefix . 'commissions';

$commissions_sql = "CREATE TABLE IF NOT EXISTS $commissions_table_name (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	type varchar(45) DEFAULT NULL,
	amount decimal(10,2) DEFAULT NULL,
	user_id mediumint(9) DEFAULT NULL,
	order_id mediumint(9) DEFAULT NULL,
	line_game_id mediumint(9) DEFAULT NULL,
	line_game_rate decimal(10,2) DEFAULT NULL,
	line_game_quantity mediumint(9) DEFAULT NULL,
	line_subtotal decimal(10,2) DEFAULT NULL,
	user_notified varchar(45) DEFAULT NULL,
	time datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
	PRIMARY KEY  (id)
) $charset_collate;";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

dbDelta($commissions_sql);


/**
 * On ajoute un onglet "Parrainage" dans le back-office Boutique
 */
function oxy_add_commission_game_tab($tabs) {
	$tabs = array_insert_after('general', $tabs, 'commission', array(
		'label' => __('Parrainage', 'mosaika'),
		'target' => 'commission_game_data',
		'class' => array()
	));

	return $tabs;
}
add_filter('boutique_game_data_tabs', 'oxy_add_commission_game_tab');