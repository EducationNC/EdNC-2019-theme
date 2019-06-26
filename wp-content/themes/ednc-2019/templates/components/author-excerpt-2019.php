<div class="inline">
  <?php
  $twitter = get_field('twitter');
  $email = get_field('email');
  $website = get_field('website');
  $author = get_the_author();

  if (get_field('has_bio_page') == 1) {
    if ($twitter) {
      echo '<div class="nowrap overflow-ellipsis inline-block margin-icon"> <a href="http://twitter.com/' . $twitter . '" target="_blank"><span class="big icon-twitter"></span></a></div>';
    }
    if ($email) {
      echo '<div class="nowrap overflow-ellipsis inline-block margin-icon"><a href="mailto:' . antispambot($email) . '" target="_blank"><span class="big icon-email"></span></a></div>';
    }
  } else {
    if ($twitter) {
      echo '<div class="nowrap overflow-ellipsis inline-block margin-icon"> <a href="http://twitter.com/' . $twitter . '" target="_blank"><span class="big icon-twitter"></span></a></div>';
    }
  }
  ?>
</div>
