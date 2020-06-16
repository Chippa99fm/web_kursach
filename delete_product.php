<?php
session_start();
$id = $_POST['id']; 

$iduser=$_COOKIE["id"];

include ("db.php");

$result = mysqli_query($db, "DELETE FROM user_products WHERE id_user = $iduser AND id_userproducts = $id");
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
