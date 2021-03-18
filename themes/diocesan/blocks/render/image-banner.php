<?php
/**
 * Block Name: Image Banner
 * This is the template that displays the Image Banner block.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package dpiChild
 */
?>

<?php
// create id attribute for specific styling
$id = 'image-banner-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? ' align' . $block['align'] : '';
?>

<?php if(get_field('image_banner_background')) : $bkgd = get_field('image_banner_background')['sizes']['featured'] ? get_field('image_banner_background')['sizes']['featured']  : get_field('image_banner_background')['url']; ?>
  <section class="banner<?= ! get_field('bottom_padding') ? ' no-bottom' : ''; ?>" style="background-image: url(<?= $bkgd; ?>)"  id="<?= $id; ?>">
<?php else : ?>
  <section class="banner has-primary-background-color" id="<?= $id; ?>">
<?php endif; ?>
  <div class="banner-wrap" data-aos="fade-up">
    <?php if(get_field('image_banner_title')) : ?>
      <h6 class="sub-heading has-white-color font-main"><?= get_field('image_banner_title'); ?></h6>
    <?php endif; ?>
    <?php if(get_field('image_banner_content')) : ?>
      <h2 class="heading has-white-color font-header"><?= get_field('image_banner_content'); ?></h2>
    <?php endif; ?>
    <?php if(have_rows('image_banner_buttons')) : ?>
      <div class="buttons">
        <?php while(have_rows('image_banner_buttons')) : the_row();
          echo acf_link(get_sub_field('button'), 'button button-white');
        endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>


<style type="text/css">
  #<?= $id; ?> {
    width: 100%;
    max-width: unset;
    min-height: 3.125rem;
    margin-bottom: 0;
  }
  #<?= $id; ?>.no-bottom {
    margin-bottom: -1.5rem;
  }
</style>
