<?php
session_start();
include 'db_connection.php';

$name = trim($_POST['name']);
$price = $_POST['price'] ?: 0;
$type = $_POST['type'];
$style = $_POST['style'];
$room = $_POST['room'];
$detail = trim($_POST['detail']);
$tel = $_POST['tel'];
$facilitate = $_POST['facilitate'];

// ตรวจสอบว่าไฟล์ถูกอัปโหลดหรือไม่
if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $image_name = $_FILES['profile_image']['name'];
    $image_tmp = $_FILES['profile_image']['tmp_name'];
    $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
    
    // ตรวจสอบส่วนขยายของไฟล์
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if(!in_array(strtolower($image_extension), $allowed_extensions)) {
        echo "รูปภาพต้องเป็นไฟล์ประเภท JPG, JPEG, PNG, หรือ GIF เท่านั้น";
        exit();
    }

    $folder = 'upload_image/';
    $image_location = $folder . $image_name;
} else {
    // ถ้าไม่มีการอัปโหลดไฟล์ภาพ หรือเกิดข้อผิดพลาดในการอัปโหลด
    $image_name = '';
    $image_location = '';
}

if(empty($_POST['id'])) {
    $query = mysqli_query($conn, "INSERT INTO accommodations (name, price, type, style, room, detail, tel, facilitate, profile_image) VALUES ('{$name}', '{$price}','{$type}', '{$style}','{$room}','{$detail}','{$tel}','{$facilitate}', '{$image_name}')") or die('query failed');
} else {
    $query_product = mysqli_query($conn, "SELECT * FROM accommodations WHERE id='{$_POST['id']}'");
    $result = mysqli_fetch_assoc($query_product);

    if(empty($image_name)) {
        $image_name = $result['profile_image'];
    } else {
        @unlink($folder . $result['profile_image']);
    }

    $query = mysqli_query($conn, "UPDATE accommodations SET name='{$name}', price='{$price}',type='{$type}',style='{$style}', room='{$room}', detail='{$detail}', tel='{$tel}', facilitate='{$facilitate}',  profile_image='{$image_name}' WHERE id='{$_POST['id']}'") or die('query failed');
}

mysqli_close($conn);
if($query && !empty($image_location)) {
    move_uploaded_file($image_tmp, $image_location);

    $_SESSION['message'] = 'เพิ่มข้อมูลสำเร็จ!';
    header('location: ' . $base_url . '/total_admin.php');
} else {
    $_SESSION['message'] = 'ไม่สามารถเพิ่มข้อมูลได้!';
    header('location: ' . $base_url . '/add_dorm.php');
}
?>
