<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/layouts/block', 'four-block'); ?>
<?php endwhile; ?>
