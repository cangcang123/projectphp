<?php
session_start();
include"connect.php";
if(isset($_POST["out"])){
  unset($_SESSION["iduser"]);
  unset($_SESSION["name"]);
  header("Location:index.php");
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
        <div class="center_content">
      <div class="center_title_bar">Tai Khoản</div>
      
      <div class="prod_box_big">
        <form method="POST" action="">
        <div class="center_prod_box_big">
          <h3>hello <?php echo $_SESSION['name']; ?></h3>
          
          <input type="submit" name="out" value="Thoát">
      </div>
      </form>
  </div>
</div>

       <?php require "playout/menuright.php"; ?>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <?php require "playout/footer.php"; ?>
</div>
<!-- end of main_container -->
</body>
</html>