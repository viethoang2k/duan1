<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
  //session_start();
include 'connect.php';
?>

<?php
if(isset($_POST['Save'])){
  $id = $_GET['id'];
  $fullname = $_POST['Fullname'];
  $username = $_POST['Username'];
  $email = $_POST['Email'];
  $password=password_hash($_POST['Password'], PASSWORD_DEFAULT);
  $role = $_POST['Role'];

  $sql = "SELECT username FROM users WHERE username = '$username'";
  $result = mysqli_query($link, $sql);

  // print_r($result);die;

  $count = $result -> num_rows;
  if($count == 0){
      // them vao csdl
    $sql = "INSERT INTO users(fullname,username,email, password, role_id) VALUES ('$fullname', '$username', '$email', '$password', '$role')";

    mysqli_query($link, $sql);

    header('Location: list_admin.php');
  }
  else{
    $user_error = "Tên đăng nhập đã tồn tại";
    // hien thong bao lai thÃ´ng tin da nhap
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
     DANH SÁCH ADMIN

   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Danh sách Admin</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Thêm mới Admin</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

         <form role="form" method="Post" action="admin_new.php">
          <div class="box-body">
            <div class="form-group">
              <label for="Fullname">Tên đầy đủ</label>
              <input class="form-control" id="Fullname" placeholder="Fullname " type="text" name="Fullname">
            </div>
            <div class="form-group">
              <label for="Username">Tên đăng nhập<?php if(isset($user_error)) echo '<span style="color:red;">&nbsp;&nbsp;'.$user_error.'</span>'; ?></label>
              <input class="form-control" id="Username" placeholder="Username " type="text" name="Username" required="required">
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input class="form-control" id="Email" placeholder="Email " type="email" name="Email">
            </div>
            <div class="form-group">
              <label for="Password">Mật khẩu</label>
              <input class="form-control" id="Password" placeholder="Password" type="password" name="Password">
            </div>
            <div class="form-group">
              <label>Phân Quyền</label>
              <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Role">
                <!-- <option <?php if($role == 1) echo "selected"; ?> value="1">Khách hàng</option> -->
                <option <?php if($role == 0) echo "selected"; ?> value="0">Admin</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" name="Save" value="Submit" class="btn btn-primary">
            <!-- <button type="submit" class="btn btn-primary" >Lưu</button> -->
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

