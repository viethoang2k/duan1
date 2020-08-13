
<?php 
  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('location: list_category_product.php');
    die;
  }

  $id = $_GET['id'];
  $name = $_POST['Name'];
  // $sort_order = $_POST['Sort_order'];
  $status = $_POST['Status'];

  $updateUserQuery = "UPDATE categories set
              name = '$name',
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
  header('location: list_category_product.php');

 ?>