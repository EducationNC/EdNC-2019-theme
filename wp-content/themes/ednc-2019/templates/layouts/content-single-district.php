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

    <div class="row extra-bottom-margin">
      <div class="col-md-12 flex">
        <div class="image-district">
          <?php the_post_thumbnail('large', array('class' => 'district-map')); ?>
        </div>
        <div class="content-district flex-horizontal">
          <div class="section">
            <h6>Schools</h6>
            <h1 class="lato"><?php the_field('number_of_schools'); ?></h1>
          </div>
          <div class="section">
            <h6>Teachers</h6>
            <h1 class="lato"><?php the_field('number_of_teachers'); ?></h1>
          </div>
          <div class="section">
            <h6>Students</h6>
            <h1 class="lato"><?php the_field('number_of_students'); ?></h1>
          </div>
        </div>
      </div>
    </div>

    <h1 class="lato">School District: <?php the_title(); ?></h1>
    <div class="district-body">
      <?php the_field('description'); ?>
    </div>

    <div class="district-content">
      <div class="section">
        <p class="large"><strong>Phone:</strong> <?php if (get_field('phone')) { the_field('phone');  } ?></p>
        <p class="large"><strong>Fax:</strong> <?php if (get_field('fax')) { the_field('fax');  } ?></p>
        </br>
        <p class="large"><strong>Street Address</strong></p>
        <p class="large"><?php the_field('address'); ?></p>
      </div>
      <div class="section-split">
        <div class="left">
          <p class="large"><strong>Superintendant</strong></p>
          <p class="large"><?php if (get_field('superintendent')) { the_field('superintendent');  } ?></p>
        </div>
        <div class="right">
          <img src="<?php the_field('superintendent_picture'); ?>" alt="<?php the_field('superintendent'); ?>" class="super-pic" />
        </div>
        <p class="large"><strong>Email</strong></p>
        <p class="large"><?php if (get_field('superintendent_email')) { the_field('superintendent_email');  } ?></p>
      </div>

      <div class="section">
        <p class="large"><strong>Links</strong></p>
        <?php
        if( have_rows('group_links') ):
            while ( have_rows('group_links') ) : the_row(); ?>
                <?php
                $website = get_sub_field('website-group');
                if( $website ): ?>
                    <a class="" target="_blank"  href="<?php echo esc_url( $website ); ?>"><p class="large">District Website</p></a>
                <?php endif; ?>

                <?php
                $school_board = get_sub_field('school_board');
                if( $school_board ): ?>
                    <a class="" target="_blank"  href="<?php echo esc_url( $school_board ); ?>"><p class="large">School Board</p></a>
                <?php endif; ?>

                <?php
                $district_calendar_url = get_sub_field('district_calendar_url');
                if( $district_calendar_url ): ?>
                    <a class="" target="_blank"  href="<?php echo esc_url( $district_calendar_url); ?>"><p class="large">District Calendar</p></a>
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
      <div class="section">
        <p class="large"><strong>Social Media</strong></p>

        <?php
        if( have_rows('social_media_section') ):
            while ( have_rows('social_media_section') ) : the_row(); ?>
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
            'taxonomy' => 'district-posts',
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

      $maps = new WP_Query($args);

      if ($maps->have_posts()) : ?>
        <div class="row">
          <div class="col-md-12">
            <div class="category-content-justify-left">
              <?php
              while ($maps->have_posts()) : $maps->the_post();
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



    <?php if (have_rows('chart_section_districts')): ?>

      <?php while (have_rows('chart_section_districts')) : the_row(); ?>

        <?php if( get_row_layout() == 'charts' ): ?>

          <div class="chart-section extra-bottom-margin clearfix">

            <div class="col-md-12 callout">

              <h3 style="margin-top: .5em;"><?php the_sub_field('section_title') ?></h3>

              <?php
              $source = get_sub_field('source');
              if( $source ): ?>
                  <a class="" target="_blank"  href="<?php echo esc_url( $source ); ?>"><h6>Source</h6></a>
              <?php endif; ?>


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

        <?php if( get_row_layout() == 'racial_breakdown' ): ?>

          <div class="chart-section extra-bottom-margin clearfix">

            <div class="col-md-12 callout">

              <h3 style="margin-top: .5em;"><?php the_sub_field('section_title') ?></h3>

              <?php
              $source = get_sub_field('source');
              if( $source ): ?>
                  <a class="" target="_blank"  href="<?php echo esc_url( $source ); ?>"><h6>Source</h6></a>
              <?php endif; ?>

            </div>

            <?php if( have_rows('black') ): ?>
              <?php while( have_rows('black') ): the_row();  ?>
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

            <?php if( have_rows('american_indian') ): ?>
              <?php while( have_rows('american_indian') ): the_row();  ?>
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

            <?php if( have_rows('asian') ): ?>
              <?php while( have_rows('asian') ): the_row();  ?>
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

            <?php if( have_rows('white') ): ?>
              <?php while( have_rows('white') ): the_row();  ?>
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

            <?php if( have_rows('hispanic') ): ?>
              <?php while( have_rows('hispanic') ): the_row();  ?>
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

            <?php if( have_rows('pacific-islander') ): ?>
              <?php while( have_rows('pacific-islander') ): the_row();  ?>
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

            <?php if( have_rows('two-or-more') ): ?>
              <?php while( have_rows('two-or-more') ): the_row();  ?>
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

        <?php if( get_row_layout() == 'ppe' ): ?>

          <div class="chart-section extra-bottom-margin clearfix">

            <div class="col-md-12 callout">

              <h3 style="margin-top: .5em;"><?php the_sub_field('section_title') ?></h3>
              <?php
              $source = get_sub_field('source');
              if( $source ): ?>
                  <a class="" target="_blank"  href="<?php echo esc_url( $source ); ?>"><h6>Source</h6></a>
              <?php endif; ?>

            </div>

            <?php if( have_rows('local') ): ?>
              <?php while( have_rows('local') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <p><?php the_sub_field('subtitle'); ?></p>

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <p><small>Local Rank: <?php the_sub_field('number_description') ?></small></p>

                </div>

              <?php endwhile; ?>
            <?php endif; ?>

            <?php if( have_rows('state') ): ?>
              <?php while( have_rows('state') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <p><?php the_sub_field('subtitle'); ?></p>

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <p><small>State Rank: <?php the_sub_field('number_description') ?></small></p>

                </div>

              <?php endwhile; ?>
            <?php endif; ?>

            <?php if( have_rows('federal') ): ?>
              <?php while( have_rows('federal') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <p><?php the_sub_field('subtitle'); ?></p>

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <p><small>Federal Rank: <?php the_sub_field('number_description') ?></small></p>

                </div>

              <?php endwhile; ?>
            <?php endif; ?>


          </div>

          <?php endif; ?>

        <?php if( get_row_layout() == 'stats' ): ?>

          <div class="chart-section extra-bottom-margin clearfix">

            <div class="col-md-12 callout">

              <h3 style="margin-top: .5em;"><?php the_sub_field('section_title') ?></h3>

              <?php
              $source = get_sub_field('source');
              if( $source ): ?>
                  <a class="" target="_blank"  href="<?php echo esc_url( $source ); ?>"><h6>Source</h6></a>
              <?php endif; ?>

            </div>

            <?php if( have_rows('grad_rates') ): ?>
              <?php while( have_rows('grad_rates') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <p><?php the_sub_field('subtitle'); ?></p>

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <p><small><?php the_sub_field('number_description') ?></small></p>

                </div>

              <?php endwhile; ?>
            <?php endif; ?>
            <?php if( have_rows('kinder') ): ?>
              <?php while( have_rows('kinder') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <p><?php the_sub_field('subtitle'); ?></p>

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <p><small><?php the_sub_field('number_description') ?></small></p>

                </div>

              <?php endwhile; ?>
            <?php endif; ?>
            <?php if( have_rows('fourth') ): ?>
              <?php while( have_rows('fourth') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <p><?php the_sub_field('subtitle'); ?></p>

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <p><small><?php the_sub_field('number_description') ?></small></p>

                </div>

              <?php endwhile; ?>
            <?php endif; ?>
            <?php if( have_rows('eighth') ): ?>
              <?php while( have_rows('eighth') ): the_row();  ?>
                <div class="col-md-3">

                  <h6 style="color: #731454"><?php the_sub_field('label'); ?></h6>
                  <p><?php the_sub_field('subtitle'); ?></p>

                    <p class="h1" style="margin-bottom: 1em;">
                      <span class="big"><?php the_sub_field('percentage') ?></span>
                    </p>

                    <p><small><?php the_sub_field('number_description') ?></small></p>

                </div>

              <?php endwhile; ?>
            <?php endif; ?>



          </div>

          <?php endif; ?>

      <?php endwhile; ?>

    <?php endif; ?>



  </div>
<?php endwhile; ?>
