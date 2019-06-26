<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
// $author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');

$featured_image = Media\get_featured_image('featured-four-block');

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
      <p class="small">News</p>
      <?php get_template_part('templates/components/article-info'); ?>
    </div>
  <?php } ?>

  </div>
</article>
