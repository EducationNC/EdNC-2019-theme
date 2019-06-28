<?php

use Roots\Sage\Assets;

?>
<section class="block social-widget">
  <div class="widget-content">

    <?php if( have_rows('social', 'option') ): ?>
      <?php while( have_rows('social', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <div class="header-big">
          <?php	if( !empty($image) ): ?>
             <!-- <a href="<?php echo site_url(); ?>"> -->
               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
             <!-- </a> -->
          <?php endif; ?>
            <img class="section-icon" src="<?php echo Assets\asset_path('images/social.svg'); ?>">
            <?php echo $header ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <div class="content-box-container-social">
      <!-- <div class="social"> -->
        <?php
        // Use shortcode in a PHP file (outside the post editor).
        echo do_shortcode( '' );

        // Use shortcodes in form like Landing Page Template.
        echo do_shortcode( '[custom-twitter-feeds screenname="educationnc" num=8]' );

        // Store the short code in a variable.
        $var = do_shortcode( '' );
        echo $var;
        ?>

    </div>

  </div>

</section>
