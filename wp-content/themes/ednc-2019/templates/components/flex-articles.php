<?php

use Roots\Sage\Extras;
use Roots\Sage\Media;

$posts = get_sub_field('articles');
?>



<?php
$featured_image = Media\get_featured_image('featured-four-block');
$title_overlay = get_field('title_overlay');
?>

<section class="row">
  <div class="col-md-12">
    <div class="category-content-justify-left">

      <?php
      if( $posts ): ?>
          <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
              <?php setup_postdata($post); ?>
              <?php
              $featured_image = Media\get_featured_image('featured-four-block');
              $title_overlay = get_field('title_overlay');
              ?>
              <article <?php post_class('block-news content-block-4 clearfix'); ?>>
                <div class="flex">
                  <div class="block-content">
                    <?php if (!empty($featured_image)) { ?>
                      <img src="<?php echo $featured_image; ?>" />
                    <?php } else { ?>
                      <div class="circle-image">
                        <?php// echo $author_pic; ?>
                      </div>
                    <?php } ?>
                    <p class="small"><?php echo $post_type; ?></p>
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <?php get_template_part('templates/components/entry-meta'); ?>
                    <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                    <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
                  </div>
                </div>
              </article>
          <?php endforeach; ?>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div>
  </div>
</section>
