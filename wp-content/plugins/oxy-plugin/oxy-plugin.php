<?php

/**
 * Plugin Name: Oxy Plugin
 */
defined('ABSPATH') or die('oups il y a rien à voir');

register_activation_hook(__FILE__, function () {
	touch(__DIR__ . '/oxy');
});

register_deactivation_hook(__FILE__, function () {
	unlink(__DIR__ . '/oxy');
});

/**
 * Hide Jetpack Banner
 */
add_filter('jetpack_just_in_time_msgs', '__return_false');
add_filter('manage_posts_columns', 'posts_column_views');
add_filter('manage_edit-post_sortable_columns', 'sort_by_views_column');
add_filter('rest_authentication_errors', function ($result) {
	// If a previous authentication check was applied,
	// pass that result along without modification.
	if (true === $result || is_wp_error($result)) {
		return $result;
	}

	// No authentication has been performed yet.
	// Return an error if user is not logged in.
	if (!is_user_logged_in()) {
		return new WP_Error(
			'rest_not_logged_in',
			__('You are not currently logged in.'),
			array('status' => 401)
		);
	}

	// Our custom authentication check should have no effect
	// on logged-in requests
	return $result;
});

add_action('init', function () {
	register_taxonomy('genre', 'store', [
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
	register_taxonomy('statut', 'store', [
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
	register_taxonomy('prix', 'store', [
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
	register_taxonomy('systeme', 'store', [
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
	register_taxonomy('pegi', 'store', [
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
	register_post_type('store', [
		'labels' => [
			'name' => 'Boutique',
			'singular_name' => 'Boutique',
			'plural_name' => 'Boutiques',
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
		'taxonomies' => ['genre', 'prix', 'systeme', 'pegi'],
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => ['slug' => 'store'],
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'show_in_rest' 		 => true,
	]);
});
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);
add_action('pre_get_posts', 'post_views_orderby');
add_action('comment_post', 'add_points');
add_action('wp_set_comment_status', 'update_points_comment_by_status', 10, 2);
add_action('untrash_comment', 'update_points_untrash_comment');
add_action('wp_head', 'page_view');

remove_action('try_gutenberg_panel', 'wp_try_gutenberg_panel');
// register_uninstall_hook();

/**
 * Slider carousel
 */
add_action('init', 'slider_ban_init');
add_action('add_meta_boxes', 'slider_ban_metaboxes');
add_action('save_post', 'slider_ban_savepost',10,2);
add_action('manage_edit-slide_columns', 'slider_ban_columnfilter');
add_action('manage_posts_custom_column', 'slider_ban_column');

/**
 * Permet d'initialiser le carrousel
 */
function slider_ban_init(){

	$labels = [
		'name' => 'Slide',
		'singular_name' => 'Slide',
		'add_new' => 'Ajouter un Slide',
		'add_new_item' => 'Ajouter un nouveau Slide',
		'edit_item' => 'Editer un Slide',
		'new_item' => 'Nouvelle Slide',
		'view_item' => 'Voir le Slide',
		'search_items' => 'Rechercher un Slide',
		'not_found' => 'Aucun Slide',
		'not_found_in_trash' => 'Aucun Slide dans la corbeille',
		'parent_item_colon' => '',
		'menu_name' => 'Slides'
	];

	register_post_type('slide', [
		'public' => true,
		'publicly_queryable' => false,
		'labels' => $labels,
		'menu_position' => 9,
		'capability_type' => 'post',
		'supports' => ['title', 'thumbnail']
	]);

	add_image_size('slider',1000,300,true);
}

function slider_ban_columnfilter($columns){
	$thumb = ['thumbnail' => 'Image'];
	$columns = array_slice($columns, 0, 1) + $thumb + array_slice($columns, 1, null);
	return $columns;
}

function slider_ban_column($column){
	global $post;
	if($column == 'thumbnail'){
		echo edit_post_link(get_the_post_thumbnail($post->ID),null,null,$post->ID);	
	}
}

/**
 * Permet de gérer les metabox
 */
function slider_ban_metaboxes(){
	add_meta_box('slide_ban', 'Lien', 'slider_ban_metabox', 'slide', 'normal', 'high');
}

/**
 * Metabox pour gérer le lien
 */
function slider_ban_metabox($object){
	wp_nonce_field('slider_ban','slider_ban_nonce');
	?>
	<div class="meta-box-item-title">
		<h4>Lien du slide</h4>
	</div>
	<div class="meta-box-item-content">
		<input type="text" name="slider_ban_link" style="width:100%" value="<?= esc_attr(
			get_post_meta($object->ID, '_link', true)); ?>">
	</div>
	<?php
}

/**
 * Permet de gérer la sauvegarde de la metabox
 */
function slider_ban_savepost($post_id, $post){
	if(!isset($_POST['slider_ban_link']) || !wp_verify_nonce($_POST['slider_ban_nonce'],
	'slider_ban')){
		return $post_id;
	}

	$type = get_post_type_object($post->post_type);
	if(!current_user_can($type->cap->edit_post)){
		return $post_id;
	}
	update_post_meta($post_id,'_link',$_POST['slider_ban_link']);
}

/**
 * Permet d'afficher le carrousel
 */
function slider_ban_show($limit = 10){
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',null,'3.5.1',true);
	wp_enqueue_script('caroufredsel',plugins_url().'/oxy-plugin/js/jquery.carouFredSel-6.2.1-packed.js',['jquery'],'6.2.1',true);
	add_action('wp_footer', 'slider_ban_script', 30);

	$slides = new WP_query("post_type=slide&posts_per_page=$limit");
	echo '<div id="slider_ban">';
	while ($slides->have_posts()) {
		$slides->the_post();
		global $post;
		echo '<a style="display:block; float:left; height:300px;" href="'.esc_attr(get_post_meta($post->ID, '_link', true)).'">';
		the_post_thumbnail('slider', ['style' => 'width:1000px!important;']);
		echo '</a>';
	}
	echo '</div>';
}

function slider_ban_script(){
?>
	<script type="text/javascript">
		(function($) {
			$('#slider_ban').caroufredsel();
		})(jQuery);
	</script>
<?php
}

/**
 * Compteur de visite et de vues
 */
//Getter
function getPostViews($postID)
{
	global $wpdb;
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count . ' Views';
}

//Setter
function setPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

/**
 * Systeme de points
 */
function add_points()
{
	global $current_user;
	global $wpdb;
	global $post;

	// On verifie un membre poste un commentaire
	if ($current_user) {

		// On recupere le nombre de points actuels
		$points = intval(get_user_meta($current_user->ID, 'Points', true));

		// On verifie si le membre a deja poste un commentaire
		$comment_user_count = (int) $wpdb->get_var(
			$wpdb->prepare("SELECT COUNT(*) FROM $wpdb->comments
			WHERE comment_post_ID = %d
				AND user_id = %d
				AND comment_approved = '1'", $post->ID, $current_user->ID)
		);

		// On est le premier commentaire, on met a jour les points
		if ($comment_user_count == 1) {

			$points += 5;
			update_user_meta($current_user->ID, 'Points', $points);
		}
		return $points;
	}
}

/**
 * Ajout ou retrait des points en fonction du statut
 */
function update_points_comment_by_status($comment_id, $comment_status)
{

	global $current_user;
	global $wpdb;
	global $post;

	// On verifie si le membre a les droits pour approuver un commentaire
	if (current_user_can('manage_options')) {

		// On recupere les id du membre et du post concerné par un ajout de commentaire
		$comment_user = $wpdb->get_row(
			$wpdb->prepare("SELECT user_id, comment_post_ID FROM $wpdb->comments 
                                WHERE comment_ID = %d", $comment_id)
		);

		if ($comment_user->user_id >= 1) {

			// Si on a bien un membre, on verifie si le commentaire est le premier pour cet article
			$comment_user_count = (int) $wpdb->get_row(
				$wpdb->prepare("SELECT COUNT(comment_post_ID) FROM $wpdb->comments 
                                        WHERE comment_post_ID = %d
					    AND user_id = %d
                                        GROUP BY comment_post_ID", $comment_user->comment_post_ID, $comment_user->user_id)
			);

			// On recupere le nombre de points actuels
			$points = intval(get_user_meta($comment_user->user_id, 'Points', true));

			switch ($comment_status) {

				case 'approve':

					// Si on est sur le premier commentaire, on met a jour les points selon le statut
					if ($comment_user_count == 1) {

						$points += 5;
						update_user_meta($comment_user->user_id, 'Points', $points);
					}

					break;

				case 'hold':

					$points += -5;
					update_user_meta($comment_user->user_id, 'Points', $points);

					break;

				case 'trash':

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
function update_points_untrash_comment($comment_id)
{

	global $current_user;
	global $wpdb;

	// On verifie si le membre a le droit d'approuver un commentaire
	if (current_user_can('manage_options')) {

		// On recupere id du membre
		$comment_user_id = $wpdb->get_var(
			$wpdb->prepare("SELECT user_id FROM $wpdb->comments 
                                WHERE comment_ID = %d", $comment_id)
		);

		// On recupere le nombre de points actuels
		$points = intval(get_user_meta($comment_user_id, 'Points', true));

		if ($comment_user_id >= 1) {

			$points += 50;
			update_user_meta($comment_user_id, 'Points', $points);
		}
	}
}
