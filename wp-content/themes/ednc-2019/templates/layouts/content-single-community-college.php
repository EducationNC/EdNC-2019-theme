<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;
use Roots\Sage\Resize;

if ($post->post_type == 'post') {
  $video = has_post_format('video');

  $author_id = get_the_author_meta('ID');
  $author_bio = get_posts(array('post_type' => 'bio', 'meta_key' => 'user', 'meta_value' => $author_id));
  //$author_avatar = get_field('avatar', $author_bio[0]->ID);
  //$author_avatar_sized = Resize\mr_image_resize($author_avatar, 140, null, false, '', false);
}

$column = wp_get_post_terms(get_the_id(), 'column');
if ( has_term( 'perspectives', 'appearance' ) ) {
  $post_type = "Perspective";
}
elseif ( has_term ( 'news', 'appearance' ) ) {
  $post_type = "News";
}
elseif ( has_term ( 'featured', 'appearance' ) ) {
  $post_type = "Featured";
}
else {
  $post_type = "";
}

if ( function_exists( 'coauthors_posts_links' ) ) {
  $authors = get_coauthors();
  foreach ($authors as $a) {
    $classes[] = $a->user_nicename;
  }
} else {
  $classes[] = get_the_author_meta('user_nicename');
}

$featured_image = Media\get_featured_image('featured-four-block');
// $featured_image = Media\get_featured_image('featured-four-block');
$title_overlay = get_field('title_overlay');

