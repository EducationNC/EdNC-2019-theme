<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
$featured_image = Media\get_featured_image('featured-four-block');


$column = wp_get_post_terms(get_the_id(), 'column');
if ($column) {
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
  $post_type = "News";
}

?>

<article <?php post_class('post'); ?>>
  <div class="block-content">
    <div class="lead-image">
      <!-- <img class="recent-block-image" src="<?php// echo $featured_image; ?>" /> -->
      <img src="<?php echo $featured_image; ?>" />
    </div>
    <p class="caption"><?php echo $post_type ?></p>
    <h3 class="post-title-recent"><?php the_title(); ?></h3>
    <?php get_template_part('templates/components/entry-meta-small'); ?>
    <a class="mega-link" href="<?php the_permalink(); ?>"></a>
  </div>
</article>
