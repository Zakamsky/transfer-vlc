<?php get_header('home'); ?>

<div id="carouselMainPage" class="carouselMainPage carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <?php $i=0; foreach(get_sliders() as $slider): ?>
                <li data-target="#carouselMainPage" data-slide-to="<?php echo $i; $i++ ?>" class="<?php echo $slider['class']?>"></li>
            <?php endforeach ?>
        </ol>
        <div class="carousel-inner">
            <?php foreach(get_sliders() as $slider): ?>
                <div class="carousel-item <?php echo $slider['class']?> ">
                    <img class="carousel-img d-block" src="<?php echo $slider['img'] ?>" alt="First slide">
                    <div class="carousel-caption">
                        <h3 class="carousel-title"><?php echo $slider['title']?></h3>
                        <p>
                            <?php echo $slider['text']?>
                        </p>
                        <a href="<?php echo $slider['url']?>" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
         <?php endforeach ?>

        </div>
        <div class="blog-title__main-page wow fadeInDown">
                <h1 class="h1 bright-title"><?php bloginfo('name'); ?></h1>
                <h2 class="h2"><?php bloginfo('description'); ?></h2>
        </div>

        <a class="carousel-control-prev" href="#carouselMainPage" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselMainPage" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

<section id="benefits" class="container benefits">
    <div class="row">
        <div class="col-sm-6 col-lg-3 py-3">
            <div class="benefits__item wow fadeInLeft"  data-wow-offset="120" data-wow-delay="0.3s">
                <div class="benefits__ico">
                    <?php if ( get_field( 'benefit_ico_1') ) { ?>
                        <img class="benefits__img img-fluid" src="<?php the_field( 'benefit_ico_1' ); ?>" />
                    <?php } ?>
                </div>
                <h5 class="benefits__title"><?php the_field( 'benefit_title_1' ); ?></h5>
                <p class="benefits__text">
                    <?php the_field( 'benefit_text_1' ); ?>
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
            <div class="benefits__item wow fadeInLeft" data-wow-offset="120" >
                <div class="benefits__ico">
                    <?php if ( get_field( 'benefit_ico_2') ) { ?>
                        <img class="benefits__img img-fluid" src="<?php the_field( 'benefit_ico_2' ); ?>" />
                    <?php } ?>
                </div>
                <h5 class="benefits__title"><?php the_field( 'benefit_title_2' ); ?></h5>
                <p class="benefits__text">
                    <?php the_field( 'benefit_text_2' ); ?>
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
            <div class="benefits__item wow fadeInRight" data-wow-offset="120" >
                <div class="benefits__ico">
                    <?php if ( get_field( 'benefit_ico_3') ) { ?>
                        <img class="benefits__img img-fluid" src="<?php the_field( 'benefit_ico_3' ); ?>" />
                    <?php } ?>
                </div>
                <h5 class="benefits__title"><?php the_field( 'benefit_title_3' ); ?></h5>
                <p class="benefits__text">
                    <?php the_field( 'benefit_text_3' ); ?>
                </p>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
            <div class="benefits__item wow fadeInRight" data-wow-offset="120"  data-wow-delay="0.3s">
                <div class="benefits__ico">
                    <?php if ( get_field( 'benefit_ico_4') ) { ?>
                        <img class="benefits__img img-fluid" src="<?php the_field( 'benefit_ico_4' ); ?>" />
                    <?php } ?>
                </div>
                <h5 class="benefits__title"><?php the_field( 'benefit_title_4' ); ?></h5>
                <p class="benefits__text">
                    <?php the_field( 'benefit_text_4' ); ?>
                </p>
            </div>
        </div>
    </div>

    </div>
</section>

