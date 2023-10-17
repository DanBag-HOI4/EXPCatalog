<?php

require_once "../vendor/connect.php";
session_start();
$good_info = mysqli_query($connect, "SELECT * FROM `goods_telephone`");
$good_info = mysqli_fetch_all($good_info);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/telephone_styles.css">
    <title>Панель администратора</title>
</head>
<body>

    <div class="container">

        <!-- <pre>
            <?
                print_r($good_info);
                print_r($good_info[5][2]);
            ?>
        </pre> -->

        <header>

            <!-- <pre>
                
                <?php
                    print_r($_SESSION["user"]["role"]);
                    print_r(gettype($_SESSION["user"]["role"]));
                ?>

            </pre> -->

            <div class="header_container">
                <div class="logo">
                    <a href="../index.php">EXPCatalog</a>
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
                        echo '<a href="../vendor/cabinet.php" id="cabinet">Личный кабинет</a>';
                        echo '<a href="#" id="cart"><svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg></a>';
                    } else {
                    echo '<a href="../vendor/signin.php" id="auth">Вход</a>';
                    }
                    ?>
                </div>
            </div>

            <input class="search" type="search" placeholder="Поиск">

        </header>

        <main>

            <div class="main_container">

                <div class="filters">

                    <h2 class="filters_title">Фильтры</h2>

                    <button class="presence">
                        <h2>Наличие в магазинах</h2>
                    </button>

                    <div class="presence_container">
                    
                        <form id="presence_form" class="presence_form">
                            <label>
                                <input type="checkbox" name="presencse_choice" value="В наличии">
                                В наличии
                            </label>
                            <label>
                                <input type="checkbox" name="presencse_choice" value="Под заказ: сегодня">
                                Под заказ: сегодня
                            </label>
                            <label>
                                <input type="checkbox" name="presencse_choice" value="Под заказ: завтра">
                                Под заказ: завтра
                            </label>
                            <label>
                                <input type="checkbox" name="presencse_choice" value="Под заказ: позже">
                                Под заказ: позже
                            </label>
                            <label>
                                <input type="checkbox" name="presencse_choice" value="Нет в наличии">
                                Нет в наличии
                            </label>
                        </form>

                    </div>

                    <button class="brand">
                        <h2>Производители</h2>
                    </button>

                    <div class="brand_container">

                        
                        <form id="brand_form" class="brand_form">
                            <label>
                                <input type="checkbox" name="brand_choice" value="Apple">
                                Apple
                            </label>
                            <label>
                                <input type="checkbox" name="brand_choice" value="Samsung">
                                Samsung
                            </label>
                            <label>
                                <input type="checkbox" name="brand_choice" value="Google">
                                Google
                            </label>
                            <label>
                                <input type="checkbox" name="brand_choice" value="Huawei">
                                Huawei
                            </label>
                            <label>
                                <input type="checkbox" name="brand_choice" value="Xiaomi">
                                Xiaomi
                            </label>
                        </form>

                    </div>

                </div>

                <div class="goods_and_sort_container">

                    <h2 class="find">Найдено:</h2>


                    <div class="sort_container">

                        <button class="sort_btn">
                            <h2>Сортировка</h2>
                        </button>

                        <form id="sort_form" class="sort_form">
                            <label>
                                <input type="checkbox" name="sort_choice" value="По популярности">
                                По популярности 
                            </label>
                            <label>
                                <input type="checkbox" name="sort_choice" value="По дешевизне">
                                По дешевизне
                            </label>
                            <label>
                                <input type="checkbox" name="sort_choice" value="По дороговизне">
                                По дороговизне
                            </label>
                            <label>
                                <input type="checkbox" name="sort_choice" value="По рейтингу">
                                По рейтингу
                            </label>
                        </form>

                    </div>

                    <button class="add">Добавить товар</button><br>

                    <form class="add_good_form" method="POST" action="../vendor/create_good.php" enctype="multipart/form-data">

                        <label>Название</label><br>
                        <input type="text" name="good_name"><br>
                        <label>Фото</label><br>
                        <input type="file" name="good_photo"><br>
                        <label>Цена</label><br>
                        <input type="number" name="good_price"><br>
                        <label>Дисплей в дюймах</label><br>
                        <input type="text" name="good_size"><br>
                        <label>Объём памяти в гигабайтах</label><br>
                        <input type="number" name="good_memory"><br>
                        <label>бренд</label><br>
                        <select name="brand_good" id="brand_good"> 
                            <option value="Apple">Apple</option> 
                            <option value="Samsung">Samsung</option> 
                            <option value="Google">Google</option> 
                            <option value="Huawei">Huawei</option> 
                            <option value="Xiaomi">Xiaomi</option> 
                        </select><br>
                        <label for="presence_good">Наличие товара</label><br>
                        <select name="presence_good" id="presence_good"> 
                            <option value="Товар в наличии">Товар в наличии</option> 
                            <option value="Под заказ: сегодня">Под заказ: сегодня</option> 
                            <option value="Под заказ: завтра">Под заказ: завтра</option> 
                            <option value="Под заказ: позже">Под заказ: позже</option> 
                            <option value="Нет в наличии">Нет в наличии</option> 
                        </select>

                        <button type="submit" class="add">Отправить</button>

                    </form>
    
                    <div class="goods">

                            <?php
                            foreach ($good_info as $item) {
                                ?>
                                <div class="good_card">

                                    <div class="good_card_pic">
                                        <img src="<?= $item[2]?>" alt="picture" width="200px">
                                    </div>

                                    <div class="good_card_text">
                                        <p>Название:<?= " " . $item[1]?></p>
                                        <p>Цена:<?= " " . $item[3] . " "?>руб</p>
                                        <p>Размер экрана:<?= " " . $item[4] . " "?>дюйм</p>
                                        <p>Обьём памяти:<?= " " . $item[5] . " "?>гб</p>
                                        <p>Бренд:<?= " " . $item[6]?></p>
                                        <p>Наличие:<?= " " . $item[7]?></p>
                                    </div>

                                    <a href="../vendor/telephone_update.php?id=<?= $item[0] ?>">
                                        <button class="btn_change">Изменить</button>
                                    </a>

                                    <a href="../vendor/tel_del.php?id=<?= $item[0] ?>">
                                        <button class="btn_change">Удалить</button>
                                    </a>

                                </div>

                                <?
                            }
                            ?>
    
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

    <script src="../js/script.js"></script>

</body>
</html>