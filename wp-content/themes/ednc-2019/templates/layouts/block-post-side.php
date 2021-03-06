<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;
use Roots\Sage\Resize;

if ($post->post_type == 'post') {
  $video = has_post_format('video');

  $author_id = get_the_author_meta('ID');
  $author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
  $author_avatar = get_field('avatar', $author_bio[0]->ID);
  $author_avatar_sized = Resize\mr_image_resize($author_avatar, 140, null, false, '', false);
}

if ( function_exists( 'coauthors_posts_links' ) ) {
  $authors = get_coauthors();
  foreach ($authors as $a) {
    $classes[] = $a->user_nicename;
  }
} else {
  $classes[] = get_the_author_meta('user_nicename');
}

$featured_image = Media\get_featured_image('medium');
$title_overlay = get_field('title_overlay');
?>

<article <?php post_class('block-post row ' . implode($classes, ' ')); ?>>
  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
  <div class="col-sm-5">
    <div class="photo-overlay">
      <?php if (!empty($featured_image)) { ?>
        <img class="post-thumbnail" src="<?php echo $featured_image; ?>" />
      <?php } else { ?>
        <div class="circle-image">
          <?php echo $author_pic; ?>
        </div>
      <?php } ?>

      <?php
      if ($video) {
        echo '<div class="video-play"></div>';
      }

      if ( ! empty($title_overlay) && empty($featured_image)) { ?>
        <img class="title-image-overlay" src="<?php echo $title_overlay['url']; ?>" alt="<?php the_title(); ?>" />
      <?php } ?>
    </div>
  </div>

  <header class="col-sm-7 entry-header">
    <h3 class="post-title"><?php the_title(); ?></h3>
    <?php get_template_part('templates/components/entry-meta'); ?>
  </header>
</article>
