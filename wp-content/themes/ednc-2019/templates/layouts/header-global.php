<?php
use Roots\Sage\Assets;
use Roots\Sage\Nav;
?>

<div class="global-nav">

  <a class="global-nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <img src="<?php echo Assets\asset_path('images/logo-square.svg'); ?>" alt="<?php bloginfo('name') ?>"></img>
  </a>

  <div class="global-nav__container">
    
    <div class="global-nav__row">
  
      <div class="global-nav__row__left">
        <a href="#" class="global-nav__menu">
          <img src="<?php echo Assets\asset_path('images/header/menu-button.svg'); ?>" alt="Menu">
        </a>
        
        <a href="#" class="global-nav__link">Give a Damn</a>
        <a href="#" class="global-nav__link">EdNews</a>
        <a href="#" class="global-nav__link">EdPerspectives</a>
        
      </div>
    
      <div class="global-nav__row__right">
        
        <a href="#" class="global-nav__link">Donate</a>
        <a href="#" class="global-nav__link global-nav__link--connect">Connect</a>
      
        <a href="#" class="global-nav__search">
          <img src="<?php echo Assets\asset_path('images/header/search-button.svg'); ?>" alt="Search">
        </a>
      </div>
      
    </div>
  
  </div>

</div>

<?php /*

<div class="top-nav" id="top-nav">
  <div class="flex-1">
  </div>
  <div class="flex-2">
    <div class="header-logos">
      <a class="" target="" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img class="main-logo" src="<?php echo Assets\asset_path('images/logo-square.svg'); ?>" alt="EdNC" /></img>
     </a>
    </div>
  </div>
  <div class="flex-3">
    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
    </style>
    <div id="mc_embed_signup">
    <form action="https://ednc.us9.list-manage.com/subscribe/post?u=8ba11e9b3c5e00a64382db633&amp;id=2696365d99" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">

    	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
    </form>
    </div>

      <!-- <form action="/action_page.php">
        <input class="subscribe" type="text" name="name" placeholder="Your Email Address">
        <input class="btn" type="submit" value="Subscribe">
      </form> -->
    </div>
  </div>
</div>

*/ ?>

<div class="spacer height-175">&nbsp;</div>
