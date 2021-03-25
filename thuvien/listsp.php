<?php include"./connect.php";
$id = $_GET['idt'];
$show = $db->query("SELECT product.name,product.idsp,product.image,product.price,product.gb FROM product JOIN productype ON product.idtype = productype.idt WHERE productype.idt = $id limit 0,6");
?>
<div class="center_content">
     
      <div class="center_title_bar">Điện Thoại</div>
  <?php foreach ($show as $value) { ?>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>"><?php echo $value["name"] ?></a></div>
          <div class="product_img"><a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>"><img height="100" width="100" src="./image/<?php echo $value["image"] ?>" alt="" border="0" /></a></div>
          <div class="prod_price"><?php echo $value["gb"] ?>GB <span class="price"><?php echo number_format($value["price"],0,',','.') ?> VNĐ</span></div>
        </div>
        <div class="prod_details_tab"> <a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>" class="prod_details">Xem</a> </div>
      </div>
    <?php } ?>
</div>