<section id="main_page" class="bg-light main_page">
    <div class="container">
        <div class="row ">
         <?php while ( have_posts() ) : the_post(); $home = get_post(); /*print_R( $home);*/ ?>
            <div class="col-md-5 mb-5 mb-md-0">
                <img src="<?php echo get_the_post_thumbnail_url( $home->ID  ); ?>" alt="" class="img-fluid wow fadeInLeft">
            </div>
            <div class="col-md-7">


                <h3 class="h1 wow fadeInRight"><?php echo $home->post_title; ?></h3>

                <?php echo $home->post_content; ?>


            </div>
      <?php endwhile; ?>
        </div>
    </div>
</section>

<section id="tours" class="container tours">
    <h3 class="h1 wow fadeInLeft"><?php the_field( 'mp_title_tours' ); ?></h3>
    <div class="row">

        <?php $tour_i = 0; foreach( get_main_tours() as $tour ): ?>

            <div class="col-sm-6 col-lg-3 pb-4 cardholder wow fadeInUp" data-wow-delay="0.<?php echo $tour_i ?>s">
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
    <div class="d-flex">
        <a class="ml-auto mt-4 text-primary" href="/cat_tours">Смотреть все</a>
    </div>
</section>
<section id="price-list" class="price-list">
    <div class="container">
        <h3 class="wow fadeInLeft"><?php the_field( 'mp_title_price' ); ?></h3>
        <div class="tab_nav">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="price_tab_title h1 nav-item nav-link active" id="ali_price-tab" data-toggle="tab" href="#ali_price" role="tab" aria-controls="ali_price" aria-selected="true">
                    <?php the_field( 'price_name' ); ?>
                </a>
                <a class="price_tab_title h1 nav-item nav-link" id="vlc-price-tab" data-toggle="tab" href="#vlc-price" role="tab" aria-controls="vlc-price" aria-selected="false">
                    <?php the_field( 'price_name_vlc' ); ?>
                </a>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="ali_price" role="tabpanel" aria-labelledby="ali_price-tab">
                <?php
                $table = get_field('price_table');

                if (!empty ($table)) {

                    echo '<table class="price-list__table table table-hover table-responsive-sm">';

                    if (!empty($table['caption'])) {

                        echo '<caption>' . $table['caption'] . '</caption>';
                    }

                    if (!empty($table['header'])) {

                        echo '<thead class="price-list__thead">';

                        echo '<tr>';

                        foreach ($table['header'] as $th) {

                            echo '<th>';
                            echo $th['c'];
                            echo '</th>';
                        }

                        echo '</tr>';

                        echo '</thead>';
                    }

                    echo '<tbody>';

                    foreach ($table['body'] as $tr) {

                        echo '<tr>';

                        foreach ($tr as $td) {

                            echo '<td>';
                            echo $td['c'];
                            echo '</td>';
                        }

                        echo '</tr>';
                    }

                    echo '</tbody>';

                    echo '</table>';
                }
                ?>
            </div>
            <div class="tab-pane fade" id="vlc-price" role="tabpanel" aria-labelledby="vlc-price-tab">
                <?php
                $table = get_field('price_table_vlc');

                if (!empty ($table)) {

                    echo '<table class="price-list__table table table-hover table-responsive-sm">';

                    if (!empty($table['caption'])) {

                        echo '<caption>' . $table['caption'] . '</caption>';
                    }

                    if (!empty($table['header'])) {

                        echo '<thead class="price-list__thead">';

                        echo '<tr>';

                        foreach ($table['header'] as $th) {

                            echo '<th>';
                            echo $th['c'];
                            echo '</th>';
                        }

                        echo '</tr>';

                        echo '</thead>';
                    }

                    echo '<tbody>';

                    foreach ($table['body'] as $tr) {

                        echo '<tr>';

                        foreach ($tr as $td) {

                            echo '<td>';
                            echo $td['c'];
                            echo '</td>';
                        }

                        echo '</tr>';
                    }

                    echo '</tbody>';

                    echo '</table>';
                }
                ?>
            </div>
        </div>

    </div>
</section>

