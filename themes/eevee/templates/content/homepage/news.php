<?php
/**
 * Partial for the Homepage template's News section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<div class="news-container">
  <h1 class="news-title page-header-title has-tertiary-color font-header all-caps"><?= get_field('news_title'); ?></h1>
  <?php get_field('featured_post') ? get_template_part( 'templates/content/homepage/news', 'has-featured' ) : get_template_part( 'templates/content/homepage/news', 'no-featured' ); ?>
  <div class="news-buttons">
    <a href="<?= get_field('news_category') ? '/category/' . get_field('news_category')->slug . '/' : '/category/news/'; ?>" class="news-button the-button has-quaternary-background-color has-tertiary-border-color has-tertiary-color has-primary-background-color-hover has-primary-border-color-hover has-white-color-hover font-header" title="View All News">View All News</a>
    <?php if(get_field('news_button')) :
      echo acf_link(get_field('news_button'), 'news-button the-button has-quaternary-background-color has-tertiary-border-color has-tertiary-color has-primary-background-color-hover has-primary-border-color-hover has-white-color-hover font-header');
    endif; ?>
  </div>
</div>
