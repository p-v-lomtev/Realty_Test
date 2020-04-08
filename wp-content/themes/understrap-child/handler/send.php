<?php
define('WP_USE_THEMES', false);
require_once  $_SERVER["DOCUMENT_ROOT"]."/wp-load.php";
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

    $msg_box = ""; // в этой переменной будем хранить сообщения формы
    $errors = array(); // контейнер для ошибок
    // проверяем корректность полей
    if($_POST['title_new'] == "")    $errors[] = "Необходимо указать название объекта!";
    if($_POST['price_new'] == "")   $errors[] = "Необходимо указать стоимость объекта!";
    if($_POST['description_new'] == "") $errors[] = "Описание объекта не заполнено!";
    if($_POST['floor_new'] == "") $errors[] = "Укажите на каком этаже находится объект!";
    if($_POST['address_new'] == "") $errors[] = "Адрес объекта не заполнен!";
    if($_POST['area_new'] == "") $errors[] = "Площадь объекта не указана!";
    if($_POST['live_area_new'] == "") $errors[] = "Жилая площадь объекта не указана!";
    if($_POST['city_new'] == "") $errors[] = "Выберите город, в котором находится объект!";
    if($_POST['realty_new'] == "") $errors[] = "Выберите тип объекта!";
    
 
// если форма без ошибок
if(empty($errors)){

 $post_title  = $_POST['title_new'];
 $post_content = $_POST['description_new'];

 $new_post = array(
 'ID' => '',
 'post_type'     => 'realty',
 'post_author' => $user->ID,
 'post_content' => $post_content,
 'post_title' => $post_title,
 'post_status' => 'publish'
 );
 
$post_id =  wp_insert_post($new_post);

// Вставляем значения в поля ACF
$field_key = "price";
$value = $_POST['price_new'];
update_field( $field_key, $value, $post_id );
$field_key = "area";
$value = $_POST['area_new'];
update_field( $field_key, $value, $post_id );
$field_key = "floor";
$value = $_POST['floor_new'];
update_field( $field_key, $value, $post_id );
$field_key = "address";
$value = $_POST['address_new'];
update_field( $field_key, $value, $post_id );
$field_key = "live-area";
$value = $_POST['live_area_new'];
update_field( $field_key, $value, $post_id );

// Передаем значения из селектов, устанавливаем тип и город
wp_set_object_terms( $post_id, $_POST['realty_new'], 'realty' );
wp_set_object_terms( $post_id, $_POST['city_new'], 'city' );

// Загружаем изображение 
$file_handler = 'image_file';
$attach_id = media_handle_upload($file_handler,$post_id );

// Устанавливаем заглушку изображения
set_post_thumbnail( $post_id, $attach_id  );


// выведем сообщение об успехе
$msg_box = "<span style='color: green;'>Объявление успешно отправлено!</span>";
}

else {
// если были ошибки, то выводим их
$error_box = "";
foreach($errors as $one_error){
$error_box .= "<span style='color: red;'>$one_error</span><br/>";
}
}

// делаем ответ на клиентскую часть в формате JSON
echo json_encode(array(
'result' => $msg_box,
'error'  => $error_box,
));


?>