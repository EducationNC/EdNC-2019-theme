<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
$featured_image = Media\get_featured_image('featured-four-block');

/*
$appearance = wp_get_post_terms(get_the_id(), 'appearance');
if ($appearance) {
  $post_type = $column[0]->name;
  // $post_type = "";
}
elseif ($post->post_type == 'edtalk') {
  $post_type = "Edtalk";
}
elseif ($post->post_type == 'map') {
  $post_type = "Maps";
}
else  {
  $post_type = "";
}
*/

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

?>

<article <?php post_class('post'); ?>>
  <div class="block-content">
    <div class="lead-image">
      <!-- <img class="recent-block-image" src="<?php// echo $featured_image; ?>" /> -->
      <img src="<?php echo $featured_image; ?>" />
    </div>
    <p class="caption"><?php echo $cat_name ?></p>
    <h3 class="post-title-recent"><?php the_title(); ?></h3>
    <?php get_template_part('templates/components/entry-meta-small'); ?>
    <a class="mega-link" href="<?php the_permalink(); ?>"></a>
  </div>
</article>
