<script type="text/javascript">
  function Delete(){
    var conf = confirm('Xác nhận xóa!');
    return conf;
  }
</script>
<?php
include 'connect.php';
?>

<?php
include 'connect.php';
include 'include/check_login.php';

$sqlAdmin = "SELECT * from users where role_id=0";
$stmt = $conn->prepare($sqlAdmin);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- Left side column. contains the logo and sidebar -->
<?php
include 'include/header.php';
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
    <li><a href="#">Danh sách Admin </a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách Admin</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="admin_new.php" role="button" class="btn btn-danger btn-md">Thêm mới User</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Stt</th>
                <th>Tên đầy đủ</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Phân quyền</th>
                <th>Hành động</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                $Stt = 1;
                foreach ($result as $r) {
                  ?>
                  <tr>
                    <td><?=$Stt++; ?></td>                  
                    <td><?=$r['fullname'] ?></td>                 
                    <td><?=$r['username'] ?></td> 
                    <td><?=$r['email'] ?></td> 
                    <td>
                        <?php if($r['role_id'] == 0) {echo 'Admin';}?>
                    </td>
                    <td><a href="admin_edit.php?id=<?php echo $r['id']; ?>">Sửa</a>  |  
                      <a onclick="return Delete();" href="admin_delete.php?id=<?php echo $r['id']; ?>">Xóa</a>
                    </td>
                  </tr>
                  <?php
                } 
              ?>
            </tbody>

            </table>
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