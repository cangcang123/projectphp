<?php
include"connect.php";
?>
<?php
    $iduser = $_GET['iduser'];
    $sp = $db->query("SELECT * FROM users WHERE iduser = $iduser");
    $sp1 =  $sp->fetch(PDO::FETCH_ASSOC);
?>
<?php  
if( isset($_POST["sua"])){
    $adgroup = $_POST["adgroup"];
        settype($adgroup, "int");
    $active = $_POST["active"];
        settype($active, "int");
    $sp2 =$db->query("UPDATE users SET adgroup = '$adgroup', active = '$active' WHERE iduser = '$iduser'");
    if($sp2 == TRUE){
        echo "thanh cong";
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
                                        <label class="contact"><strong>adgroup:</strong></label>
                                        <input type="text" value="<?php echo $sp1['adgroup'] ?>" class="contact_input" name="adgroup" />
                                   
                                    </div>
                                    <div class="form_row">
                                        <label class="contact"><strong>active:</strong></label>
                                        <input type="text" value="<?php echo $sp1['active'] ?>" class="contact_input" name="active"/>
                                    </div>
                                    <div class="form_row"><br/>
                                        <input type="submit"  class="prod_details" name="sua" value="sửa">
                                    </div>
                            </div>
        </div>
      </div>
    </form>
    </div>
                        