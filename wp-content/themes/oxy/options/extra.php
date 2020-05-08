<?php
class MenuOptionsUserPage {

	const GROUP = 'extra_options';

	public static function register () {
		add_action('admin_menu', [self::class, 'addMenu']);
		add_action('admin_init', [self::class, 'registerSettings']);
		add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
	}

	public static function registerScripts ($suffix) {
		if ($suffix === 'settings_page_extra_options') {
			wp_register_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', [], false);
			wp_register_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', [], false, true);
			wp_enqueue_script('oxy_admin', get_template_directory_uri() . '/assets/admin.js',['flatpickr'], false, true);
			wp_enqueue_style('flatpickr');
		}
	}

	public static function registerSettings () {
		register_setting(self::GROUP, 'extra_infos');
		register_setting(self::GROUP, 'extra_liens');
		register_setting(self::GROUP, 'extra_events_titre');
		register_setting(self::GROUP, 'extra_events_date');
		add_settings_section('extra_options_section', 'Param�tres', function() {
			echo "Vous pouvez ici g&eacute;rer les param&egrave;tres li&eacute;s � vos options";

		}, self::GROUP);
		add_settings_field('extra_options_infos', "Informations mise en avant", function() {
			?>
			<textarea name="extra_infos" rows="2" style="width: 100%"><?= esc_html(get_option('extra_infos')) ?></textarea>
			<?php
		}, self::GROUP, 'extra_options_section');
		add_settings_field('extra_options_liens', "Liens", function() {
			?>
			<textarea name="extra_liens" rows="2" style="width: 50%"><?= esc_url(get_option('extra_liens')) ?></textarea>
			<?php
		}, self::GROUP, 'extra_options_section');
		add_settings_field('extra_options_events_titre', "Projets en cours", function() {
			?>
			<textarea name="extra_events_titre" rows="2" style="width: 50%"><?= esc_html(get_option('extra_events_titre')) ?></textarea>
			<?php
		}, self::GROUP, 'extra_options_section');
		add_settings_field('extra_options_events_date', "Date de sortie", function() {
			?>
			<input type="text" name="extra_events_date" value="<?= esc_attr(get_option('extra_events_date')) ?>" class="oxy_datepicker">
			<?php
		}, self::GROUP, 'extra_options_section');
	}

	public static function addMenu () {
		add_menu_page("Options suppl&eacute;mentaire", "Options", "manage_options", self::GROUP, [self::class, 'render'],'',72);
	}

	public static function render () {
		?>
		<h1>Options suppl&eacute;mentaire</h1>

		<p>Votre adresse web: <a href="<?= get_option('siteurl') ?>">En savoir plus</a></p>
		<p>Email administrateur: <?= get_option('admin_email') ?></p>
		<p>Role par d&eacute;faut: <?= get_option('default_role') ?></p>
		<form action="options.php" method="post">
			<?php
			settings_fields(self::GROUP);
			do_settings_sections(self::GROUP);
			submit_button();
			?>
			</form>
		<?php
	}
}



class OxyPlayPage { 

	const PLAY = 'play';

 	public static function register () {

/*		add_action('init', function () {
			register_post_type('play', [
				'labels' => [
						'name' => 'Play',
						'singular_name' => 'Play',
						'plural_name' => 'Play',
						'search_items' => 'Rechercher des jeux',
						'all_items' => 'Tous les jeux',
						'edit_item' => 'Modifier le jeu',
						'update_item' => 'Mettre à jour le jeu',
						'add_new_item' => 'Ajouter un nouveau jeu',
						'new_item_name' => 'Ajouter un nouveau jeu',
						'menu_name' => 'Play',
					],
				'description' => 'Description',
				'public' => true,
				'menu_position' => 7,
				'menu_icon' => 'dashicons-laptop',
				'supports' => ['title', 'editor', 'comments', 'author', 'excerpt', 'thumbnail', 'custom-fields'],
				'taxonomies' => ['pegi'],
				'show_in_rest' => false,
				'has_archive' => true,
				'rewrite' => ['slug' => 'play'],
			]); 
		});

		add_filter('manage_oxyplay_posts_columns', function ($columns) {
			return [
				'cb' => $columns['cb'],
				'thumbnail' => 'Miniature',
				'title' => $columns['title'],
				'author' => $columns['author'],
				'comments' =>  $columns['comments'],
				'date' => $columns['date']
			];
		}); */
		add_action( 'admin_menu', 'play_menu_page');
		function play_menu_page() {
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		add_menu_page( 'Lancer un jeu', 'Jouer', 'manage_options', self::PLAY, [self::class, 'render'], 'dashicons-welcome-widgets-menus', 9 );
		}
		add_action('admin_menu', 'addSubMenu');
		function addSubMenu () {
		add_submenu_page(self::PLAY, 'Options', 'Options jeux', 'manage_options',  'play_options', [self::class, 'renderOptions']);
		}
		add_action('admin_init', [self::class, 'registerSettings']);
		add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
	}

	 public static function registerScripts ($suffix) {
		if ($suffix === 'settings_page_oxyplay_options') {

		}
	}

	public static function registerSettings () {
		register_setting(self::PLAY, 'oxyplay_infos');
		register_setting(self::PLAY, 'oxyplay_liens');
		register_setting(self::PLAY, 'oxyplay_events_titre');
		add_settings_section('oxyplay_options_section', 'Param�tres', function() {
			echo "Vous pouvez ici g&eacute;rer les param&egrave;tres li&eacute;s � vos options";
		}, self::PLAY);
		add_settings_field('oxyplay_options_infos', "Informations mise en avant", function() {
			?>
			<textarea name="oxyplay_infos" rows="2" style="width: 100%"><?= esc_html(get_option('oxyplay_infos')) ?></textarea>
			<?php
		}, self::PLAY, 'oxyplay_options_section');
		add_settings_field('oxyplay_options_liens', "Liens", function() {
			?>
			<textarea name="oxyplay_liens" rows="2" style="width: 50%"><?= esc_url(get_option('oxyplay_liens')) ?></textarea>
			<?php
		}, self::PLAY, 'oxyplay_options_section');
		add_settings_field('oxyplay_options_events_titre', "Projets en cours", function() {
			?>
			<textarea name="oxyplay_events_titre" rows="2" style="width: 50%"><?= esc_html(get_option('oxyplay_events_titre')) ?></textarea>
			<?php
		}, self::PLAY, 'oxyplay_options_section');
	} 



	public static function render () {
		?>
		<h1>infos</h1>
		<p>Votre adresse web: <a href="<?= get_option('siteurl') ?>">En savoir plus</a></p>
		<p>Email administrateur: <?= get_option('admin_email') ?></p>
		<p>Role par d&eacute;faut: <?= get_option('default_role') ?></p>
		<form action="options.php" method="post">
			<?php
			settings_fields(self::PLAY);
			do_settings_sections(self::PLAY);
			submit_button();
			?>
		</form>
		<?php
	}
	public static function renderOptions () {
		?>
		<h1>options</h1>
		<p>Votre adresse web: <a href="<?= get_option('siteurl') ?>">En savoir plus</a></p>
		<p>Email administrateur: <?= get_option('admin_email') ?></p>
		<p>Role par d&eacute;faut: <?= get_option('default_role') ?></p>
		<form action="options.php" method="post">
			<?php
			settings_fields(self::PLAY);
			do_settings_sections(self::PLAY);
			submit_button();
			?>
		</form>
		<?php
	}

}

