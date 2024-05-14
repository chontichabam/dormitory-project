<?php
session_start();
include 'db_connection.php';

if (!$_SESSION['userid']) {
    header("Location: index.php");
} else {
    // ตรวจสอบว่ามีการส่งค่า ID ผ่าน URL หรือไม่
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        // ดึงข้อมูลหอพักที่ต้องการแก้ไขจากฐานข้อมูล
        $sql = "SELECT * FROM accommodations WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        // ตรวจสอบว่าพบข้อมูลหอพักหรือไม่
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            // ถ้าไม่พบข้อมูลหอพักที่ต้องการแก้ไข
            echo "No data found";
            exit();
        }
    } else {
        // ถ้าไม่มีการส่งค่า ID ผ่าน URL
        echo "ID parameter is missing";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="sy.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="container-login">
        <h1>แก้ไขข้อมูล</h1>
        <form action="process_add_dorm.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <div class="input-group">
                <label for="name">ชื่อหอพัก</label><br>
                <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required><br><br>
            </div>
            <div class="input-group">
                <label for="price">ราคา</label><br>
                <input type="text" name="price" id="price" value="<?php echo $row['price']; ?>"><br><br>
            </div>
            <div class="input-group">
                <label for="type">ประเภท</label><br>
                <input type="text" name="type" id="type" value="<?php echo $row['type']; ?>"><br><br>
            </div>
            <div class="input-group">
                <label for="style">ลักษณะ</label><br>
                <input type="text" name="style" id="style" value="<?php echo $row['style']; ?>"><br><br>
            </div>
            <div class="input-group">
                <label for="room">ห้อง/คน</label><br>
                <input type="text" name="room" id="room" value="<?php echo $row['room']; ?>"><br><br>
            </div>
            <div class="input-group">
                <label for="detail">รายละเอียด</label><br>
                <input type="text" name="detail" id="detail" value="<?php echo $row['detail']; ?>"><br><br>
            </div>
            <div class="input-group">
                <label for="tel">เบอร์โทร</label><br>
                <input type="text" name="tel" id="tel" value="<?php echo $row['tel']; ?>"><br><br>
            </div>
            <div class="input-group">
                <label for="facilitate">สิ่งอำนวยความสะดวก</label><br>
                <input type="text" name="facilitate" id="facilitate" value="<?php echo $row['facilitate']; ?>"><br><br>
            </div>
            <div class="input-group">
                <label for="profile_image">รูปภาพ</label><br>
                <input type="file" name="profile_image" id="profile_image"><br><br>
            </div>
            <div class="button-group">
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>
</html>

<?php
// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>
