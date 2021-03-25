  <?php include"connect.php"; 
?>
<?php
if( isset($_POST["dangky"]) && $_POST["name"] !=''  && $_POST["username"] != '' && $_POST["email"] != '' 
     && $_POST["phone"] != '' && $_POST["adress"] != '' && $_POST["password"] != ''){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $adress = $_POST["adress"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"];
  $adgroup = 0;
  $active = 0;
  $password = md5($password);
  if( $password == $password2){ 
  echo"password không giống nhau";
}

   $dangky = $db->query("INSERT INTO Users(name,username,email,phone,adress,password,adgroup,active) VALUES('$name','$username','$email','$phone','$adress','$password','$adgroup',
    '$active')");
}
if(isset($_POST["dangky"]) == true){
  header('location:taikhoan.php');
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
      <div class="center_title_bar">Đăng ký</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <form action="" method="POST">
          <div class="contact_form">
          
            <div class="form_row">
              <label class="contact"><strong>tên:</strong></label>
              <input type="text" class="contact_input" name="name" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>username:</strong></label>
              <input type="text" class="contact_input" name="username"/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="email" class="contact_input" name="email" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Phone:</strong></label>
              <input type="phone" class="contact_input" name="phone" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>địa chỉ:</strong></label>
              <input type="adress" class="contact_input" name="adress" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>password:</strong></label>
              <input type="password" class="contact_input" name="password" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>repassword:</strong></label>
              <input type="password" class="contact_input" name="password2" />
            </div>
            <div class="form_row"> <input type="submit" class="prod_details" name="dangky" value="Đăng Ký"> </div>          
          </div>
          </form>
        </div>
      </div>
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
