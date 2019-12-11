<?php get_header(); ?>
<div class="container pb-5">
    <div class="row">
        <div class="main-heading my-5 col-12">
            <h1><?php the_title(); ?></h1>
        </div>

        <?php $dir_i = 0; foreach( get_directions(-1) as $direction ): ?>
            <div class="col-sm-6 col-lg-3 pb-3 cardholder wow fadeInUp" data-wow-delay="0.<?php echo $dir_i ?>s">
                <a class="w100 h100" href="<?php echo $direction['url'] ?>">
                    <div class="direction-card">
                        <img src="<?php echo $direction['img'] ?>" alt="tour image" class="direction-card__img">
                        <div class="direction-card__overlay">
                            <h3 class="direction-card__title bright-title">
                                <?php echo $direction['title'] ?>
                            </h3>

                            <p class="direction-card__text">
                                Расстояние: <?php echo $direction['pd_free_range']; ?>
                            </p>
                            <p class="direction-card__text">
                                Время в пути: <?php echo $direction['pd_free_time']; ?>
                            </p>
                            <p class="direction-card__text">
                                Расстояние по платной дороге: <?php echo $direction['pd_pay_range']; ?>
                            </p>
                            <p class="direction-card__text">
                                Время на платной дороге: <?php echo $direction['pd_pay_time']; ?>
                            </p>
                            <span class="btn btn-accent direction-card__price">
                               Цена:&nbsp; <?php echo $direction[ 'pd_free_pice' ]; ?> &nbsp;€
                            </span>
                            <div class="asteriks-text text-muted">* платная дорога в цену не входит</div>
                        </div>
                    </div>
                </a>
            </div>
            <?php $dir_i++ ?>
        <?php endforeach; ?>
    </div>
</div>
<?php get_footer(); ?>