<?php 

// Регистрируем новый тип записей "Недвижимость"
function wpschool_create_realty_posttype() {
    $labels = array(
        'name' => _x( 'Недвижимость', 'Тип записей Недвижимость', 'understrap' ),
        'singular_name' => _x( 'Недвижимость', 'Тип записей Недвижимость', 'understrap'),
        'menu_name' => __( 'Недвижимость', 'understrap' ),
        'all_items' => __( 'Вся недвижимость', 'understrap' ),
        'view_item' => __( 'Смотреть недвижимость', 'understrap' ),
        'add_new_item' => __( 'Добавить новую недвижимость', 'understrap' ),
        'add_new' => __( 'Добавить новый объект', 'understrap' ),
        'edit_item' => __( 'Редактировать недвижимость', 'understrap' ),
        'update_item' => __( 'Обновить недвижимость', 'understrap' ),
        'search_items' => __( 'Искать недвижимость', 'understrap' ),
        'not_found' => __( 'Не найдено', 'understrap' ),
        'not_found_in_trash' => __( 'Не найдено в корзине', 'understrap' ),
    );

    $args = array(
        'label' => __( 'realty', 'understrap' ),
        'description' => __( 'Каталог недвижимости', 'understrap' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'meta' ),
        'taxonomies' => array( 'realty', 'city' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_icon' => 'dashicons-admin-home', // иконка в меню
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'realty', $args );

}
add_action( 'init', 'wpschool_create_realty_posttype', 0 );

// Создаем новую таксономию для недвижимости
add_action( 'init', 'create_realty_taxonomies', 0 );

function create_realty_taxonomies(){
  $labels = array(
    'name' => _x( 'Тип недвижимости', 'taxonomy general name' ),
    'singular_name' => _x( 'Категория', 'taxonomy singular name' ),
    'search_items' =>  __( 'Найти категорию' ),
    'all_items' => __( 'Все категории ' ),
    'parent_item' => __( 'Родительская категория' ),
    'parent_item_colon' => __( 'Родительская категория' ),
    'edit_item' => __( 'Родительская категория' ),
    'update_item' => __( 'Обновить катгорию' ),
    'add_new_item' => __( 'Добавить новый тип' ),
    'new_item_name' => __( 'Название новой категории' ),
    'menu_name' => __( 'Тип недвижимости' ),
  );

  register_taxonomy('realty', array('realty'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'realty' ),
  ));


// Создаем новую таксономию для базы городов

  $labels_city = array(
    'name' => _x( 'Города', 'taxonomy general name' ),
    'singular_name' => _x( 'Город', 'taxonomy singular name' ),
    'search_items' =>  __( 'Найти город' ),
    'all_items' => __( 'Все города' ),
    'parent_item' => __( 'Родительская категория' ),
    'parent_item_colon' => __( 'Родительская категория' ),
    'edit_item' => __( 'Редактировать' ),
    'update_item' => __( 'Обновить' ),
    'add_new_item' => __( 'Добавить новый город' ),
    'new_item_name' => __( 'Название нового города' ),
    'menu_name' => __( 'Города' ),
  );

  register_taxonomy('city', array('realty'), array(
    'hierarchical' => true,
    'labels' => $labels_city,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'city' ),
  ));

}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style')
    );
}


// Добавляем поля к объекту недвижимости (стоимость, площадь, жилая площадь, этаж, адрес)
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e88631cae096',
	'title' => 'Детали недвижимости',
	'fields' => array(
		array(
			'key' => 'field_5e886372975c8',
			'label' => 'Площадь кв.м',
			'name' => 'area',
			'type' => 'number',
			'instructions' => 'Укажите площадь объекта',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => 50000,
			'step' => '',
		),
		array(
			'key' => 'field_5e88642d975c9',
			'label' => 'Стоимость',
			'name' => 'price',
			'type' => 'number',
			'instructions' => 'Укажите стоимость объекта',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 0,
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5e8864ae35f4d',
			'label' => 'Адрес',
			'name' => 'address',
			'type' => 'text',
			'instructions' => 'Укажите местоположение объекта',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5e8864e335f4e',
			'label' => 'Жилая площадь',
			'name' => 'live-area',
			'type' => 'number',
			'instructions' => 'Укажите жилую площадь объекта в кв.м',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_5e88651d35f4f',
			'label' => 'Этаж',
			'name' => 'floor',
			'type' => 'number',
			'instructions' => 'Укажите этаж, на котором располагается объект недвижимости',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => '',
			'step' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'realty',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

// Добавляем возможность загрузки изображений у категории "Города"
acf_add_local_field_group(array(
	'key' => 'group_5e8c721ad38ac',
	'title' => 'Изображение города',
	'fields' => array(
		array(
			'key' => 'field_5e8c7246de7d1',
			'label' => 'Изображение города',
			'name' => 'image_city',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'city',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;