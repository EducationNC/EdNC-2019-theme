<?php get_template_part('templates/components/page', 'header'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-centered">

      <?php echo facetwp_display( 'facet', 'search' ) ?>
     
      <fieldset class="search__filters">
      
        <div class="row">
        
          <div class="col-md-12">
            <div class="search__filters__facet">
              <label class="search__filters__facet__label">Date</label>
              <?php echo facetwp_display( 'facet', 'date' ) ?>
            </div>
          </div>
        
          <div class="col-md-4">
            <div class="search__filters__facet">
              <label class="search__filters__facet__label">Topic</label>
              <?php echo facetwp_display( 'facet', 'category' ) ?>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="search__filters__facet">
            <label class="search__filters__facet__label">Category</label>
              <?php echo facetwp_display( 'facet', 'type' ) ?>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="search__filters__facet">
              <label class="search__filters__facet__label">Author</label>
              <?php echo facetwp_display( 'facet', 'author' ) ?>
            </div>
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
