<?php

use Roots\Sage\Assets;

while (have_posts()) : the_post(); ?>
  <article <?php post_class('h-entry'); ?>>

    <div class="bg-image">
    <?php
		$hero_image_editor = get_field('hero_image_editor', 'option');
		if( !empty($hero_image_editor) ): ?>
		   <!-- <a href="<?php echo site_url(); ?>"> -->
         <img src="<?php echo $hero_image_editor['url']; ?>" alt="<?php echo $hero_image_editor['alt']; ?>">
       <!-- </a> -->
		<?php endif; ?>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-9">
          <header class="entry-header">
            <h2 class="h1 entry-title p-name"><?php the_title(); ?></h2>
          </header>

          <div class="entry-content e-content">
            <?php the_field('notes'); ?>

            <hr />

            <?php
            $feature = get_field('featured_read');
            if (! empty($feature) ) { ?>
              <div class="featured-pick extra-top-padding" data-source="<?php echo $feature[0]['link']; ?>">
                <a class="mega-link" href="<?php echo $feature[0]['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
                <h6><?php the_field('featured_read', 'option'); ?></h6>
                <?php
                if (!empty($feature[0]['featured_image'])) { ?>
                  <div class="row">
                    <div class="col-sm-6 col-md-12">
                      <div class="photo-overlay">
                        <span class="label">&nbsp;</span>
                        <?php echo wp_get_attachment_image($feature[0]['featured_image']['ID'], 'featured-small'); ?>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-12">
                <?php } ?>

                <h4><?php echo $feature[0]['title']; ?></h4>

                <p class="meta byline"><?php echo $feature[0]['source_name']; ?> | <?php echo $feature[0]['original_date']; ?></p>
                <?php echo $feature[0]['intro_text']; ?>... <a class="more" href="<?php echo $feature[0]['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"><?php the_field('read_more', 'option'); ?> <span class="icon-external-link"></span></a></p></a>

                <?php if (!empty($feature[0]['featured_image'])) { ?>
                  </div>
                  </div>
                <?php } ?>
              </div>
            <?php } ?>

            <ul class="ednews-items">
              <?php
              $date = get_the_time('n/j/Y');
              $items = get_field('news_item');

              foreach ($items as $item) { ?>
                <li>
                  <a class="mega-link" href="<?php echo $item['link']; ?>" target="_blank" onclick="ga('send', 'event', 'ednews', 'click');"></a>
                  <h4><?php echo $item['title']; ?></h4>
                  <p class="meta"><?php echo $item['source_name']; ?> | <?php echo $item['original_date']; ?> <span class="icon-external-link"></span></p>
                </li>
              <?php } ?>
            </ul>

          </div>

          <footer>
            <hr />
            <p class="ednews-footer"><em><?php the_field('footnote', 'option'); ?></em></p>
          </footer>
        </div>

        <div class="col-md-3 col-lg-push-1">
          <?php get_template_part('templates/components/sidebar', 'editors-picks'); ?>
          <p><br /><a href="/feed/ednews/" target="_blank" class="btn btn-default"><span class="icon-rss"></span> RSS feed</a></p>
        </div>
      </div>
    </div>
  </article>
<?php endwhile; ?>
