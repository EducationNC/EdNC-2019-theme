<?php

use Roots\Sage\Resize;
use Roots\Sage\Media;
use Roots\Sage\Assets;

// Number of posts to show
// $features_n = $instance['features_n'];
// $news_n = $instance['news_n'];

// Set up variable to catch featured post ids -- we will exclude these ids from news query
$featured_ids = array();
global $featured;
$recent_ids = array();
global $featured_recent;
//$posts = get_field('featured_article');
$featured_article = get_field('featured_article_widget', 'widget_' . $this->id);
$featured_ids[] = $featured_article[0]->ID;
?>
<section id="carousel" class="block carousel">
  <div class="home-page-wrapper">
    <div class="carousel-right">
      <section id="carousel-latest" class="block listing listing-headline small">
        <?php
        $featured_post_query = new WP_Query(array(
        	'posts_per_page'	=> 1,
        	'post__in'			=> $featured_ids,
        	'orderby'        	=> 'post__in',
        ));

        if ($featured_post_query->have_posts()) : while ($featured_post_query->have_posts()) : $featured_post_query->the_post(); ?>
          <?php
          include(locate_template('templates/layouts/block-featured.php'));
          ?>

        <?php endwhile; endif; wp_reset_query(); ?>

        <div class="clear"></div>
      </section>


      <section id="carousel-latest" class="block listing listing-two small green">
        <header>
          <h2 class="header section-title">Most Recent</h2>
        </header>
        <?php
        // Show 8 most news
        $recent = new WP_Query([
          'posts_per_page' => 4,
          'post__not_in' => $featured_ids,
          'post_type' => array('post', 'map', 'edtalk'),
          'tax_query' => array(
            array(
              'taxonomy' => 'appearance',
              'field' => 'slug',
              'terms' => array('news', 'featured'),
            )
          ),
          // 'meta_key' => 'updated_date',
          // 'orderby' => 'meta_value_num',
          // 'order' => 'DESC'
        ]);
        if ($recent->have_posts()) : while ($recent->have_posts()) : $recent->the_post();


          global $recent_ids;
          $recent_ids[] = get_the_id();
          //$featured_recent = array_merge($featured_ids, $recent_ids);
          get_template_part('templates/layouts/block', 'recent'); ?>



          <?php
          // $n++;

        endwhile; endif; wp_reset_query(); ?>
        <div class="clear"></div>
      </section><!-- #carousel-latest .block.listing -->
      <div class="clear"></div>
    </div><!-- .carousel-right -->




    <div class="carousel-left">
      <section id="carousel-popular" class="block listing small orange">
        <header>
          <h2 class="header section-title">Editor's Picks</h2>
        </header>
        <article class="post carousel-popular__featured-article">
            <div class="lead-image">

              <?php

              $ednews = new WP_Query([
                'post_type' => 'ednews',
                'posts_per_page' => 1
              ]);

              if ($ednews->have_posts()) : while ($ednews->have_posts()) : $ednews->the_post();


              $feature = get_field('featured_read');
              ?>

              <?php if (!empty($feature[0]['featured_image'])) { ?>
                <div class="row">
                  <div class="col-sm-6 col-md-12">
                    <div class="photo-overlay">
                      <?php echo wp_get_attachment_image($feature[0]['featured_image']['ID'], 'featured-small'); ?>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-12">
              <?php } else { ?>
                <img src="<?php echo Assets\asset_path('images/Mebane_Rash-220x220newest.png'); ?>" alt="" title="" />
              <?php } ?>

              <?php endwhile; endif; wp_reset_query(); ?>


              <!-- <img src="<?php //echo Assets\asset_path('images/Mebane_Rash-220x220newest.png'); ?>" alt="" title="" /> -->

            </div>
        </article><!-- .post -->
        <hr class="break">
        <?php
        // Show 8 most news
        $ednews = new WP_Query([
          'post_type' => 'ednews',
          'posts_per_page' => 1
        ]);


        if ($ednews->have_posts()) : while ($ednews->have_posts()) : $ednews->the_post();?>

            <?php $feature = get_field('featured_read');
            $date = get_the_time('F j, Y');?>

            <article <?php post_class('block-editor ednews clearfix'); ?> >
              <div class="block-content featured-ednews">
                <p class="small lato editor">FEATURED PICK</p>
                <?php if ($feature[0]['link'] != "") {
                   $imgurl = "https://www.google.com/s2/favicons?domain=" . $feature[0]['link'];
                 } ?>
                <p class="small lato editor">
                  <?php echo '<img src="' . $imgurl . '" width="16" height="16" />'; ?>
                  <?php echo $feature[0]['source_name'] ?>
                </p>
                <h3 class="editor"><?php echo $feature[0]['title']; ?></h3>
                <h3 class="editor"><?php// echo $date ?></h3>
                <p class="editor"><?php echo $feature[0]['original_date']; ?></p>
                <a class="mega-link" href="<?php echo $feature[0]['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
              </div>
            </article><!-- .post -->
            <hr class="break">
            <?php
            $date = get_the_time('F j, Y');
            $ednewsall = get_field('news_item');
            $count = count($ednewsall);
            // $item = $items[$i];
            // echo $count;
            $items = array_slice($ednewsall, 0, 2);


            foreach ($items as $item) {?>
              <article <?php post_class('block-editor ednews clearfix'); ?> >
                <?php// print_r($item) ?>

                <?php if ($item['link'] != "") {
                   $imgurl = "https://www.google.com/s2/favicons?domain=" . $item['link'];
                 } ?>
                <p class="small lato editor">
                  <?php echo '<img src="' . $imgurl . '" width="16" height="16" />'; ?>
                  <?php echo $item['source_name']; ?>
                </p>
                <h3 class="editor"><?php echo $item['title']; ?></h3>
                <!-- <h3 class="editor"><?php// echo $item[$date] ?></h3> -->
                <p class="editor date"><?php echo $item['original_date']; ?></p>
                <a class="mega-link" href="<?php echo $item['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
              </article>
              <hr class="break">
            <?php } ?>

            <a class="more" href="<?php the_permalink(); ?>">
              <button class="btn">Read More</button>
            </a>

          <?php endwhile; endif; wp_reset_query(); ?>
        <div class="clear"></div>
      </section><!-- #carousel-popular .block.listing -->
    </div><!-- .carousel-left -->
    <div class="clear"></div>
  </div><!-- .site-wrapper -->
</section><!-- #carousel .block.carousel -->
