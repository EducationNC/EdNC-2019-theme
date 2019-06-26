<?php

use Roots\Sage\Assets;
use Roots\Sage\Nav;

?>
<!-- <div class="top-nav-outer" id="top-nav-outer"> -->
<header class="header">
  <div class="top-nav" id="top-nav">
    <div class="flex-1">
      <div class="menu-btn">
         <a class="btn-open" href="javascript:void(0)"></a>
      </div>
    </div>
    <div class="flex-2">
      <div class="header-logos">
        <a class="" target="" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <!-- <img class="main-logo" src="<?php// echo Assets\asset_path('images/EdNC-logo.png'); ?>" alt="EdNC" /></img> -->
          <img class="main-logo" src="<?php echo Assets\asset_path('images/EdNC-logo-svg.svg'); ?>" alt="EdNC" /></img>
       </a>
      </div>
    </div>
    <div class="flex-3">

      <div class="social">
          <div class="search">
            <form name="search" class="searchbox" role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
              <input type="search" value="<?php the_search_query(); ?>" placeholder="Search..." name="s" id="searchbox-input" class="searchbox-input" required>
              <input type="submit" class="searchbox-submit" value="">
              <span class="searchbox-icon">
                <img src="<?php echo Assets\asset_path('images/search.svg'); ?>" width="30" alt="Search" /></img>
              </span>
            </form>
          </div>
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
        <div class="">
            <!-- GTranslate: https://gtranslate.io/ -->
            <!-- <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="glink nturl notranslate">English</a> <a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="glink nturl notranslate">Spanish</a> <style type="text/css">
            #goog-gt-tt {display:none !important;}
            .goog-te-banner-frame {display:none !important;}
            .goog-te-menu-value:hover {text-decoration:none !important;}
            .goog-text-highlight {background-color:transparent !important;box-shadow:none !important;}
            body {top:0 !important;}
            #google_translate_element2 {display:none!important;}
            </style>

            <div id="google_translate_element2"></div>
            <script type="text/javascript">
            function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
            </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


            <script type="text/javascript">
            function GTranslateGetCurrentLang() {var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}
            function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt)}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt)}}catch(e){}}
            function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(/goog-te-combo/.test(sel[i].className)){teCombo=sel[i];break;}if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}
            </script> -->
        </div>
        <div class="icon">
          <a cclass="gtranslate" href="#" id="gtranslate">
            <img src="<?php echo Assets\asset_path('images/message.svg'); ?>" width="" alt="Spanish" /></img>
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
      <!-- <div class="search-mobile mobile-only">
          <a class="" target="_blank" href="https://twitter.com/educationnc">
            <img src="<?php// echo Assets\asset_path('images/search.svg'); ?>" width="30" alt="Search" /></img>
          </a>
      </div> -->
  </div>
</header>
<!-- </div> -->

<div class="spacer height-200">
    &nbsp;
</div>


<div class="overlay">
   <div class="menu">
         <?php
         wp_nav_menu(array(
           'theme_location' => 'primary_navigation',
           // 'container' => false,
           // 'menu_class' => 'nav navbar-nav',
           // 'walker' => new Nav\Widgets_Nav_Walker()
         ));
         ?>
           <!-- <li><a href="#">Services</a>
               <ul>
                   <li><a href="#">Web design</a></li>
                   <li><a href="#">Development</a></li>
                   <li><a href="#">Apps</a></li>
                   <li><a href="#">Graphic Design</a></li>
                   <li><a href="#">Seo</a></li>
               </ul>
           </li> -->
   </div>
</div>
