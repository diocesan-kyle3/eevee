<?php
/**
 * Partial for the hero section: Video
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php if(have_rows('slider_video')) : ?>
  <div class="hero has-video has-quaternary-background-color-after">
    <div class="hero-overlay limit-width" style="opacity: <?= get_field('hero_overlay') ? get_field('hero_overlay') : 0; ?>;"></div>
    <?php while(have_rows('slider_video')) : the_row(); ?>
      <video class="hero-video limit-width" loop muted autoplay poster="<?= get_sub_field('image') ? get_sub_field('image')['url'] ? get_sub_field('image')['url'] : '' : ''; ?>" id="home-video">
        <?php if(get_sub_field('webm')) : ?>
          <source src="<?= get_sub_field('webm')['url'] ? get_sub_field('webm')['url'] : ''; ?>" type="video/webm">
          <?php endif;
        if(get_sub_field('mp4')) : ?>
        <source src="<?= get_sub_field('mp4')['url'] ? get_sub_field('mp4')['url'] : ''; ?>" type="video/mp4">
        <?php endif;
        if(get_sub_field('ogg')) : ?>
        <source src="<?= get_sub_field('ogg')['url'] ? get_sub_field('ogg')['url'] : ''; ?>" type="video/ogg">
        <?php endif; ?>
        There was an error playing this video.
      </video>

      <?php get_template_part( 'template-parts/components/hero/info' ); ?>
    <?php endwhile; ?>
  </div>

<?php else : ?>
  <p>There was an error playing this video.</p>

<?php endif;
