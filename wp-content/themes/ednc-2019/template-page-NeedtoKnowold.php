<?php
/*
Template Name: Need to Know OLD
*/

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
						<div class="ntk-main">
							<div class="item notes">
								<h3><?php the_title(); ?><h3>
								<?php the_field('notes'); ?>
							</div>
							<div class="item news">
		            <h3>Top Article</h3>
		            <?php
		            $post_object = get_field('top_news_article');
		            if( $post_object ):
		            	// override $post
		            	$post = $post_object;
		            	setup_postdata( $post );
		              $featured_image = Media\get_featured_image('featured-four-block');
		            	?>
		                <div>
											<a class="" target="_blank" href="<?php the_permalink(); ?>">
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
		                  <a class="" target="_blank" href="<?php the_permalink(); ?>">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</article>
<?php endwhile; ?>
