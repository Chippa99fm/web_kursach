<?php
session_start();
$id_user = $_COOKIE['id']; 

$price = $_POST['range']; 
$producer = $_POST['producer'];

$cat = $_POST['cat']; 

include ("db.php");

$request = "SELECT * FROM products join images on products.id_product = images.id_product join categories on products.id_categories = categories.id_categories WHERE price > 0 AND price <= $price";
    

if($producer != null && $producer != "all") 
    $request .= " AND producer = '$producer' ";
if($cat != "all")
    $request .= " AND products.id_categories = $cat";

$request .= " group by products.id_product";

setcookie("price", $price, time()+3600);
setcookie("producer", "$producer", time()+3600);
setcookie("categories", $cat, time()+3600);

setcookie("request", $request, time()+3600);
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
