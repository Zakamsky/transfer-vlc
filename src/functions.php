<?php
//Transfer-vlc theme

// скрывает панельку админа на авторизованном сайте
//add_filter('show_admin_bar', '__return_false');



define('TVLC_THEME_ROOT', get_template_directory_uri());
define('TVLC_CSS_DIR', TVLC_THEME_ROOT . '/css');
define('TVLC_JS_DIR', TVLC_THEME_ROOT . '/js');
define('TVLC_IMG_DIR', TVLC_THEME_ROOT . '/img');



//подключаем автоматический метатайтл для всех страниц
//    $sep = apply_filters( 'document_title_separator', ':' );


add_filter( 'document_title_separator', 'cyb_document_title_separator' );
function cyb_document_title_separator( $sep ) {

    $sep = ":";

    return $sep;

}


add_theme_support( 'title-tag');


// подключаем стили до функции wp_head() которая вызывается в header.php
add_action( 'wp_enqueue_scripts', 'tvlc_scripts' );

function tvlc_scripts() {
//	wp_enqueue_style( 'main', F_CSS_DIR . '/main.min.css' );
	wp_enqueue_style( 'theme', get_stylesheet_uri() );

	wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', TVLC_JS_DIR . '/jquery-3.3.1.min.js' );
//    wp_enqueue_script('num_animator', TVLC_JS_DIR . '/num-animator.js', false, null, false);
    wp_enqueue_script('mainscript', TVLC_JS_DIR . '/main.min.js', array('jquery'), null, true);
    wp_enqueue_script('wowscript', TVLC_JS_DIR . '/wow.js', false, null, true);

}

// Активируем управление меню в админке:
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

//Подключаем Бутстрап4 меню:
if ( ! file_exists( get_template_directory() . '/wp-bootstrap-navwalker.php' ) ) {
    // file does not exist... return an error.
    return new WP_Error( 'wp-bootstrap-navwalker-missing', __( 'It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // file exists... require it.
    require_once get_template_directory(). '/wp-bootstrap-navwalker.php';
}

// отзывчивые изображения:
function add_image_responsive_class($content) {
    global $post;
    $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
    $replacement = '<img$1class="$2 img-fluid"$3>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
add_filter('the_content', 'add_image_responsive_class');



//добавляем новыетипы записей
add_action('init', function (){
    //подключаем изобраежения постов
	add_theme_support('post-thumbnails');

    add_theme_support( 'custom-logo', [
        'height'      => 42,
        'width'       => 84,
        'flex-width'  => true,
        'flex-height' => false,
        'header-text' => '',
    ] );

	register_post_type('faq', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Отзывы', // основное название для типа записи
			'singular_name'      => 'Отзыв', // название для одной записи этого типа
			'add_new'            => 'Добавить отзыв', // для добавления новой записи
			'add_new_item'       => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование отзыва', // для редактирования типа записи
			'new_item'           => 'Новый отзыв', // текст новой записи
			'view_item'          => 'Смотреть отзыв', // для просмотра записи этого типа.
			'search_items'       => 'Искать отзыв', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Отзывы', // название меню
		),
		'public'              => false, // скрывает настройку урл и не отображает на фронте по умолчанию
		'show_ui'             => true, // зависит от public, сохраняет блок в меню при значении паблик public => false
		'menu_icon'           => 'dashicons-sticky',
		'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
	));

	register_post_type('sliders', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Слайдер', // основное название для типа записи
			'singular_name'      => 'Слайдер', // название для одной записи этого типа
			'add_new'            => 'Добавить слайдер', // для добавления новой записи
			'add_new_item'       => 'Добавление слайдера', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование слайдера', // для редактирования типа записи
			'new_item'           => 'Новый слайдер', // текст новой записи
			'view_item'          => 'Смотреть слайдер', // для просмотра записи этого типа.
			'search_items'       => 'Искать слайдер', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Слайдер', // название меню
		),
		'public'              => false, // скрывает настройку урл и не отображает на фронте по умолчанию
		'show_ui'             => true, // зависит от public, сохраняет блок в меню при значении паблик public => false
		'menu_icon'           => 'dashicons-images-alt2',
		'supports'            => array('title', 'thumbnail'),
	));
});

