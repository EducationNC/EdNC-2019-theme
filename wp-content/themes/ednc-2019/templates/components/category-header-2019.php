<?php

use Roots\Sage\Titles;

$term = get_queried_object();
$cat_id = $term->term_id;
$term_image = $term->term_image;
$term_image_src = wp_get_attachment_image_src($term_image, 'featured-hero-narrow');

if (isset($_GET['date'])) {
  $title = ": " . date('F j, Y', strtotime($_GET['date']));
}

if ( !empty($term_image) ) { ?>

<div class="bg-image">
  <img src="<?php echo $term_image_src[0]; ?>">
</div>

<?php } else { ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <header class="">
         <div class="search-intro">
           <h1 class="rd entry-title white"><?= Titles\title() . $title; ?> <small class="white"><a class="white" href="feed"><span class="icon-rss white"></span>RSS Feed</a></small></h1>
         </div>
      </header>
    </div>
  </div>
</div>
<?php } ?>
