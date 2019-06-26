<section id="archive" class="block search-results blue">
  <div class="site-wrapper">
    <div class="container">
      <?php// get_template_part('templates/components/category', 'header'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="category-content columns">
            <?php
            // check if the repeater field has rows of data
              if( have_rows('columns') ):

               	// loop through the rows of data
                  while ( have_rows('columns') ) : the_row();

                  $image = get_sub_field('image');
                  $column_name = get_sub_field('column_name');
                  $link = get_sub_field('url');?>

                      <div class="block-news content-block-4 clearfix">
                        <div class="flex">
                          <div class="block-content">
                            <a class="" href="<?php echo $link ?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                            <h4><?php echo $column_name ?></h4>
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
