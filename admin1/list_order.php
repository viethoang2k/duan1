<script type="text/javascript">
  function Delete(){
    var conf = confirm('Xác nhận xóa');
    return conf;
  }
</script>
<?php
include 'connect.php';
include 'include/check_login.php';

?>
<!-- Left side column. contains the logo and sidebar -->
<?php
include 'include/header.php';
include 'include/aside.php';

$sqlOder = "SELECT * from orders";
$stmt = $conn->prepare($sqlOder);
$stmt->execute();
$resultOder = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     DANH SÁCH ĐƠN HÀNG

   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Danh sách đơn hàng</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách đơn hàng</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- <a href="order_new.php" role="button" class="btn btn-danger btn-md">Thêm mới đơn hàng</a> -->
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
               <td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
               <td>Mã HD</td>
               <td>Họ Tên</td>
               <td>Địa Chỉ</td>
               <td>Điện Thoại</td>
               <td>Email</td>
               <td>Trạng thái</td>
               <th>Hành động</th>
             </tr>
           </thead>
           <tbody>
            <?php 
            $Stt = 1;
            foreach ($resultOder as $asOrder) {
              ?>
              <tr>
               <td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$asOrder['id']?>"/></td>
               <td class="masp_hienthi_sp"><?php  echo $asOrder['id'] ?></td>
               <td class="stt_hienthi_sp"><?php echo $asOrder['name'] ?></td>
               <td class="sl_hienthi_sp"><?php echo $asOrder['address'] ?></td>
               <td class="sl_hienthi_sp">0<?php echo $asOrder['phone_number'] ?></td>
               <td class="sl_hienthi_sp"><?php echo $asOrder['email'] ?></td>
               <td class="sl_hienthi_sp"><?php if($asOrder['status']==1) echo "Đang xử lý"; else if($asOrder['status']==2) echo"Đã giao hàng"; else echo"Đã hủy đơn hàng";?></td>
               <td><a href="list_order_detail.php?id=<?php echo $asOrder['id']; ?>">Chi tiết</a>  |
                <a onclick="return Delete();" name="xoa" href="order_delete.php?id=<?php echo $asOrder['id']; ?>">Xóa</a></td>
              </tr>
              <?php 
            }
            ?>
          </tbody>

        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.asOder -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'include/footer.php';
?>

