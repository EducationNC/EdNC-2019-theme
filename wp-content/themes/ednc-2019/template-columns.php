<?php
/*
 * Template Name: Single Item List (columns, podcasts)
 * Template Post Type: page, product
 */

use Roots\Sage\Titles;
?>

<div class="column-page">
  <h1 class="rd white"><?= Titles\title() . $title; ?></h1>
</div>


<div class="container">

  <?php
  // check if the repeater field has rows of data
    if( have_rows('list_row') ):

      // loop through the rows of data
        while ( have_rows('list_row') ) : the_row(); ?>

        <div class="row">
          <div class="col-md-12 column-section">


              <?php
              $header = get_sub_field('row-header');
              $text = get_sub_field('row-text');
              $image = get_sub_field('image');
              $column_name = get_sub_field('column_name');
              $link = get_sub_field('url');

              ?>
              <a href="<?php echo $link ?>">
                <h3 class="rd column"><?php echo $header ?></h3>
                <?php echo $text ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
              </a>

          </div>
        </div>
        <hr class="full-column">
        <?php endwhile;?>

<?php else :
// no rows found
endif;
?>
</div>