while (have_posts()) : the_post();
  $links = get_field('links');
  $social_media_links = get_field('social_media_links');
  ?>

  <div <?php post_class('container'); ?>>

    <h1 class="lato"><?php the_title(); ?></h1>
    <div class="district-body">
      <?php the_field('about'); ?>
    </div>

    <div class="district-content">
      <div class="section">
        <p class="large"><strong>Phone:</strong> <?php if (get_field('phone')) { the_field('phone');  } ?></p>
        <p class="large"><strong>Fax:</strong> <?php if (get_field('fax')) { the_field('fax');  } ?></p>
        </br>
        <p class="large"><strong>Street Address</strong></p>
        <p class="large"><?php the_field('street_address'); ?></p>
      </div>
      <div class="section-split">
        <div class="left">
          <p class="large"><strong>President</strong></p>
          <p class="large"><?php if (get_field('president')) { the_field('president');  } ?></p>
          </br>
          <!-- <p class="large"><?php //if (get_field('superintendent_email')) { the_field('superintendent_email');  } ?></p> -->
        </div>
        <div class="right">
          <?php
          $image = get_field('president_photo');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if( $image ) {
              echo wp_get_attachment_image( $image, $size );
          }?>
        </div>
      </div>

      <div class="section">
        <p class="large"><strong>Links</strong></p>
        <?php
        if( have_rows('group_links_cc') ):
            while ( have_rows('group_links_cc') ) : the_row(); ?>
                <?php
                $website = get_sub_field('website-group');
                if( $website ): ?>
                    <a class="" target="_blank"  href="<?php echo esc_url( $website ); ?>"><p class="large">Website</p></a>
                <?php endif; ?>

                <?php
                $school_board = get_sub_field('school_board');
                if( $school_board ): ?>
                    <a class="" target="_blank"  href="<?php echo esc_url( $school_board ); ?>"><p class="large">Board Members</p></a>
                <?php endif; ?>

                <?php
                if(get_sub_field('group_links_extra')): ?>

              	<?php while(has_sub_field('group_links_extra')): ?>

              		<a class="" target="_blank"  href="<?php the_sub_field('url'); ?>"><p class="large"><?php the_sub_field('name'); ?></p></a>

              	<?php endwhile; ?>


              <?php endif; ?>


            <?php endwhile;

        else :

            // no rows found

        endif;

        ?>
      </div>


      <div class="section">
        <p class="large"><strong>Social Media</strong></p>

        <?php
        if( have_rows('social_media_section_cc') ):
            while ( have_rows('social_media_section_cc') ) : the_row(); ?>
                <?php
                $facebook_group = get_sub_field('facebook-group');
                if( $facebook_group ): ?>
                    <a class="" target="_blank"  href="<?php echo esc_url( $facebook_group ); ?>"><p class="large">Facebook</p></a>
                <?php endif; ?>

                <?php
                $twitter_group = get_sub_field('twitter-group');
                if( $twitter_group ): ?>
                    <a class="" target="_blank"  href="<?php echo esc_url( $twitter_group ); ?>"><p class="large">Twitter</p></a>
                <?php endif;

                if(get_sub_field('group_links_extra')): ?>

                <?php while(has_sub_field('group_links_extra')): ?>

                  <a class="" target="_blank"  href="<?php the_sub_field('url'); ?>"><p class="large"><?php the_sub_field('name'); ?></p></a>

                <?php endwhile; ?>


              <?php endif; ?>


            <?php endwhile;

        else :

            // no rows found

        endif;

        ?>
      </div>
    </div>

    <div class="related-posts">
      <h2 class="lato" style="margin-top: .5em;">Related Posts</h2>
      <?php

      $args = array(
        'tax_query' => array(
          array(
            'taxonomy' => 'community-college-posts',
            'field' => 'slug',
            'terms' => $post->post_name
          )
        ),
        'posts_per_page' => 4
      );

      query_posts($args);
      $related = new WP_Query($args);
      $related_posts = false;

      if ($related->have_posts()) : ?>
        <div class="row">
          <div class="col-md-12">
            <div class="category-content-justify-left">
              <?php
              while ($related->have_posts()) : $related->the_post();
              $featured_image = Media\get_featured_image('featured-four-block'); ?>
              <article <?php post_class('block-news content-block-4 clearfix'); ?>>
                <div class="flex">
                  <div class="block-content">
                    <?php if (!empty($featured_image)) { ?>
                      <img src="<?php echo $featured_image; ?>" />
                    <?php } else { ?>
                      <div class="circle-image">
                        <?php// echo $author_pic; ?>
                      </div>
                    <?php } ?>
                    <p class="small"><?php echo $post_type; ?></p>
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <?php get_template_part('templates/components/entry-meta'); ?>
                    <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                    <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
                  </div>
                </div>
              </article>
              <?php
              endwhile;
              wp_reset_query(); ?>
            </div>
          </div>
        </div>
      <?php endif;?>
    </div>


    <div class="related-maps">
      <h2 class="lato" style="margin-top: .5em;">Related Maps</h2>
      <?php

      $args = array(
        'post_type' => 'map',
        'meta_query' => array(
          array(
            'key' => 'district-level',
            'value' => true
          )
        ),
        'posts_per_page' => 1
      );

      query_posts($args);
      $related = new WP_Query($args);
      $related_posts = false;

      if ($related->have_posts()) : ?>
        <div class="row">
          <div class="col-md-12">
            <div class="category-content-justify-left">
              <?php
              while ($related->have_posts()) : $related->the_post(); ?>
              <article <?php post_class('block-news content-block-4 clearfix'); ?>>
                <div class="flex">
                  <div class="block-content">
                    <?php if (!empty($featured_image)) { ?>
                      <img src="<?php echo $featured_image; ?>" />
                    <?php } else { ?>
                      <div class="circle-image">
                        <?php// echo $author_pic; ?>
                      </div>
                    <?php } ?>
                    <p class="small"><?php echo $post_type; ?></p>
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <?php get_template_part('templates/components/entry-meta'); ?>
                    <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                    <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
                  </div>
                </div>
              </article>
              <?php
              endwhile;
              wp_reset_query(); ?>
            </div>
          </div>
        </div>
      <?php endif;?>
    </div>



    <?php if (have_rows('chart_section_cc')): ?>

      <?php while (have_rows('chart_section_cc')) : the_row(); ?>

        <?php if( get_row_layout() == 'charts' ): ?>

          <div class="chart-section extra-bottom-margin clearfix">

            <div class="col-md-12 callout">

              <h3 style="margin-top: .5em;"><?php the_sub_field('section_title') ?></h3>

              <h4><?php the_sub_field('source') ?></h4>

            </div>

            <?php while (have_rows('chart')) : the_row(); ?>
              <?php if (!get_sub_field('hide')): ?>
                <div class="col-md-4">

                  <h6 style="color: #731454"><?php the_sub_field('chart_name'); ?></h6>
                  <p><?php the_sub_field('subtitle'); ?></p>

                  <?php if (get_sub_field('chart_type') == 'number'): ?>

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('number') ?></span>
                    </p>

                    <p><small><?php the_sub_field('number_description') ?></small></p>

                  <?php elseif (get_sub_field('chart_type') == 'image'): ?>

                    <?php $image = get_sub_field('image'); ?>

                    <img src="<?php echo $image['url'] ?>">

                  <?php endif; ?>

                </div>
              <?php endif; ?>
            <?php endwhile; ?>

          </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'stats' ): ?>

          <div class="chart-section extra-bottom-margin clearfix">

            <div class="col-md-12 callout">

              <h3 style="margin-top: .5em;"><?php the_sub_field('section_title') ?></h3>

              <h4><?php the_sub_field('source') ?></h4>

            </div>

            <?php if( have_rows('first-year') ): ?>
              <?php while( have_rows('first-year') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <!-- <p><?php// the_sub_field('subtitle'); ?></p> -->

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <!-- <p><small><?php //the_sub_field('number_description') ?></small></p> -->

                </div>

              <?php endwhile; ?>
            <?php endif; ?>

            <?php if( have_rows('college-transfer') ): ?>
              <?php while( have_rows('college-transfer') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <!-- <p><?php// the_sub_field('subtitle'); ?></p> -->

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <!-- <p><small><?php //the_sub_field('number_description') ?></small></p> -->

                </div>

              <?php endwhile; ?>
            <?php endif; ?>

            <?php if( have_rows('curriculum') ): ?>
              <?php while( have_rows('curriculum') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <!-- <p><?php// the_sub_field('subtitle'); ?></p> -->

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <!-- <p><small><?php //the_sub_field('number_description') ?></small></p> -->

                </div>

              <?php endwhile; ?>
            <?php endif; ?>

          </div>

          <?php endif; ?>

      <?php endwhile; ?>

    <?php endif; ?>

    <h1 class="lato"><?php the_field('county_name'); ?> County Profile</h1>
    <?php
    $history = get_field('history_url');
    if( $history ): ?>
      <h6>View the county's history <a class="" target="_blank"  href="<?php echo esc_url( $history ); ?>">here</a>.</h6>
    <?php endif; ?>
    <div class="district-body">
      <?php the_field('county_profile'); ?>
    </div>

    <div class="row extra-bottom-margin">
      <div class="col-md-12 flex">
        <div class="image-district">
          <?php the_post_thumbnail('large', array('class' => 'district-map')); ?>
        </div>
        <div class="content-district flex-horizontal">
          <div class="section">
            <h6>Bachelor's Degree</h6>
            <h1 class="lato"><?php the_field('county_bachelors_degree_percentage'); ?></h1>
          </div>
          <div class="section">
            <h6>High School Graduates</h6>
            <h1 class="lato"><?php the_field('county_high_school_grad_percentage'); ?></h1>
          </div>
          <div class="section">
            <h6>Industries</h6>
            </br>
            <?php
            // check if the repeater field has rows of data
            if( have_rows('county_industries') ):
             	// loop through the rows of data
                while ( have_rows('county_industries') ) : the_row(); ?>
                    <h6 class="lato"><?php the_sub_field('industry_name'); ?> | <?php the_sub_field('percentage'); ?></h6>
                <?php endwhile;
            else :
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>




  </div>
<?php endwhile; ?>
