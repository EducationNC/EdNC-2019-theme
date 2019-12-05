<?php if( have_rows('slides') ): ?>

    <?php while ( have_rows('slides') ) : the_row(); ?>

        <?php $image = get_sub_field('image'); ?>
        
        <?php if ($image): ?>
        
            <img src="<?php echo $image['sizes']['large'] ?>"><br>
        
        <?php endif; ?>

        <b><?php the_sub_field('title'); ?></b>
        <br>
        <?php the_sub_field('caption'); ?>

    <?php endwhile; ?>


<?php endif; ?>