<?php

use Roots\Sage\Titles;

$image_id = get_post_thumbnail_id();
$featured_image_hero = wp_get_attachment_image_src($image_id, 'Full');
$featured_image_narrow = wp_get_attachment_image_src($image_id, 'large');
?>

<?php if (has_post_thumbnail() && !is_search()) { ?>
  <div class="bg-image">
    <img src="<?php echo $featured_image_hero[0]; ?>">
  </div>
<?php } else { ?>
  <div class="container page-header">
    <div class="row">
      <div class="col-md-8 col-centered">
        <h1><?= Titles\title(); ?></h1>
      </div>
    </div>
  </div>
<?php } ?>
