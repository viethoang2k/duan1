<?php
include 'connect.php';
header('Content-Type: text/html; charset=utf-8');
include 'include/check_login.php';
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
     THÔNG TIN CHUNG
     
   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Thông tin chung</a></li>
    
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Thông tin chung</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Stt</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Website</th>
                <th>Phone</th>
                <th>CSKH</th>
                <th>Skype</th>
                <!-- <th>Giới thiệu</th> -->
                <th>Link Face</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $stt = 1;
              $sql = "SELECT * FROM general";
              $result = mysqli_query($link,$sql);

                while($row = mysqli_fetch_assoc($result)){
                 ?>
                 <tr>
                  <td><?php echo $stt++; ?></td>
                  <td><?php echo $row['Address']; ?></td>
                  <td><?php echo $row['Email']; ?></td>
                  <td><?php echo $row['Website']; ?></td>
                  <td><?php echo $row['Phone']; ?></td>
                  <td><?php echo $row['CSKH']; ?></td>
                  <td><?php echo $row['Skype']; ?></td>
                  <td><?php echo $row['link_face']; ?></td>
                  <!-- <td><?php echo $row['gioi_thieu']; ?></td> -->
                  <td><?php if($row['Status'] == 1) {echo 'Hiển thị';} else { echo 'Không hiển thị';}?></td>
                  <td><a href="general_edit.php?id=<?php echo $row['General_id']; ?>">Sửa</a></td>
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

