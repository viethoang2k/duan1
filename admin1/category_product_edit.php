<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
?>
<?php 
$sqlDm = "SELECT * FROM categories WHERE id";
$resultDm = mysqli_query($link,$sqlDm);

?>
<?php 
   $id = $_GET['id'];
  $getUserByIdQuery = "SELECT * from categories where id = $id";

  $host = "localhost";//127.0.0.1
  $dbname = "duan1";
  $dbusername = "root";
  $dbpass = "";

  $conn = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $dbusername, $dbpass);
  //nạp câu truy vấn
  $stmt = $conn->prepare($getUserByIdQuery);
  //thực thi truy vấn cới csdl
  $stmt->execute();

  $category = $stmt->fetch();
 ?>


<?php
include 'include/header.php';
?>
<!-- Left side column. contains the logo and sidebar -->
<?php
include 'include/aside.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     SỬA DANH MỤC SẢN PHẨM

   </h1>
   <ol class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Sửa danh mục sản phẩm</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Sửa danh mục sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

         <form role="form" method="POST" enctype="multipart/form-data" action="post_categories.php?id=<?php echo $category['id']; ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="advertise_name">Tên sản phẩm</label>
              <input class="form-control" id="advertise_name" placeholder="Tên sản phẩm" type="text" name="Name" required="required" value="<?php echo $category['name'] ?>">
            </div>
            
            <div class="form-group">
              <label>Trạng thái</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Status">
                <option <?php if ($category['status']==1) {echo "selected";}?> value="1">Hiển thị</option>
                <option <?php if ($category['status']==0) {echo "selected";}?> value="0">Không hiển thị</option>
              </select>
            </div>


        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <input type="submit" name="save" value="Submit" class="btn btn-primary">
          <!--  <button type="submit" class="btn btn-primary">Lưu</button> -->
        </div>
      </form>
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

