<div class="container">
  <div class="row page">
    <div id="chapters" class="col-md-2 print-no chapters-report">
      <div id="chapters-inside" class="disable-scrollbars">
        <?php
        if ( get_field('chapters') ) {
          echo do_shortcode( get_field('chapters') );
        }
        ?>
      </div>
    </div>
    <div class="col-md-8 col-centered">
      <?php the_content(); ?>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </div>
  </div>
</div>
