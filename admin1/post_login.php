<?php
session_start();
require_once"../commons/db.php";
require_once"../commons/constants.php";
require_once"../commons/helpers.php";
  $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    if($username != "" && $password != ""){
      // lấy dữ liệu từ csdl bảng users dựa vào email
      $sqlUserQuery = "SELECT * FROM users WHERE username = '$username'";
      $user = executeQuery($sqlUserQuery);
        //dv($user); die();
      if($user && password_verify($password, $user['password'])){
        $_SESSION[AUTH] = [
          "id" => $user['id'],
          "username" => $user['username'],
          "fullname" => $user['fullname'],
          "email" => $user['email'],
          "role_id" => $user['role_id']
        ];
            if (isset($_POST['adm'])) {
                header("location:".BASE_URL."/admin1/index.php");
            }
        echo 'true';
        die;
      }
    }
    if (isset($_POST['adm'])) {
        header("location:".BASE_URL."/admin1/");
    }
    echo "false";
    die;

    ?>