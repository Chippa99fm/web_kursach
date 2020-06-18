<?php
    session_start();
unset($_SESSION["error"]);
include ("db.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/addproduct.css'>

    <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
</head>

<body>
    <div class="grid">
        <div class="imi" id='imi'>
            <div class="g"><a href="index.php">Главная</a></div>
             <form class="g" action="find_product.php" method="post">
                <input type="text" class="input_search" name="field" autocomplete="off">
            </form>
            <div>
               <?php
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
            ?>
            </div>

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
                <form action="createprod.php" method="post" class="logined_container">
                    <div class="formf">
                        <div>
                            <h1>Название товара</h1>

                        </div>
                        <div>
                            <textarea type="text" name="name" placeholder="Ваше название..."></textarea>
                        </div>
                        <div>
                            <h1>Производитель товара</h1>

                        </div>
                        <div>
                            <textarea type="text" name="producer" placeholder="Ваш производитель..."></textarea>
                        </div>
                        <div>
                            <h1>Ссылки на фото товара</h1>
                            <p>Писать ссылки, разделяя их: ";"</p>
                        </div>
                        <div>
                            <textarea type="text" name="images" placeholder="Ваши ссылки..." rows="3"></textarea>
                        </div>
                        <div>
                            <h1>Описание товара</h1>

                        </div>
                        <div>
                            <textarea type="text" name="desc" placeholder="Ваше описание..." rows="3"></textarea>
                        </div>
                        <div>
                            <h1>Характеристики товара</h1>
                            <p>Писать в виде:</p>
                            <p>Ширина-25 сантиметров;Материал-Сталь</p>
                        </div>
                        <div>
                            <textarea type="text" name="params" placeholder="Ваши характерестики..." rows="3"></textarea>
                        </div>

                        <div>
                            <h1>Цена товара</h1>

                        </div>
                        <div>
                            <textarea type="number" name="price" placeholder="Цена..." rows="1"></textarea>
                        </div>

                        <div>
                            <h1>Категория товара</h1>

                        </div>
                        <div>
                            <select name="cat">
                                <?php 
                                $sum = 0;
                                $result2 = mysqli_query ($db, "SELECT * FROM categories");
                                while ($row = mysqli_fetch_array($result2)) {
                            ?>
                                <option value="<?php echo $row['id_categories']?>"><?php echo $row['categories_name']?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <input type="submit" id="submit" value="Создать">

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
