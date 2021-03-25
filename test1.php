<?php
session_start();
include"connect.php";
?>
<?php
    if(isset($_SESSION['iduser'])){
        $tu = $_SESSION['iduser'];
        echo $tu;
    }
?>
