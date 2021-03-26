<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eevee
 */

get_header();
?>

<?php get_template_part( 'template-parts/headers/page-header' ); ?>

<div class="content-area" id="primary">
	<main class="site-main" id="main">
		<section class="error-404 not-found">
			<header class="the-page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'eevee' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like this page does not exist! Try a search below.', 'eevee' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
