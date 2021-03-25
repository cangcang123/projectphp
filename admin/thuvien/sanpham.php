<?php
include"connect.php";
$sp_tungtrang = 8;
if(!isset($_GET['pages'])){
    $trang = 1;
}else{
    $trang = $_GET['pages'];
}
$tung_trang = ($trang-1)*4;
$tl = $db->query("SELECT * FROM product order by idsp desc limit $tung_trang,$sp_tungtrang");
$show = $db->query("SELECT * FROM product");
$sotongtrang = $show->rowCount();
$so1trang = 4;
$sotrang = ceil($sotongtrang/$so1trang);

?>
    
            <div class="main-content">
                <div class="section__content section__content--p30"> &emsp;&emsp;<?php
        for($t=1; $t<=$sotrang; $t++){
          echo "<a href='sanpham.php?pages=$t'>$t&emsp;</a>";
        }
      ?> &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp; &emsp;&emsp;&emsp;
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i><a href="themsp.php">Thêm Sản Phẩm</a></button>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                
                                                <th>order ID</th>
                                                <th>tên</th>
                                                <th class="text-right">giá</th>
                                                <th class="text-right">GB</th>
                                                <th>màu</th>
                                                <th>kiểu</th>
                                                <th>nội dung</th>
                                                <th>ảnh</th>
                                                <th>tùy chỉnh</th>
                                                <th><a href="themsp.php">thêm</a></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($tl as $value ){
                                            ?>
                                            <tr>
                                                <td><?php echo $value["idsp"] ?></td>
                                                <td class="text-right"><?php echo $value["name"] ?></td>
                                                <td class="text-right"><?php echo number_format($value["price"],0,',','.') ?></td>
                                                <td ><?php echo $value["gb"] ?></td>
                                                <td ><?php echo $value["color"] ?></td>
                                                <td><?php echo $value["type"] ?></td>
                                                <td><?php echo $value["content"] ?></td>
                                                <td><img height="100" width="100" src="../image/<?php echo $value["image"] ?>" alt="" border="0" /></td>
                                                <td><a onlick="return confirm('bạn có muốn xóa không?')" href="xoasp.php?idsp=<?php echo $value["idsp"] ?>">xóa</a></td>
                                                <td><a href="suasp.php?idsp=<?php echo $value["idsp"] ?>">sửa</a></td>
                                            </tr><?php } ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        
                        