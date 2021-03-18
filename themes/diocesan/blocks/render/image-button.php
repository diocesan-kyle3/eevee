<?php
/**
 * Block Name: Image Button
 * This is the template that displays the Image Button block.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package dpiChild
 */
?>

<?php
// create id attribute for specific styling
$id = 'image-buttons-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? ' align' . $block['align'] : '';

// values from ACF
if(get_field('is_manual')) {
  $bkgd   = get_field('bkgd')['url'];
  $link   = get_field('link');
  $target = $link['target'];
  $title  = $link['title'];
  $url    = $link['url'];
} else {
  $page   = get_field('page');
  $bkgd   = get_the_post_thumbnail_url($page->ID);
  $target = '';
  $title  = get_the_title($page->ID);
  $url    = get_permalink($page->ID);
}
?>

<a href="<?= $url; ?>" class="button-link image-button-block<?= $align_class; ?>" target="<?= $target; ?>" title="<?= $title; ?>" id="<?= $id; ?>" style="background-image: url(<?= $bkgd; ?>)">
  <h1 class="button-title has-white-color"><?= $title; ?></h1>
</a>

<style type="text/css">
  #<?= $id; ?> {
    position: relative;
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
    float: left;
    align-items: center;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    text-decoration: none;
    width: calc((100% / 3) - 1.25rem);
    height: 17rem;
    padding: 0 0.5rem;
    margin: 0 1.75rem 1.75rem 0;
  }
    #<?= $id; ?> * {
      z-index: 1;
    }

    #<?= $id; ?> .button-title {
      text-align: center;
      padding: 0 0.25rem;
    }

    #<?= $id; ?>:nth-of-type(3n), #<?= $id; ?>:last-of-type {
      margin-right: 0;
    }

    #<?= $id; ?>::after {
      position: absolute;
      content: "";
      background: #000000;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      opacity: 0.5;
      transition: opacity 0.25s ease-in;
    }
      #<?= $id; ?>:hover::after, #<?= $id; ?>:focus::after {
        opacity: 0.75;
      }

  @media screen and (max-width: 1199px) {
    #<?= $id; ?> {
      width: calc(50% - 0.875rem);
    }
      #<?= $id; ?>:nth-of-type(3n) {
        margin-right: 1.75rem;
      }

      #<?= $id; ?>:nth-of-type(even) {
        margin-right: 0;
      }
  }

  @media screen and (max-width: 767px) {
    #<?= $id; ?> {
      width: 100%;
    }
      #<?= $id; ?>:nth-of-type(odd) {
        margin-right: 0;
      }
</style>
