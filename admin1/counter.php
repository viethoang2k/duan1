<?php
  $fp = 'counter.txt';
  // mở file, chỉ đọc
  $fo = fopen($fp, 'r');

  $count = fread($fo, filesize($fp));

  $count++;
  $fc = fclose($fo);
  // chỉ ghi
  $fo = fopen($fp, 'w');
  $fo = fwrite($fo, $count);
  // $fc = fclose($fo);
?>
<!-- <div class="pull-right">
 	<h5>Thống kê lượt truy cập</h5> 
	<div>
		<p>Hiện có <span style="color: red;"><?php echo $count; ?></span> người xem </p>
	</div>
</div> -->