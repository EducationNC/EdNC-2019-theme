<?php
/*
Template Name: Financials
*/
?>

<?php while (have_posts()) : the_post(); ?>

  <div class="container">
    <?php get_template_part('templates/components/page', 'header-wide-2019'); ?>

    <?php get_template_part('templates/layouts/content', 'page-right-aside-2019'); ?>
  </div>
<?php endwhile; ?>
