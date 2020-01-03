<?php
/*
Template Name: Newsletter Signup Page
*/

use Roots\Sage\Titles;
use Roots\Sage\Assets;
?>

<?php while (have_posts()) : the_post(); ?>


	  <div class="row">
			<div class="col-md-8 col-centered mobile-padding-nl">
			  <!-- <h1 class="bold"></h1> -->
				<h1 class="light"><?php the_field('newsletter_intro_text'); ?></h1>
				</br>
				</br>
			</div>
	  </div>

		<div class="row newsletters-bg">
			<div class="col-md-8 col-centered mobile-padding-nl">
				<h3><?php the_field('newsletter_heading'); ?></h3>
				<hr>
				<div class="one-sign-up">
					<img class="" src="http://edncstaging.wpengine.com/wp-content/uploads/2020/01/EdNC-logo-1.png" alt="EdNC" height="70" width="70">
					<div class="section">
						<div class="text">
							<h5>EdNC</h5>
							<p class="small">Sign up for all of EdNC's newsletters</p>
						</div>
					</div>
					<a class="" href="https://app.monstercampaigns.com/c/uovkywpflwleboz8fu1w">
						<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="30" width="30">
					</a>
				</div>
				<hr>
				<!-- <h3><?php //the_field('other-news-intro'); ?></h3> -->
				<div class="newsletter-grid">
					<?php if( have_rows('newsletter_signup') ): ?>
						<?php while( have_rows('newsletter_signup') ): the_row();

							// vars
							$image = get_sub_field('image');
							$link = get_sub_field('link');
							$time_frame = get_sub_field('time_frame');

							$name_of_newsletter = get_sub_field('name_of_newsletter');
							$description = get_sub_field('description');
							$example_link = get_sub_field('example_link');

							?>

							<div class="block">
								<div class="images">
									<img class="newletter-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" height="80" width="80">
									<a class="button-pop" href="<?php echo $link; ?>">
										<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="40" width="40">
									</a>
								</div>
								<h6><?php echo $time_frame; ?></h6>
								<h5><?php echo $name_of_newsletter; ?></h5>
								<p class="small"><?php echo $description; ?></p>

								<!-- <a class="newsletter-link" href="<?php //echo $example_link; ?>" target="_blank"><p class="lato small">See an example.</p></a> -->
							</div>

						<?php endwhile; ?>

						</ul>

					<?php endif; ?>

				</div>
			</div>
		</div>

<?php endwhile; ?>
