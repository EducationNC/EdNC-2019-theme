<?php

use Roots\Sage\Assets;
use Roots\Sage\Nav;

?>

<?php// echo the_permalink();  ?>



<div class="top-nav" id="top-nav">
  <div class="flex-1">
  </div>
  <div class="flex-2">
    <div class="header-logos">
      <a class="" target="" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img class="main-logo-article" id="main-logo-article" src="<?php echo Assets\asset_path('images/EdNC-stamp-purple.png'); ?>" alt="EdNC" /></img>
      </a>
      <p class="header-title small hide"><?php echo get_the_title(); ?></p>
    </div>
  </div>
  <div class="flex-3">
    <div class="social">
        <p class="patrick">Please</p>
        <div class="icon">
          <a class="" target="_blank" href="https://www.facebook.com/educationnc">
            <img src="<?php echo Assets\asset_path('images/fb-icon.svg'); ?>" width="" alt="Facebook" /></img>
          </a>
        </div>
        <div class="icon">
          <a class="" target="_blank" href="https://www.instagram.com/educationnc/">
            <img src="<?php echo Assets\asset_path('images/instagram-icon.svg'); ?>" width="" alt="Instagram" /></img>
          </a>
        </div>
        <div class="icon">
          <a class="" target="_blank" href="https://twitter.com/educationnc">
            <img src="<?php echo Assets\asset_path('images/twitter-icon.svg'); ?>" width="" alt="Twitter" /></img>
          </a>
        </div>
    </div>
  </div>
</div>

<div class="spacer-article height-95-article">
    &nbsp;
</div>
