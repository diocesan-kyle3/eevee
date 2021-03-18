<?php
/**
 * PHP functions for the child theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dpiChild
 */

if( ! function_exists( 'diocesan_child_styles' ) ) {
  function diocesan_child_styles() {
  	wp_enqueue_style( 'custom-styles', get_stylesheet_directory_uri() . '/custom.css' );
  }
  add_action( 'wp_enqueue_scripts', 'diocesan_child_styles', 15 );
}

if( function_exists( 'get_field' ) && ! function_exists( 'colors_setup' ) ) {
  function colors_setup() {
  	// Disable Custom Colors
  	// add_theme_support( 'disable-custom-colors' );

  	// Editor Color Palette
    $colors = array(
      'Primary'    => get_field('primary_color', 'options'),
      'Secondary'  => get_field('secondary_color', 'options'),
      'Tertiary'   => get_field('tertiary_color', 'options'),
      'Quaternary' => get_field('quaternary_color', 'options'),
      'Black'      => '#0F0F0F',
      'White'      => '#FFFFFF'
    );

    foreach ($colors as $color => $rgb) {
      $palette[]= array(
        'name'	=> __($color, 'dpiChild'),
        'slug'	=> strtolower($color),
        'color'	=> $rgb
      );
    }

    add_theme_support( 'editor-color-palette', $palette );
  }
  add_action( 'after_setup_theme', 'colors_setup' );
}

if( ! function_exists( 'generate_custom_css' ) ) {
  function generate_custom_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start(); // Capture all output into buffer
    require "$ss_dir/custom.php"; // Grab the custom.php file
    $css = ob_get_clean(); // Store output in a variable, then flush the buffer
    file_put_contents("$ss_dir/custom.css", $css, LOCK_EX); // Save it as a css file
  }
  add_action( 'after_setup_theme', 'generate_custom_css', 10 ); //Parse the output and write the CSS file after the theme's setup
  add_action( 'acf/save_post', 'generate_custom_css', 20 ); //Parse the output and write the CSS file on post save
}

if( ! function_exists( 'generate_editor_css' ) ) {
  function generate_editor_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start(); // Capture all output into buffer
    require "$ss_dir/editor.php"; // Grab the editor.php file
    $css = ob_get_clean(); // Store output in a variable, then flush the buffer
    file_put_contents("$ss_dir/editor.css", $css, LOCK_EX); // Save it as a css file
  }
  add_action( 'after_setup_theme', 'generate_editor_css', 25 ); //Parse the output and write the CSS file after the theme's setup
  add_action( 'acf/save_post', 'generate_editor_css', 25 ); //Parse the output and write the CSS file on post save
}

if( ! function_exists( 'add_editor_styles_custom' ) ) {
  function add_editor_styles_custom() {
    add_theme_support( 'editor-styles');
    add_editor_style( 'editor.css' );
  }
  add_action( 'after_setup_theme', 'add_editor_styles_custom', 30 );
}

if( ! function_exists( 'remove_page_template' ) ) {
  function remove_page_template( $page_templates ) {
    $excludes = array(
      ! get_field('news_template', 'options')['has_news'] ? 'page-news.php' : '',
    );

    foreach ($excludes as $exclude) {
      unset( $page_templates[ $exclude ] );
    }

    return $page_templates;
  }
  add_filter( 'theme_page_templates', 'remove_page_template' );
}

require_once 'blocks/index.php';
