<?php
/**
 * Single Mass Time section for the Mass Times component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php $label = $args['label'];
$detail = $args['detail']; ?>

<div class="mass-time">
  <h6 class="mass-time-label<?= $label ? ' ' . $label : ''; ?>"><?= get_sub_field('label'); ?></h6>
  <div class="mass-time-detail<?= $detail ? ' ' . $detail : ''; ?>"><?= str_replace(" PM", "&nbsp;PM", str_replace(" AM", "&nbsp;AM", str_replace(" (", "&nbsp;(", get_sub_field('detail')))); ?></div>
</div>
