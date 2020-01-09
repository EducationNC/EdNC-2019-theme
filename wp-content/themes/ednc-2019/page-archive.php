<div class="container">

  <?php get_template_part('templates/components/page', 'header-wide'); ?>

  <?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $args = array(
    'post_type' => array('post', 'map', 'ednews', 'edtalk', 'flash-cards'),
    'tax_query' => array(
      array(
        'taxonomy' => 'appearance',
        'field' => 'slug',
        'terms' => 'hide-from-archives',
        'operator' => 'NOT IN'
      )
    ),
    'paged' => $paged,
    // 'meta_key' => 'updated_date',
    // 'orderby' => 'meta_value_num',
    'order' => 'DESC'
  );

  query_posts($args);
  ?>
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
