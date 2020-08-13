<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';
$user = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$msg = isset($_GET['msg']) ? $_GET['msg'] : "";
?>

<html class="no-js" lang="">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Tài khoản || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once './_share/style.php'; ?>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- header area start -->
    <?php include_once './_share/header.php'; ?>
    <!-- header area end -->
    <!-- cart item area start -->
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.php" title="go to homepage">Trang Chủ<span>/</span></a>  </li>
                            <li><strong>Tài Khoản</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                <h2>tài khoản của tôi</h2>   
                            </div>
                            <span>thông tin tài khoản </span><hr>
                            <div class="login-form">
                                <div class="account-menu" >
                                    <?php if(isset($user['username'])){ ?>
                                        <div id="dangnhap-in">
                                            <span id="xinchao"><p>Tên đăng nhập :<span>
                                                <?php echo $user['username']; ?>
                                            </span></p></span>
                                            <span id="xinchao"><p>Họ Tên :<span>
                                                <?php echo $user['fullname']; ?>
                                            </span></p></span>
                                            <span id="xinchao"><p>Email :<span>
                                                <?php echo $user['email']; ?>
                                            </span></p></span>
                                            <!-- end email -->
                                            <button type="submit" class="default-btn"><a href="logout.php">Đăng Xuất</a></button>

                                        </div>
                                        <?php 
                                    }
                                    else
                                    {
                                        ?>
                                        <ul>
                                            <li><a href="login.php">Đăng Nhập</a></li>
                                        </ul>
                                        <!--End: Đăng nhập -in -->
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

