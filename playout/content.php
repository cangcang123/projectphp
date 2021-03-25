<?php include"./connect.php";

$sp_tungtrang = 6;
if(!isset($_GET['pages'])){
    $trang = 1;
}else{
    $trang = $_GET['pages'];
}
$tung_trang = ($trang-1)*4;
$show = $db->query("SELECT * FROM product");
$sotongtrang = $show->rowCount();
$so1trang = 4;
$sotrang = ceil($sotongtrang/$so1trang);

$show = $db->query("SELECT product.name,product.idsp,product.image,product.price,product.gb FROM product JOIN productype ON product.idtype = productype.idt JOIN prodtype on prodtype.idp = productype.idpro JOIN namprod on namprod.id = prodtype.idname  WHERE namprod.id = 1 limit 0,6");

$show2 = $db->query("SELECT product.name,product.idsp,product.image,product.price,product.gb FROM product JOIN productype ON product.idtype = productype.idt JOIN prodtype on prodtype.idp = productype.idpro JOIN namprod on namprod.id = prodtype.idname  WHERE namprod.id = 2 limit 0,6");
?>
<?php 

    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          if(isset($_SESSION['iduser'])){//nếu là user
        $idsp=intval($_GET['idsp']); 
          
        if(isset($_SESSION['cart'][$idsp])){ 
              
            $_SESSION['cart'][$idsp]['quantity']++; 
              
        }else{
                $sql_s="SELECT * FROM product 
                WHERE idsp={$idsp}"; 
            $query_s=$db->query($sql_s); 
            if($query_s->rowCount()!=0){ 
                $row_s=$query_s->fetch(PDO::FETCH_ASSOC);      
                $_SESSION['cart'][$idsp]=array(
                    "iduser" => $_SESSION["iduser"],
                    "idsp" => $_GET["idsp"], 
                        "quantity" => 1, 
                        "price" => $row_s['price'],
                        "name"=>$row_s['name']

                    ); 
                  
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
        }else{

        $idsp=intval($_GET['idsp']); 
          
        if(isset($_SESSION['cart'][$idsp])){ //nếu là custumer
              
            $_SESSION['cart'][$idsp]['quantity']++; 
              
        }else{
                $sql_s="SELECT * FROM product 
                WHERE idsp={$idsp}"; 
            $query_s=$db->query($sql_s); 
            if($query_s->rowCount()!=0){ 
                $row_s=$query_s->fetch(PDO::FETCH_ASSOC); 
                 $_SESSION['cart'][$idsp]=array(
                         "idsp" => $idsp, 
                         "quantity" => 1, 
                         "price" => $row_s['price'],
                         "name"=>$row_s['name']

                     ); 
                  
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
        }  
    } 
?>
<td>
<div class="center_content">
      
      <div class="center_title_bar">Điện Thoại</div>
  <?php foreach ($show as $value) { ?>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>"><?php echo $value["name"] ?></a></div>
          <div class="product_img"><a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>"><img height="100" width="100" src="./image/<?php echo $value["image"] ?>" alt="" border="0" /></a></div>
          <div class="prod_price"><?php echo $value["gb"] ?>GB <span class="price"><?php echo number_format($value["price"],0,',','.') ?> VNĐ</span></div>
        </div>
        <div class="prod_details_tab"> 
          
        <a href="index.php?page=products&action=add&idsp=<?php echo $value['idsp'] ?>" class="prod_buy">mua</a>
      
          <a href="sanpham.php?idsp=<?php echo $value["idsp"] ?>" class="prod_details">Xem</a> </div>
      </div>
    <?php } ?>
<!--  -->
    <?php
        // for($t=1; $t<=$sotrang; $t++){
        //   echo "<a href='index.php?pages=$t'>$t</a>&emsp;&emsp;";
        // }
      ?>
      <div class="center_title_bar">Máy tính bảng</div>
      <?php foreach ($show2 as $value2) { ?>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="sanpham.php?idsp=<?php echo $value2["idsp"] ?>"><?php echo $value2["name"] ?></a></div>
          <div class="product_img"><a href="sanpham.php?idsp=<?php echo $value2["idsp"] ?>"><img height="100" width="100" src="./image/<?php echo $value2["image"] ?>" alt="" border="0" /></a></div>
          <div class="prod_price"><?php echo $value2["gb"] ?>GB </span> <span class="price"><?php echo number_format($value2["price"],0,',','.') ?> VNĐ</span></div>
        </div>
        <div class="prod_details_tab">
        <a href="index.php?page=products&action=add&idsp=<?php echo $value2['idsp'] ?>" class="prod_buy">mua</a> 
         <a href="sanpham.php?idsp=<?php echo $value2["idsp"] ?>" class="prod_details">Xem</a> </div>
      </div>
      <?php } ?>
    </div>