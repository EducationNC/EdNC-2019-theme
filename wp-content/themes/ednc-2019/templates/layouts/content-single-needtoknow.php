<?php

use Roots\Sage\Titles;
use Roots\Sage\Assets;
use Roots\Sage\Media;
use Roots\Sage\Resize;

while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>

	<section id="" class="block-small green">
		<div class="site-wrapper">
			<div class="container">
				<div class="">
				  <img class="category-header-image" src="<?php echo Assets\asset_path('images/Needtoknowbanner.png'); ?>">
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="ntk-grid">
							<div class="item notes">
								<?php the_title(); ?>
								<?php the_field('notes'); ?>
							</div>
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
											<a class="" href="<?php the_permalink(); ?>">
			                  <div class="lead-image">
			                    <img src="<?php echo $featured_image; ?>" alt="" title="" />
			                  </div>
			                  <p class="caption"><?php echo $title; ?></p>
			                  <h3 class="post-title-trending"><?php the_title(); ?></h3>
			                  <?php get_template_part('templates/components/entry-meta-small'); ?>
			                  <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
											 </a>
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
		                  <a class="" href="<?php the_permalink(); ?>">
		                    <div class="lead-image">
		                      <img src="<?php echo $featured_image; ?>" alt="" title="" />
		                    </div>
		                    <p class="caption"><?php echo $title; ?></p>
		                    <h3 class="post-title-trending"><?php the_title(); ?></h3>
		                    <?php get_template_part('templates/components/entry-meta-small'); ?>
		                    <p class="lato"><?php echo wp_trim_excerpt(); ?></p>
		                  </a>
		                </div>
		                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		            <?php endif; ?>
		          </div>
							<div class="item fb-share">
		            <?php
		            $top_fb_post = get_field('top_fb_post');
		            if( $top_fb_post ): ?>
		                <a class="" href="<?php echo esc_url( $top_fb_post ); ?>"><p><?php the_field('top_fb_text'); ?></p></a>
		            <?php endif; ?>
		          </div>
							<div class="item tw-share">
		            <?php
		            $top_tweet_link = get_field('top_tweet_link');
		            if( $top_tweet_link ): ?>
		                <a class="" href="<?php echo esc_url( $top_tweet_link ); ?>"><p><?php the_field('top_tweet_text'); ?></p></a>
		            <?php endif; ?>
		          </div>
							<!-- <div class="item reach">
								<img class="reach-btn"src="<?php //echo Assets\asset_path('images/Need-reach-button.png'); ?>" alt="Reach Button" height="50" width="">
							</div> -->
							<div class="item reach">
								<img class="reach-btn" src="<?php echo Assets\asset_path('images/ReachButton300by400.png'); ?>" alt="Reach Button" height="" width="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</article>
<?php endwhile; ?>
