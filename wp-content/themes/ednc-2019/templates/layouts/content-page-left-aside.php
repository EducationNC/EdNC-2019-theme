<?php
if (is_page('about')) {
  $nav_menu = 68;
} else {
  $nav_menu = get_field('nav_menu');
}
?>

<div class="row">
  <div class="col-md-3">
    <div class="left-side-nav">
      <?php wp_nav_menu(array(
        'menu' => $nav_menu,
        'container' => false,
        'walker' => new Walker_Nav_Menu
      )); ?>
    </div>
  </div>

  <div class="col-md-9">
    <?php the_content(); ?>
    <?php if( have_rows('pages') ): ?>

	<ul class="slides">

	<?php while( have_rows('pages') ): the_row();

		// vars
		$link = get_sub_field('link-url');
		$content = get_sub_field('page_content');
		$link = get_sub_field('link');

		?>

			<?php if( $link ): ?>
				<a href="<?php echo $link; ?>">
			<?php endif; ?>


		</li>

	<?php endwhile; ?>

	</ul>

<?php endif; ?>

  </div>
</div>
