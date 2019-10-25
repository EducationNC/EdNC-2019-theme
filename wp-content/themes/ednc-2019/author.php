<?php use Roots\Sage\Titles;
// use Roots\Sage\Extras;
use Roots\Sage\Media;


?>

<section id="author" class="block green">
  <div class="site-wrapper">
    <div class="container">

       <div class="row">
          <div class="col-md-12 header-big">
            <?php// get_template_part('templates/components/category', 'header'); ?>
            <?php get_template_part('templates/components/author', 'bio'); ?>
          </div>
       </div>


       <div class="row other-content">
          <div class="col-md-12">
            <?php $bio_header = get_field('bio-page-other-content', 'options'); ?>
            <h3 class=""><?php echo $bio_header ?></h3>
            <div class="category-content-justify-left">
              <?php get_template_part('templates/layouts/archive', 'loop-2019'); ?>
            </div>
            <div class="category-content">
              <?php
               if ($wp_query->max_num_pages > 1) : ?>
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
