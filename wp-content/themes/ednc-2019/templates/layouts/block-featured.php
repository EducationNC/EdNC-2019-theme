<?php

use Roots\Sage\Media;
use Roots\Sage\AquaResizer;
global $featured_ids;
global $title;
$featured_ids[] = get_the_id();
$featured_image = Media\get_featured_image('featured-trending');

// $thumb = get_post_thumbnail_id();
// $img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
// $image_feature = aq_resize( $img_url, 600, 600, true ); //resize & crop the image
//
//
// $image_id = get_post_thumbnail_id();
// $featured_image_src = wp_get_attachment_image_src($image_id, 'trending');
?>

<article class="post">
  <div class="lead-image">
    <img src="<?php echo $featured_image; ?>" alt="" title="" />
  </div>
  <!-- <div class="lead-image">
    <img src="<?php// echo $image_feature; ?>" alt="" title="" />
  </div> -->
  <p class="caption"><?php echo $title; ?></p>
  <h3 class="post-title-trending"><?php the_title(); ?></h3>
  <?php get_template_part('templates/components/entry-meta-small'); ?>
  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
  <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
</article>
