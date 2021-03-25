<?php include"./connect.php";
$show = $db->query("SELECT * FROM productype WHERE  idpro = 1");
$show2 = $db->query("SELECT * FROM productype WHERE  idpro = 2");
$show3 = $db->query("SELECT * FROM productype WHERE  idpro = 3"); 
?>

<div class="left_content">
      <div class="title_box">điện thoại</div>
       <?php foreach($show as $value){ ?>
      <ul class="left_menu">
        <li class="even"><a href="./listsp.php?idt=<?php echo $value["idt"]?>"><?php echo $value["name"] ?></a></li>
        <?php } ?>
        <?php foreach($show2 as $value1){ ?>
      <ul class="left_menu">
        <li class="even"><a href="listsp.php?idt=<?php echo $value1["idt"]?>"><?php echo $value1["name"] ?></a></li>
        <?php } ?>
        <?php foreach($show3 as $value2){ ?>
      <ul class="left_menu">
        <li class="even"><a href="listsp.php?idt=<?php echo $value2["idt"]?>"><?php echo $value2["name"] ?></a></li>
        <?php } ?>
      </ul>
      
      
    </div>