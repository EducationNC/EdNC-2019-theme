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

$rec_reader_body = get_field( 'body_text-rec-read-block' );
$rec_reader_header = get_field( 'recommended_articles_right-header' );
$ids = get_field('recommended_articles_right-block', false, false);

$query = new WP_Query(array(
	'posts_per_page'	=> 4,
	'post__in'			=> $ids,
	'post_status'		=> 'any',
	'orderby'       => 'post__in',
));
//print_r ($query);

 echo '<div class="recommended-reading-right-block">';
   echo '<div class="body-text--content">' . apply_filters( 'ea_the_content',   $rec_reader_body ) . '</div>';
   echo '<div class="editor-picks">' ?>
     <div class="recommended-blocks-right">
       <h4 class="header"> <?php echo $rec_reader_header ?> </h4>
       <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

       $featured_image = Media\get_featured_image('medium');
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

       <div class="rec-read-right-block">
         <a href="<?php the_permalink(); ?>">
           <!-- <p class="small"><?php //echo $post_type ?></p> -->
           <h4 class="post-title"><?php the_title(); ?></h4>
           <?php// get_template_part('templates/components/entry-meta'); ?>
           <!-- <a class="mega-link" href="<?php the_permalink(); ?>"></a> -->
         </a>
       </div>

       <hr>

       <?php endwhile; endif; wp_reset_query(); ?>
     </div>


  <?php echo '</div>'; ?>
<?php echo '</div>'; ?>
