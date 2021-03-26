<?php
/**
 * Template Name: Homepage
 *
 * The template for displaying the Homepage Template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

get_header();
?>

<div class="content-area" id="primary">
	<main class="site-main" id="main">
		<?php $hero = get_field('is_video') ? 'video' : 'image'; ?>
    <?php get_template_part( "template-parts/components/hero/$hero" ); ?>
    <?php get_template_part( 'templates/content/homepage/featured-buttons' ); ?>
    <?php get_template_part( 'templates/content/homepage/banner' ); ?>
    <?php get_template_part( 'templates/content/homepage/prayer-requests' ); ?>
    <?php get_template_part( 'templates/content/homepage/news' ); ?>
    <?php get_template_part( 'templates/content/homepage/welcome' ); ?>
	</main>
</div>

<?php get_footer();
