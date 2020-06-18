<?php
session_start();

$id = $_POST['id']; 

$id_user=$_COOKIE["id"];

include ("db.php");

$result = mysqli_query($db, "INSERT INTO orders (id_status, id_user) VALUES (1, $id_user)");

$result1 = mysqli_query($db, "SELECT id_order FROM orders where id_user = $id_user ORDER BY id_order DESC LIMIT 1");
$myrow11 = mysqli_fetch_array($result1);

/*втсавить проверку, если корзина пуста*/

$result3 = mysqli_query($db, "SELECT id_products FROM user_products WHERE id_user = $id_user GROUP BY id_products");
while ($product = mysqli_fetch_array($result3)) {
    $result2 = mysqli_query($db, "INSERT INTO orders_products (count_product, id_order, id_product) VALUES ((SELECT count(*) FROM user_products WHERE id_user = $id_user AND id_products = ${product['id_products']}), ${myrow11['id_order']}, ${product['id_products']} )");
}

mysqli_query($db, "DELETE FROM user_products WHERE id_user = $id_user");
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
?>
