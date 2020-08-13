<?php 
ob_start();
include 'connect.php';
include 'include/check_login.php';
if($_SESSION['Role'] < 3){
	header('location: role_error.php');
}
if (isset($_GET['id'])){
	$id = $_GET['id'];
 //
	$sqlc = "SELECT * FROM customer INNER JOIN orderproduct ON customer.Customer_id = orderproduct.Customer_id WHERE customer.Customer_id =".$id;
	$resultc = mysqli_query($link,$sqlc);
	if($resultc -> num_rows > 0){		
	echo("<script>alert('Khách hàng có đơn hàng - Không được xóa');</script>");
 	echo("<script>window.location = 'list_customer.php';</script>");
}else{
 	//
	$sql = "DELETE FROM customer WHERE Customer_id =".$id;
	mysqli_query($link,$sql);
  	//
	$session = $_SESSION['Username'];
	$date = time();
	$sql2="INSERT INTO history(Username, Action, Timee) VALUES ('$session','Xóa Customer: $id','$date')";
	mysqli_query($link,$sql2);
    //
	header('location: list_customer.php');
	}
}
ob_flush();
?>