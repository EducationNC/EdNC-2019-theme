<?php

use Roots\Sage\Assets;

?>



<section class="block videos">
  <div class="widget-content">
    <?php if( have_rows('videos', 'option') ): ?>
      <?php while( have_rows('videos', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <div class="header-big">
          <?php	if( !empty($image) ): ?>
             <!-- <a href="<?php echo site_url(); ?>"> -->
               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
             <!-- </a> -->
          <?php endif; ?>
            <img class="section-icon" src="<?php echo Assets\asset_path('images/videos.svg'); ?>">
            <?php echo $header ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <div class="content-box-container">
       <?php
       // Show 3 most recent videos
       $args = array(
         'posts_per_page' => 3,
         'meta_query' => array(
            array(
              'key' => 'video_1',
              'value' => '1',
            )
          )
         // 'meta_key' => 'updated_date',
         // 'orderby' => 'meta_value_num',
         // 'order' => 'DESC'
       );

       $videos = new WP_Query($args);

       if ($videos->have_posts()) : while ($videos->have_posts()) : $videos->the_post(); ?>

        <?php get_template_part('templates/layouts/block', 'videos');?>

       <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
