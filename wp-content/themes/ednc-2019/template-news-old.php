<?php
/*
 * Template Name: News
 * Template Post Type: page, product
 */


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

    <!-- <section class="email-signup-form-2019">
      <div class="widget-content">
        <h2 class="content-header"></h2>
        <div id="mc_embed_signup">
           <form action="https://ednc.us9.list-manage.com/subscribe/post?u=8ba11e9b3c5e00a64382db633&amp;id=2696365d99" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
                 <h2>Subscribe to our mailing list</h2>
                 <div class="mc-field-group-email">
                    <input type="email" placeholder="Your Email Address" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                 </div>

                 <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                 </div>
                 <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>
              </div>
           </form>
        </div>
      </div>
    </section> -->

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
          <?php get_template_part('templates/layouts/archive', 'loop-2019noimage'); ?>
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
