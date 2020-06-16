<?php
include ("db.php");
$iditem = $_COOKIE["iditem"];
$id=$_COOKIE["id"];

if (isset($_POST['Add'])) {
    unset($_POST['Add']);
  $result2 = mysqli_query ($db, "INSERT INTO user_products (id_user, id_products, count) 
  VALUES($id,$iditem,1)");
    if ($result2=='TRUE')
{
        session_start();
     $_SESSION["error"] = "Товар добавлен в корзину";
    $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: $redicet");
    exit();
}
else {
    session_start();
    $_SESSION["error"] = "Ошибка добавления";
    $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: $redicet");
                exit();
}
}
if (isset($_POST['Buy'])) {
  
}
if (isset($_POST['Otz'])) {
  
}
?>