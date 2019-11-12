<?php
 /**
  * Trust Project Block
  *
  * @package      ClientName
  * @author       Bill Erickson
  * @since        1.0.0
  * @license      GPL-2.0+
 **/
 $trust_project = get_field( 'trust_project' );

echo '<div class="trust-project">';
  echo '<div class="trust-project--content">' .
    '<h2 class="h2-trust">Behind the Story</h2>' .
    apply_filters( 'ea_the_content',   $trust_project ) .
  '</div>';
  //if( !empty( $block_quote ) )
    //echo '<h4>' . esc_html( $block_quote ) . '</h4>';
echo '</div>';
