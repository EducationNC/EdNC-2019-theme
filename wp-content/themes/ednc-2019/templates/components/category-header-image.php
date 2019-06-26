<?php

use Roots\Sage\Titles;

$term = get_queried_object();
$cat_id = $term->term_id;
$term_image = $term->term_image;
$term_image_src = wp_get_attachment_image_src($term_image, 'full');

?>

<div class="bg-image">
  <img src="https://edncdev.wpengine.com/wp-content/uploads/2019/03/07_justice.jpg">
</div>
