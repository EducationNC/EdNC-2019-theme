<?php

// migrate old posts to new default template
function migrate_post_default_template() {
  
  $paged = 1;
  
  if (isset($_GET['set'])) {
     $paged = $_GET['set'];
  }
  
  $posts_query = new WP_Query(array(
    'post_type'=>'post', 
    'posts_per_page' => '500',
    'paged' => $paged,
    'date_query'     => array('before' => '2019-12-20'),
  ));

  echo '<h1>Migrating Posts Default Template...</h1>';

  while ($posts_query->have_posts()) {
    $posts_query->the_post();
    $_id = get_the_ID();

    // get old meta
    $update = update_post_meta($_id, '_wp_page_template', array('page-2016-Template.php'));
    if (!$update) {
      echo 'Update to: <a href="'.  get_the_permalink() .'" title="'. $_id .'" style="color: red;">' . get_the_title() . "</a> failed<br>";
    } else {
      echo 'Updated: <a href="'.  get_the_permalink() .'" title="'. $_id .'">' . get_the_title() . "</a><br>";
    }
  }

  echo '<h1>Migration set '. $paged .' finished.</h1><a href="' . esc_url(home_url( '/?migrate_post_default_template=true&set=' . ($paged + 1) )) . '">Migrate next set</a>';
}

if(isset($_GET['migrate_post_default_template']) && is_super_admin()) {
  add_action('wp_footer', 'migrate_post_default_template', PHP_INT_MAX);
}


// create grant taxonomy terms

function create_grant_tax_terms() {
  
  $grants = array(
    'John M Belk Endowment',
    'BCBS NC',
    'Bill and Melinda Gates Foundation',
    'Oak Foundation',
    'Duke Endowment',
    'SECU Foundation',
    'Belk Foundation',
    'Duke Energy Foundation',
    'John W Pope Foundation',
    'Burroughs Wellcome Fund',
  );
  
  foreach ($grants as $item) {
    $term = term_exists($item, 'grants');
    if ( $term !== 0 && $term !== null ) {
      echo $item . ' exists. Skipping.<br>';
    } else {
      wp_insert_term($item, 'grants');
      echo $item . ' created.<br>'; 
    }
  }
  
  echo '<h1>Grants term creation finished.</h1>';
  
}


if(isset($_GET['create_grant_tax_terms']) && is_super_admin()) {
  add_action('wp_footer', 'create_grant_tax_terms', PHP_INT_MAX);
}

// create community college taxonomy terms

function create_cc_tax_terms() {
  
  $grants = array(
    'Alamance Community College',
    'Asheville-Buncombe Technical Community College',
    'Beaufort County Community College',
    'Bladen Community College',
    'Blue Ridge Community College',
    'Brunswick Community College',
    'Caldwell Community College and Technical Institute',
    'Cape Fear Community College',
    'Carteret Community College',
    'Catawba Valley Community College',
    'Central Carolina Community College',
    'Central Piedmont Community College',
    'Cleveland Community College',
    'Coastal Carolina Community College',
    'College of The Albemarle',
    'Craven Community College',
    'Davidson County Community College',
    'Durham Technical Community College',
    'Edgecombe Community College',
    'Fayetteville Technical Community College',
    'Forsyth Technical Community College',
    'Gaston College',
    'Guilford Technical Community College',
    'Halifax Community College',
    'Haywood Community College',
    'Isothermal Community College',
    'James Sprunt Community College',
    'Johnston Community College',
    'Lenoir Community College',
    'Martin Community College',
    'Mayland Community College',
    'McDowell Technical Community College',
    'Mitchell Community College',
    'Montgomery Community College',
    'Nash Community College',
    'Pamlico Community College',
    'Piedmont Community College',
    'Pitt Community College',
    'Randolph Community College',
    'Richmond Community College',
    'Roanoke-Chowan Community College',
    'Robeson Community College',
    'Rockingham Community College',
    'Rowan-Cabarrus Community College',
    'Sampson Community College',
    'Sandhills Community College',
    'South Piedmont Community College',
    'Southeastern Community College',
    'Southwestern Community College',
    'Stanly Community College',
    'Surry Community College',
    'System Office',
    'Tri-County Community College',
    'Vance-Granville Community College',
    'Wake Technical Community College',
    'Wayne Community College',
    'Western Piedmont Community College',
    'Wilkes Community College',
    'Wilson Community College',
  );
  
  foreach ($grants as $item) {
    $term = term_exists($item, 'community-college-posts');
    if ( $term !== 0 && $term !== null ) {
      echo $item . ' exists. Skipping.<br>';
    } else {
      wp_insert_term($item, 'community-college-posts');
      echo $item . ' created.<br>'; 
    }
  }
  
  echo '<h1>Community college term creation finished.</h1>';
  
}


if(isset($_GET['create_cc_tax_terms']) && is_super_admin()) {
  add_action('wp_footer', 'create_cc_tax_terms', PHP_INT_MAX);
}