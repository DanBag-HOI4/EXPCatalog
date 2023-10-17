<?php

require_once "../vendor/connect.php";
session_start();

$good_id = $_GET["id"];

$good = mysqli_query($connect, "SELECT * FROM `goods_telephone` WHERE `id` =  '$good_id'");
$good = mysqli_fetch_assoc($good);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/telephone_styles_admin.css">
    <title>Document</title>
</head>
<body>

    <pre>
        <?
        print_r($good)
        ?>
    </pre>

    <form class="add_good_form" method="POST" action="../vendor/telephone_update_create.php" enctype="multipart/form-data">

    <input type="hidden" name="id" value ="<?= $good_id ?>">
    <label>Название</label><br>
    <input type="text" name="good_name" value ="<?= $good["name"] ?>"><br>
    <label>Фото</label><br>
    <input type="file" name="good_photo" value ="<?= $good["photo"] ?>"><br>
    <label>Цена</label><br>
    <input type="number" name="good_price" value ="<?= $good["price"] ?>"><br>
    <label>Дисплей в дюймах</label><br>
    <input type="text" name="good_size" value ="<?= $good["size"] ?>"><br>
    <label>Объём памяти в гигабайтах</label><br>
    <input type="number" name="good_memory" value ="<?= $good["memory"] ?>"><br>
    <label>бренд</label><br>
    <select name="brand_good" id="brand_good" value ="<?= $good["brand"] ?>"> 
        <option value="Apple">Apple</option> 
        <option value="Samsung">Samsung</option> 
        <option value="Google">Google</option> 
        <option value="Huawei">Huawei</option> 
        <option value="Xiaomi">Xiaomi</option> 
    </select><br>
    <label for="presence_good">Наличие товара</label><br>
    <select name="presence_good" id="presence_good" value ="<?= $good["presence"] ?>"> 
        <option value="Товар в наличии">Товар в наличии</option> 
        <option value="Под заказ: сегодня">Под заказ: сегодня</option> 
        <option value="Под заказ: завтра">Под заказ: завтра</option> 
        <option value="Под заказ: позже">Под заказ: позже</option> 
        <option value="Нет в наличии">Нет в наличии</option> 
    </select>

    <button type="submit" class="add">Изменить</button>

    </form>
</body>
</html>