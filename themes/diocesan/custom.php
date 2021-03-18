<?php
/**
 * The following is compiled for a stylesheet for the child theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dpiChild
 */
?>

<?php if( ! function_exists('get_field') || ! function_exists('have_rows') ) :
  die('There’s a problem with Advanced Custom Fields.');
endif; ?>

<?php while(have_rows('font_imports', 'options')) : the_row(); ?>
  @import url(<?= get_sub_field('font_import'); ?>);
<?php endwhile; ?>

<?php while(have_rows('font_faces', 'options')) : the_row();
  the_sub_field('font_face');
endwhile; ?>

<?php
  $fontHeading = get_field('font_heading', 'options') ? get_field('font_heading', 'options') : 'serif';
  $fontScript = get_field('font_script', 'options') ? get_field('font_script', 'options') : 'cursive';
  $fontMain = get_field('font_main', 'options') ? get_field('font_main', 'options') : 'sans-serif';

  $white = '#FFFFFF';
  $black = '#0F0F0F';
?>

h1, h2, h3, h4, h5, h6 {
  margin: 0;
}

<?php for($i = 1; $i <= 6; $i++) : ?>
  h<?= $i; ?> {
    <?php if(get_field("heading_$i", 'options')) :
      $heading = get_field("heading_$i", 'options');
      switch($heading['font_family']) {
        case 'font_heading':
          $font = $fontHeading;
          break;
        case 'font_script':
          $font = $fontScript;
          break;
        default:
          $font = $fontMain;
      }

      $fontWeight = str_replace('i', '', $heading['font_weight']);
      $italic = strpos($heading['font_weight'], 'i');

      if($heading['color_selector'] && $heading['site_colors']) : ?>
        color: <?= get_field($heading['site_colors'], 'options') ? get_field($heading['site_colors'], 'options') : get_field('primary_color', 'options'); ?>;
      <?php else : ?>
        color: <?= $heading['heading_color']; ?>;
      <?php endif; ?>
      font-family: <?= $font; ?>;
      font-size: <?= $heading['font_size']; ?>px;
      <?php if($italic) : ?>
        font-style: italic;
      <?php endif; ?>
      font-weight: <?= $fontWeight; ?>;
      margin-top: 2.1875rem !important;
      margin-bottom: 1.875rem !important;
    <?php endif; ?>
  }
<?php endfor; ?>

a, .accordion a {
  <?php if(get_field('anchor_link', 'options')) : $anchor = get_field('anchor_link', 'options');
    if($anchor['color_selector'] && $anchor['site_colors']) : ?>
      color: <?= get_field($anchor['site_colors'], 'options') ? get_field($anchor['site_colors'], 'options') : get_field('tertiary_color', 'options'); ?>;
    <?php else : ?>
      color: <?= $anchor['heading_color']; ?>;
    <?php endif; ?>
    font-family: <?= $fontMain; ?>;
    font-weight: <?= $anchor['font_weight']; ?>;
    <?php if($anchor['font_style']) :
      if(in_array('italic', $anchor['font_style'])) : ?>
        font-style: italic;
      <?php endif; ?>
      text-decoration: <?= in_array('underline', $anchor['font_style']) ? 'underline' : 'none'; ?>;
    <?php else: ?>
      text-decoration: none;
    <?php endif;
  endif; ?>
}

a:hover, a:focus, .accordion a:hover, .accordion a:focus {
  <?php if(get_field('anchor_link', 'options') && get_field('anchor_link', 'options')['hover_styles']) : $anchorHover = get_field('anchor_link', 'options')['hover_styles'];
    if($anchorHover['color_selector'] && $anchorHover['site_colors']) : ?>
      color: <?= get_field($anchorHover['site_colors'], 'options') ? get_field($anchorHover['site_colors'], 'options') : get_field('tertiary_color', 'options'); ?>;
    <?php else : ?>
      color: <?= $anchorHover['heading_color']; ?>;
    <?php endif; ?>
    <?php if($anchorHover['font_style']) :
      if(in_array('italic', $anchorHover['font_style'])) : ?>
        font-style: italic;
      <?php endif; ?>
      text-decoration: <?= in_array('underline', $anchorHover['font_style']) ? 'underline' : 'none'; ?>
    <?php else: ?>
      text-decoration: none;
    <?php endif;
  endif; ?>
}

