<?php
/*
Template Name: Equity Report
*/
?>

<style>
	.padding {
    padding: 30px;
  }

	.iframe-equity iframe {
		display: block;
		margin: 0 auto;
		margin-bottom: 30px;
	}

	.embed-container {
	position: relative;
	padding-bottom: 56.25%;
	overflow: hidden;
	max-width: 100%;
	height: auto;
}

.embed-container iframe,
.embed-container object,
.embed-container embed {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
  .border {
    /* border: 1px solid black;
    padding: 20px 0px; */
  }
  .border-spacing {
    height: 50px;
    width: 100%;
    background-color: red;
  }
  .bg-image img {
    display: block;
    margin: auto;
    width: 100%;
    height: auto;
  }
	li.innovate {
  list-style-type: none;
	margin: 5px;
	}
	ul.innovate {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	padding: 0;
	}
  @media (min-width: 1280px) {
    /* .container {
        width: 1260px;
    } */
  }
  @media (min-width: 992px) {
    /* .container {
        width: 100%;
    } */
  }
  @media (min-width: 768px) {
    /* .container {
        width: 740px;
    } */
  }

</style>

<?php
// $term = get_queried_object();
// $desc = category_description();
// $cat_id = $term->term_id;
use Roots\Sage\Titles;

$images = get_field('innovation');
$size = 'medium-square'; // (thumbnail, medium, large, full or custom size)

$image_crop = get_field('image-crop');
$size = 'medium-square'; // (thumbnail, medium, large, full or custom size)
$image_id = get_post_thumbnail_id();
$featured_image_lg = wp_get_attachment_image_src($image_id, 'large');
$iframe = get_field('video-equity');


?>
<?php// while (have_posts()) : the_post(); ?>

<header class="page-header page-header-auto background-purple photo-overlay no-padding" style="">
	<div class="category-header background-purple no-margin no-padding">
	<img src="<?php echo $featured_image_lg[0]; ?>" alt="<?= Titles\title() . $title; ?>" class="full-width">
	</div>
</header>

<div class="container">

	<div class="row">
		<div class="col-md-12">
			<h1 class="entry-title"><?= Titles\title() . $title; ?></h1>
		</div>
	</div>

	<div class="row">

		<div class="col-md-8">
			<?php the_content(); ?>

			<div class="row">
				<div class="col-md-12">
					<?php if( $images ): ?>
							<ul class="innovate">
									<?php foreach( $images as $image ): ?>
											<li class="innovate">
												<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
											</li>
									<?php endforeach; ?>
							</ul>
					<?php endif; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="iframe-equity">
						<?php echo $iframe; ?>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
				$args = array(
					'posts_per_page' => -1,
					'post_type' => array('post', 'edtalk', 'flash-cards'),
					'category_name' => 'innovate-conference',
					'meta_key' => 'updated_date',
					'orderby' => 'meta_value_num',
					'order' => 'DESC'
				);

				$innovations = new WP_Query($args);
				?>
				<div class="col-lg-8 col-md-9">
					<?php if ($innovations->have_posts()) : while ($innovations->have_posts()) : $innovations->the_post(); 	?>
						<?php
						//$variableName = 'Ralph';
						//echo 'Hello '.$variableName.'!';
						 ?>
						<?php get_template_part('templates/layouts/block', 'post-side'); ?>
						<?php endwhile; endif; wp_reset_query(); ?>
				</div>

				<div class="col-md-3 col-lg-push-1">
					<?php// get_template_part('templates/components/sidebar', 'archives'); ?>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-12">
					<p>Editor’s Note: James Ford is on contract with the N.C. Center for Public Policy Research from 2017-2020 while he leads this statewide study of equity in our schools. Center staff is supporting Ford’s leadership of the study, conducted an independent verification of the data, and edited the reports.</p>
				</div>
			</div>
		</div>


		<div class="col-md-1"></div>

		<div class="col-md-3">
			<?php the_field('embed-1'); ?>
			<!-- <hr> -->
			<?php the_field('embed-2'); ?>
			<!-- <hr> -->
			<div class="embed-container">
				<?php echo $iframe; ?>
			</div>
		</div>

	</div>





</div>








<?php// endwhile; ?>
