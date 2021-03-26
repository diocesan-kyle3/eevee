<?php
/**
 * Partial for the hero section: Info
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php if(get_sub_field('slide_title') || get_sub_field('slide_button')) : ?>
  <div class="hero-info has-white-color">
    <?php if(get_sub_field('slide_title')) : ?>
      <h1 class="hero-title has-white-color font-header"><?= get_sub_field('slide_title')?></h1>
    <?php endif; ?>

    <?php if(get_sub_field('slide_button')) :
      echo acf_link(get_sub_field('slide_button'), 'the-button has-quaternary-background-color has-primary-background-color-hover has-primary-border-color-hover has-white-color-hover font-header');
    endif; ?>
  </div>
<?php endif;
