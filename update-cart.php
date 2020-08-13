<?php 
	session_start();
	require_once './commons/helpers.php';
	require_once './commons/constants.php';
	require_once './commons/db.php';

	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$url = isset($_GET['url']) ? $_GET['url'] : "";
	

	if (isset($_POST['increase'])) {
		
		//lấy kết quả từ form data được gửi bởi cả 2 phương thức GET và POST
		extract($_REQUEST);
		
		// Kiểm tram giá trị quantity
		if ($quantity > 0 && $quantity != '' && is_numeric($quantity)) {
			if(isset($_SESSION[CART])){
		        $cart = $_SESSION[CART];
		        foreach ($cart as $key => $item) {
		        	// Tìm sản phẩm theo id
		        	if ($item['id']  == $id) {
		        		// Lấy được sản phẩm quantity +1
		        		$quantity ++;
		            	$item['quantity'] = $quantity;
		            	// Update mảng mới của id được chọn
		            	$_SESSION[CART][$key] = $item;
		         		header('location: ' . $url);
   						die;	
		            }
		        }
		    }
		}else{
			header('location: ' . $url);
    		die;
		}
	}

	if (isset($_POST['reduction'])) {
		extract($_REQUEST);
		
		// Kiểm tram giá trị quantity
		if ($quantity > 1 && $quantity != '' && is_numeric($quantity)) {
			if(isset($_SESSION[CART])){
		        $cart = $_SESSION[CART];
		        foreach ($cart as $key => $item) {
		        	// Tìm sản phẩm theo id
		        	if ($item['id']  == $id) {
		        		// Lấy được sản phẩm quantity -1
		        		$quantity --;
		            	$item['quantity'] = $quantity;
		            	// Update mảng mới của id được chọn
		            	$_SESSION[CART][$key] = $item;
		         		header('location: ' . $url);
   						die;	
		            }
		        }
		    }
		}else{
			header('location: ' . $url);
    		die;
		}
	}



	
?>