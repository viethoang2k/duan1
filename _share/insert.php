<?php
session_start();
require_once '../commons/constants.php';
require_once '../commons/connect.php';
$user = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$cart = isset($_SESSION[CART]) ? $_SESSION[CART] : [];
?>

<?php
if($action="insert")
{
  $hoten=$user['fullname'];
  $dienthoai=$_POST['dienthoai'];
  $diachi=$_POST['diachi'];
  $email=$_POST['email'];
  $phuongthuc=$_POST['phuongthuc'];
  $ngay=date('Y-m-d');
  if(isset($user['id'])){   
    $sql=mysqli_query($link,"select * from users where id ='".$user['id']."'");
    $row=mysqli_fetch_array($sql);      
    $idnd=$row['id']; 
    $sql="INSERT INTO hoadon(idnd,hoten,diachi,dienthoai,email,ngaydathang,trangthai) VALUES ('$idnd','$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
  }
  else $sql="INSERT INTO hoadon(hoten,diachi,dienthoai,email,ngaydathang,trangthai) VALUES ('$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
  mysqli_query($link,$sql); 
    $mahd=mysqli_insert_id($link);   //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
  
  

  foreach($cart as $item )  //lần lượt lấy các thông tin về mặt hàng trong giỏ
            {
            
               $idsp=$item['id'];
              $quantity = $item['quantity'];
               $gia=$item['sale_price']*$item['quantity'];
        
               $sql1 ="insert into chitiethoadon(mahd,idsp,Soluong,gia,phuongthucthanhtoan) values('$mahd','$idsp','$quantity','$gia','$phuongthuc')";
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
?>

