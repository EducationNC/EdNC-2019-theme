<?php

use Roots\Sage\Extras;
use Roots\Sage\Media;

$rec_reader_body = get_field( 'body_text_articles_block' );
$rec_reader_header = get_field( 'header_text_articles_block' );

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
