<?php
session_start();
require_once './commons/constants.php';
require_once './commons/connect.php';
$user = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$cart = isset($_SESSION[CART]) ? $_SESSION[CART] : [];
?>

<?php
if($action="insert")
{
  $hoten=$_POST['fullname'];
  $dienthoai=$_POST['dienthoai'];
  $diachi=$_POST['diachi'];
  $email=$_POST['email'];
  $phuongthuc=$_POST['phuongthuc'];
  $ngay=date('Y-m-d');
  if(isset($user['id'])){   
    $sql=mysqli_query($link,"select * from users where id ='".$user['id']."'");
    $row=mysqli_fetch_array($sql);      
    $idnd=$row['id']; 
    $sql="INSERT INTO orders(id_user,name,address,phone_number,email,order_date ,status) VALUES ('$idnd','$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
  }
  else $sql="INSERT INTO orders(name, address, phone_number, email, order_date, status) VALUES ('$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
  mysqli_query($link,$sql); 
    $mahd=mysqli_insert_id($link);   // Hàm mysqli_insert_id () trả về id (được tạo bằng AUTO_INCREMENT) được sử dụng trong truy vấn cuối cùng.


  foreach($cart as $item )  //lần lượt lấy các thông tin về mặt hàng trong giỏ
  {
    
    $idsp=$item['id'];
    $quantity = $item['quantity'];
    $gia=$item['sale_price']*$item['quantity'];
    $sql1 ="insert into order_detail(id_order, id_product, quantity_product, payment_price, payment_methods) values('$mahd','$idsp','$quantity','$gia','$phuongthuc')"; 
    mysqli_query($link,$sql1);          
  }


  unset($_SESSION[CART]);
  echo "
  <script language='javascript'>
  alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất');
  window.open('index.php','_self',3);
  </script>
  ";
}
