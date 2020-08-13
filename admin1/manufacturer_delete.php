<?php  
require_once 'connect.php';
$id = $_GET['id'];
$sql = "delete from manufacturers where id='$id'";

//Thực thi
$stmt = $conn->prepare($sql);
$stmt->execute();

header('location: list_manufacturer.php');
?>