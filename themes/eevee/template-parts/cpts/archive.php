<?php
/**
 * The template for CPT Archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<div class="<?= get_post_type() === 'staff' ? 'staff-container' : str_replace(' ', '-', strtolower(get_post_type_object(get_post_type())->label)) . '-container'; ?> entry-content limit-width">
  <?php if(get_post_type() === 'staff') : ?>
    <?php $taxonomy_objects = get_object_taxonomies( get_post_type(), 'objects' );
    $staff = array();

    foreach( $taxonomy_objects as $taxonomy_slug ){
      $terms = get_terms( $taxonomy_slug->name, 'hide_empty=0' );
      if( ! empty( $terms ) ){
        foreach( $terms as $term ){
          $staff[$term->slug] = array(
            'title'   => $term->name,
            'members' => array(),
          );
        }
      }
    } ?>

    <?php $q = new WP_Query(array(
      'post_type'      => get_post_type(),
      'post_status'    => 'publish',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order name',
      'order'          => 'ASC',
    ));

    while( $q->have_posts() ) : $q->the_post();
      $slug = get_the_terms( get_the_ID(), get_post_type() . '-group' )[0]->slug;
      $staff[$slug]['members'][] = get_the_ID();
    endwhile; ?>

    <?php foreach ($staff as $slug=>$content) : ?>
      <div class="<?= get_post_type(); ?>-category" id="<?= $slug; ?>-staff">
        <h1 class="<?= get_post_type(); ?>-category-title has-primary-color"><?= $content['title']; ?></h1>
        <div class="<?= get_post_type(); ?>-category-members">
          <?php foreach($content['members'] as $post) : setup_postdata($post);
            get_template_part( 'template-parts/components/staff-member' );
          endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>

  <?php elseif(have_posts()) : ?>
    <?php $q = new WP_Query(array(
      'post_type'      => get_post_type(),
      'post_status'    => 'publish',
      'posts_per_page' => -1,
      'orderby'        => array(
        'menu_order' => 'ASC',
        'name'       => 'ASC',
      ),
    )); ?>

    <?php while( $q->have_posts() ) : $q->the_post();
      get_template_part( 'template-parts/cpts/archives/content' , get_post_type() );
    endwhile; ?>

  <?php else :
    get_template_part( 'template-parts/content', 'none' );
  endif;
  wp_reset_postdata(); ?>
</div>
