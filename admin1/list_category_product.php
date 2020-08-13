<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';

$sql = "SELECT * from categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

 ?>


<script type="text/javascript">
  function Delete(){
    var conf = confirm('Xác nhận xóa!');
    return conf;
  }
</script>
<?php
include 'connect.php';
  include 'include/check_login.php';
header("Content-type: text/html; charset=utf-8");

?>
<?php
include 'include/header.php';
include 'include/aside.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     DANH MỤC SẢN PHẨM
     
   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Danh mục sản phẩm</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh mục sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="category_product_new.php" role="button" class="btn btn-danger btn-md">Thêm mới danh mục sản phẩm</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Stt</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php
                      //Đổ dữ liệu
              $stt = 1;
              foreach ($result as $r) {
                ?>
                <tr>
                  <td><?php echo $stt++; ?></td>
                  <td><?=$r['name']?></td>
                    <td><?php if($r['status'] == 1) {echo 'Hiển thị';} else {echo 'Không hiển thị';}?></td> 
                  <td><a href="category_product_edit.php?id=<?php echo $r['id']; ?>">Sửa</a>  | 
                   <a onclick="return Delete();" href="category_product_delete.php?id=<?php echo $r['id']; ?>">Xóa</a></td>
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
  <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'include/footer.php';
?>

