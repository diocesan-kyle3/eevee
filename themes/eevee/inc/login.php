<?php
/**
 * Custom login page.
 *
 * @package eevee
 */

/**
* Styles for the Login Page.
*/
if( ! function_exists('custom_login_logo') ) {
  function custom_login_logo() { ?>
    <style>
      body.login {
        background: #FFFFFF;
      }
      body.login div#login h1 a {
        background-image: url(<?= get_stylesheet_directory_uri() . "/screenshot.png"; ?>);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        width: 100%;
        height: 10rem;
      }
      body.login #wp-submit {
        background: #F37053;
        border-color: #F37053;
        transition: background 0.25s ease-in, border 0.25s ease-in;
      }
      body.login #wp-submit:hover, body.login #wp-submit:focus {
        background: #000000;
        border-color: #000000;
      }
      body.login #nav a, body.login #backtoblog a {
        color: #F37053;
      }
      body.login #nav a:hover, body.login #backtoblog a:hover,
      body.login #nav a:focus, body.login #backtoblog a:focus {
        color: #000000;
        text-decoration: underline;
      }
      body.login .pb-tailoredlogin-sidebar {
        display: none;
      }
    </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'custom_login_logo' );
}

/**
* Set custom url for Logo on the Login Page.
*/
if( ! function_exists('custom_login_logo_url') ) {
  function custom_login_logo_url($url) {
    return site_url();
  }
  add_filter( 'login_headerurl', 'custom_login_logo_url' );
}
