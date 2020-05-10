<?php
/**
* Plugin Name: Oxy ACF
*/

defined('ABSPATH') or die('oups il y a rien à voir');

register_activation_hook(__FILE__, function() {
	touch(__DIR__ . '/oxy-acf');
});

register_deactivation_hook(__FILE__, function() {
	unlink(__DIR__ . '/oxy-acf');
});


/**
 * On ajoute un onglet "Parrainage" dans le back-office d'un produit WooCommerce
 */
function oxy_add_commission_field_groups($tabs) {
	global $post;
	$commission_user_id = get_post_meta($post->ID, 'commission_user_id', true);  
// On affiche sous le champ le login et l'e-mail de l'utilisateur relié à l'ID défini dans le champ ci-dessus
	/* if (isset($commission_user_id) && $commission_user_id != '') {
			$commission_user_data = get_userdata((int)$commission_user_id);  				
	}   */			
		if (isset($commission_user_id) && $commission_user_id != '') {
		$commission_user_data = get_userdata((int)$commission_user_id); 
	} 				
	else
		if( function_exists('acf_add_local_field_group') ):
			
			acf_add_local_field_group(array(
				'key' => 'group_5eb787bd06c2f',
				'title' => __('Données du jeu', 'oxy'),
				'fields' => array(
					array(
						'key' => 'field_5eb787c5f4bde',
						'label' => __('Parrainage', 'oxy'),
						'name' => '',
						'type' => 'tab',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'target' => 'commission_game_data',
							'class' => array(),
							'id' => '',
						),
						'placement' => 'left',
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5eb78ebd22e6d',
						'label' => __('Parrainage et commission', 'oxy'),
						'name' => '',
						'type' => 'message',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'panel',
							'id' => 'commission_game_data',
						),
						'message' => 'Gagné des points avec votre parrain',
						'new_lines' => 'br',
						'esc_html' => 0,
					),
					array(
						'key' => 'field_5eb787d9f4bdf',
						'label' =>  __('Identifiant utilisateur', 'oxy'),
						'name' => 'identifiant_utilisateur',
						'type' => 'user',
						'instructions' => '<br/><p style="padding-left:12px;font-style:italic;margin-top: -14px;">' . __('Cet identifiant correspond à l\'utilisateur %1$s ayant l\'e-mail %2$s.', 'oxy') . '</p>' . '<strong>' . $commission_user_data->user_login . '</strong>' . '<strong>' . $commission_user_data->user_email . '</strong>',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => 'commission_user_id',
						),
						'placeholder' => __('Sélectionnez l\'ID du parrain', 'oxy'),
						'role' => '',
						'allow_null' => 0,
						'multiple' => 0,
						'return_format' => 'id',
					),
					array(
						'key' => 'field_5eb788b7f4be0',
						'label' =>  __('Commission (en %)', 'oxy'),
						'name' => 'commission',
						'type' => 'number',
						'instructions' => __('Informez le pourcentage de commission qui sera calculé à partir du montant HT d\'une commande et reversé au parrain.', 'oxy'),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'wc_input_price',
							'id' => 'commission_rate',
						),
						'default_value' => '',
						'placeholder' => __('5', 'oxy'),
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array(
						'key' => 'field_5eb789f8f4be1',
						'label' => __('Début de récompense', 'oxy'),
						'name' => 'debut_de_recompense',
						'type' => 'date_picker',
						'instructions' => __('Indiquez ici la date de DÉBUT de période à partir de laquelle une commission sera reversée à l\'utilisateur parrain.', 'oxy'),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'short input-date',
							'id' => 'commission_date_start',
						),
						'placeholder' => __('01/06/2020', 'oxy'),
						'display_format' => 'd/m/Y',
						'return_format' => 'd/m/Y',
						'first_day' => 1,
					),
					array(
						'key' => 'field_5eb78a76f4be2',
						'label' => __('Fin de récompense', 'oxy'),
						'name' => 'fin_de_recompense',
						'type' => 'date_picker',
						'instructions' => __('Indiquez ici la date de FIN de période à partir de laquelle le parrainage ne sera plus effectif.', 'oxy'),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'short input-date',
							'id' => 'commission_date_end',
						),
						'placeholder' => __('31/12/2020', 'oxy'),
						'display_format' => 'd/m/Y',
						'return_format' => 'd/m/Y',
						'first_day' => 1,
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'boutique',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));
			endif;		
}
add_action('acf/init', 'oxy_add_commission_field_groups');


