<?php
/**
 * Functions for excerpts.
 *
 * @package eevee
 */

if( ! function_exists( 'custom_excerpt_length' ) ) {
  /**
   * Filter the except length to 50 words.
   *
   * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
   *
   * @param integer $length Excerpt length.
   * @return integer modified excerpt length.
   */
  function custom_excerpt_length( $length ) {
   	return 50;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
}

if( ! function_exists( 'eevee_excerpt_more' ) ) {
  /**
   * Filter the excerpt "read more" string.
   *
   * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
   *
   * @param string $more "Read more" excerpt string.
   * @return string modified "read more" excerpt string.
   */
  function eevee_excerpt_more( $more ) {
    return '…';
  }
  add_filter( 'excerpt_more', 'eevee_excerpt_more' );
}

if( ! function_exists( 'eevee_excerpt_more' ) ) {
  /**
   * Limit the excerpt to $limit.
   *
   * @param integer $limit.
   * @return string shortened excerpt.
   */
  function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if(count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ", $excerpt).'…';
    } else {
      $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
  }
}
