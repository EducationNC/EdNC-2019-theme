<?php

use Roots\Sage\Extras;
use Roots\Sage\Media;

$main = get_field('main-news-article');
$posts = get_field('news-articles');
$news_image = get_field('news-image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

?>

<section id="news" class="news search-results">
  <div class="site-wrapper">

    <?php get_template_part('templates/components/category', 'header-image'); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><?php the_field('news-title'); ?></h1>
          <h5><?php the_field('news-intro-text'); ?></h5>
        </div>
      </div>

      <div class="row recommended-reading">
        <div class="col-md-12">
          <h4 class="margin-bottom"><?php the_field('news-rec-read-header'); ?></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="main-grid">
            <article <?php post_class('main-rec'); ?>>
                <div class="block-content">
                  <?php if ($main): foreach( $main as $post):
                    setup_postdata($main); ?>
                    <?php $featured_image = Media\get_featured_image('medium');
                    $column = wp_get_post_terms(get_the_id(), 'column');
                    if ($column) {
                      $post_type = $column[0]->name;
                    }
                    elseif ( has_term( 'press-release', 'appearance' ) ) {
                      $post_type = "Press Release";
                    }
                    elseif ( has_term ( 'issues', 'appearance' ) ) {
                      $post_type = "Issues";
                    }
                    else {
                      $post_type = "News";
                    }
                    if (!empty($featured_image)) { ?>
                      <img class="" src="<?php echo $featured_image; ?>" />
                    <?php } else { ?>
                      <div class="circle-image">
                        <?php echo $author_pic; ?>
                      </div>
                    <?php } ?>
                    <p class="small"><?php echo $post_type; ?></p>
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <?php get_template_part('templates/components/entry-meta'); ?>
                    <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                    <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
                  <?php endforeach; endif; ?>
                  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
              </div>
            </article>
            <div class="article-ad">
              <?php
              if( $news_image ) {
                 echo wp_get_attachment_image( $news_image, $size );
              }
              ?>
            </div>





            <?php if ($posts): foreach( $posts as $post):
              setup_postdata($post); ?>
              <?php $featured_image = Media\get_featured_image('medium');
              $column = wp_get_post_terms(get_the_id(), 'column');
              if ($column) {
                $post_type = $column[0]->name;
              }
              elseif ( has_term( 'press-release', 'appearance' ) ) {
                $post_type = "Press Release";
              }
              elseif ( has_term ( 'issues', 'appearance' ) ) {
                $post_type = "Issues";
              }
              else {
                $post_type = "News";
              }
              ?>
              <article <?php post_class(''); ?>>
                <div class="block-content">
                  <?php if (!empty($featured_image)) { ?>
                    <img class="" src="<?php echo $featured_image; ?>" />
                  <?php } else { ?>
                    <div class="circle-image">
                      <?php echo $author_pic; ?>
                    </div>
                  <?php } ?>
                  <p class="small"><?php echo $post_type; ?></p>
                  <h3 class="post-title"><?php the_title(); ?></h3>
                  <?php get_template_part('templates/components/entry-meta'); ?>
                  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                  <p class="lato"><?php// echo wp_trim_excerpt(); ?></p>
                </div>
              </article>
            <?php endforeach; endif; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

          </div>
        </div>
      </div>
    </div>

    <section class="email-signup-form-2019">
      <div class="widget-content">
        <h2 class="content-header"></h2>
        <!-- <div class="content-box-container"> -->
        <!-- Begin Mailchimp Signup Form -->
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
                 <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                 <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>
                 <!-- <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div> -->
              </div>
           </form>
        </div>
        <!--End mc_embed_signup-->
        <!-- </div> -->
      </div>
    </section>

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
      'paged' => $paged,
      'meta_key' => 'updated_date',
      'orderby' => 'meta_value_num',
      'order' => 'DESC'
    );

    query_posts($args);
    ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
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
