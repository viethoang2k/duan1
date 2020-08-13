<?php 
  	session_start();
    require_once '../commons/constants.php';
    require_once '../commons/db.php';
    require_once '../commons/helpers.php';
    $user_login = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
    $id_user = $user_login['id'];
    $sqlUserQuery = "select * from users where id = '$id_user'";
    $user = executeQuery($sqlUserQuery, false);
     if ($user == '' | $user['role_id'] == '1') {
         header('location: ' . BASE_URL . '');
            die;
     }

?>	