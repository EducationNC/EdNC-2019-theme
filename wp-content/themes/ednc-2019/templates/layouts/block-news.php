<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
// $author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');

$featured_image = Media\get_featured_image('featured-four-block');
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

<article <?php post_class('block-news content-block-4 clearfix'); ?>>

  <div class="flex">
  <?php if (has_term('news', 'appearance')) { ?>
    <div class="block-content">
      <?php if (!empty($featured_image)) { ?>
        <img class="" src="<?php echo $featured_image; ?>" />
      <?php } else { ?>
        <div class="circle-image">
          <?php echo $author_pic; ?>
        </div>
      <?php } ?>
      <p class="small"><?php echo $cat_name ?></p>
      <?php get_template_part('templates/components/article-info'); ?>
    </div>
  <?php } ?>

  </div>
</article>
