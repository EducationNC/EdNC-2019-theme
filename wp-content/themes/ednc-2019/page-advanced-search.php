<?php get_template_part('templates/components/page', 'header'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-centered">

      <?php echo facetwp_display( 'facet', 'search' ) ?>
     
      <fieldset class="search__filters">
      
        <div class="row">
        
          <div class="col-md-12">
            <label class="search__filters__label">Date</label>
            <?php echo facetwp_display( 'facet', 'date' ) ?>
          </div>
        
          <div class="col-md-4">
            <label class="search__filters__label">Topic</label>
            <?php echo facetwp_display( 'facet', 'category' ) ?>
          </div>
          
          <div class="col-md-4">
          <label class="search__filters__label">Category</label>
            <?php echo facetwp_display( 'facet', 'type' ) ?>
          </div>
          
          <div class="col-md-4">
            <label class="search__filters__label">Author</label>
            <?php echo facetwp_display( 'facet', 'author' ) ?>
          </div>
        
        </div>
        
      </fieldset>
      
      <div class="row">
        <?php echo facetwp_display( 'template', 'results' ) ?>
      </div>
      
      <?php echo facetwp_display( 'pager' ) ?>
      
    </div>
  </div>
</div>
