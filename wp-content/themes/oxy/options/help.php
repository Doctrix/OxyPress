<?php
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
    add_menu_page("Informations complémentaire", "Aide?", "manage_options", self::GROUP, [self::class, 'render'],'',83);
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
?>