    <?php 
    $sqlGetMenus = "select * from categories where show_menu = 1";
    $menus = executeQuery($sqlGetMenus, true);
    ?>


    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="footer-contact">
                        <img src="http://preview.hasthemes.com/james-preview/james/img/logo-white.png" alt="" >
                        
                        <ul class="address">
                            <li>
                                <span class="fa fa-fax"></span>
                                123 456 789
                            </li>
                            <li>
                                <span class="fa fa-phone"></span>
                                123 456 789
                            </li>
                            <li>
                                <span class="fa fa-envelope-o"></span>
                                admin@gmail.com
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-4">
                    <div class="footer-support">
                        <div class="footer-title">
                            <h3>Our support</h3>
                        </div>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">#</a></li>
                                <li><a href="#">#</a></li>
                                <li><a href="#">#</a></li>
                                <li><a href="#">#</a></li>
                                <li><a href="#">#</a></li>
                                <li><a href="http://preview.hasthemes.com/james-preview/james/contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="footer-info">
                        <div class="footer-title">
                            <h3>Our information</h3>
                        </div>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="http://preview.hasthemes.com/james-preview/james/about-us.html">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Orders and Returns</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer top area end -->
    <!-- footer area start -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="footer-copyright">
                        <p>Copyright &copy; 2016 <a href="#"> Bootexperts</a>. All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="payment-icon">
                        <img src="img/payment.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <a href="#" id="scrollUp"><i class="fa fa fa-arrow-up"></i></a>
    </footer>