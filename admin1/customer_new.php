<?php 
// error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
?>
<?php 
  // them san pham
if(isset($_POST['Save']))
{
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $phone = $_POST['Phone'];
  $status = $_POST['Status'];

  $sql = "SELECT * FROM customer WHERE Name_customer = ".$name;
  $result = mysqli_query($link,$sql);

  $count = $result -> num_rows;
  if($count == 0){

    $sql = "INSERT INTO customer(Name_customer, Email, Phone, Status) VALUES ('$name', '$email', '$phone', '$Status')";

    mysqli_query($link,$sql);
      //
    $session = $_SESSION['Username'];
    $date = time();
    $sql2="INSERT INTO history(Username, Action, Timee) VALUES ('$session','Thêm mới Khách hàng: $Name_customer','$date')";
    mysqli_query($link,$sql2);
      //
    header('location: list_customer.php');
  }
  else{
    $customer_error = "Tên khách hàng đã tồn tại";
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
     THÊM KHÁCH HÀNG

   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Thêm khách hàng</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Thêm khách hàng</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

         <form role="form" method="POST" action="customer_edit.php?id=<?php echo $_GET['id']; ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="catname">Tên khách hàng<?php if(isset($customer_error)) echo '<span style="color: red;">&nbsp; &nbsp;'.$customer_error.'</span>'; ?></label>
              <input class="form-control" id="name" placeholder="Tên khách hàng " type="text" name="Name" value="<?php if(isset($name)) {echo $name;} ?>" required="required">
            </div>
            <div class="form-group">
              <label for="catname">Email</label>
              <input class="form-control" id="email" placeholder="Email" type="email" name="Email" value="<?php if(isset($email)) {echo $email;} ?>">
            </div>

            <div class="form-group">
              <label for="order">Phone</label>
              <input class="form-control" id="order" placeholder="Phone" type="number" name="Phone" required="required"  value="<?php if(isset($phone)) {echo $phone;} ?>">
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

