<?php 
session_start();
require_once './commons/db.php';
require_once './commons/constants.php';
require_once './commons/helpers.php';



?>
<html class="no-js" lang="">
<!-- Mirrored from preview.hasthemes.com/james-preview/james/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 14:52:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Giỏ Hàng || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once './_share/style.php'; ?>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- Add your site or application content here -->
    <!-- header area start -->
    <?php include_once './_share/header.php'; ?>
    <!-- header area end -->
    <!-- cart item area start -->

    <!--  Lấy dữ liệu giỏ hàng -->
    <?php
    $cart = isset($_SESSION[CART]) ? $_SESSION[CART] : [];
    $totalPrice = 0; 
   
   
    ?>
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.php" title="go to homepage">Trang chủ<span>/</span></a>  </li>
                            <li><strong> Giỏ hàng </strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table-bordered table table-hover"  >
                            <thead >
                                <tr  >
                                    <th style="text-align: center;">Hình ảnh</th>
                                    <th style="text-align: center;">Sản phẩm</th>
                                    <th style="text-align: center;">Mã sản phẩm</th>
                                    <th style="text-align: center;">Số lượng</th>
                                    <th style="text-align: center;">Đơn giá </th>
                                    <th style="text-align: center;">Thành tiền</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody style="text-align: center; ">

                                <?php foreach ($cart as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="cart-img">
                                                <a href="#">
                                                    <img style="width: 100px;" src="<?php echo $item['feature_image'] ?>" alt="">
                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="<?php echo BASE_URL . "single-product.php?id=" . $item['id'] ?>"><?php echo $item['name'] ?></a>
                                        </td>

                                        <td>
                                            <?php echo $item['sku'] ?> 
                                        </td>

                                        <td>
                                            <div class="cart-action">
                                                <form action="update-cart.php?id=<?php echo $item['id'] ?>&url=<?php echo $_SERVER['REQUEST_URI']?>" method="post">
                                                    <button type="" name="reduction">-</button>
                                                    <input type="text" name="quantity" readonly="" value="<?php echo $item['quantity'] ?>" class="quantity_input"  />
                                                    <button type="" name="increase">+</button>
                                                </form>
                                            </div>
                                        </td>

                                        <td>
                                            <?php echo number_format($item['sale_price'], 0, '', ','); ?> vnđ
                                        </td>

                                        <td>
                                            <?php 
                                            $itemTotal = $item['sale_price']*$item['quantity'];
                                            $totalPrice += $itemTotal;
                                            echo number_format($itemTotal, 0, '', ','); ?> vnđ
                                        </td>

                                        <td>
                                           <button>
                                            <a href="remove-cart.php?id=<?php echo $item['id'] ?>&url=<?php echo $_SERVER['REQUEST_URI']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </button>
                                    </td>
                                   
                                </tr>


                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <span><b>Tổng thanh toán:</b></span>
                    <span class="pay-price"><?php echo number_format($totalPrice, 0, '', ',').'₫'; ?></span>

                    <div class="shopping-button">
                        <div class="continue-shopping">
                            <a href="index.php"><button type="submit" >Tiếp tục mua sắm</button></a>
                        </div>


                        <?php
                        if ($cart = 0) {
                            ?>
                            
                            <?php

                        }elseif($totalPrice > 0){
                            ?>  
                            <div class="shopping-cart-left">
                                <button type="submit"><a href="pay_cart.php">Thanh Toán</a></button>
                            </div>
                            <?php
                        }

                        ?>



                            
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart item area end -->
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