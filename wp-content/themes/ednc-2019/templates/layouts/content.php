<article <?php post_class('h-entry'); ?>>
  <header>
    <h2 class="entry-title p-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/components/entry-meta'); ?>
  </header>
  <div class="entry-summary p-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
