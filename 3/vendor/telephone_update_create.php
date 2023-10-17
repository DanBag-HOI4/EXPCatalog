<?php

require_once "./connect.php";
session_start();

$id = $_POST["id"];
$name = $_POST["good_name"];
$price = $_POST["good_price"];
$size = $_POST["good_size"];
$memory = $_POST["good_memory"];
$brand = $_POST["brand_good"];
$presence = $_POST["presence_good"];
$path = "../img/uploads/" . time() . $_FILES["good_photo"]["name"];
move_uploaded_file($_FILES["good_photo"]["tmp_name"], $path);

mysqli_query($connect, "UPDATE `goods_telephone` SET `name` = '$name', `photo` = '$path', `price` = '$price', `size` = '$size', `memory` = '$memory', 
`brand` = '$brand', `presence` = '$presence'
WHERE `goods_telephone`.`id` = '$id'")

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