<?php
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

//lấy sản phẩm theo tìm kiếm bằng like 
if (isset($_POST['post_search'])) {
  extract($_REQUEST);
  $sqlSearch = "select * from products where name like '%$search%' order by id desc limit 12";
  $search_results = executeQuery($sqlSearch, true);
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Tìm Kiếm || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once './_share/style.php'; ?>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- header area start -->
    <?php include_once './_share/header.php'; ?>
    <!-- header area end -->
    <div class="new-products-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Kết quả tìm kiếm </h2>
                    </div>
                </div>
            </div>
            <div class="row">
               <?php 
               if ($search_results != '') {
                  ?>
                  <?php foreach ($search_results as $search): ?>
                    <div class="col-md-3">
                        <!--product list-->
                        <div class="product-list">
                            <div class="product-img">
                                <a href="<?php echo BASE_URL . "single-product.php?id=" . $search['id'] ?>">
                                    <img src="<?php echo $search['feature_image'] ?>" alt="" />
                                </a>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="<?php echo BASE_URL . "single-product.php?id=" . $search['id'] ?>"><?php echo $search['name'] ?></a>
                                </h5>
                            </div>
                            <div class="product-price">
                                <del><?php echo number_format($search['price'], 0, '', ','); ?>đ</del> 
                                <?php echo number_format($search['sale_price'], 0, '', ','); ?>đ
                            </div>
                            <div class="product-rating">
                                <?php 
                                for($i = 1; $i <= 5; $i++){
                                    if($search['rating'] >= $i){
                                        $starClass = "fa fa-star";
                                    }else{
                                        $starClass = "fa fa-star-o";
                                    }
                                    ?>
                                    <i class="<?php echo $starClass ?>"></i>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="product-btn">
                                <a href="<?php echo BASE_URL . 'add-cart.php?id=' . $search['id'] ?>" class="btn btn-extra-small btn-dark-border  "><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</a>
                            </div>
                        </div>
                        <!--product list-->
                    </div>
                <?php endforeach ?>
                <?php
            }else{
              ?>
              <div style="text-align: center;">
                  <p>Không tìm thấy kết quả!</p>
              </div>
              <?php
          }
          ?>
      </div>
  </div>
</div>
<!-- Footer ================================================================== -->
<!-- footer top area start -->
<?php include_once './_share/footer.php'; ?>
<!-- footer area end -->
<script src="js/vendor/jquery-1.12.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery-price-slider.js"></script>
<script src="lib/js/jquery.nivo.slider.js"></script>
<script src="lib/home.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.elevatezoom.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
</body>






