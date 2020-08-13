        <?php
        session_start();
        require_once './commons/constants.php';
        require_once './commons/db.php';
        require_once './commons/helpers.php';
        if(isset($_POST['submit']))
        {
            $fullname=$_POST['fullname'];
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql_insert="INSERT INTO users values(null,'$fullname','$username','$email','$password',1)";
            $query=executeQuery($sql_insert);
            echo "<p align='center'> Đăng ký thành công! </p>";
            echo '<meta http-equiv="refresh" content="1;url=login.php">';
            die();
        }
        ?>