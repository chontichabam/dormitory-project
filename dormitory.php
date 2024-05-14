<?php
session_start();
include 'db_connection.php';




    if (!$_SESSION['userid']) {
        header("Location: index.php");
    } else {
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormitory Website Project</title>
    <link rel="stylesheet" href="./ss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
</head>
<body background="images/bg.png">
    <!-- <div class="container bg"> -->
        <div class="navBar">
          <div class="logo">
            <a href="#">
              <i class="fas fa-home"></i>
            </a>         
          </div>
          <!-- <form method="GET" action="search.php">
          <div class="search-container">
            <input type="text" name="search" placeholder="ค้นหาชื่อหอพัก...">
            <button type="submit"><i class="fa fa-search"></i></button>
  </form>
        </div> -->
        <form action="search.php" method="GET">
        <div class="search-container">
            <label for="search"></label>
            <input type="text" id="search" name="search" placeholder="ค้นหาชื่อหอพัก...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        </div>
          <ul>
            <li> 
              <a href="#">ประเภท </a>
              <ul class="dropdown">
                <li><a href="user_internal.php">หอพักภายใน</a></li>
                <li><a href="user_external.php">พอพักภายนอก</a></li>
                <li><a href="user_centric.php">หอพักเครือข่าย</a></li>
              </ul>
            </li>
            <li> 
              <a href="#">ราคา</a>
              <ul class="dropdown">
                <li><a href="user_price_a.php">1,000-3,999</a></li>
                <li><a href="user_price_b.php">4,000-6,999</a></li>
                <li><a href="user_price_c.php">7,000 ขึ้นไป</a></li>
              </ul>
            </li>
           
            <li> 
              <a>Hi, <?php echo $_SESSION['user']; ?></a>
              <ul class="dropdown">
                <li><a href="logout.php"><h5>ออกจากระบบ</h5></a></li>
            
              </ul>
            </li>
       
        </div>        
        <div class="content">
          <div class="kus" style="width:50%;">
            <div class="tnx">
              <h2><i class="fas fa-map-marker-alt"></i>มก.ฉกส.</h2>
            </div>
            <div class="txt">
              <h1>แนะนำ</h1>
              <h1>หอพัก</h1>
            </div>
            <p>เว็บไซต์แนะนำหอพักรอบมหาวิทยาลัยเกษตรศาสตร์วิทยาเขตเฉลิมพระเกียรติจังหวัดสกลนคร</p>
          </div>
        </div>
 
      </div>

</body>
</html>
