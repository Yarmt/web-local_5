<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            Connection to bd
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <?php
    $connection = new mysqli('localhost', 'root', '', 'dataset_food');
    if ($connection->connect_error) {
        die('Ошибка подключения к базе данных: ' . $connection->connect_error);
    }
    $sql = "SELECT ID FROM data";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            print_r($row);
        }
    } else {
        echo "0 результатов";
    }
    $connection->close();
    ?>
        
        <script src="" async defer></script>
    </body>
</html>