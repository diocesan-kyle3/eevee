<?php
/**
 * Custom Walker class to add classes to the DPI Menu.
 *
 * @package eevee
 */

class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {
  /**
   * Start the element output.
   *
   * Adds main/sub-classes to the list items and links.
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item   Menu item data object.
   * @param int    $depth  Depth of menu item. Used for padding.
   * @param array  $args   An array of arguments. @see wp_nav_menu()
   * @param int    $id     Current item ID.
   */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations['menu-1']);
		$toggle = get_field('has_mega_menu', $item->ID);
    $columns = get_field('columns', $item->ID);

    // Passed classes.
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // Build HTML.
		if($toggle) :
			$output .= '<li class="has-mega-menu ' . $class_names . '" data-columns="' . $columns . '" id="nav-menu-item-'. $item->ID . '">';
		else :
    	$output .= '<li class="' . $depth_class_names . ' ' . $class_names . '" id="nav-menu-item-'. $item->ID . '">';
		endif;

    // Link attributes.
    $attrs  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attrs .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target ) .'"' : '';
    $attrs .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn ) .'"' : '';
    $attrs .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url ) .'"' : '';
    $attrs .= ' class="menu-link"';

    // Build HTML output and pass through the proper filter.
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s%7$s',
      $args->before,
      $attrs,
      $args->link_before,
      apply_filters( 'the_title', $item->title, $item->ID ),
      $args->link_after,
      $args->after,
			$menu_list
    );

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
