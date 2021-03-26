<?php
/**
 * Partial for the top bar of the site's header/navbar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */
?>

<div class="top-bar has-primary-background-color">
  <div class="top-bar-container limit-width">
    <?php get_template_part( 'template-parts/components/social-media' ); ?>
    <?php get_template_part( 'template-parts/components/giving-button' ); ?>

    <div class="header-search">
      <form class="search-form" action="<?= site_url(); ?>" method="get" role="search">
        <button type="submit" class="search-submit"><i class="fa fa-search has-white-color"></i></button>
        <label>
          <span class="screen-reader-text">Search for:</span>
          <input type="search" class="search-field" placeholder="Search" value="" name="s">
        </label>
      </form>
    </div>
  </div>
</div>
