<!doctype html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--    <title>--><?php //wp_title('«', true, 'right'); ?><!-- --><?php //bloginfo('name'); ?><!--</title>-->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Template Basic Images Start -->
    <meta property="og:image" content="path/to/image.jpg">

    <link rel="icon" href="<?php echo TVLC_IMG_DIR; ?>/favicon/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo TVLC_IMG_DIR; ?>/favicon/apple-touch-icon-180x180.png">
    <!-- Template Basic Images End -->
    <!--[if lte IE 10]>
    <!--<meta http-equiv="refresh" content="3; url=http://outdatedbrowser.com/ru">-->
    <!--[endif]-->
    <meta name="yandex-verification" content="ab3cf97d5b78f34d" />


	<?php wp_head(); ?>
</head>

<body <?php body_class(''); ?>>

<!--<Header>-->

<!--main menu-->
<nav class="main-top-menu navbar navbar-expand-lg navbar-primary">

    <div class="container">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php if( $logo = get_custom_logo() ) : ?>


                <?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );//echo $logo; ?>

            <?php endif; ?>
            <?php bloginfo('name'); ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

            <?php
            wp_nav_menu(array(
                'menu' => 'home-menu',
                'theme_location' => 'top-menu',
                'depth' => 2,
                'container' => false,
                'menu_class' => 'navbar-nav mr-auto',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker()
            ));
            ?>

        </div>
        <button class="btn btn-accent" data-toggle="modal" data-target="#ModalMainPage">Обратный звонок</button>
    </div>
</nav>
<!--</Header>-->



