<?php

// Add cookie for every current post category
function set_cookies_for_categories() {
    global $post;
    if ($post) {
        $category = wp_get_post_terms(get_the_id($post), 'category');
        foreach ($category as $cat) {
            if ($cat && $cat->slug) {
                setcookie("cat-" . $cat->slug, "true", time() + (300), "/"); // 300 = five minutes
            } 
        }
    }
}

add_action('template_redirect', 'set_cookies_for_categories');