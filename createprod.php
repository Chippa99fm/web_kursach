<?php
include ("db.php");

if (isset($_POST['desc'])) { $desc = $_POST['desc']; if ($desc == '') { unset($desc);} } 
if (isset($_POST['producer'])) { $producer = $_POST['producer']; if ($producer == '') { unset($producer);} } 
if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } 
if (isset($_POST['price'])) { $price = $_POST['price']; if ($price == '') { unset($price);} } 
if (isset($_POST['images'])) { $images = $_POST['images']; if ($images == '') { unset($images);} } 
if (isset($_POST['params'])) { $params = $_POST['params']; if ($params == '') { unset($params);} } 
if (isset($_POST['cat'])) { $cat = $_POST['cat']; if ($cat == '') { unset($cat);} } 








$result = mysqli_query($db, "INSERT INTO products (description, id_categories, price, producer, product_name) 
VALUES ('$desc', $cat, $price, '$producer', '$name')");

$result1 = mysqli_query($db, "SELECT id_product FROM products ORDER BY id_product DESC LIMIT 1");
$mrw = mysqli_fetch_array($result1);
$id_product = $mrw['id_product'];

$del = ";";

$imgs = explode($del, $images);
 foreach ($imgs as $image) { 
    $result = mysqli_query($db, "INSERT INTO images (href, id_product) 
VALUES ('$image',$id_product)");
 }

$prms = explode($del, $params);
foreach ($prms as $paramfull) { 
    $param = explode("-", $paramfull);

    $result = mysqli_query($db, "INSERT INTO params (id_product, param_name, param_value)
VALUES ($id_product, '$param[0]', '$param[1]')");
 }



  
$redicet = $_SERVER['HTTP_REFERER'];
header("Location: $redicet");
exit();
  

?>