<?php while (have_posts()) : the_post(); ?>
  <div class="container">

    <?php get_template_part('templates/layouts/content', 'page-left-aside'); ?>
    <!-- <div class="row">
      <div class="col-md-12">
        gfdsgsgfdsgd
      </div>
    </div> -->


  </div>
<?php endwhile; ?>
