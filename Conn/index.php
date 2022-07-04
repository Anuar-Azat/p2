<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 * require_once 'Conn/connect.php';
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

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>group</title>
</head>
<!-- <link rel="stylesheet" href="/css/style.css" /> -->
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #CCCCC;
        color: #CCCCC;
    }

    td {
        background: #CCCCC;
    }
   
    #navbar ul{
        display: none;
        background-color: #6A92D4;
        position: absolute;
        top: 100%;
      }
      #navbar li:hover ul { display: block; }
      #navbar, #navbar ul{
        margin: 0;
        padding: 0;
        list-style-type: none;
      }
      #navbar {
        height: 30px;
        background-color: #6A92D4;
        padding-left: 25px;
        min-width: 470px;
      }
      #navbar li {
        float: left;
        position: relative;
        height: 100%;
      }
      #navbar li a {
        display: block;
        padding: 6px;
        width: 100px;
        color: #fff;
        text-decoration: none;
        text-align: center;
      }
      #navbar ul li { float: none; }
      #navbar li:hover { background-color: #FFB773; }
      #navbar ul li:hover { background-color: #666; }
      
</style>
<body>
<ul id="navbar">
<li class="nav-item active">
                  <a class="nav-link" href="../index.html">Главная</a>
                </li>
    <li class="nav-item">
                  <a class="nav-link" href="../about-us.html">О нас</a>
                </li>
      <li class="nav-item">
                  <a class="nav-link" href="../contact.html">Контакты</a>
                </li>
                <li class="nav-item">
                      <a class="nav-link" href="../courses.html">Наборы</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="../course-details.html"
                        >О курсах</a
                      >
                    </li>
    </ul>
<!--<header class="header_area">
      <div class="main_menu">
         <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Search Here"
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div> 

        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display 888
            <a class="navbar-brand logo_h" href="../index.html"
              ><img src="img/LLogo1.png" alt=""
            /></a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling 888
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent">
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="../index.html">Главная</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../about-us.html">О нас</a>
                </li>111111111111
                <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Курсы</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="../courses.html">Наборы</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="../course-details.html"
                        >О курсах</a
                      >
                    </li>
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="elements.html">Elements</a>
                    </li> 8888
                  </ul>
                </li>
                <!-- <li class="nav-item submenu dropdown">
                  <a
                    href="#"
                    class="nav-link dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                    >Blog</a
                  >
                  <ul class="dropdown-menu">
                    <li class="nav-item">
                      <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="single-blog.html"
                        >Blog Details</a
                      >
                    </li>
                  </ul>
                </li> 888
                <li class="nav-item">
                  <a class="nav-link" href="../contact.html">Контакты</a>
                </li>
                <!-- <li class="nav-item">
                  <a href="#" class="nav-link search" id="search">
                    <i class="ti-search"></i>
                  </a>
                </li> 88888
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>-->
    <table>
        <tr>
            <th>Id</th>
            <th>Наименование</th>
            <th>Дата начало</th>
            <th>Дата окончание</th>
            <th>Время</th>
            <th>День недели</th>
            <th>Стоимость курса</th>
            <th>Набор</th>
            <th>Max Набор</th>
        </tr>

        <?php

            /*
             * Делаем выборку всех строк из таблицы "products"
             */

            $products = mysqli_query($connect, "SELECT * FROM `group`");

            /*
             * Преобразовываем полученные данные в нормальный массив
             */

            $products = mysqli_fetch_all($products);

            /*
             * Перебираем массив и рендерим HTML с данными из массива
             * Ключ 0 - id
             * Ключ 1 - title
             * Ключ 2 - price
             * Ключ 3 - description
             *  /* <td><a href="product.php?id=<?= $product[0] ?>">View</a></td>
                       * <td><a href="update.php?id=<?= $product[0] ?>">Update</a></td>
                    *<td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>">Delete</a></td>
                      <h3>Add new product</h3>
    <form action="vendor/create.php" method="post">
    
                    */
             

            foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?= $product[0] ?></td>
                        <td><?= $product[1] ?></td>
                        <td><?= $product[2] ?></td>
                        <td><?= $product[3] ?></td>
                        <td><?= $product[4] ?></td>
                        <td><?= $product[5] ?></td>
                        <td><?= $product[6] ?></td>
                        <td><?= $product[7] ?></td>
                        <td><?= $product[8] ?></td>
                     </tr>
                <?php
            }
        ?>
    </table>

       
    
</body>
</html>