<?php
/*
Template Name: Team
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="container">
    <?php get_template_part('templates/components/page', 'header-wide-2019'); ?>

    <?php
    if (is_page('about')) {
      $nav_menu = 68;
    } else {
      $nav_menu = get_field('nav_menu');
    }
    ?>

    <div class="row">

      <div class="col-md-3 col-md-push-9">
        <div class="callout">
          <?php wp_nav_menu(array(
            'menu' => $nav_menu,
            'container' => false,
            'walker' => new Walker_Nav_Menu
          )); ?>
        </div>
      </div>

      <div class="col-md-9 col-lg-8 col-md-pull-3">
        <?php if( have_rows('new_team_member') ): ?>

        	<div class="team-grid">

        	<?php while( have_rows('new_team_member') ): the_row();

        		// vars
        		$image = get_sub_field('image');
        		$content = get_sub_field('title');
        		$link = get_sub_field('link_if_applicable');
            $name = get_sub_field('name');

        		?>

        		<div class="team-member">

        			<?php if( $link ): ?>
        				<a href="<?php echo $link; ?>">
        			<?php endif; ?>

        				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                <h3 class="rd"><?php echo $name; ?></h3>
                <h4 class="rd"><?php echo $content; ?></h4>
        			<?php if( $link ): ?>
        				</a>
        			<?php endif; ?>

        		</div>

        	<?php endwhile; ?>

        </div>

        <?php endif; ?>
      </div>
    </div>


  </div>
<?php endwhile; ?>
