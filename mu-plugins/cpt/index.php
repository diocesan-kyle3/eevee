<?php // CPT index
if( ! function_exists( 'eevee_register_cpts' ) ) {
  function eevee_register_cpts() {
    $cpts = glob( __DIR__ . '/cpts/*.php' );

    foreach( (array) $cpts as $cpt ) {
      if( $cpt && preg_match( "/\/cpts\/[a-z-]+\.php$/", $cpt ) ) {
        require_once $cpt;
      }
    }
  }
  add_action( 'init', 'eevee_register_cpts' );
}
