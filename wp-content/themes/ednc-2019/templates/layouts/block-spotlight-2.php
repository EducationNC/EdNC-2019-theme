<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
//$author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');

$featured_image = Media\get_featured_image('featured-two-block');
?>

<!-- <article <?php// post_class('spotlight-block-2 clearfix'); ?>>
  <div class="block-content">
    <img class="" src="<?php// echo $featured_image; ?>" />
  </div>
</article> -->

<article id="post-<?php the_ID(); ?>" <?php post_class('spotlight-block-2 article-2 clearfix'); ?>>
  <div class="block-content">
    <img class="" src="<?php echo $featured_image; ?>" />
    <?php get_template_part('templates/components/article-info'); ?>
  </div>
</article>
