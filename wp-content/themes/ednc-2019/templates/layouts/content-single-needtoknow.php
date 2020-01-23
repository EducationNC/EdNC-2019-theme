<?php


use Roots\Sage\Titles;
use Roots\Sage\Assets;
use Roots\Sage\Media;
use Roots\Sage\Resize;


while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>

	<section id="" class="block-small dark-blue">
		<div class="site-wrapper">
			<div class="container">
				<div class="">
				  <img class="category-header-image" src="<?php echo Assets\asset_path('images/NTK-orange.png'); ?>">
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="ntk-taxonomy">
							<div class="ntk-main">
								<div class="notes">
									<h3><?php the_title(); ?><h3>
									<?php the_field('notes'); ?>
								</div>
								<div class="articles">
									<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
									<div class="fb-post"
							      data-href="https://www.facebook.com/20531316728/posts/10154009990506729/"
							      data-width="200">
									</div>
									<div class="fb-post"
										data-href="https://www.facebook.com/20531316728/posts/10154009990506729/"
										data-width="200">
									</div>
									<!-- <div class="twitter">
										<?php
										/*
										$top_tweet_link = get_field('top_tweet_link');
										if( $top_tweet_link ): ?>
										<a class="item tw" target="_blank" href="<?php echo esc_url( $top_tweet_link ); ?>">
											<div class="tw-share">
												<p><?php the_field('top_tweet_text'); ?></p>
											</div>
										</a>
										<?php endif;
										*/?>
									</div> -->
								</div>

								<div class="entry-content">

									<?php
									$feature = get_field('featured_read');
									if (! empty($feature) ) { ?>
										<div class="featured-pick-ntk extra-top-padding" data-source="<?php echo $feature[0]['link']; ?>">
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



							</div>
							<div class="ntk-right">
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

								<?php get_template_part('templates/components/sidebar', 'NTK'); ?>



								<div class="item reach">
									<a href="https://www.ednc.org/join-the-virtual-town-hall/">
										<img class="reach-btn" src="<?php echo Assets\asset_path('images/ReachButton400by50.png'); ?>" alt="Reach Button" height="" width="">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</article>
<?php endwhile; ?>
