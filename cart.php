<?php
session_start(); 
include"connect.php"; 
if(isset($_GET["p"]))
  $p = $_GET["p"];
else
  $p = " ";
// kiem tra có tồn tại là isset . thanh địa chỉ có biến p . thì đặt 1 biến $p in ra cái  p đã nhận được là $_GET["p"]
// $_GET là nhận những dữ liệu do người dùng nhập / ngược lại biến p là rỗng vì người dùng hok nhập cái p nào
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tools Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
<link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" /><!--[if IE 6]>

<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<link id="sleek-css" rel="stylesheet" href="css/sleek.css" />

<script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>
<div id="main_container">
  <?php include "playout/menu.php"; ?>
 
    <!-- end of menu tab -->

    <?php require "playout/menuleft.php"; ?>
 
    <!-- end of left content -->
    <?php require "thuvien/cart.php";?>
    <!-- end of center content -->
   
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php require "playout/footer.php"; ?>
</div>
<!-- end of main_container -->
</body>
</html>
