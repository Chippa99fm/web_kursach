<?php
include ("db.php");
$iduser = $_COOKIE["id"];
if (isset($_POST['id'])) { $id=$_POST['id']; if ($id =='') { unset($id);} }


if (isset($_POST['basket'])) {
    unset($_POST['basket']);
  $result2 = mysqli_query ($db, "INSERT INTO user_products (id_user, id_products, count) 
  VALUES($iduser,$id,1)");
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
if (isset($_POST['product'])) {
    unset($_POST['product']);
  setcookie("iditem", $id);
        session_start();
        header("Location: itempage.php");
    exit();

  
}
