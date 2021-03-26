<?php
/**
 * Partial for the Homepage Banner section: Mass Times.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php $color = $args['color']; ?>

<?php if(have_rows('schedule', 'options')) :
  while(have_rows('schedule', 'options')) : the_row();
    if(get_sub_field('show')) : ?>
      <div class="mass-times-section has-white-background-color">
        <h1 class="mass-times-title <?= $color; ?>"><?= get_sub_field('section_title'); ?></h1>
        <?php while(have_rows('times')) : the_row();
          if(get_sub_field('show')) : ?>
            <div class="mass-time has-tertiary-border-color">
              <h5 class="mass-time-label <?= $color; ?>"><?= get_sub_field('label'); ?></h5>
              <p class="mass-time-detail <?= $color; ?>"><?= get_sub_field('detail'); ?></p>
            </div>
          <?php endif;
        endwhile; ?>
      </div>
    <?php endif;
  endwhile; ?>

<?php else : ?>
  <h3 class="no-masses">There are no masses scheduled at this time.</h3>

<?php endif;
