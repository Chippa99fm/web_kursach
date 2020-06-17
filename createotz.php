<?php
include ("db.php");
$iditem = $_COOKIE["iditem"];
$id=$_COOKIE["id"];

if (isset($_POST['text'])) { $text=$_POST['text']; if ($text =='') { unset($text);} }
if (isset($_POST['vote'])) { $vote=$_POST['vote']; if ($vote =='') { unset($vote);} }
$username = $_COOKIE["name"];

    $result = mysqli_query ($db, "INSERT INTO reviews (id_product, username, raiting, text) VALUES($iditem,'$username','$vote','$text')");

if ($result=='TRUE')
{
        session_start();
     $_SESSION["error"] = "Товар добавлен в корзину";
    $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: item_otz.ph");
    exit();
}
else {
    session_start();
    $_SESSION["error"] = "Ошибка добавления";
    $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: item_otz.php");
                exit();
}

?>