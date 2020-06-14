<?php
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
if (isset($_POST['first_name'])) { $first_name=$_POST['first_name']; if ($first_name =='') { unset($first_name);} }
if (isset($_POST['second_name'])) { $second_name=$_POST['second_name']; if ($second_name =='') { unset($second_name);} }
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (isset($_POST['phone_number'])) { $phone_number=$_POST['phone_number']; if ($phone_number =='') { unset($phone_number);} }
$id = $_COOKIE["id"];


if (Condition) {
    if (empty($email)) {
        session_start();
            $_SESSION["error"] = "Не введены все обязательные значения (email)";

    header('Location: homeuser.php');
                exit();

    }
    
    $phone_number = stripslashes($phone_number);
    $phone_number = htmlspecialchars($phone_number);
        
    

    $email = stripslashes($email);
    $email = htmlspecialchars($email);

    $first_name = stripslashes($first_name);
    $first_name = htmlspecialchars($first_name);

    $second_name = stripslashes($second_name);
    $second_name = htmlspecialchars($second_name);
 
    
    $email = trim($email);
    $first_name = trim($first_name);
    $second_name = trim($second_name);
    
    if( !empty($password) ){
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    
    // подключаемся к базе
    include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
}


if( !empty($password) ){
$result2 = mysqli_query ($db, "UPDATE users SET email ='$email', first_name='$first_name', last_name='$second_name' , password='$password', phone_number='$phone_number' WHERE id_user = $id ");
}
else{
    $result2 = mysqli_query ($db, "UPDATE users SET email ='$email', first_name='$first_name', last_name='$second_name' , phone_number='$phone_number' WHERE id_user = $id ");
}

// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
        setcookie("name", $first_name, time()+3600*3);
        session_start();
     $_SESSION["error"] = "Вы успешно изменили данные";
    header('Location: homeuser.php');
    exit();
}
else {
    session_start();
    $_SESSION["error"] = "Ошибка изменения данных";
    header('Location: homeuser.php');
                exit();
}

?>
