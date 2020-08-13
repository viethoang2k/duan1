<!-- <?php  if(isset($_POST['save'])){
  $username=$_POST['username'];  
  $role=$_POST['role'];
  $status=$_POST['status'];
  $sql="UPDATE admin SET username='$username',role='$role',status='$status' WHERE id=".$id;
  mysqli_query($link, $sql);
  //
  $session = $_SESSION['Username'];
  $date = time();
  $sql2="INSERT INTO history(Username, Action, Timee) VALUES ('$session','Sửa User: $username','$date')";
  mysqli_query($link,$sql2);
  //
  header('Location: list_user.php');
}?> -->



<?php 
  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('location: list_user.php');
    die;
  }

  $id = $_GET['id'];
  $username = $_POST['username'];
  $role = $_POST['role'];
  $status = $_POST['status'];

  $updateUserQuery = "UPDATE admin set
              username = '$username',
              role = '$role',
              status = '$status'
              ";
 
  $updateUserQuery .= "where id = $id";

  $host = "localhost";//127.0.0.1
  $dbname = "duan1";
  $dbusername = "root";
  $dbpass = "";

  $conn = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $dbusername, $dbpass);
  //nạp câu truy vấn
  $stmt = $conn->prepare($updateUserQuery);
  //thực thi truy vấn cới csdl
  $stmt->execute();

  header('location: list_user.php');

 ?>