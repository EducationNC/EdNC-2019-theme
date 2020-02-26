<?php

use Roots\Sage\Media;

$term = get_queried_object();
// $taxonomy = $term->taxonomy;
// $term_id = $term->term_id;

$desc = category_description();
$cat_id = $term->term_id;
$object = get_queried_object();
$post_id = $object->taxonomy.'_'.$object->term_id;
$category_featured = get_field('featured_article_category_pages', $term);
$post_object = get_field('featured_article_category_pages', $term);
?>

<?php if (!empty($cat_id)) { ?>

  <section id="archive" class="block-small search-results dark-blue">
    <div class="site-wrapper">
      <div class="container">

        <?php get_template_part('templates/components/category', 'header-2019'); ?>

        <?php if( !empty($category_featured) ): ?>

          <div class="row">
            <div class="col-md-7 category-padding">
              <?php if ($desc && !isset($_GET['date'])) { ?>
                  <?php echo $desc; ?>
              <?php } ?>
            </div>
            <div class="col-md-5 category-padding">
              <h3>Featured Article</h3>
              <?php
              $post_objects = get_field('featured_article_category_pages', $term);


              if( $post_objects ): ?>
                  <?php foreach( $post_objects as $post): ?>
                     <?php $featured_image = Media\get_featured_image('medium'); ?>
                    <?php setup_postdata($post); ?>
                      <div class="category-featured-article">
                          <a href="<?php the_permalink(); ?>">
                            <?php if (!empty($featured_image)) {
                             echo '<img class="" src="' . $featured_image . '" />';
                            } ?>
                            <h3 class="post-title"><?php echo the_title(); ?></h3>
                            <?php get_template_part('templates/components/entry-meta'); ?>
                          </a>
                      </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>
          </div>

        <?php else: ?>

          <div class="row">
            <div class="col-md-8 col-centered">
              <div class="extra-margin">
              <?php if ($desc && !isset($_GET['date'])) { ?>
                  <?php echo $desc; ?>
              <?php } ?>
              </div>
            </div>
          </div>


         <?php endif; ?>


         <?php

          // Check value exists.
          if( have_rows('flex_content', $post_id) ):

              // Loop through rows.
              while ( have_rows('flex_content', $post_id) ) : the_row();

                  // Case: Paragraph layout.
                  if( get_row_layout() == 'header-text' ):
                      $text = get_sub_field('header_text');
                      ?>
                      <h1><?php echo $text; ?> </h1>

                  <?php
                  elseif( get_row_layout() == 'body_text' ):
                      $body_text_content = get_sub_field('body_text_content');  ?>
                      <div class="body-text-flex">
                        <?php echo $body_text_content; ?>
                      </div>

                  <?php
                  elseif( get_row_layout() == 'video' ):
                    $video = get_sub_field('video');  ?>
                    <div class="embed-container video-flex">
                        <?php the_sub_field('video'); ?>
                    </div>

                  <?php

                  elseif( get_row_layout() == 'twitter' ):  ?>
                    <div class="twitter">
                      <?php echo do_shortcode( get_sub_field('twitter-flex') ); ?>
                    </div>

                  <?php
                  elseif( get_row_layout() == 'gallery-flex-box' ):
                      $images = get_sub_field('gallery-content');
                      if( $images ): ?>
                          <div class="gallery-flex">
                              <?php foreach( $images as $image ): ?>
                                  <div class="img">
                                      <a href="<?php echo esc_url($image['url']); ?>">
                                           <img src="<?php echo esc_url($image['sizes']['featured-four-block']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                      </a>
                                      <p class="wp-caption-text"><?php echo esc_html($image['caption']); ?></p>
                                  </div>
                              <?php endforeach; ?>
                          </div>
                      <?php endif; ?>

                  <?php
                  elseif( get_row_layout() == 'articles' ):
                      $articles = get_sub_field('articles');
                      if( $articles ): ?>

                      <div class="row grey-background">
                        <h3 class="bio-header">Featured Articles</h3>
                        <div class="recommended-blocks-bio">
                          <?php
                             foreach( $articles as $post): // variable must be called $post (IMPORTANT) ?>
                                <?php setup_postdata($post); ?>
                                <?php $featured_image = Media\get_featured_image('featured-four-block');
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
                                <div class="block-recommended-bio">
                                  <a href="<?php the_permalink(); ?>">
                                     <?php if (!empty($featured_image)) {
                                      echo '<img class="no-lazy" src="' . $featured_image . '" />';
                                    } ?>
                                    <p class="small"><?php echo $post_type ?></p>
                                    <h3 class="post-title"><?php the_title(); ?></h3>
                                    <?php get_template_part('templates/components/entry-meta'); ?>
                                    <!-- <a class="mega-link" href="<?php the_permalink(); ?>"></a> -->
                                  </a>
                                </div>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                        </div>
                      </div>
                      <?php
                      endif;

                  elseif( get_row_layout() == 'half_page_split' ):?>
                    <div class="flex-box">
                      <div class="left-side">
                        <?php if( get_sub_field('left_half') == 'video' ) { ?>
                          <div class="embed-container">
                            <?php the_sub_field('video_left'); ?>
                          </div>
                        <?php  }  ?>
                        <?php if( get_sub_field('left_half') == 'body' ) { ?>
                          <?php $body_text = get_sub_field('body_text_left');
                          echo $body_text;
                        ?>
                        <?php  }  ?>
                        <?php if( get_sub_field('left_half') == 'article' ) { ?>
                          <?php $post_objects = get_sub_field('highlighted_article_left');
                          if( $post_objects ): ?>
                              <?php foreach( $post_objects as $post): ?>
                                 <?php $featured_image = Media\get_featured_image('featured-four-block'); ?>
                                <?php setup_postdata($post); ?>
                                  <div class="category-featured-article">
                                      <a href="<?php the_permalink(); ?>">
                                        <?php if (!empty($featured_image)) {
                                         echo '<img class="" src="' . $featured_image . '" />';
                                        } ?>
                                        <h3 class="post-title"><?php echo the_title(); ?></h3>
                                        <?php get_template_part('templates/components/entry-meta'); ?>
                                      </a>
                                  </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                          <?php endif; ?>
                        <?php  }  ?>
                      </div>
                      <div class="right-side">
                        <?php if( get_sub_field('right_half') == 'video' ) { ?>
                          <div class="embed-container">
                            <?php the_sub_field('video_right'); ?>
                          </div>
                        <?php  }  ?>
                        <?php if( get_sub_field('right_half') == 'body' ) { ?>
                          <?php $body_text = get_sub_field('body_text_right');
                          echo $body_text;
                        ?>
                        <?php } ?>
                        <?php if( get_sub_field('right_half') == 'article' ) { ?>
                          <?php $post_objects = get_sub_field('highlighted_article_right');
                          if( $post_objects ): ?>
                              <?php foreach( $post_objects as $post): ?>
                                 <?php $featured_image = Media\get_featured_image('featured-four-block'); ?>
                                <?php setup_postdata($post); ?>
                                  <div class="category-featured-article">
                                      <a href="<?php the_permalink(); ?>">
                                        <?php if (!empty($featured_image)) {
                                         echo '<img class="" src="' . $featured_image . '" />';
                                        } ?>
                                        <h3 class="post-title"><?php echo the_title(); ?></h3>
                                        <?php get_template_part('templates/components/entry-meta'); ?>
                                      </a>
                                  </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                          <?php endif; ?>
                        <?php  }  ?>
                      </div>
                    </div>


                  <?php
                  endif;

              // End loop.
              endwhile;

          // No value.
          else :
              // Do something...
          endif;

          ?>



        <div class="row hentry">
          <?php
            $args = array(
              'post_type' => 'flash-cards',
              'posts_per_page' => -1,
              'cat' => $cat_id
            );

            $fc = new WP_Query($args);

            if ($fc->have_posts()) : while ($fc->have_posts()): $fc->the_post(); ?>

              <div class="col-sm-6">
                <div class="paperclip"></div>
                  <?php get_template_part('templates/layouts/block', 'post'); ?>
              </div>

            <?php endwhile; endif; wp_reset_query();?>

            <div class="col-md-12">

              <div class="category-content-justify-left">
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


<?php } else { ?>

  <section id="archive" class="block search-results blue">
    <div class="site-wrapper">
      <div class="container">
        <?php get_template_part('templates/components/category', 'header'); ?>
        <div class="row">
          <div class="col-md-12">

            <?php if ($desc && !isset($_GET['date'])) { ?>
              <div class="extra-margin">
                <?php echo $desc; ?>
              </div>
            <?php } ?>

            <div class="row hentry">
              <?php

              if (! empty($cat_id)) {
                $args = array(
                  'post_type' => 'flash-cards',
                  'posts_per_page' => -1,
                  'cat' => $cat_id
                );

                $fc = new WP_Query($args);

                if ($fc->have_posts()) : while ($fc->have_posts()): $fc->the_post(); ?>

                  <div class="col-sm-6">
                    <div class="paperclip"></div>
                      <?php get_template_part('templates/layouts/block', 'post'); ?>
                  </div>

                <?php endwhile; endif; wp_reset_query();
              } ?>

            </div>

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


<?php } ?>
