
 <div id="header">
    <div class="top_right"> 
      <div class="languages"> 
        <div class="lang_text">
          <?php
          if( isset($_SESSION["iduser"]))
            echo"xin chao" . $_SESSION["name"];

        ?>
      </div>
        </div>
      <div class="big_banner"> <a href="#"><img src="images/banner728.jpg" alt="" border="0" /></a> </div>
    </div>
    <div id="logo"> <a href="#"><img src="images/logo.png" alt="" border="0" width="182" height="85" /></a> </div>
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <ul class="menu">
        <li><a href="index.php" class="nav"> Trang Chủ </a></li>
        <li class="divider"></li>
        <li><a href="dienthoai.php" class="nav">Điện Thoại</a></li>
        <li class="divider"></li>
        <li><a href="table.php" class="nav">Table</a></li>
        <li class="divider"></li>
        <li><a href="phukien.php" class="nav">Phụ Kiện</a></li>
        <li class="divider"></li>
        <li><a href="./dangnhap.php" class="nav">Tài Khoản</a></li>
        <li class="divider"></li>
        <li><a href="./lienhe.php" class="nav">Liên hệ</a></li>
        
        
      </ul>
    </div>