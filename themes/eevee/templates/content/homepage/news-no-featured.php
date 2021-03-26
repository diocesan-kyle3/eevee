<?php
/**
 * Partial for the Homepage's News section if no Featured Post is selected.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<div class="the-news no-featured">
  <div class="featured-news">
    <?php $q = new WP_Query(array(
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'cat'            => get_field('news_category')->term_id,
      'posts_per_page' => 1,
      'orderby' => array(
        'menu_order' => 'ASC',
        'date' => 'DESC',
        'name' => 'ASC',
      ),
    )); ?>

    <?php while($q->have_posts()) : $q->the_post();
      get_template_part( 'template-parts/components/news', 'single' );
    endwhile; ?>
  </div>

  <div class="news">
    <?php $q = new WP_Query(array(
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'cat'            => get_field('news_category')->term_id,
      'offset'         => 1,
      'posts_per_page' => 4,
      'orderby'        => array(
        'menu_order' => 'ASC',
        'name'       => 'ASC',
      ),
    )); ?>

    <?php while($q->have_posts()) : $q->the_post();
      get_template_part( 'template-parts/components/news', 'single' );
    endwhile; ?>
  </div>
</div>

<?php wp_reset_postdata(); ?>
