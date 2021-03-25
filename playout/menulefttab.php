<?php include"./connect.php";
$show = $db->query("SELECT * FROM productype WHERE  idpro = 4");
$show2 = $db->query("SELECT * FROM productype WHERE  idpro = 5");
?>

<div class="left_content">
      <div class="title_box">ipad</div>
       <?php foreach($show as $value){ ?>
      <ul class="left_menu">
        <li class="even"><a href="./listsp.php?idt=<?php echo $value["idt"]?>"><?php echo $value["name"] ?></a></li>
        <?php } ?>
        <div class="title_box">Samsung</div>
        <?php foreach($show2 as $value1){ ?>
      <ul class="left_menu">
        <li class="even"><a href="listsp.php?idt=<?php echo $value1["idt"]?>"><?php echo $value1["name"] ?></a></li>
        <?php } ?>
        
      
      
    </div>