<?php
/**
 * Partial for each News post for the Homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php $id = $args['id'] ? $args['id'] : 0; ?>

<div class="news-single">
  <a href="<?php the_permalink($id); ?>" class="news-image-link" title="<?= get_the_title($id); ?>">
    <img src="<?= has_post_thumbnail($id) ? get_the_post_thumbnail_url($id) : get_field('default_featured_image', 'options')['url']; ?>" class="news-image" alt="<?= get_the_title($id); ?>" />
  </a>
  <h5 class="news-single-title">
    <a href="<?php the_permalink($id); ?>" class="news-single-title-link has-tertiary-color has-secondary-color-hover font-header" title="<?= get_the_title($id); ?>"><?= get_the_title($id); ?></a>
  </h5>
</div>
