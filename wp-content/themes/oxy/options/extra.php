<?php 
class MenuProfilPage { 

	const PLAY = 'play';

 	public static function register () {
		add_action('admin_menu', [self::class, 'play_menu_page']);
		add_action('admin_menu', [self::class, 'addSubMenu']);
		add_action('admin_init', [self::class, 'registerSettings']);
	}	
	
	public static function play_menu_page() {
		// add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		add_menu_page( 'Votre profil', 'Profil', 'manage_options', self::PLAY, [self::class, 'render'], 'dashicons-welcome-widgets-menus', 7 );
	}

	public static function addSubMenu () {
		add_submenu_page('play', 'Vos Options', 'Options', 'manage_options',  'play_options', [self::class, 'renderOptions']);
	}

	
	public static function render () {
	global $wpdb;
	global $current_user;
	
	$current_user = wp_get_current_user();

	// Interrogation de la base de données
	$resultats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}commissions");
	// Parcours des resultats obtenus
	foreach ($resultats as $gain) {
		$OxyCoin = $gain->amount;
	}
		
	$nom_aff = $current_user->display_name;
	$email = $current_user->user_email;
	$url = $current_user->user_url;
	$date = $current_user->user_registered;
	$id_user = $current_user->ID;
	$exp = add_points('Points');
	
/* 		if(isset($_POST['nom'], $_POST['exp'])){
			$exp = $wpdb->prepare('INSERT INTO PROFIL (user_id, exp, niveau, derniere_connexion) VALUES (:user_id, :exp, :niveau, :derniere_connexion)');
			$exp->execute([
				'nom' => $_POST['nom'],
				'exp' => $_POST['exp'],
				'derniere_connexion' => time()
			]);
		} */



/**
 * Nom d'affichage de l'utilisateur
 */
	echo '<h2>Hello, ' . esc_html($nom_aff). '</h2>';

/**
 * Avatar de l'utilisateur
 */	
	echo get_avatar($email, $size = 90). '<br/>';

/**
 * Monnaie de l'utilisateur
 */	
	echo "$OxyCoin Oxy\n";

/**
 * Points XP de l'utilisateur
 */			
	echo $exp . ' ' . 'XP' . '<br/>';
var_dump($exp);
/**
 * Site internet de l'utilisateur
 */
	echo __('Votre site internet') . ' : ' . '<a href="' . esc_html($url) . '">' . esc_html($url) . '</a>' . '<br/>';

/**
 * Date d'inscription de l'utilisateur
 */
	echo __('Inscrit depuis le ')  . esc_html($date) ;

/**
 * Interface jouer
 */
	settings_fields(self::PLAY);
	do_settings_sections(self::class);
	function open_page_game() {
		$html = '<input type="submit" value="Voir la page du jeu">';
		return $html;
	}
	echo open_page_game()  . '<hr>';
	function open_page_trophee() {
		$html = '<input type="submit" value="Voir les trophées">';
		return $html;
	}
	echo open_page_trophee() . '<hr>';
	media_buttons();			
	?>
	<?php
	} 

	public static function registerSettings () {
		register_setting(self::PLAY, 'statut');
		register_setting(self::PLAY, 'message-statut');

		/* Menu jouer */
		add_settings_section('section', 'Jouer', function() {
			echo _e('Choisir un jeu pour commencer<br/>');
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

class MenuAideSupportPage {

	const GROUP = 'aide';

	public static function register () {
		add_action('admin_menu', [self::class, 'addMenu']);
		add_action('admin_init', [self::class, 'registerSettings']);
		add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
	}

	public static function registerScripts () {

	}

	public static function registerSettings () {
		
	}

	public static function addMenu () {
		add_menu_page("Informations complémentaire", "Aide?", "manage_options", self::GROUP, [self::class, 'render'],'',9);
	}

	public static function render () {
		?>
		<h1>Infos Contact</h1>

		<p>Votre adresse web: <a href="<?= get_option('siteurl') ?>">En savoir plus</a></p>
		<p>Email administrateur: <?= get_option('admin_email') ?></p>
		<p>Role par d&eacute;faut: <?= get_option('default_role') ?></p>
		<form action="options.php" method="post">
			<?php
			settings_fields(self::GROUP);
			do_settings_sections(self::GROUP);
			
			?>
			</form>
		<?php
	}
}

class MenuOptionsPage {

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
		add_settings_section('extra_options_section', 'Projets mis en avant', function() {
			echo "Vous pouvez ici g&eacute;rer les param&egrave;tres";

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
		add_menu_page("Options", "Options", "manage_options", self::GROUP, [self::class, 'render'],'',101);
	}

	public static function render () {
		?>
		<h1>Options du site</h1>

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