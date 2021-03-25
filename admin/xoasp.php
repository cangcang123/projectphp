<?php session_start(); ?>   
<?php
include"connect.php"; 
$idsp = $_GET['idsp'];
$sp = $db->query("DELETE FROM product WHERE idsp = '$idsp'");
header("location:sanpham.php");
?>
