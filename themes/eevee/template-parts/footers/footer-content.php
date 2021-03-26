<?php
/**
 * Partial for contents of the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<div class="footer-content">
  <div class="footer-columns">
    <?php $columns = [
      'links',
      'contact',
    ];

    foreach ($columns as $column) : ?>
      <div class="footer-<?= $column; ?> footer-column<?= $column === 'links' ? ' has-white-background-color-after' : ''; ?>">
        <?php get_template_part( 'template-parts/footers/footer', $column ); ?>
      </div>
    <?php endforeach; ?>

    <?php if(get_field('footer_logo', 'options')) : ?>
      <div class="footer-logo">
        <a href="<?= home_url(); ?>" class="footer-logo-link" title="<?php bloginfo( 'name' ); ?>">
          <img src="<?= get_field('footer_logo', 'options')['url'] ? get_field('footer_logo', 'options')['url'] : get_field('header_logo', 'options'); ?>" class="footer-logo-image" alt="<?php bloginfo( 'name' ); ?>" />
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="site-info-container has-secondary-background-color font-main">
  <div class="site-info has-white-color">
    &copy; <?= date('Y'); ?> <a href="<?= esc_url( home_url( '/' ) ); ?>" class="has-white-color" rel="home"><?php bloginfo( 'name' ); ?></a>
    <span class="sep"> | </span>
    <?php bloginfo( 'description' ); ?>
  </div>
  <div class="diocesan has-white-color">
    Made with <span class="hearts has-primary-color">&hearts;</span> by <a href="https://diocesan.com/" class="has-white-color" target="_blank" title="Diocesan">Diocesan</a>
  </div>
</div>
