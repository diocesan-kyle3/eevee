<?php
/**
 * Template part for displaying a single Staff Member.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <?php if(get_the_title() || get_field('position') || get_field('phone') || get_field('email') || get_the_post_thumbnail()) : ?>
    <div class="single-top">
      <?php if(get_the_post_thumbnail()) : ?>
        <div class="single-thumbnail"><?php the_post_thumbnail('large'); ?></div>
      <?php endif; ?>

      <?php if(get_the_title() || get_field('position') || get_field('phone') || get_field('email')) : ?>
        <div class="single-info">
          <?php if(get_the_title()) : ?>
            <h1 class="single-title has-primary-color"><?php the_title(); ?></h1>
          <?php endif; ?>

          <?php if(get_field('position')) : ?>
            <h2 class="staff-position has-secondary-color"><?php the_field('position'); ?></h2>
          <?php endif; ?>

          <?php if(get_field('phone')) : ?>
            <h4 class="staff-phone">
              <a href="<?= phone_link(get_field('phone')); ?>" class="staff-phone-link has-secondary-color has-primary-color-hover" target="_blank" title="Call <?= get_the_title() ? get_the_title() : 'Me'; ?>">
                <?php the_field('phone'); ?>
              </a>
            </h4>
          <?php endif; ?>

          <?php if(get_field('email')) : ?>
            <h4 class="staff-email">
              <a href="mailto:<?php the_field('email'); ?>" class="staff-email-link has-secondary-color has-primary-color-hover" target="_blank" title="Email <?= get_the_title() ? get_the_title() : 'Me'; ?>">
                <?php the_field('email'); ?>
              </a>
            </h4>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

	<div class="single-content">
		<?php the_content();

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eevee' ),
			'after'  => '</div>',
		)); ?>

    <a href="<?= get_post_type_archive_link(get_post_type()); ?>" class="the-button has-primary-background-color has-secondary-background-color-hover has-white-color" title="View All <?= get_post_type_object(get_post_type())->label; ?>">View All <?= get_post_type_object(get_post_type())->label; ?></a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
