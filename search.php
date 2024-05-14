<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodations</title>
    <link rel="stylesheet" href="ss.css">
</head>

<body background="images/bg.png">
    <div class="container-user">


<?php
include 'db_connection.php';
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$search = $_GET['search'];


$sql = "SELECT * FROM accommodations WHERE name LIKE '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // แสดงผลลัพธ์
    while($row = $result->fetch_assoc()) {
        echo '<div class="accommodation">';
        echo "ชื่อหอพัก: " . $row["name"]. "<br>";
        echo '<p>ราคา: ' . $row['price'] . '</p>';
        echo '<p>ลักษณะ: ' . $row['style'] . '</p>';
        echo '<p>ห้อง/คน: ' . $row['room'] . '</p>';
        echo '<p>รายละเอียด: ' . $row['detail'] . '</p>';
        echo '<p>เบอร์โทร: ' . $row['tel'] . '</p>';
        echo '<p>สิ่งอำนวยความสะดวก: ' . $row['facilitate'] . '</p>';
        echo "<img src='upload_image/" . $row["profile_image"] . "' width='300' >";
        echo '</div>';
    }

} else {
    echo "ไม่พบผลลัพธ์";
}
$conn->close();
?>
