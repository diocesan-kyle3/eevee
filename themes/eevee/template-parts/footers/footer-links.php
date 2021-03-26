<?php
/**
 * Partial for quick links in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<h1 class="footer-heading has-white-color font-header">Quick Links</h1>
<?php if(have_rows('quick_links', 'options')) : ?>
  <div class="footer-links-container">
    <?php while(have_rows('quick_links', 'options')) : the_row(); $link = get_sub_field('link'); ?>
      <span class="footer-link-holder has-white-color-before">
        <?= acf_link(get_sub_field('link'), 'footer-link has-white-color has-secondary-color-hover'); ?>
      </span>
    <?php endwhile; ?>
  </div>
<?php endif;
