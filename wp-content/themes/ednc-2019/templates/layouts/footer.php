<?php

use Roots\Sage\Assets;

?>

<div class="logo-section">
  <div class="logo-section__row">
    <?php if( have_rows('logos_section_1', 'option') ): ?>
      <?php while( have_rows('logos_section_1', 'option') ): the_row(); ?>
        <?php
        $logo = get_sub_field('logo');
        $width = get_sub_field('width');
        $org = get_sub_field('organization');
        ?>
          <div class="logo-section__row__logo">
            <?php if ($logo): ?>
              <img class="" src="<?php echo $logo['url']; ?>" alt="<?php echo $org ?>"
                <?php if ($width): ?>style="width: <?php echo $width ?>;"<?php endif; ?>>
            <?php endif; ?>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <div class="logo-section__row">
    <?php if( have_rows('logos_section_2', 'option') ): ?>
      <?php while( have_rows('logos_section_2', 'option') ): the_row(); ?>
        <?php
        $logo = get_sub_field('logo');
        $width = get_sub_field('width');
        $org = get_sub_field('organization');
        ?>
          <div class="logo-section__row__logo">
            <?php if ($logo): ?>
              <img class="" src="<?php echo $logo['url']; ?>" alt="<?php echo $org ?>"
                <?php if ($width): ?>style="width: <?php echo $width ?>;"<?php endif; ?>>
            <?php endif; ?>
          </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>

<footer class="footer-bottom">

  <div class="container">

    <div class="row footer-bottom__row">

      <div class="col-md-4">

        <div class="footer-bottom__social">

          <a class="icon-facebook" href="https://facebook.com/educationnc" target="_blank"></a>
          <a class="icon-twitter" href="https://twitter.com/educationnc" target="_blank"></a>
          <a class="icon-youtube" href="https://www.youtube.com/channel/UCJto5My-_AVw1Nx5AGq8TEQ" target="_blank"></a>
          <a class="icon-instagram" href="https://instagram.com/educationnc" target="_blank"></a>
          <a class="icon-rss" href="<?php echo get_bloginfo('rss2_url'); ?>"></a>

        </div>

      </div>

      <div class="col-md-4">

        <div class="footer-bottom__signup">

          <form action="https://ednc.us9.list-manage.com/subscribe/post?u=8ba11e9b3c5e00a64382db633&amp;id=2696365d99" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Get Daily Headlines" required>
            <div class="mc-field-group input-group">
              <ul>
                <li><input type="checkbox" value="1" name="group[13145][1]" id="mce-group[13145]-13145-0" checked=checked></li>
                <li><input type="checkbox" value="2" name="group[13145][2]" id="mce-group[13145]-13145-1" checked=checked></li>
                <li><input type="checkbox" value="64" name="group[13145][64]" id="mce-group[13145]-13145-2" checked=checked></li>
                <li><input type="checkbox" value="2097152" name="group[13145][2097152]" id="mce-group[13145]-13145-3" checked=checked></li>
                <li><input type="checkbox" value="4194304" name="group[13145][4194304]" id="mce-group[13145]-13145-4" checked=checked></li>
                <li><input type="checkbox" value="8388608" name="group[13145][8388608]" id="mce-group[13145]-13145-5" checked=checked></li>
                <li><input type="checkbox" value="134217728" name="group[13145][134217728]" id="mce-group[13145]-13145-8" checked=checked></li>
              </ul>
            </div>
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>
            <input type="submit" value="SUBMIT" name="subscribe" id="mc-embedded-subscribe" class="button">
          </form>

        </div>

      </div>

      <div class="col-md-4">
        <p class="footer-bottom__copyright">&copy <?php echo Date('Y'); ?> <?php the_field('footer_copyright', 'option'); ?></p>
      </div>

    </div>

  </div>
</footer>
