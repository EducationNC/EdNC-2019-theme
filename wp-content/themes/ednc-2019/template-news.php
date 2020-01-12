<?php
/*
 * Template Name: News
 * Template Post Type: page, product
 */
 
use Roots\Sage\Extras;
use Roots\Sage\Media;
use Roots\Sage\Assets;
use Roots\Sage\Resize;

global $trending;
$main = get_field('main-news-article');
$posts = get_field('news-articles');
$news_image = get_field('news-image');
$firstPosts = array();

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

    <?php if (!(get_query_var('paged') &&  get_query_var('paged') > 1)): ?>
    
      <?php
      $args = array(
        'posts_per_page' => 3,
        'post_type' => array('post', 'map', 'ednews', 'edtalk', 'flash-cards'),
        'paged' => get_query_var('paged'),
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
        // 'orderby' => 'publish_date',
        'order' => 'DESC'
      );
  
      $trending = new WP_Query($args);
      ?>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="category-content">
              <?php if ($trending->have_posts()) :
  
                while ($trending->have_posts()) : $trending->the_post();
  
                  $firstPosts[] = $post->ID;
                  $featured_image = Media\get_featured_image('featured-four-block');
                  $size = 'full'; // (thumbnail, medium, large, full or custom size)?>
    
                  <article <?php post_class('block-news content-block-3 clearfix'); ?>>
                    <div class="flex">
                      <div class="block-content">
                        <?php if (!empty($featured_image)) { ?>
                          <img class="" src="<?php echo $featured_image; ?>" />
                        <?php } else { ?>
                          <div class="circle-image">
                            <?php echo $author_pic; ?>
                          </div>
                        <?php } ?>
                        <h3 class="post-title"><?php the_title(); ?></h3>
                        <?php get_template_part('templates/components/entry-meta'); ?>
                        <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                        <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
                      </div>
                    </div>
                  </article>
  
              <?php endwhile; endif; wp_reset_query(); ?>
  
            </div>
          </div>
        </div>
      </div>
    
    <?php endif; ?>

    <?php
    $paged1 = get_query_var('paged') ? get_query_var('paged') : 1;
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
      'paged' => $paged1,
      'post__not_in' => $firstPosts,
      // 'meta_key' => 'updated_date',
      // 'orderby' => 'meta_value_num',
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
