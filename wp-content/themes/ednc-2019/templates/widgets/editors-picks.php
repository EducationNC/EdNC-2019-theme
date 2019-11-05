<?php
/*
$ednews = new WP_Query([
  'post_type' => 'ednews',
  'posts_per_page' => 1
]);

if ($ednews->have_posts()) : while ($ednews->have_posts()) : $ednews->the_post();

$feature = get_field('featured_read');

?>
<div class="editors-picks-widget">
  <div class="widget-content">
      <div class="title-section">
        <h1>Editor's Thoughts for the Day</h1>
        <h3>Get us in your inbox</h3>
      </div>
      <div class="main-content">
        <div class="content-entry">
          <h3><?php echo $feature[0]['title']; ?></h3>
          <p class="lato"><?php echo $feature[0]['source_name']; ?> | <?php echo $feature[0]['original_date']; ?></p>
        </div>
        <div class="break"></div>
        <?php
        $date = get_the_time('F j, Y');
        $ednewsall = get_field('news_item');
        $count = count($ednewsall);
        // $item = $items[$i];
        //echo $count;
        $items = array_slice($ednewsall, 0, 4);


        foreach ($items as $item) {?>
          <div class="content-entry">
            <h3 class=""><?php echo $item['title']; ?></h3>
            <p class="lato"><?php echo $item['source_name'];?> | <?php echo $item['original_date']; ?></p>
            <a class="mega-link" href="<?php echo $item['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
          </div>
          <div class="break"></div>
        <?php } ?>
      </div>
  </div>
</div>
<?php endwhile; endif; wp_reset_query();

*/
?>
