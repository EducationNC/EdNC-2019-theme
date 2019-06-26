<?php

use Roots\Sage\Assets;
use Roots\Sage\Nav;

?>

<div class="top-nav" id="top-nav">
  <div class="flex-1">
  </div>
  <div class="flex-2">
    <div class="header-logos">
      <a class="" target="" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img class="main-logo" src="<?php echo Assets\asset_path('images/EdNC-logo-svg.svg'); ?>" alt="EdNC" /></img>
     </a>
    </div>
    <div class="second">
      <div class="secondary-logos full-screen">
        <a class="secondary-logo" target="_blank" href="https://nccppr.org/">
          <img class="secondary-logo-img" src="<?php echo Assets\asset_path('images/NCCPPR-logo-long.svg'); ?>"></img>
        </a>
        <a class="secondary-logo" target="_blank" href="https://www.firstvotenc.org/">
          <img class="secondary-logo-img" src="<?php echo Assets\asset_path('images/FirstVoteNC-stamp-purple.png'); ?>"></img>
        </a>
        <a class="secondary-logo" target="_blank" href="https://www.reachncvoices.org/">
          <img class="secondary-logo-img" src="<?php echo Assets\asset_path('images/ReachNCVoices-stamp-purple.png'); ?>"></img>
        </a>
      </div>
    </div>
  </div>
  <div class="flex-3">
    <div class="social">
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
    <div class="second-row full-screen">
      <div class="icon">
        <a cclass="gtranslate" href="#" id="gtranslate">
          <img src="<?php echo Assets\asset_path('images/translate-1.svg'); ?>" width="" alt="Spanish" /></img>
        </a>
      </div>
      <div class="icon">
        <a class="" target="_blank" href="http://m.me/educationnc">
          <img src="<?php echo Assets\asset_path('images/message.svg'); ?>" width="" alt="Message" /></img>
        </a>
      </div>
      <div class="icon">
        <a class="" target="_blank" href="<?php echo get_bloginfo('rss2_url'); ?>">
          <img src="<?php echo Assets\asset_path('images/rss-1.svg'); ?>" width="" alt="RSS" /></img>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="spacer height-175">
    &nbsp;
</div>
