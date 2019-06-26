<?php get_template_part('templates/components/edtalk', 'header-2019'); ?>

<div class="container">
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
