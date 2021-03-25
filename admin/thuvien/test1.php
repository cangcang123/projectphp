<?php
include"connect.php";
$lt = $db->prepare("SELECT * FROM productype");
$lt->execute();
$sho = $lt->fetchAll();
?>
<?php  
if( isset($_POST["them"])){
    $name = $_POST["name"];
    $type = $_POST["idtype"];
    settype($type, "int");
    $sp =$db->query("INSERT INTO test1(name,idt) VALUES ('$name','$type')");
    echo"$sp";
}
?>
            <div class="center_content">
      <form action="" method="POST">
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
                                    <div class="form_row">
                                        <label class="contact"><strong>tên:</strong></label>
                                        <input type="text" class="contact_input" name="name" />
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
                                    <div class="form_row"><br/>
                                        <input type="submit"  class="prod_details" name="them" value="thêm">
                                    </div>              
                            </div>
        </div>
      </div>
    </form>
    </div>
                        <span class="status--denied">Denied</span>
