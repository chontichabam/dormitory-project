<?php 

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <link rel="stylesheet" href="ss.css">

</head>
<body background="images/bg.png">
<div class="container-login">
<h1>เข้าสู่ระบบ</h1>
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>


    <form action="login.php" method="post">

    <label for="username">ชื่อผู้ใช้</label>
        <div class="input-group">
        <input type="text" name="username" placeholder="Username" required>
        </div>
        <br>
        <label for="password">รหัสผ่าน</label>
        <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
        </div>
        <br>
        <div class="button-group">
        <input type="submit" name="submit" value="Login">
        </div>
    </form>
    <div class="input-group">
    <a href="register.php">สมัครสมาชิก</a>
    </div>
</div>

</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>