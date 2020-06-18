<?php
    session_start();
$error = $_SESSION["error"];
unset($_SESSION["error"]);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
            <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/register.css'>
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
                        Модерская
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
                         <a id="login-trigger" href="#" style="padding-left:6vw; background: #0B304D;">
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
                                                <a href="homeuser.php"><?php echo "" . $_COOKIE["name"] . ""?></a>


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
                                    <li class="jj"><a href="katalog.php">Велосипеды</a></li>
                                    <li class="jj"><a href="katalog.php">Защита</a></li>
                                    <li class="jj"><a href="katalog.php">Аксесуары</a></li>
                                    <li class="jjj"><a href="katalog.php"></a></li>
                                </ul>

                            </li>
                        </ul>
                    </nav>
                    <div>
                        Контакты
                    </div>
                </div>
                <form action="save_user.php" method="post">
                    <div class="reg_midle">
                        <div id="reg_title">Регистрация</div>

                        <div id="reg_body" class="body_cont">


                            <div>
                                <a>Электронная почта</a> <br>
                                <input id="email" type="email" name="email" autocomplete="off">
                            </div>
                            <div>
                                <a>Пароль</a><br>
                                <input id="password" type="password" name="password" autocomplete="off">
                            </div>
                            <div>
                                <a>Подтверждение пароля</a><br>
                                <input id="passwordAgain" type="password" name="passwordAgain" autocomplete="off">
                            </div>
                            <div>
                                <a>Фамилия </a><br>
                                <input id="second_name" name="second_name" type="text" autocomplete="off">
                            </div>
                            <div>
                                <a>Имя</a><br>
                                <input id="first_name" name="first_name" type="text" autocomplete="off">
                            </div>
                            <div>
                                <a>Телефон</a><br>
                                <input id="phone_number" type="phone" name="phone_number" autocomplete="off">
                            </div>
                            <div><input type="submit" id="submit" value="Зарегистрироваться" autocomplete="off"></div>
                            <div><input type="checkBox" name="check" value="Accept " id="check"><a style="padding-left: 1vw;">Предоставляя свои персональные данные Покупатель даёт согласие на обработку, хранение и использование своих персональных данных на основании ФЗ № 152-ФЗ «О персональных данных» от 27.07.2006 г. </a></div>
                            <?php
                                echo "<br />".$error."<br />";
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="niz">
            <div class="bottom">
                <img src="img/%D0%B2%D0%BA.png" style="width:35px; height:35px;">
                <a href="https://vk.com/chippa99" style="width:4vw;"> Мы в вк</a>
            </div>
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

    </script>
</body>

</html>
