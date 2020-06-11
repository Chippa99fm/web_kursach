<?php
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }

if (isset($_POST['first_name'])) { $first_name=$_POST['first_name']; if ($first_name =='') { unset($first_name);} }

if (isset($_POST['second_name'])) { $second_name=$_POST['second_name']; if ($second_name =='') { unset($second_name);} }

if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (isset($_POST['passwordAgain'])) { $passwordAgain=$_POST['passwordAgain']; if ($passwordAgain =='') { unset($passwordAgain);} }

if (isset($_POST['phone_number'])) { $phone_number=$_POST['phone_number']; if ($phone_number =='') { unset($phone_number);} }


if (Condition) {
    if (empty($first_name) or empty($second_name) or empty($password) or empty($email)) {
        session_start();
            $_SESSION["error"] = "Не введены все обязательные значения";

    header('Location: register.php');
                exit();

    }
    if ($password != $passwordAgain){
        session_start();
            $_SESSION["error"] = "Пароли не совпадают";
        header('Location: register.php');
        exit();
    
    }
   /* if ($check != true){
        exit ("Нет согласия на обработку персональных данных");
    }*/
    
    $phone_number = stripslashes($phone_number);
    $phone_number = htmlspecialchars($phone_number);
        
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $email = stripslashes($email);
    $email = htmlspecialchars($email);

    $first_name = stripslashes($first_name);
    $first_name = htmlspecialchars($first_name);

    $second_name = stripslashes($second_name);
    $second_name = htmlspecialchars($second_name);
 
    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = trim($email);
    $first_name = trim($first_name);
    $second_name = trim($second_name);
    // подключаемся к базе
    include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    // проверка на существование пользователя с таким же логином
  //  $result = mysqli_query($db, "SELECT id FROM users WHERE email='$email'");
}
  //$myrow = mysqli_fetch_array($result);
  //if (!empty($myrow['id'])) {
   //   exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
  //}
// если такого нет, то сохраняем данные
$result2 = mysqli_query ($db, "INSERT INTO users (email, first_name, id_user,id_user_type, last_name, password, phone_number) VALUES('$email','$first_name',0,1,'$second_name','$password','$phone_number')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
        session_start();
     $_SESSION["error"] = "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт";
    header('Location: register.php');
    exit();
}
else {
    session_start();
    $_SESSION["error"] = "Ошибка регистрации";
    header('Location: register.php');
                exit();
}
?>
