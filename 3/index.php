<?php

session_start();

if (isset($_SESSION["user"])) {
    if($_SESSION["user"]["role"] == "1" or $_SESSION["user"]["role"] == "2") {
        $_SESSION["admin"]= "admin";  
    }
}
 else {
    unset($_SESSION["admin"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>EXPCatalog</title>
</head>
<body>

    <div class="container">

        <header>
            <div class="logo">
                <a href="index.php">EXPCatalog</a>
            </div>
            <div class="menu">
                <a href="#">Главное</a>
                <a href="#">О нас</a>
                <a href="#">FAQ</a>
                <a href="#">Техподдержка</a>
            </div>
            <div class="right_menu">
                <?php
                if (isset($_SESSION["user"])) {
                    echo '<a href="vendor/cabinet.php" id="cabinet">Личный кабинет</a>';
                    echo '<a href="#" id="cart"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg></a>';
                } else {
                echo '<a href="vendor/signin.php" id="auth">Вход</a>';
                }
                ?>
            </div>
        </header>
        
        <main>
            <div class="main_cards">
                <div class="first_card">
                    <h2>Товары со скидкой</h2>
                    <p>Вы хотите купить, например, микроволновку, но цена вам не по кошельку, тогда вам сюда!</p>
                </div>
                <div class="second_card">
                    <h2>Промокоды</h2>
                    <p>Введите промокод и получите бонус в виде скидки!</p>
                </div>
                <div class="third_card">
                    <h2>Товары с трейд-ин</h2>
                    <p>Все товары с опцией трейд-ин находятся здесь!</p>
                </div>
            </div>

            <h1 class="popcat">Популярные категории</h1>
            <hr>
            <div class="categories">
                <div class="catgroup1">
                    <?php
                        if (isset($_SESSION["admin"])) {
                            echo '<div class="category1" onclick="javascript:location.href=`admin/telephone_admin.php`">';
                        } else {
                            echo '<div class="category1" onclick="javascript:location.href=`popular_categories/telephone.php`">';
                        }
                    ?>
                        <img src="img/61d2f85b92b57c0004c64745.png" alt="" width="250px" height="250px">
                        <h2>Телефоны</h2>
                    </div>
                    <div class="category2" onclick="javascript:location.href='popular_categories/laptop.php';">
                        <img src="img/laptop-with-white-screen-isolated-white-wall.jpg" alt=""  width="250px" height="250px">
                        <h2>Ноутбуки</h2>
                    </div>
                    <div class="category3" onclick="javascript:location.href='popular_categories/videocard.php';">
                        <img src="img/51c1zFDNVmL._AC_UF894,1000_QL80_.jpg" alt=""  width="325px" height="150px">
                        <h2>Видеокарты</h2>
                    </div>
                </div>
                <div class="catgroup2">
                    <div class="category4" onclick="javascript:location.href='popular_categories/processor.php';">
                        <img src="img/8650f24d3ba4df75e3f378043372178fa62fa5db5915fc7ac2d836192c9dffcb.jpg" alt=""  width="250px" height="250px">
                        <h2>Процессоры</h2>
                    </div>
                    <div class="category5" onclick="javascript:location.href='popular_categories/motherboard.php.php';">
                        <img src="img/asus-rog-strix-b460-f-gaming-motherboard.jpg" alt=""  width="250px" height="250px">
                        <h2>Материнские платы</h2>
                    </div>
                    <div class="category6" onclick="javascript:location.href='popular_categories/RAM.php';">
                        <img src="img/kingston_ddr5_32gb_2x16gb_4800mhz_pc_34800_fury_beast_black_kf548c38bbk2_32__1957257_2.jpg" alt=""  width="250px" height="250px">
                        <h2>Оперативная память</h2>
                    </div>
                </div>
                <div class="catgroup3">
                    <div class="category7" onclick="javascript:location.href='popular_categories/bp.php';">
                        <img src="img/psu_003.jpg" alt=""  width="250px" height="250px">
                        <h2>Блок питания</h2>
                    </div>
                    <div class="category8" onclick="javascript:location.href='popular_categories/monitor.php';">
                        <img src="img/dt8xjh9q38l4v5adgjtyoq87tjxrwoip.jpg" alt=""  width="250px" height="250px">
                        <h2>Мониторы</h2>
                    </div>
                    <div class="category9" onclick="javascript:location.href='popular_categories/headphones.php';">
                        <img src="img/6179899468.jpg" alt=""  width="300px" height="300px">
                        <h2>Наушники</h2>
                    </div>
                </div>
            </div>

        </main>

        <footer>
            <div class="footer_container">
                <div class="logo_footer">
                    <p>EXPCatalog</p>
                </div>

                <div class="contacts">
                    <ul class="ul_contacts">
                        <li>+70000000000</li>
                        <li>example@gmail.com</li>
                        <li>Улица Пушкина дом Колотушкина</li>
                    </ul>
                </div>

                <div class="map" style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/44/izhevsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Ижевск</a><a href="https://yandex.ru/maps/44/izhevsk/?ll=53.206896%2C56.852677&utm_medium=mapframe&utm_source=maps&z=13" style="color:#eee;font-size:12px;position:absolute;top:14px;">Ижевск — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=53.206896%2C56.852677&z=13" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
            </div>
        </footer>

    </div>

</body>
</html>