p, ol, ul, .simcal-default-calendar-grid ul.simcal-events {
  <?php if(get_field('paragraph', 'options')) : $paragraph = get_field('paragraph', 'options'); ?>
    <?php if($paragraph['color_selector'] && $paragraph['site_colors']) : ?>
      color: <?= get_field($paragraph['site_colors'], 'options') ? get_field($paragraph['site_colors'], 'options') : get_field('primary_color', 'options'); ?>;
    <?php else : ?>
      color: <?= $paragraph['heading_color']; ?>;
    <?php endif; ?>
    font-size: <?= $paragraph['font_size']; ?>px;
    font-family: <?= $fontMain; ?>;
    line-height: 1.5;
  <?php endif; ?>
}

.page-heading-title {
  font-size: <?= get_field('heading_1', 'options')['font_size'] * 1.75; ?>px !important;
  font-style: normal;
  font-weight: 400;
}

@media screen and (max-width: 768px) {
  .page-heading-title {
    font-size: <?= get_field('heading_1', 'options')['font_size'] * 1.5; ?>px !important;
  }
}

@media screen and (max-width: 576px) {
  .page-heading-title {
    font-size: <?= get_field('heading_1', 'options')['font_size'] * 1.25; ?>px !important;
  }
}

.simcal-calendar-list .simcal-event-details a:hover *, .simcal-calendar-list .simcal-event-details a:focus * {
  color: #FFFFFF !important;
}

figcaption, .envira-album-title, .envira-album-image-count, .gform_confirmation_message {
  font-family: <?= $fontMain; ?>;
}

<?php $colors = array(
  'primary',
  'secondary',
  'tertiary',
  'quaternary',
  'white' => $white,
  'black' => $black,
);

