<?php
session_start();


if($_COOKIE["logined"] != null){
    setcookie("logined", null);
        setcookie("type", null);

    $redicet = $_SERVER['HTTP_REFERER'];
    header("Location: $redicet");
}  


if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($email) or empty($password))
{
    $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: $redicet");
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
   $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: $redicet");
}
else {
    if (password_verify($password, $myrow['password'])) {
        $_SESSION['first_name']=$myrow['first_name']; 
        $_SESSION['type']=$myrow['type_name'];
        $_SESSION['id']=$myrow['id_user'];
        $_SESSION["error"] = "Вы успешно вошли на сайт!";
        setcookie("logined", "1");
        setcookie("type", $myrow['type_name']);
        setcookie("name", $myrow['first_name']);
        setcookie("id", $myrow['id_user']);
        $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: $redicet");
    exit ();
    }
    else {
        $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: $redicet");
    }
}
/*
if (isset($_POST['new'])) {
    include ("db.php");
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } 

    $pas = rand (100000, 999999);
    $password = password_hash($pas, PASSWORD_DEFAULT);
    $result2 = mysqli_query ($db, "UPDATE users SET password='$password' WHERE email = $email ");
    
  $to = "$email";
  $subject = "Robot - Робот";
  $message = "Hello World!<br /><i>Это письмо отправлено <b>роботом</b> 
  и отвечать на него не нужно! Новый пароль:$pas</i>";
  $headers = "From: MyRusakov.ru <abc@gmail.com>\r\nContent-type: text/html; charset=windows-1251 \r\n";
  mail ($to, $subject, $message, $headers);

}*/
?>