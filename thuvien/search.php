<?php include"./connect.php";
if(isset($_REQUEST["search"])){
  $search = addslashes($_GET["namesearch"]);
  if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
              $sql = $db->query("SELECT * FROM product WHERE name like '%$search%'");
              $num = $sql->rowCount();
              if ($num > 0 && $search != ""){

              } 
              else{
                echo"không tìm thấy kết quả";
              }
            }
}

?>
<div class="center_content">
      
      <div class="center_title_bar">Tìm Kiếm</div>
  <?php foreach ($sql as $value) { ?>
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