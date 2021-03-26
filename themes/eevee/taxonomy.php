<?php
/**
 * The template for displaying taxonomies
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package transfiguration
 */

get_header();
?>

<?php get_template_part( 'template-parts/headers/page-header' ); ?>

<div class="content-area" id="primary">
	<main class="site-main" id="main">
		<?php if(have_posts()) : ?>
			<div class="entry-content limit-width">
				<?php if(get_post_type() === 'ministry' && term_description()) : ?>
					<div class="<?= get_post_type(); ?>-description taxonomy-description"><?= term_description(); ?></div>
				<?php endif; ?>
				<div class="<?= get_post_type(); ?>-container taxonomy-container grid-container">
					<?php $q = new WP_Query(array(
			      'post_type'      => get_post_type(),
			      'post_status'    => 'publish',
						'tax_query'			 => array(
							array(
								'taxonomy' => $wp_query->get_queried_object()->taxonomy,
								'field'		 => 'ID',
								'terms'		 => $wp_query->get_queried_object()->term_id,
							),
						),
			      'posts_per_page' => -1,
			      'orderby'        => array(
			        'menu_order' => 'ASC',
			        'name'       => 'ASC',
			      ),
			    ));

					while( $q->have_posts() ) : $q->the_post();
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/

						// get_template_part(get_post_type() === 'ministry' ? 'template-parts/cpts/taxonomies/' . get_post_type() : 'template-parts/content', get_post_type() );
						get_template_part(get_post_type() === 'ministry' ? 'template-parts/components/grid-selector' : 'template-parts/content', get_post_type() );
					endwhile; ?>
				</div>
			</div>

		<?php else :
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</main>
</div>

<?php
get_footer();
