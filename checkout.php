<?php
session_start();

include ("db.php");

$result = mysqli_query($db, "INSERT INTO orders (id_status, id_user) VALUES (1, ${_COOKIE["id"]})");

$result1 = mysqli_query($db, "SELECT id_order FROM orders where id_user = ${_COOKIE["id"]}");
$myrow11 = mysqli_fetch_array($result1);

$result2 = mysqli_query($db, "INSERT INTO orders_products (count_product, id_order, id_product) VALUES (1, ${myrow11["id_order"]}, )");
?>