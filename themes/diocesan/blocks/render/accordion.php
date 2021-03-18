<?php
/**
 * Block Name: Accordion
 * This is the template that displays the Accordion block.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package dpiChild
 */
?>

<?php
// create id attribute for specific styling
$id = 'accordion-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? ' align' . $block['align'] : '';
?>

<div class="accordion-block<?= $align_class; ?>" id="<?= $id; ?>">
  <div class="accordion">
  	<?php if(have_rows('accordion')) :
  		while(have_rows('accordion')) : the_row(); ?>
  			<div class="accordion-section-title has-quaternary-border-color has-primary-border-color-hover">
          <h4 class="has-primary-color font-header"><?= get_sub_field('section_title'); ?></h4>
          <div class="accordion-toggle has-primary-background-color has-secondary-background-color-hover">
            <div class="line has-white-background-color"></div>
            <div class="line has-white-background-color"></div>
          </div>
        </div>
  			<div class="accordion-content has-quaternary-border-color"><?= get_sub_field('section_content'); ?></div>
  		<?php endwhile;
  	endif; ?>
  </div>
</div>

<style type="text/css">
  #<?= $id; ?> {
    min-height: 3.125rem;
    margin-bottom: 3.5rem;
  }
  #<?= $id; ?> .accordion-section-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: transparent;
    border: 1px solid;
    border-radius: 0;
    width: 100%;
    height: 3rem;
    max-width: unset;
    padding: 0;
    margin: 1.5625rem 0 0;
    transition: background 0.25s ease-in, border 0.25s ease-in, color 0.25s ease-in;
  }
  #<?= $id; ?> .accordion-section-title h4 {
    width: auto;
    margin: 0 0 0 1em !important;
    transition: 0.25s ease-in;
  }
  #<?= $id; ?> .accordion-section-title .ui-accordion-header-icon.ui-icon {
    display: none;
  }
  #<?= $id; ?> .accordion-section-title .accordion-toggle {
    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
    align-items: center;
    width: 3rem;
    height: 3rem;
    padding: 0 0 0.25rem;
    right: 1rem;
    transition: background 0.25s ease-in;
  }
  #<?= $id; ?> .accordion-section-title .accordion-toggle .line {
    border-radius: 0.5rem;
    width: 2rem;
    height: 0.25rem;
    transition: transform 0.25s ease-in;
  }
  #<?= $id; ?> .accordion-section-title .accordion-toggle .line:first-child {
    transform: rotate(40deg) translateX(25%);
  }
  #<?= $id; ?> .accordion-section-title .accordion-toggle .line:last-child {
    transform: rotate(-40deg) translateX(-25%);
  }
  #<?= $id; ?> .accordion-section-title:hover .accordion-toggle {
    background: <?= get_field( 'secondary_color', 'options' ); ?> !important;
  }
  #<?= $id; ?> .accordion-section-title.ui-accordion-header-active {
    background: <?= get_field( 'primary_color', 'options' ); ?>;
    border-color: <?= get_field( 'primary_color', 'options' ); ?> !important;
  }
  #<?= $id; ?> .accordion-section-title.ui-accordion-header-active h4 {
    color: #FFFFFF !important;
  }
  #<?= $id; ?> .accordion-section-title.ui-accordion-header-active .accordion-toggle {
    padding: 0.25rem 0 0;
  }
  #<?= $id; ?> .accordion-section-title.ui-accordion-header-active .accordion-toggle .line:first-child {
    transform: rotate(-40deg) translateX(25%);
  }
  #<?= $id; ?> .accordion-section-title.ui-accordion-header-active .accordion-toggle .line:last-child {
    transform: rotate(40deg) translateX(-25%);
  }
  #<?= $id; ?> .accordion-content ol, #<?= $id; ?> .accordion-content ul {
    margin-left: 0;
  }
  #<?= $id; ?> .accordion-content p {
    margin-bottom: 1.5em;
  }
</style>
