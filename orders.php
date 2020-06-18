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
    <link rel="stylesheet" href='css/orders.css'>

    <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
</head>

<body>
    <div class="grid">
        <div class="imi" id='imi'>
            <div class="g"><a href="index.php"  style="text-decoration: none;">Главная</a></div>
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
                <div class="name">Заказы</div>
                <div class="usermenu">
                    <a href="homeuser.php">Личные данные</a>
                    <a href="basket.php">Корзина</a>
                    <a href="#" style="background-color: #5C99C5;">Заказы</a>
                    <a></a>
                </div>

                <div class="list_products">
                    <div class="title_orders">
                        <div>Название товара</div>
                        <div>Дополнительная информация</div>
                        <div>Статус заказа</div>
                        <div>Действие</div>
                    </div>


                    <?php 
                    $sum = 0;
                    $result2 = mysqli_query ($db, "SELECT * FROM orders join orders_products on orders.id_order = orders_products.id_order join products on orders_products.id_product = products.id_product join images on products.id_product = images.id_product join statuses on orders.id_status = statuses.id_status WHERE id_user = ${_COOKIE["id"]} GROUP BY orders.id_order");
                    while ($row = mysqli_fetch_array($result2)) {      
                    ?>
                    <div class="title_orders_second">
                        <div>Заказ №<?php echo $row['id_order'] ?></div>
                        <div>Доп. информация</div>
                    </div>
                    <div class="product_content product">
                        <div class="products_in_order">
                            <?php 
                        $result3 = mysqli_query ($db, "SELECT * FROM orders join orders_products on orders.id_order = orders_products.id_order join products on orders_products.id_product = products.id_product join images on products.id_product = images.id_product WHERE id_user = ${_COOKIE["id"]} AND orders_products.id_order = ${row['id_order']} GROUP BY orders_products.id_product");
                        while ($row1 = mysqli_fetch_array($result3)) {        
                    ?>
                            <div class="descript_product_in_order">
                                <img src=<?=$row1['href']?> />
                                <div class="text_title"><?php echo $row1['product_name'];?></div>
                                <div class="text_desciption"><?php echo $row1['description'];?></div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="text_price">
                            <div class="status_container">
                                <input type="submit" id="submit" class="status" disabled="disabled" value=<?=$row['name_status']?>>
                                <form action="accept.php" method="post">
                                    <input type="submit" id="submit" class="status" value="Подтвердить получение" style="font-size: 0.53em;">
                                    <input name="id_order" type="text" style="display: none;" name="id_order" value='<?php echo $row['id_order'];?>'>
                                </form>
                                <div></div>
                                
                                <form action="pay.php" method="post">
                                    <input type="submit" id="submit" class="status" value="Оплатить">
                                    <input name="id_order" type="text" style="display: none;" name="id_order" value='<?php echo $row['id_order'];?>'>
                                </form>

                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
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
