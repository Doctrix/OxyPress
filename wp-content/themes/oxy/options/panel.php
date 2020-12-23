<?php
add_action('admin_menu','panel');

function panel(){
    add_menu_page('Réseau','Réseau','activate_plugins','panel','render_panel',null,84);
}

function render_panel(){
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
                            <td>
                                <label for="twitter">Twitter</label>
                            </td>
                            <td>
                                <input type="text" id="twitter" name="twitter" value="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <?php
}