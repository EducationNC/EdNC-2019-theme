<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    Sorry, no results were found.
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';

$args = array( 'post_type' => 'reach-question', 'paged' => $paged, 'posts_per_page' => 12,
'meta_query'	=> array (
  'relation'		=> 'OR',
        array (
		        'key'	 	=> 'reach_privacy',
		        'value'	  	=> 'Public',
		        'compare' 	=> 'LIKE',
        ),
      	array (
      		'key'		=> 'reach_privacy',
      		'value'		=> 'Featured',
      		'compare'	=> 'LIKE'
      	)
	 )
);
$loop = new WP_Query( $args );
?>

<div class="row">
  <div class="col-md-12">
    <div class="category-content">
      <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
        <?php get_template_part('templates/layouts/block', 'four-block'); ?>
      <?php endwhile; ?>

      <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="row hentry">
          <nav class="post-nav">
            <?php wp_pagenavi(); ?>
          </nav>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
