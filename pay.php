<?php
session_start();
$id_user = $_COOKIE['id']; 
$id_order = $_POST['id_order']; 

include ("db.php");

$result = mysqli_query($db, "UPDATE orders SET id_status = 3 WHERE id_user = $id_user AND id_order = $id_order");
 if($result != true) exit("Всё фигня id_user = $id_user AND id_order = $id_order");

$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
