<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */


define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'practica');

/*
 * Подключаемся к базе данных с помощью функции mysqli_connect()
 */

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

/*
 * Делаем проверку соединения
 * Если есть ошибки, останавливаем код и выводим сообщение с ошибкой
 */

if (!$connect) {
    die('Error connect to database!');
}

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id = $_POST['Id_group '];
$name = $_POST['Name_group'];
$da_st = $_POST['Data_start'];
$da_end = $_POST['Data_end'];
$time = $_POST['Time'];
$den_ned = $_POST['Den_nedeli'];
$nab = $_POST['nabor'];
$max_nab = $_POST['max_nabor'];
/*
 * Делаем запрос на изменение строки в таблице products
 */

mysqli_query($connect, "UPDATE `group` SET `name` = '$name', `da_st` = '$da_st', `da_end` = '$da_end'
`time` = '$time'
`den_ned` = '$den_ned'
`nab` = '$nab'
`max_nab` = '$max_nab'
 WHERE `products`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: /');