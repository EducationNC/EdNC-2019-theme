<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
//$author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');

$featured_image = Media\get_featured_image('featured-four-block');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('spotlight-block-5 article-5 clearfix'); ?>>
  <div class="block-content">
    <img class="" src="<?php echo $featured_image; ?>" />
    <?php get_template_part('templates/components/article-info'); ?>
  </div>
</article>
