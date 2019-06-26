<?php use Roots\Sage\Titles;



?>

<section id="author" class="block green">
  <div class="site-wrapper">
    <div class="container">

       <div class="row">
          <div class="col-md-12 header-big">
            <?php
            $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
            $author_id = $author->ID;
            $args = array(
              'post_type' => 'bio',
              'paged' => get_query_var('paged'),
              'meta_query' => array(
                array(
                  'key' => 'user',
                  'value' => $author_id
                )
              )
            );

            $bio = new WP_Query($args);
            //print_r ($bio); ?>
           <?php if ($bio->have_posts()) : while ($bio->have_posts()) : $bio->the_post(); ?>
             <?php
             $twitter = get_field('twitter');
             $email = get_field('email');
             $website = get_field('website');
             ?>
            <div class="circle-image">
              <?php the_post_thumbnail('bio-headshot'); ?>
              <h1 class="rd entry-title"><?= Titles\title(); ?></h1>
               <?php
               if ($twitter) {
                 echo '<div class="nowrap overflow-ellipsis inline-block"><span class="big icon-twitter"></span> <a href="http://twitter.com/' . $twitter . '" target="_blank">@' . $twitter . '</a></div>';
               }
               if ($email) {
                 echo '<div class="nowrap overflow-ellipsis inline-block"><span class="big icon-email"></span><a href="mailto:' . antispambot($email) . '" target="_blank">' . antispambot($email) . '</a></div>';
               }
               if ($website) {
                 echo '<div class="nowrap overflow-ellipsis inline-block"><span class="big icon-website"></span> <a href="' . $website . '" target="_blank">Website</a></div>';
               }

              ?>
            </div>

              <div class="author-tagline">
                <h3 class="rd"><?php the_field('tagline'); ?></h3>
                </hr>
              </div>

             <div class="author-desc">
               <?php the_content(); ?>
             </div>

             <?php endwhile; endif; wp_reset_query(); ?>

          </div>
       </div>


       <div class="row">
          <div class="col-md-12">
            <div class="category-content-justify-left">
              <?php get_template_part('templates/layouts/archive', 'loop-2019'); ?>
            </div>
            <div class="category-content">
              <?php
               if ($wp_query->max_num_pages > 1) : ?>
                <div class="row hentry">
                  <nav class="post-nav">
                    <?php wp_pagenavi(); ?>
                  </nav>
                </div>
              <?php endif; ?>
            </div>
          </div>
       </div>

    </div>
  </div>
</section>
