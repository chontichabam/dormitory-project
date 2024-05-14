<?php
// Include database connection file
include 'db_connection.php';


?>

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
        <h1>หอพักเครือข่าย</h1>       
        <?php
$sql = "SELECT * FROM accommodations WHERE type = 'centric'";
$result = $conn->query($sql);




if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {  
        echo '<div class="accommodation">';
        echo '<h2>' . $row['name'] . '</h2>';
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
    echo "ไม่มีหอพัก";
}
?>
        </div>
    </div>

</body>
</html>
