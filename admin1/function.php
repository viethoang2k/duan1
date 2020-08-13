<?php
	include 'connect.php';

	function checkquery($table){
		global $link;
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($link,$sql);
		$count = $result -> num_rows;
		return $count;
	}

?>