<?php

require_once('walker/CommentWalker.php');
require_once('options/apparence.php');

function oxy_supports ()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('html5');
	register_nav_menu('header', 'En tête du menu');
	register_nav_menu('footer', 'Pied de page');

	add_image_size('post-thumbnail', 350, 215, true);
}

function oxy_register_assets ()
{
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', []);
	wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
	wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', [], false, true);
	wp_enqueue_style('bootstrap',);
	wp_enqueue_script('bootstrap');
}

function oxy_title_separator ()
{
	return '|';
}

function oxy_menu_class ($classes)
{
	$classes[] = 'nav-item';
	return $classes;
}

function oxy_menu_link_class ($attrs)
{
	$attrs['class'] = 'nav-link';
	return $attrs;
}

function oxy_pagination ()
{
	$pages = paginate_links(['type' => 'array']);
	if ($pages === null) {
		return;
	}
    echo '<nav aria-label="Pagination" class="my-4">';
	echo '<ul class="pagination">';
	foreach($pages as $page) {
		$active = strpos($page, 'current') !== false;
		$class = 'page-item';
		if ($active) {
			$class .= ' active';
		}
		echo '<li class="' . $class . '">';
		echo str_replace('page-numbers', 'page-link', $page);
		echo '</li>';
	}
	echo '</ul>';
    echo '</nav>';
}

function oxy_init () {
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
		'supports' => ['title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'excerpt', 'post-formats'],
		'show_in_rest' => true,
		'has_archive' => true,
	]);
}

add_action('init', 'oxy_init');
add_action('after_setup_theme', 'oxy_supports');
add_action('wp_enqueue_scripts', 'oxy_register_assets');
add_filter('document_title_separator', 'oxy_title_separator');
add_filter('nav_menu_css_class', 'oxy_menu_class');
add_filter('nav_menu_link_attributes', 'oxy_menu_link_class');

require_once('metaboxes/sponso.php');
require_once('options/extra.php');

SponsoMetaBox::register();
ExtraMenuPage::register();

add_filter('manage_boutique_posts_columns', function ($columns) {
	return [
		'cb' => $columns['cb'],
		'thumbnail' => 'Miniature',
		'title' => $columns['title'],
		'author' => 'Auteur',
		'comments' =>  $columns['comments'],
		'date' => $columns['date']
	];
});

add_filter('manage_boutique_posts_custom_column',  function ($column, $postId) {
	if ($column === 'thumbnail') {
		the_post_thumbnail('thumbnail', $postId);
	}
}, 10, 2);

add_action('admin_enqueue_scripts', function () {
	wp_enqueue_style('admin_oxy', get_template_directory_uri() . '/assets/admin.css');
});

add_filter('manage_post_posts_columns', function ($columns) {
	$newColumns = [];
	foreach($columns as $k => $v) {
		if($k === 'date') {
			$newColumns['sponso'] = 'Article sponsorisé ?';
		}
		$newColumns[$k] = $v;
	}
	return $newColumns;
});

add_filter('manage_post_posts_columns', function ($columns) {
	$newMiniature = [];
	foreach($columns as $k => $v) {
		if($k === 'title') {
			$newMiniature['thumbnail'] = 'Miniature';
		}
		$newMiniature[$k] = $v;
	}
	return $newMiniature;
});

add_filter('manage_post_posts_custom_column', function ($column, $postId) {
	if ($column === 'sponso') {
		if (!empty(get_post_meta($postId, SponsoMetaBox::META_KEY, true))) {
			$class = 'yes';
		}else {
			$class = 'no';
		}
		echo '<div class="bullet bullet-' . $class . '"></div>';
	}
}, 10, 2);

add_filter('manage_post_posts_custom_column', function ($column, $postId) {
	if ($column === 'thumbnail') {
		the_post_thumbnail('thumbnail', $postId);
	}
}, 10, 2);

/**
 * @param WP_Query $query
 */
function oxy_pre_get_posts ($query) {
	if (is_admin() || !is_home() || !$query->is_main_query()) {
		return;
	}
	if (get_query_var('sponso') === '1') {
		$meta_query = $query->get('meta_query', []);
		$meta_query[] = [
			'key' => SponsoMetaBox::META_KEY,
			'compare' => 'EXISTS',
		];
		$query->set('meta_query', $meta_query);
	}
}

function oxy_query_vars ($params) {
	$params[] = 'sponso';
	return $params;
}

add_action('pre_get_posts', 'oxy_pre_get_posts');
add_filter('query_vars', 'oxy_query_vars');

require_once 'widgets/Widget.php';

function oxy_register_widget () {
	register_widget(TwitchWidget::class);
	register_widget(YoutubeWidget::class);
	register_sidebar([
		'id' => 'homepage',
		'name' => 'Sidebar Accueil',
		'before_widget' => '<div class="p-4 %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="font-italic">',
		'after_title' => '</h4>'
	]);

}

add_action('widgets_init', 'oxy_register_widget');

add_filter('comment_form_default_fields', function ($fields) {
	$fields['email'] = <<<HTML
	<div class="form-group"><label for="email">Email</label><input class="form-control" name="email" id="email" required></div>
HTML;
	return $fields;
});

add_action('after_switch_theme', function () {
/**
 * Genre
 */
	wp_insert_term('Action', 'genre');
	wp_insert_term('Aventure', 'genre');
	wp_insert_term('Plate-forme', 'genre');
	wp_insert_term('Combat', 'genre');
	wp_insert_term('RPG', 'genre');
	wp_insert_term('FPS', 'genre');
	wp_insert_term('MMO', 'genre');
/**
 * Statut
 */
	wp_insert_term('Stable', 'statut');
	wp_insert_term('Bêta', 'statut');
	wp_insert_term('Devlog', 'statut');
/**
 * Prix
 */
 	wp_insert_term('Gratuit', 'prix');
	wp_insert_term('Payant', 'prix');
	wp_insert_term('Donner votre prix', 'prix');
/**
 * OS
 */
 	wp_insert_term('Windows', 'systeme');
	wp_insert_term('Android', 'systeme');
	wp_insert_term('Linux', 'systeme');
/**
 * PEGI
 */
 	wp_insert_term('3', 'pegi');
	wp_insert_term('7', 'pegi');
	wp_insert_term('12', 'pegi');
	wp_insert_term('16', 'pegi');
	wp_insert_term('18', 'pegi');
});

add_action('after_switch_theme', 'flush_rewrite_rules');