<?php
/*
Template Name: Early Bird Email
*/

use Roots\Sage\Titles;
?>
<style>
	.cz-outer {
		padding: 50px 0px;
	}
	.banner-image {
		background-image: url('https://www.ednc.org/wp-content/uploads/2019/08/1X2A6798.jpg');
		background-repeat: no-repeat;
		background-position: center -150px;
		background-size: cover;
		background-attachment: fixed;
		height: 40vh;
		/* height: 200px;
		width: 100%; */
		/* background-position: right -10px bottom -300px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		margin-bottom: 32px; */
	}
	#content-wrapper-div {
    background: rgba(255, 255, 255, 0.91);
		background: red;
    border-radius: 4px 4px 0 0 !important;
		border-radius: 0px 0px !important;
	}
	/* .border {
		border: 1px solid red;
	} */
	.text-purple{
		color:#731454 !important;
	}
	.text-grey{
		color:#4d4c4d !important;
	}
	.text-white {
		color:#fff !important;
	}
	.bg-purple, .wrap{
		background-color:#731454 !important;
	}
	.bg-white{
		background-color:#fff !important;
	}
	.entry-title{
		text-align:center;
		text-shadow: none !important;
		margin-bottom:120px !important;
		font-size: 65px !important;
	}
	.entry-title span{
		display:block;
		font-size: 40px !important;
		line-height: 30px;
	}
	.background {
		background:
	    linear-gradient(
	      rgba(255,0,0,0.4) 5%,
	      rgba(0,255,0,0.25) 95%
	    ) 0 0 / 100% 2000%,
	}
	.page-header.photo-overlay {
		margin-bottom: 0em !important;
	}
	.page-header.photo-overlay:after{
		display:none;
	}
	.stylish-border {
		padding: 10px 20px;
		font-size: 30px;
		border-radius: 30px 30px 30px 0px;
	}
	.above-footer {
		padding: 0em 0 4em;
		display:none;
	}
	.float-container {
		position: relative;
		margin-top: -30px;
		margin-bottom: 80px;
	}
	.padding-md {
		padding: 50px 40px 0px;
	}
	.email-signup-form{
		background-image:none !important;
		background-color:#dcdfe6;
		padding:0px;
	}
	.email-signup-form .mc_embed_signup{
		background-color:#dcdfe6;
	}
	.email-signup-form .form-inline {
		margin: 30px 0px;
	}
	.full-width{
		width:100% !important;
	}
	.no-padding-right{
		padding-right:0px;
	}
	.no-padding-left{
		padding-left:0px;
	}

	.margin-top-20pc{
		margin-top:20%;
	}
	.image-center{
		margin:0px auto;
		display:block;
		text-align:center;
	}
	.flex {
		display: flex;
		justify-content: space-around;
		flex-direction: row;
		background: rgba(255, 255, 255, 0.91);
		background: #FFFFFF;
		margin-top: -50px;
		padding: 40px 0px;
	}
	.text {
		width: 45%;
		align-self: center;
		text-align: center;
		/* border: 1px solid white; */
	}

	.padding {
		padding-bottom: 40px;
	}

	.text p {
		font-family: Lato;
		font-size: 17px;acebo
	}
	.img-bird {
		width: 220px;
		margin-left: auto;
		margin-right: auto;
		display: block;
		padding-bottom: 10px;
	}

	.embed {
		width: 45%;
	}

	@media (max-width: 980px){
		.page-header.photo-overlay {
			height: 230px;
		}
		.entry-title {
			margin-bottom: 90px !important;
		}
		.banner-image {
			background-image: url('https://www.ednc.org/wp-content/uploads/2019/08/1X2A6798.jpg');
			background-repeat: no-repeat;
			background-position: center -150px;
			background-size: cover;
			background-attachment: fixed;
			height: 40vh;
		}
	}
	@media (max-width: 780px){
		.margin-top-20pc{
			margin-top:0%;
		}
		.col-centered{
			padding-top: 20px;
		}
		.banner-image {
			background-image: url('https://www.ednc.org/wp-content/uploads/2019/08/1X2A6798.jpg');
			background-repeat: no-repeat;
			background-position: center -150px;
			background-size: cover;
			background-attachment: fixed;
			height: 40vh;
			margin-bottom: 32px;
		}
		.no-padding-left, .no-padding-right{
			padding-left: 10px;
			padding-right: 10px;
		}
		.text {
			width: 90%;
			align-self: center;
			text-align: center;
			/* border: 1px solid white; */
		}

		.embed {
			width: 90%;
			align-self: center;
		}
		.flex {
			display: flex;
			justify-content: space-between;
			flex-direction: column;
			background: rgba(255, 255, 255, 0.91);
			background: #FFFFFF;
			margin-top: -50px;
		}
	}
	@media (max-width: 640px){
		.page-header.photo-overlay .entry-title {
			font-size: 3rem !important;
		}
		.page-header.photo-overlay .entry-title span{
			font-size: 1.5rem !important;
		}
		.stylish-border {
			padding: 8px 16px;
			font-size: 20px;
		}
		.col-centered {
			padding: 10px;
		}
	}
</style>

<?php while (have_posts()) : the_post(); ?>

<?php

	// $source = '';
	// if (isset($_GET['utm_source'])) {
	//   $source = $_GET['utm_source'];
	// }

	//$image_id = get_post_thumbnail_id();
	//$featured_image_lg = wp_get_attachment_image_src($image_id, 'large');
	?>

	<div class="banner-image"></div>


	<div class="container">
		<div class="row padding">
			<div class="col-md-9 flex col-centered">
				<div class="text">
					<img class="img-bird" src="https://www.ednc.org/wp-content/uploads/2019/07/EarlyBird-Logo.png">
					<p>Subscribe to Early Bird for coverage of issues affecting our state's youngest learners. The newsletter is coming soon,
						but until then, follow Liz Bell's coverage <a href="https://www.ednc.org/author/lbell/">here</a>.
					</p>
				</div>
				<div class="embed">
					<iframe id="embed75412" src="//publicinput.com/display/?projId=4798&embedId=75412&compact=true" height="425" frameborder="0" scrolling="yes"></iframe><script type="text/javascript">(function (c, i, t, y, z, e, n, x) { x = c.createElement(y), n = c.getElementsByTagName(y)[0]; x.async = 1; x.src = t; n.parentNode.insertBefore(x, n); })(document, window, "//publicinput.com/Link?embedId=75412", "script");</script>
				</div>
			</div>
		</div>
	</div>




<?php endwhile; ?>
