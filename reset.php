<?php
session_start();

include ("db.php");

$request = "SELECT * FROM products join images on products.id_product = images.id_product join categories on products.id_categories = categories.id_categories  group by products.id_product";

setcookie("price", 99999, time()+3600);
setcookie("producer", "all", time()+3600);
setcookie("categories", "all", time()+3600);

setcookie("request", $request, time()+3600);
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
