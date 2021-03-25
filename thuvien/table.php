<?php include"./connect.php";
$sp_tungtrang = 6;
if(!isset($_GET['pages'])){
    $trang = 1;
}else{
    $trang = $_GET['pages'];
}
$tung_trang = ($trang-1)*4;
$show1 = $db->query("SELECT product.name,product.idsp,product.image,product.price,product.gb FROM product JOIN productype ON product.idtype = productype.idt JOIN prodtype on prodtype.idp = productype.idpro JOIN namprod on namprod.id = prodtype.idname  WHERE namprod.id = 2");
$sotongtrang = $show1->rowCount();
$so1trang = 4;
$sotrang = ceil($sotongtrang/$so1trang);
$show2 = $db->query("SELECT  product.name,product.idsp as idsp,product.image,product.price,product.gb FROM product JOIN productype ON product.idtype = productype.idt JOIN prodtype on prodtype.idp = productype.idpro JOIN namprod on namprod.id = prodtype.idname  WHERE namprod.id = 2 limit $tung_trang,$sp_tungtrang");

?>
<div class="center_content">
      
      <div class="center_title_bar">Máy tính bảng</div>
      <?php foreach ($show2 as $value2) { ?>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="sanpham.php?idsp=<?php echo $value2["idsp"] ?>"><?php echo $value2["name"] ?></a></div>
          <div class="product_img"><a href="sanpham.php?idsp=<?php echo $value2["idsp"] ?>"><img height="100" width="100" src="./image/<?php echo $value2["image"] ?>" alt="" border="0" /></a></div>
          <div class="prod_price"><span><?php echo $value2["gb"] ?>GB   </span> <span class="price"><?php echo number_format($value2["price"],0,',','.') ?> VNĐ</span></div>
        </div>
        <div class="prod_details_tab"><a href="cart.php" class="prod_buy">mua</a>  <a href="sanpham.php?idsp=<?php echo $value2["idsp"] ?>" class="prod_details">Xem</a> </div>
      </div>
      <?php } ?>
      <div class="center_title_bar"><?php
        for($t=1; $t<=$sotrang; $t++){
          echo "<a href='table.php?pages=$t'>$t</a>&emsp;";
        }
      ?>
      </div>
    </div>