<?php
session_start();
require_once "connect.php";

if(isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin_styles.css">
    <title>Вход</title>
</head>
<body>

<main>
    <form action="create_signin.php" method="post" class="signin_form">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин"><br>
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль"><br>
        <button type="submit">Войти</button><br>
        <div class="form_block2">
            <p>Нет акканута? - <a href="signup.php">Зарегистрируйтесь</a></p>
            <p>Забыли пароль? - <a href="#">Вам сюда</a></p>
            <?php
            if(isset($_SESSION["signin_error"])) {
                echo '<p class="error"> ' . $_SESSION["signin_error"] . ' </p>';
            }
            unset($_SESSION["signin_error"]);
            ?>
        </div>
    </form>
</main>

</body>
</html>