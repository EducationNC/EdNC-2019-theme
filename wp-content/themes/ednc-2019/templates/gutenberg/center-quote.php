<?php
 /**
  * Team Member block
  *
  * @package      ClientName
  * @author       Bill Erickson
  * @since        1.0.0
  * @license      GPL-2.0+
 **/
 $centerquote = get_field( 'center-quote' );

echo '<div class="centerquote">';
  echo '<div class="centerquote--content">' . apply_filters( 'ea_the_content',   $centerquote ) . '</div>';
echo '</div>';
