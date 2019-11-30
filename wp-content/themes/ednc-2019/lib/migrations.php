<?php

// migrate old posts to new default template
function migrate_post_default_template(){
  $posts_query = new WP_Query(array(
    'post_type'=>'post', 
    'posts_per_page' => '-1',
    'date_query'     => array('before' => '2019-10-01'),
  ));

  echo '<h1>Migrating Posts Default Template...</h1>';

  while ($posts_query->have_posts()) {
    $posts_query->the_post();
    $_id = get_the_ID();

    // get old meta
    update_post_meta($_id, '_wp_page_template', array('page-2016-Template.php'));
    echo "Updated: " . get_the_title() . "<br>";
  }

  echo '<h1>Migration finished.</h1>';
}

if(isset($_GET['migrate_post_default_template']) && is_super_admin()) {
    migrate_post_default_template();
}