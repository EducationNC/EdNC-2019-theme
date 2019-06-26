<?php
/*
 * Template Name: News
 * Template Post Type: page, product
 */
?>
<section id="about" class="block search-results blue">
  <div class="site-wrapper">
    <div class="container">
    <?php get_template_part('templates/components/category', 'header'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="category-content">
            <article <?php post_class('block-news content-block-4 clearfix'); ?>>
              <div class="flex">
                <div class="block-content">
                  <?php if (!empty($featured_image)) { ?>
                    <img class="news-block-image" src="<?php echo $featured_image; ?>" />
                  <?php } else { ?>
                    <div class="circle-image">
                      <?php echo $author_pic; ?>
                    </div>
                  <?php } ?>
                  <p class="small">News</p>
                  <h3 class="post-title"><?php the_title(); ?></h3>
                  <?php get_template_part('templates/components/entry-meta'); ?>
                  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                  <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
