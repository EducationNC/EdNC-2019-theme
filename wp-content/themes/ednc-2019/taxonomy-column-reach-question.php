<style>
	.entry-title{
		display:none;
	}
	.center-image{
		margin: 0 auto;
		text-align: center;
		margin-bottom: 20px;
		display: block;
	}
</style>

<?php
$term = get_queried_object();
$desc = category_description();
$cat_id = $term->term_id;

get_template_part('templates/components/category', 'header-2019');
?>


<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-centered">
	<?php if ($desc && !isset($_GET['date'])) { ?>
        <div class="extra-bottom-margin">
          <?php echo $desc; ?>
        </div>
      <?php } ?>
		</div>
	</div>

	<?php get_template_part('templates/layouts/archive', 'reachquestion'); ?>
</div>


<?php// get_template_part('templates/components/social-share'); ?>
