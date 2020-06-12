<?php
session_start();
if($_COOKIE["logined"] != null){
    setcookie("logined", null, time()+3600);
    header('Location: index.php');
    exit ();
}  

if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($email) or empty($password))
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

$email = stripslashes($email);
$email = htmlspecialchars($email);
$password = stripslashes($password);
$password = htmlspecialchars($password);

$email = trim($email);

include ("db.php");

$result = mysqli_query($db, "SELECT first_name, id_user, type_name, password FROM users join user_types on users.id_user_type = user_types.id_user_type WHERE email = '$email'");
$myrow = mysqli_fetch_array($result);
if (empty($myrow['password']))
{
    exit ("Извините, введённый вами email или пароль неверный.");
   // exit ("Нет такого пользвателя");
     $_SESSION["error"] = "Извините, введённый вами email или пароль неверный.";
}
else {
    if (password_verify($password, $myrow['password'])) {
        $_SESSION['first_name']=$myrow['first_name']; 
        $_SESSION['type']=$myrow['type_name'];
        $_SESSION['id']=$myrow['id_user'];
        $_SESSION["error"] = "Вы успешно вошли на сайт!";
        setcookie("logined", "1", time()+3600);
        setcookie("type", $myrow['type_name'], time()+3600);
        setcookie("name", $myrow['first_name'], time()+3600);
        setcookie("id", $myrow['id_user'], time()+3600);
        header('Location: index.php');
    exit ();
    }
    else {
        exit ("Извините, введённый вами email или пароль неверный.");
       // exit ("Пароли не совпадают $password != ${myrow['password']}");
        $_SESSION["error"] = "Извините, введённый вами email или пароль неверный.";
    }
}
?>