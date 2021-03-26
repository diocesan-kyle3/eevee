<?php
/**
 * The template for displaying functionality for Contact Persons.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eevee
 */

?>

<?php if(have_rows('contacts')) : ?>
  <div class="contact-persons">
    <?php while(have_rows('contacts')) : the_row(); ?>
      <?php if(get_sub_field('staff')) :
        $pid = get_sub_field('staff_po')->ID;
        $email = get_field('email', $pid);
        $name  = get_the_title($pid);
        $phone = get_field('phone', $pid);

        else :
          $email = get_sub_field('email');
          $name  = get_sub_field('name');
          $phone = get_sub_field('phone');
      endif; ?>

      <?php if($email || $name || $phone) : ?>
        <div class="contact-person">
          <?php if($name) : ?>
            <h5 class="contact-name has-primary-color"><?= $name; ?></h5>
          <?php endif; ?>

          <?php if($phone) : ?>
            <h6 class="contact-phone"><a href="<?= phone_link($phone); ?>" class="has-secondary-color has-primary-color-hover" title="Call <?= $name ? $name : 'Me'; ?>"><?= $phone; ?></a></h6>
          <?php endif; ?>

          <?php if($email) : ?>
            <h6 class="contact-email"><a href="mailto:<?= $email; ?>" class="has-secondary-color has-primary-color-hover" title="Email <?= $name ? $name : 'Me'; ?>"><?= $email; ?></a></h6>
          <?php endif; ?>
        </div>
      <?php endif;
    endwhile; ?>
  </div>
<?php endif;
