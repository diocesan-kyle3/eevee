<?php
/**
 * Partial for the Homepage's News section if a Featured Post is selected.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<div class="the-news has-featured">
  <?php $fid = get_field('featured_post')->ID; ?>
  <div class="featured-news">
    <?php get_template_part( 'template-parts/components/news', 'single' array('id'=>$fid) ); ?>
  </div>

  <div class="news">
    <?php $q = new WP_Query(array(
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'cat'            => get_field('news_category')->term_id,
      'posts_per_page' => 4,
      'post__not_in'   => array($fid),
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
</div>

<?php wp_reset_postdata(); ?>
