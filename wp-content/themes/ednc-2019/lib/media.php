<?php

namespace Roots\Sage\Media;

use Roots\Sage\Assets;
use Roots\Sage\Resize;

/**
 * Define image sizes
 */

$large_width = 1240;
$large_height = 525;
$medium_width = 747;
$medium_height = 421;
$small_width = 564;
$small_height = 239;
$trending_width = 600;
$trending_height = 600;
$four_block_width = 747;
$four_block_height = 498;
// $four_block_width = 900;
// $four_block_height = 600;
$spotlight_one_width = 1128;
$spotlight_one_height = 400;
$hero_width = 1200;
$hero_height = 350;
$two_block_width = 544;
$two_block_height = 307;
$hero_narrow_height = 250;
// $three_block_width = 344;
// $three_block_height = 229;

add_image_size('medium-square', 400, 400, true);
add_image_size('bio-headshot', 220, 220, true);
add_image_size('bio-headshot-committee', 150, 220, true);
add_image_size('featured-large', $large_width, $large_height, true);
add_image_size('featured-medium', $medium_width, $medium_height, true);
add_image_size('featured-small', $small_width, $small_height, true);
add_image_size('Hero', 1200, 350, true);
add_image_size('Contained', 1200, 900, true);
add_image_size('featured-trending', $trending_width, $trending_height, true);
add_image_size('featured-four-block', $four_block_width, $four_block_height, true);
add_image_size('featured-spotlight-one', $spotlight_one_width, $spotlight_one_height, true);
add_image_size('featured-two-block', $two_block_width, $two_block_height, true);
add_image_size('featured-hero-narrow', $hero_width, $hero_narrow_height, true);
// add_image_size('featured-three-block', $three_block_width, $three_block_height, true);

add_action('init', function() {
  remove_image_size('guest-author-32');
  remove_image_size('guest-author-64');
  remove_image_size('guest-author-96');
  remove_image_size('guest-author-128');
});


/**
 * Get first image inside post content
 */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  if (isset($matches[1][0])) {
    $first_img = $matches[1][0];
  }

  return $first_img;
}



/**
 * Get featured image for post blocks
 */
 function get_featured_image($size) {
   global $post, $large_width, $large_height, $medium_width, $medium_height, $small_width,
   $small_height, $trending_width, $trending_height, $four_block_width, $four_block_height,
   $spotlight_one_width, $spotlight_one_height, $hero_width, $hero_height, $two_block_width,
   $two_block_height;

   if ($size == 'featured-large') {
     $width = $large_width;
     $height = $large_height;
   } elseif ($size == 'featured-medium') {
     $width = $medium_width;
     $height = $medium_height;
   } elseif ($size == 'featured-small') {
     $width = $small_width;
     $height = $small_height;
   } elseif ($size == 'featured-trending') {
     $width = $trending_width;
     $height = $trending_height;
   } elseif ($size == 'featured-four-block') {
     $width = $four_block_width;
     $height = $four_block_height;
   } elseif ($size == 'featured-spotlight-one') {
     $width = $spotlight_one_width;
     $height = $spotlight_one_height;
   } elseif ($size == 'featured-two-block') {
     $width = $two_block_width;
     $height = $two_block_height;
   } elseif ($size == 'featured-hero-narrow') {
     $width = $hero_width;
     $height = $hero_narrow_height;
   }

   // Use featured image if set, but fallback to first image in content if there is no featured image and EdNC logo if no image at all

   if (has_post_thumbnail()) {
     $image_id = get_post_thumbnail_id();
     $image_url = wp_get_attachment_image_src($image_id, "featured-$size");
     $image_url = wp_get_attachment_image_src($image_id, "$size");
     $image_sized['url'] = $image_url[0];
   } else {
     $image_src = catch_that_image();
     if ($image_src) {
       $image_sized = Resize\mr_image_resize($image_src, $width, $height, true, false);
     } else {
       if (has_term('perspectives', 'appearance')) {
         $image_sized['url'] = false;
       } elseif ($post->post_type == 'edtalk') {
         $image_sized['url'] = Assets\asset_path("images/edtalk-featured-$size.jpg");
       } else {
         $image_sized['url'] = Assets\asset_path("images/logo-featured-$size.jpg");
       }
     }
   }

   return $image_sized['url'];
 }

 /**
  * Enable adding images with custom image sizes in posts through media library
  * http://kucrut.org/insert-image-with-custom-size-into-post/
  */
 function insert_custom_image_sizes( $sizes ) {
   global $_wp_additional_image_sizes;
   if ( empty($_wp_additional_image_sizes) ) {
     return $sizes;
   }

   // foreach ( $_wp_additional_image_sizes as $id => $data ) {
   //   if ( !isset($sizes[$id]) )
   //   $sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
   // }

   // I just want to do this with medium-square size for now
   $sizes['medium-square'] = 'Medium Square';
   $sizes['bio-headshot'] = 'Author Headshot';

   return $sizes;
 }

 add_filter( 'image_size_names_choose', __NAMESPACE__ . '\\insert_custom_image_sizes' );

 function qse_embed_handler( $matches, $attr, $url, $rawattr ) {
 	if ( ! empty( $rawattr['width'] ) && ! empty( $rawattr['height'] ) ) {
 		$width  = (int) $rawattr['width'];
 		$height = (int) $rawattr['height'];
 	} else {
 		list( $width, $height ) = wp_expand_dimensions( 425, 326, $attr['width'], $attr['height'] );
 	}
 	$embed = "<div class='entry-content-asset qualtrics'><iframe src='https://".esc_attr($matches[1]).".qualtrics.com/".esc_attr($matches[2])."' name='Qualtrics' scrolling='auto' frameborder='0' height='{$height}' width='{$width}'></iframe></div>";
 	return apply_filters( 'qse_embed', $embed, $matches, $attr, $url, $rawattr );
 }
 wp_embed_register_handler( 'qse', '/https\:\/\/(.+?)\.qualtrics\.com\/(.+)/i' , __NAMESPACE__ . '\\qse_embed_handler' );

 function wpgm_embed_handler_googlemapsv1( $matches, $attr, $url, $rawattr ) {
 	if ( ! empty( $rawattr['width'] ) && ! empty( $rawattr['height'] ) ) {
 		$width  = (int) $rawattr['width'];
 		$height = (int) $rawattr['height'];
 	} else {
 		list( $width, $height ) = wp_expand_dimensions( 425, 326, $attr['width'], $attr['height'] );
 	}
 	return apply_filters( 'embed_googlemapsv1', "<div class='entry-content-asset'><iframe width='{$width}' height='{$height}' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.com/maps/embed/v1/place?q=" . esc_attr($matches[1]) . "&key=AIzaSyCI7Osh6uj1glo7DmUKY4lRJFVBey4pf1Y'></iframe></div>" );
 };
 wp_embed_register_handler( 'googlemapsv1', '#https?://www.google.com/maps/place/(.*?)/#i', __NAMESPACE__ . '\\wpgm_embed_handler_googlemapsv1' );
