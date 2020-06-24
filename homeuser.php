<?php
    session_start();
include ("db.php");
$error = $_SESSION["error"];
unset($_SESSION["error"]);

if($_COOKIE["logined"]==null)
{
    header("Location: index.php");
    exit();
}

$id = $_COOKIE["id"];
$result = mysqli_query($db, "SELECT * FROM users WHERE id_user = '$id'");
$myrow = mysqli_fetch_array($result);
$email = $myrow["email"];
$first_name = $myrow["first_name"];
$last_name = $myrow["last_name"];
$password = $myrow["password"];
$phone = $myrow["phone_number"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/user.css'>
    <link rel="stylesheet" href='css/userdata.css'>


    <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
</head>

<body>
    <div class="grid">
        <div class="imi" id='imi'>
            <div class="g"><a href="index.php" style="text-decoration: none;">Главная</a></div>
            <form class="g" action="find_product.php" method="post">
                <input type="text" class="input_search" name="field" autocomplete="off">
            </form>
            <div><?php
             if($_COOKIE["type"] == moder) {      
            ?>
                <li class="moder">
                    <a id="login-trigger2" href="#">
                        Управление
                    </a>
                    <div id="login-content2">
                        <form action="moder.php" method="post">
                            <fieldset id="inputs" class="moderitems">
                                <div class="ad"><input type="submit" id="submit" value="Добавить товар" name="add"></div>
                                <div>
                                    <input type="submit" id="submit" value="Удалить товар" name="del">
                                    <input id="username" type="text" name="idp" placeholder="ID:">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </li>
                <?php 
             }
            ?></div>
            <?php
             if($_COOKIE["logined"] == null) {      
            ?>
            <nav class="login_form">
                <ul>
                    <li id="login">
                        <a id="login-trigger" href="#">
                            Войти
                        </a>
                        <div id="login-content">
                            <form action="login_user.php" method="post">
                                <fieldset id="inputs">
                                    <input id="username" type="email" name="email" placeholder="Ваш email адрес" required>
                                    <input id="password" type="password" name="password" placeholder="Пароль" required>

                                    <input type="submit" id="submit" value="Войти">
                                </fieldset>
                            </form>
                        </div>
                    </li>

                </ul>
                <a href="register.php">Регистрация</a>
            </nav>
            <?php
             } else {
               ?>

            <nav class="login_form">
                <form action="login_user.php" method="post" class="logined_container">
                    <a href="basket.php">Корзина
                    </a>
                    <!--Здесь будет корзина* -->
                    <input type="submit" id="submit" value="Выйти">
                    <!--/*Здесь будет личный кабинет*/ -->
                </form>
            </nav>
            <a href="#"><?php echo "" . $_COOKIE["name"] . ""?></a>

            <?php 
             }
            ?>
        </div>
        <div class="seredina" id='seredina'>
            <div class='conpravo'>
                <div class="imi2">
                    <nav>
                        <ul>
                            <li><a href="katalog.php">Каталог</a>
                                <ul>
                                    <li class="jj"><a href="katalog.php" id="vel">Велосипеды</a></li>
                                    <li class="jj"><a href="katalog.php" id="def">Защита</a></li>
                                    <li class="jj"><a href="katalog.php" id="aks">Аксесуары</a></li>
                                    <li class="jjj"><a href="katalog.php"></a></li>
                                </ul>

                            </li>
                        </ul>
                    </nav>
                    <div>
                        Контакты
                    </div>
                </div>
                <div class="name">Личный кабинет</div>
                <div class="usermenu">
                    <a href="#" style="background-color: #5C99C5;">Личные данные</a>
                    <a href="basket.php">Корзина</a>
                    <a href="orders.php">Заказы</a>
                    <a></a>
                </div>
                <div class="pole">
                    <h1>Личные данные</h1>
                    <p>Вы можете изменить или дополнить свои регистрационные данные.</p>
                    <div class="contentpole">
                        <form action="edit_user.php" method="post">
                            <div class="reg_midle">
                                <div id="reg_body" class="body_cont">

                                    <div>
                                        <a>Электронная почта</a> <br>
                                        <input id="email" type="email" name="email" autocomplete="off" value="<?php echo $email; ?>">
                                    </div>
                                    <div>
                                        <a>Пароль</a><br>
                                        <input id="password" type="password" name="password" autocomplete="off">
                                    </div>
                                    <div>
                                        <a>Фамилия </a><br>
                                        <input id="second_name" name="second_name" type="text" autocomplete="off" value="<?php echo $last_name; ?>">
                                    </div>
                                    <div>
                                        <a>Имя</a><br>
                                        <input id="first_name" name="first_name" type="text" autocomplete="off" value="<?php echo $first_name; ?>">
                                    </div>
                                    <div>
                                        <a>Телефон</a><br>
                                        <input id="phone_number" type="phone" name="phone_number" autocomplete="off" value="<?php echo $phone; ?>">
                                    </div>
                                    <div><br><input type="submit" id="submit" value="Изменить" autocomplete="off"></div>
                                    <?php
                                echo "<br />".$error."<br />";
                            ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="niz">
            
                <a href="https://vk.com/chippa99" style="width:20vw;"> Мы в вк</a>
            
            <div>©2020 Магазин “Вело-будни”</div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#login-trigger').click(function() {
                $(this).next('#login-content').slideToggle();
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) $(this).find('span').html('')
                else $(this).find('span').html('')
            })
        });
        $(document).ready(function() {
            $('#login-trigger2').click(function() {
                $(this).next('#login-content2').slideToggle();
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) $(this).find('span').html('')
                else $(this).find('span').html('')
            })
        });
$(document).ready(function() {
            $('#vel').click(function() {
                document.cookie = "producer=all";
                document.cookie = "categories=1";
                document.cookie = "price=99999";
                document.cookie = "request=SELECT * FROM products join images on products.id_product = images.id_product join categories on products.id_categories = categories.id_categories WHERE categories.id_categories=1 group by products.id_product ";
            })
        });
        $(document).ready(function() {
            $('#def').click(function() {
                document.cookie = "producer=all";
                document.cookie = "categories=2";
                document.cookie = "price=99999";
                document.cookie = "request=SELECT * FROM products join images on products.id_product = images.id_product join categories on products.id_categories = categories.id_categories WHERE categories.id_categories=2 group by products.id_product ";
            })
        });
        $(document).ready(function() {
            $('#aks').click(function() {
                document.cookie = "producer=all";
                document.cookie = "categories=3";
                document.cookie = "price=99999";
                document.cookie = "request=SELECT * FROM products join images on products.id_product = images.id_product join categories on products.id_categories = categories.id_categories WHERE categories.id_categories=3 group by products.id_product ";
            })
        });
    </script>


</body>

</html>