foreach($colors as $color => $value) :
  if(get_field($color . '_color', 'options')) : ?>
    .has-<?= $color; ?>-background-color {
      background: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-background-color-hover:hover, .has-<?= $color; ?>-background-color-hover:focus {
      background: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-background-color-before::before {
      background: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-background-color-hover-before:hover::before,
    .has-<?= $color; ?>-background-color-hover-before:focus::before {
      background: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-background-color-after::after {
      background: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-background-color-hover-after:hover::after,
    .has-<?= $color; ?>-background-color-hover-after:focus::after {
      background: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-border-color {
      border-color: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-border-color-hover:hover,
    .has-<?= $color; ?>-border-color-hover:focus {
      border-color: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-color {
      color: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-color-hover:hover,
    .has-<?= $color; ?>-color-hover:focus {
      color: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-color-before::before {
      color: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-color-hover-before:hover::before,
    .has-<?= $color; ?>-color-hover-before:focus::before {
      color: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-color-after::after {
      color: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .has-<?= $color; ?>-color-hover-after:hover::after,
    .has-<?= $color; ?>-color-hover-after:focus::after {
      color: <?= get_field($color . '_color', 'options'); ?> !important;
    }

    .wp-block-button__link.has-<?= $color; ?>-background-color,
    .wp-block-file a.wp-block-file__button.has-<?= $color; ?>-background-color {
      background: <?= get_field($color . '_color', 'options'); ?> !important;
    }

  <?php elseif($value) : ?>
    .has-<?= $color; ?>background-color {
      background: <?= $value; ?> !important;
    }
  <?php endif;
endforeach; ?>

<!-- .has-white-background-color {
  background: #F00000 !important;
} -->

.has-white-background-color-hover:hover,
.has-white-background-color-hover:focus {
  background: #FFFFFF !important;
}

.has-white-background-color-before::before {
  background: #FFFFFF !important;
}

.has-white-background-color-hover-before:hover::before,
.has-white-background-color-hover-before:focus::before {
  background: #FFFFFF !important;
}

.has-white-background-color-after::after {
  background: #FFFFFF !important;
}

.has-white-background-color-hover-after:hover::after,
.has-white-background-color-hover-after:focus::after {
  background: #FFFFFF !important;
}

.has-white-border-color {
  border-color: #FFFFFF !important;
}

.has-white-border-color-hover:hover,
.has-white-border-color-hover:focus {
  border-color: #FFFFFF !important;
}

.has-white-color {
  color: #FFFFFF !important;
}

.has-white-color-hover:hover,
.has-white-color-hover:focus {
  color: #FFFFFF !important;
}

.has-white-color-before::before {
  color: #FFFFFF !important;
}

.has-white-color-hover-before:hover::before,
.has-white-color-hover-before:focus::before {
  color: #FFFFFF !important;
}

.has-white-color-after::after {
  color: #FFFFFF !important;
}

.has-white-color-hover-after:hover::after,
.has-white-color-hover-after:focus::after {
  color: #FFFFFF !important;
}

.font-heading {
  font-family: <?= $fontHeading; ?> !important;
}

.font-main {
  font-family: <?= $fontMain; ?> !important;
}

.font-script {
  font-family: <?= $fontScript; ?>  !important;
}

.mm-search input {
  font-family: <?= $fontMain; ?> !important;
}

.gform_button {
  background: <?= get_field('primary_color', 'options'); ?> !important;
  border: 0;
  color: #FFFFFF !important;
}
  .gform_button:hover, .gform_button:focus {
    background: <?= get_field('secondary_color', 'options'); ?> !important;
  }

ul.slick-dots li button {
  background: <?= get_field('quaternary_color', 'options'); ?> !important;
  transition: background 0.25s ease-in;
}
  ul.slick-dots li button:hover, ul.slick-dots li button:focus {
    border-color: <?= get_field('secondary_color', 'options'); ?> !important;
  }

ul.slick-dots li.slick-active button {
  background: <?= get_field('secondary_color', 'options'); ?> !important;
  border-color: <?= get_field('secondary_color', 'options'); ?> !important;
}

.hero .slick-arrow, .statistics .slick-arrow {
  border-color: #FFFFFF !important;
}

.hero .slick-arrow:hover, .hero .slick-arrow:focus {
  background: <?= get_field('primary_color', 'options'); ?>;
}

.featured-buttons .slick-arrow,
.the-news .slick-arrow {
  border-color: <?= get_field('quaternary_color', 'options'); ?> !important;
}
  .featured-buttons .slick-arrow::before,
  .the-news .slick-arrow::before {
    color: <?= get_field('primary_color', 'options'); ?> !important;
  }

  .featured-buttons .slick-arrow:hover, .featured-buttons .slick-arrow:focus,
  .the-news .slick-arrow:hover, .the-news .slick-arrow:focus {
    background: <?= get_field('primary_color', 'options'); ?> !important;
  }

  .featured-buttons .slick-arrow:hover::before, .featured-buttons .slick-arrow:focus::before,
  .the-news .slick-arrow:hover::before, .the-news .slick-arrow:focus::before {
    color: #FFFFFF !important;
  }

.featured-buttons-simple .featured-button:hover .featured-button-textbox .featured-button-title,
.featured-buttons-simple .featured-button:focus .featured-button-textbox .featured-button-title {
  color: <?= get_field('secondary_color', 'options'); ?> !important;
}

.statistics .stat-icon,
.statistics .stat-number {
  font-size: <?= get_field('heading_1', 'options')['font_size'] * 1.25; ?>px;
}

.statistics .slick-arrow:hover, .statistics .slick-arrow:focus {
  background: <?= get_field('secondary_color', 'options'); ?>;
}

.news-image-link:hover ~ .news-single-title .news-single-title-link,
.news-image-link:focus ~ .news-single-title .news-single-title-link {
  color: <?= get_field('secondary_color', 'options'); ?> !important;
}

.ajax-load-more-wrap .alm-btn-wrap .alm-load-more-btn {
  background: <?= get_field('quaternary_color', 'options'); ?> !important;
  border: 1px solid;
  border-radius: 0;
  color: <?= get_field('tertiary_color', 'options'); ?> !important;
  font-family: <?= $fontHeading; ?>;
  text-transform: uppercase;
  transition: background 0.25s ease-in, color 0.25s ease-in;
}
  .ajax-load-more-wrap .alm-btn-wrap .alm-load-more-btn:hover {
    background: <?= get_field('primary_color', 'options'); ?> !important;
    color: #FFFFFF !important;
  }

.main-navigation a, .secondary-navigation a {
  font-family: <?= $fontMain; ?>;
}

.staff-single .staff-image, .contact-single .contact-image {
  object-position: <?= get_field('staff_images', 'options'); ?>;
}

.archive.post-type-archive-staff .staff-container .staff-single .staff-image-link:hover ~ .staff-content .staff-name-link,
.archive.post-type-archive-staff .staff-container .staff-single .staff-image-link:focus ~ .staff-content .staff-name-link {
  color: <?= get_field('primary_color', 'options'); ?> !important;
}

.contact-single .contact-image-link:hover ~ .contact-information h6,
.contact-single .contact-image-link:focus ~ .contact-information h6 {
  color: <?= get_field('primary_color', 'options'); ?> !important;
}

.contact-single .contact-link[href^="http"]:hover h6,
.contact-single .contact-link[href^="http"]:focus h6 {
  color: <?= get_field('primary_color', 'options'); ?> !important;
}

.search-submit {
  background: <?= get_field('primary_color', 'options'); ?> !important;
  color: #FFFFFF !important;
  font-family: <?= $fontMain; ?>;
}

.search-submit:hover, .search-submit:focus {
  background: <?= get_field('secondary_color', 'options'); ?> !important;
}

<?php if(get_field('has_mega_menu', 'options')) :
  if(get_field('background', 'options') || get_field('color', 'options') || get_field('border_color', 'options') || get_field('hover_color', 'options')) : ?>
    <?php if(get_field('background', 'options')) : ?>
      .site-header#masthead .the-header .bottom-bar .header-nav .main-navigation .menu-primary-menu-container > ul.menu > li.menu-item.has-mega-menu .sub-menu {
        background: <?= get_field('background', 'options') === "white" ? "#FFFFFF" : get_field(get_field('background', 'options') . '_color', 'options'); ?> !important;
      }
    <?php endif; ?>

    <?php if(get_field('color', 'options')) : ?>
      .site-header#masthead .the-header .bottom-bar .header-nav .main-navigation .menu-primary-menu-container > ul.menu > li.menu-item.has-mega-menu .sub-menu .menu-item > .menu-link {
        color: <?= get_field('color', 'options') === "white" ? "#FFFFFF" : get_field(get_field('color', 'options') . '_color', 'options'); ?> !important;
      }
    <?php endif; ?>

    <?php if(get_field('border_color', 'options')) : ?>
      .site-header#masthead .the-header .bottom-bar .header-nav .main-navigation .menu-primary-menu-container>ul.menu>li.menu-item.has-mega-menu .sub-menu .menu-item > .menu-link {
        border-color: <?= get_field('border_color', 'options') === "white" ? "#FFFFFF" : get_field(get_field('border_color', 'options') . '_color', 'options'); ?> !important;
      }
    <?php endif; ?>

    <?php if(get_field('hover_color', 'options')) : ?>
      .site-header#masthead .the-header .bottom-bar .header-nav .main-navigation .menu-primary-menu-container>ul.menu>li.menu-item.has-mega-menu .sub-menu .menu-item > .menu-link:hover,
      .site-header#masthead .the-header .bottom-bar .header-nav .main-navigation .menu-primary-menu-container>ul.menu>li.menu-item.has-mega-menu .sub-menu .menu-item > .menu-link:focus {
        color: <?= get_field('hover_color', 'options') === "white" ? "#FFFFFF" : get_field(get_field('hover_color', 'options') . '_color', 'options'); ?> !important;
      }
    <?php endif; ?>
  <?php endif;
endif; ?>

<?php if(have_rows('page_header_overlay', 'options')) : ?>
  .page-header::after {
    <?php while(have_rows('page_header_overlay', 'options')) : the_row();
      if(get_sub_field('color_selector')) : ?>
        background: <?= get_field(get_sub_field('site_colors'), 'options') ? get_field(get_sub_field('site_colors'), 'options') : '#000000'; ?>;
      <?php else : ?>
        background: <?= get_sub_field('hero_color'); ?>;
      <?php endif; ?>
      opacity: <?= get_sub_field('opacity') ? get_sub_field('opacity') : '0.25'; ?>;
    <?php endwhile; ?>
  }
<?php endif; ?>

@media screen and (max-width: 1200px) {
  .page-template-homepage .featured-buttons-complex[data-btns="4"] .featured-button:nth-child(4n-1)::after {
    background: <?= get_field('primary_color', 'options'); ?> !important;
  }

  .page-template-homepage .featured-buttons-complex[data-btns="4"] .featured-button:nth-child(4n)::after {
    background: <?= get_field('secondary_color', 'options'); ?> !important;
  }
}

@media screen and (max-width: 768px) {
  .page-template-homepage .hero .hero-info .hero-title {
    font-size: <?= get_field("heading_1", 'options')['font_size'] * 0.75; ?>px;
  }

  .page-template-homepage .featured-buttons-complex[data-btns="4"] .featured-button:nth-child(4n-1)::after {
    background: <?= get_field('secondary_color', 'options'); ?> !important;
  }

  .page-template-homepage .featured-buttons-complex[data-btns="4"] .featured-button:nth-child(4n)::after {
    background: <?= get_field('primary_color', 'options'); ?> !important;
  }
}

<?= get_field('tweaks', 'options');
