<?php

require_once('walker/CommentWalker.php');
require_once('options/apparence.php');

function oxy_supports () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	add_theme_support('html5');
	register_nav_menu('header', 'En tête du menu');
	register_nav_menu('footer', 'Pied de page');

	add_image_size('post-thumbnail', 350, 215, true);
}

function oxy_register_assets () {
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', []);
	wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
	wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
	if (!is_customize_preview()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', [], false, true);
	}
	wp_enqueue_style('bootstrap',);
	wp_enqueue_script('bootstrap');
}

function oxy_title_separator ()
{
	return '|';
}

function oxy_menu_class ($classes) {
	$classes[] = 'nav-item';
	return $classes;
}

function oxy_menu_link_class ($attrs) {
	$attrs['class'] = 'nav-link';
	return $attrs;
}

function oxy_pagination () {
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

/**
* Widgets
*/
require_once 'widgets/Widget.php';

function oxy_register_widget () {
	register_widget(TwitchWidget::class);
	register_widget(YoutubeWidget::class);
	register_sidebar([
		'id' => 'homepage',
		'name' => __('Sidebar Accueil', 'oxy'),
		'before_widget' => '<div class="p-4 %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="font-italic">',
		'after_title' => '</h4>'
	]);

}

add_action('widgets_init', 'oxy_register_widget');

/**
* Banniere
*/
function oxy_register_widget_header () {
	register_widget(BanniereWidget::class);
	register_sidebar([
		'id' => 'bannierepage',
		'name' => __('Banniere Page', 'oxy'),
		'before_widget' => '<div class="p-4 %2$s" id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="font-italic">',
		'after_title' => '</h4>'
	]);
}

add_action('widgets_init', 'oxy_register_widget_header');

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

// https://developer.wordpress.org/apis/handbook/internationalization/
add_action('after_setup_theme', function () {
	load_theme_textdomain('oxy', get_template_directory() . '/languages');
});