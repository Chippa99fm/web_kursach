<?php
session_start();
if (isset($_POST['id'])) { $id = $_POST['id']; if ($id == '') { unset($id);} }


include ("db.php");

$result = mysqli_query($db, "DELETE FROM user_products WHERE id_products = $id");
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
?>
