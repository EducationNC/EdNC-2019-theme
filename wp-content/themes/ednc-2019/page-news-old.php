<?php

use Roots\Sage\Extras;
use Roots\Sage\Media;

global $trending;
$main = get_field('main-news-article');
$posts = get_field('news-articles');
$news_image = get_field('news-image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

?>

<section id="news" class="news search-results">
  <div class="site-wrapper">

    <?php //get_template_part('templates/components/category', 'header-image'); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><?php the_field('news-title'); ?></h1>
        </div>
      </div>

      <div class="row recommended-reading">
        <div class="col-md-12">
          <h4 class="margin-bottom"><?php the_field('news-rec-read-header'); ?></h4>
        </div>
      </div>
    </div>

      <?php
      $trending = array(
        'posts_per_page' => 3,
        'post_type' => array('post', 'map', 'ednews', 'edtalk', 'flash-cards'),
        'tax_query' => array(
          'relation' => 'AND',
          array(
            'taxonomy' => 'appearance',
            'field'    => 'slug',
            'terms'    => 'news',
          ),
          array(
            'taxonomy' => 'appearance',
            'field' => 'slug',
            'terms' => 'hide-from-archives',
            'operator' => 'NOT IN'
          )
        ),
        'meta_key' => 'updated_date',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
      );

      query_posts($trending);
      ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="category-content">
            <?php get_template_part('templates/layouts/archive', 'loop-three-2019'); ?>
            </div>
          </div>
        </div>
      </div>

    <?php// get_template_part('templates/components/category', 'header-text'); ?>

    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => array('post', 'map', 'ednews', 'edtalk', 'flash-cards'),
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'appearance',
          'field'    => 'slug',
          'terms'    => 'news',
        ),
        array(
          'taxonomy' => 'appearance',
          'field' => 'slug',
          'terms' => 'hide-from-archives',
          'operator' => 'NOT IN'
        )
      ),
      // 'post__not_in' => $featured_ids,
      'paged' => $paged,
      'meta_key' => 'updated_date',
      'orderby' => 'meta_value_num',
      'order' => 'DESC'
    );

    query_posts($args);
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="category-content">
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
  </div>
</section>
