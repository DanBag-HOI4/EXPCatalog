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
    <form action="create_signup.php" method="post" class="signin_form">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите логин"><br>
        <label>E-mail</label>
        <input type="email" name="email" placeholder="Введите электронную почту"><br>
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль"><br>
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Введите пароль ещё раз"><br>
        <button type="submit">Зарегистрироваться</button><br>
        <div class="form_block2">
            <p>У вас есть аккаунт? - <a href="signin.php">Войдите</a></p>
            <?php
            if(isset($_SESSION["error"])) {
                echo '<p class="error"> ' . $_SESSION["error"] . ' </p>';
            }
            unset($_SESSION["error"]);
            ?>
        </div>
    </form>
</main>

</body>
</html>