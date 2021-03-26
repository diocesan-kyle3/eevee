<?php
/**
 * Partial for the site's inner page headers.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */
?>

  <?php $bkgd = get_field('default_featured_image', 'options')['url'];

  if(is_search()) :
    $title = "Search Results: " . get_search_query();
  elseif(is_404()) :
    $title = "Page Not Found";
  elseif(is_archive()) :
    if(is_post_type_archive('staff')) :
      $title = "Our Staff";
    elseif(is_tax()) :
      $title = preg_replace("/^([\w ]+)Group:\s+/i", "", get_the_archive_title());
    else :
      $title = str_replace("Category: ", "", str_replace("Archives: ", "", get_the_archive_title()));
    endif;
  elseif(get_query_var('cat')) :
    $title = get_queried_object()->cat_name;
  elseif(is_single()) :
    $title = get_the_category()[0]->cat_name ? get_the_category()[0]->cat_name : get_the_title();
  else :
    $bkgd = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_field('default_featured_image', 'options')['url'];
    $title = get_the_title();
  endif; ?>

  <div class="page-header" style="background-image: url(<?= $bkgd; ?>);">
    <h1 class="page-header-title has-white-color"><?= $title; ?></h1>
  </div>
</div> <!-- .site-content -->
