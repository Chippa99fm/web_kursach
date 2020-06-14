<?php
    session_start();
$error = $_SESSION["error"];
unset($_SESSION["error"]);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Велосипеды</title>
            <link rel="stylesheet" href='css/css.css'>
    <link rel="stylesheet" href='css/register.css'>
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
                <form action="save_user.php" method="post">
                    <div class="reg_midle">
                        <div id="reg_title">Регистрация</div>

                        <div id="reg_body" class="body_cont">


                            <div>
                                <a>Электронная почта</a> <br>
                                <input id="email" type="email" name="email" autocomplete="off">
                            </div>
                            <div>
                                <a>Пароль</a><br>
                                <input id="password" type="password" name="password" autocomplete="off">
                            </div>
                            <div>
                                <a>Подтверждение пароля</a><br>
                                <input id="passwordAgain" type="password" name="passwordAgain" autocomplete="off">
                            </div>
                            <div>
                                <a>Фамилия </a><br>
                                <input id="second_name" name="second_name" type="text" autocomplete="off">
                            </div>
                            <div>
                                <a>Имя</a><br>
                                <input id="first_name" name="first_name" type="text" autocomplete="off">
                            </div>
                            <div>
                                <a>Телефон</a><br>
                                <input id="phone_number" type="phone" name="phone_number" autocomplete="off">
                            </div>
                            <div><input type="submit" id="submit" value="Зарегистрироваться" autocomplete="off"></div>
                            <div> <input type="checkBox" name="check" value="Accept " id="check"></div>
                            <?php
                                echo "<br />".$error."<br />";
                            ?>
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
            })
        });

    </script>
</body>

</html>
