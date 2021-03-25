<?php 
include "connect.php";
function sanpham(){
	$db = "select * form products where idpro == 1 and limit 0,10"
	return query($db);
}
?>