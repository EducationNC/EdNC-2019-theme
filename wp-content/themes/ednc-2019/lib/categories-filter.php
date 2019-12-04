<?php
/*
* Restrict categories listed on the post editor page to those that have been switched on using the 
* include_in_post_editor field attached to categories
*
*/

global $pagenow;

// Allowed pages for term exclusions
$pages = array( 'edit.php', 'post-new.php', 'post.php' );

function action_pre_get_terms( $instance ) { 
    if (isset($instance->query_vars) && is_array($instance->query_vars['taxonomy']) &&
        $instance->query_vars['taxonomy'][0] == 'category') {
            
        $meta_query = array(
            array(
                'key'     => 'include_in_post_editor',
                'value'   => 1,
                'compare' => '=',
            )
        );
        
        $instance->query_vars['meta_query'] = $meta_query;
    }
    
    return $instance;
}; 

// Make sure to exclude terms from $pages array
if (get_field('enable_category_filters', 'option') == true && (
    in_array( $pagenow, $pages ) || ( defined ( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) ) ) {
      
    // add the action 
    add_action( 'pre_get_terms', 'action_pre_get_terms', 10, 1 ); 
	
}