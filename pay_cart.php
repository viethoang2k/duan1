<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';
$user = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;

?>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thanh Toán || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once './_share/style.php'; ?>
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- header area start -->
    <?php include_once './_share/header.php'; ?>
    <!-- header area end -->
    <!-- contact area start -->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.php" title="go to homepage">Trang Chủ<span>/</span></a>  </li>
                            <li><a href="cart.php" title="go to homepage">Giỏ Hàng<span>/</span></a>  </li>
                            <li><strong>Thanh Toán</strong></li>
                        </ul>
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
                                        <h2>Nhập thông tin thanh toán</h2>
                                    </div>
                                    <div class="login-form">
                                        <form action="insert.php" method="POST" id="a" >
                                            <br>    
                                            <input type="text" name="fullname" required="" placeholder="Mời nhập tên" value="<?php echo $user['fullname'] ?>"/>
                                            <input type="text" name="email" required="" placeholder="Mời nhập email" value="<?php echo $user['email'] ?>"/>
                                            <input type="text" required="" name="diachi" placeholder="Mời nhập địa chỉ" />
                                            <input type="text" required="" name="dienthoai" placeholder="Mời nhập số điện thoại" />

                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                     <select required="" name="phuongthuc">
                                                        <option value=""  >Chọn phương thức thanh toán</option>
                                                        <option value="1">Qua bưu điện</option>
                                                        <option value="2">Qua thẻ ATM</option>
                                                        <option value="3">Thanh toán trực tiếp</option>

                                                    </select>
                                                </div>
                                                    <button type="submit" class="default-btn">Đặt hàng</button> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- contact area end -->
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
<script src="js/main.js"></script>
<script language="javascript">
    function kiemtra()
    {
        if(a.hoten.value=="")
        {
            alert("Bạn chưa điền tên")
            a.hoten.focus();
            return false;

        }

        if(a.dienthoai.value=="")
        {
            alert("Bạn chưa điền SĐT<br> hãy điền số điện thoại để chúng tôi liên lạc lại với bạn")
            a.dienthoai.focus();
            return false;
        }
        if(a.diachi.value=="")
        {
            alert("Bạn chưa điền địa chỉ")
            a.diachi.focus();
            return false;
        }

        if(a.hoten.value!="" && a.dienthoai.value!=""&&a.diachi.value!="")
        {
            a.submit(); 
        }
    }

</script>

</body>
