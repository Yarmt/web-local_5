<?php 
    define('DB_HOST', 'ltd-mysql'); //Адрес
    define('DB_USER', 'std_2292'); //Имя пользователя
    define('DB_PASSWORD', '12345678'); //Пароль
    define('DB_NAME', 'std_2292_web5'); //Имя БД
    $mysql = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
?>
<?php
    include "db.php";
    $result = mysqli_query($mysql, "SELECT * FROM `images`");
?>
