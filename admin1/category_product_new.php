<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
?>
<?php
$sqlDm = "SELECT * FROM categories WHERE id";
$resultDm = mysqli_query($link,$sqlDm);


if(isset($_POST['save'])){
    $name = $_POST['Name']; // ten danh muc
    // $sort_order = $_POST['Sort_order']; //vị trí
    $status = $_POST['Status'];

    $sql = "SELECT * FROM categories WHERE name = '$name'";
    $result = mysqli_query($link,$sql);
    
    // print_r($result);die;

    $count = $result -> num_rows;
    if($count == 0){
      $sql = "INSERT INTO categories(name,status) VALUES ('$name','$status')";

      mysqli_query($link, $sql);
      //
      header('Location: list_category_product.php');
    }
    else{
      $category_error = "Tên danh mục đã tồn tại";
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
       DANH MỤC SẢN PHẨM

     </h1>
     <ol class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li><a href="#">Danh mục sản phẩm</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Thêm mới danh mục sản phẩm</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

           <form role="form" method="POST" action="category_product_new.php">
            <div class="box-body">
              <div class="form-group">
                <label for="catname">Tên danh mục <?php if(isset($category_error)) echo '<span style="color: red;">&nbsp; &nbsp;'.$category_error.'</span>'; ?></label>
                <input class="form-control" id="catname" placeholder="Tên danh mục " type="text" name="Name" required="required" value="<?php if(isset($name)) echo $name; ?>">
              </div>
              
              <!-- <div class="form-group">
                <label for="description">Mô tả </label>
                <textarea class="form-control" id="description" placeholder="Mô tả " type="text" name="description" required="required" value="<?php if(isset($description)) echo $description; ?>"></textarea>
              </div> -->

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

