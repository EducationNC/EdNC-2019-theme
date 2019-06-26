<?php

// Use shortcode in a PHP file (outside the post editor).
echo do_shortcode( '' );


// In case there is opening and closing shortcode.
//echo do_shortcode( '[iscorrect]' . $text_to_be_wrapped_in_shortcode . '[/iscorrect]' );


// Enable the use of shortcodes in text widgets.
//add_filter( 'widget_text', 'do_shortcode' );

// Use shortcodes in form like Landing Page Template.
//echo do_shortcode( '[mc4wp_form id="72216"]' );

// Store the short code in a variable.
//$var = do_shortcode( '' );
//echo $var;

$source = '';
if (isset($_GET['utm_source'])) {
  $source = $_GET['utm_source'];
}

?>

<section class="full-width email email-signup-form-2019">
   <div class="widget-content">
      <h2 class="content-header"></h2>
      <!-- <div class="content-box-container"> -->
      <!-- Begin Mailchimp Signup Form -->
      <div id="mc_embed_signup">
         <form action="https://ednc.us9.list-manage.com/subscribe/post?u=8ba11e9b3c5e00a64382db633&amp;id=2696365d99" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
               <h2>Subscribe to our mailing list</h2>
               <div class="mc-field-group input-group">
                  <!-- <strong>Subscription Options </strong> -->
                  <ul>
                     <li><input type="checkbox" value="1" name="group[13145][1]" id="mce-group[13145]-13145-0"><label for="mce-group[13145]-13145-0">Daily digest</label></li>
                     <li><input type="checkbox" value="2" name="group[13145][2]" id="mce-group[13145]-13145-1"><label for="mce-group[13145]-13145-1">Weekly wrapup</label></li>
                     <li><input type="checkbox" value="64" name="group[13145][64]" id="mce-group[13145]-13145-2"><label for="mce-group[13145]-13145-2">Breaking news alerts</label></li>
                     <li><input type="checkbox" value="2097152" name="group[13145][2097152]" id="mce-group[13145]-13145-3"><label for="mce-group[13145]-13145-3">Reach roundup</label></li>
                     <li><input type="checkbox" value="4194304" name="group[13145][4194304]" id="mce-group[13145]-13145-4"><label for="mce-group[13145]-13145-4">Friday@Five</label></li>
                     <li><input type="checkbox" value="8388608" name="group[13145][8388608]" id="mce-group[13145]-13145-5"><label for="mce-group[13145]-13145-5">Awake 58</label></li>
                     <li><input type="checkbox" value="16777216" name="group[13145][16777216]" id="mce-group[13145]-13145-6"><label for="mce-group[13145]-13145-6">EdNC STEM</label></li>
                     <li><input type="checkbox" value="33554432" name="group[13145][33554432]" id="mce-group[13145]-13145-7"><label for="mce-group[13145]-13145-7">GametimeNC</label></li>
                  </ul>
               </div>
               <div class="mc-field-group-email">
                  <input type="email" placeholder="Your Email Address" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                  <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
               </div>

               <div id="mce-responses" class="clear">
                  <div class="response" id="mce-error-response" style="display:none"></div>
                  <div class="response" id="mce-success-response" style="display:none"></div>
               </div>
               <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
               <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>
               <!-- <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div> -->
            </div>
         </form>
      </div>
      <!--End mc_embed_signup-->
      <!-- </div> -->
   </div>
</section>
