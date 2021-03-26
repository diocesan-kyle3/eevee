<?php
/**
 * Partial for the Homepage template's Featured Buttons.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php if(have_rows('featured_buttons')) : ?>
  <div class="<?= get_field('has_text_overlay') ? 'featured-buttons-complex' : 'featured-buttons-simple'; ?> featured-buttons limit-width" data-btns="<?= count(get_field('featured_buttons')); ?>">
    <?php if(get_field('has_text_overlay')) : // Complex
      $i = 0;
      while(have_rows('featured_buttons')) : the_row();
        if(get_sub_field('link')) :
          $link = get_sub_field('link');
          $img  = get_sub_field('image') ? get_sub_field('image') : get_field('default_featured_image', 'options'); ?>
          <a href="<?= $link['url'] ? $link['url'] : ''; ?>" class="featured-button <?= $i % 2 === 0 ? 'has-secondary-background-color-after': 'has-primary-background-color-after'; ?>" target="<?= $link['target'] ? $link['target'] : ''; ?>" title="<?= $link['title'] ? $link['title'] : ''; ?>" style="background-image: url(<?= $img['sizes']['medium'] ? $img['sizes']['medium'] : ''; ?>);">
            <div class="featured-button-textbox">
              <h3 class="featured-button-title has-white-color font-header all-caps"><?= $link['title'] ? $link['title'] : ''; ?></h3>
              <p class="featured-button-text has-white-color font-main"><?= get_sub_field('text'); ?></p>
            </div>
          </a>
        <?php endif;
        $i++;
      endwhile; ?>

    <?php else : // Simple
      while(have_rows('featured_buttons')) : the_row();
        if(get_sub_field('link')) :
          $link = get_sub_field('link');
          $img  = get_sub_field('image') ? get_sub_field('image') : get_field('default_featured_image', 'options'); ?>
          <a href="<?= $link['url'] ? $link['url'] : ''; ?>" class="featured-button has-secondary-color-hover" target="<?= $link['target'] ? $link['target'] : ''; ?>" title="<?= $link['title'] ? $link['title'] : ''; ?>">
            <div class="featured-button-image" style="background-image: url(<?= $img['sizes']['medium'] ? $img['sizes']['medium'] : ''; ?>)"></div>
            <div class="featured-button-textbox">
              <h3 class="featured-button-title font-header"><?= $link['title'] ? $link['title'] : ''; ?></h3>
            </div>
          </a>
        <?php endif;
      endwhile;
    endif; ?>
  </div>
<?php endif;
