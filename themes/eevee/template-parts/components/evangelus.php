<?php
/**
 * Partial for the Evangelus component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php while(have_rows('evangelus_group', 'options')) : the_row();
  if(get_sub_field('has_evangelus')) :
    if(get_sub_field('evangelus', 'options')) : $eva = get_sub_field('evangelus', 'options'); ?>
      <a href="<?= $eva['url'] ? $eva['url'] : 'https://diocesan.com/evangelus/'; ?>" class="social-media-link has-white-color has-secondary-color-hover" target="<?= $eva['target'] ? $eva['target'] : ''; ?>" title="<?= $eva['title'] ? $eva['title'] : 'Evangelus'; ?>">
        <i class="dpi-eva"></i>
      </a>
    <?php else : ?>
      <a href="https://diocesan.com/evangelus/" class="social-media-link has-white-color has-secondary-color-hover" target="_blank" title="Evangelus">
        <i class="dpi-eva"></i>
      </a>
    <?php endif;
  endif;
endwhile;
