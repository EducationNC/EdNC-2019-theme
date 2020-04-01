<?php
$img = $post->cse_img;
if (!$img) {
  $image_id = get_post_thumbnail_id();
  $featured_image = wp_get_attachment_image_src($image_id, 'medium');
  if ($featured_image) {
    $img = $featured_image[0]; 
  }
}
?>
<article <?php post_class('block-post clearfix'); ?>>
  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
  <?php if ($img): ?>
    <div class="col-sm-5">
      <div class="photo-overlay">
        <img class="post-thumbnail" src="<?php echo $img; ?>" />
      </div>
    </div>

    <div class="col-sm-7">
  <?php else: ?>
    <div class="col-sm-12">
  <?php endif; ?>
      <header>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php if (get_post_type() === 'post') { get_template_part('templates/components/entry-meta'); } ?>
      </header>

      <div class="excerpt">
        <?php echo get_truncated_excerpt(270); ?>
      </div>
    </div>
</article>
