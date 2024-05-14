<?php
session_start();
include 'db_connection.php';


if(isset($_GET['id'])) {
 
    $id = $_GET['id'];

    // ดึงข้อมูลรูปภาพที่ต้องการลบออกมา
    $sql_select_image = "SELECT profile_image FROM accommodations WHERE id = $id";
    $result_select_image = mysqli_query($conn, $sql_select_image);
    $row = mysqli_fetch_assoc($result_select_image);
    $image_filename = $row['profile_image'];


    $sql_delete = "DELETE FROM accommodations WHERE id = $id";

    if (mysqli_query($conn, $sql_delete)) {
        // ลบรูปภาพออกจากโฟลเดอร์
        if (!empty($image_filename)) {
            @unlink('upload_image/' . $image_filename);
        }

        header("Location: admin_page.php");
        exit();
    } else {
      
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
   
    echo "ID parameter is missing";
}

mysqli_close($conn);
?>
