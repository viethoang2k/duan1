


<div class="col-md-5">
    <div class="product-review">
        <p> <a href="#"> plaza</a> <span>Review by</span> plaza </p>
        <div class="product-rating-info">
            <div class="ratings">
             <i class="fa fa-star"></i>
             <i class="fa fa-star"></i>
             <i class="fa fa-star"></i>
             <i class="fa fa-star"></i>
             <i class="fa fa-star-half-o"></i>
            </div>
        </div>
        <div class="review-date">
         <p>body<em> date</em></p>
        </div>
    </div>
</div>



<div class="col-md-7">
    <div class="rate-product hidden-xs">
        <div class="rate-product-heading">
            <h3>Bạn đang xem sản phẩm: <?php echo $product['name'] ?></h3>
            <h3>Bạn cảm thấy sản phẩn thế nào? <em>*</em></h3>
        </div>
            <form method="post" action="<?php echo BASE_URL . "add-comment.php?id=". $product['id'] ?>" id="form" role="form">
                <table class="product-review-table">
                    <thead>
                        <tr>
                          <th>1 sao</th>
                          <th>2 sao</th>
                          <th>3 sao</th>
                          <th>4 sao</th>
                          <th>5 sao</th>
                      </tr>
                    </thead>
                    <tbody >
                        <tr>
                           <td> <input type="radio" class="radio" name="rating"> </td>
                           <td> <input type="radio" class="radio" name="ratings"> </td>
                           <td> <input type="radio" class="radio" name="ratings"> </td>
                           <td> <input type="radio" class="radio" name="ratings"> </td>
                           <td> <input type="radio" class="radio" name="ratings"> </td>
                        </tr>
                    </tbody>
                </table>
                    <ul class="form-list">
                        <li>
                            <label> nickname <em>*</em> </label>
                            <input name="name" type="text" id="name"  maxlength="100" required="">
                        </li>
                        <li>
                            <label> Đánh giá của bạn <em>*</em> </label>
                            <textarea id="text"  rows="6" maxlength="400" name="comment"></textarea>
                        </li>
                    </ul>
                    <button name="submit" type="submit"> Gửi Đánh Giá</button>
            </form>
    </div>
</div>