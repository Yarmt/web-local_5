<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Таблица терминов</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style">
<style>
.image-title {
    position: fixed;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    width: 200px;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 10px;
    font-size: 14px;
    text-align: center;
    opacity: 0;
    transition: opacity 0.3s;
}

.image:hover .image-title {
    opacity: 1;

}
</style>
</head>
<body>
<table>
    <tr>
        <th>Название термина</th>
        <th>Описание</th>
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
                echo "<tr><td>" . $row["TermName"]. "</td><td>" . $row["Definition"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>0 результатов</td></tr>";
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
  $sql = "SELECT SetID, SetName FROM PictureSet";
  $result = $connection->query($sql);
  while ($row = $result->fetch_assoc()) {
    $setImageName = $row["SetName"];
    $setImageID = $row["SetID"];
    echo "<div class='image'>
            <img src='images/image" . $setImageID . ".jpg' width='800' height='600' alt='" . $setImageName . "'>
            <div class='image-title'>" . $setImageName . "</div>
          </div>";
  }
}
$connection->close();
?>

<script>
var images = document.querySelectorAll('.image');
var fixedTitle = document.getElementById('fixedTitle');

function updateFixedTitle() {
  var currentImage = null;
  
  for (var i = 0; i < images.length; i++) {
    var rect = images[i].getBoundingClientRect();
    if (rect.top <= 0 && rect.bottom >= 0) {
      currentImage = images[i];
      break;
    }
  }
  
  if (currentImage) {
    fixedTitle.textContent = currentImage.querySelector('.image-title').textContent;
    fixedTitle.style.opacity = '1';
  } else {
    fixedTitle.style.opacity = '0';
  }
}

images.forEach(function(image) {
  var imageTitle = image.querySelector('.image-title');
  
  image.addEventListener('mouseover', function() {
    imageTitle.style.opacity = '1';
  });
  
  image.addEventListener('mouseout', function() {
    imageTitle.style.opacity = '0';
  });
});

window.addEventListener('scroll', updateFixedTitle);
</script>

<a href="check_connection.php">Перейти</a>
</body>
</html>

