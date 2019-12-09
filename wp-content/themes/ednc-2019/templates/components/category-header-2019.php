<?php

use Roots\Sage\Titles;

$term = get_queried_object();
// $taxonomy = $term->taxonomy;
// $term_id = $term->term_id;

$cat_id = $term->term_id;
$category_image = get_field('category_full_width_banner');
$term_image = $term->term_image;
$term_image_src = wp_get_attachment_image_src($term_image, 'full');
$image_for_mobile = get_field('image_for_mobile', $term);
$test = get_field('test-for-category', $term);
$size = 'full';

if (isset($_GET['date'])) {
  $title = ": " . date('F j, Y', strtotime($_GET['date']));
}

if ( !empty($term_image) ) { ?>

<div class="">
  <img class="category-header-image" src="<?php echo $term_image_src[0]; ?>">
</div>


<!-- <div class="full-screen">
  <img class="category-header-image" src="<?php //echo $term_image_src[0]; ?>">
</div>

<div class="mobile-only">
  <img class="category-header-image-mobile" src="<?php //echo esc_url($image_for_mobile['url']); ?>" alt="<?php //echo esc_attr($image_for_mobile['alt']); ?>" />
</div>  -->

<?php } else { ?>

<div class="row">
  <div class="col-md-12">
    <header class="">
       <div class="search-intro">
         <h1 class="rd entry-title white"><?= Titles\title() . $title; ?> <small class="white"><a class="white" href="feed"><span class="icon-rss white"></span> RSS Feed</a></small></h1>
       </div>
    </header>
  </div>
  <!-- <header class="clear">
     <div class="search-intro">
  		<h1 class="h6 entry-title text-purple"><?= Titles\title() . $title; ?></h1>
     </div>
  </header> -->
</div>
<?php } ?>
