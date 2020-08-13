<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
?>
<?php 
  $id = $_GET['id'];
  $getUserByIdQuery = "select * from sliders where id = $id";

  $host = "localhost";//127.0.0.1
  $dbname = "duan1";
  $dbusername = "root";
  $dbpass = "";

  $conn = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $dbusername, $dbpass);
  //nạp câu truy vấn
  $stmt = $conn->prepare($getUserByIdQuery);
  //thực thi truy vấn cới csdl
  $stmt->execute();

  $slide = $stmt->fetch();
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
     DANH MỤC SLIDE
     
   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Danh mục slide</a></li>
    
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Thêm mới slide</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
         <form role="form" method="POST" enctype="multipart/form-data" action="post_slide.php?id=<?php echo $slide['id']; ?>" >
          <div class="box-body">
            <div class="form-group">
              <label for="advertise_name">Tên slide</label>
              <input class="form-control" id="advertise_name" placeholder="Tên slide" type="text" name="Title"  value="<?php echo $slide['title'] ?>">
            </div>
            

            <div class="form-group">
              <label for="exampleInputFile">Ảnh</label>
              <input id="exampleInputFile" type="file" name="Image">
              <img width="200px" max-height="250px" src="./<?php echo $slide['image'] ?>" >
              <p class="help-block">Kích thước ảnh là 500x500px sẽ hiển thị đẹp nhất</p>
            </div>

            <div class="form-group">
              <label for="advertise_name">Vị trí</label>
              <input class="form-control" id="advertise_name" placeholder="Vị trí" type="text" name="Sort"  value="<?php echo $slide['sort'] ?>">
            </div>

            <div class="form-group">
              <label>Trạng thái</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Status">
                <option value="1" <?php if ($slide['status']==1) {echo "selected";}?>>Hiển thị</option>
                <option value="0" <?php if ($slide['status']==0) {echo "selected";}?>>Không hiển thị</option>
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

