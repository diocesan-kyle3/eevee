<?php
/**
 * Block Name: Contact
 * This is the template that displays the Contact block.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package dpiChild
 */
?>

<?php
// create id attribute for specific styling
$id = 'contact-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? ' align' . $block['align'] : '';
?>

<?php if(have_rows('contacts')) : ?>
  <div class="contact <?= get_field('is_staff_complex', 'options') ? 'complex' : 'simple'; ?> <?= $align_class ? ' ' . $align_class : ''; ?>" id="<?= $id; ?>">
    <?php while(have_rows('contacts')) : the_row();
      get_template_part( 'template-parts/components/contact', null, array('origin' => 'block') );
    endwhile; ?>
  </div>
<?php endif; ?>

<style type="text/css">
  #<?= $id; ?> {
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
    width: 100%;
    margin-bottom: 2rem;
  }
  #<?= $id; ?> a {
    transition: color 0.25s ease-in;
  }
  #<?= $id; ?> h6 {
    margin: 0 !important;
  }
  #<?= $id; ?> .contact-single {
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
    width: calc(50% - 0.5rem);
  }
  #<?= $id; ?> .contact-image-link {
    margin-right: 2rem;
  }
  #<?= $id; ?> .contact-image {
    object-fit: cover;
    object-position: <?= get_field('staff_images', 'options'); ?>;
    width: 5.75rem;
    height: 5.75rem;
  }
  #<?= $id; ?> .contact-information {
    display: flex;
    flex-flow: column nowrap;
    justify-content: flex-start;
  }
  #<?= $id; ?> .contact-information .contact-member-name,
  #<?= $id; ?> .contact-information .contact-member-position {
    margin: 0 0 1rem !important;
  }
  #<?= $id; ?> .contact-information a {
    display: block;
  }
  #<?= $id; ?> .contact-information a i {
    margin-right: 0.5em;
    transition: filter 0.25s ease-in;
  }

  #<?= $id; ?>.simple .contact-single {
    align-items: center;
    border-bottom: 1px solid;
    width: 100%;
    padding: 1em 0;
  }
  #<?= $id; ?>.simple .contact-single .contact-information {
    display: flex;
    flex-flow: row wrap;
    justify-content: flex-start;
  }
  #<?= $id; ?>.simple .contact-single .contact-part:not(:last-child) {
    border-right: 1px solid;
    padding-right: 0.5em;
    margin-right: 0.5em;
  }
  #<?= $id; ?>.simple .contact-single .contact-part.contact-name {
    position: relative;
    border-right: 0;
    padding-right: 0.75em;
    margin-right: 0.25em;
  }

  #<?= $id; ?>.complex .contact-single {
    margin-bottom: 3rem;
  }
  #<?= $id; ?>.complex .contact-single:nth-of-type(odd) {
    margin-right: 1rem;
  }
  #<?= $id; ?>.complex .contact-information .contact-part:not(:last-child) {
    margin-bottom: 0.5em;
  }
</style>
