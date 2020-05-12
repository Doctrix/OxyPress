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







/**
 * Hide Jetpack Banner
 */
add_filter('jetpack_just_in_time_msgs', '__return_false');
add_filter('manage_posts_columns', 'posts_column_views');
add_filter('manage_edit-post_sortable_columns', 'sort_by_views_column' );
add_filter('rest_authentication_errors', function( $result ) {
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
		'menu_position' => 6,
		'menu_icon' => 'dashicons-upload',
		'supports' => ['title', 'editor', 'comments', 'author', 'excerpt', 'thumbnail', 'custom-fields', 'post-formats'],
		'taxonomies' => ['genre','prix','systeme','pegi'],
		'show_in_rest' => false,
		'has_archive' => true,
	]);
});
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
add_action('pre_get_posts', 'post_views_orderby' );
add_action('comment_post','add_points');
add_action('wp_set_comment_status', 'update_points_comment_by_status', 10, 2);
add_action('untrash_comment','update_points_untrash_comment');
add_action('wp_head', 'page_view');

remove_action('try_gutenberg_panel', 'wp_try_gutenberg_panel');
// register_uninstall_hook();

	

/**
 * Compteur de visite et de vues
 */
//Getter


function getPostViews($postID){
	global $wpdb;
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
//Setter
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 


/**
 * Systeme de points
 */
function add_points(){
	global $current_user;
	global $wpdb;
	global $post;

	// On verifie un membre poste un commentaire
    if( $current_user ) {

	// On recupere le nombre de points actuels
	$points = intval(get_user_meta( $current_user->ID, 'Points', true));

	// On verifie si le membre a deja poste un commentaire
	$comment_user_count = (int) $wpdb->get_var(
			$wpdb->prepare("SELECT COUNT(*) FROM $wpdb->comments
			WHERE comment_post_ID = %d
				AND user_id = %d
				AND comment_approved = '1'", $post->ID, $current_user->ID)
		);
/* 	$points = (int) $wpdb->get_var(
		$wpdb->prepare("SELECT user_id, exp FROM $wpdb->profil
		WHERE id = %d", $points)
	); */
	// On est le premier commentaire, on met a jour les points
	if( $comment_user_count == 1 ) {

		$points += 5;
		update_user_meta($current_user->ID, 'Points', $points);
	}
return $points;
	}
}

/*
 * Ajout ou retrait des points en fonction du statut
 */
function update_points_comment_by_status($comment_id, $comment_status) {

    global $current_user;
    global $wpdb;
    global $post;

    // On verifie si le membre a les droits pour approuver un commentaire
    if( current_user_can('manage_options') ) {

	// On recupere les id du membre et du post concerné par un ajout de commentaire
	$comment_user = $wpdb->get_row(
		$wpdb->prepare("SELECT user_id, comment_post_ID FROM $wpdb->comments 
                                WHERE comment_ID = %d", $comment_id)
	);

	if( $comment_user->user_id >= 1 ) {

	    // Si on a bien un membre, on verifie si le commentaire est le premier pour cet article
	    $comment_user_count = (int) $wpdb->get_row(
			$wpdb->prepare("SELECT COUNT(comment_post_ID) FROM $wpdb->comments 
                                        WHERE comment_post_ID = %d
					    AND user_id = %d
                                        GROUP BY comment_post_ID", $comment_user->comment_post_ID, $comment_user->user_id)
            );

	    // On recupere le nombre de points actuels
	    $points = intval(get_user_meta( $comment_user->user_id, 'Points', true));

	    switch( $comment_status ) {

	        case 'approve' :		

		    // Si on est sur le premier commentaire, on met a jour les points selon le statut
		    if( $comment_user_count == 1 ) {

		    $points += 5;
			update_user_meta($comment_user->user_id, 'Points', $points);
		    }

		    break;

		case 'hold' :

		    $points += -5;
		    update_user_meta($comment_user->user_id, 'Points', $points);

		    break;

		case 'trash' :

		    $points += -50;
		    update_user_meta($comment_user->user_id, 'Points', $points);

		    break;
	     }
        }
    }
}

/**
 * Ajout des points après annulation de la corbeille
 */
function update_points_untrash_comment($comment_id) {

    global $current_user;
    global $wpdb;

    // On verifie si le membre a le droit d'approuver un commentaire
    if( current_user_can('manage_options') ) {

        // On recupere id du membre
	$comment_user_id = $wpdb->get_var(
		$wpdb->prepare("SELECT user_id FROM $wpdb->comments 
                                WHERE comment_ID = %d", $comment_id)
	);

	// On recupere le nombre de points actuels
	$points = intval(get_user_meta( $comment_user_id, 'Points', true));

	if( $comment_user_id >= 1 ) {

	    $points += 50;
	    update_user_meta($comment_user_id, 'Points', $points);
	}
    }
}