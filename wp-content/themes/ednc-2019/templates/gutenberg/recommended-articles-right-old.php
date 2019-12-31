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

 echo '<div class="recommended-reading-right-block">';
   echo '<div class="body-text--content">' . apply_filters( 'ea_the_content',   $rec_reader_body ) . '</div>';
   echo '<div class="editor-picks">' ?>
     <div class="recommended-blocks-right">
       <h4 class="header"> <?php echo $rec_reader_header ?> </h4>
       <?php
       $args = array(
            'post_html' => '<div style="font-family:Lato; font-weight:500;">{thumb} <a href="{url}">{text_title}</a></div><hr>',
            'limit' => 4,
            'wpp_start' => '<div>',
            'wpp_end' => '</div>'
       );

       wpp_get_mostpopular($args );
       ?>
     </div>


  <?php echo '</div>'; ?>
<?php echo '</div>'; ?>