<section id="pop_directions" class="container pop_directions">
    <h3 class="h1 wow fadeInLeft"><?php the_field( 'mp_title_pop_directions' ); ?></h3>
    <div class="row">
        <?php $dir_i = 0; foreach( get_alic_directions() as $direction ): ?>
            <div class="col-sm-6 col-lg-3 pb-4 cardholder wow fadeInUp" data-wow-delay="0.<?php echo $dir_i ?>s">
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
    <div class="row">
        <?php $dir_i = 0; foreach( get_vlc_directions() as $direction ): ?>
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
    <div class="d-flex">
        <a class="ml-auto mt-4 text-primary" href="/cat_popdir">Смотреть все</a>
    </div>
</section>
<section id="numbers" class="numbers" >
    <div class="container">
        <?php if ( get_field( 'number_main_title') ) { ?>
            <h3 class="h1 text-light wow fadeInLeft"><?php the_field( 'number_main_title' ); ?></h3>
        <?php } ?>
        <div class="row">
            <div class="col-6 col-md-3">
                <h3 class="h1 numbers__num-item number"
                    data-max="<?php the_field('number_num_1'); ?>"><?php the_field('number_num_1'); ?></h3>
                <h5 class="h3 numbers__title"><?php the_field('number_title_1'); ?></h5>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="h1 numbers__num-item number"
                    data-max="<?php the_field('number_num_2'); ?>"><?php the_field('number_num_2'); ?></h3>
                <h5 class="h3 numbers__title"><?php the_field('number_title_2'); ?></h5>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="h1 numbers__num-item number"
                    data-max="<?php the_field('number_num_3'); ?>"><?php the_field('number_num_3'); ?></h3>
                <h5 class="h3 numbers__title"><?php the_field('number_title_3'); ?></h5>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="h1 numbers__num-item number"
                    data-max="<?php the_field('number_num_4'); ?>"><?php the_field('number_num_4'); ?></h3>
                <h5 class="h3 numbers__title"><?php the_field('number_title_4'); ?></h5>
            </div>

        </div>
    </div>
