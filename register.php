<?php 

    session_start();

    require_once "db_connection.php";

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];


        $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1"; /*ไม่ให้ชื่อซ้ำ*/ 
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['username'] === $username) {    /*มีชื่อผู้ใช้อยู่แล้ว*/
            echo "<script>alert('มี Username นี้แล้ว');</script>";
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (username, password, firstname, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'm')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "สมัครสมาชิกเรียบร้อย!";
                header("Location: index.php");
            } else {
                $_SESSION['error'] = "ไม่สามารถสมาชิกได้!";
                header("Location: index.php");
            }
        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

    <link rel="stylesheet" href="ss.css">

</head>
<body  background="images/bg.png">
<div class="container-login">
<h1>สมัครสมาชิก</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
        <label for="username">Username</label>
        <div class="input-group">
        <input type="text" name="username" placeholder="" required>
        </div>
        <br>
        <label for="password">Password</label>
        <div class="input-group">
        <input type="password" name="password" placeholder="" required>
        </div>
        <br>
        <label for="firstname">ชื่อ</label>
        <div class="input-group">
        <input type="text" name="firstname" placeholder="" required>
        </div>
        <br>
        <label for="lastname">นามสกุล</label>
        <div class="input-group">
        <input type="text" name="lastname" placeholder="" required>
        </div>
        <br>
        <div class="button-group">
        <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <div class="input-group">
    <a href="index.php">Go back to index</a>
    </div>
</div>
   
</body>
</html>