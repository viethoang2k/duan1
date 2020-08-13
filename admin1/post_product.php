<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
include 'include/check_login.php';
?>
<?php 
  //truy van danh muc san pham
$sqlDm = "SELECT * FROM categories WHERE id > 0";
$resultDm = mysqli_query($link,$sqlDm);
  //truy van hang san xuat
$sqlSx = "SELECT * FROM manufacturer";
$resultSx = mysqli_query($link,$sqlSx);

  // them san pham
if(isset($_POST['Submit']))
{
  $name = $_POST['name'];
  $sku = $_POST['sku'];
  $cate_id = $_POST['cate_id'];
  $disabled_comment = $_POST['disabled_comment'];
  $price = $_POST['price'];
  $sale_price = $_POST['sale_price'];
  $detail = $_POST['detail'];
  $view_count = $_POST['view_count'];
  $stock_up = $_POST['stock_up'];
  $status = $_POST['status'];
  $rating = $_POST['rating'];
  // $manufacturer_id = $_POST['Manufacturer_id'];

  $feature_image = $_FILES['feature_image']['name'];
  $Tmp = $_FILES['feature_image']['tmp_name'];

  $sql = "SELECT * FROM products WHERE name = $name";
  $result = mysqli_query($link,$sql);

  $count = $result -> num_rows;
  if($count == 0){
    $feature_image .=  $file['name'];
    move_uploaded_file($Tmp, "./product/" . $feature_image);
    $feature_image = "img/product/" . $feature_image;

    $sql = "INSERT INTO products(name,sku,cate_id,disabled_comment,price,sale_price,detail,feature_image,view_count,stock_up,status,rating)  VALUES ('$name','$sku','$cate_id','$disabled_comment','$price','$sale_price','$detail','$feature_image','$view_count','$stock_up','$status','$rating')";

    mysqli_query($link,$sql);
      //luu lai lich su hoat dong cua session
        // khong duoc chua 2 dấu nháy đơn lồng nhau;
      // $date = gmdate("d/m/Y H:i A", $row['date'] + 7*3600);
    header('location: list_product.php');

    
  }
  else{
    $product_error = "Tên sản phẩm đã tồn tại";
  }
}
?>