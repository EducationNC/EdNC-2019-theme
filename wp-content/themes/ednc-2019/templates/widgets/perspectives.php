<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;

?>

<section class="block perspectives">
  <div class="widget-content">

    <?php if( have_rows('perspectives', 'option') ): ?>
      <?php while( have_rows('perspectives', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <div class="header-big">
          <?php	if( !empty($image) ): ?>
             <!-- <a href="<?php echo site_url(); ?>"> -->
               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
             <!-- </a> -->
          <?php endif; ?>
            <img class="section-icon" src="<?php echo Assets\asset_path('images/perspectives.svg'); ?>">
            <?php echo $header ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>


    <div class="content-box-container">
       <?php
        // Show 3 most recent featured perspective
       $args = array(
         'posts_per_page' => $number,
         // 'post__not_in' => $featured_ids,
         'tax_query' => array(
           array(
             'taxonomy' => 'appearance',
             'field' => 'slug',
             'terms' => 'perspectives'
           )
         ),
         'meta_key' => 'updated_date',
         'orderby' => 'meta_value_num',
         'order' => 'DESC'
       );

       $perspectives = new WP_Query($args);

       if ($perspectives->have_posts()) : while ($perspectives->have_posts()) : $perspectives->the_post();

         $featured_ids[] = get_the_id();
         get_template_part('templates/layouts/block', 'perspectives');

       endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
