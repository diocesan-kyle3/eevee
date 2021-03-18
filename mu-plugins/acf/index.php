<?php // ACF Index
if( function_exists('acf_add_local_field_group') ) {
  /* ACF Pro is a REQUIRED DEPENDENCY */
  $dirs = array(
    'blocks',
    'fields'
  );

  foreach($dirs as $dir) {
    $files = glob( __DIR__ . "/$dir/*.php" );

    foreach( (array) $files as $file ) {
      if( $file && preg_match( "/\/" . $dir . "\/[a-z-]+\.php$/", $file ) ) {
        require_once $file;
      }
    }
  }
}
