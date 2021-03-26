<?php
/**
 * The template for displaying a single post in archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<div class="<?= get_post_type(); ?>-single">
  <?php if(get_the_title()) : ?>
  	<h3 class="<?= get_post_type(); ?>-title">
  		<a href="<?= get_the_permalink(); ?>" class="<?= get_post_type(); ?>-title-link has-secondary-color has-primary-color-hover" title="<?php the_title(); ?>"><?php the_title(); ?></a>
  	</h3>
  <?php endif; ?>

  <?php if(get_the_excerpt()) : ?>
  	<div class="<?= get_post_type(); ?>-excerpt has-primary-color"><?php the_excerpt(); ?></div>
  <?php endif; ?>
</div>
