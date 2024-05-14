<?php 



    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page </title>
    <link rel="stylesheet" href="sy.css">
    </style>
</head>
<body>
    <header>
        <h1>Hi Admin , <?php echo $_SESSION['user']; ?></h1>
        <nav>
            <ul>
                <li><a href="admin_page.php">หน้าหลัก</a></li>
                <li><a href="add_dorm.php">เพิ่มข้อมูล</a></li>
                <li><a href="total_admin.php">ข้อมูลทั้งหมด</a></li>
                <li><a href="type.php">ประเภทหอพัก</a></li>
                <li><a href="logout.php">ออกจากระบบ</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
<?php } ?>