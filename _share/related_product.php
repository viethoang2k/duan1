 <?php
    // Sản phẩm liên quan
    $cate_id = $product['cate_id'];
    $sqlRelatedProducts = "select * from products where cate_id = '$cate_id' limit 4";
    $related_products = executeQuery($sqlRelatedProducts, true);
 ?>


 <div class="related-product home2">
            <?php foreach ($related_products as $related_products): ?>
                <div class="col-md-3">
                    <!--product list-->
                    <div class="product-list">
                        <div class="product-img">
                            <a href="<?php echo BASE_URL . "single-product.php?id=" . $related_products['id'] ?>">
                                <img src="<?php echo $related_products['feature_image'] ?>" alt="" />
                            </a>
                        </div>
                        <div class="product-title">
                            <h5>
                                <a href="<?php echo BASE_URL . "single-product.php?id=" . $related_products['id'] ?>"><?php echo $related_products['name'] ?></a>
                            </h5>
                        </div>
                        <div class="product-price">
                            <del><?php echo number_format($related_products['price'], 0, '', ','); ?>đ</del> <?php echo number_format($related_products['sale_price'], 0, '', ','); ?>đ
                        </div>
                        <div class="product-rating">
                            <?php 
                            for($i = 1; $i <= 5; $i++){
                                if($related_products['rating'] >= $i){
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
                            <a href="<?php echo BASE_URL . 'add-cart.php?id=' . $related_products['id'] ?>" class=" btn btn-extra-small btn-dark-border "><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</a>
                        </div>
                    </div>
                    <!--product list-->
                </div>
            <?php endforeach ?>
    
</div>