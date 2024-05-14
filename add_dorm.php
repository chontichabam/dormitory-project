<?php
session_start();

if (!$_SESSION['userid']) {
    header("Location: index.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กรอกข้อมูล</title>
    
    <link rel="stylesheet" href="sy.css">
</head>
<body >
<?php include 'menu.php'; ?>
<div class="container-login">
    <h1>กรอกข้อมูล</h1>
    <form action="process_add_dorm.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <div class="input-group">
        <label for="name">ชื่อหอพัก</label><br>

        <input type="text" id="name" name="name" required><br><br>
        </div>
        <div class="input-group">
        <label for="price">ราคา</label><br>
       
        <input type="number" id="price" name="price" required><br><br>
        </div>
        <div class="input-group">
        <label for="type">ประเภท</label><br>
            <select id="type" name="type" required>
                <option value="internal">หอพักภายใน</option>
                <option value="external">หอพักภายนอก</option>
                <option value="centric">หอพักเครือข่าย</option>
            </select><br>
</div>
            <div class="input-group">
            <label for="style">ลักษณะ</label><br>
         
            <input type="text" id="style" name="style"><br>
            </div>
            <div class="input-group">
            <label for="room">ห้อง/คน</label><br>
           
            <input type="number" id="room" name="room"><br>
            </div>
            <div class="input-group">
            <label for="detail">รายละเอียด</label><br>
          
            <textarea id="detail" name="detail"></textarea><br>
            </div>
            <div class="input-group">
            <label for="tel">เบอร์โทร</label><br>
         
            <input type="text" id="tel" name="tel"><br>
            </div>
            <div class="input-group">
            <label for="facilitate">สิ่งอำนวยความสะดวก</label><br>
           
            <textarea id="facilitate" name="facilitate"></textarea><br>
            </div>
            <div class="input-group">
            <label for="profile_image">รูปภาพ</label><br>
          
            <input type="file" id="profile_image" name="profile_image"><br><br>
           
            </div>

            <div class="button-group">
    <input type="submit" value="บันทึก">
</div>

    </form>
</div>

</body>
</html>

<?php } ?>