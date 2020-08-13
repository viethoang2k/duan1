<script type="text/javascript">
  function Delete(){
    var conf = confirm('Xác nhận xóa');
    return conf;
  }
</script>
<?php
include 'connect.php';
include 'include/check_login.php';

$sql = "SELECT * from sliders";
$stmt = $conn->prepare($sql);
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
     DANH MỤC SLIDE
     
   </h1>
   <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="#">Danh mục slide</a></li>
    
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh mục slide</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <a href="slide_new.php" role="button" class="btn btn-danger btn-md">Thêm mới slide</a>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Stt</th>
                <th>Tên Slide</th>
                <th>Ảnh</th>
                <th>Vị trí</th>
                <th>Trạng thái</th>
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
                    <td><?=$r['title'] ?></td> 
                    <td><img width="100px" max-height="150px" src="<?php echo $r['image']; ?>"></td>
                    <td><?=$r['sort'] ?></td>           
                    <td><?php if($r['status'] == 1) {echo 'Hiển thị';} else {echo 'Không hiển thị';}?></td>
                    <td><a href="slide_edit.php?id=<?php echo $r['id']; ?>">Sửa</a>  |  
                      <a onclick="return Delete();" href="slide_delete.php?id=<?php echo $r['id']; ?>">Xóa</a></td>
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

