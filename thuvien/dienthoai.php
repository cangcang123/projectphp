<?php include"./connect.php";

$sp_tungtrang = 6;
if(!isset($_GET['pages'])){
    $trang = 1;
}else{
    $trang = $_GET['pages'];
}
$tung_trang = ($trang-1)*4;
$show1 = $db->query("SELECT product.name,product.idsp,product.image,product.price,product.gb FROM product JOIN productype ON product.idtype = productype.idt JOIN prodtype on prodtype.idp = productype.idpro JOIN namprod on namprod.id = prodtype.idname  WHERE namprod.id = 1");
$sotongtrang = $show1->rowCount();
$so1trang = 4;
$sotrang = ceil($sotongtrang/$so1trang);

$show = $db->query("SELECT product.name,product.idsp,product.image,product.price,product.gb FROM product JOIN productype ON product.idtype = productype.idt JOIN prodtype on prodtype.idp = productype.idpro JOIN namprod on namprod.id = prodtype.idname  WHERE namprod.id = 1 limit $tung_trang,$sp_tungtrang");


?>
<div class="center_content">
      
      <div class="center_title_bar">Điện Thoại</div>
  <?php foreach ($show as $value) { ?>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>"><?php echo $value["name"] ?></a></div>
          <div class="product_img"><a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>"><img height="100" width="100" src="./image/<?php echo $value["image"] ?>" alt="" border="0" /></a></div>
          <div class="prod_price"><?php echo $value["gb"] ?>GB <span class="price"><?php echo $value["price"] ?> VNĐ</span></div>
        </div>
        <div class="prod_details_tab"> <a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>" class="prod_details">Xem</a> </div>

      </div>
    <?php } ?>
      <div class="center_title_bar"><?php
        for($t=1; $t<=$sotrang; $t++){
          echo "<a href='dienthoai.php?pages=$t'>$t</a>&emsp;";
        }
      ?>
      </div>
</div>
