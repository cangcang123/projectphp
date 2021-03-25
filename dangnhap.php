<?php
session_start();
if(isset($_SESSION['iduser'])){
  header('location:taikhoan.php');
  //require "taikhoan.php";
} 
include"connect.php";
if (isset($_POST["dangnhap"]) && $_POST["username"] !='' && $_POST["password"] !=''){
  $un = $_POST["username"];
  $pa = $_POST["password"];
  $pa = md5($pa);
  $user = $db->query(" SELECT * FROM  users WHERE username = '$un' AND  password = '$pa' ");
  if( $user->rowCount() == 1){
  //dang nhap dung
  $row =$user->fetch(PDO::FETCH_ASSOC);
  $_SESSION["iduser"] = $row['iduser'];
  $_SESSION["name"] = $row['name'];
  
  header("Location:taikhoan.php");
}
  else {
  echo"sai pass hoặc username";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tools Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->

<script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>
<div id="main_container">
  <?php include "playout/menu.php"; ?>
 
    <!-- end of menu tab -->
    <?php require "playout/menulef.php"; ?>
 
    <!-- end of left content -->
    <div class="center_content">
      <form action="" method="POST">
      <div class="center_title_bar">Đăng ký</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
            
            <div class="form_row">
              <label class="contact"><strong>username:</strong></label>
              <input type="text" class="contact_input" name="username" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>password:</strong></label>
              <input type="password" class="contact_input" name="password"/>
            </div>
            
            <div class="form_row">
              <input type="submit" class="prod_details" name="dangnhap" value="đăng nhập">
              <a href="dangky.php" class="prod_details">đăng ký</a> </div>
            
          </div>
        </div>
      </div>
    </form>
    </div>
    <!-- end of center content -->
   <?php require "playout/menuright.php"; ?>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php require "playout/footer.php"; ?>
</div>
<!-- end of main_container -->
</body>
</html>
