<?php
add_action('admin_menu','panel');

function panel(){
    add_menu_page('Réseau', 'Réseau', 'activate_plugins', 'panel', 'render_panel', null, 84);
}

function render_panel(){
    if(isset($_POST['panel_update'])){
        if(!wp_verify_nonce($_POST['panel_noncename'], 'panel-key')){
            die('Token non valide');
        }
        foreach($_POST['options'] as $name => $value){
            if(empty($value)){
                delete_option($name);
            }else{
                update_option($name, $value);
            }
        }
        ?>
        <div id="message" class="update fade">
        <p>Options sauvegardées avec succes!</p>
    </div>
    <?php
    }
    ?>
    <div class="wrap theme-options-page">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>Réseaux</h2>
        <form action="" method="POST">
            <div class="theme-options-group">
                <table cellspacing="0" class="widefat options-table">
                    <thead>
                        <tr>
                            <th colspan="2">Mes réseaux</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">
                                <label for="copyright">Copyright</label>
                            </th>
                            <td>
                                <input type="text" id="copyright" name="options[copyright]" value="<?= get_option('copyright',''); ?>" size="75">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="ogs">Liens Reseau</label>
                            </th>
                            <td>
                                <input type="text" id="ogs" name="options[ogs]" value="<?= get_option('ogs',''); ?>" size="75">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="ogs-text">Nom du Reseau</label>
                            </th>
                            <td>
                                <input type="text" id="ogs-text" name="options[ogs-text]" value="<?= get_option('ogs-text',''); ?>" size="75">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="oxygames">Page important du site</label>
                            </th>
                            <td>
                                <input type="text" id="oxygames" name="options[oxygames]" value="<?= get_option('oxygames',''); ?>" size="75">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="discord">Serveur Discord</label>
                            </th>
                            <td>
                                <input type="text" id="discord" name="options[discord]" value="<?= get_option('discord',''); ?>" size="75">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="twitch">Twitch</label>
                            </th>
                            <td>
                                <input type="text" id="twitch" name="options[twitch]" value="<?= get_option('twitch',''); ?>" size="75">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="twitter">Twitter</label>
                            </th>
                            <td>
                                <input type="text" id="twitter" name="options[twitter]" value="<?= get_option('twitter',''); ?>" size="75">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="facebook">Facebook</label>
                            </th>
                            <td>
                                <input type="text" id="facebook" name="options[facebook]" value="<?= get_option('facebook',''); ?>" size="75">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="panel_noncename" value="<?= wp_create_nonce('panel-key'); ?>">
            <p class="submit">
                <input type="submit" name="panel_update" class="button-primary autowidth" value="Sauvegarder">
            </p>
        </form>
    </div>
    <?php
}