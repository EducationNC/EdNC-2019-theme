<?php use Roots\Sage\Titles;
// use Roots\Sage\Extras;
use Roots\Sage\Media;


?>

<section id="author" class="block green">
  <div class="site-wrapper">
    <div class="container">

       <div class="row">
          <div class="col-md-12 header-big">
            <?php
            $bio_header = get_field('bio-page-featured', 'option');
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
             $bio_posts = get_field('recommended_articles_bio_pages');

             ?>
            <div class="circle-image">
              <?php the_post_thumbnail('bio-headshot'); ?>
              <h1 class="rd entry-title"><?= Titles\title(); ?></h1>
               <?php
               if ($twitter) {
                 echo '<div class="nowrap overflow-ellipsis inline-block"><span class="icon-twitter"></span> <a href="http://twitter.com/' . $twitter . '" target="_blank">@' . $twitter . '</a></div>';
               }
               if ($email) {
                 echo '<div class="nowrap overflow-ellipsis inline-block"><span class="icon-email"></span><a href="mailto:' . antispambot($email) . '" target="_blank">' . antispambot($email) . '</a></div>';
               }
               if ($website) {
                 echo '<div class="nowrap overflow-ellipsis inline-block"><span class="icon-website"></span> <a href="' . $website . '" target="_blank">Website</a></div>';
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

             <div class="row grey-background">
               <h3 class="bio-header">Featured Articles</h3>
               <div class="recommended-blocks-bio">
                 <?php
                 if( $bio_posts ): ?>
                     <?php foreach( $bio_posts as $post): // variable must be called $post (IMPORTANT) ?>
                       <?php setup_postdata($post); ?>
                       <?php $featured_image = Media\get_featured_image('featured-four-block');
                       $column = wp_get_post_terms(get_the_id(), 'column');
                       if ($column) {
                         $post_type = $column[0]->name;
                       }
                       elseif ( has_term( 'press-release', 'appearance' ) ) {
                         $post_type = "Press Release";
                       }
                       elseif ( has_term ( 'issues', 'appearance' ) ) {
                         $post_type = "Issues";
                       }
                       else {
                         $post_type = "News";
                       }
                       ?>
                       <div class="block-recommended-bio">
                         <a href="<?php the_permalink(); ?>">
                            <?php if (!empty($featured_image)) {
                             echo '<img class="no-lazy" src="' . $featured_image . '" />';
                           } ?>
                           <p class="small"><?php echo $post_type ?></p>
                           <h3 class="post-title"><?php the_title(); ?></h3>
                           <?php get_template_part('templates/components/entry-meta'); ?>
                           <!-- <a class="mega-link" href="<?php the_permalink(); ?>"></a> -->
                         </a>
                       </div>
                   <?php endforeach; ?>
                   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                 <?php endif; ?>
               </div>
             </div>

             <?php endwhile; endif;
             wp_reset_query();
             ?>

          </div>
       </div>


       <div class="row other-content">
          <div class="col-md-12">
            <?php $bio_header = get_field('bio-page-other-content', 'options'); ?>
            <h3 class=""><?php echo $bio_header ?></h3>
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
