<?php
class ExtraMenuPage {

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
		add_settings_section('extra_options_section', 'Paramètres', function() {
			echo "Vous pouvez ici g&eacute;rer les param&egrave;tres li&eacute;s à vos options";

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
		add_options_page("Options suppl&eacute;mentaire", "Options", "manage_options", self::GROUP, [self::class, 'render']);
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