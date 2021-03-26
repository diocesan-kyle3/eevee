<?php
/**
 * Functions to be called that enhance the theme by hooking into WordPress.
 *
 * @package eevee
 */

if( ! function_exists( 'phone_link' ) ) {
  /**
  * Convert phone numbers into links.
  *
  * @param string $input.
  * @return string $output.
  */
  function phone_link( $input ) {
    $tel = preg_replace('/[^0-9]+/', '', $input);
    $output = "tel:+1-" . substr($tel, 0, 3) . "-" . substr($tel, 3, 3) . "-" . substr($tel, 6, 4);
    if( strlen($tel) > 10 ) $output .= "," . substr($tel, 10);

    return $output;
  }
}

if( ! function_exists( 'acf_link' ) ) {
  /**
   * Create simple links from ACF Link Array.
   *
   * @param string $link.
   * @param string $class.
   * @param string $content.
   * @return string.
   */
  function acf_link( $link, $class = null, $content = null ) {
  	if($link) {
  		$url = $link['url'] ? $link['url'] : '';
  		$target = $link['target'] ? $link['target'] : '';
  		$title = $link['title'] ? $link['title'] : '';

  		$className = $class ? " class=\"$class\"" : '';
  		$content = $content ? $content : $title;

  		return "<a href=\"$url\"$className target=\"$target\" title=\"$title\">$content</a>";
  	}
  }
}

if( ! function_exists( 'if_the_content' ) ) {
  /**
   * Conditionally render .the-content if it exists.
   *
   * @param boolean $limit_width.
   * @return string.
   */
  function if_the_content( $limit_width = false ) {
    $output = '';

    if(have_posts()) :
      while(have_posts()) : the_post();
        if(get_the_content()) :
          if($limit_width) :
            $output = "<div class=\"the-content limit-width\">" . get_the_content() . "</div>";
          else :
            $output = "<div class=\"the-content\">" . get_the_content() . "</div>";
          endif;
        endif;
      endwhile;
    endif;
    wp_reset_postdata();

    return $output;
  }
}

if( ! function_exists( 'ministry_featured_image' ) ) {
  /**
   * Return a Featured Image for Ministries, with multiple fallbacks.
   *
   * @param integer $id.
   * @return string.
   */
  function ministry_featured_image( $id = null ) {
    if(has_post_thumbnail($id)) {
      return get_the_post_thumbnail_url($id);
    } elseif(get_field('ministry_featured_image', 'options') && get_field('ministry_featured_image', 'options')['url']) {
      return get_field('ministry_featured_image', 'options')['url'];
    } else {
      return get_field('default_featured_image', 'options')['url'];
    }
  }
}

if( ! function_exists( 'ministry_taxonomy_image' ) ) {
  /**
   * Return a Taxonomy Image for Ministries, with multiple fallbacks.
   *
   * @param integer $id.
   * @return string.
   */
  function ministry_taxonomy_image( $q_obj = null ) {
    $q_obj = $q_obj === null ? get_queried_object() : $q_obj;
    if(get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)) {
      return get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)['url'] ? get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)['url'] : get_field('ministry_featured_image', 'options')['url'];
    } else {
      return get_field('ministry_featured_image', 'options') ? get_field('ministry_featured_image', 'options')['url'] : get_field('default_featured_image', 'options')['url'];
    }
  }
}
