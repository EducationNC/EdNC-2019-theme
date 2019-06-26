<?php

use Roots\Sage\Assets;

?>

<?php get_template_part('templates/layouts/logos'); ?>

<footer class="footer-btm">
  <div class="footer">
    <div class="footer-flex">
      <?php
      // check if the repeater field has rows of data
      if( have_rows('footer-links-large', 'option') ):

       	// loop through the rows of data
          while ( have_rows('footer-links-large', 'option') ) : the_row();

              // display a sub field value
              $url = get_sub_field('footer-url');
              $link = get_sub_field('footer-link-text');
              ?>
              <a href="<?php echo $url; ?>"><p class="lato"><?php echo $link; ?></p></a>

            <?php endwhile;

      else :

          // no rows found

      endif;

      ?>
    </div>
    <div class="footer-flex-small">
      <p class="lato"><?php the_field('footer_copyright', 'option'); ?></p>
      <?php
      // check if the repeater field has rows of data
      if( have_rows('footer-links-small', 'option') ):

       	// loop through the rows of data
          while ( have_rows('footer-links-small', 'option') ) : the_row();

              // display a sub field value
              $url = get_sub_field('footer-url');
              $link = get_sub_field('footer-link-text');
              ?>
              <a href="<?php echo $url; ?>"><p class="lato"><?php echo $link; ?></p></a>

            <?php endwhile;

      else :

          // no rows found

      endif;

      ?>
    </div>
  </div>
</footer>
