<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

//lấy sản phẩm theo danh mục bằng id
$id_cate = isset($_GET['id']) ? $_GET['id'] : "";
$sqlProducts = "select * from products where cate_id = '$id_cate' order by id desc limit 9";
$products = executeQuery($sqlProducts, true);

//lấy tên danh mục
$sqlGetCate = "select * from categories where id = $id_cate";
$cate_name = executeQuery($sqlGetCate)

?>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> <?php  echo $cate_name['name']; ?> || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once './_share/style.php'; ?>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- header area start -->
    <?php include_once './_share/header.php'; ?>
    <!-- header area end -->
    <!-- product items banner start -->
    <div class="product-banner">
        <img src="img/product/banner.jpg" alt="">
    </div>
    <!-- product items banner end -->
    <!-- product main items area start -->
    <div class="product-main-items">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.php" title="go to homepage">Trang Chủ<span>/</span></a>  </li>
                            <li><strong> <?php  echo $cate_name['name']; ?></strong></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row">
            <?php if($products !=''): ?>
            <?php foreach ($products as $products): ?>
                <div class="col-md-3">
                    <!--product list-->
                    <div class="product-list">
                        <div class="product-img">
                            <a href="<?php echo BASE_URL . "single-product.php?id=" . $products['id'] ?>">
                                <img  width="300" height="250" src="<?php echo $products['feature_image'] ?>" alt=""  />
                            </a>
                        </div>
                        <br>
                        <div class="product-title">
                            <h5>
                                <a href="<?php echo BASE_URL . "single-product.php?id=" . $products['id'] ?>"><?php echo $products['name'] ?></a>
                            </h5>
                        </div>
                        <div class="product-price">
                            <del><?php echo number_format($products['price'], 0, '', ','); ?>đ</del> <?php echo number_format($products['sale_price'], 0, '', ','); ?>đ
                        </div>
                        <div class="product-rating">
                            <?php 
                            for($i = 1; $i <= 5; $i++){
                                if($products['rating'] >= $i){
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
                            <a href="<?php echo BASE_URL . 'add-cart.php?id=' . $products['id'] ?>" class=" btn btn-extra-small btn-dark-border "><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <!--product list-->
                </div>
            <?php endforeach ?>
        <?php endif ?>
        </div>
           <br>
        </div>
    </div>

    <!-- product main items area end -->

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

<!-- Mirrored from preview.hasthemes.com/james-preview/james/shop.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 14:53:15 GMT -->
</php>
