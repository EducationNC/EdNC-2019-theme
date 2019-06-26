<style>

</style>


<?php

use Roots\Sage\Titles;

$term = get_queried_object();
$cat_id = $term->term_id;
$term_image = $term->term_image;
$term_image_src = wp_get_attachment_image_src($term_image, 'full');

if (isset($_GET['date'])) {
  $title = ": " . date('F j, Y', strtotime($_GET['date']));
}

if ( !empty($term_image) ) { ?>

<div class="row">
  <div class="col-md-12">
    <header class="">
      <div class="search-intro">
         <h1 class="entry-title white"><?= Titles\title() . $title; ?></h1>
      </div>
    </header>
  </div>
</div>

<?php } else { ?>
<div class="row">
  <div class="col-md-12">
    <header class="">
       <div class="search-intro">
          <h1 class="entry-title white"><?= Titles\title() . $title; ?></h1>
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
