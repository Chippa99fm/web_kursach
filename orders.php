<?php
    session_start();
    include ("db.php");

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
                        $result3 = mysqli_query ($db, "SELECT * FROM orders join orders_products on orders.id_order = orders_products.id_order join products on orders_products.id_product = products.id_product join images on products.id_product = images.id_product WHERE id_user = ${_COOKIE["id"]} AND orders_products.id_order = ${row['id_order']}");
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
                            <form class="status_container"  action="pay.php" method="post">
                                <input type="submit" id="submit" class="status" disabled="disabled" value=<?=$row['name_status']?>>
                                <input type="submit" id="submit" class="status" value="Подтвердить получение" style="font-size: 0.53em;">
                                <div></div>
                                <input type="submit" id="submit" class="status" style="display: none;" name="id_order"  value = <?=$row['id_order']?> >
                                <input type="submit" id="submit" class="status" value="Оплатить">

                            </form>
                        </div>                       
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

    <script>
        (function($) {
            var hwSlideSpeed = 700;
            var hwTimeOut = 3000;
            var hwNeedLinks = true;
            var slilinkss = true;


            $(document).ready(function(e) {
                $('.slide').css({
                    "position": "absolute",
                    "top": '0',
                    "left": '0'
                }).hide().eq(0).show();
                var slideNum = 0;
                var slideTime;
                slideCount = $("#slider .slide").size();
                var animSlide = function(arrow) {
                    clearTimeout(slideTime);
                    $('.slide').eq(slideNum).fadeOut(hwSlideSpeed);
                    if (arrow == "next") {
                        if (slideNum == (slideCount - 1)) {
                            slideNum = 0;
                        } else {
                            slideNum++
                        }
                    } else if (arrow == "prew") {
                        if (slideNum == 0) {
                            slideNum = slideCount - 1;
                        } else {
                            slideNum -= 1
                        }
                    } else {
                        slideNum = arrow;
                    }
                    $('.slide').eq(slideNum).fadeIn(hwSlideSpeed, rotator);
                    $(".control-slide.active").removeClass("active");
                    $('.control-slide').eq(slideNum).addClass('active');
                }
                if (hwNeedLinks) {
                    var $linkArrow = $('<a id="prewbutton" href="#">&lt;</a><a id="nextbutton" href="#">&gt;</a>')
                        .prependTo('#slider');
                    $('#nextbutton').click(function() {
                        animSlide("next");
                        return false;
                    })
                    $('#prewbutton').click(function() {
                        animSlide("prew");
                        return false;
                    })
                }
                var $adderSpan = '';
                $('.slide').each(function(index) {
                    $adderSpan += '<span class = "control-slide">' + index + '</span>';
                });
                $('<div class ="sli-links">' + $adderSpan + '</div>').appendTo('#slider-wrap');
                $(".control-slide:first").addClass("active");
                $('.control-slide').click(function() {
                    var goToNum = parseFloat($(this).text());
                    animSlide(goToNum);
                });
                var pause = false;
                var rotator = function() {
                    if (!pause) {
                        slideTime = setTimeout(function() {
                            animSlide('next')
                        }, hwTimeOut);
                    }
                }
                $('#slider-wrap').hover(
                    function() {
                        clearTimeout(slideTime);
                        pause = true;
                    },
                    function() {
                        pause = false;
                        rotator();
                    });
                rotator();


                if (!slilinkss) $('.sli-links').css({
                    "display": "none"
                });
            });
        })(jQuery);

    </script>
</body>

</html>