<?php
/**
* Plugin Name: Oxy Plugin
*/

defined('ABSPATH') or die('oups il y a rien à voir');

register_activation_hook(__FILE__, function() {
	touch(__DIR__ . '/oxy');
});

register_deactivation_hook(__FILE__, function() {
	unlink(__DIR__ . '/oxy');
});

// register_uninstall_hook();

add_action('init', function () {
register_taxonomy('genre', 'post', [
		'labels' => [
			'name' => 'Genre',
			'singular_name' => 'Genre',
			'plural_name' => 'Genres',
			'search_items' => 'Rechercher des genres de jeu',
			'all_items' => 'Tous les genres de jeu',
			'edit_item' => 'Modifier le genre de jeu',
			'update_item' => 'Mettre à jour le genre',
			'add_new_item' => 'Ajouter un nouveau genre de jeu',
			'new_item_name' => 'Ajouter un nouveau genre de jeu',
			'menu_name' => 'Genre',
		],
		'show_in_rest' => true,
		'hierarchical' => true,
		'show_admin_column' => true,
	]);
	register_taxonomy('statut', 'post', [
		'labels' => [
			'name' => 'Statut',
			'singular_name' => 'Statut',
			'plural_name' => 'Statuts',
			'search_items' => 'Rechercher des statuts',
			'all_items' => 'Tous les statuts',
			'edit_item' => 'Modifier le statut',
			'update_item' => 'Mettre à jour le statut',
			'add_new_item' => 'Ajouter un nouveau statut',
			'new_item_name' => 'Ajouter un nouveau statut',
			'menu_name' => 'Statut',
		],
		'show_in_rest' => true,
		'hierarchical' => true,
		'show_admin_column' => true,
	]);
	register_taxonomy('prix', 'post', [
		'labels' => [
			'name' => 'Prix',
			'singular_name' => 'Prix',
			'plural_name' => 'Prix',
			'search_items' => 'Rechercher des prix',
			'all_items' => 'Tous les prix',
			'edit_item' => 'Modifier l\'étiquette',
			'update_item' => 'Mettre à jour l\'étiquette',
			'add_new_item' => 'Ajouter une nouvelle étiquette',
			'new_item_name' => 'Ajouter une nouvelle étiquette',
			'menu_name' => 'Prix',
		],
		'show_in_rest' => true,
		'hierarchical' => true,
		'show_admin_column' => true,
	]);
	register_taxonomy('systeme', 'post', [
		'labels' => [
			'name' => 'Système d\'exploitation',
			'singular_name' => 'Système d\'exploitation',
			'plural_name' => 'Systèmes d\'exploitations',
			'search_items' => 'Rechercher des systèmes d\'exploitations',
			'all_items' => 'Tous les systèmes d\'exploitations',
			'edit_item' => 'Modifier le système d\'exploitation',
			'update_item' => 'Mettre à jour le système d\'exploitation',
			'add_new_item' => 'Ajouter un nouveau système d\'exploitation',
			'new_item_name' => 'Ajouter un nouveau système d\'exploitation',
			'menu_name' => 'Système d\'exploitation',
		],
		'show_in_rest' => true,
		'hierarchical' => true,
		'show_admin_column' => true,
	]);
	register_taxonomy('pegi', 'post', [
		'labels' => [
			'name' => 'Système d\'évaluation',
			'singular_name' => 'Système d\'évaluation',
			'plural_name' => 'Systèmes d\'évaluations',
			'search_items' => 'Rechercher des systèmes d\'évaluations',
			'all_items' => 'Tous les systèmes d\'évaluations',
			'edit_item' => 'Modifier le système d\'évaluation',
			'update_item' => 'Mettre à jour le système d\'évaluation',
			'add_new_item' => 'Ajouter un nouveau système d\'évaluation',
			'new_item_name' => 'Ajouter un nouveau système d\'eévaluation',
			'menu_name' => 'Système d\'évaluation',
		],
		'show_in_rest' => true,
		'hierarchical' => true,
		'show_admin_column' => true,
	]);
	register_post_type('boutique', [
		'labels' => [
			'name' => 'Boutique',
			'singular_name' => 'Boutique',
			'plural_name' => 'Magasins',
			'search_items' => 'Rechercher des jeux',
			'all_items' => 'Tous les jeux vidéos',
			'edit_item' => 'Modifier le jeu',
			'update_item' => 'Mettre à jour le jeu',
			'add_new_item' => 'Ajouter un nouveau jeu',
			'new_item_name' => 'Ajouter un nouveau jeu',
			'menu_name' => 'Boutique',
		],
		'public' => true,
		'menu_position' => 3,
		'menu_icon' => 'dashicons-upload',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'show_in_rest' => false,
		'has_archive' => true,
	]);
});

add_filter( 'rest_authentication_errors', function( $result ) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if ( true === $result || is_wp_error( $result ) ) {
        return $result;
    }

    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if ( ! is_user_logged_in() ) {
        return new WP_Error(
            'rest_not_logged_in',
            __( 'You are not currently logged in.' ),
            array( 'status' => 401 )
        );
    }

    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
});