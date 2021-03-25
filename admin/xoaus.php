<?php session_start(); ?>   
<?php
include"connect.php"; 
$iduser = $_GET['iduser'];
$sp = $db->query("DELETE FROM users WHERE iduser = '$iduser'");
require "./user.php";
?>
