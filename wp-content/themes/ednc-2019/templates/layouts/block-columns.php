<?php

use Roots\Sage\Media;

$author_id = get_the_author_meta('ID');
$author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
$featured_image = Media\get_featured_image('featured-four-block');
$user = get_field('user');

$column = wp_get_post_terms(get_the_id(), 'column');
if ($column) {
  $post_type = $column[0]->name;
}
// elseif ( has_term( 'press-release', 'appearance' ) ) {
//   $post_type = "Press Release";
// }
elseif ( has_term ( 'issues', 'appearance' ) ) {
  $post_type = "Issues";
}
else {
  $post_type = "News";
}
?>

<article <?php post_class('block-news content-block-4 clearfix'); ?>>
 <?php ?>
 <div class="flex">
   <a class="" href="<?php the_permalink(); ?>"></a>
   <div class="block-content">
     <img class="" src="<?php echo $featured_image; ?>" />
     <!-- <p class=""><?php// print_r ($author_bio)?></p>
     <p class=""><?php //echo get_author_posts_url($user['ID']); ?></p> -->
     <!-- <p class="small"><?php //echo $post_type ?></p> -->
     <?php get_template_part('templates/components/article-info'); ?>
   </div>
 </div>
</article>
