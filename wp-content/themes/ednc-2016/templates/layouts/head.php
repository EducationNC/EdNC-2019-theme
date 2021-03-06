<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="fb:pages" content="384676381708957" />

  <?php if (strtotime(get_the_modified_date()) > strtotime(get_the_date())) { ?>
    <meta name="revised" content="<?php echo get_the_modified_date('l, F j, Y'); ?>">
  <?php } ?>

  <?php echo basic_wp_seo(); ?>
  <?php echo add_author_meta(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  <link href="//fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic|Merriweather:300,300italic,400,400italic,700,700italic|Open+Sans+Condensed:300" rel="stylesheet" type="text/css" />


  <?php wp_head(); ?>

  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'es',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
      },'google_translate_element');
    }
  </script>

  <!-- Facebook Pixel Code for Reach NC -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '411833759557917');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=411833759557917&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

  <!-- Facebook Pixel Code for EdNC-->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '127720887882225');
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=127720887882225&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

  <?php
  if (!is_user_logged_in()) {
    get_template_part('templates/components/analytics');
  }
  ?>
	<style>
	.disabled {
	   pointer-events: none;
	   cursor: default;
	}
	</style>
  <!-- PrintFriendly.com -->
  <script type="text/javascript">var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if ('https:' === document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script>

</head>
