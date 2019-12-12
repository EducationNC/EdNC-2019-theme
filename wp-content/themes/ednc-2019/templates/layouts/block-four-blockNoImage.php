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

$cat_name = ''; // I have this set in some shortcodes

if (!isset($cat_name) || $cat_name == '') {

  if ( class_exists('WPSEO_Primary_Term') ) {

    // Show the post's 'Primary' category, if this Yoast feature is available, & one is set. category can be replaced with custom terms

    $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );

    $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
    $term               = get_term( $wpseo_primary_term );

    if (is_wp_error($term)) {
        $categories = get_the_terms(get_the_ID(), 'category');
        $cat_name = $categories[0]->name;
    } else {
        $cat_name = $term->name;
    }

  } else {
    $categories = get_the_terms(get_the_ID(), 'category');
    $cat_name = $categories[0]->name;
  }
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
      <h3 class="post-title"><?php the_title(); ?></h3>
      <?php get_template_part('templates/components/entry-meta'); ?>
      <a class="mega-link" href="<?php the_permalink(); ?>"></a>
      <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
    </div>
  </div>
</article>
