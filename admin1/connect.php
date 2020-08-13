<?php 

	$link = mysqli_connect("localhost","root","","duan1") or die ('Không thể kết nối tới database');
	$link -> query("SET NAME 'utf8' COLLATE 'utf8_unicode_ci'");

	$dsn = "mysql:host=localhost; dbname=duan1; charset=utf8";
	$user = "root";
	$pass = "";

	try{
		$conn = new PDO($dsn, $user, $pass);
	}catch (PDOException $e){
		throw $e;
	}
	
?>
