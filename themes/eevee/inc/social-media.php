<?php
/**
 * Add ['dpi_social_media'] shortcode.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

if(! function_exists('social_media_shortcode')) {
  function social_media_shortcode($atts) {
    $color     = $atts['color'] ? ' has-' . $atts['color'] . '-color' : '';
    $className = "social-media-link$color has-primary-color-hover";
    $output    = '';

    if(have_rows('social_media', 'options') || have_rows('myParish_group', 'options') || have_rows('evangelus_group', 'options')) {
      $output .= '<div class="social-media-container"';
      $output .= $atts['id'] ? $attrs . ' id="' . $atts['id'] . '">' : '>';
        if(have_rows('social_media', 'options')) {
          while(have_rows('social_media', 'options')) {
            the_row();
            if(get_sub_field('link') || get_sub_field('icon')) {
              $href    = '';
              $attrs   = 'class="' . $className . '"';
              $content = get_sub_field('icon') ? get_sub_field('icon') : '';
              if(get_sub_field('link')) {
                $url     = get_sub_field('link')['url'] ? get_sub_field('link')['url'] : '#';
                $target  = get_sub_field('link')['target'] ? get_sub_field('link')['target'] : '';
                $title   = get_sub_field('link')['title'] ? get_sub_field('link')['title'] : 'Click Here!';
                $attrs   = $attrs . ' target="' . $target . '" title="' . $title . '"';
                $content = get_sub_field('icon') ? get_sub_field('icon') : $title;
                $href   .= ' href="' . $url . '"';
              }

              $output .= sprintf('<a%s %s>%s</a>', $href, $attrs, $content);
            }
          }
        }

        while(have_rows('myParish_group', 'options')) {
          the_row();
          if(get_sub_field('has_myParish')) {
            $url     = 'https://myparishapp.com/';
            $target  = '_blank';
            $title   = 'myParish';
            $content = '<span class="dpi-mpa"></span>';

            if(get_sub_field('myParish')) {
              $url    = get_sub_field('myParish')['url'] ? get_sub_field('myParish')['url'] : $url;
              $target = get_sub_field('myParish')['target'] ? get_sub_field('myParish')['target'] : '';
              $title  = get_sub_field('myParish')['title'] ? get_sub_field('myParish')['title'] : $title;
            }

            $output .= sprintf('<a href="%s" class="%s" target="%s" title="%s">%s</a>', $url, $className, $target, $title, $content);
          }
        }

        while(have_rows('evangelus_group', 'options')) {
          the_row();
          if(get_sub_field('has_evangelus')) {
            $url     = 'https://diocesan.com/evangelus/';
            $target  = '_blank';
            $title   = 'Evangelus';
            $content = '<span class="dpi-eva"></span>';

            if(get_sub_field('evangelus')) {
              $url    = get_sub_field('evangelus')['url'] ? get_sub_field('evangelus')['url'] : $url;
              $target = get_sub_field('evangelus')['target'] ? get_sub_field('evangelus')['target'] : '';
              $title  = get_sub_field('evangelus')['title'] ? get_sub_field('evangelus')['title'] : $title;
            }

            $output .= sprintf('<a href="%s" class="%s" target="%s" title="%s">%s</a>', $url, $className, $target, $title, $content);
          }
        }

      $output .= '</div>';
    }

    return $output;
  }
}

if(! function_exists('add_social_media_shortcode')) {
  function add_social_media_shortcode() {
    add_shortcode( 'dpi_social_media', 'social_media_shortcode' );
  }
  add_action( 'init', 'add_social_media_shortcode' );
}
