<!-- <div class="container juicer">
  <script src="//assets.juicer.io/embed.js" type="text/javascript"></script>
  <link href="//assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
  <ul class="juicer-feed" data-feed-id="educationnc"><h1 class="referral"><a href="http://www.juicer.io">Powered by Juicer</a></h1></ul>
</div>

<div class="follow-buttons text-center">
  <h3>See more and follow EdNC on:</h3>
  <a href="https://www.facebook.com/educationnc" target="_blank"><span class="icon-facebook"></span></a>
  <a href="https://www.twitter.com/educationnc" target="_blank"><span class="icon-twitter"></span></a>
  <a href="https://www.instagram.com/educationnc" target="_blank"><span class="icon-instagram"></span></a>
</div> -->

<div class="container">
  <?php
  // Use shortcode in a PHP file (outside the post editor).
  echo do_shortcode( '' );

  // Use shortcodes in form like Landing Page Template.
  echo do_shortcode( '[custom-twitter-feeds screenname="educationnc" num=4 include="author,date,text,avatar,media"]' );

  // Store the short code in a variable.
  $var = do_shortcode( '' );
  echo $var;
  ?>

</div>

<div class="follow-buttons text-center">
  <h3>See more and follow EdNC on:</h3>
  <a href="https://www.facebook.com/educationnc" target="_blank"><span class="icon-facebook"></span></a>
  <a href="https://www.twitter.com/educationnc" target="_blank"><span class="icon-twitter"></span></a>
  <a href="https://www.instagram.com/educationnc" target="_blank"><span class="icon-instagram"></span></a>
</div>
