<?php
/*
Template Name: Reach template for organizations
*/

use Roots\Sage\Titles;
use Roots\Sage\Assets;
use Roots\Sage\Extras;
use Roots\Sage\Media;

global $trending;
$main = get_field('main-news-article');
$posts = get_field('news-articles');
$news_image = get_field('news-image');
$size = 'full'; // (thumbnail, medium, large, full or custom size)
?>

<?php while (have_posts()) : the_post(); ?>

  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="reach-header-text">
          <h1 class="rd entry-title"><?php the_field('title_reach_org'); ?></h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class = "reach-body-text">
          <p><?php the_field('paragraph_reach_org'); ?></p>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-8 col-centered">
        <div class = "reach-body-text">
          <p><?php the_field('paragraph_reach_org_signup'); ?></p>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class = "reach-body-text">
          <p><?php the_field('paragraph_reach_org_2'); ?></p>
        </div>
      </div>
    </div>

  </div>


<?php endwhile; ?>
