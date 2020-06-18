<?php
session_start();
$id_product = $_POST['id']; 
$id_userproducts = $_POST['id_userproducts']; 

include ("db.php");

$result = mysqli_query($db, "SELECT count(*) count from user_products WHERE id_products = $id_product");
$row = mysqli_fetch_array($result);
if($row['count'] <= 1) {
  $redicet = $_SERVER['HTTP_REFERER'];
    header("Location: $redicet");
    exit();  
}

$result1 = mysqli_query($db, "DELETE FROM user_products WHERE id_userproducts = $id_userproducts");
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
