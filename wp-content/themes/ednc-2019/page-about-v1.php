<?php

use Roots\Sage\Assets;

 ?>

<?php while (have_posts()) : the_post(); ?>


    <div class="container">

    <?php get_template_part('templates/components/page', 'header-wide'); ?>

    <?php// get_template_part('templates/layouts/content', 'page-right-aside'); ?>


    <div class="row">
      <div class="col-md-12">
        <?php the_content(); ?>
      </div>
    </div>

    <div class="page-header row">
      <div class="col-md-12 col-centered">
        <h1>Staff</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="category-content-justify-left">
          <?php

          $args = array(
            'post_type' => 'bio',
            'post__in' => array(1647, 1663, 13081, 26641, 32468, 26684, 46947, 41796, 52642, 49249,  65207),   // Mebane, Alex, Nation, Liz, Nancy, Laura37074, , Molly, Caroline, Analisa, Yasmin, Robert, Rupen
            'posts_per_page' => -1,
            'orderby' => 'post__in',
            'order' => 'ASC'
          );

          $about = new WP_Query($args);

          if ($about->have_posts()) : while ($about->have_posts()) : $about->the_post();

          ?>

          <article <?php post_class('block-news content-block-4 clearfix'); ?>>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('bio-headshot'); ?>
            </a>
            <h4 class="no-top-margin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <h5 class="no-margin"><?php the_field('title'); ?></h5>
            <p class="caption"><?php the_field('tagline'); ?></p>
          </article>
          <?php endwhile; endif; wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>
