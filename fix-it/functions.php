<?php
// скрывает панельку админа на авторизованном сайте
add_filter('show_admin_bar', '__return_false');


define('F_THEME_ROOT', get_template_directory_uri());
define('F_CSS_DIR', F_THEME_ROOT . '/css');
define('F_JS_DIR', F_THEME_ROOT . '/js');
define('F_IMG_DIR', F_THEME_ROOT . '/img');

// подключаем стили до функции wp_head() которая вызывается в header.php
add_action( 'wp_enqueue_scripts', 'fix_it_scripts' );
function fix_it_scripts() {
	wp_enqueue_style( 'main', F_CSS_DIR . '/main.min.css' );
	wp_enqueue_style( 'theme', get_stylesheet_uri() );

	wp_deregister_script('jquery');
	wp_enqueue_script( 'script', F_JS_DIR . '/scripts.min.js' );
}
//добавляем новыетипы записей
add_action('init', function (){
	add_theme_support('post-thumbnails');

	register_post_type('faq', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'ЧАВО', // основное название для типа записи
			'singular_name'      => 'Вопрос', // название для одной записи этого типа
			'add_new'            => 'Добавить вопрос', // для добавления новой записи
			'add_new_item'       => 'Добавление вопроса', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование вопрос', // для редактирования типа записи
			'new_item'           => 'Новый вопрос', // текст новой записи
			'view_item'          => 'Смотреть вопрос', // для просмотра записи этого типа.
			'search_items'       => 'Искать вопрос', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'ЧАВО', // название меню
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
//print_r(get_sliders()); 'thumbnail'

add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
	return $content;
});