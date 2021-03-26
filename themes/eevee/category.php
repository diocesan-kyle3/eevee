<?php
/**
 * The template for displaying Category Archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

get_header();
?>

<?php get_template_part( 'template-parts/headers/page-header' ); ?>

<div class="content-area" id="primary">
	<main class="site-main" id="main">
    <div class="entry-content limit-width">
      <div class="result-container">
        <?= do_shortcode('[ajax_load_more post_type="post" posts_per_page="12" category="' . get_queried_object()->slug . '" button_label="Load More"]'); ?>
      </div>
    </div>
  </main>
</div>

<?php get_footer();
