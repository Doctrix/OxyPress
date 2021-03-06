<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5eafbe66cb9a3',
	'title' => 'Information du produit',
	'fields' => array(
		array(
			'key' => 'field_5eb0dd7c3848f',
			'label' => 'Informations',
			'name' => 'infos',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 1,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5eb0deca8246b',
					'label' => 'Catégories',
					'name' => 'categories',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'category',
					'field_type' => 'select',
					'allow_null' => 0,
					'add_term' => 0,
					'save_terms' => 1,
					'load_terms' => 1,
					'return_format' => 'id',
					'multiple' => 0,
				),
				array(
					'key' => 'field_5eb0d0791757e',
					'label' => 'Genre',
					'name' => 'genre',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'genre',
					'field_type' => 'multi_select',
					'allow_null' => 0,
					'add_term' => 0,
					'save_terms' => 1,
					'load_terms' => 1,
					'return_format' => 'id',
					'multiple' => 0,
				),
				array(
					'key' => 'field_5eb0cb68021c8',
					'label' => 'Statut',
					'name' => 'statut',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'statut',
					'field_type' => 'select',
					'allow_null' => 0,
					'add_term' => 0,
					'save_terms' => 1,
					'load_terms' => 1,
					'return_format' => 'id',
					'multiple' => 0,
				),
				array(
					'key' => 'field_5eb0d09d1757f',
					'label' => 'Système d\'exploitation',
					'name' => 'systeme_dexploitation',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'systeme',
					'field_type' => 'checkbox',
					'add_term' => 0,
					'save_terms' => 1,
					'load_terms' => 1,
					'return_format' => 'id',
					'multiple' => 0,
					'allow_null' => 0,
				),
				array(
					'key' => 'field_5eb0d12817580',
					'label' => 'Système d\'évaluation',
					'name' => 'systeme_devaluation',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'pegi',
					'field_type' => 'select',
					'allow_null' => 0,
					'add_term' => 0,
					'save_terms' => 1,
					'load_terms' => 1,
					'return_format' => 'id',
					'multiple' => 0,
				),
				array(
					'key' => 'field_5eb0ea70cebe5',
					'label' => 'Prix',
					'name' => 'prix',
					'type' => 'taxonomy',
					'instructions' => 'Veuillez cocher la case "Payant" si vous vendez votre produit!',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => 'prix',
					'field_type' => 'select',
					'allow_null' => 0,
					'add_term' => 0,
					'save_terms' => 1,
					'load_terms' => 1,
					'return_format' => 'id',
					'multiple' => 0,
				),
			),
		),
		array(
			'key' => 'field_5eb0d5e4cc0ba',
			'label' => 'Payant',
			'name' => 'payant',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_5eb0d0231757d',
			'label' => 'Euro',
			'name' => 'euro',
			'type' => 'number',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5eb0d5e4cc0ba',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5eb0e16d8246d',
			'label' => 'Free Acces',
			'name' => 'free_acces',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5eb0d5e4cc0ba',
						'operator' => '!=',
						'value' => '1',
					),
				),
				array(
					array(
						'field' => 'field_5eb0d0231757d',
						'operator' => '==',
						'value' => '0',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'GRATUIT',
			'placeholder' => 'GRATUIT',
			'prepend' => '',
			'append' => '',
			'maxlength' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'store',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'permalink',
		1 => 'discussion',
		2 => 'comments',
		3 => 'revisions',
		4 => 'slug',
		5 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
));

endif;