<?php
use Roots\Sage\Titles;
use Roots\Sage\ShareCount;

$twitter = get_field('twitter');
$email = get_field('email');


?>
<!-- // Check if coauthors plugin is enabled -->

<?php if ( function_exists( 'get_coauthors' ) ) {
  $coauthors = get_coauthors();
  $coauthors_count = count($coauthors); ?>

  <div class="row bio">
    <div class="col-xs-12 col-md-12 flex-box">
      <?php
        if ($coauthors_count > 1) { ?>
          <div class="author-article">
            <div class="margin-none">
              <p><?php echo $author = coauthors_posts_links( null, null, null, null, false ); ?></p>
            </div>
            <time class="published pf-date" datetime="<?php echo get_the_time('c'); ?>">
              <?php the_time(get_option('date_format')); ?>
            </time>
          </div>
        <?php
        } else {

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
              //print_r ($user);
              ?>
              <div class="author-info">
                <div class="circle-image-article">
                  <?php the_post_thumbnail('bio-headshot'); ?>
                </div>
                <div class="author-article">
                  <div class="">
                    <a href="<?php echo get_author_posts_url($user['ID']); ?>" class="read-more"><?php the_title(); ?></a>
                    <?php// get_template_part('templates/components/author', 'excerpt-2019'); ?>
                  </div>
                  <?php endwhile; endif; wp_reset_query();?>
                  <div>
                      <?php
                      $u_time = get_the_time('U');
                      $u_modified_time = get_the_modified_time('U');
                      //$modified = the_modified_date('g:i a');
                      //echo $u_time;
                      //echo $u_modified_time;
                      //echo $modified;
                      ?>
                    <time class="published pf-date" datetime="<?php echo get_the_time('c'); ?>">
                      <?php the_time(get_option('date_format'));
                      if ($u_modified_time >= $u_time + 8400) {
                      echo " - Updated ";
                      the_modified_time('M jS, Y');
                      echo ", ";
                      the_modified_time();
                      echo " "; }





                      ?>
                    </time>
                  </div>
                </div>
              </div>

          <?php } ?>
        <?php } ?>

        <div class="share-buttons">
          <?php get_template_part('templates/components/social-share-btns'); ?>
        </div>


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
