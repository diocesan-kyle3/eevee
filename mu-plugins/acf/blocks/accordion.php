<?php acf_add_local_field_group(array(
  'key' => 'group_5d09360753ea1',
  'title' => 'Accordion',
  'fields' => array(
    array(
      'key' => 'field_5d0937569af32',
      'label' => 'Accordion<span id="accordion-tip"> (Switch to Edit)</span>',
      'name' => 'accordion',
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
      'min' => 1,
      'max' => 0,
      'layout' => 'block',
      'button_label' => '',
      'sub_fields' => array(
        array(
          'key' => 'field_5d09379d26295',
          'label' => 'Accordion Row',
          'name' => '',
          'type' => 'accordion',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'open' => 1,
          'multi_expand' => 1,
          'endpoint' => 0,
        ),
        array(
          'key' => 'field_5d09361b097f9',
          'label' => 'Section Title',
          'name' => 'section_title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5d0936be097fa',
          'label' => 'Section Content',
          'name' => 'section_content',
          'type' => 'wysiwyg',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'tabs' => 'all',
          'toolbar' => 'full',
          'media_upload' => 1,
          'delay' => 0,
        ),
      ),
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'block',
        'operator' => '==',
        'value' => 'acf/accordion',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));