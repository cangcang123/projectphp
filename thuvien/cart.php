<?php
include"./connect.php";
?>
<?php
if(isset($_POST['update'])){
            if(empty($_POST['quantity'])){
                echo"hok có sản phẩm";
            }else{            
          foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        }
        } 
          
    } 
  
?>
<?php
if(isset($_GET['action']) && $_GET['action']=="delete"){
    $idsp = $_GET['idsp'];
                unset($_SESSION['cart'][$idsp]); 
}
?>
<?php
if(isset($_POST['buy'])){
	if(!isset($_SESSION['iduser'])){
		echo"<h1>Bạn Chưa Đăng Nhập</h1>";
	}
	else{
        $iduser = $_SESSION['iduser'];
        foreach ($_SESSION["cart"] as $key=>$value) {
            $quantity = $value["quantity"];
            $idsp = $value["idsp"];
            $shop = $db->query("INSERT INTO cartdetal(idsp,quantity) VALUES('$idsp','$quantity')");
           $shop2 = $db->query("SELECT * FROM cartdetal WHERE idcd");
                      foreach ($shop2 as $value) {
                          $idcd = $value["idcd"];
                      }
            print_r($idsp);
            $status = 0;
            $cart = $db->query("INSERT INTO cart(idcd,iduser,status) VALUES('$idcd','$iduser','$status')");
                      unset($_SESSION['cart']);
                      header('location:index.php');
        }
	// 	$sql="SELECT * FROM product WHERE idsp IN ("; 
                      
 //                    foreach($_SESSION['cart'] as $id => $value) { 
 //                        $sql.=$id.","; 
 //                    } 
                      
 //                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
 //                    $query=$db->query($sql); 
 //                    $totalprice=0; 
 //                    while($row=$query->fetch(PDO::FETCH_ASSOC)){
 //                    	$subtotal=$_SESSION['cart'][$row['idsp']]['quantity']*$row['price']; 
 //                        $totalprice+=$subtotal; 
 //                    	$idsp = $row["idsp"];
 //                    	$quantity = $_SESSION['cart'][$row['idsp']]['quantity'];
 //                    	$total = $totalprice;
 //                    	$iduser = $_SESSION['iduser'];
 //                    	$shop = $db->query("INSERT INTO cartdetal(idsp,quantity) VALUES('$idsp','$quantity')");
 //                    	$shop2 = $db->query("SELECT * FROM cartdetal WHERE idcd");
 //                    	foreach ($shop2 as $value) {
 //                    		$idcd = $value["idcd"];
 //                    	}
 //                    	$cart = $db->query("INSERT INTO cart(idcd,iduser,total) VALUES('$idcd','$iduser','$total')");
 //                    	unset($_SESSION['cart']);
 //                    	header('location:index.php');
	// }
}
}

?>
?>
<?php
 if(isset($_SESSION['cart'])){  
?>
<div class="center_content">
    
	<form method="POST" action=""> 
                    
	<table>
        <table class="table">

                                                <thead>
                                                    <tr>
                                                        <th scope="col">tên</th>
                                                        <th scope="col">giá</th>
                                                        <th scope="col">sl</th>
                                                        <th scope="col">tổng cộng</th>
                                                    </tr>
                                                </thead>
                                                <?php
                     if(isset($_SESSION['cart'])){  
                                          $totalprice=0;      
                     foreach ($_SESSION['cart'] as $key => $row) {
                        $subtotal=$row["quantity"]*$row['price']; 
                        $totalprice+=$subtotal; 
                    ?> 
                                                <tbody>
                                                    <?php foreach ($_SESSION['cart'] as $value5) {?>
                                                        <input type="hidden" value="<?php echo $value5["idsp"]?>" name="idsp3">
                                                    <?php }?>
                                                    <tr>
                                                        <td scope="row"><?php echo $row["name"] ?></td>
                                    
                                                        <td><?php echo number_format($row["price"],0,',','.') ?> VNĐ</td>
                                                        <td><input type="text" name="quantity[<?php echo $row['idsp'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['idsp']]['quantity'] ?>" />&emsp; &emsp; &emsp;</td>
                                                <td ><?php echo number_format($subtotal,0,',','.')." VNĐ"?></td>
                                                        <td><a href="cart.php?action=delete&idsp=<?php echo $row['idsp']?>" class="mb-1 btn btn-warning">xóa</a></td>
                                             <input type="hidden" value="<?php echo $_SESSION['cart'][$row['idsp']]['quantity']?>" name="idsp2s">                                                                        
                                                    </tr>
                                                     <?php            
                 } }
        ?> 
                                                </tbody>
                                            </table>
                                           <?php if(isset($_SESSION['cart'])){  ?>
                                        <tr> 
                        <td colspan="4"><h2 style="color:red;" >Tổng Tiền Thanh Toán: <?php echo number_format($totalprice,0,',','.') ?> VNĐ</h2></td>
                        <td><button class="mb-1 btn btn-success" type="submit" name="update">cập nhật</button></td>
                        <td><button class="mb-1 btn btn-info" type="submit" name="buy">Mua Hàng</button></td> 
                    </tr> 
                <?php } ?>
                
    </table>
</form>

</div>
<?php
}
else{
    header("Location:index.php");
?>
<div class="center_content">
	<form method="POST" action=""> 
	<table>
                                        <thead>
                                            <tr>
                                                
                                                <th>ten spaaaaaaaaaaaaaaa                 </th>
                                                <th>gia</th>
                                                <th>sl</th>
                                                
                                                <th>tong cong</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                   				<td ></td>
                                                
                                            
                                            
                                                
                                            </tr>

                                        </tbody>
                                        <tr> 
                        <td colspan="4">Total Price:</td>
                       
                    </tr> 
    </table>
</form>
</div>
<?php
}
?>


