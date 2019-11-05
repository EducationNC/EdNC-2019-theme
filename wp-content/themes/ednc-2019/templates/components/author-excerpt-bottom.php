<?php
use Roots\Sage\Titles;
use Roots\Sage\ShareCount;


?>
<!-- // Check if coauthors plugin is enabled -->

<?php if ( function_exists( 'get_coauthors' ) ) {
  $coauthors = get_coauthors();
  $coauthors_count = count($coauthors); ?>

  <div class="row bio">
    <div class="col-xs-12 col-md-12">
      <?php
        foreach ($coauthors as $author) {
            $args = array(
              'post_type' => 'bio',
              'meta_query' => array(
                array(
                  'key' => 'user',
                  'value' => $author->ID
                )
              )
            );



            $bio = new WP_Query($args);

            if ($bio->have_posts()) : while ($bio->have_posts()) : $bio->the_post(); ?>
              <?php
              $user = get_field('user');
              $twitter = get_field('twitter');
              $email = get_field('email');
              $website = get_field('website');
              //print_r ($user);
              ?>
              <div class="author">
                <div class="author-excerpt-intro">
                  <div class="author-excerpt-headshot">
                    <?php the_post_thumbnail('bio-headshot'); ?>
                    <a href="<?php echo get_author_posts_url($user['ID']); ?>" class="read-more"><?php the_title(); ?></a>
                  </div>
                  <div class="author-excerpt-social">
                    <?php
                    if ($twitter) {
                      echo '<div class="author-excerpt-social-icon"> <a href="http://twitter.com/' . $twitter . '" target="_blank"><span class="icon-twitter"></span></a></div>';
                    }
                    if ($email) {
                      echo '<div class="author-excerpt-social-icon"><a href="mailto:' . antispambot($email) . '" target="_blank"><span class="icon-email"></span></a></div>';
                    }
                    ?>
                  </div>
                </div>
                <div class="author-excerpt-bottom">
                  <div class="author-excerpt-bottom-content">
                    <?php
                      if (has_excerpt()) {
                        the_excerpt();
                      } else {
                        the_content();
                      }
                    ?>

                  </div>
                  <?php endwhile; endif; wp_reset_query();?>
                </div>
              </div>

      <?php } ?>

    </div>
  </div>
<?php
} else {
  // Fallback for no coauthors plugin
  $args = array(
    'post_type' => 'bio',
    'meta_query' => array(
      array(
        'key' => 'user',
        'value' => $author_id
      )
    )
  );
  $bio = new WP_Query($args);
  if ($bio->have_posts()) : while ($bio->have_posts()) : $bio->the_post(); ?>
    <div class="row">
      <div class="col-xs-3 col-sm-4 col-md-12">
        <?php the_post_thumbnail('bio-headshot'); ?>
      </div>
      <div class="col-xs-9 col-sm-8 col-md-12">
        <?php get_template_part('templates/components/author', 'excerpt'); ?>
      </div>
    </div>
  <?php endwhile; endif; wp_reset_query();
}
