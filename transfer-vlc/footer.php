
<?php
?>

<footer id="footer" class="bg-primary footer">
    <div class="container footer__box">

        <?php if ( get_field( 'cont_email', 73) ) { ?>
            <?php $email =  get_field( 'cont_email', 73); ?>
            <div class="footer__email">
                <div class="footer__email-key footer__text">
                    E-mail
                </div>
                <div class="footer__email-value footer__text">
                    <a href="mailto:<?php echo $email; ?>" class="text-light">
                        <?php echo $email; ?>
                    </a>
                </div>
            </div>
        <?php } ?>
        <?php if ( get_field( 'cont_phone_functions', 73) ) { ?>
            <div class="footer__phone">
                <div class="footer__phone-key footer__text">
                    Телефон
                </div>
                <div class="footer__phone-value footer__text">
                    <a href="tel:+<?php the_field( 'cont_phone_functions', 73 ); ?>" class="text-light">
                        <?php the_field( 'cont_phone_view', 73 ); ?>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="footer__copyright text-center">
        <div class="footer__copyright--text text-muted font-weight-bold">
            ©<?php bloginfo('name'); ?> 2019
        </div>
        <div class="footer__copyright--text text-muted mx-2">
            все права защищены
        </div>
    </div>

    <div class="socials socials_nets wow bounceInLeft">
        <div class="socials__call d-none d-md-block">
            Мы в соцсетях
        </div>
        <div class="socials__list">
            <?php if ( get_field( 'cont_soc_vk', 73 ) ) { ?>
                <a href="https://vk.com/<?php the_field( 'cont_soc_vk', 73 ); ?>" class="socials__item vkontakte">
                    <img src="<?php echo TVLC_IMG_DIR ?>/vk.svg" alt="vkontakte" class="socials__img vkontakte img-fluid" width="40px">
                </a>
            <?php } ?>

            <?php if ( get_field( 'cont_soc_fb', 73) ) { ?>
                <a href="https://facebook.com/<?php the_field( 'cont_soc_fb', 73 ); ?>" class="socials__item facebook">
                    <img src="<?php echo TVLC_IMG_DIR ?>/facebook.svg" alt="" class="socials__img facebook img-fluid" width="40px">
                </a>
            <?php } ?>

            <?php if ( get_field( 'cont_soc_ig', 73) ) { ?>
                <a href="https://www.instagram.com/<?php the_field( 'cont_soc_ig', 73 ); ?>" class="socials__item instagram">
                    <img src="<?php echo TVLC_IMG_DIR ?>/instagram.svg" alt="" class="socials__img instagram img-fluid" width="40px">
                </a>

            <?php } ?>

        </div>
    </div>
</footer>

<div class="socials">
    <div class="socials__call d-none d-md-block">
        Свяжитесь с нами в мессенджерах
    </div>
    <div class="socials__list">
        <?php if ( get_field( 'cont_phone_functions', 73) ) { ?>
            <a href="whatsapp://send?phone=+<?php the_field( 'cont_phone_functions', 73 ); ?>" class="socials__item whatsapp">
                <img src="<?php echo TVLC_IMG_DIR ?>/whatsapp.svg" alt="" class="socials__img whatsapp img-fluid" width="40px">
            </a>
            <a href="viber://chat?number=%2B<?php the_field( 'cont_phone_functions', 73 ); ?>" class="socials__item viber">
                <img src="<?php echo TVLC_IMG_DIR ?>/viber.svg" alt="" class="socials__img viber img-fluid" width="40px">
            </a>
        <?php } ?>
        <?php if ( get_field( 'cont_soc_tg', 73) ) { ?>
            <a href="tg://resolve?domain=<?php the_field( 'cont_soc_tg', 73 ); ?>" class="socials__item telegram">
                <img src="<?php echo TVLC_IMG_DIR ?>/telegram.svg" alt="" class="socials__img telegram img-fluid" width="40px">
            </a>
        <?php } ?>
        <?php if ( get_field( 'cont_soc_fb', 73) ) { ?>
            <a href="https://www.messenger.com/t/<?php the_field( 'cont_soc_fb', 73 ); ?>" class="socials__item facebook">
                <img src="<?php echo TVLC_IMG_DIR ?>/facebook.svg" alt="" class="socials__img facebook img-fluid" width="40px">
            </a>
        <?php } ?>
        <?php if ( get_field( 'cont_soc_vk', 73 ) ) { ?>
            <a href="https://vk.me/<?php the_field( 'cont_soc_vk', 73 ); ?>" class="socials__item vkontakte">
                <img src="<?php echo TVLC_IMG_DIR ?>/vk.svg" alt="vkontakte" class="socials__img vkontakte img-fluid" width="40px">
            </a>
        <?php } ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalMainPage" tabindex="-1" role="dialog" aria-labelledby="ModalMainPageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalMainPageTitle">Оставьте свой телефон и мы свяжемся с вами!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode('[contact-form-7 id="205" title="Контактная форма"]'); ?>
                <!--                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">передумал</button>-->
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->
<?php wp_footer(); ?>
<script>
    new WOW().init();
</script>
</body>
</html>