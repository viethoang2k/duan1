
<?php 
  if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('location: list_slide.php');
    die;
  }

  $id = $_GET['id'];
  $title = $_POST['Title'];
  $sort = $_POST['Sort'];
  $status = $_POST['Status'];
  $file = $_FILES['Image'];

  $updateUserQuery = "UPDATE sliders set
              title = '$title',
              sort = '$sort',
              status = '$status'
              ";
  if ($file['size'] > 0) {
    $image = uniqid() .  $file['image'];
      move_uploaded_file($file['tmp_name'], "image_slide/" . $image);
      $image = "image_slide/" . $image;
    $updateUserQuery .= ", image = '$image'";
  }
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
  header('location: list_slide.php');

 ?>