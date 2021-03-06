<?php
/**
* EdNews Test RSS2 Template
*/
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';

$ednews = new WP_Query(array(
  'post_type' => 'ednews',
  'posts_per_page' => 1
));

while ($ednews->have_posts()) : $ednews->the_post();

  $date = mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false);
  $subject = get_field('subject_line');
  $preview = get_field('preview_text');
  $articles = get_field('daily_articles');
?>
<rss version="2.0"
xmlns:content="http://purl.org/rss/1.0/modules/content/"
xmlns:wfw="http://wellformedweb.org/CommentAPI/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:atom="http://www.w3.org/2005/Atom"
xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
<?php do_action('rss2_ns'); ?>>

  <channel>
    <title><?php echo $subject; ?></title>
    <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
    <link><?php bloginfo_rss('url') ?></link>
    <description><?php echo $preview; ?></description>
    <lastBuildDate><?php echo $date; ?></lastBuildDate>
    <language>en-us</language>
    <sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
    <sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>

    <?php foreach ($articles as $post) : ?>
      <?php setup_postdata($post); ?>
      <item>
        <title><?php the_title_rss(); ?></title>
        <link><?php the_permalink_rss(); ?></link>
        <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
        <dc:creator><?php
        if ( function_exists( 'coauthors_posts_links' ) ) {
          coauthors();
        } else {
          the_author();
        }
        ?></dc:creator>
        <guid isPermaLink="false"><?php the_guid(); ?></guid>
        <content:encoded><![CDATA[<?php the_advanced_excerpt('length=40&length_type=words&finish=exact&add_link=0'); ?>]]></content:encoded>
        <?php rss_enclosure(); ?>
        <?php do_action('rss2_item'); ?>
      </item>
    <?php endforeach; wp_reset_postdata(); ?>
  </channel>
</rss>
<?php
endwhile; wp_reset_query();
