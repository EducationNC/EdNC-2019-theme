<?php

use Roots\Sage\Assets;
use Roots\Sage\Nav;

?>

<header id="header" class="banner visible-md-block visible-lg-block" role="banner">
  <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo Assets\asset_path('images/logo-square.svg'); ?>" alt="EdNC" /></a>

  <div class="container-fluid">
    <div class="pull-right text-right">
      <ul class="list-inline minor-links">
        <li>
          <div id="header-search">
            <?php get_template_part('templates/components/searchform'); ?>
            <a class="icon-search" id="icon-search" href="javascript:void(0);"></a>
          </div>
        </li>
        <li><a class="icon-facebook" href="https://facebook.com/educationnc" target="_blank"></a></li>
        <li><a class="icon-twitter" href="https://twitter.com/educationnc" target="_blank"></a></li>
        <li><a class="icon-youtube" href="https://www.youtube.com/channel/UCJto5My-_AVw1Nx5AGq8TEQ" target="_blank"></a></li>
        <li><a class="icon-instagram" href="https://instagram.com/educationnc" target="_blank"></a></li>
        <li><a class="icon-rss" href="<?php echo get_bloginfo('rss2_url'); ?>"></a></li>
        <li><a class="gtranslate" href="#" id="gtranslate" title="en Español">en Español</a></li>
      </ul>
    </div>
  </div>

  <nav class="navbar navbar-default" data-topbar role="navigation">

    <div class="navbar-left">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary_navigation',
        'container' => false,
        'menu_class' => 'nav navbar-nav',
        'walker' => new Nav\Widgets_Nav_Walker()
      ));

      if (function_exists('widgetize_my_dropdown_menus')) {
        widgetize_my_dropdown_menus('primary_navigation');
      }
      ?>
    </div>

    <div class="navbar-right">
      <div class="btn-group">
        <a href="http://m.me/educationnc" target="_blank" class="btn btn-info btn-fb-msg" ><img src="https://www.ednc.org/wp-content/uploads/2017/04/facebook-messanger-icon-new.png" alt="facebook">Message</a>
        <a href="#" class="btn btn-default" data-toggle="modal" data-target="#emailSignupModal">Subscribe</a>
        <!-- <a href="https://support.ednc.org/donate" class="btn btn-primary">Donate</a> -->

        <!-- <a class="btn btn-primary" href="<?php echo get_permalink($events_page->ID); ?>"><?php echo $events_page->post_title; ?></a> -->
        <a class="btn btn-primary" href="<?php echo get_page_link( get_page_by_title( Donate )->ID ); ?>">Donate</a>
      </div>
    </div>
  </nav>
</header>
