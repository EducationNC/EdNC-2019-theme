<?php get_template_part('templates/components/page', 'header'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-centered">

      <?php echo facetwp_display( 'facet', 'search' ) ?>
      
      <div class="row">
        <?php echo facetwp_display( 'template', 'results' ) ?>
      </div>
      
      <?php echo facetwp_display( 'pager' ) ?>
      
    </div>
  </div>
</div>
