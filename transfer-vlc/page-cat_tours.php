<?php get_header(); ?>
<div class="container pb-5">
    <div class="row">
        <div class="main-heading my-5 col-12">
            <h1><?php the_title(); ?></h1>
        </div>

            <?php $tour_i = 0; foreach( get_tours(-1) as $tour ): ?>

                <div class="col-sm-6 col-lg-3 pb-3 cardholder wow fadeInUp" data-wow-delay="0.<?php echo $tour_i ?>s">
                    <a class="w100 h100" href="<?php echo $tour['url'] ?>">
                        <div class="text-white tour-card">
                            <img src="<?php echo $tour['img'] ?>" alt="tour image" class="tour-card__img">
                            <div class="tour-card__overlay">
                                <h3 class="tour-card__title bright-title">
                                    <?php echo $tour['title'] ?>
                                </h3>

                                <p class="tour-card__text">
                                    <?php echo $tour['card_text']; ?>
                                </p>
                                <span class="btn btn-outline-accent">
                               Цена:&nbsp; <?php echo $tour[ 'card_price' ]; ?> &nbsp;€
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php $tour_i++ ?>
            <?php endforeach; ?>
    </div>
</div>
<?php get_footer(); ?>