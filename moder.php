<?php
include ("db.php");
$iditem = $_COOKIE["iditem"];
$id=$_COOKIE["id"];

if (isset($_POST['del'])) {
    unset($_POST['del']);
    
  if (isset($_POST['idp'])) { $id_product = $_POST['idp']; if ($id_product == '') { unset($id_product);} } 

    $result1 = mysqli_query($db, "DELETE FROM products WHERE id_product = $id_product");
    
    session_start();
    $redicet = $_SERVER['HTTP_REFERER'];
        header("Location: $redicet");
                exit();
}

if (isset($_POST['add'])) {
    unset($_POST['add']);
  
    session_start();
    header("Location: addproduct.php");
    exit();
}
  

?>
