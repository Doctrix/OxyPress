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
$profil_table_name = $wpdb->prefix . 'profil';

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
	
$profil_sql = "CREATE TABLE IF NOT EXISTS $profil_table_name (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	user_id mediumint(9) DEFAULT NULL,
	nom varchar(45) DEFAULT NULL,
	exp decimal(10,2) DEFAULT NULL,
	niveau mediumint(9) DEFAULT NULL,
	monnaie decimal(10,2) DEFAULT NULL,
	user_notified varchar(45) DEFAULT NULL,
	derniere_connexion datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
	PRIMARY KEY  (id)
	) $charset_collate;";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

dbDelta($commissions_sql);
dbDelta($profil_sql);

$tag = "jeux-video";
$query = $wpdb->prepare("SELECT name FROM {$wpdb->terms} WHERE slug=%s", [$tag]);
$results = $wpdb->get_results($query);

/**
 * On enregistre les valeurs des champs lorsque le produit est enregistré
 */
function oxy_save_commission_game_fields_data($product_id, $post, $update) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	if ($post->post_type == 'boutique') {
		$product = get_posts($product_id);

		if (isset($_POST['commission_user_id'])) {
			$commission_user_id = clean_post_cache($_POST['commission_user_id']);
			$product->update_post_meta('commission_user_id', $commission_user_id);
		}

		 if (isset($_POST['commission_rate'])) {
			$commission_rate = floatval($_POST['commission_rate']);
			$product->update_post_meta('commission_rate', $commission_rate);
		} 

		if (isset($_POST['commission_date_start'])) {
			$commission_date_start = clean_post_cache($_POST['commission_date_start']);
			$product->update_post_meta('commission_date_start', $commission_date_start);
		}

		if (isset($_POST['commission_date_end'])) {
			$commission_date_end = clean_post_cache($_POST['commission_date_end']);
			$product->update_post_meta('commission_date_end', $commission_date_end);
		}

/* 		$product->save();
 */	} 
}

add_action('save_post', 'oxy_save_commission_game_fields_data', 10, 3);
/**
 * Permet de savoir combien de "points" un utilisateur possède
 * On compte combien de points il a gagné (récompense) et on soustrait le nombre de points qu'il a déjà utilisés (usage)
 */
function oxy_get_customer_commission_balance($user_id) {
	global $wpdb;
	$commissions_table_name = $wpdb->prefix . 'commissions';

	$commission_data = $wpdb->get_row(
		$wpdb->prepare("
			SELECT 
			IFNULL(sum(IF(type = %s, amount, 0)), 0) as user_gain,
			IFNULL(sum(IF(type = %s, amount, 0)), 0) as user_use
			FROM $commissions_table_name
			WHERE user_id = %d
			", 
			'gain',
			'use',
			$user_id
		)
	);

	$commission_balance = ($commission_data->user_gain > $commission_data->user_use) ? ($commission_data->user_gain - $commission_data->user_use) : 0;

	return array(
		'balance' => $commission_balance,
		'gain' => $commission_data->user_gain,
		'use' => $commission_data->user_use
	);
}

/**
 * On récupère chaque ligne de commission (récompense ou usage)
 */
function oxy_get_customer_commission_data($user_id) {
	global $wpdb;
	$commissions_table_name = $wpdb->prefix . 'commissions';

	$commission = oxy_get_customer_commission_balance($user_id);

	$commission_data = $wpdb->get_results(
		$wpdb->prepare("
			SELECT id, type, amount, order_id, line_game_id, line_game_rate, line_game_quantity, time
			FROM $commissions_table_name 
			WHERE user_id = %d 
			ORDER BY time DESC
			",
			$user_id
		)
	);

	return array('points' => $commission, 'details' => $commission_data);
}