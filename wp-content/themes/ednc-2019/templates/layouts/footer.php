<?php

use Roots\Sage\Assets;

?>

<div class="logo-section">
  <div class="logos-large">
    <?php if( have_rows('large_logo', 'option') ): ?>
      <?php while( have_rows('large_logo', 'option') ): the_row(); ?>
        <?php 
        $large_logo = get_sub_field('large_logos');
        $width = get_sub_field('width');
        ?>
          <div class="logo">
            <?php if ($large_logo): ?>
              <img class="" src="<?php echo $large_logo['url']; ?>" alt="<?php echo $large_logo['alt'] ?>"
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
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
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
