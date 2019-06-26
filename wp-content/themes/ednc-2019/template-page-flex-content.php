<?php
/*
Template Name: Flex Content Template
*/

use Roots\Sage\Titles;
?>
<style>

</style>


<?php while (have_posts()) : the_post(); ?>

	<div class="container flex-content">

		<?php
		if( have_rows('flex_content') ):

		 	// loop through the rows of data
		    while ( have_rows('flex_content') ) : the_row();  ?>


					    <?php
							if( get_row_layout() == 'text' )
							get_template_part('templates/components/flex', 'header');
							//endif;
							?>


	  					<?php
			      	if( get_row_layout() == 'body_text' )
							get_template_part('templates/components/flex', 'body');
							?>


				  		<?php
			      	if( get_row_layout() == 'image_gallery_flex' )
							get_template_part('templates/components/flex', 'gallery');
							//endif;
							?>


		  				<?php
							if( get_row_layout() == 'full_hero_flex' )
							get_template_part('templates/components/flex', 'image');
							?>

							<?php
							if( get_row_layout() == 'articles' )
							get_template_part('templates/components/flex', 'articles');
							?>



 						<?php
				 		// endif;

		    endwhile;

		endif;
		?>
	</div>

<?php endwhile; ?>
