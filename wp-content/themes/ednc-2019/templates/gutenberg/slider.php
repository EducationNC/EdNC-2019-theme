<?php $_id = rand(1000, 9999); ?>

<?php if( have_rows('slides') ): ?>

    <div class="slick-slider" id="slick-slider-<?php echo $_id ?>">

        <?php while ( have_rows('slides') ) : the_row(); ?>
        
            <div class="slick-slide">
    
                <?php $image = get_sub_field('image'); ?>
                
                <?php if ($image): ?>
                
                    <img src="<?php echo $image['sizes']['large'] ?>"><br>
                
                <?php endif; ?>
        
                <b><?php the_sub_field('title'); ?></b>
                <br>
                <?php the_sub_field('caption'); ?>
            
            </div>
    
        <?php endwhile; ?>
    
    </div>

<?php endif; ?>

<script>
window.addEventListener('load', function () {
    var $ = jQuery;
    
    $(document).ready(function(){
        $('#slick-slider-<?php echo $_id ?>').slick({});
    });

});
</script>