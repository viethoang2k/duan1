<?php
    $link=mysqli_connect("localhost","root","")
    or die("Cannot connect to the database");
    mysqli_select_db($link,"duan1")
    or die("Cannot connect to the database");
    mysqli_query($link,"SET NAMES 'UTF8'");
?>