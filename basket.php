<?php
    session_start();
    include ("db.php");

if($_COOKIE["logined"]==null)
{
    header("Location: index.php");
    exit();
}

$id = $_COOKIE["id"];
$result = mysqli_query($db, "SELECT * FROM users WHERE id_user = '$id'");
$myrow = mysqli_fetch_array($result);
$email = $_COOKIE["email"];
$first_name = $_COOKIE["first_name"];
$last_name = $_COOKIE["last_name"];
$password = $_COOKIE["password"];
$phone = $_COOKIE["phone_number"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/user.css'>
    <link rel="stylesheet" href='css/busket.css'>


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
                <div class="name">Корзина</div>
                <div class="usermenu">
                    <a href="homeuser.php">Личные данные</a>
                    <a href="#" style="background-color: #5C99C5;">Корзина</a>
                    <a href="orders.php">Заказы</a>
                    <a></a>
                </div>

                <div class="list_products">
                    <?php 
                    $sum = 0;
                    $result2 = mysqli_query ($db, "SELECT *, count(*) count, SUM(price) sum_price FROM user_products join products on user_products.id_products = products.id_product join images on user_products.id_products = images.id_product where id_user = ${_COOKIE["id"]} GROUP BY id_products");
                    
                    $result4 = mysqli_query ($db, "SELECT *, count(*) count, SUM(price) sum_price FROM user_products join products on user_products.id_products = products.id_product where id_user = ${_COOKIE["id"]} GROUP BY id_products");
                    while ($row = mysqli_fetch_array($result2)) {
                       $row2 = mysqli_fetch_array($result4) 
                    ?>
                    <div class="mini_content mini_m">
                        <div class="mini">Количество</div>
                        <form action="minus.php" method="post">
                            <input class="mini operand" style="background-color: #AFCBE3" value="-" type="submit">
                            <input type="text" style="display: none;" name="id" value=<?=$row['id_products']?>>
                            <input type="text" style="display: none;" name="id_userproducts" value="<?=$row['id_userproducts']?>">
                        </form>
                        <input class="mini" style="width: 2vw; text-align: center;" name="count" disabled="true" value=<?=$row2['count']?>>
                        <form action="plus.php" method="post">
                            <input class="mini operand" style="background-color: #AFCBE3" value="+" type="submit">
                            <input type="text" style="display: none;" name="id" value=<?=$row['id_products']?>>
                        </form>
                    </div>
                    <form class="product_content product" action="delete_product.php" method="post">
                        <img src="<?=$row['href']?>" />
                        <h1 class="text_title"><?php echo $row['product_name'];?></h1>
                        <p class="text_desciption"><?php echo $row['description'];?></p>
                        <p class="text_price"><?php echo $row['price'];  
                        $sum += $row2['sum_price']?>₽</p>
                        <input type="text" style="display: none;" name="id" value=<?=$row['id_products']?>>

                        <input type="submit" id="submit" class="text_delete" value="Удалить">
                    </form>
                    <?php } ?>

                    <form class="total total_cont" action="checkout.php" method="post">
                        <div>Здесь могла быть ваша реклама</div>
                        <p>Итого заказ на сумму: <?php echo $sum ?>₽</p>
                        <input class="checkout" type="submit" id="submit" value="Оформить">
                    </form>
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
