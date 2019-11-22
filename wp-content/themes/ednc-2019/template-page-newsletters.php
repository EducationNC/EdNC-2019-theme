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
					<div class="block">
						<div class="images">
							<img class="newletter-img" src="https://static01.nyt.com/email-images/Newsletter%20Icons/ThePrivacyProject.jpg" alt="Smiley face" height="80" width="80">
							<a class="button-pop" href="https://app.monstercampaigns.com/c/s8dxiyojjdhdfdvsnfa2/">
								<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="40" width="40">
							</a>
						</div>
						<h6>WEEKLY</h6>
						<h5>Awake58</h5>
						<p class="small">A weekly roundup of what the editors of T Magazine are noticing and coveting right now.</p>

						<a class="newsletter-link" href="https://www.w3schools.com" target="_blank"><p class="lato small">See an example.</p></a>
					</div>
					<div class="block">
						<div class="images">
							<img class="newletter-img" src="https://static01.nyt.com/email-images/Newsletter%20Icons/ThePrivacyProject.jpg" alt="Smiley face" height="80" width="80">
							<a class="button-pop" href="https://app.monstercampaigns.com/c/i0md1odjtvvbar5x5axa/">
								<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="40" width="40">
							</a>
						</div>
						<h6>WEEKLY</h6>
						<h5>Daily Digest</h5>
						<p class="small">A weekly roundup of what the editors of T Magazine are noticing and coveting right now.</p>

						<a class="newsletter-link" href="https://www.w3schools.com" target="_blank"><p class="lato small">See an example.</p></a>
					</div>
					<div class="block">
						<div class="images">
							<img class="newletter-img" src="https://static01.nyt.com/email-images/Newsletter%20Icons/ThePrivacyProject.jpg" alt="Smiley face" height="80" width="80">
							<a class="button-pop" href="https://app.monstercampaigns.com/c/s8dxiyojjdhdfdvsnfa2/">
								<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="40" width="40">
							</a>
						</div>
						<h6>WEEKLY</h6>
						<h5>Early Bird</h5>
						<p class="small">A weekly roundup of what the editors of T Magazine are noticing and coveting right now.</p>

						<a class="newsletter-link" href="https://www.w3schools.com" target="_blank"><p class="lato small">See an example.</p></a>
					</div>
					<div class="block">
						<div class="images">
							<img class="newletter-img" src="https://static01.nyt.com/email-images/Newsletter%20Icons/ThePrivacyProject.jpg" alt="Smiley face" height="80" width="80">
							<a class="button-pop" href="https://app.monstercampaigns.com/c/s8dxiyojjdhdfdvsnfa2/">
								<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="40" width="40">
							</a>
						</div>
						<h6>WEEKLY</h6>
						<h5>STEM</h5>
						<p class="small">A weekly roundup of what the editors of T Magazine are noticing and coveting right now.</p>

						<a class="newsletter-link" href="https://www.w3schools.com" target="_blank"><p class="lato small">See an example.</p></a>
					</div>
					<div class="block">
						<div class="images">
							<img class="newletter-img" src="https://static01.nyt.com/email-images/Newsletter%20Icons/ThePrivacyProject.jpg" alt="Smiley face" height="80" width="80">
							<a class="button-pop" href="https://app.monstercampaigns.com/c/s8dxiyojjdhdfdvsnfa2/">
								<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="40" width="40">
							</a>
						</div>
						<h6>WEEKLY</h6>
						<h5>Grumblings and Rumblings</h5>
						<p class="small">A weekly roundup of what the editors of T Magazine are noticing and coveting right now.</p>

						<a class="newsletter-link" href="https://www.w3schools.com" target="_blank"><p class="lato small">See an example.</p></a>
					</div>
					<div class="block">
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
					</div>
				</div>
			</div>
		</div>

<?php endwhile; ?>
