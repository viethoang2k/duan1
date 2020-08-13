<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';
$user = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
?>
<html class="no-js" lang="">

<!-- Mirrored from preview.hasthemes.com/james-preview/james/register.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 14:53:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Đăng Ký || James </title>
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
                            <li><strong>Đăng Ký</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-area ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-text">
                                <h2>Đăng Ký</h2>
                                
                            </div>
                            <div class="login-form">
                                <form action="update_register.php" method="POST" name="frm" onsubmit="return dangky()">
                                    <input type="text" name="username" placeholder="Tên đăng nhập">
                                    <input type="text" name="fullname" placeholder="Họ Tên">
                                    <input type="password" name="password" placeholder="Mật khẩu">
                                    <input type="password" name="password2" placeholder="Nhập Lại Mật khẩu">
                                    <input name="email" placeholder="Email" type="email">
                                    <div class="button-box">
                                        <button type="submit" name="submit" class="default-btn">Đăng kí</button>
                                        <button type="reset" class="default-btn">Hủy</button>
                                        <br><br>
                                        <a href="login.php" style="margin-left: 200px; color: #e03550;">Bạn đã có tài khoản?</a>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script lang="javascript">
        function dangky()
        {
            if(frm.username.value=="")
            {
                alert("Bạn chưa nhập tên đăng nhập. Vui lòng kiểm tra lại");     
                frm.username.focus();
                return false;
            }
            if(frm.username.value.length<6)
            {
                alert("Tên đăng nhập quá ngắn. Vui lòng điền đủ họ tên");
                frm.username.focus();
                return false;
            }
            if(frm.fullname.value=="")
            {
                alert("Bạn chưa nhập tên người dùng. Vui lòng kiểm tra lại");
                frm.fullname.focus();
                return false;
            }
            if(frm.fullname.value.length<6)
            {
                alert("Tên người dùng phải hơn 6 ký tự.");
                frm.fullname.focus();
                return false;
            }
            if(frm.password.value=="")
            {
                alert("Bạn chưa nhập password. Vui lòng nhập password");
                frm.password.focus();
                return false;
            }
            if(frm.password.value.length<6)
            {
                alert("Mật khẩu phải hơn 6 ký tự.");
                frm.password.focus();
                return false;
            }
            if(frm.password2.value=="")
            {
                alert("Bạn chưa nhập lại password");
                frm.password2.focus();
                return false;
            }
            mk=frm.password.value;
            mk1=frm.password2.value;
            if(mk!=mk1)
            {
                alert("Password chưa đúng");
                frm.password.focus();
                return false;
            }
            mail=frm.email.value;
            m=/^([A-z0-9])+[@][a-z]+[.][a-z]+[.]*([a-z]+)*$/;
            if(mail=="")
            {
                alert("Bạn chưa nhập email");
                mail.focus();
                return false;
            }
            if(!m.test(email))
            {
                alert("Bạn nhập sai email");
                frm.email.focus();
                return false;
            }
            
            
        }


    </script>

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
