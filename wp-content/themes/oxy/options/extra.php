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
			wp_enqueue_script('oxy_admin', get_template_directory_uri() . '/assets/js/admin.js',['flatpickr'], false, true);
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
		add_menu_page("Options suppl&eacute;mentaire", "Options", "manage_options", self::GROUP, [self::class, 'render'],'',9);
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
		add_action('admin_menu', [self::class, 'play_menu_page']);
		add_action('admin_menu', [self::class, 'addSubMenu']);
		add_action('admin_init', [self::class, 'registerSettings']);
	}	
	
 	public function play_menu_page() {
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		add_menu_page( 'Lancer un jeu', 'Jouer', 'manage_options', self::PLAY, [self::class, 'render'], 'dashicons-welcome-widgets-menus', 7 );
	}

	public function addSubMenu () {
		add_submenu_page('play', 'Options', 'Options', 'manage_options',  'play_options', [self::class, 'renderOptions']);
	}

	
	public static function render () {
	?>	

<?php
	$curauth = wp_get_current_user();
	if ( ! ( $curauth instanceof WP_User ) ) {
		return;
	} 
	/*
	* @example Safe usage: $curauth = wp_get_current_user();
	* if ( ! ( $curauth instanceof WP_User ) ) {
	*     return;
	* }
	*/
	printf( __( 'Username: %s', 'textdomain' ), esc_html( $curauth->user_login ) ) . '<br />';
	printf( __( 'User email: %s', 'textdomain' ), esc_html( $curauth->user_email ) ) . '<br />';
	printf( __( 'User first name: %s', 'textdomain' ), esc_html( $curauth->user_firstname ) ) . '<br />';
	printf( __( 'User last name: %s', 'textdomain' ), esc_html( $curauth->user_lastname ) ) . '<br />';
	printf( __( 'User display name: %s', 'textdomain' ), esc_html( $curauth->display_name ) ) . '<br />';
	printf( __( 'User ID: %s', 'textdomain' ), esc_html( $curauth->ID ) );
	?>

    	<h3><?= esc_html($curauth->display_name) ?></h3>
		<?= get_avatar( $curauth->user_email, $size = 90 );?>
		<h4><?= __('Level') ?> : 10</h4>
		<h4><?= __('Experience') ?> : 100 xp</h4>
		<p><?= __('Votre site internet') ?> : <a href="<?= esc_html($curauth->user_url) ?>"><?= esc_html($curauth->user_url) ?></a></p>
		<p><?= __('Inscrit depuis le') ?> <?= esc_html($curauth->user_registered) ?></p>
	
	
			<?php
			settings_fields(self::PLAY);
			do_settings_sections(self::class);

			?>
			<br>
			<hr>
			<div><img src="<?php get_post('thumbnail') ?>" alt="<?php get_post('alt') ?>"><?php get_post('name') ?><br>
			<button type="button"><a href="#">Voir la page du jeu</a></button>
			<button type="button"><a href="#">Voir les trophées</a></button></div>
		<?php
		
	} 

	public static function registerSettings () {
		register_setting(self::PLAY, 'statut');
		register_setting(self::PLAY, 'message-statut');

		/* Menu jouer */
		add_settings_section('section', 'Jouer', function() {
			echo _e('Choisir un jeu pour commencer');
		}, self::class);

		/* Menu Statut section */
		add_settings_section('section', __('Votre statut'), function() {
			echo _e('Ici, vous pouvez gérer les paramètres liés à votre statut');
		}, self::PLAY);
		add_settings_field('statut', __('Choisir un statut'), function() {
			?>
			<!-- Statut de l'utilisateur -->
		<select name="statut" id="statut-select">
			<option value="">-- <?php _e('Veuillez choisir un statut') ?> --</option>
			<option value="<?php _e('En cours de développement') ?>"><?php _e('En cours de développement') ?></option>
			<option value="<?php _e('En ligne') ?>"><?php _e('En ligne') ?></option>
			<option value="<?php _e('Ne pas déranger') ?>"><?php _e('Ne pas déranger') ?></option>
		</select>

			<?php
		}, self::PLAY, 'section');
		add_settings_field('message-statut', "Message", function() {
			?>
			<!-- message statut de l'utilisateur -->
			<textarea name="message-statut" rows="2" style="width: 100%"><?= esc_html(get_option('message-statut')) ?></textarea>
			<?php
		}, self::PLAY, 'section');
		
	}

	public static function renderOptions () {
	?>
		<!-- /* Menu statut RENDU */ -->
		<h1><?php _e('Configurer votre statut') ?></h1>
		<dd><h3><?php _e('Statut actuel') ?> : <?= get_option('statut'); ?></h3></dd>
		<dd><?= get_option('message-statut'); ?></dd>
		<p><a href="#"><?php _e('signalez un problème') ?></a></p>
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

