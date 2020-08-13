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
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     CHI TIẾT ĐƠN HÀNG

   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Chi tiết đơn hàng</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Chi tiết đơn hàng</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- <a href="order_new.php" role="button" class="btn btn-danger btn-md">Thêm mới đơn hàng</a> -->
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <td>Mã HD</td>
                <td>Tên sản phẩm</td>
                <td>Số lượng</td>
                <td>Giá</td>
                <td>Thành tiền</td>
              </tr>
            </thead>
            <tbody>
              <?php 

              $id = $_GET['id'];

              
              $sql = "SELECT * FROM order_detail
              INNER JOIN products
              ON products.id = order_detail.id_product 
              where order_detail.id_order = $id ";


              $Stt = 1;
              $result = mysqli_query($link,$sql);

              while($row = mysqli_fetch_assoc($result)){
                $thanhtien=$row['sale_price']*$row['quantity_product'];
                
                ?>
                <tr>
                 <td class="masp_hienthi_sp"><?php  echo $row['id_order'] ?></td>
                 <td class="stt_hienthi_sp"><?php  echo $row['name'] ?></td>
                 <td class="sl_hienthi_sp"><?php echo $row['quantity_product'] ?></td>
                 <td class="sl_hienthi_sp"><?php echo number_format($row['sale_price'],0,",",".") ?></td>
                 <td class="sl_hienthi_sp"><?php echo number_format($thanhtien,0,",",".") ?></td>
                 <td> 
                  <a onclick=" return Delete();" href="order_delete.php?id=<?php echo $row['Order_id']; ?>">Xóa</a></td>
                </tr>
                <?php 
              }
              ?>
            </tbody>
            <tr>
             
            </table>
            <div id="inhoadon">
              <p style="float:right; margin-top:10px; padding-right:30px;"><a href="inhd.php?mahd=<?=$_GET['mahd']?>" target="_blank">In hoá đơn</a></p>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'include/footer.php';
?>

