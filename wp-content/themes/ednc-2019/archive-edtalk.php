<?php

use Roots\Sage\Assets;

$edtalk_intro = get_field('edtalk_intro', 'option');

?>
<section id="archive" class="block-small search-results green">
  <div class="site-wrapper">
    <div class="container">

      <?php get_template_part('templates/components/edtalk', 'header-2019'); ?>

      <div class="row">
        <div class="col-md-8 col-centered">
          <div class="extra-margin">
              <?php echo $edtalk_intro; ?>
          </div>
        </div>
      </div>

      <div class="row">
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
