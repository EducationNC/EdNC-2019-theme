<?php
$term = get_queried_object();
$desc = category_description();
$cat_id = $term->term_id;
$object = get_queried_object();
$post_id = $object->taxonomy.'_'.$object->term_id;

?>

<?php if (! empty($cat_id)) { ?>

  <section id="archive" class="block-small search-results bright-blue">
    <div class="site-wrapper">
      <div class="container">

        <?php get_template_part('templates/components/category', 'header-2019'); ?>

        <div class="row">
          <div class="col-md-8 col-centered">
            <div class="extra-margin">
            <?php if ($desc && !isset($_GET['date'])) { ?>
                <?php echo $desc; ?>
            <?php } ?>
            </div>
          </div>
        </div>

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

          <!-- <div class="col-md-3 col-lg-push-1 sidebar xs">
            <?php
            /*
            get_template_part('templates/components/sidebar', 'category');

            if (is_tax('map-column')) {
              echo '<a href="/maps-archive" class="btn btn-default">Click here for an archive of all maps</a>';
            }
            */
            ?>
          </div> -->
        </div>
      </div>
    </div>
  </section>


<?php } ?>
