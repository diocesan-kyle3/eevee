<?php
/**
 * The template for displaying functionality for GTranslate.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php if(get_field('gtranslate', 'options') && shortcode_exists('gtranslate')) : ?>
  <div class="translate-container">
    <h1 class="footer-heading has-white-color font-header">Translate</h1>
    <?= do_shortcode('[gtranslate]'); ?>
  </div>
<?php endif;
