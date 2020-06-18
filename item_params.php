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

$result = mysqli_query($db, "SELECT * FROM products WHERE id_product = $iditem ");

$myrow = mysqli_fetch_array($result);

$description = $myrow['description'];

$price  = $myrow['price'];
    
$producer = $myrow['producer'];
    
$product_name = $myrow['product_name'];

$result3 = mysqli_query($db, "SELECT COUNT(id_review) as 'count' FROM reviews WHERE id_product = $iditem AND raiting = '+' ");
$pol = mysqli_fetch_array($result3);

$result4 = mysqli_query($db, "SELECT COUNT(id_review) as 'count' FROM reviews WHERE id_product = $iditem AND raiting = '-' ");
$otr = mysqli_fetch_array($result4);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/itempage.css'>
    <link rel="stylesheet" href='css/itemparams.css'>




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
                <form action="item_function.php" method="post">
                    <div class="item">

                        <div class="fotorama" data-nav="thumbs" data-thumbheight="30" data-thumbwidth="50" data-loop="true">
                            <?php 
                    $sum = 0;
                    $result2 = mysqli_query ($db, "SELECT * FROM images where id_product = $iditem");
                    while ($row = mysqli_fetch_array($result2)) {
                    ?>
                            <img src="<?php echo $row['href']?>">

                            <?php } ?>
                        </div>
                        <div class="infosell">
                            <div class="nameitem">
                                <?php echo $product_name; ?>
                            </div>
                            <div>
                                <h1><?php echo $price; ?>р</h1>
                            </div>
                            <div>
                                <p>Отзывы:</p>
                            </div>
                            <div class="otz">
                                <p class="pol"><?php echo $pol['count']; ?> положительных</p>
                                <p class="otr"><?php echo $otr['count']; ?> отрицательных</p>
                            </div>
                            <div>
                                <p>Производитель: <?php echo $producer; ?></p>
                            </div>
                            <?php if($_COOKIE["logined"]!=null) {?>
                            <div><input type="submit" id="submit" value="   Купить  " autocomplete="off" name="Buy" style="font-size: 2vw;"></div>
                            <div><input type="submit" id="submit" value="Дообавить в корзину" autocomplete="off" name="Add"></div>
                             <?php } ?>
                        </div>
                        <div class="iditem">
                            <div>
                                <p>id: <?php echo $iditem; ?></p>
                            </div>
                            <?php if($_COOKIE["logined"]!=null) {?>
                            <div><input type="submit" id="submit" value="Оставить отзыв" autocomplete="off" name="Otz"></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="iteminfo">
                        <div class="poss">
                            <div><a href="itempage.php">Описание</a></div>
                            <div style=" background-color: #5C99C5;"><a style=" color: #000000;" href="item_params.php">Характеристики</a></div>
                            <div><a href="item_otz.php">Отзывы</a></div>
                        </div>
                        <div class="params">
                            <h1>Характеристики</h1>
                            <div class="allparams">
                            <?php 
                                $sum = 0;
                                $result2 = mysqli_query ($db, "SELECT * FROM params where id_product = $iditem");
                                while ($row = mysqli_fetch_array($result2)) {
                            ?>
                                <p><?php echo $row['param_name']?></p><p><?php echo $row['param_value']?></p>
                            <?php } ?>   

                            </div>
                        </div>
                    </div>
                </form>
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

    </script>


</body>

</html>
