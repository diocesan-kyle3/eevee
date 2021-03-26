<?php
/**
 * Partial for the myParish component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php while(have_rows('myParish_group', 'options')) : the_row();
  if(get_sub_field('has_myParish')) :
    if(get_sub_field('myParish')) : $mpa = get_sub_field('myParish'); ?>
      <a href="<?= $mpa['url'] ? $mpa['url'] : 'https://myparishapp.com/'; ?>" class="social-media-link has-white-color has-secondary-color-hover" target="<?= $mpa['target'] ? $mpa['target'] : ''; ?>" title="<?= $mpa['title'] ? $mpa['title'] : 'myParish'; ?>">
        <i class="dpi-mpa"></i>
      </a>
    <?php else : ?>
      <a href="https://myparishapp.com/" class="social-media-link has-white-color has-secondary-color-hover" target="_blank" title="myParish">
        <i class="dpi-mpa"></i>
      </a>
    <?php endif;
  endif;
endwhile;
