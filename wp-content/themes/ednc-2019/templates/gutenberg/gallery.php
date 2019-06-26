<?php
 /**
  * Team Member block
  *
  * @package      ClientName
  * @author       Bill Erickson
  * @since        1.0.0
  * @license      GPL-2.0+
 **/
 $images = get_field( 'image_gallery_block' );
 $size = 'medium-square'; // (thumbnail, medium, large, full or custom size)
 $align_class = $block['align'] ? 'align' . $block['align'] : '';
 ?>

 <!-- <div class="gallery-block <?php// echo $align_class; ?>">
    <div class="row">
       <div class="col-md-12">
         <?php// if( $images ): ?>
             <ul class="gallery-block border">
                 <?php// foreach( $images as $image ): ?>
                     <li class="gallery-block">
                       <?php// echo wp_get_attachment_image( $image['ID'], $size ); ?>
                       <p class="small lato"><?php// echo $image['caption']; ?></p>
                     </li>
                 <?php// endforeach; ?>
             </ul>
         <?php// endif; ?>
       </div>
    </div>
 </div> -->


 <?php if( have_rows('image_gallery_repeater') ): ?>

   <div class="gallery-block <?php echo $align_class; ?>">
      <div class="row">
         <div class="col-md-12">

      	<?php while( have_rows('image_gallery_repeater') ): the_row();

      		// vars
          $images = get_sub_field( 'image_gallery_row' );
          $size = 'medium-square'; // (thumbnail, medium, large, full or custom size)

      		?>

          <?php if( $images ): ?>
              <div class="gallery-block-outer">
                  <?php foreach( $images as $image ): ?>
                      <div class="gallery-block-inner">
                        <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
                        <p class="small lato"><?php echo $image['caption']; ?></p>
                      </div>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>

      	<?php endwhile; ?>
    </div>
  </div>
</div>



<?php endif; ?>
