<?php
/**
 * traditionalbow engine room
 *
 * @package Tiempovegano
 */

/**
 * Set the theme version number as a global variable
 */
//$theme				= wp_get_theme( 'tiempovegano' );
//$deli_version		= $theme['Version'];

$theme				= wp_get_theme( 'storefront' );
$storefront_version	= $theme['Version'];

// standart paths
define('TBOW_THEME_ROOT', get_stylesheet_directory_uri());
define('TBOW_CSS_DIR', TBOW_THEME_ROOT . '/css');
define('TBOW_JS_DIR', TBOW_THEME_ROOT . '/js');
define('TBOW_IMG_DIR', TBOW_THEME_ROOT . '/img');


add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method()
{
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', TBOW_JS_DIR . '/jquery-3.3.1.min.js' );
    wp_enqueue_script('mainscript', TBOW_JS_DIR . '/main.min.js', array('jquery'), null, true);
}


function storefront_site_branding() {
    ?>
    <div class="site-branding">
        <div class="brand-logo">

            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>

            <?php endif; ?>

        </div>

        <div class="brand-title">
            <?php storefront_site_title_or_logo(); ?>
        </div>
    </div>
    <?php
}



function storefront_site_title_or_logo( $echo = true ) {

    /*start custom block*/
    $tag = is_home() ? 'h1' : 'div';

    $html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) . '>';

    if ( '' !== get_bloginfo( 'description' ) ) {
        $html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
    }
    /*end custom block*/

    if ( ! $echo ) {
        return $html;
    }

    echo $html; // WPCS: XSS ok.
};

/*widget in header start*/

function wpb_widgets_init() {

    register_sidebar( array(
        'name'          => 'alternative shop widgets area',
        'id'            => 'custom-shop-widget',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ) );

}
add_action( 'widgets_init', 'wpb_widgets_init' );
/*widget in header end*/

//новые типы записей
add_action('init', function (){
    add_theme_support('post-thumbnails');
    //разрешить тамбнайлзы для записей

    //слайдер:
    register_post_type('sliders', array(
        'label'  => null,
        'labels' => array(
            'menu_name'          => 'Слайдер', // название меню
            'name'               => 'Слайды', // основное название для типа записи
            'singular_name'      => 'Слайд', // название для одной записи этого типа
            'all_items'          => 'Все слайды',
            'add_new'            => 'Добавить слайд', // для добавления новой записи
            'add_new_item'       => 'Добавление слайда', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
            'new_item'           => 'Новый слайд', // текст новой записи
            'view_item'          => 'Смотреть слайд', // для просмотра записи этого типа.
            'search_items'       => 'Искать слайд', // для поиска по этим типам записи
            'not_found'          => 'Не найдено слайда', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено слайда в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)

        ),
        'public'              => false, // скрывает настройку урл и не отображает на фронте по умолчанию
        'show_ui'             => true, // зависит от public, сохраняет блок в меню при значении паблик public => false
        'menu_icon'           => 'dashicons-images-alt2',
        'supports'            => array('title', 'editor', 'excerpt','thumbnail'),
    ));
});

function get_sliders(){
    $args = array(
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'sliders',
    );

    return get_posts( $args );
};

//wrap content for tags
add_filter('the_content', 'wpautop', 99);