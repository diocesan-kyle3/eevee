<?php
/**
 * Partial for the Homepage Banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php $color = 'has-' . get_field('banner_color') . '-color'; ?>

<div class="banner-container has-secondary-background-color-after" style="background-image: url(<?= get_field('banner_background')['url'] ? get_field('banner_background')['url'] : get_template_directory_uri() . '/assets/img/background-texture.jpg'; ?>)">
  <div class="<?= get_field('banner_selector'); ?> banner <?= $color; ?> limit-width">
    <?php if(get_field('banner_title')) : ?>
      <h1 class="banner-title page-header-title <?= $color; ?> font-header all-caps"><?= get_field('banner_title'); ?></h1>
    <?php endif; ?>

    <?php get_template_part( 'templates/content/homepage/banner', get_field('banner_selector'), array('color'=>$color) ); ?>
  </div>
  <?php if(have_rows('links')) : ?>
    <div class="links-container limit-width">
      <?php while(have_rows('links')) : the_row();
        echo acf_link(get_sub_field('link'), 'the-button has-quaternary-background-color has-tertiary-border-color has-tertiary-color has-primary-background-color-hover has-primary-border-color-hover has-white-color-hover font-header');
      endwhile; ?>
    </div>
  <?php endif; ?>
</div>
