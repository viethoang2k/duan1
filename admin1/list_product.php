<script type="text/javascript">
  function Delete(){
    var conf = confirm('Xác nhận xóa');
    return conf;
  }
</script>
<?php
include 'connect.php';
include 'include/check_login.php';

$sql = "select * from products inner join categories on products.cate_id=categories.id  "; 
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlSp = "SELECT * from products ";
$stmt = $conn->prepare($sqlSp);
$stmt->execute();
$resultSp = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
     DANH SÁCH SẢN PHẨM

   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Danh sách sản phẩm</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="product_new.php" role="button" class="btn btn-danger btn-md">Thêm mới Sản Phẩm</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Stt</th>
               
                <th>Mã sản phẩm</th>
                <th>Tên danh mục</th>
                <!-- <th>Tên hãng sản xuất</th> -->
                <th>Giá sản phẩm(gốc)</th>
                <th>Sale</th>
                <th>Ảnh đại diện</th>         
                <th>Lượng xem</th>    
                <th>Tình trạng hàng</th>
                <th>Trạng thái</th>
                <th>Rate</th>   
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $Stt = 1;
                foreach ($result as $r) {
                 

                  ?>
                  <tr>
                    <td><?=$Stt++; ?></td>  
                                    
                    <td><?=$r['sku'] ?></td>
                    <td>
                      <?=$r['name'] ?>
                    </td>
                    <td><?=number_format($r['price']) . "đ" ?></td>
                    <td><?=number_format($r['sale_price']) . "đ" ?></td>
                    <td><img width="100px" max-height="150px" src="../<?php echo $r['feature_image']; ?>"></td>
                    <td><?=$r['view_count'] ?></td>
                    <td><?php if($r['stock_up'] >= 1) {echo 'Còn hàng';} elseif($r['stock_up'] == 0) {echo 'Không còn hàng';}?></td>                
                    <td><?php if($r['status'] == 1) {echo 'Hiển thị';} else {echo 'Không hiển thị';}?></td>                
                    <td><?=$r['rating'] ?></td>
                    <td><a href="product_edit.php?id=<?php echo $r['id']; ?>">Sửa</a>  |  
                      <a onclick="return Delete();" href="product_delete.php?id=<?php echo $r['id']; ?>">Xóa</a></td>
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

