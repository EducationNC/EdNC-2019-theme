<?php
/*
Template Name: Issues Template
*/
?>

<section id="archive" class="block search-results issues">
  <div class="site-wrapper">
    <div class="container">
      <?php get_template_part('templates/components/category', 'header'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="category-content-justify-left issues">
            
            <?php 
            $top_terms = get_field('top_section_terms');
            if( $top_terms ): ?>
              <?php foreach( $top_terms as $term ): ?>
              
                <?php
                $image = $term->term_image;
                $image_src = wp_get_attachment_image_src($image, 'large');
                ?>
                
                <div class="block-issues content-block-4 clearfix">
                  <div class="flex">
                    <div class="block-content" style="background-color: #ccc;">
                      <a class="" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                      <img src="<?php echo $image_src[0] ?>" alt="<?php echo esc_html( $term->name ); ?> image" />
                      <h2 class="rd issues"><?php echo esc_html( $term->name ); ?></h2>
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
            
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h3 class="rd">Other Issues</h3>
          <div class="issues-section">
            
            <?php 
            $bottom_terms = get_field('bottom_section_terms');
            if( $bottom_terms ): ?>
              <?php foreach( $bottom_terms as $term ): ?>
                <a class="" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><h4 class="rd"><?php echo esc_html( $term->name ); ?></h4></a>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
