<div class="bottom-margin">
  <?php
  $twitter = get_field('twitter');
  $email = get_field('email');
  $website = get_field('website');

  if (get_field('has_bio_page') == 1) { ?>
    <div>
      <?php  $user = get_field('user'); ?>
      <?php the_advanced_excerpt(); ?>
      <a href="<?php echo get_author_posts_url($user['ID']); ?>" class="read-more">Read full bio &raquo;</a>
    </div>
  <?php } else { ?>
    <div>
      <?php the_content(); ?>
    </div>
  <?php }

  if ($email) {
    echo '<div class="nowrap overflow-ellipsis"><span class="big icon-email"></span> <a href="mailto:' . antispambot($email) . '" target="_blank">' . antispambot($email) . '</a></div>';
  }

  if ($twitter) {
    echo '<div class="nowrap overflow-ellipsis"><span class="big icon-twitter"></span> <a href="http://twitter.com/' . $twitter . '" target="_blank">@' . $twitter . '</a></div>';
  }

  if ($website) {
    echo '<div class="nowrap overflow-ellipsis"><span class="big icon-website"></span> <a href="' . $website . '" target="_blank">Website</a></div>';
  }
  ?>
</div>
