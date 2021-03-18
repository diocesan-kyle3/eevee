<?php
/**
 * The following registers custom ACF Block: Contact.
 *
 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
 *
 * @package dpiChild
 */

acf_register_block(array(
  'name'            => 'contact',
  'title'           => __('Contact', 'dpiChild'),
  'description'     => __('Custom Contact Block.', 'dpiChild'),
  'render_callback'	=> 'acf_block_render_callback',
  'category'        => 'layout',
  'icon'            => 'admin-users',
  'keywords'        => array( 'contact', 'employee', 'clergy', 'staff' ),
));
