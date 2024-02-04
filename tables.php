<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Таблица терминов и картинок</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <style>
        .image {
            max-width: 200px;
            max-height: 200px;
        }
        .image:hover::after {
            content: attr(data-title);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Название термина</th>
        <th>Описание</th>
        <th>Картинка</th>
    </tr>
    <?php
$connection = new mysqli('localhost', 'root', '', 'lab5');
if ($connection->connect_error) {
    die('Ошибка подключения к базе данных: ' . $connection->connect_error);
} else {
    $sql = "SELECT TermName, Definition FROM Terminology";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $termName = $row["TermName"];
            $definition = $row["Definition"];
            $imageNumber = substr($termName, 5); // Получаем номер из названия термина (например, "image1" -> "1")
            echo "<tr><td>" . $termName . "</td><td>" . $definition . "</td><td><img class='image' src='images/image" . $imageNumber . ".jpg' data-title='" . $termName . "'></td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>0 результатов</td></tr>";
    }
}
$connection->close();
?>
</table>
<?php
$connection = new mysqli('localhost', 'root', '', 'lab5_picture');
if ($connection->connect_error) {
    die('Ошибка подключения к базе данных: ' . $connection->connect_error);
} else {
    $sql = "SELECT SetName, Definition FROM PictureSet";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $termName = $row["SetName"];
            $imageNumber = substr($termName, 5); // Получаем номер из названия термина (например, "image1" -> "1")
            $sql2 = "SELECT Name FROM PictureSet WHERE ID = " . $imageNumber;
            $result2 = $connection->query($sql2);
            $row2 = $result2->fetch_assoc();
            $imageName = $row2["Name"];
            echo "<tr><td>" . $termName . "</td><td>" . $definition . "</td><td><img class='image' src='images/image" . $imageNumber . ".jpg' data-title='" . $imageName . "'></td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>0 результатов</td></tr>";
    }
}
$connection->close();
?>
<a href="check_connection.php">Вернуться к проверке подключения</a>
<script src="" async defer></script>
</body>
</html>