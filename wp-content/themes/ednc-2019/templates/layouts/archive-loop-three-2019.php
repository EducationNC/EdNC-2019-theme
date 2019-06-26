<?php if (!have_posts()) : ?>

  <?php get_search_form(); ?>

  <div class="alert alert-warning">
    Sorry, no results were found.
  </div>

<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/layouts/block', 'three-block'); ?>
<?php endwhile; ?>
