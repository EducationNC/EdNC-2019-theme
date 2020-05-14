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
  $editor_notes = get_field('notes');
  $featured = get_field('featured_read');
  $news_items = get_field('news_item');

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
  <?php //do_action('rss2_head'); ?>
    <item>
      <title><?php the_title_rss(); ?></title>
      <link><?php the_permalink_rss(); ?></link>
      <pubDate><?php echo $date; ?></pubDate>
      <dc:creator><?php the_author(); ?></dc:creator>
      <guid isPermaLink="false"><?php the_guid(); ?></guid>
      <content:encoded><![CDATA[<?php
      echo '<div style="font-size: 18px;">';
      echo preg_replace('/ style=("|\')(.*?)("|\')/','', $editor_notes); //Strips all inline styles
      echo '</div>';

      echo '<table border="0" cellpadding="18" cellspacing="0" width="100%" style="min-width: 100%;background-color: #DCDFE5;margin-bottom: 1em;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">';
        echo '<tbody>';
          echo '<tr>';
            echo '<td valign="top" style="color: #2B2E34;font-size: 14px;font-weight: normal;text-align: left;">';
              echo '<h4 style="text-align: left;margin: 0 0 .5em;padding: 0;display: block;font-family: Helvetica;font-size: 16px;font-style: normal;font-weight: normal;line-height: 125%;color: #44474D !important; border-bottom: 1px solid #AAADB3;">What we\'re reading</h4>';
              echo '<h2><a style="text-decoration:none;color:#8b185e;font-size:18px;font-weight:normal;" href="' . $featured[0]['link'] . '" target="_blank">' . $featured[0]['title'] . '</a></h2>';
              echo '<p style="margin: .5em 0;font-size:12px;">' . $featured[0]['source_name'] . ' | ' . $featured[0]['original_date'] . '</p>';
              echo '<p style="margin: .5em 0;padding: 0;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #666666;font-family: Georgia, Times, \'Times New Roman\', serif;font-size: 16px;line-height: 150%;text-align: left;">' . $featured[0]['intro_text'] . '</p>';
              echo '<p style="margin: .5em 0;padding: 0;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #666666;font-family: Georgia, Times, \'Times New Roman\', serif;font-size: 16px;line-height: 150%;text-align: left;">';
                echo '<a href="' . $featured[0]['link'] . '" style="color: #8b185e;font-weight: bold;word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;text-decoration: underline;" target="_blank">Continue reading&nbsp;&rarr;</a>';
              echo '</p>';
            echo '</td>';
          echo '</tr>';
        echo '</tbody>';
      echo '</table>';

      echo '<table border="0" cellpadding="0" cellspacing="0" id="templateRows" width="100%">';
      	echo '<tbody>';
        foreach ($news_items as $item) {
      		echo '<tr>';
              echo '<td align="center" class="templateColumnContainer" valign="top" width="100%">';
                echo '<table border="0" cellpadding="10" cellspacing="0" width="100%">';
          				echo '<tbody>';
          					echo '<tr>';
          						echo '<td class="columnContent" style="padding:9px 10px 9px 0;">';
                        echo '<h2><a style="text-decoration:none;color:#8b185e;font-size:18px;font-weight:normal;" href="' . $item['link'] . '" target="_blank">' . $item['title'] . '</a></h2>';
                        echo '<p style="color:#999999;font-size:12px;border-bottom:2px solid #eaeaea;padding-bottom:1em;">' . $item['source_name'] . ' | ' . $item['original_date'] . '</p>';
                      echo '</td>';
          					echo '</tr>';
          				echo '</tbody>';
          			echo '</table>';
              echo '</td>';
      		echo '</tr>';
        }
      	echo '</tbody>';
      echo '</table>';
      ?>]]></content:encoded>
      <?php rss_enclosure(); ?>
      <?php do_action('rss2_item'); ?>
    </item>
  <?php endwhile; wp_reset_query(); ?>
</channel>

</rss>
