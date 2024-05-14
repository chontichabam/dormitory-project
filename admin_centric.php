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
    <title>admin</title>
    <link rel="stylesheet" href="sy.css">
   
</head>

<body>

<?php include 'menu.php'; ?>
    <div class="content-t" id="mainContent">
        <h1>หอพักเครือข่าย</h1>

        <table class="styled-table">
            <thead>
                <tr>
                   
                <th>ชื่อหอพัก</th>
                    <th>ราคา</th>
                    <th>ประเภท</th>
                    <th>ลักษณะ</th>
                    <th>ห้อง/คน</th>
                    <th>รายละเอียด</th>
                    <th>เบอร์โทร</th>
                    <th>สิ่งอำนวยความสะดวก</th>
                    <th>รูปภาพ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>


                </tr>
            </thead>
            <tbody>
                <?php
            $sql = "SELECT * FROM accommodations WHERE type = 'centric'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="accommodation">';

                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["type"] . "</td>";
                        echo "<td>" . $row["style"] . "</td>";
                        echo "<td>" . $row["room"] . "</td>";
                        echo "<td>" . $row["detail"] . "</td>";
                        echo "<td>" . $row["tel"] . "</td>";
                        echo "<td>" . $row["facilitate"] . "</td>";
                        echo "<td><img src='upload_image/" . $row["profile_image"] . "' width='100'></td>";
                        echo "<td><a role='button' href='edit.php?id=" . $row["id"] . "' class='btn'>แก้ไข</a></td>";
                        echo "<td><a onclick='return confirm(\"Are your sure you want to delete?\");' role='button' href='delete.php?id=" . $row["id"] . "' class='btn-d'>ลบ</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>ไม่มีข้อมูล</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

   

</body>

</html>
<?php } ?>