<?php
/**
* Plugin Name: Oxy ACF
*/

defined('ABSPATH') or die('oups il y a rien à voir');

register_activation_hook(__FILE__, function() {
	touch(__DIR__ . '/oxy-acf');
});

register_deactivation_hook(__FILE__, function() {
	unlink(__DIR__ . '/oxy-acf');
});

function oxy_add_commission_field_groups() {
	acf_add_local_field_group(array(
		'key' => 'general',
		'title' => __('Parrainage', 'oxy'),
		'label' => __('Parrainage', 'oxy'),
		'target' => 'commission_game_data',
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'boutique',
				),
			),
		),
	));
}
add_action('acf/init', 'oxy_add_commission_field_groups');
