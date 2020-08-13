 <?php

$sqlQuery = "select * from products order by id desc limit 12";
$products = executeQuery($sqlQuery, true);


?>


 <div class="related-product home2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-title">
                        <h2>Sản Phẩm Liên Quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php foreach ($products as $pro): ?>
                    <div class="col-md-3">
                        <!--product list-->
                        <div class="product-list">
                            <div class="product-img">
                                <a href="#">
                                    <img src="<?php echo $pro['feature_image'] ?>" alt="" />
                                </a>
                            </div>
                            <div class="product-title">
                                <h5>
                                    <a href="<?php echo BASE_URL . "single-product.php?id=" . $pro['id'] ?>"><?php echo $pro['name'] ?></a>
                                </h5>
                            </div>
                            <div class="product-price">
                                <del><?php echo number_format($pro['price'], 0, '', ','); ?>đ</del> <?php echo number_format($pro['sale_price'], 0, '', ','); ?>đ
                            </div>
                            <div class="product-rating">
                                <?php 
                                for($i = 1; $i <= 5; $i++){
                                    if($pro['rating'] >= $i){
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
                                <a href="#" class="btn btn-extra-small btn-dark-border  "><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ </a>
                            </div>
                        </div>
                        <!--product list-->
                    </div>
                <?php endforeach ?>
                
            </div>
        </div>
    </div>