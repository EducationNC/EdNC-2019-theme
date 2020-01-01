<?php
 /**
  * Recommended Articles Block
  *
  * @package      ClientName
  * @author       Bill Erickson
  * @since        1.0.0
  * @license      GPL-2.0+
 **/

 use Roots\Sage\Extras;
 use Roots\Sage\Media;

$rec_reader_header = get_field( 'header-rec-reading' );
$ids = get_field('recommended_articles_block', false, false);

$query = new WP_Query(array(
	'posts_per_page'	=> 3,
	'post__in'			=> $ids,
	'post_status'		=> 'any',
	'orderby'       => 'post__in',
));
//print_r ($query); ?>

<?php echo '<div class="container-full">'; ?>
  <div class="row">
    <h3 class="rd no-span"><?php the_field('recommended_articles_header', 'option'); ?></h3>
    <div class="recommended-blocks">
      <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

      $featured_image = Media\get_featured_image('featured-four-block');
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

      <div class="block-recommended_block">
        <a href="<?php the_permalink(); ?>">
          <?php if (!empty($featured_image)) {
           echo '<img class="" src="' . $featured_image . '" />';
         } ?>
          <!-- <p class="small"><?php //echo $post_type ?></p> -->
          <h3 class="post-title"><?php the_title(); ?></h3>
          <?php get_template_part('templates/components/entry-meta'); ?>
          <!-- <a class="mega-link" href="<?php the_permalink(); ?>"></a> -->
        </a>
      </div>

      <?php endwhile; endif; wp_reset_query(); ?>
    </div>
  </div>
<?php echo '</div>'; ?>
