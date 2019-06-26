<section id="archive" class="block search-results blue">
  <div class="site-wrapper">
    <div class="container">
      <?php get_template_part('templates/components/category', 'header'); ?>

      <?php
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $args = array(
        'post_type' => array('post', 'map', 'ednews', 'edtalk', 'flash-cards'),
        'tax_query' => array(
          'relation' => 'AND',
          array(
            'taxonomy' => 'appearance',
            'field' => 'slug',
            'terms' => 'issues'
          ),
          array(
            'taxonomy' => 'appearance',
            'field' => 'slug',
            'terms' => 'hide-from-archives',
            'operator' => 'NOT IN'
          )
        ),
        'paged' => $paged,
        'meta_key' => 'updated_date',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
      );

      query_posts($args);
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="category-content">
          <?php get_template_part('templates/layouts/archive', 'loop-2019'); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
