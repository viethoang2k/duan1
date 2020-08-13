<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';
//câu lệnh sử lý để lấy ra sản phẩm bán chạy bằng số sao từ 3 trở lên
$tv="select * from products where rating>='3' order by id desc limit 8";
$highlights = executeQuery($tv, true);
//câu lệnh sử lý để lấy ra sản phẩm mới 
$sqlQuery = "select * from products order by id desc limit 8";
$products = executeQuery($sqlQuery, true);
//lấy ảnh slide
$sqlSlide = "select * from sliders where status = 1 order by id desc limit 2";
$sliders = executeQuery($sqlSlide, true);

?>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Trang Chủ || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once './_share/style.php'; ?>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- header area start -->
    <?php include_once './_share/header.php'; ?>
    <!-- header area end -->
    <!-- slider area start -->
    <div class="slider-area home1">
        <div class="bend niceties preview-2">
            <div id="nivoslider" class="slides">
                 <?php foreach ($sliders as $sliders): ?>
                <img src="<?php echo $sliders['image'] ?>" alt="" title="#slider-direction-1"  />
                
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- slider area end -->
    <!-- products area start -->
<div class="new-products-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>SẢN PHẨM BÁN CHẠY</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($highlights as $rating): ?>
                <div class="col-md-3">
                    <!--product list-->
                    <div class="product-list">
                        <div class="product-img">
                          <a href="<?php echo BASE_URL . "single-product.php?id=" . $rating['id'] ?>">
                                <img width="300" height="250" src="<?php echo $rating['feature_image'] ?>" alt="" />
                            </a>
                        </div>
                        <br>
                        <div class="product-title">
                            <h5>
                                <a href="<?php echo BASE_URL . "single-product.php?id=" . $rating['id']  ?>"><?php echo $rating['name'] ?></a>
                            </h5>
                        </div>
                        <div class="product-price">
                            <del><?php echo number_format($rating['price'], 0, '', ','); ?>đ</del> <?php echo number_format($rating['sale_price'], 0, '', ','); ?>đ
                        </div>
                        <div class="product-rating">
                            <?php 
                            for($i = 1; $i <= 5; $i++){
                                if($rating['rating'] >= $i){
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
                            <a href="<?php echo BASE_URL . 'add-cart.php?id=' . $rating['id'] ?>" class=" btn btn-extra-small btn-dark-border "><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <!--product list-->
                </div>
            <?php endforeach ?>
        </div>
        <br>
    </div>
</div>
<!-- products area end -->


<!-- new products area start -->
<div class="new-products-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>SẢN PHẨM MỚI </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($products as $pro): ?>
                <div class="col-md-3">
                    <!--product list-->
                    <div class="product-list">
                        <div class="product-img">
                            <a href="<?php echo BASE_URL . "single-product.php?id=" . $pro['id'] ?>">
                                <img width="300" height="250" src="<?php echo $pro['feature_image'] ?>" alt="" />
                           </a>
                        </div>
                        <br>
                        <div class="product-title">
                            <h5>
                                <a href="<?php echo BASE_URL . "single-product.php?id=" . $pro['id'] ?>"><?php echo $pro['name'] ?></a>
                            </h5>
                        </div>
                        <div class="product-price">
                            <del><?php echo number_format($pro['price'], 0, '', ','); ?>đ</del> <?php echo number_format($pro['sale_price'], 0, '', ','); ?>đ
                        </div>
                        <div class="product-rating">
                            <?php 
                            for($i = 1; $i <= 5; $i++){
                                if($pro['rating'] >= $i){
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
                            <a href="<?php echo BASE_URL . 'add-cart.php?id=' . $pro['id'] ?>" class=" btn btn-extra-small btn-dark-border "><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <!--product list-->
                </div>
            <?php endforeach ?>
        </div>
        <br>
    </div>
</div>
<!-- new products area end -->
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


