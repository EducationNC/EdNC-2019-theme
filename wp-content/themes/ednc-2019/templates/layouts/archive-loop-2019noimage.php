<?php
if (!have_posts()) : ?>

<?php get_search_form(); ?>

  <div class="alert alert-warning">
    Sorry, no results were found.
  </div>

<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/layouts/block', 'four-blockNoImage'); ?>
<?php endwhile; ?>

<!-- <div class="row">
  <?php /*if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <?php wp_pagenavi(); ?>
    </nav>
  <?php endif;*/ ?>
</div> -->
