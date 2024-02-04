<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connection to bd</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>
<body>
<?php
$connection = new mysqli('localhost', 'root', '', 'lab5');
if ($connection->connect_error) {
    die('Ошибка подключения к базе данных: ' . $connection->connect_error);
} else {
    echo 'Подключение к базе данных "lab5" успешно!';
}
$connection->close();
?>
<a href="tables.php">Перейти к выводу таблицы</a>
<script src="" async defer></script>
</body>
</html>