<?php
    session_start();
unset($_SESSION["error"]);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/index.css'>
    <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
</head>

<body>
    <div class="grid">
        <div class="imi" id='imi'>
            <div class="g"><a href="index.php" style="text-decoration: none;">Главная</a></div>
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
                        <a id="login-trigger" href="#" style="padding-left:6vw; background: #0B304D;">
                            Войти
                        </a>
                        <div id="login-content">
                            <form action="login_user.php" method="post">
                                <fieldset id="inputs">
                                    <input id="username" type="email" name="email" placeholder="Ваш email адрес" required>
                                    <input id="password" type="password" name="password" placeholder="Пароль" required>

                                    <input type="submit" id="submit" value="Войти" name="in">
                                    

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
                            <li><a href="katalog.php?categories=all">Каталог</a>
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

                <div id="slider-wrap" class="slider">
                    <div id="slider">
                        <div class="slide" style="background: url(img/001.jpg) no-repeat center; background-size: cover;">

                        </div>
                        <div class="slide" style="background: url(img/002.jpg) no-repeat center; background-size: cover;">

                        </div>
                        <div class="slide" style="background: url(img/003.jpg) no-repeat center; background-size: cover;">

                        </div>
                        <div class="slide" style="background: url(img/004.jpg) no-repeat center; background-size: cover;"></div>
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
