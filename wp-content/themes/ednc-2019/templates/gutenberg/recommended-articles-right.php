<?php
 /**
  * Recommended Articles Right Side Block
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

?>

<div id="recommended-article-right">

  <div class="pulloutContainer">
    <div class="pulloutcontent">
      <h4 class="header"> <?php echo $rec_reader_header ?> </h4>
      <?php
      $args = array(
           'post_html' => '<div class="most-popular" style="font-family:Lato; font-weight:500; line-height: 1.5;">{thumb} <a href="{url}">{text_title}</a></div><hr>',
           'limit' => 4,
           'wpp_start' => '<div>',
           'wpp_end' => '</div>'
      );

      wpp_get_mostpopular($args );
      ?>
    </div>
  </div>

	<div class="content">
    <?php echo $rec_reader_body ?>
  </div>
</div>
