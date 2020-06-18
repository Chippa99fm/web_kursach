<?php
session_start();
$id_user = $_COOKIE['id']; 

$field = $_POST['field']; 

include ("db.php");

$request = "SELECT * FROM products join images on products.id_product = images.id_product join categories on products.id_categories = categories.id_categories WHERE price > 0 AND price <= 99999 AND product_name LIKE '%$field%'";
    

$request .= " group by products.id_product";

setcookie("price", 99999, time()+3600);
setcookie("producer", "all", time()+3600);
setcookie("categories", "all", time()+3600);
setcookie("field", "$field", time()+3600);

setcookie("request", $request, time()+3600);

header("Location: katalog.php");
exit();
?>
