
<?php 
  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('location: list_category_product.php');
    die;
  }

  $id = $_GET['id'];
  $fullname = $_POST['Fullname'];
  $username = $_POST['Username'];
  $email = $_POST['Email'];
  // $sort_order = $_POST['Sort_order'];
  $role_id = $_POST['Role_id'];

  $updateUserQuery = "UPDATE users set
              fullname = '$fullname',
              username = '$username',
              email = '$email',

              role_id = '$role_id',
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
  header('location: list_admin.php');

 ?>