<h3 class="post-title"><?php the_title(); ?></h3>
<?php get_template_part('templates/components/entry-meta'); ?>
<a class="mega-link" href="<?php the_permalink(); ?>" <?php echo the_permalink();?>></a>
<p class="lato"><?php echo wp_trim_excerpt(); ?></p>
