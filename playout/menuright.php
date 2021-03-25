 <?php
 $ok=1;
 if(isset($_SESSION['cart'])){
  foreach ($_SESSION['cart'] as $k => $v) {
    if(isset($v)){
      $ok=2;
    }
  }
 }
 ?>
 <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
        <form method="GET" action="search.php">
        <input type="text" name="namesearch" class="newsletter_input" value="keyword"/>
        <input type="submit" class="join" name="search" value="search">
      </form>
      <div class="shopping_cart">
        <div class="title_box">Shopping cart</div>
        <div class="cart_details"><?php 
                 if($ok!=2){
                  echo "0 items";
                }else{
                  $item = $_SESSION['cart'];
                  echo count($item) ." items";
                }
        ?><br />
          <span class="border_cart"></span><span class="price"></span> </div>
        <div class="cart_icon"><a href="cart.php"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
    </div>