<?php
session_start();

$id = $_POST['id']; 

$id_user=$_COOKIE["id"];

include ("db.php");



mysqli_query($db, "DELETE FROM reviews WHERE id_review = $id");
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
?>
