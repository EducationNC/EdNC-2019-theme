<?php $_id = rand(1000, 9999); ?>

<?php if( have_rows('slides') ): ?>

    <div class="slick-slider slick-slider--gutenberg" id="slick-slider-<?php echo $_id ?>">

        <?php while ( have_rows('slides') ) : the_row(); ?>
        
            <?php $image = get_sub_field('image'); ?>
        
            <div class="slick-slide" 
                <?php if ($image): ?>style="background-image: url(<?php echo $image['url'] ?>);"<?php endif; ?>>
    
                <div class="slick-slide__text">
    
                    <div class="slick-slide__text__title"><?php the_sub_field('title'); ?></div>
                    
                    <div class="slick-slide__text__caption"><?php the_sub_field('caption'); ?></div>
                
                </div>
            
            </div>
    
        <?php endwhile; ?>
    
    </div>

<?php endif; ?>

<script>
window.addEventListener('load', function () {
    var $ = jQuery;
    
    $(document).ready(function(){
        $('#slick-slider-<?php echo $_id ?>').slick({
            slidesToShow: 1,
            mobileFirst: true,
            dots: true,
            arrows: false,
            responsive: [
                {
                  breakpoint: 992,
                  settings: {
                    dots: false,
                    arrows: true,
                  }
                }
              ]
        });
    });

});
</script>