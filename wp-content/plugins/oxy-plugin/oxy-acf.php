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

if (!function_exists('register_extended_field_group')){
	return;
}