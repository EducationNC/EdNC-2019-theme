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

								<a class="newsletter-link" href="<?php echo $example_link; ?>" target="_blank"><p class="lato small">See an example.</p></a>
							</div>

						<?php endwhile; ?>

						</ul>

					<?php endif; ?>

					<!-- <div class="block">
						<div class="images">
							<img class="newletter-img" src="https://static01.nyt.com/email-images/Newsletter%20Icons/ThePrivacyProject.jpg" alt="Smiley face" height="80" width="80">
							<a class="button-pop" href="https://app.monstercampaigns.com/c/s8dxiyojjdhdfdvsnfa2/">
								<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="40" width="40">
							</a>
						</div>
						<h6>WEEKLY</h6>
						<h5>The Privacy Project</h5>
						<p class="small">A weekly roundup of what the editors of T Magazine are noticing and coveting right now.</p>

						<a class="newsletter-link" href="https://www.w3schools.com" target="_blank"><p class="lato small">See an example.</p></a>
					</div> -->
				</div>
			</div>
		</div>

<?php endwhile; ?>
