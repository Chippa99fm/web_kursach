<?php
    session_start();
include ("db.php");
$error = $_SESSION["error"];
unset($_SESSION["error"]);

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

$result = mysqli_query($db, "SELECT * FROM products WHERE id_product = '$iditem'");

$myrow = mysqli_fetch_array($result);

$description = $myrow['description'];

$price  = $myrow['price'];
    
$producer = $myrow['producer'];
    
$product_name = $myrow['product_name'];

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/itempage.css'>
        <link rel="stylesheet" href='css/itemdesc.css'>



    <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
    <!-- jQuery 1.8 or later, 33 KB -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Fotorama from CDNJS, 19 KB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

</head>

<body>
    <div class="grid">
        <div class="imi" id='imi'>
            <div class="g"><a href="index.php">Главная</a></div>
            <form class="g">
                <input type="text" placeholder="Искать здесь...">
                <button type="submit"></button>
            </form>
            <div></div>
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
                    <a href="#">Корзина
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
                            <li><a href="#">Каталог</a>
                                <ul>
                                    <li class="jj"><a href="#">Велосипеды</a></li>
                                    <li class="jj"><a href="#">Защита</a></li>
                                    <li class="jj"><a href="#">Аксесуары</a></li>
                                    <li class="jjj"><a href="#"></a></li>
                                </ul>

                            </li>
                        </ul>
                    </nav>
                    <div>
                        Контакты
                    </div>
                </div>
                <form action="item_functions.php" method="post">
                    <div class="item">

                        <div class="fotorama" data-nav="thumbs" data-thumbheight="30" data-thumbwidth="50" data-loop="true">>
                            <img src="https://s.fotorama.io/1.jpg">
                            <img src="https://s.fotorama.io/2.jpg">
                            <img src="https://s.fotorama.io/2.jpg">
                            <img src="https://s.fotorama.io/2.jpg">
                            <img src="https://s.fotorama.io/2.jpg">
                        </div>
                        <div class="infosell">
                            <div class="nameitem">
                                Горный велосипед
                            </div>
                            <div>
                                <h1>32000р</h1>
                            </div>
                            <div>
                                <p>Отзывы:</p>
                            </div>
                            <div class="otz">
                                <p class="pol">5 положительных</p>
                                <p class="otr">3 отрицательных</p>
                            </div>
                            <div>
                                <p>Производитель: ооо</p>
                            </div>
                            <div><input type="submit" id="submit" value="   Купить  " autocomplete="off" name="Buy" style="font-size: 2vw;"></div>
                            <div><input type="submit" id="submit" value="Дообавить в корзину" autocomplete="off" name="Add"></div>
                        </div>
                        <div class="iditem">
                            <div>
                                <p>id: 11244523</p>
                            </div>
                            <div><input type="submit" id="submit" value="Оставить отзыв" autocomplete="off" name="Otz"></div>
                        </div>
                    </div>
                    <div class="iteminfo">
                        <div class="poss">
                            <div style=" background-color: #5C99C5;"><a href="itempage.php" style=" color: #000000;">Описание</a></div>
                             <div><a href="itempage_params.php">Характеристики</a></div>
                             <div><a href="itempage_otz.php">Отзывы</a></div>
                        </div>
                        <div class="desc">
                            sdfsdfsdf
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="niz">
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

    </script>


</body>

</html>
