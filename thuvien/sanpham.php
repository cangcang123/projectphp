<?php include"./connect.php";
$idsp = intval($_GET['idsp']); 
$show = $db->query("SELECT * FROM product WHERE idsp = $idsp");
?>

<script type="text/javascript" src="js/boxOver.js"></script>
<script>
PositionX = 100;
PositionY = 100;
defaultWidth  = 500;
defaultHeight = 500;
var AutoClose = true;
if (parseInt(navigator.appVersion.charAt(0))>=4){
var isNN=(navigator.appName=="Netscape")?1:0;
var isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}
var optNN='scrollbars=no,width='+defaultWidth+',height='+defaultHeight+',left='+PositionX+',top='+PositionY;
var optIE='scrollbars=no,width=150,height=100,left='+PositionX+',top='+PositionY;
function popImage(imageURL,imageTitle){
if (isNN){imgWin=window.open('about:blank','',optNN);}
if (isIE){imgWin=window.open('about:blank','',optIE);}
with (imgWin.document){
writeln('<html><head><title>Loading...</title><style>body{margin:0px;}</style>');writeln('<sc'+'ript>');
writeln('var isNN,isIE;');writeln('if (parseInt(navigator.appVersion.charAt(0))>=4){');
writeln('isNN=(navigator.appName=="Netscape")?1:0;');writeln('isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}');
writeln('function reSizeToImage(){');writeln('if (isIE){');writeln('window.resizeTo(300,300);');
writeln('width=300-(document.body.clientWidth-document.images[0].width);');
writeln('height=300-(document.body.clientHeight-document.images[0].height);');
writeln('window.resizeTo(width,height);}');writeln('if (isNN){');       
writeln('window.innerWidth=document.images["George"].width;');writeln('window.innerHeight=document.images["George"].height;}}');
writeln('function doTitle(){document.title="'+imageTitle+'";}');writeln('</sc'+'ript>');
if (!AutoClose) writeln('</head><body bgcolor=ffffff scroll="no" onload="reSizeToImage();doTitle();self.focus()">')
else writeln('</head><body bgcolor=ffffff scroll="no" onload="reSizeToImage();doTitle();self.focus()" onblur="self.close()">');
writeln('<img name="George" src='+imageURL+' style="display:block"></body></html>');
close();		
}}

</script>
<?php foreach ($show as $value) { ?>
<div class="center_content">
      <div class="center_title_bar"><?php echo $value["name"] ?></div>
      <div class="prod_box_big">
        <form action="" method="POST">
        <div class="center_prod_box_big">
          <div class="product_img_big"> <a href="javascript:popImage('./image/<?php echo $value["image"] ?>','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]"><img height="150" width="150" src="./image/<?php echo $value["image"] ?>" alt="" border="0" /></a>
            <div class="thumbs"> <a href="#" title="header=[Thumb1] body=[&nbsp;] fade=[on]"><img src="./image/" alt="" border="0" /></a> <a href="#" title="header=[Thumb2] body=[&nbsp;] fade=[on]"><img src="./image/" alt="" border="0" /></a> <a href="#" title="header=[Thumb3] body=[&nbsp;] fade=[on]"><img src="./image/" alt="" border="0" /></a> </div>
          </div>
          <div class="details_big_box">
            <div class="product_title_big"><?php echo $value["name"] ?></div>
            <div class="specifications">Lo???i: <span class="blue"><?php echo $value["type"] ?></span><br />
              Dung l?????ng: <span class="blue"><?php echo $value["gb"] ?> GB</span><br />
              M??u :<span class="blue"> <?php echo $value["color"] ?></span><br />
              th??ng tin :<span class="blue"> <?php echo $value["content"] ?>. </span><br />
            </div>
            <div class="prod_price_big"><span class="reduce"></span> <span class="price"><?php echo number_format($value["price"],0,',','.') ?> VN??</span></div>
            
            <a href="index.php?page=products&action=add&idsp=<?php echo $value['idsp'] ?>" class="prod_buy">Mua</a>
            
            </div>
        </div>
      </form>
      </div>
    </div>
    <?php } ?>