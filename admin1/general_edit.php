<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED& ~E_WARNING);
include 'connect.php';
include 'include/check_login.php';
?>
<?php 
  // them san pham
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM general WHERE General_id =".$id;
  $result = mysqli_query($link,$sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $Address = $row['Address'];
    $Email =$row['Email'];
    $Website = $row['Website'];
    $Phone= $row['Phone'];
    $CSKH  =$row['CSKH'];
    $Skype = $row['Skype'];
    $Status  = $row['Status'];
    $Gioithieu = $row['gioi_thieu'];
    $Link = $row['link_face'];
  }
}else{
  header('location: list_general.php');
}
if(isset($_POST['Save']))
{
  $Address = $_POST['Address'];
  $Email =$_POST['Email'];
  $Website = $_POST['Website'];
  $Phone= $_POST['Phone'];
  $CSKH  =$_POST['CSKH'];
  $Skype = $_POST['Skype'];
  $Status  = $_POST['Status'];
  $Gioithieu = $_POST['Gioithieu'];
  $Link = $_POST['Link'];

  $sql = "UPDATE general SET Address = '$Address', Email = '$Email', Website = '$Website', Phone = '$Phone', CSKH = '$CSKH', Skype = '$Skype', gioi_thieu = '$Gioithieu', link_face = '$Link', Status = '$Status' WHERE General_id = ".$id;

  mysqli_query($link,$sql);
//
  $session = $_SESSION['Username'];
  $date = time();
  $sql2="INSERT INTO history(Username, Action, Timee) VALUES ('$session','Sủa Thông tin chung: $General_id','$date')";
  mysqli_query($link,$sql2);
//
  header('location: list_general.php');
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
     THÔNG TIN CHUNG
     
   </h1>
   <ol class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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

         <form role="form" method="POST" enctype="multipart/form-data" action="general_edit.php?id=<?php echo $_GET['id']; ?>" >
          <div class="box-body">
            <div class="form-group">
              <label for="general_name">Address</label>
              <input class="form-control" id="general_name" placeholder="Tên quảng cáo" type="text" name="Address" required="required" value="<?php if(isset($Address)) echo $Address; ?>">
            </div>
            <div class="form-group">
              <label for="general_name">Email</label>
              <input class="form-control" id="general_URL" placeholder="Link" type="text" name="Email" required="required" value="<?php if(isset($Email)) echo $Email; ?>">
            </div>
            <div class="form-group">
              <label for="general_name">Website</label>
              <input class="form-control" id="general_URL" placeholder="Link" type="text" name="Website" required="required" value="<?php if(isset($Website)) echo $Website; ?>">
            </div>
            <div class="form-group">
              <label for="general_name">Phone</label>
              <input class="form-control" id="general_URL" placeholder="Link" type="text" name="Phone" required="required" value="<?php if(isset($Phone)) echo $Phone; ?>">
            </div>
            <div class="form-group">
              <label for="general_name">CSKH</label>
              <input class="form-control" id="general_URL" placeholder="Link" type="text" name="CSKH" required="required" value="<?php if(isset($CSKH)) echo $CSKH; ?>">
            </div>
            <div class="form-group">
              <label for="general_name">Skype</label>
              <input class="form-control" id="general_URL" placeholder="Link" type="text" name="Skype" required="required" value="<?php if(isset($Skype)) echo $Skype; ?>">
            </div>
            <div class="form-group">
              <label for="general_name">Face</label>
              <input class="form-control" id="general_URL" placeholder="Link" type="text" name="Link" required="required" value="<?php if(isset($Link)) echo $Link; ?>">
            </div>
            <div class="form-group">
            <label for="content">Giới thiệu</label>

              <textarea id="editor1" rows="10" cols="80" name="Gioithieu" 
              value="<?php if(isset($Gioithieu)) 
              {echo $Gioithieu;} ?>" >
            </textarea>
            <script>
              CKEDITOR.config.filebrowserImageUploadUrl = '{!! route('uploadPhoto').'?_token='.csrf_token() !!}';
            </script>
          </div>
          <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="Status">
              <option <?php if($Status == 1) {echo 'selected="selected"';} ?> value="1">Hiển thị</option>
              <option <?php if($Status == 0) {echo 'selected="selected"';} ?> value="0">Không hiển thị</option>
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

