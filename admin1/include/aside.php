<!-- jQuery 3.1.1 -->

<script type="text/javascript">
  $(document).ready(function(){
      // keyup -- thay doi lien tuc khi go tu khoa -- nặng sever; chạy liên tục
      $("#srchFld").keyup(function(){

        key = $("#srchFld").val(); // tim gia tria cua o cos id srchFLd
        
        $.ajax({
          url: "xuly_ajax.php?key="+key,    
          success: function(result){
              $("#div1").html(result);                 //do du lieu vao torng id div1
            }
          });
      });
    });
  </script>
  <!-- end -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if(isset($_SESSION['Username'])) echo $_SESSION['Username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <a href="logout.php" class="btn btn-danger btn-flat"><span>Sign out<span></a>
       <!--    <div class="pull-right info">
                 
     </div> -->
   </div>
 </div>
 <!-- search form -->
 <form action="index.php" method="get" class="sidebar-form">
  <div class="input-group">
  <input type="text" id="srchFld" name="search" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
      <button type="submit" name="search" id="search-btn" class="btn btn-flat">
        <i class="fa fa-search"></i>
      </button>
    </span>
  </div>
  <div id="div1"></div>
</form>
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Quản lý</li>
  <li class="active treeview menu-open">
    <a href="index.php">
       <span>Trang chủ</span>
      <span class="pull-right-container">
        
      </span>
    </a>

  </li>
  <li class="treeview">
    <a href="cat_product.php">
      
      <span>Danh mục sản phẩm</span>
     
    </a>
    <ul class="treeview-menu">
      <li><a href="list_category_product.php"><i class="fa fa-circle-o"></i>Danh sách danh mục</a></li>
      <li><a href="category_product_new.php"><i class="fa fa-circle-o"></i>Thêm danh mục</a></li>

    </ul>
  </li>
  <li class="treeview">
    <a href="cat_product.php">
     
      <span>Hãng sản xuất</span>
      <span class="pull-right-container">
        <span class="label label-primary pull-right"></span>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="list_manufacturer.php"><i class="fa fa-circle-o"></i>Danh sách hãng sản xuất</a></li>
      <li><a href="manufacturer_new.php"><i class="fa fa-circle-o"></i>Thêm hãng sản xuất</a></li>

    </ul>
  </li>
  <li class="treeview">
    <a href="cat_product.php">
      
      <span>Sản phẩm</span>
      <span class="pull-right-container">
        <span class="label label-primary pull-right"></span>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="list_product.php"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
      <li><a href="product_new.php"><i class="fa fa-circle-o"></i>Thêm sản phẩm</a></li>

    </ul>
  </li>
  <li class="treeview">
    <a href="list_order.php">
      
      <span>Đơn hàng</span>
      <span class="pull-right-container">
        <span class="label label-primary pull-right"></span>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="list_order.php"><i class="fa fa-circle-o"></i>Danh sách đơn hàng</a></li>
    </ul>
  </li>
  <li>
   <li class="treeview">
    <a href="cat_product.php">
    
      <span>Slide</span>
      <span class="pull-right-container">
        <span class="label label-primary pull-right"></span>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="list_slide.php"><i class="fa fa-circle-o"></i>Danh sách slide</a></li>
      <li><a href="slide_new.php"><i class="fa fa-circle-o"></i>Thêm mới slide</a></li>          
    </ul>
  </li>
  <li>
   <li class="treeview">
    <a href="cat_product.php">
      <span>Admin</span>
    </a>
    <ul class="treeview-menu">
      <li><a href="list_admin.php"><i class="fa fa-circle-o"></i>Quản lý Admin</a></li>
      <li><a href="admin_new.php"><i class="fa fa-circle-o"></i>Thêm mới Admin</a></li>
    </ul>
  </li>     

  <li>
   <li class="treeview">
    <a href="cat_product.php">
      
      <span>Khách hàng</span>
     
    </a>
    <ul class="treeview-menu">
      <li><a href="list_user.php"><i class="fa fa-circle-o"></i>Quản lý khách hàng</a></li>
      <!-- <li><a href="user_new.php"><i class="fa fa-circle-o"></i>Thêm mới User</a></li> -->
      

    </ul>
  </li>      

</ul>
</section>
<!-- /.sidebar -->
</aside>