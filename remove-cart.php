<?php 
	session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $url = isset($_GET['url']) ? $_GET['url'] : "";

   
    $cart = isset($_SESSION[CART]) ? $_SESSION[CART] : null;
        foreach ($cart as $key => $item) {
        	if ($item['id']  == $id) {
            	unset($_SESSION[CART][$key]);
            	header('location: ' . $url);
    			die;
            }
        }
    
?>