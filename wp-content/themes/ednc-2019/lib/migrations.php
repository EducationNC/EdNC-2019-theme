<?php

// migrate old posts to new default template
function migrate_post_default_template(){
  $products_query = new WP_Query(array('post_type'=>'product', 'posts_per_page' => '-1'));

  echo '<h1>Migrating Posts Default Template...</h1>';

//   while ($products_query->have_posts()) {
//     $products_query->the_post();
//     $_id = get_the_ID();

//     // get old meta
//     $price = get_post_meta($_id, 'product_price', true);

//     // update new meta
//     if (is_numeric($price)) {
//       update_post_meta($_id, '_price', $price);
//       echo '<h6>Updated: '. $_id .'</h6>';
//     } else {
//       echo '<h5 style="color:red">Non-numeric price found for post: '. $_id .'</h5>';
//     }
//     update_post_meta($_id, '_visibility', 'visible');
//     update_post_meta($_id, '_stock_status', 'instock');

//   }

  echo '<h1>Migration finished.</h1>';
}

if(isset($_GET['migrate_post_default_template']) && is_super_admin()) {
    migrate_post_default_template();
}