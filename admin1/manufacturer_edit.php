<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
  include 'include/check_login.php';
?>
<?php 
if(isset($_GET['id'])){
  $id  = $_GET['id'];
  $sql = "SELECT * FROM manufacturers WHERE id =".$id;
  $result = mysqli_query($link,$sql);
  while($row = mysqli_fetch_assoc($result)){
    $name = $row['name_manufacturer'];
    $status = $row['status'];
  }
}else{
  header('location: list_manufacturer.php');
}
?>
<?php  
if(isset($_POST['Save'])){
  $name = $_POST['Name'];
  $status = $_POST['Status'];
  $sql = "UPDATE manufacturers SET name_manufacturer = '$name', status='$status' WHERE id =".$id;
  mysqli_query($link,$sql);
      //
  header('location: list_manufacturer.php');
}?>

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
     SỬA HÃNG SẢN XUẤT

   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Sửa hãng sản xuất</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Sửa hãng sản xuất</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

         <form role="form" method="POST" action="manufacturer_edit.php?id=<?php echo $_GET['id']; ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="catname">Tên Hãng sản xuất</label>
              <input class="form-control" id="catname" placeholder="Tên hãng sản xuất " type="text" name="Name" value="<?php if(isset($name)) {echo $name;} ?>">
            </div>
            <div class="form-group">
              <label>Trạng thái</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Status">
                <option <?php if($status == 1) {echo 'selected="selected"';} ?> value="1">Hiển thị</option>
                <option <?php if($status == 0) {echo 'selected="selected"';} ?> value="0">Không hiển thị</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" name="Save" value="Submit" class="btn btn-primary">
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

