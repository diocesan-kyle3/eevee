<?php
/**
 * Template part for displaying the content in ministry-groups.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */
?>

<div class="entry-content limit-width max-width">
  <?= if_the_content(); ?>

  <?php $tax = 'ministry-group'; ?>

  <?php $terms = get_terms( array(
    'taxonomy'   => $tax,
    'hide_empty' => false
  ) ); ?>

  <?php if($terms) : // has ministry-group posts ?>
    <div class="ministry-groups">
      <?php foreach ($terms as $term) :
        get_template_part( "template-parts/components/$tax", null, array(
          'bkgd'    => ministry_taxonomy_image($term),
          'content' => $term->description,
          'title'   => $term->name,
          'url'     => get_site_url() . "/$tax/" . $term->slug . "/"
        )); ?>
      <?php endforeach; ?>
    </div>

    <div class="view-all">
      <p>Click to view all our Ministries</p>
      <a href="<?= site_url(); ?>/ministries/" class="the-button has-quaternary-background-color has-primary-background-color-hover has-tertiary-color has-white-color-hover font-header" title="All Ministries">View All</a>
    </div>
  <?php endif; ?>
</div>
