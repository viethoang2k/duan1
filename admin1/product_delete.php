<?php
include 'connect.php';
include 'include/check_login.php';
if($_SESSION['Role'] >= 2){
  header('location: role_error.php');
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM products WHERE id =$id";
	mysqli_query($link,$sql);

	header('location: list_product.php');
}
?>