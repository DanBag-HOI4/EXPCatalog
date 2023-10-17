<?php

require_once "./connect.php";
session_start();

$good_name = $_POST["good_name"];
$good_price = $_POST["good_price"];
$good_size = $_POST["good_size"];
$good_memory = $_POST["good_memory"];
$brand_good = $_POST["brand_good"];
$presence_good = $_POST["presence_good"];
$path = "../img/uploads/" . time() . $_FILES["good_photo"]["name"];
move_uploaded_file($_FILES["good_photo"]["tmp_name"], $path);

mysqli_query($connect, "INSERT INTO `goods_telephone` (`id`, `name`, `photo`, `price`, `size`, `memory`, `brand`, `presence`) 
VALUES (NULL, '$good_name', '$path', '$good_price', '$good_size', '$good_memory', '$brand_good', '$presence_good')");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?
        var_dump($_FILES);
        echo $path;
        ?>
    </pre>
</body>
</html>