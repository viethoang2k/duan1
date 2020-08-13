<?php 
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

if($username != "" && $password != ""){
    	// lấy dữ liệu từ csdl bảng users dựa vào email
   $sqlUserQuery = "select * from users where username = '$username'";
   $user = executeQuery($sqlUserQuery, false);
   if($user && password_verify($password, $user['password'])){
      $_SESSION[AUTH] = [
         "id" => $user['id'],
         "email" => $user['email'],
         "fullname" => $user['fullname'],
         "username" => $user['username'],
         "role_id" => $user['role_id']
     ];
     header('location: ' . BASE_URL);
     die;
 }
}
header('location: ' . BASE_URL . 'login.php?msg=Name / Mật khẩu không đúng');
die;
?>