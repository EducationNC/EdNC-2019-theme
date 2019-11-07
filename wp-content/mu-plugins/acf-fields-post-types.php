<?php
/*
Plugin Name: ACF Fields and Post Types
Description: Custom fields core to this website
Author: EdNC
Version: 1.0
Author URI: http://ednc.org
*/

add_action( 'plugins_loaded', 'load_custom_fields' );

function load_custom_fields() {
  
  require('acf-fields-post-types/acf-fields-community-colleges.php');
  require('acf-fields-post-types/acf-fields-charts.php');
  require('acf-fields-post-types/acf-fields-districts.php');
  
}

add_action( 'init', 'custom_post_type_offers', 0 );

function custom_post_type_offers() {
    
    require('acf-fields-post-types/post-types.php');
    
}