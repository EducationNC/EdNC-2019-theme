<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;
use Roots\Sage\Resize;

if ($post->post_type == 'post') {
  $video = has_post_format('video');

  $author_id = get_the_author_meta('ID');
  $author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
  //$author_avatar = get_field('avatar', $author_bio[0]->ID);
  //$author_avatar_sized = Resize\mr_image_resize($author_avatar, 140, null, false, '', false);
}

$column = wp_get_post_terms(get_the_id(), 'column');
if ( has_term( 'perspectives', 'appearance' ) ) {
  $post_type = "Perspective";
}
elseif ( has_term ( 'news', 'appearance' ) ) {
  $post_type = "News";
}
elseif ( has_term ( 'featured', 'appearance' ) ) {
  $post_type = "Featured";
}
else {
  $post_type = "";
}

if ( function_exists( 'coauthors_posts_links' ) ) {
  $authors = get_coauthors();
  foreach ($authors as $a) {
    $classes[] = $a->user_nicename;
  }
} else {
  $classes[] = get_the_author_meta('user_nicename');
}

$featured_image = Media\get_featured_image('featured-four-block');
// $featured_image = Media\get_featured_image('featured-four-block');
$title_overlay = get_field('title_overlay');
?>


<article <?php post_class('block-news content-block-4 clearfix'); ?>>
  <div class="flex">
    <div class="block-content">
      <?php if (!empty($featured_image)) { ?>
        <img src="<?php echo $featured_image; ?>" />
      <?php } else { ?>
        <div class="circle-image">
          <?php// echo $author_pic; ?>
        </div>
      <?php } ?>
      <p class="small"><?php echo $post_type; ?></p>
      <h3 class="post-title"><?php the_title(); ?></h3>
      <?php get_template_part('templates/components/entry-meta'); ?>
      <a class="mega-link" href="<?php the_permalink(); ?>"></a>
      <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
    </div>
  </div>
</article>
