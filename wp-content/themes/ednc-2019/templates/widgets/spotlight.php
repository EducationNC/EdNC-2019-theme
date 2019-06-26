<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;

$featured_image = Media\get_featured_image('medium');
$classes = array();
global $classes;
?>

<section class="block spotlight">
  <div class="widget-content">

    <?php if( have_rows('spotlight', 'option') ): ?>
      <?php while( have_rows('spotlight', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <div class="header-big">
          <?php	if( !empty($image) ): ?>
             <!-- <a href="<?php echo site_url(); ?>"> -->
               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
             <!-- </a> -->
          <?php endif; ?>
            <img class="section-icon" src="<?php echo Assets\asset_path('images/spotlight.svg'); ?>">
            <?php echo $header ?>
            <h2><?php echo get_cat_name($category); ?></h2>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <div class="content-box-container">
      <?php
      /*
       * First spotlight post
       *
       * Displays most recently updated post that is in spotlight category
       */

      if ($number == 1) {
        $spotlight_featured = new WP_Query([
          'posts_per_page' => 1,
          'post_type' => array('post', 'edtalk'),
          'cat' => $category,
          // 'meta_key' => 'updated_date',
          // 'orderby' => 'meta_value_num',
          // 'order' => 'DESC'
          'order' => 'DESC',
          'orderby'=> 'date'
        ]);

        if ($spotlight_featured->have_posts()) : while ($spotlight_featured->have_posts()) : $spotlight_featured->the_post();

           get_template_part('templates/layouts/block', 'spotlight');
           //echo $number;

        endwhile; endif; wp_reset_query();
      }

      if ($number == 2) {
        $spotlight = new WP_Query([
          'posts_per_page' => 2,
          'post_type' => array('post', 'edtalk'),
          'cat' => $category,
          // 'post__not_in' => $spotlight_featured,
          // 'offset' => 1,
          'order' => 'DESC',
          'orderby'=> 'date'
        ]);

        if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

          <?php get_template_part('templates/layouts/block', 'spotlight-2');
          ?>

        <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 3 || $number == 6 || $number == 9 || $number == 15) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'order' => 'DESC',
            'orderby'=> 'date'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

          <?php
          if ($number == 3) {
              $classes = [
                  'spotlight-block-3',
                  'clearfix',
                  'article-3'
              ];
            } elseif ($number == 6) {
              $classes = [
                  'spotlight-block-3',
                  'clearfix',
                  'article-6'
              ];
            } elseif ($number == 9) {
              $classes = [
                  'spotlight-block-3',
                  'clearfix',
                  'article-9'
              ];
            } elseif ($number == 15) {
              $classes = [
                  'spotlight-block-3',
                  'clearfix',
                  'article-15'
              ];
            }
            ?>


          <?php get_template_part('templates/layouts/block', 'spotlight-3'); ?>

          <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 4 || $number == 8 || $number == 12 || $number == 16) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'order' => 'DESC',
            'orderby'=> 'date'
          ]);


          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

          <?php
          if ($number == 4) {
              $classes = [
                  'spotlight-block-4',
                  'clearfix',
                  'article-4'
              ];
            } elseif ($number == 8) {
              $classes = [
                  'spotlight-block-4',
                  'clearfix',
                  'article-8'
              ];
            } elseif ($number == 12) {
              $classes = [
                  'spotlight-block-4',
                  'clearfix',
                  'article-12'
              ];
            } elseif ($number == 16) {
              $classes = [
                  'spotlight-block-4',
                  'clearfix',
                  'article-16'
              ];
            }
            ?>

            <?php get_template_part('templates/layouts/block', 'spotlight-4');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 5) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'order' => 'DESC',
            'orderby'=> 'date'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

            <?php get_template_part('templates/layouts/block', 'spotlight-5');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 7 || $number == 11) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'order' => 'DESC',
            'orderby'=> 'date'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

          <?php
          if ($number == 7) {
              $classes = [
                  'spotlight-block-7',
                  'clearfix',
                  'article-7'
              ];
            } elseif ($number == 11) {
              $classes = [
                  'spotlight-block-7',
                  'clearfix',
                  'article-11'
              ];
            }
            ?>

            <?php get_template_part('templates/layouts/block', 'spotlight-7');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }

        if ($number == 10 || $number == 14) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'order' => 'DESC',
            'orderby'=> 'date'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

          <?php
          if ($number == 10) {
              $classes = [
                  'spotlight-block-10',
                  'clearfix',
                  'article-10'
              ];
            } elseif ($number == 14) {
              $classes = [
                  'spotlight-block-10',
                  'clearfix',
                  'article-14'
              ];
            }
            ?>

            <?php get_template_part('templates/layouts/block', 'spotlight-10');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }
        if ($number == 13 ) {
          $spotlight = new WP_Query([
            'posts_per_page' => $number,
            'post_type' => array('post', 'edtalk'),
            'cat' => $category,
            // 'post__not_in' => $spotlight_featured,
            // 'offset' => 1,
            'order' => 'DESC',
            'orderby'=> 'date'
          ]);

          if ($spotlight->have_posts()) : while ($spotlight->have_posts()) : $spotlight->the_post();?>

            <?php get_template_part('templates/layouts/block', 'spotlight-13');
            ?>

          <?php endwhile; endif; wp_reset_query();
        }
      ?>
    </div>
  </div>
</section>
