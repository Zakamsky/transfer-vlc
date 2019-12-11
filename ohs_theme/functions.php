<?php

// скрывает панельку админа на авторизованном сайте
add_filter('show_admin_bar', '__return_false');


define('OHS_THEME_ROOT', get_template_directory_uri());
define('OHS_CSS_DIR', OHS_THEME_ROOT . '/css');
define('OHS_JS_DIR', OHS_THEME_ROOT . '/js');
define('OHS_IMG_DIR', OHS_THEME_ROOT . '/img');

// подключаем стили до функции wp_head() которая вызывается в header.php
add_action( 'wp_enqueue_scripts', 'ohs_scripts' );
function ohs_scripts() {
	wp_enqueue_style( 'theme', get_stylesheet_uri() );
	wp_enqueue_style( 'wp_style', OHS_CSS_DIR . '/wp_style.css' );
	wp_enqueue_style( 'main', OHS_CSS_DIR . '/main.css' );

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'script', OHS_JS_DIR . '/scripts.min.js' );
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

// отклбчаем автоформатирование тэгов вордпрессом при сохранении кода в тексте страницы
// !!!лучше не надо а то он текст кашей выводит
//remove_filter('the_content', 'wpautop');

// отзывчивые изображения:
function add_image_responsive_class($content) {
	global $post;
	$pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
	$replacement = '<img$1class="$2 img-fluid"$3>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('the_content', 'add_image_responsive_class');

//новые типы записей
add_action('init', function (){
	add_theme_support('post-thumbnails');
	//разрешить тамбнайлзы для записей

	//слайдер:
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
}
