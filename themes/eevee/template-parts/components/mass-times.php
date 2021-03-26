<?php
/**
 * Partial for the Mass Times component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php if(have_rows('schedule', 'options')) : ?>
  <div class="mass-times">
    <?php while(have_rows('schedule', 'options')) : the_row();
      if(is_page_template('templates/homepage.php')) :
        if(get_sub_field('show')) :
          while(have_rows('times')) : the_row();
            if(get_sub_field('show')) :
              get_template_part( 'template-parts/components/mass-time', null, array('label'=>'tertiary', 'detail'=>'tertiary') );
            endif;
          endwhile;
        endif; ?>

      <?php else : // not homepage ?>
        <div class="mass-times-section has-primary-color">
          <h1 class="mass-times-title"><?= get_sub_field('section_title'); ?></h1>
          <?php while(have_rows('times')) : the_row();
            get_template_part( 'template-parts/components/mass-time', null, array('label'=>'secondary') );
          endwhile; ?>
        </div>
      <?php endif;
    endwhile; ?>
  </div>

<?php else : ?>
  <div class="no-mass-times">
    <h3 class="<?= is_page_template('templates/homepage.php') ? 'has-tertiary-color' : 'has-primary-color'; ?>">Sorry, but there are not any masses scheduled at this time.</h3>
  </div>
<?php endif;
