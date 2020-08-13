<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
?>
<!-- <?php 
$sqlDm = "SELECT * FROM users WHERE id";
$resultDm = mysqli_query($link,$sqlDm);

?> -->
<?php 
  $id = $_GET['id'];
  $getUserByIdQuery = "SELECT * from users where id = $id";

  $host = "localhost";//127.0.0.1
  $dbname = "duan1";
  $dbusername = "root";
  $dbpass = "";

  $conn = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $dbusername, $dbpass);
  //nạp câu truy vấn
  $stmt = $conn->prepare($getUserByIdQuery);
  //thực thi truy vấn cới csdl
  $stmt->execute();

  $user = $stmt->fetch();
 ?>

<?php
include 'include/header.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'include/aside.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sửa thành viên
      
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li><a href="#">Sửa thành viên</a></li>
      
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sửa Admin</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

           <form role="form" method="post" action="post_admin_edit.php?id=<?php echo $user['id']; ?>">
            <div class="box-body">
              <div class="form-group">
                <label for="username">Fullname </label>
                <input class="form-control" id="Fullname" placeholder="Fullname" type="text" name="Fullname" value="<?php echo $user['fullname'] ?>">
              </div>

              <div class="form-group">
                <label for="username">Username <?php if(isset($user_error)){echo $user_error;}?></label>
                <input class="form-control" id="username" placeholder="Username" type="text" name="Username" required="required" value="<?php echo $user['username'] ?>">
              </div>

              <div class="form-group">
                <label for="Email">Email <?php if(isset($user_error)){echo $user_error;}?></label>
                <input class="form-control" id="Email" placeholder="Email" type="email" name="Email" value="<?php echo $user['email'] ?>">
              </div>
              
              <div class="form-group">
                
                <label>Phân Quyền</label>
                <select class="form-control select2 select2-hidden-accessible"  tabindex="-1" aria-hidden="true" name="Role_id">
                  <option <?php if($user == 0) echo "selected"; ?> value="0">Admin</option>
               </select>
             </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <input type="submit" name="save" value="Lưu" class="btn btn-primary">
            
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
<?php include 'include/footer.php';?>