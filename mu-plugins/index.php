<?php
/**
 * Plugin Name: MU Plugins
 * Author: Diocesan
 * Author URI: https://diocesan.com/
 * Description: This is the base mu-plugins file for Codename Eevee.
 * Version: 1.0.0
 * License: GNU General Public License v3 or later, provided without any warranties—whether express or implied—and provided without any guarantees of fitness for a particular purpose or merchantability
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link https://wordpress.org/support/article/must-use-plugins/
 */

// Basic security, prevents file from being loaded directly.
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

if(! function_exists('enqueue_mu_plugins')) {
  function enqueue_mu_plugins() {
    $folders = array(
      'acf',
      'cpt',
    );

    foreach($folders as $folder) {
      require_once "$folder/index.php";
    }
  }
  add_action( 'acf/init', 'enqueue_mu_plugins' ); // run on ACF initalization hook
}
