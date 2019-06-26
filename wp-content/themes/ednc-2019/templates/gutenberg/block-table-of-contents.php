<?php
/**
 * Block Name: Table of Contents
 *
 * @package      ClientName
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/
if( is_admin() ) {
	echo '<div class="table-of-contents admin">Table of Contents will appear here</div>';
} else {
	ea_table_of_contents();
}