function get_faq(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'faq',
	);

	return get_posts( $args );
}

function get_sliders(){
	$args = array(
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'sliders',
	);
	$sliders = [];

	foreach(get_posts( $args ) as $post ){
		$slider = get_fields($post->ID);
		$slider['title'] = $post->post_title;
		$slider['img'] = get_the_post_thumbnail_url( $post->ID  );
		$sliders[] = $slider;
	}
	return $sliders;
}

function get_tours(){
    $args = array(
        'numberposts' => -1,
        'category_name' => 'tours',
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'post',
    );
    $tours = [];

    foreach(get_posts( $args ) as $post ){
        $tour = get_fields($post->ID);
        $tour['title'] = $post->post_title;
        $tour['img'] = get_the_post_thumbnail_url( $post->ID  );
        $tour['url'] = get_permalink( $post->ID );
        $tours[] = $tour;
    }
    return $tours;
}

function get_main_tours(){
    $args = array(
        'numberposts' => 8,
        'category_name' => 'main_tours',
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'post',
    );
    $tours = [];

    foreach(get_posts( $args ) as $post ){
        $tour = get_fields($post->ID);
        $tour['title'] = $post->post_title;
        $tour['img'] = get_the_post_thumbnail_url( $post->ID  );
        $tour['url'] = get_permalink( $post->ID );
        $tours[] = $tour;
    }
    return $tours;
}
function get_directions(){
    $args = array(
        'numberposts' => -1,
        'category_name' => 'pop_direction',
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'post',
    );
    $directions = [];

    foreach(get_posts( $args ) as $post ){
        $direction = get_fields($post->ID);
        $direction['title'] = $post->post_title;
        $direction['img'] = get_the_post_thumbnail_url( $post->ID  );
        $direction['url'] = get_permalink( $post->ID );
        $directions[] = $direction;
    }
    return $directions;
}
function get_alic_directions(){
    $args = array(
        'numberposts' => 4,
        'category_name' => 'main_alic',
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'post',
    );
    $directions = [];

    foreach(get_posts( $args ) as $post ){
        $direction = get_fields($post->ID);
        $direction['title'] = $post->post_title;
        $direction['img'] = get_the_post_thumbnail_url( $post->ID  );
        $direction['url'] = get_permalink( $post->ID );
        $directions[] = $direction;
    }
    return $directions;
}
function get_vlc_directions(){
    $args = array(
        'numberposts' => 4,
        'category_name' => 'main_vlc',
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'post',
    );
    $directions = [];

    foreach(get_posts( $args ) as $post ){
        $direction = get_fields($post->ID);
        $direction['title'] = $post->post_title;
        $direction['img'] = get_the_post_thumbnail_url( $post->ID  );
        $direction['url'] = get_permalink( $post->ID );
        $directions[] = $direction;
    }
    return $directions;
}
//print_r(get_sliders()); 'thumbnail'

add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	return $content;
});

//add_filter( 'acf/settings/show_admin', '__return_false' );



function remove_menus_bloggood_ru(){
//    remove_menu_page( 'index.php' );                  //Консоль
//    remove_menu_page( 'edit.php' );                   //Записи
//    remove_menu_page( 'upload.php' );                 //Медиафайлы
//    remove_menu_page( 'edit.php?post_ENGINE=page' );    //Страницы
//    remove_menu_page( 'edit-comments.php' );          //Комментарии
//    remove_menu_page( 'themes.php' );                 //Внешний вид
//    remove_menu_page( 'plugins.php' );                //Плагины
//    remove_menu_page( 'users.php' );                  //Пользователи
//    remove_menu_page( 'tools.php' );                  //Инструменты
//    remove_menu_page( 'options-general.php' );        //Настройки

}
add_action( 'admin_menu', 'remove_menus_bloggood_ru' );
