<?php

use Roots\Sage\Assets;

// global $featured;
// global $featured_ids;
// global $recent_ids;
global $featured_recent;
global $recent_ids;

?>

<section class="block news">
  <div class="widget-content">

    <?php if( have_rows('news', 'option') ): ?>
      <?php while( have_rows('news', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <div class="header-big">
        	  <?php	if( !empty($image) ): ?>
        		   <!-- <a href="<?php echo site_url(); ?>"> -->
                 <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
               <!-- </a> -->
        		<?php endif; ?>
            <img class="section-icon" src="<?php echo Assets\asset_path('images/news.svg'); ?>">
            <?php echo $header ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <div class="content-box-container">
       <?php
       // Show 8 most news
       $args = array(
         'posts_per_page' => $number,
         'post__not_in' => $featured_recent,
         'post__not_in' => $recent_ids,
         'tax_query' => array(
           array(
             'taxonomy' => 'appearance',
             'field' => 'slug',
             'terms' => 'news'
           )
         ),
        //  'meta_key' => 'updated_date',
        //  'orderby' => 'meta_value_num',
         'order' => 'DESC'
       );

       $news = new WP_Query($args);

       if ($news->have_posts()) : while ($news->have_posts()) : $news->the_post();

         $featured_ids[] = get_the_id();
         get_template_part('templates/layouts/block', 'news');?>

       <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
</section>
