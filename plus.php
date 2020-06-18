<?php
session_start();
$id_product = $_POST['id']; 

$id_user=$_COOKIE["id"];

include ("db.php");

$result = mysqli_query($db, "INSERT INTO user_products (id_user, id_products, count) VALUES ( $id_user, $id_product, 1 )");
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
