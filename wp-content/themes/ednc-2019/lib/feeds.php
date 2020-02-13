<?php

namespace Roots\Sage\Feeds;

/**
 * Custom feed templates
 *
 */

// Register custom feeds
function custom_rss() {
  add_feed('ednews', __NAMESPACE__ . '\\ednews');
  add_feed('features', __NAMESPACE__ . '\\features');
  add_feed('recent', __NAMESPACE__ . '\\recent');
  add_feed('weekly', __NAMESPACE__ . '\\weekly');
  add_feed('boardnotes', __NAMESPACE__ . '\\boardnotes');
  add_feed('wrapnotes', __NAMESPACE__ . '\\wrapnotes');
  add_feed('weekend', __NAMESPACE__ . '\\weekend');
  add_feed('digestspotlight', __NAMESPACE__ . '\\digestspotlight');
  add_feed('ednewstest', __NAMESPACE__ . '\\ednewstest');
}
add_action('init', __NAMESPACE__ . '\\custom_rss');

// Function for EdNews feed
function ednews() {
  get_template_part('templates/feeds/ednews');
}

function ednewstest() {
  get_template_part('templates/feeds/ednews-new-test');
}

// Function for Board Notes feed
function boardnotes() {
  get_template_part('templates/feeds/boardnotes');
}

// Function for Board Notes feed
function wrapnotes() {
  get_template_part('templates/feeds/wrapnotes');
}

// Function for Featured stories feed
function features() {
  get_template_part('templates/feeds/features');
}

// Function for Posts Since Yesterday feed
function recent() {
  get_template_part('templates/feeds/recent-posts');
}

// Function for Weekly Wrapup feed
function weekly() {
  get_template_part('templates/feeds/weekly');
}

// Function for Weekend Reads feed
function weekend() {
  get_template_part('templates/feeds/weekend-features');
}

// Function for Daily Spotlight feed
function digestspotlight() {
  get_template_part('templates/feeds/digest-spotlight');
}

// Modify author feeds to include any custom post type
function feed_filter($query) {
  if ($query->is_feed && $query->is_author) {
    $query->set('post_type', 'any');
  }
  return $query;
}
// add_filter('pre_get_posts', __NAMESPACE__ . '\\feed_filter');
