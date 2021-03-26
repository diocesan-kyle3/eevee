<?php
/**
 * Partial for the top bar of the site's header/navbar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */
?>

<div class="bottom-bar limit-width">
  <div class="header-nav">
    <div class="site-branding">
      <a href="<?= home_url(); ?>" class="header-logo-link" title="<?= get_bloginfo(); ?>" rel="home">
        <img src="<?= get_field('header_logo', 'options') ? get_field('header_logo', 'options')['url'] ? get_field('header_logo', 'options')['url'] : get_field('header_logo', 'options') : get_stylesheet_directory_uri() . '/screenshot.png'; ?>" class="header-logo-image" alt="<?= get_bloginfo(); ?>" />
      </a>
    </div>
    <nav class="main-navigation<?= get_field('has_mega_menu', 'options') ? ' mega-menu-enabled' : ''; ?>" data-home="<?= site_url(); ?>" id="site-navigation">
      <?php if(get_field('has_mega_menu', 'options')) :
        wp_nav_menu( array(
          'theme_location' => 'menu-1',
          'menu_id'        => 'primary-menu',
          'walker'         => new WPDocs_Walker_Nav_Menu()
        ) );
      else :
        wp_nav_menu(array(
          'theme_location' => 'menu-1',
          'menu_id'        => 'primary-menu',
        ));
      endif; ?>
    </nav>

    <div class="mmenu-toggle" id="mmenu-toggle">
      <div class="menu-toggle-bars">
        <?php for($i = 0; $i < 3; $i++) : ?>
          <div class="menu-toggle-bar has-primary-background-color"></div>
        <?php endfor; ?>
      </div>
      <span class="menu-toggle-text">Menu</span>
    </div>
  </div>
</div>
