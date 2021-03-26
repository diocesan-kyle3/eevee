<?php
/**
 * The template for displaying archive pages.
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
			<?php if(have_posts()) :
				get_template_part( 'template-parts/cpts/archive' );

			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			wp_reset_postdata(); ?>
		</div>
	</main>
</div>

<?php
get_footer();