</section>
<section id="cars" class="cars container">
    <div class="row">
        <div class="col-12 pb-4">
            <h3 class="h1 cars__main_title wow fadeInLeft">
                <?php the_field( 'cars_main_title' ); ?>
            </h3>

            <?php the_field( 'cars_main_description' ); ?>

        </div>
        <div class="col-md-4">
            <h5 class=" h3 cars__title">
                <?php the_field( 'cars_main_carname1' ); ?>
            </h5>
            <?php $cars_main_carphoto1 = get_field( 'cars_main_carphoto1' ); ?>
            <?php if ( $cars_main_carphoto1 ) { ?>
                <img class="cars__photo img-fluid" src="<?php echo $cars_main_carphoto1['url']; ?>" alt="<?php echo $cars_main_carphoto1['alt']; ?>" />
            <?php } ?>

            <div class="cars__details">
                <img class="cars__ico passengers" src="<?php echo TVLC_IMG_DIR ?>/man.svg" height="26" alt="кол-во пассажиров">
                <span class="cars__ico--text">
                            x&nbsp;<?php the_field('cars_main_carp_assengers1'); ?>
                </span>

                <img class="cars__ico luggage" src="<?php echo TVLC_IMG_DIR ?>/luggage.svg" height="26" alt="кол-во багажа">
                <span class="cars__ico--text">
                            x&nbsp;<?php the_field('cars_main_car_trunk1'); ?>
                </span>
                <img class="cars__ico snowflake" src="<?php echo TVLC_IMG_DIR ?>/snowflake.svg"
                                     height="26" alt="кол-во багажа">

            </div>

        </div>
        <div class="col-md-4">
            <h5 class=" h3 cars__title">
                <?php the_field( 'cars_main_carname2' ); ?>
            </h5>
            <?php $cars_main_carphoto2 = get_field( 'cars_main_carphoto2' ); ?>
            <?php if ( $cars_main_carphoto2 ) { ?>
                <img class="cars__photo img-fluid" src="<?php echo $cars_main_carphoto2['url']; ?>" alt="<?php echo $cars_main_carphoto2['alt']; ?>" />
            <?php } ?>

            <div class="cars__details">
                <img class="cars__ico passengers" src="<?php echo TVLC_IMG_DIR ?>/man.svg" height="26" alt="кол-во пассажиров">
                <span class="cars__ico--text">
                            x&nbsp;<?php the_field('cars_main_carp_assengers2'); ?>
                </span>

                <img class="cars__ico luggage" src="<?php echo TVLC_IMG_DIR ?>/luggage.svg" height="26" alt="кол-во багажа">
                <span class="cars__ico--text">
                            x&nbsp;<?php the_field('cars_main_car_trunk2'); ?>
                </span>
                <img class="cars__ico snowflake" src="<?php echo TVLC_IMG_DIR ?>/snowflake.svg"
                     height="26" alt="кол-во багажа">

            </div>

        </div>
        <div class="col-md-4">
            <h5 class=" h3 cars__title">
                <?php the_field( 'cars_main_carname3' ); ?>
            </h5>
            <?php $cars_main_carphoto3 = get_field( 'cars_main_carphoto3' ); ?>
            <?php if ( $cars_main_carphoto3 ) { ?>
                <img class="cars__photo img-fluid" src="<?php echo $cars_main_carphoto3['url']; ?>" alt="<?php echo $cars_main_carphoto3['alt']; ?>" />
            <?php } ?>

            <div class="cars__details">
                <img class="cars__ico passengers" src="<?php echo TVLC_IMG_DIR ?>/man.svg" height="26" alt="кол-во пассажиров">
                <span class="cars__ico--text">
                            x&nbsp;<?php the_field('cars_main_carp_assengers3'); ?>
                </span>

                <img class="cars__ico luggage" src="<?php echo TVLC_IMG_DIR ?>/luggage.svg" height="26" alt="кол-во багажа">
                <span class="cars__ico--text">
                            x&nbsp;<?php the_field('cars_main_car_trunk3'); ?>
                </span>
                <img class="cars__ico snowflake" src="<?php echo TVLC_IMG_DIR ?>/snowflake.svg"
                     height="26" alt="кол-во багажа">

            </div>

        </div>
    </div>
</section>
<section id="reviews" class="reviews bg-light">
    <div class="container">
            <h3 class="h1 wow fadeInLeft"><?php the_field( 'mp_title_reviews' ); ?></h3>
        <div class="row justify-content-center">

            <ul class="nav nav-pills nav-fill nav-justified w-100 m-3" id="pills-tab" role="tablist">
                <?php $j=0; foreach( get_faq() as $post ):
                 ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($j == 0) echo 'active'; $j++ ?>" id="pills-<?php echo $post->ID; ?>-tab" data-toggle="pill" href="#pills-<?php echo $post->ID; ?>" role="tab" aria-controls="pills-<?php echo $post->ID; ?>" aria-selected="true">
                        <img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" alt="" width="80" class="img-fluid img-thumbnail rounded-circle border border-primary">
                        <br> <span class=""><?php echo $post->post_title; ?></span>
                    </a>
                </li>

                <?php endforeach; ?>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <?php $ij=0; foreach( get_faq() as $post ): ?>
                    <div class="tab-pane fade p-3 <?php if($ij == 0) echo 'show active'; $ij++ ?>" id="pills-<?php echo $post->ID; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $post->ID; ?>-tab">
                        <h3><?php echo $post->post_excerpt; ?></h3>
                        <p>
                     <?php echo $post->post_content; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <div class="d-flex">
            <a class="ml-auto text-primary" href="/otzyvy">Смотреть все</a>
        </div>
    </div>


</section>
<?php get_footer(); ?>
