<?php
/**
 * Hide/Protect Email from spam bots.
 * Diocesan 2019 (Kyla Eadie)
 *
 * @package eevee
 */

if( ! function_exists( "Diocesan_HideEmail" ) ) {
  /**
   * Hide/Protect Shortcode.
   *
   * @param array $atts.
   * @param string $email.
   * @return string.
   */
  // Hide/Protect Shortcode
	function Diocesan_HideEmail( $atts, $email ) {
		// Is it an email address?
		if( function_exists( "is_email" ) ) {
			if( is_email( $email ) ) {
				// Obfuscate it
				if( function_exists( "antispambot" ) ) {
					$email = antispambot( $email );
				}
			}
		}
		return $email;
	}
  add_shortcode( "hide-email", "Diocesan_HideEmail" );
}

if( ! function_exists( "Diocesan_AutoHideEmail" ) ) {
  /**
   * Hide email address when page/post content is shown.
   * Works with mailto tags
   *
   * @param string $content.
   * @return string.
   */
	function Diocesan_AutoHideEmail( $content ) {
		if( is_string( $content ) && strpos( $content, "@" ) !== FALSE ) {
			// Some emails could pass this and fail the is_email wordpress function later on. Let KEadie know to tweak it.
			$pattern = '/([\w-?&;#~=\.\/]+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,}|[0-9]{1,})(\]?))/i';
			$content = preg_replace_callback( $pattern, function( $matches ) { return Diocesan_HideEmail( null, $matches[0] ); }, $content );
		}
		return $content;
	}
	add_filter( "the_content", "Diocesan_AutoHideEmail", 30 );
	add_filter( "acf_the_content", "Diocesan_AutoHideEmail", 30 );
	add_filter( "acf/load_value", "Diocesan_AutoHideEmail", 30 );
}
