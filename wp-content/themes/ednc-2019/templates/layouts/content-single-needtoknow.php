<?php

use Roots\Sage\Titles;
use Roots\Sage\Assets;
use Roots\Sage\Media;
use Roots\Sage\Resize;

while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ntk-grid">
					<div class="item notes"><?php the_field('notes'); ?></div>
					<div class="item news">
            <h3>Top News Article</h3>
            <?php
            $post_object = get_field('top_news_article');
            if( $post_object ):
            	// override $post
            	$post = $post_object;
            	setup_postdata( $post );
              $featured_image = Media\get_featured_image('featured-four-block');
            	?>
                <div>
                  <div class="lead-image">
                    <img src="<?php echo $featured_image; ?>" alt="" title="" />
                  </div>
                  <p class="caption"><?php echo $title; ?></p>
                  <h3 class="post-title-trending"><?php the_title(); ?></h3>
                  <?php get_template_part('templates/components/entry-meta-small'); ?>
                  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                  <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
                </div>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
          </div>
					<div class="item perspective">
            <h3>Top Perspective</h3>
            <?php
            $post_object = get_field('top_perspective_article');
            if( $post_object ):
              // override $post
              $post = $post_object;
              setup_postdata( $post );
              $featured_image = Media\get_featured_image('featured-four-block');
              ?>
                <div>
                  <div class="lead-image">
                    <img src="<?php echo $featured_image; ?>" alt="" title="" />
                  </div>
                  <p class="caption"><?php echo $title; ?></p>
                  <h3 class="post-title-trending"><?php the_title(); ?></h3>
                  <?php get_template_part('templates/components/entry-meta-small'); ?>
                  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
                  <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
                </div>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
          </div>
					<div class="item fb-share">facebook share</div>
					<div class="item tw-share">twitter share</div>
					<div class="item reach">reach</div>
				</div>
			</div>
		</div>
	</div>
</article>
<?php endwhile; ?>
