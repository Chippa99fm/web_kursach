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

$iditem = $_POST['iditem'];

if($iditem == ''){
    $iditem = $_COOKIE["iditem"];
}
else {
    setcookie("iditem", null, time()+3600*3);  
}

if($_COOKIE["iditem"] == null)
    setcookie("iditem", $iditem, time()+3600*3);  


include ("db.php");


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/create-otz.css'>



    <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
</head>

<body>
    <div class="grid">
        <div class="imi" id='imi'>
            <div class="g"><a href="index.php">Главная</a></div>
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
                <form action="createotz.php" method="post">
                    <div class="otzform">
                        <div class="boxs">
                            <div>
                                <h1>Напишите свой озыв</h1>
                            </div>
                            <div class="p">
                                <input type="radio" name="vote" value="+" checked="true">
                                <label for="contactChoice1">Положительный</label>
                            </div>
                             <div class="p">
                                <input type="radio" name="vote" value="-">
                                <label for="contactChoice1">Отрицательный</label>
                            </div>
                            <div class="submit">
                                <input type="submit" id="submit" value="Оставить отзыв">
                            </div>
                        </div>
                        <div class="text">
                            <textarea type="text" name="text" placeholder="Писать озыв здесь..."></textarea>
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
