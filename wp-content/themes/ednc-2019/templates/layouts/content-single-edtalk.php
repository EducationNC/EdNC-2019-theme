<?php

while (have_posts()) : the_post();

$comments_open = comments_open();
?>
  <article <?php post_class('article h-entry'); ?>>
    <?php get_template_part('templates/components/edtalk', 'header-2019'); ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-9">
          <header class="entry-header">
            <?php get_template_part('templates/components/labels-2019'); ?>

            <h1 class="rd entry-title p-name"><?php the_title(); ?></h1>
            <?php get_template_part('templates/components/entry-meta'); ?>
          </header>

          <div class="entry-content e-content">
            <?php the_content(); ?>
          </div>

        </div>

        <div class="col-md-3 col-lg-push-1">
          <?php get_template_part('templates/components/sidebar', 'edtalk-2019'); ?>
        </div>
      </div>
    </div>
  </article>

<?php endwhile; ?>
