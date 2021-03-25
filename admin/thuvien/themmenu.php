<?php
include"connect.php";
$lt = $db->prepare("SELECT * FROM prodtype");
$lt->execute();
$sho = $lt->fetchAll();
?>
<?php  
if( isset($_POST["them"])){
    $name = $_POST["nametype"];
    $idpro = $_POST["idpro"];
    settype($idtype, "int");
    $sp =$db->query("INSERT INTO productype(name,idpro) VALUES ('$name','$idpro')");
    if(isset($_POST["them"]) == true){
        echo"thêm thành công";
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
                                        <input type="text" class="contact_input" name="nametype" />
                                    </div>  
                                    <div class="form_row">
                                        <label class="contact"><strong>kiểu sản phẩm1:</strong></label>
                                        <input list="idpro" class="contact_input" name="idpro"/>
                                        <datalist id="idpro">
                                            <?php foreach($sho as $row1) {?>
                                        <option  value="<?php echo  $row1['idp'];?>" ><?php  echo $row1['name'];?></option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="form_row"><br/>
                                        <input type="submit"  class="prod_details" name="them" value="thêm">
                                    </div>

                    
                            </div>
        </div>
      </div>
    </form>
    </div>
                        