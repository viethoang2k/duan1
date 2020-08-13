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
    <title> Đăng Nhập || James </title>
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
                            <li><strong>Đăng Nhập</strong></li>
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
                                <h2>Đăng Nhập</h2>
                                
                            </div>
                            <div class="login-form">
                                <form action="<?php echo BASE_URL . "post_login.php" ?>" method="post">
                                    <?php if ($msg != ""): ?>
                                        <h5 style="color: red; text-align: center;"><?php echo $msg ?></h5>  
                                    <?php endif ?>
                                    <br>    
                                    <input type="text" name="username" placeholder="Tài khoản">
                                    <input type="password" name="password" placeholder="Mật khẩu">
                                    
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <input type="checkbox" id="remember">
                                            <label for="remember">nhớ mật khẩu</label>
                                            <!--  <a href="#">quên mật khẩu?</a> -->
                                        </div>
                                        <button type="submit" name="login" class="default-btn">Đăng nhập</button>
                                        <a href="register.php" style="margin-left: 265px; color: #e03550;">đăng kí</a>
                                    </div>
                                </form>
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

