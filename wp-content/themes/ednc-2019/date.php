 <?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;

  global $wp_query;

  if (is_day()) {
    // Modify original query to get all posts published on this day
    $args1 = array_merge(
      $wp_query->query_vars,
      array(
        'post_type' => array('post', 'map', 'ednews', 'edtalk', 'flash-cards'),
        'tax_query' => array(
    			array(
    				'taxonomy' => 'appearance',
    				'field' => 'slug',
    				'terms' => 'hide-from-archives',
    				'operator' => 'NOT IN'
    			)
    		)
      )
    );
    $args1['posts_per_page'] = -1;
    $args1['nopaging'] = true;
    $published = new WP_Query($args1);

    // Add another query to get all posts updated on this day
    $args2 = array(
      'posts_per_page' => -1,
      'post_type' => array('post', 'map', 'ednews', 'edtalk', 'flash-cards'),
      'tax_query' => array(
        array(
          'taxonomy' => 'appearance',
          'field' => 'slug',
          'terms' => 'hide-from-archives',
          'operator' => 'NOT IN'
        )
      ),
      'meta_query' => array(
        array(
          'key' => 'updated_date',
          'value' => array(
            strtotime("{$args1['year']}-{$args1['monthnum']}-{$args1['day']} 00:00:00"),
            strtotime("{$args1['year']}-{$args1['monthnum']}-{$args1['day']} 23:59:59")
          ),
          'compare' => 'BETWEEN'
        )
      )
    );
    $updated = new WP_Query($args2);

    // Merge results from 2 queries
    $merged = array_merge($published->posts, $updated->posts);

    foreach ($merged as $item) {
      $post_ids[] = $item->ID;
    }
    $unique = array_unique($post_ids);

    // Query posts from first 2 queries and order by updated date
    $final_args = array(
      'post_type' => array('post', 'map', 'ednews', 'edtalk', 'flash-cards'),
      'tax_query' => array(
        array(
          'taxonomy' => 'appearance',
          'field' => 'slug',
          'terms' => 'hide-from-archives',
          'operator' => 'NOT IN'
        )
      ),
      'post__in' => $unique,
      'paged' => $paged,
      'meta_key' => 'updated_date',
      'orderby' => 'meta_value_num',
      'order' => 'DESC'
    );
    query_posts($final_args);
  }
  ?>

<div class="container">
  <?php get_template_part('templates/components/page', 'header-wide'); ?>

 
  <div class="row archive-row">
    <div class="col-md-4 archive-sidebar">
      
      <?php get_template_part('templates/components/sidebar', 'archives'); ?>
    
    </div>
    <div class="col-md-8">
      <div class="category-content-justify-left">
        <?php get_template_part('templates/layouts/archive', 'loop-2019'); ?>
      </div>
      <div class="category-content">
        <?php if ($wp_query->max_num_pages > 1) : ?>
          <div class="row hentry">
            <nav class="post-nav">
              <?php wp_pagenavi(); ?>
            </nav>
          </div>
        <?php endif; ?>
      </div>
    </div>
    
  </div>
</div>
