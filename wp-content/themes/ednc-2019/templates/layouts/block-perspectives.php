<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
$author_pic = get_the_post_thumbnail($author_bio[0]->ID, 'thumbnail');

$featured_image = Media\get_featured_image('featured-four-block');
?>

<article <?php post_class('block-perspectives content-block-3 clearfix'); ?>>
  <?php if (has_term('perspectives', 'appearance')) { ?>
    <a class="" href="<?php the_permalink(); ?>"></a>
    <div class="block-content">
      <img class="" src="<?php echo $featured_image; ?>" />
      <!-- <p class="small">Perspectives</p> -->
      <?php get_template_part('templates/components/article-info'); ?>
    </div>
  <?php } ?>
</article>
