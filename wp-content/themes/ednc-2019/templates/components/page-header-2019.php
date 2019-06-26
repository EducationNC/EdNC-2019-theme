<?php

use Roots\Sage\Titles;

$image_id = get_post_thumbnail_id();
$featured_image_hero = wp_get_attachment_image_src($image_id, 'Hero');
$featured_image_narrow = wp_get_attachment_image_src($image_id, 'featured-hero-narrow');
?>

<?php if (has_post_thumbnail() && !is_search()) { ?>
  <div class="bg-image">
    <img src="<?php echo $featured_image_narrow[0]; ?>">
  </div>
  <div class="container page-header">
    <div class="row page">
      <div class="col-md-9 col-centered">
        <h1 class="rd"><?= Titles\title(); ?></h1>
      </div>
    </div>
  </div>
<?php } else { ?>
  <div class="container page-header">
    <div class="row page">
      <div class="col-md-9 col-centered">
        <h1 class="rd"><?= Titles\title(); ?></h1>
      </div>
    </div>
  </div>
<?php } ?>
