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
 * On enregistre les valeurs des champs lorsque le produit est enregistré
 */
function oxy_save_commission_game_fields_data($product_id, $post, $update) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	/* if ($post->post_type == 'boutique') {
		$product = wc_get_product($product_id);

		if (isset($_POST['commission_user_id'])) {
			$commission_user_id = wc_clean($_POST['commission_user_id']);
			$product->update_meta_data('commission_user_id', $commission_user_id);
		}

		if (isset($_POST['commission_rate'])) {
			$commission_rate = floatval($_POST['commission_rate']);
			$product->update_meta_data('commission_rate', $commission_rate);
		}

		if (isset($_POST['commission_date_start'])) {
			$commission_date_start = wc_clean($_POST['commission_date_start']);
			$product->update_meta_data('commission_date_start', $commission_date_start);
		}

		if (isset($_POST['commission_date_end'])) {
			$commission_date_end = wc_clean($_POST['commission_date_end']);
			$product->update_meta_data('commission_date_end', $commission_date_end);
		}

		$product->save();
	} */
}
add_action('save_post', 'oxy_save_commission_game_fields_data', 10, 3);