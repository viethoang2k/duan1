<?php 
include 'connect.php';
?>
<?php
if($_GET['key']){
	$key = $_GET['key'];
	$sql = "SELECT * FROM product WHERE Ten_sp LIKE '%".$key."%'";
	$result =  mysqli_query($link,$sql);
	while ($row = mysqli_fetch_assoc($result)) {
		?>

		<a href="#" style="color: white;"><?php echo $row['Ten_sp']; ?></a> 

		<?php  		
	}
}
?>

