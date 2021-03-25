<?php
include"connect.php";
$lt = $db->prepare("SELECT * FROM productype");
$lt->execute();
$sho = $lt->fetchAll();
?>
<?php
    $idsp = $_GET['idsp'];
    $sp = $db->query("SELECT * FROM product WHERE idsp = $idsp");
    $sp1 =  $sp->fetch(PDO::FETCH_ASSOC);
?>
<?php  
if( isset($_POST["sua"])){
    $name = $_POST["name"];
    $price = $_POST["price"];
        settype($gia, "int");
    $gb = $_POST["gb"];
        settype($gb, "int");
    $color = $_POST["color"];
    $type = $_POST["type"];
    $idtype = $_POST["idtype"];
    settype($idtype, "int");
    $content = $_POST["content"];
    $image = $_POST["image"];
    $sp2 =$db->query("UPDATE product SET name = '$name', price = '$price', gb = '$gb', color = '$color', type = '$type',
            idtype = '$idtype', content = '$content', image = '$image' WHERE idsp = '$idsp'");
    if($sp2 == TRUE){
        echo"Thành Công";
    }
}
?>
<br/>
<br/>
<br/>
 <div class="center_content">
      <form action="" method="POST">
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
                
                    
                                        
                                    <div class="form_row">
                                        <label class="contact"><strong>tên:</strong></label>
                                        <input type="text" value="<?php echo $sp1['name'] ?>" class="contact_input" name="name" />
                                   
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>giá:</strong></label>
                                        <input type="text" value="<?php echo $sp1['price'] ?>" class="contact_input" name="price"/>
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>dung lượng:</strong></label>
                                        <input type="text" value="<?php echo $sp1['gb'] ?>" class="contact_input" name="gb"/>
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>màu:</strong></label>
                                        <input type="text" value="<?php echo $sp1['color'] ?>" class="contact_input" name="color"/>
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>kiểu:</strong></label>
                                        <input type="text" value="<?php echo $sp1['type'] ?>" class="contact_input" name="type"/>
                                    </div>
                                    
                                    <div class="form_row">
                                        <label class="contact"><strong>kiểu sản phẩm1:</strong></label>
                                        <input list="idtype" value="<?php echo $sp1['idtype'] ?>" class="contact_input" name="idtype"/>
                                        <datalist id="idtype">
                                            <?php foreach($sho as $row1) {?>
                                        <option  value="<?php echo  $row1['idt'];?>" ><?php  echo $row1['name'];?></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>nội dung:</strong></label>
                                        <input type="text" value="<?php echo $sp1['content'] ?>" class="contact_input" name="content"/>
                                    </div>
                                    <div class="form_row">
                                        <label for="img" class="contact"><strong>ảnh:</strong></label>
                                        <input type="file" id="img" accept="image/*" class="contact_input" name="image"/>
                                    </div>
                                    <div class="form_row"><br/>
                                        <input type="submit"  class="prod_details" name="sua" value="sửa">
                                    </div>

                    
                            </div>
        </div>
      </div>
    </form>
    </div>
                        