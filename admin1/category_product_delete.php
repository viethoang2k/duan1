<?php 
require_once 'connect.php';
$id = $_GET['id'];
$sql = "delete from categories where id='$id'";

//Thực thi
$stmt = $conn->prepare($sql);
$stmt->execute();
 $sql= "delete from products where cate_id = '$id'";
 $deletePro=  $conn->prepare($sql);
 $deletePro->execute();
	header('location: list_category_product.php');
?>
