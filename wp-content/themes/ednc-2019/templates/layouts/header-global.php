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

        <?php $menus = get_nav_menu_locations(); ?>
        <?php if ($menu = wp_get_nav_menu_items($menus['left_navigation'])): foreach ($menu as $item): ?>
          <a href="<?php echo $item->url ?>" class="global-nav__link <?php echo implode(" ", $item->classes) ?>"><?php echo $item->title ?></a>
        <?php endforeach; endif; ?>

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

        <?php $menus = get_nav_menu_locations(); ?>
        <?php if ($menu = wp_get_nav_menu_items($menus['right_navigation'])): foreach ($menu as $item): ?>
          <a href="<?php echo $item->url ?>" class="global-nav__link <?php echo implode(" ", $item->classes) ?>"><?php echo $item->title ?></a>
        <?php endforeach; endif; ?>

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

          <div class="global-nav__connect-menu__signup">

            <div class="global-nav__connect-menu__signup__title"><?php the_field('daily_headlines', 'option'); ?></div>

            <form action="https://ednc.us9.list-manage.com/subscribe/post?u=8ba11e9b3c5e00a64382db633&amp;id=2696365d99" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="your@email.com" required>
              <div class="mc-field-group input-group">
                <ul>
                  <li><input type="checkbox" value="1" name="group[13145][1]" id="mce-group[13145]-13145-0" checked=checked><label for="mce-group[13145]-13145-0">Daily digest</label></li>
                  <li><input type="checkbox" value="2" name="group[13145][2]" id="mce-group[13145]-13145-1" checked=checked><label for="mce-group[13145]-13145-1">Weekly wrapup</label></li>
                  <li><input type="checkbox" value="64" name="group[13145][64]" id="mce-group[13145]-13145-2" checked=checked><label for="mce-group[13145]-13145-2">Breaking news alerts</label></li>
                  <li><input type="checkbox" value="2097152" name="group[13145][2097152]" id="mce-group[13145]-13145-3" checked=checked><label for="mce-group[13145]-13145-3">Reach roundup</label></li>
                  <li><input type="checkbox" value="4194304" name="group[13145][4194304]" id="mce-group[13145]-13145-4" checked=checked><label for="mce-group[13145]-13145-4">Friday@Five</label></li>
                  <li><input type="checkbox" value="8388608" name="group[13145][8388608]" id="mce-group[13145]-13145-5" checked=checked><label for="mce-group[13145]-13145-5">Awake 58</label></li>
                  <li><input type="checkbox" value="134217728" name="group[13145][134217728]" id="mce-group[13145]-13145-8" checked=checked><label for="mce-group[13145]-13145-8">Early Bird</label></li>
                </ul>
              </div>
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>
              <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
            </form>

          </div>

          <div class="global-nav__connect-menu__newsletters-link">
            <a href="/newsletters/"><?php the_field('all_news', 'option'); ?></a>
          </div>

          <div class="global-nav__connect-menu__txt-msg">
            <a href="/reach-nc-voices/"><?php the_field('text_alerts', 'option'); ?></a>
          </div>

        </div>

      </div>

    </div>

  </div>

  <div class="global-nav__search-dropdown">

    <form action="/" method="get" class="global-nav__search-dropdown__form">
      <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search EdNC.org">
      <input type="image" alt="Search" src="<?php echo Assets\asset_path('images/header/search-icon.svg'); ?>">
    </form>

  </div>

</div>

<div class="global-nav-mobile">

  <div class="global-nav-mobile__main">
    <?php
    wp_nav_menu(array(
     'theme_location' => 'primary_navigation',
      'menu_class' => 'global-nav-mobile__main__nav',
      'depth' => 2
    ));
    ?>
  </div>

  <div class="global-nav-mobile__footer">

    <div class="global-nav-mobile__footer__social">

      <a class="icon-facebook" href="https://facebook.com/educationnc" target="_blank"></a>
      <a class="icon-twitter" href="https://twitter.com/educationnc" target="_blank"></a>
      <a class="icon-youtube" href="https://www.youtube.com/channel/UCJto5My-_AVw1Nx5AGq8TEQ" target="_blank"></a>
      <a class="icon-instagram" href="https://instagram.com/educationnc" target="_blank"></a>
      <a class="icon-rss" href="<?php echo get_bloginfo('rss2_url'); ?>"></a>

    </div>

    <div class="global-nav-mobile__footer__signup">


      <form action="https://ednc.us9.list-manage.com/subscribe/post?u=8ba11e9b3c5e00a64382db633&amp;id=2696365d99" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Get Daily Headlines" required>
        <div class="mc-field-group input-group">
          <ul>
            <li><input type="checkbox" value="1" name="group[13145][1]" id="mce-group[13145]-13145-0" checked=checked><label for="mce-group[13145]-13145-0">Daily digest</label></li>
            <li><input type="checkbox" value="2" name="group[13145][2]" id="mce-group[13145]-13145-1" checked=checked><label for="mce-group[13145]-13145-1">Weekly wrapup</label></li>
            <li><input type="checkbox" value="64" name="group[13145][64]" id="mce-group[13145]-13145-2" checked=checked><label for="mce-group[13145]-13145-2">Breaking news alerts</label></li>
            <li><input type="checkbox" value="2097152" name="group[13145][2097152]" id="mce-group[13145]-13145-3" checked=checked><label for="mce-group[13145]-13145-3">Reach roundup</label></li>
            <li><input type="checkbox" value="4194304" name="group[13145][4194304]" id="mce-group[13145]-13145-4" checked=checked><label for="mce-group[13145]-13145-4">Friday@Five</label></li>
            <li><input type="checkbox" value="8388608" name="group[13145][8388608]" id="mce-group[13145]-13145-5" checked=checked><label for="mce-group[13145]-13145-5">Awake 58</label></li>
            <li><input type="checkbox" value="134217728" name="group[13145][134217728]" id="mce-group[13145]-13145-8" checked=checked><label for="mce-group[13145]-13145-8">Early Bird</label></li>
          </ul>
        </div>
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>
        <input type="submit" value="SUBMIT" name="subscribe" id="mc-embedded-subscribe" class="button">
      </form>

    </div>

    <div class="global-nav-mobile__footer__txt-msg">
      <a href="#"><?php the_field('text_alerts', 'option'); ?></a>
    </div>

  </div>
</div>

<div class="global-nav-spacer"></div>
