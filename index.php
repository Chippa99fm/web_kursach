<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
    <link rel="stylesheet" href='css/index.css'>
    <script ENGINE="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
</head>

<body>
    <div class="grid">
        <div class="imi" id='imi'>
            <div class="g">Главная</div>
            <form class="g">
                <input type="text" placeholder="Искать здесь...">
                <button type="submit"></button>
            </form>
            <div></div>
            <nav class="login_form">
                <ul>
                    <li id="login">
                        <a id="login-trigger" href="#">
                            Войти
                        </a>
                        <div id="login-content">
                            <form>
                                <fieldset id="inputs">
                                    <input id="username" type="email" name="Email" placeholder="Ваш email адрес" required>
                                    <input id="password" type="password" name="Password" placeholder="Пароль" required>

                                    <input type="submit" id="submit" value="Войти">
                                </fieldset>
                            </form>
                        </div>
                    </li>

                </ul>
                <a href="register.php">Регистрация</a>
            </nav>
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

                <div id="slider-wrap" class="slider">
                    <div id="slider">
                        <div class="slide" style="background: url(img/001.jpg) no-repeat center; background-size: cover;">

                        </div>
                        <div class="slide" style="background: url(img/002.jpg) no-repeat center; background-size: cover;">

                        </div>
                        <div class="slide" style="background: url(img/003.jpg) no-repeat center; background-size: cover;"><iframe width="100%" height="100%" src="http://www.youtube.com/embed/LDZX4ooRsWs?list=PLH6pfBXQXHECUaIU3bu9rjG2L6Uhl5A2q" frameborder="0" allowfullscreen></iframe></div>
                        <div class="slide" style="background: url(img/004.jpg) no-repeat center; background-size: cover;"></div>
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
