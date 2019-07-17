<?php

use Roots\Sage\Resize;
use Roots\Sage\AquaResizer;
use Roots\Sage\Extras;


while (have_posts()) : the_post();

  $page = get_query_var('page');

  $comments_open = comments_open();

  $author_id = get_the_author_meta('ID');
  $author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
  if ($author_bio) {
    $author_avatar = get_field('avatar', $author_bio[0]->ID);
    $author_avatar_sized = Resize\mr_image_resize($author_avatar, 140, null, false, '', false);
  }

  $image_id = get_post_thumbnail_id();
  $featured_image_src = wp_get_attachment_image_src($image_id, 'full');
  $featured_image_lg = wp_get_attachment_image_src($image_id, 'large');
  $featured_image_src = wp_get_attachment_image_src($image_id, 'Contained');
  $featured_image_hero = wp_get_attachment_image_src($image_id, 'Hero');

  $thumb = get_post_thumbnail_id();
  $img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
  $image_hero = aq_resize( $img_url, 1200, 400, true ); //resize & crop the image
  $image_contain = aq_resize( $img_url, 1200, 900, true ); //resize & crop the image

  // $alt_text = get_post_meta($post->ID, $featured_image_src, true);
  $featured_image_align = get_field('featured_image_alignment');
  $title_overlay = get_field('title_overlay');

  if(empty($alt_text)) // If not, Use the Caption
  {
      $attachment = get_post($post->ID);
      $alt_text = trim(strip_tags( $attachment->post_excerpt ));
  }

  $thumb_id = get_post_thumbnail_id();
  $thumb_post = get_post($thumb_id);

  $column = wp_get_post_terms(get_the_id(), 'column');
  $category = wp_get_post_terms(get_the_id(), 'category');
  if ( ! empty($column) ) {
    $banner = wp_get_attachment_image_src( $column[0]->term_image, 'full' );
    $banner_slug = $column[0]->slug;
    $banner_name = $column[0]->name;
  } elseif ( ! empty($category) ) {
    foreach ($category as $cat) {
      if ( ! empty($cat->term_image) ) {
        $banner = wp_get_attachment_image_src( $cat->term_image, 'full');
        $banner_slug = $cat->slug;
        $banner_name = $cat->name;
        break;
      }
    }
  }
  ?>
  <article <?php post_class('article 2019-template'); ?>>

    <!-- <?php //if (isset($banner)) { ?> -->
    <?php if (! empty($banner)) { ?>
    <div class="full-width-image-block banner" style="">
        <img src="<?php echo $banner[0];  ?>" alt="<?php the_author(); ?>" class="full-width-image">
    </div>
    <?php } ?>



    <div class="title">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-centered author-intro">
              <h1 class="article-header"><?php the_title(); ?></h1>

              <?php get_template_part('templates/components/author-info'); ?>
              <div class="article-social">
                <div class="icon icon-facebook"></div>
                <div class="icon">Twitter</div>
                <div class="icon">Email</div>
                <div class="icon">Republish</div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    if(function_exists('jquery_local_fallback')) {
        echo "exec is enabled";
    }
    ?>
    <?php
    if (isset($featured_image_align) && $featured_image_align == 'hero'){



    }

    if (isset($featured_image_align) && $featured_image_align == 'contained'){

    }

    ?>

    <?php if (has_post_thumbnail() && $featured_image_align == 'hero-new') { ?>
      <div class="full-width-image-block">
        <img class="full-width-image" src="
        <?php
          if(!empty($featured_image_hero)){
            //echo 'featured-image-hero';
            echo $featured_image_hero[0];
          } else {
            //echo 'force-crop';
            echo $image_hero;
          }
        ?>
        " />
        <p class="lato"><?php echo $thumb_post->post_excerpt; ?></p>
      </div>
    <?php } ?>

    <div class="entry-content">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-centered print-only article-section">
            <h1 class="entry-title"><?php// the_title(); ?></h1>
            <?php// get_template_part('templates/components/author', 'meta'); ?>
            <?php if (has_post_thumbnail() && $featured_image_align == 'contained-new') {
              echo '<div class="alignnone no-top-margin">';
              the_post_thumbnail('Contained');
              $thumb_id = get_post_thumbnail_id();
              $thumb_post = get_post($thumb_id);
              if(!empty($featured_image_src)){
                //echo 'featured-image-src';
                //echo $featured_image_src[0];
              } else {
                //echo 'force-crop';
                echo $image_contain;
              }

              if ($thumb_post->post_excerpt) {
                ?>
                <div class="caption extra-bottom-margin">
                  <?php echo $thumb_post->post_excerpt; ?>
                </div>
                <?php
              }
              echo '</div>';
            } ?>

              <?php the_content(); ?>
              <script>(function (c, i, t, y, z, e, n, x) { x = c.createElement(y), n = c.getElementsByTagName(y)[0]; x.async = 1; x.src = t; n.parentNode.insertBefore(x, n); i.czen = { pub: z, dom: e };})(document, window, 'https://publicinput.com/static/pub.js', 'script', 1114, 4);</script>

            <?php
            wp_link_pages(
              array(
                'before' => '<nav class="page-nav"><p><span class="pages">Skip to page:</span>',
                'after' => '</p></nav>'
              )
            );
            ?>

            <?php
            if (in_category('109')) {  // 1868 Constitutional Convention
              ?>
              <div class="row bottom-margin">
                <div class="col-md-6">
                  <?php previous_post_link('%link', '&laquo; Previous day', true, 'category'); ?>
                </div>
                <div class="col-md-6 text-right">
                  <?php next_post_link('%link', 'Next day &raquo;', true, 'category'); ?>
                </div>
              </div>
              <?php
            }
            ?>

            <?php get_template_part('templates/components/labels-2019'); ?>
          </div>

        </div>

        <div class="row">
          <div class="col-xs-12 meta visible-xs-block visible-sm-block extra-top-margin authors">


            <?php
              /*
            if ( function_exists( 'get_coauthors' ) ) {
              $coauthors = get_coauthors();
              $coauthors_count = count($coauthors);
            } else {
              $coauthors_count = 1;
            }


            if ($coauthors_count > 1) {
              echo '<h2>About the authors</h2>';
            } else {
              echo '<h2>About the author</h2>';
            }

            get_template_part('templates/components/author', 'excerpt');

            */
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- <footer class="container print-no"> -->
    <footer class="">
      <?php get_template_part('templates/layouts/block', 'recommended-2019'); ?>
      <?php if ($comments_open == 1) { ?>
        <div class="row">
          <div class="col-md-7 col-md-push-2point5">
            <!-- <h2>Join the conversation</h2> -->
            <?php// comments_template('templates/components/comments'); ?>
          </div>
        </div>
      <?php } ?>
    </footer>
  </article>


<?php endwhile; ?>
