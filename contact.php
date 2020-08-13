<?php
session_start();
require_once './commons/constants.php';
require_once './commons/db.php';
require_once './commons/helpers.php';
?>
<html class="no-js" lang="">

<!-- Mirrored from preview.hasthemes.com/james-preview/james/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 14:53:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liên Hệ || James </title>
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
    <!-- contact area start -->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.php" title="go to homepage">Trang Chủ<span>/</span></a>  </li>
                            <li><strong> Liên Hệ</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    
                </div>
                <div class="col-sm-9">
                    <div class="contact-info">
                        <div id="googleMap"></div>
              <form name="contactform" method="post" action="send_email.php" >
                                   <div class="contact-details">
                            <div class="contact-title">
                                <h3>Liên hệ chúng tôi</h3>
                            </div>
                            <div class="contact-form">
                                <div class="form-title">
                                    <h4>Thông tin liên hệ</h4>
                                </div>
                                <div class="form-content">
                                    <ul>
                                        <li>
                                            <div class="form-box">
                                                <div class="form-name" >
                                                    <label for="first_name">Tên <em>*</em> </label>
                                                    <input required="" type="text" name="first_name">
                                                </div>
                                            </div>
                                            <div class="form-box">
                                                <div class="form-name">
                                                    <label for="email">Email <em>*</em> </label>
                                                    <input type="text" name="email">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-box">
                                                <div class="form-name">
                                                    <label for="telephone">số điện thoại <em>*</em> </label>
                                                    <input type="text" name="telephone">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-box">
                                                <div class="form-name">
                                                    <label for="comments">Nội Dung <em>*</em> </label>
                                                    <textarea name="comments" cols="5" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="buttons-set">
                                <p> <em>*</em> Bắt buộc</p>
                                <button type="submit" >Gửi Đi</button>
                                <button type="reset">Nhập lại</button>
                               
                            </div>
                        </div>
                                </form>
    
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
        <!-- google map
            ============================================ -->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
            <script>
                function initialize() {
                    var mapOptions = {
                        zoom: 15,
                        scrollwheel: false,
                        center: new google.maps.LatLng(23.81033, 90.41252)
                    };

                    var map = new google.maps.Map(document.getElementById('googleMap'),
                      mapOptions);

                    var marker = new google.maps.Marker({
                        position: map.getCenter(),
                        animation:google.maps.Animation.BOUNCE,
                        icon: 'img/contact/map-marker.png',
                        map: map
                    });

                }

                google.maps.event.addDomListener(window, 'load', initialize);
            </script>

        <!-- main JS
            ============================================ -->
            <script src="js/main.js"></script>
        </body>

        <!-- Mirrored from preview.hasthemes.com/james-preview/james/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 14:53:41 GMT -->
    </php>
