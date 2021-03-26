<?php
/**
 * The template that displays all of the <head> section and everything up until <div id="content">.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eevee
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://gmpg.org/xfn/11" rel="profile">
	<meta property="og:locale" content="en_US" />
	<meta property="og:site_name" content="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>" />
	<meta property="og:url" content="<?= esc_url( get_permalink() ); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?= wp_strip_all_tags( get_the_title() ); ?>" />
	<meta property="og:description" content="<?= wp_strip_all_tags( get_the_excerpt() ); ?>" />
	<meta property="og:image:secure_url" content="<?= get_the_post_thumbnail_url(); ?>" />
	<meta property="og:image" content="<?= str_replace( 'https://', 'http://', get_the_post_thumbnail_url() ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="site" id="page">
	<a href="#content" class="skip-link screen-reader-text"><?php esc_html_e( 'Skip to content', 'eevee' ); ?></a>

	<header class="site-header" id="masthead">
		<div class="the-header">
		  <?php get_template_part('template-parts/headers/bar', 'top'); ?>
		  <?php get_template_part('template-parts/headers/bar', 'bottom'); ?>
		</div>
	</header>

	<div class="site-content" id="content">
