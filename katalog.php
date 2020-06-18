<?php
    session_start();
unset($_SESSION["error"]);
include ("db.php");
if($_COOKIE['request'] != null)
    $result2 = mysqli_query ($db, $_COOKIE['request']);
else 
    $result2 = mysqli_query ($db, "SELECT * FROM products join images on products.id_product = images.id_product join categories on products.id_categories = categories.id_categories group by products.id_product");

if($_COOKIE['price'] == null) {
    setcookie("price", 30000, time()+3600);
    setcookie("producer", "ОООГазпром", time()+3600);
    setcookie("categories", 1, time()+3600);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/katalog.css'>

    <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
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
                <div class="colum lis_params">
                    <form action="search.php" method="post">
                        <div class="scroll">
                            <p style="padding-left:3vw;">0Р</p>
                            <input type="range" name="range" min="0" max="100000" list="rangeList1" value="<?php echo $_COOKIE['price']?>">
                            <datalist id="rangeList1">
                                <option value="0" label="0">
                                <option value="10000" label="10000">
                                <option value="20000" label="20000">
                                <option value="20000" label="30000">
                                <option value="30000" label="40000">
                                <option value="40000" label="50000">
                                <option value="50000" label="60000">
                                <option value="60000" label="70000">
                                <option value="70000" label="80000">
                                <option value="80000" label="90000">
                                <option value="90000" label="10000">
                                <option value="99999" label="10000">
                            </datalist>
                            <p style="margin-left:1vw;">100 000Р</p>
                        </div>
                        <div class="producer" style="margin-bottom:9%;">
                            <div>Производитель</div>
                            <select name="producer">
                                <option <?php if("all" == $_COOKIE['producer']) {echo "SELECTED";} ?> value="all" name="all">Всё</option>
                                <?php 
                                $result34 = mysqli_query ($db, "SELECT DISTINCT producer FROM products"); 
                                while ($row5 = mysqli_fetch_array($result34)) { 
                                ?>
                                <option <?php if($row5['producer'] == $_COOKIE['producer']) {echo "SELECTED";} ?> value="<?php echo $row5['producer']?>"> <?php echo $row5['producer']?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="categories"> Категории

                            <select name="cat">
                                <option <?php if("all" == $_COOKIE['cat']) {echo "SELECTED";} ?> value="all" name="all">Всё</option>
                                <?php                           
                                $result33 = mysqli_query ($db, "SELECT * FROM categories"); 
                                while ($row = mysqli_fetch_array($result33)) { 
                                ?>
                                <option <?php if($row['id_categories'] == $_COOKIE['categories']) {echo "SELECTED";} ?> value="<?php echo $row['id_categories']?>"> <?php echo $row['categories_name']?></option>
                                <?php } ?>

                            </select>

                        </div>

                        <input type="submit" name="submit" value="Искать" class="input_b">
                    </form>
                     <form action="reset.php" method="post">
                            <input type="submit" name="submit" value="Сбросить" class="input_b">
                        </form>
                </div>

                <div class="products">
                    <?php 
                        while ($row = mysqli_fetch_array($result2)) {
                    ?>
                    <div>
                        <form action="katalogphp.php" method="post" class="product">
                            <div class="cart"><img src='<?php echo $row['href'];?>'></div>
                            <button style="word-break: break-all;" type="submit" id="submit" name="product"> <?php echo $row['product_name'];?></button>
                            <p><?php echo $row['price'];?></p>
                            <div class="b"><input type="submit" id="submit" value="В корзину" name="basket"></div>
                            <input name="id" type="text" style="display: none;" name="id" value='<?php echo $row['id_product'];?>'>
                        </form>
                    </div>
                    <?php } ?>
                </div>
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
