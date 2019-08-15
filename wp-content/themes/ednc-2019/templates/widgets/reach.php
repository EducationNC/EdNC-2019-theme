<?php

use Roots\Sage\Assets;
use Roots\Sage\Media;
use Roots\Sage\Resize;

global $featured_ids;
// global $post;
// global $date;
// global $content_reach;
//$content_reach = array();
$reach_question = get_field( "reach_question_input" );

if (empty($featured_ids)) {
  $featured_ids = array();
}


$title_overlay = get_field('title_overlay');


?>

<section class="block reach">
  <div class="widget-content">
    <?php if( have_rows('reach', 'option') ): ?>
      <?php while( have_rows('reach', 'option') ): the_row(); ?>
        <?php $header = get_sub_field('header'); ?>
        <?php $image = get_sub_field('image'); ?>
        <div class="header-big">
          <?php	if( !empty($image) ): ?>
             <!-- <a href="<?php echo site_url(); ?>"> -->
               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
             <!-- </a> -->
          <?php endif; ?>
            <img class="section-icon" src="<?php echo Assets\asset_path('images/reach.svg'); ?>">
            <?php echo $header ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    <div class="content-box-container">
      <?php
      $args = array (
        'post_type' => 'reach-question',
        'posts_per_page' => 3,
        'meta_key'		=> 'reach_privacy',
        'meta_value'	=> 'Featured'
      );

      $query = new WP_Query( $args );
      //print_r ($query);

      if ( $query->have_posts() ) {

        $currentpost = 0;

        while ( $query->have_posts() ) : $query->the_post();

        $reach_title[$currentpost] = get_the_title();
        $reach_id[$currentpost] = get_the_id();
        $reach_date[$currentpost] = get_field('date');
        $reach_question[$currentpost] = get_field('reach_question_input');
        $reach_content[$currentpost] = get_the_content();
        $featured_image = Media\get_featured_image('featured-four-block');
        // $featured_image[$currentpost] = Media\get_featured_image('medium');
        ?>

        <div class="block-perspectives content-block-3 clearfix">
          <div class="block-content block-content-reach" id="<?php echo $reach_id[$currentpost] ?>">
            <!-- <a href="" class="href" id="<?php//echo $reach_id[$currentpost] ?>" data-id="<?php// echo $reach_id[$currentpost] ?>"> -->
              <div class="image-container" id="<?php echo $reach_id[$currentpost] ?>">
                <img class="" src="<?php echo $featured_image; ?>" />
                <div class='overlay-reach'></div>
                <img class="after" src="<?php echo Assets\asset_path('images/_ionicons_svg_md-arrow-down.svg'); ?>"></img>
              </div>
              <p class="small"><?php echo $reach_date[$currentpost] ?></p>
              <h3 class="post-title"><?php echo $reach_title[$currentpost] ?></h3>
            <!-- </a> -->
          </div>
        </div>

        <?php $currentpost++;

        endwhile;

        wp_reset_postdata();

      } ?>

      <div class="full-width-reach">
        <div class="box0" id="box0">
          <?php echo $reach_content[0];?>
          <h3 class="reach-header"><span>Reach NC Voices</span></h3>
          <div class="reach-embed"><?php echo $reach_question[0] ?></div>
        </div>
        <div class="box1 hide" id="box1">
          <?php echo $reach_content[1];?>
          <h3 class="reach-header"><span>Reach NC Voices</span></h3>
          <div class="reach-embed"><?php echo $reach_question[1] ?></div>
        </div>
        <div class="box2 hide" id="box2">
          <?php echo $reach_content[2];?>
          <h3 class="reach-header"><span>Reach NC Voices</span></h3>
          <div class="reach-embed"><?php echo $reach_question[2] ?></div>
        </div>
      </div>

      <script type="text/javascript">
      var reach0 = "<?php echo $reach_id[0]; ?>";
      var reach1 = "<?php echo $reach_id[1]; ?>";
      var reach2 = "<?php echo $reach_id[2]; ?>";
      var reach0Click = document.getElementById(reach0);
      var reach1Click = document.getElementById(reach1);
      var reach2Click = document.getElementById(reach2);

      document.getElementById(reach0).classList.add('active');

      reach0Click.onclick = function() {
          $('#box0').addClass('show').siblings('div').removeClass('show').addClass('hide');
          $(reach1Click).removeClass('active');
          $(reach2Click).removeClass('active');
          $(reach0Click).addClass('active');
          // $('#box0').toggleClass("show");
          // e.preventDefault();
      }
      reach1Click.onclick = function() {
          $('#box1').addClass('show').siblings('div').removeClass('show').addClass('hide');
          $(reach0Click).removeClass('active');
          $(reach2Click).removeClass('active');
          $(reach1Click).addClass('active');
      }
      reach2Click.onclick = function() {
          $('#box2').addClass('show').siblings('div').removeClass('show').addClass('hide');
          $(reach1Click).removeClass('active');
          $(reach0Click).removeClass('active');
          $(reach2Click).addClass('active');
      }

      </script>

    </div>
  </div>
</section>
