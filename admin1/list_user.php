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

// $sqlAdmin = "SELECT * from users where role_id=0";
// $stmt = $conn->prepare($sqlAdmin);
// $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlUser = "SELECT * from users where role_id=1";
$stmt = $conn->prepare($sqlUser);
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
     DANH SÁCH USER
   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Danh sách user </a></li>

  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách user</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
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
                        <?php if($r['role_id'] == 0) {echo 'Admin';} elseif($r['role_id'] == 1) echo "Khách hàng";?>
                    </td>
                    <td>  
                      <a onclick="return Delete();" href="user_delete.php?id=<?php echo $r['id']; ?>">Xóa</a>
                    </td>
                  </tr>
                  <?php
                } 
              ?>
            </tbody>

            <!-- <tbody>
                <?php 
                $stt = 1;
                $sql = "SELECT * FROM admin ORDER BY id DESC";
                $result = mysqli_query($link,$sql);


                if($result -> num_rows > 0){
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                                       <tr>
                      <td><?php echo $stt++; ?></td>

                      <td><?php echo $row['username']; ?></td>
                      <td><?php $role = $row['role'];
                          if($role == 0) echo "Editer"; elseif($role == 1) echo "Admin"; else echo "Super Admin";
                      ?></td>
                      <td><?php $status = $row['status'];
                        if($status == 1) echo 'Hiển thị'; else echo 'Không hiển thị';
                       ?></td>
                      <td><a href="user_edit.php?id=<?php echo $row['id']; ?>" >Sửa</a>  |  <a onclick="Delete();" href="user_delete.php?id=<?php echo $row['id']; ?>" >Xóa</a></td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody> -->

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