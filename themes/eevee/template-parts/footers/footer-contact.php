<?php
/**
 * Partial for contact information in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<h1 class="footer-heading has-white-color font-header">Find Us</h1>
<?php if(get_field('address', 'options')) : ?>
  <span class="footer-link-holder">
    <?= acf_link(get_field('address', 'options'), 'footer-link has-white-color has-secondary-color-hover', get_field('address_format', 'options') ? get_field('address_format', 'options') : get_field('address', 'options')['title'] ); ?>
  </span>
<?php endif; ?>

<?php if(get_field('phone', 'options')) : ?>
  <span class="footer-link-holder">
    <a href="<?= phone_link(get_field('phone', 'options')); ?>" class="footer-link has-white-color has-secondary-color-hover" title="Call Us"><?= get_field('phone', 'options'); ?></a>
  </span>
<?php endif; ?>

<?php if(get_field('footer_button', 'options')) : ?>
  <span class="footer-link-holder">
    <?= acf_link(get_field('footer_button', 'options'), 'footer-link has-white-color has-primary-background-color has-secondary-background-color-hover has-white-color-hover the-button'); ?>
  </span>
<?php endif; ?>

<?php get_template_part('template-parts/components/translate');
