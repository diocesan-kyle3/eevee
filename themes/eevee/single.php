<?php
/**
 * The template for displaying single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package transfiguration
 */

get_header();
?>

<?php get_template_part( 'template-parts/headers/page-header' ); ?>

<div class="content-area" id="primary">
	<main class="site-main entry-content limit-width" id="main">
		<div class="single-container">
			<?php while(have_posts()) : the_post();
				if(get_post_type() === 'staff') :
					get_template_part( 'template-parts/cpts/singles/' . get_post_type() );
				else :
					get_template_part( 'template-parts/content', 'single' );
				endif;
			endwhile; ?>
		</div>
	</main>
</div>

<?php
get_footer();
