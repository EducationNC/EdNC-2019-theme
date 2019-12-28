<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;

// global $featured_ids;
// global $recent_ids;
global $featured_recent;
global $recent_ids;


// elseif ($post->post_type == 'post') {
//    $post_type = "News";
// }


?>

<section class="block columns">
  <div class="widget-content">
    <?php if( have_rows('columns', 'option') ): ?>
      <?php while( have_rows('columns', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <div class="header-big">
          <?php	if( !empty($image) ): ?>
             <!-- <a href="<?php echo site_url(); ?>"> -->
               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
             <!-- </a> -->
          <?php endif; ?>
          <img class="section-icon" src="<?php echo Assets\asset_path('images/columns.svg'); ?>">
          <?php echo $header ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>


    <div class="content-box-container">
       <?php
       // Show 8 most news


       $args = array(
         'posts_per_page' => $number,
         'post_type' => array('post', 'map', 'edtalk'),
         'post__not_in' => $featured_recent,
         'post__not_in' => $recent_ids,
         'tax_query' => array(
           array(
             'taxonomy' => 'appearance',
             'field' => 'slug',
             'terms' => 'featured'
           )
         ),
         'meta_key' => 'updated_date',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
       );

       $columns = new WP_Query($args);

       if ($columns->have_posts()) : while ($columns->have_posts()) : $columns->the_post();

          $featured_image = Media\get_featured_image('medium');

          get_template_part('templates/layouts/block', 'columns');?>

      <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
