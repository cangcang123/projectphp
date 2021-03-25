<br>
<?php
include"connect.php";
$show = $db->query("SELECT u.username as name,u.phone as phone,p.name as proname , p.price as price ,cd.quantity as sl, c.status as status, c.idc as idc  FROM cart c join users u on c.iduser = u.iduser join cartdetal cd on c.idcd = cd.idcd join product p on cd.idsp = p.idsp  WHERE c.iduser >0 AND c.idc ");
?>
<?php
if(isset($_GET['action']) && $_GET['action']=="duyet"){ 
    $idc = $_GET['idc'];
    $update = $db->query("UPDATE cart SET status='1' WHERE idc=$idc ");
}
if(isset($_GET['action']) && $_GET['action']=="xoa"){ 
    $idc = $_GET['idc'];
    $update = $db->query("DELETE FROM cart WHERE idc=$idc");
}
?>
<br/>
<div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                                
                                <div class="table-responsive table-responsive-data2">
                                    <form action="" method="POST">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                
                                                <th>name</th>
                                                <th>SĐT</th>
                                                <th>tên khách</th>
                                                
                                                <th>status</th>
                                                <th>số lượng</th>
                                                <th>Giá</th>
                                                <th>tổng tiền</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php foreach ($show as $row) { ?>
                                         
                                        <tbody>
 
                                            <tr class="tr-shadow">
                                                
                                                <input type="hidden" value="<?php echo $row['idc']?>" name="idc" >
                                                <td><?php echo $row["proname"] ?></td>
                                                <td>
                                                    <span class="block-email"><?php echo $row["phone"] ?></span>
                                                </td>
                                                <td class="desc"><?php echo $row["name"] ?></td>
                                                
                                                <td>
                                                    <span class="status--process"><?php if($row["status"]==0){ 
                                                        echo"Chưa Duyệt";}
                                                        else{
                                                        echo"Đã Duyệt";
                                                    } ?></span>
                                                </td>
                                                <td><?php echo $row["sl"] ?></td>
                                                 <td><?php echo number_format($row["price"],0,',','.')." VNĐ"  ?></td>
                                                <td><?php echo number_format($row["sl"]*$row["price"],0,',','.')." VNĐ"  ?></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                       
                                                            <a  class="item" href="cart.php?action=duyet&idc=<?php echo $row["idc"]?>"><i class="zmdi zmdi-edit"></i></a>
                                                        
                                                        <a  class="item" href="cart.php?action=xoa&idc=<?php echo $row["idc"]?>"><i class="zmdi zmdi-delete"></i></a>
                                                           
                                                        
                                                        
                                                    </div>
                                                </td>
                                           
                                            </tr>
                                            <tr class="spacer"></tr>
                                        </tbody>
                                         <?php } ?>
                                         
                                    </table>
                                </form>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>