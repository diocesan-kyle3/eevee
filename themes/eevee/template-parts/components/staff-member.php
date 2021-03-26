<?php
/**
 * The template for displaying a single Staff Member.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<div class="staff-single has-quaternary-border-color">
	<img src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/assets/img/person.jpg'; ?>" class="staff-image" alt="staff-image" />
	<div class="staff-content single-content">
		<?php if(get_the_title()) : ?>
			<h2 class="staff-name has-primary-color"><?php the_title(); ?></h2>
		<?php endif; ?>

		<?php if(get_field('position')) : ?>
			<h3 class="staff-position has-secondary-color"><?= get_field('position') ? get_field('position') : ""; ?></h3>
		<?php endif; ?>

		<?php if(get_field('phone')) : ?>
			<a href="<?= phone_link(get_field('phone')); ?>" class="staff-phone has-secondary-color has-primary-color-hover" title="Call <?= get_the_title() ? get_the_title() : 'Me'; ?>">
				<i class="fa fa-phone"></i>
				<span><?= get_field('phone'); ?></span>
			</a>
		<?php endif; ?>

		<?php if(get_field('email')) : ?>
			<a href="mailto:<?= get_field('email'); ?>" class="staff-email has-secondary-color has-primary-color-hover" title="Email <?= get_the_title() ? get_the_title() : 'Me'; ?>">
				<i class="fa fa-envelope"></i>
			</a>
		<?php endif; ?>

		<?php if(get_the_content()) : ?>
			<a href="<?php the_permalink(); ?>" class="the-button has-secondary-background-color has-primary-background-color-hover has-white-color" title="Read About <?= get_the_title() ? get_the_title() : 'Me'; ?>">Read Bio</a>
		<?php endif; ?>
	</div>
</div>
