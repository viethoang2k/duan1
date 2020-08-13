<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
include 'include/check_login.php';
?>

<?php 
  $sqlDm = "SELECT * FROM categories WHERE id > 0";
  $resultDm = mysqli_query($link,$sqlDm);

  $sqlSx = "SELECT * FROM manufacturers WHERE id > 0";
  $resultSx = mysqli_query($link,$sqlSx);
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
     THÊM SẢN PHẨM

   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Thêm sản phẩm</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Thêm mới sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

         <form role="form" method="POST" enctype="multipart/form-data" action="post_product.php">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Tên sản phẩm</label>
              <input class="form-control" id="name" placeholder="Tên sản phẩm " type="text" name="name" >
            </div>

            <div class="form-group">
              <label for="name">Mã sản phẩm <?php if(isset($product_error)) echo '<span style="color: red;">&nbsp; &nbsp;'.$product_error.'</span>'; ?></label>
              <input class="form-control" id="name" placeholder="Mã sản phẩm " type="text" name="sku" >
            </div>

            <!-- <div class="form-group">
              <label for="name">Cate_id</label>
              <input class="form-control" id="name" placeholder="Cate_id " type="text" name="cate_id"  value="<?php if(isset($cate_id)) echo $cate_id; ?>">
            </div> -->

            <div class="form-group">
              <label>Tên danh mục</label>
              <select name="cate_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories">
               <?php
            $show = mysqli_query($link,"SELECT * FROM categories ");
            while($show1 = mysqli_fetch_array($show))
            {
              $madm1 = $show1['id'];  
              $tendm1 = $show1['name'];
              echo "<option value='".$madm1."'>".$tendm1."</option>"; 
              
            }
                  ?>
              </select>
            </div>

            <!-- <div class="form-group">
              <label>Tên nhà sản xuất</label>
              <select name="cate_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Manufacturer_id">
                <?php 
                while($rowSx = mysqli_fetch_assoc($resultSx)){

                 ?>
                 <option value="<?php echo $manufacturer_id; ?>"><?php echo $rowSx['name_manufacturer']; ?></option>
                 <?php 
               }
               ?>
              </select>
            </div> -->

            <div class="form-group">
              <label for="name">Giá gốc</label>
              <input class="form-control" id="name" placeholder="Giá gốc " type="text" name="price" >
            </div>

            <div class="form-group">
              <label for="name">Khuyến mãi</label>
              <input class="form-control" id="name" placeholder="Khuyến mãi " type="text" name="sale_price" >
            </div>

            <div class="form-group">
              <label for="name">Thông tin sản phẩm</label>

              <textarea placeholder="Thông tin sản phẩm" id="editor1" rows="10" cols="80" name="detail">
                Please enter product information here.
              </textarea>
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Ảnh đại diện</label>
              <input id="exampleInputFile" type="file" name="feature_image">
              <p class="help-block">Kích thước ảnh là 500x500px sẽ hiển thị đẹp nhất</p>
            </div>

            

        
        <div class="form-group">
          <label>Tình trạng hàng</label>
          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="stock_up">
            <option <?php if($product == 1) {echo "selected";} ?> value="1">Còn hàng</option>
            <option <?php if($product == 0) {echo "selected";} ?> value="0">Không còn hàng</option>
          </select>

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
      <input type="submit" name="Submit" id="Submit" value="Submit" class="btn btn-primary">
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

