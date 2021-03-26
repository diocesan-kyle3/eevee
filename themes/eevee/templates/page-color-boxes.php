<?php
/**
 * Template Name: Color Boxes
 *
 * The template for displaying the Color Boxes Template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

get_header();
?>

<?php get_template_part( 'template-parts/headers/page-header' ); ?>

<div class="content-area" id="primary">
	<main class="site-main" id="main">
		<?php get_template_part( 'templates/content/color-boxes' ); ?>
	</main>
</div>

<?php get_footer();
