<?php

session_start();
require_once "connect.php";

if(isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

$login = $_POST["login"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_confirm = $_POST["password_confirm"];

// запрос в бд для поиска уже имеющегося email и логина

$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");

// патерн дял валидации логина

$pattern = "/^[a-z0-9-_]+$/i";

// Валидация

if(!preg_match($pattern, $login)) {
    $_SESSION["error"] = "Логин должен быть на латинице. Разрешаются цифры и такие спец.символы как: -, _";
}

if(!(strlen($login) > 7 and strlen($login) < 19)) {
    $_SESSION["error"] = "Длина логина должна быть больше 7 и меньше 19 символов";
}

if(!preg_match($pattern, $password)) {
    $_SESSION["error"] = "Пароль должен быть на латинице. Разрешаются цифры и такие спец.символы как: -, _";
}

if(!(strlen($password) > 7 and strlen($password) < 19)) {
    $_SESSION["error"] = "Длина пароля должна быть больше 7 и меньше 19 символов";
}

if($password !== $password_confirm) {
    $_SESSION["error"] = "Пароли не совпадают";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["error"] = "e-mail указан неверно";
}

if(mysqli_num_rows($check_email) > 0) {
    $_SESSION["error"] = "пользователь с такой электронной почтой уже зарегистрирован";
}

if(mysqli_num_rows($check_login) > 0) {
    $_SESSION["error"] = "пользователь с таким логином уже зарегистрирован";
}

if(mysqli_num_rows($check_email) > 0 and mysqli_num_rows($check_login) > 0) {
    $_SESSION["error"] = "пользователь с таким логином и электроннной почтой уже зарегистрирован";
}

if(!isset($_SESSION["error"])) {
    mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`, `role`, `pfp`) VALUES (NULL, '$login', '$email', '$password', NULL , NULL)");
}

// возвращение на главную страницу

header("Location: signup.php");

?>