

</div>
    <!--    slider wrpap here -->
<section id="main-slider" class="owl-carousel owl-theme">

   <?php $i=0; foreach(get_sliders() as $slider): ?>
<!--        each slide hear -->
    <div class="slide">
        <img class="slide--image" src="<?php echo get_the_post_thumbnail_url( $slider->ID ) ?>" alt="Slide #<?php echo $slider->ID ?>">
            <h3 class="slide--title"><?php echo $slider->post_title ?></h3>
            <div class="slide--content">
                <?php echo $slider->post_content ?>

            </div>
        <?php if(!!$slider->post_excerpt): ?>
            <a href="<?php echo $slider->post_excerpt ?>" class="button slide--button button-outline-light">Перейти</a>
        <?php endif ?>
    </div>
    <?php endforeach ?>
</section>
<div class="col-full">