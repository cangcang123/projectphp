<?php
include"connect.php";
$lt = $db->prepare("SELECT * FROM productype");
$lt->execute();
$sho = $lt->fetchAll();
?>
<?php  
if( isset($_POST["them"])){

    $name = $_POST["namesp"];
    $price = $_POST["price"];
        settype($gia, "int");
    $gb = $_POST["gb"];
        settype($gb, "int");
    $color = $_POST["color"];
    $type = $_POST["type"];
    $idtype = $_POST["idtype"];
    settype($idtype, "int");
    $content = $_POST["content"];
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $div = explode('.',$file_name);
    $fileima = explode('.',$file_name);
    $image_ext = strtolower(end($fileima));
    $expensions= array("jpeg","jpg","png");
    move_uploaded_file($file_tmp,"../image/".$file_name);
    $sp =$db->query("INSERT INTO product(name,price,gb,color,type,idtype,content,image) VALUES ('$name','$price','$gb','$color','$type','$idtype','$content','$file_name')");
    if(isset($_POST["them"]) == true){
        echo "<br><h1>thêm thành công</h1>";
} 
}
?>
<br/>
<br/>
    



            <div class="center_content">
      <form action="" method="POST" enctype = "multipart/form-data">
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
                                    <div class="form_row">
                                        <label class="contact"><strong>tên:</strong></label>
                                        <input type="text" class="contact_input" name="namesp" />
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>giá:</strong></label>
                                        <input type="text" class="contact_input" name="price"/>
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>dung lượng:</strong></label>
                                        <input type="text" class="contact_input" name="gb"/>
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>màu:</strong></label>
                                        <input type="text" class="contact_input" name="color"/>
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>kiểu:</strong></label>
                                        <input type="text" class="contact_input" name="type"/>
                                    </div>
                                    
                                    <div class="form_row">
                                        <label class="contact"><strong>kiểu sản phẩm1:</strong></label>
                                        <input list="idtype" class="contact_input" name="idtype"/>
                                        <datalist id="idtype">
                                            <?php foreach($sho as $row1) {?>
                                        <option  value="<?php echo  $row1['idt'];?>" ><?php  echo $row1['name'];?></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>nội dung:</strong></label>
                                        <input type="text" class="contact_input" name="content"/>
                                    </div>
                                    <div class="form_row">
                                        <label for="img" class="contact"><strong>ảnh:</strong></label>
                                        <input type="file" id="img" accept="image/*" class="contact_input" name="image"/>
                                    </div>
                                    <div class="form_row"><br/>
                                        <input type="submit"  class="prod_details" name="them" value="thêm">
                                    </div>

                    
                            </div>
        </div>
      </div>
    </form>
    </div>
                        