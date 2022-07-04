<?php

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
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $Id_group = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $product = mysqli_query($connect, "SELECT * FROM `group` WHERE `id` = '$Id_group '");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $product = mysqli_fetch_assoc($product);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update group</title>
</head>
<body>
    <h3>Update group</h3>
    <form action="Conn/vendor/update.php" method="post">
    
        <input type="hidden" name="id" value="<?= $product['Id_group'] ?>">
        <p>Name_group</p>
        <input type="text" name="title" value="<?= $product['Name_group'] ?>">
        <p>Data_start</p>
        <textarea name="description"><?= $product['Data_start'] ?></textarea>
        <p>Data_end</p>
        <input type="number" name="price" value="<?= $product['Data_end'] ?>"> <br> <br>
        <p>Time</p>
        <textarea name="description"><?= $product['Time'] ?></textarea>
        <p>Den_nedeli</p>
        <textarea name="description"><?= $product['Den_nedeli'] ?></textarea>
        <p>nabor</p>
        <textarea name="description"><?= $product['nabor'] ?></textarea>
        <p>max_nabor</p>
        <textarea name="description"><?= $product['max_nabor'] ?></textarea>
        <button type="submit">Update</button>
    </form>
</body>
</html>
