<?php
/**
 * Template part for displaying the content in page-mass-times.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */
?>

<div class="entry-content limit-width">
  <?= if_the_content(); ?>
  
  <?php get_template_part( 'template-parts/components/mass-times' ); ?>
</div>
