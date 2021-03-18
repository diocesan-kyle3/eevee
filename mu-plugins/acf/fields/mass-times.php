<?php acf_add_local_field_group(array(
	'key' => 'group_5fda7dab941c5',
	'title' => 'Mass Times',
	'fields' => array(
		array(
			'key' => 'field_5fda7dc7ae143',
			'label' => 'Mass Times',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Mass Times will show using this template (Mass Times). Mass Times can be edited in <strong><a href="/wp-admin/admin.php?page=theme-general-settings">Theme Settings > Mass Times &amp; Schedule</a></strong>.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/page-mass-times.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));
