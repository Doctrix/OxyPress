<?php
add_action('admin_menu','panel');

function panel(){
    add_menu_page('Réseau','Réseau','activate_plugins','panel','render_panel',null,84);
}

function render_panel(){
    
}