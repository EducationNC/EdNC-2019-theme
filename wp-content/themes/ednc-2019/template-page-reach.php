<?php
/*
Template Name: Reach template for users
*/

use Roots\Sage\Titles;
use Roots\Sage\Assets;
use Roots\Sage\Extras;
use Roots\Sage\Media;

global $trending;
$main = get_field('main-news-article');
$posts = get_field('news-articles');
$news_image = get_field('news-image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
?>

<?php while (have_posts()) : the_post(); ?>

  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="reach-header-text">
          <h1 class="rd entry-title"><?php the_field('reach_title'); ?></h1>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class = "reach-body-text">
          <p><?php the_field('reach_paragraph_block'); ?></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class = "reach-body-text">
          <p><?php the_field('reach_paragraph_block_2'); ?></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class = "reach-body-text">
          <p><?php the_field('reach_signup_box'); ?></p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class = "reach-body-text">
          <p><?php the_field('reach_paragraph_block_3'); ?></p>
        </div>
      </div>
    </div>

    <?php

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'reach-question',
      'meta_key'		=> 'reach_privacy',
      'paged' => $paged,
    );

    $reach = new WP_Query($args); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="category-content-justify-left">

          <?php if ($reach->have_posts()) : while ($reach->have_posts()) : $reach->the_post();

            $featured_image = Media\get_featured_image('medium'); ?>

             <?php get_template_part('templates/layouts/block', 'four-block'); ?>

           <?php endwhile; endif; wp_reset_query(); ?>
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


<?php endwhile; ?>
