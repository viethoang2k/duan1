<?php 
    // lấy thông tin bình luận
    $sqlGetComments = "SELECT *  
                        FROM
                            users
                                INNER JOIN
                            comments ON users.id = comments.user_id
                        WHERE comments.product_id = '$id' and comments.status = 1 order by comments.id desc limit 4";
    $comments = executeQuery($sqlGetComments, true);
 ?>

<?php 
// lấy thông tin user
$user_login = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$user_id = $user_login['id'];
?>
<!-- comment item start-->

<div class="col-md-5">
     <!-- comment item start-->

     <?php 
     if ($comments != '') {
      ?>
      <?php foreach ($comments as $comments): ?>
        <div class="product-review">
          <p> <i class=" fa fa-user "></i> <?php echo $comments['fullname']; ?> </p>
          <div class="product-rating-info">
            <div class="ratings">
              <?php 
              for($i = 1; $i <= 5; $i++){
                if($comments['rating'] >= $i){
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
          </div>
          <div class="review-date">
            <p> <?php echo $comments['content']; ?><br>
           <em><?php echo $comments['created_at']; ?></em></p>
         </div>
     </div>
<br>
     
   <?php endforeach ?>
   <?php
 }else{
  ?>
  <h5>Sản phẩm chưa có bình luận.</h5>
  <?php
}
?>
<br>
</div>




<div class="col-md-7">
  <div class="rate-product hidden-xs">
    <div class="rate-product-heading">
      <h3>Bạn đang xem sản phẩm: <?php echo $product['name'] ?></h3>
      <h3>Bạn cảm thấy sản phẩn thế nào? <em>*</em></h3>
    </div>


  <?php 
   $message = '';
   if (isset($_POST['create_comment'])) {

     extract($_REQUEST); //kiểm tra các tên biến không hợp lệ và xung đột với các tên biến hiện có

    if($message == ''){
      $sqlQuery = "insert into comments (product_id, content,rating, user_id, status) 
      values ('$id','$content','$rating', '$user_id' , '1' )";
      executeQuery($sqlQuery);
      echo "<meta http-equiv='refresh' content='0'>";
    }
  }

// Kiểm tra đã đăng nhập chưa
if (!isset($_SESSION[AUTH])) {
  ?>
  <div class="alert alert-info fade in">
    <button data-dismiss="alert" class="close"></button>
    <i class="fa-fw fa fa-check"></i>
    Bạn hãy đăng nhập để bình luận và đánh giá sản phẩm.
  </div>
  <?php

}else{
  // Sản phẩm có k tắt bình luận thì hiển thị form
  if ($product['disabled_comment'] == 1) {
    ?>
    <!-- // Báo lỗi khi không nhập -->
    <?php if ($message != ''): ?>
      <div  class="alert alert-danger fade in">
        <button data-dismiss="alert" class="close"></button>
        <i class="fa-fw fa fa-times"></i>
        <strong>Error: <?php echo $message; ?></strong>
      </div>
    <?php endif ?>

    <form method="post" id="form" role="form">
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
        <tbody>
          <tr>

           <td> <input required="" type="radio" class="radio" value="1" name="rating"> </td>
           <td> <input required="" type="radio" class="radio" value="2" name="rating"> </td>
           <td> <input required="" type="radio" class="radio" value="3" name="rating"> </td>
           <td> <input required="" type="radio" class="radio" value="4" name="rating"> </td>
           <td> <input required="" type="radio" class="radio" value="5" name="rating"> </td>
         </tr>
       </tbody>
     </table>
     <ul class="form-list">

      <li>
        <label> Đánh giá của bạn <em>*</em> </label>
        <textarea id="text"  rows="6" maxlength="400" name="content"></textarea>
      </li>
    </ul>
    <button name="create_comment" type="submit"> Gửi Đánh Giá</button>
  </form>

  <?php
}else{
  ?>
  <h4>Sản phẩm đã tắt bình luận</h4>
  <?php
}
}

?>
</div>
</div>