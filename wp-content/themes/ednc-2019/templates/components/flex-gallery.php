<?php $images = get_sub_field('image_gallery_row_flex');
$size = 'medium-square'; ?>


<section class="row">
  <div class="col-md-12">

  <?php
  // check if the nested repeater field has rows of data
  if( have_rows('image_gallery') ):


    // loop through the rows of data
      while ( have_rows('image_gallery') ) : the_row();

      $images = get_sub_field('image_gallery_row_flex');

      if( $images ): ?>
          <div class="gallery-block-outer">
              <?php foreach( $images as $image ): ?>
                <div class="gallery-block-inner">
                  <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                  <p class="small lato"><?php echo $image['caption']; ?></p>
                </div>
              <?php endforeach; ?>
          </div>
      <?php endif;

    endwhile;


  endif;
  ?>
  </div>
</section>
