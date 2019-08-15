<?php
 /**
  * Recommended Articles Block
  *
  * @package      ClientName
  * @author       Bill Erickson
  * @since        1.0.0
  * @license      GPL-2.0+
 **/

$newposts = get_field('recommended_articles-test');


 echo '<div class="centerquote">';
   echo '<div class="centerquote--content">' . apply_filters( 'ea_the_content',   $newposts ) . '</div>';
 echo '</div>';
