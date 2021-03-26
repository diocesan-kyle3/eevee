<?php
/**
 * Partial for the Homepage Banner section: Statistics.
 * Foreach Loop used because ACF was skipping the first Repeater Row.
 *
 * @link https://support.advancedcustomfields.com/forums/topic/repeater-first-row-not-showing/
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php $color = $args['color']; ?>

<?php if(have_rows('statistics')) : the_row(); ?>
  <?php $stats = get_field('statistics'); ?>
  <div class="statistics-container">
    <?php foreach ($stats as $attr => $stat) : ?>
      <div class="statistic has-white-background-color has-tertiary-border-color">
        <i class="stat-icon <?= $stat['icon']; ?> has-secondary-color"></i>
        <h1 class="stat-number <?= $color; ?>"><?= $stat['number']; ?></h1>
        <p class="stat-text <?= $color; ?>"><?= $stat['text']; ?></p>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif;
