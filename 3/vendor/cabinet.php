<?php
session_start();

if(!$_SESSION["user"]) {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
    <a href="./logout.php">Выйти из аккаунта</a>
</body>
</html>