<?php
session_start();
require_once "connect.php";

if(isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

$login = $_POST["login"];
$password = $_POST["password"];

// запрос логина и пароля из бд

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

// проверка наличия логина и пароля в бд для входа

if(mysqli_num_rows($check_user) > 0) {

    $user = mysqli_fetch_assoc($check_user);
    $_SESSION["user"] = [
        "id" => $user["id"],
        "login" => $user["login"],
        "email" => $user["email"],
        "role" => $user["role"],
        "pfp" => $user["pfp"]
    ];

    echo $_SESSION["user"]["role"];

    header("Location: ../index.php");

} else {

    $_SESSION["signin_error"] = "Неверный логин или пароль";
    header("Location: signin.php");

}

?>

<pre>
    <?php
        print_r($check_user);
        print_r($user);
    ?>
</pre>