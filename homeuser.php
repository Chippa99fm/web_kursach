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
    <link rel="stylesheet" href='css/userdata.css'>


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
                <div class="name">Личный кабинет</div>
                <div class="usermenu">
                    <a href="#" style="background-color: #5C99C5;">Личные данные</a>
                    <a href="#">Корзина</a>
                    <a href="#">Заказы</a>
                    <a></a>
                </div>
                <div class="pole">
                    <h1>Личные данные</h1>
                    <p>Вы можете изменить или дополнить свои регистрационные данные.</p>
                    <div class="contentpole">
                            <p>ffffffffffffffffffffd</p>
                    </div>
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
