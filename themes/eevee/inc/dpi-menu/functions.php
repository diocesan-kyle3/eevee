<?php
/**
 * Functions for ACF Mega Menu.
 *
 * @package eevee
 */

require_once "acf-menu.php";
require_once "walker.php";

function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/inc/dpi-menu/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');
