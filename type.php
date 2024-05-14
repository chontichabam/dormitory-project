<?php
include 'db_connection.php';
session_start();

// ดึงข้อมูลทั้งหมดจากฐานข้อมูล
$sql = "SELECT * FROM accommodations";
$result = mysqli_query($conn, $sql);

if (!$_SESSION['userid']) {
    header("Location: index.php");
} else {


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Accommodation Card</title>
<link rel="stylesheet" href="sy.css">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container-type">
<div class="card">
  <div class="card-body">
    <img src="images/dorm1.png" alt="Accommodation Image">
    <h3>หอพักภายใน</h3>
    <a role='button' href='admin_internal.php' class='btn'>แก้ไข</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <img src="images/dorm3.png" alt="Accommodation Image">
    <h3>หอพักภายนอก</h3>
    <a role='button' href='admin_external.php' class='btn'>แก้ไข</a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <img src="images/dorm2.png" alt="Accommodation Image">
    <h3>หอพักเครือข่าย</h3>
    <a role='button' href='admin_centric.php' class='btn'>แก้ไข</a>
  </div>
</div>
</div>
</body>
</html>
<?php } ?>