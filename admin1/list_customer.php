<script type="text/javascript">
  function Delete(){
    var conf = confirm('Xác nhận xóa!');
    return conf;
  }
</script>
<?php
include 'connect.php';
include 'include/check_login.php';
if($_SESSION['Role'] <= 2){
  header('location: role_error.php');
}
?>
<!-- Left side column. contains the logo and sidebar -->
<?php
include 'include/header.php';
include 'include/aside.php';

$sqlCustomer = "SELECT * From users";
$stmt = $conn -> prepare($sqlCustomer);
$stmt-> execute();
$customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     DANH SÁCH KHÁCH HÀNG
   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Danh sách khách hàng</a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách khách hàng</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="customer_new.php" role="button" class="btn btn-danger btn-md">Thêm mới khách hàng</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Stt</th>
                <th>Tên khách hàng</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Phân quyền</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                $stt = 1;
                foreach ($customer as $row) {
                    ?>
                    <tr>
                      <td><?php echo $stt++; ?></td>
                      <td><?php echo $row['fullname']; ?></td>
                      <td><?php echo $row['username']?></td>
                      <td><?php echo $row['email']?></td>
                      <td>
                        <?php if($row['role'] == 1) {echo 'Khách hàng';}
                              // elseif($row['role'] != 0){echo "Không Hiển thị";}?>
                      </td> 
                      <td><a href="customer_edit.php?id=<?php echo $row['id']; ?>" >Sửa</a>  |  
                        <a onclick="return Delete();" href="customer_delete.php?id=<?php echo $row['id']; ?>" >Xóa</a>
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