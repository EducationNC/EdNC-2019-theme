
<div class="container flex-content">hey!</div>
<div class="container flex-content">
<?php
if( have_rows('flex_content_category', $post_id) ):

  // loop through the rows of data
    while ( have_rows('flex_content_category', $post_id) ) : the_row();  ?>


          <?php
          if( get_row_layout() == 'text' ) ?>
            <p>"header text"</p>
            <?php //get_template_part('templates/components/flex', 'header');
          //endif;
          ?>


          <?php
          if( get_row_layout() == 'body_text_content' ) ?>
          <p>"bodytext"</p>
          <?php  //get_template_part('templates/components/flex', 'body');
          ?>


          <?php
          if( get_row_layout() == 'image_gallery_flex' )
          get_template_part('templates/components/flex', 'gallery');
          //endif;
          ?>


          <?php
          if( get_row_layout() == 'full_hero_flex' )
          get_template_part('templates/components/flex', 'image');
          ?>

          <?php
          if( get_row_layout() == 'articles' )
          get_template_part('templates/components/flex', 'articles');
          ?>



        <?php
        // endif;

    endwhile;

endif;
?>
</div>
