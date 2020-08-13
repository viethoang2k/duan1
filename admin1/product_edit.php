<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
include 'include/check_login.php';
?>


<?php 
  $id = $_GET['id'];
  $getUserByIdQuery = "select * from products where id = $id";

  $host = "localhost";//127.0.0.1
  $dbname = "duan1";
  $dbusername = "root";
  $dbpass = "";

  $conn = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $dbusername, $dbpass);
  //nạp câu truy vấn
  $stmt = $conn->prepare($getUserByIdQuery);
  //thực thi truy vấn cới csdl
  $stmt->execute();

  $product = $stmt->fetch();
?>

<?php 
  $sqlDm = "SELECT * FROM categories WHERE id > 0";
  $resultDm = mysqli_query($link,$sqlDm);
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
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Sửa sản phẩm</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Sửa sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

         <form role="form" method="POST" action="post_edit_product.php?id=<?php echo $product['id']; ?>" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Tên sản phẩm </label>
              <input class="form-control" id="name" placeholder="Tên sản phẩm " type="text" name="Name"  value="<?php echo $product['name'] ?>">
            </div>

            <div class="form-group">
              <label for="name">Mã sản phẩm</label>
              <input class="form-control" id="name" placeholder="Mã sản phẩm " type="text" name="Sku"  value="<?php echo $product['sku'] ?>">
            </div>
            
            

            <div class="form-group">
              <label>Danh mục</label>
              <select name="cate_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Categories">
                <?php 
                while($rowDm = mysqli_fetch_assoc($resultDm)){

                 ?>
                 <option class="form-control" id="name" placeholder="Cate_id " type="text" name="Cate_id"  value="1"><?php echo $rowDm['name']; ?></option>
                 <?php 
               }
               ?>
              </select>
            </div>

            
            <div class="form-group">
              <label for="name">Giá gốc</label>
              <input class="form-control" id="name" placeholder="Giá gốc " type="text" name="Price"  value="<?php echo $product['price'] ?>">
            </div>

            <div class="form-group">
              <label for="name">Khuyến mãi</label>
              <input class="form-control" id="name" placeholder="Khuyến mãi " type="text" name="Sale_price"  value="<?php echo $product['sale_price'] ?>">
            </div>

            <div class="form-group">
              <label for="name">Thông tin sản phẩm</label>
              <textarea placeholder="Thông tin sản phẩm" id="editor1" rows="10" cols="80" name="Detail" ><?php echo $product['detail'] ?>
            </textarea>
          </div>
         
          <div class="form-group">
            <label for="exampleInputFile">Ảnh đại diện</label>
            <input id="exampleInputFile" type="file" name="Image">
            <img width="150px" src="../<?php echo $product['feature_image'] ?>">
            <p class="help-block">Kích thước ảnh là 500x500px sẽ hiển thị đẹp nhất</p>
          </div>

          <div class="form-group">
            <label>Tình trạng hàng</label>
            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Stock_up">
              <option value="1" <?php if ($product['stock_up']==1) {echo "selected";}?>>Còn hàng</option>
              <option value="0" <?php if ($product['stock_up']==0) {echo "selected";}?>>Không còn hàng</option>
            </select>

          </div>
          
          <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Status">
              <option value="1" <?php if ($product['status']==1) {echo "selected";}?>>Hiển thị</option>
              <option value="0" <?php if ($product['status']==0) {echo "selected";}?>>Không hiển thị</option>

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
