<?php
$source = '';
if (isset($_GET['utm_source'])) {
  $source = $_GET['utm_source'];
}
?>

<div class="email-signup-form">
  <h2><span>Sign up</span> for a free email subscription.</h2>
  <!-- Begin MailChimp Signup Form -->
  <div id="mc_embed_signup" class="mc_embed_signup">
    <form action="//ednc.us9.list-manage.com/subscribe/post?u=8ba11e9b3c5e00a64382db633&amp;id=2696365d99" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">

        <div class="mc-field-group input-group">
          <ul>
          	<li><input id="mce-group[13145]-13145-0" name="group[13145][1]" type="checkbox" value="1" /><label for="mce-group[13145]-13145-0">Daily Digest</label></li>
          	<li><input id="mce-group[13145]-13145-1" name="group[13145][2]" type="checkbox" value="2" /><label for="mce-group[13145]-13145-1">Weekly Wrapup</label></li>
          	<li><input id="mce-group[13145]-13145-3" name="group[13145][2097152]" type="checkbox" value="2097152" /><label for="mce-group[13145]-13145-3">Reach Roundup</label></li>
          	<li><input id="group_4194304" name="group[13145][4194304]" type="checkbox" /><label for="mce-group[13145]-13145-4">Friday@Five</label></li>
          	<li><input id="mce-group[13145]-13145-5" name="group[13145][8388608]" type="checkbox" value="8388608" /><label for="mce-group[13145]-13145-5">Awake 58</label></li>
            <li><input type="checkbox" value="16777216" name="group[13145][16777216]" id="mce-group[13145]-13145-6"><label for="mce-group[13145]-13145-6">EdNC STEM</label></li>
            <li><input type="checkbox" value="134217728" name="group[13145][134217728]" id="mce-group[13145]-13145-8"><label for="mce-group[13145]-13145-8">Early Bird</label></li>
          </ul>
        </div>

        <div class="hidden">
          <input type="hidden" name="MERGE3" id="MERGE3" value="<?php echo $source; ?>">
        </div>

        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>

        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>

        <div class="form-inline">
          <div class="form-group">
            <input type="email" value="" name="EMAIL" placeholder="Email address" class="required email form-control" id="mce-EMAIL">
            <input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default">
          </div>
        </div>

      </div>
    </form>
  </div>
  <!--End mc_embed_signup-->
</div>

<!-- OLD
<div class="email-signup-form">
  <h2><span>Sign up</span> for a free email subscription.</h2>

  <div id="mc_embed_signup" class="mc_embed_signup">
    <form action="//ednc.us9.list-manage.com/subscribe/post?u=8ba11e9b3c5e00a64382db633&amp;id=2696365d99" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">

        <div class="mc-field-group input-group">
          <ul>
            <li><input type="checkbox" value="0" name="group[13145][0]" id="mce-group[13145]-13145-0"><label for="mce-group[13145]-13145-0">Daily digest</label></li>
            <li><input type="checkbox" value="1" name="group[13145][1]" id="mce-group[13145]-13145-1"><label for="mce-group[13145]-13145-1">Weekly wrapup</label></li>
            <li><input type="checkbox" value="2" name="group[13145][2]" id="mce-group[13145]-13145-2"><label for="mce-group[13145]-13145-2">Breaking news alerts</label></li>
          </ul>
        </div>

        <div class="hidden">
          <input type="hidden" name="MERGE3" id="MERGE3" value="<?php //echo $source; ?>">
        </div>

        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>


        <div style="position: absolute; left: -5000px;"><input type="text" name="b_8ba11e9b3c5e00a64382db633_2696365d99" tabindex="-1" value=""></div>

        <div class="form-inline">
          <div class="form-group">
            <input type="email" value="" name="EMAIL" placeholder="Email address" class="required email form-control" id="mce-EMAIL">
            <input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default">
          </div>
        </div>

      </div>
    </form>
  </div>
</div>
-->
