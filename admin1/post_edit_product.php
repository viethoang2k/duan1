<?php 
	if ($_SERVER["REQUEST_METHOD"] != "POST") {
		header('location: list_product.php');
		die;
	}

	$id = $_GET['id'];
	$name = $_POST['Name'];
	$sku = $_POST['Sku'];
	$cate_id = $_POST['Categories'];
	$price = $_POST['Price'];
	$sale_price = $_POST['Sale_price'];
	$detail = $_POST['Detail'];
	$stock_up = $_POST['Stock_up'];
	$status = $_POST['Status'];
	$file = $_FILES['Image'];

	$updateUserQuery = "UPDATE products set
							name = '$name',
							sku = '$sku',
							cate_id = '$cate_id',

							price = '$price',
							sale_price = '$sale_price',
							stock_up = '$stock_up',
							
							detail = '$detail',
							status = '$status'
							";
 	if ($file['size'] > 0) {
 		$image .=  $file['name'];
		move_uploaded_file($file['tmp_name'], "img/product/" . $image);
		$feature_image = "img/product/" . $image;
 		$updateUserQuery .= ", feature_image = '$feature_image'";
 	}
 	$updateUserQuery .= "where id = $id";

 	$host = "localhost";//127.0.0.1
	$dbname = "duan1";
	$dbusername = "root";
	$dbpass = "";

	$conn = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $dbusername, $dbpass);
	//nạp câu truy vấn
	$stmt = $conn->prepare($updateUserQuery);
	//thực thi truy vấn cới csdl
	$stmt->execute();

	mysqli_query($link,$getHistory);

	header('location: list_product.php');

 ?>