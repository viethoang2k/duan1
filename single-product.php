<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';

//lấy id sản phẩm từ đường dẫn
$id = isset($_GET['id']) ? $_GET['id'] : '';
//điều kiện để lấy ra thông tin sản phẩm
$sqlQuery = "select * from products where id = $id";
$product = executeQuery($sqlQuery);
?>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Chi Tiết Sản Phẩm || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once './_share/style.php'; ?>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- header area start -->
    <?php include_once './_share/header.php'; ?>
    <!-- header area end -->
    <div class="Single-product-location home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.php" title="go to homepage">Trang Chủ<span>/</span></a>  </li>
                            <li><strong> Chi tiết sản phẩm</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single product area end -->
    <!-- single product details start -->
    <div class="single-product-details">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <div class="single-product-img tab-content">
                        <div class="single-pro-main-image tab-pane active" id="pro-large-img-1">
                            <a href="#">
                                <img width="450" class="optima_zoom" src="<?php echo $product['feature_image'] ?>" data-zoom-image="" alt="optima"/>
                            </a>
                        </div>  
                    </div>
                </div>
                <div class="col-sm-6">

                    <div class="single-product-details">
                        <a href="#" class="product-name"><p><?php echo $product['name'] ?></p></a>
                        <div class="list-product-info">
                            <div class="price-rating">
                                <div class="ratings">
                                    <?php 
                                    for($i = 1; $i <= 5; $i++){
                                        if($product['rating'] >= $i){
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
                            </div>
                        </div>
                        <div class="avalable">
                        <p>Tình Trạng:<span> <?php if($product['stock_up'] >= 1) {echo 'Còn hàng';} elseif($product['stock_up'] > 1) {echo 'Hết Hàng';}?></span></p>
                        </div>
                        <div class="item-price">
                            <span><?php echo number_format($product['sale_price'], 0, '', ','); ?>đ <del><?php echo number_format($product['price'], 0, '', ','); ?>đ</del></span>
                            <div class="avalable">
                                <ul class="portfolio-meta m-bot-10 m-top-10">
                                    <li>Item No  <?php echo $product['sku'] ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-product-info">
                            <p>
                                <?php echo $product['detail'] ?>
                            </p>
                        </div>
                        <div class="cart-item">
                            <div class="single-cart">
                               


                                <button class="cart-btn"> <a href="<?php echo BASE_URL . 'add-cart.php?id=' . $product['id'] ?>" class=" btn btn-extra-small btn-dark-border ">Cho Vào Giỏ</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- single product details end -->
    <!-- single product tab start -->
<div class="single-product-tab-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-product-tab">
                        <ul class="single-product-tab-navigation" role="tablist">
                         <li role="presentation"><a href="#tab1"   data-toggle="tab">Sản Phẩm Liên Quan</a></li>
                         <li role="presentation"><a href="#tab2"   data-toggle="tab">Đánh Giá</a></li>
                        </ul>
                     <!-- Tab panes -->
                    <div class="tab-content single-product-page">
                        <div role="tabpanel" class="tab-pane fade" id="tab1">
                            <div class="single-p-tab-content">
                                <div class="row">
                                    <?php include_once './_share/related_product.php'; ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="single-p-tab-content">
                                <div class="row">
                                 <?php include_once './_share/comment.php'; ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- single product tab end -->
 <!-- related product area start-->
 <?php include_once './_share/related_product.php'; ?>
 <!-- related product area end-->
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
 <?php include_once './_share/script.php'; ?>



</body>

