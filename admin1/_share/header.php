<?php 
$sqlGetMenus = "select * from categories where show_menu = 1";
$menus = executeQuery($sqlGetMenus, true);

//lấy thông tin user
$user_login = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$id_user = $user_login['id'];
$sqlUserQuery = "select * from users where id = '$id_user'";
$user = executeQuery($sqlUserQuery, false);

//kiểm tra giỏ hàng 
$totalItemOnCart = 0;
$totalPrice = 0;
$cart = '';
$cart = isset($_SESSION[CART]) ? $_SESSION[CART] : null;
if($cart != ''){
    foreach ($cart as $item) {
        $totalItemOnCart += $item['quantity'];
        $itemTotal = $item['price']*$item['quantity'];
        $totalPrice += $itemTotal;
    }
}
?>
<header>
    <div class="top-link">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-3 col-sm-9 hidden-xs">
                    <div class="call-support" style="float: left;">
                        <p>Hỗ Trợ khách hàng: <span> 0977486007</span></p>
                    </div>
                    <!-- banner area start -->
                    <div class="banner-area" style="padding-left: 350px; margin-top: 20px">
                        <div class="single-banner">
                            <div class="part-2">
                                <div class="search-box" >
                                    <form action="search.php" method="post">
                                        <input id="txtsearch" class="srchTxt" type="text"  name="search" placeholder="Tìm kiếm..." required="">
                                        <button type="submit" id="btnsearch" class="btn btn-search" name = 'btn-search' value="search">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- banner area end -->
                </div>
                <div class="col-md-2 col-sm-3" >
                    <div class="dashboard" style="width: 235px; " >
                        <?php
                        if ($user == '') {
                            ?>
                            <div class="account-menu" >
                                <ul >
                                    <li style="width: 95px;" ><a href="login.php">Đăng&nbsp;nhập </a></li>
                                </ul>
                            </div>
                            <?php
                        }elseif($user['username'] == 1){
                            unset($_SESSION[AUTH]);
                            header('location: ' . BASE_URL . 'index/login.php?error=Tài khoản của bạn đã bị khóa !');
                            die;
                        }elseif($user['role_id'] == 1){
                            ?>
                            <div class="account-menu" >
                                <ul >
                                    <li style="width: 95px;" ><a href="myaccount.php">Tài&nbsp;Khoản </a></li>
                                </ul>
                            </div>
                            <?php
                        }elseif($user['role_id'] == 0){
                            
                            ?>
                            <div class="account-menu" >
                                <ul style="">
                                    
                                    <li style="width: 95px;"><a href="myaccount.php">Tài&nbsp;Khoản</a></li>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="cart-menu" >
                            <ul>
                                <li>
                                    <a href="cart.php">
                                        <img src="img/icon-cart.png" alt="" style="margin-top: 20px">
                                        <span><?php echo $totalItemOnCart ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainmenu-area product-items">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.php">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mainmenu">
                        <nav>
                            <ul>
                                <li><a href="index.php">Trang Chủ</a>
                                </li>
                                <li class="mega-women"><a href="shop.php">Giày Nữ</a>
                                </li>
                                <li class="mega-men"><a href="shop.php">Giày Nam</a>
                                </li>
                                <li><a href="contact.php">Liên Hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>