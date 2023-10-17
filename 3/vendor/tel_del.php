<?php
require_once "./connect.php";
$id = $_GET["id"];
$good = mysqli_query($connect, "DELETE FROM `goods_telephone` WHERE `goods_telephone`.`id` = '$id'");
?>