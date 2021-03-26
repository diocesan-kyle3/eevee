<?php
/**
 * Partial for the hero section: Image(s).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php if(have_rows('slider_image')) : ?>
  <div class="hero has-quaternary-background-color-after">
    <div class="hero-slider limit-width">
      <?php while(have_rows('slider_image')) : the_row(); ?>
        <div class="hero-slide" style="background-image: url(<?= get_sub_field('slide_image')['url'] ? get_sub_field('slide_image')['url'] : get_field('default_featured_image', 'options')['url']; ?>);">
          <div class="hero-overlay" style="opacity: <?= get_field('hero_overlay') ? get_field('hero_overlay') : 0; ?>;"></div>
          <?php get_template_part( 'template-parts/components/hero/info' ); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif;
