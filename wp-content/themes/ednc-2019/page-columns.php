<section id="archive" class="block search-results columns">
  <div class="site-wrapper">
    <div class="container">
      <?php get_template_part('templates/components/category', 'header'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="category-content-justify-left columns">
            <?php
            // check if the repeater field has rows of data
              if( have_rows('new_column') ):

               	// loop through the rows of data
                  while ( have_rows('new_column') ) : the_row();

                  $image = get_sub_field('image');
                  $link = get_sub_field('link_to_column');?>

                      <div class="block-news content-block-4 clearfix">
                        <div class="flex">
                          <div class="block-content">
                            <a class="" href="<?php echo $link ?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                            <h4><?php// echo $link ?></h4>
                            </a>
                          </div>
                        </div>
                      </div>

                  <?php endwhile;
              else :
                  // no rows found
              endif;
              ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
