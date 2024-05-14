<?php

$base_url = 'http://localhost/dormitory-website-project';


$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'dormitory';


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if (!$conn) {
    die('การเชื่อมต่อล้มเหลว: ' . mysqli_connect_error());
}
?>
