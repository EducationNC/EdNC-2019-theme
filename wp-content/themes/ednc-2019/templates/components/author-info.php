<?php use Roots\Sage\Titles;

$twitter = get_field('twitter');
$email = get_field('email');


 ?>
<!-- // Check if coauthors plugin is enabled -->

<?php if ( function_exists( 'get_coauthors' ) ) {
  $coauthors = get_coauthors();
  $coauthors_count = count($coauthors); ?>

  <div class="row bio">
    <div class="col-xs-12 col-md-12">
      <?php
        if ($coauthors_count > 1) { ?>
          <div class="author-article">
            <div class="margin-none">
              <p class="p-author h-card"><?php echo $author = coauthors_posts_links( null, null, null, null, false ); ?></p>
            </div>
            <time class="published pf-date dt-published" datetime="<?php echo get_the_time('c'); ?>">
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
              <div class="circle-image-article">
                <?php the_post_thumbnail('bio-headshot'); ?>
              </div>
              <div class="author-article">
                <div class="margin-none">
                  <a href="<?php echo get_author_posts_url($user['ID']); ?>" class="read-more"><?php the_title(); ?></a>
                  <?php// get_template_part('templates/components/author', 'excerpt-2019'); ?>
                </div>
                <?php endwhile; endif; wp_reset_query();?>
                <div>
                  <time class="published pf-date" datetime="<?php echo get_the_time('c'); ?>">
                    <?php the_time(get_option('date_format')); ?>
                  </time>
                </div>
              </div>
          <?php } ?>
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
