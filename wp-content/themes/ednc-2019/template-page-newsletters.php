<?php
/*
Template Name: Newsletter Signup Page
*/

use Roots\Sage\Titles;
use Roots\Sage\Assets;
?>

<?php while (have_posts()) : the_post(); ?>


	  <div class="row">
			<div class="col-md-8 col-centered">
			  <h1 class="bold">Thank you for signing up.</h1>
				<h1 class="light">We have other newsletters you may enjoy. Get more of what you want to read in your inbox.</h1>
				</br>
				</br>
			</div>
	  </div>

		<div class="row newsletters-bg">
			<div class="col-md-8 col-centered">
				<h3>EMAIL NEWSLETTERS</h3>
				<div class="newsletter-grid">
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
					<div class="block">
						<div class="images">
							<img class="newletter-img" src="https://static01.nyt.com/email-images/Newsletter%20Icons/ThePrivacyProject.jpg" alt="Smiley face" height="80" width="80">
							<a class="button-pop" href="https://app.monstercampaigns.com/c/sh6jnhv3tt5l4wvjgxru/">
								<img class="sign-up"src="<?php echo Assets\asset_path('images/plus.svg'); ?>" alt="Smiley face" height="40" width="40">
							</a>
						</div>
						<h6>WEEKLY</h6>
						<h5>The Privacy Project</h5>
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


					<div class="block"></div>
					<div class="block"></div>
					<div class="block"></div>
					<div class="block"></div>
				</div>
			</div>
		</div>

<?php endwhile; ?>
