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
          <img src="<?php echo Assets\asset_path('images/header/menu-button.svg'); ?>" alt="Menu"
            class="global-nav__menu__icon">
          <img src="<?php echo Assets\asset_path('images/header/close-button.svg'); ?>" alt="Close"
            class="global-nav__menu__icon--close">
        </a>
        
        <a href="#" class="global-nav__link">Give a Damn</a>
        <a href="#" class="global-nav__link">EdNews</a>
        <a href="#" class="global-nav__link">EdPerspectives</a>
        
        <div class="global-nav__hamburger">
          
         <?php
         wp_nav_menu(array(
           'theme_location' => 'primary_navigation',
            'menu_class' => 'global-nav__hamburger__nav',
            'depth' => 2
         ));
         ?>
          
        </div>
        
      </div>
    
      <div class="global-nav__row__right">
      
        <form action="/" method="get" class="global-nav__row__right__search">
          <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search EdNC.org">
          <input type="image" alt="Search" src="<?php echo Assets\asset_path('images/header/search-icon.svg'); ?>">
        </form>
        
        <a href="#" class="global-nav__link">Donate</a>
        <a href="#" class="global-nav__link global-nav__link--connect">Connect</a>
      
        <a href="#" class="global-nav__search">
          <img src="<?php echo Assets\asset_path('images/header/search-button.svg'); ?>" alt="Search" 
            class="global-nav__search__icon">
          <img src="<?php echo Assets\asset_path('images/header/close-button.svg'); ?>" alt="Close"
            class="global-nav__search__icon--close">
        </a>
        
        <div class="global-nav__connect-menu">
          
          <div class="global-nav__connect-menu__social">
           
            <a class="icon-facebook" href="https://facebook.com/educationnc" target="_blank"></a>
            <a class="icon-twitter" href="https://twitter.com/educationnc" target="_blank"></a>
            <a class="icon-youtube" href="https://www.youtube.com/channel/UCJto5My-_AVw1Nx5AGq8TEQ" target="_blank"></a>
            <a class="icon-instagram" href="https://instagram.com/educationnc" target="_blank"></a>
            <a class="icon-rss" href="<?php echo get_bloginfo('rss2_url'); ?>"></a>
           
          </div>
          
          <div class="global-nav__connect-menu__signup"></div>
          
          <div class="global-nav__connect-menu__txt-msg"></div>
          
        </div>
        
      </div>
      
    </div>
  
  </div>

</div>

<div class="spacer height-175">&nbsp;</div>
