<?php 
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
  include 'connect.php';
 ?>
 <?php 
  // them san pham
  if(isset($_POST['Submit']))
  {
    $title = $_POST['title'];

    // $image = $_FILES['image']['name'];
    $file = $_FILES['image'];
    // $Tmp = $_FILES['image']['tmp_name'];

    $sort = $_POST['sort'];
    $status = $_POST['status'];

    $sql = "SELECT * FROM sliders WHERE id = $id";
    $result = mysqli_query($link,$sql);

    $count = $result -> num_rows;
    // $Tmpname = "";
    if($count == 0){
      $image = uniqid() . $file['image'];
      move_uploaded_file($file['tmp_name'], "image_slide/" . $image);
      $image = "image_slide/" . $image;

      $sql = "INSERT INTO sliders(title, image, sort, status) VALUES ('$title', '$image', '$sort', '$status')";

      mysqli_query($link,$sql);
      //
      header('location: list_slide.php');
    }
    else{
      $advertise_error = "Tên slide đã tồn tại";
    }
  }
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
              
             <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                <label for="advertise_name">Tên slide<?php if(isset($advertise_error)) echo '<span style="color: red;">&nbsp; &nbsp;'.$advertise_error.'</span>'; ?></label>
                <input class="form-control" id="advertise_name" placeholder="Tên slide " type="text" name="title"  value="<?php if(isset($title)) echo $title; ?>">
              </div>

              <div class="form-group">
                  <label for="exampleInputFile">Ảnh</label>
                  <input id="exampleInputFile" type="file" name="image">
                  <p class="help-block">Kích thước ảnh là 500x500px sẽ hiển thị đẹp nhất</p>
                </div>

                <div class="form-group">
                  <label for="advertise_name">Vị trí</label>
                  <input class="form-control" id="advertise_name" placeholder="Vị trí" type="text" name="sort"  value="<?php if(isset($sort)) echo $sort; ?>">
                </div>

                <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="status">
                  <option <?php if($status == 1) {echo 'selected="selected"';} ?> value="1">Hiển thị</option>
                  <option <?php if($status == 0) {echo 'selected="selected"';} ?> value="0">Không hiển thị</option>
                </select>
              </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="Submit" value="Submit" class="btn btn-primary">
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

