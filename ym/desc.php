<?php
header("Content-Type:text/html;charset=utf-8");
	include 'db1.php';
  $id=$_GET['a'];
	//include 'function.php';
	$sql="select * from $tbname where id='".$id."'";
	// var_dump($sql);
	$query = mysql_query($sql);
	$roww  = mysql_fetch_assoc($query);

  // 生成二维码开始
  include 'phpqrcode.php';      
  $value =  $roww['txt3'];//二维码内容      
  $errorCorrectionLevel = 'L'; //容错级别     
  $matrixPointSize = 6; //生成图片大小  
  // 生成二维码图片     
  QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);  
  //生成中间带logo的二维码       
  $logo = 'img/logo.png'; // logo图片是你自己放到文件夹里的    
  $QR = 'qrcode.png';      
  if($logo !== FALSE)    
  {   
    $QR = imagecreatefromstring(file_get_contents($QR));    
    $logo = imagecreatefromstring(file_get_contents($logo));    
    $QR_width = imagesx($QR);    
    $QR_height = imagesy($QR);    
    $logo_width = imagesx($logo);    
    $logo_height = imagesy($logo);    
    $logo_qr_width = $QR_width / 5;    
    $scale = $logo_width / $logo_qr_width;    
    $logo_qr_height = $logo_height / $scale;    
    $from_width = ($QR_width - $logo_qr_width) / 2;    
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);    
  }    
  imagepng($QR,'ewm.png'); 
  // 生成二维码图片结束  
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>详细</title>
    <!-- Bootstrap -->
    <link href="./lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="ym.ico" rel="shortcut icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="./lib/html5shiv/html5shiv.min.js"></script>
    <script src="./lib/respond/respond.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/index.css">
    <script src="./js/fanye.js"></script>
  </head>
  <body>
   <!-- 网站顶部 -->
     <?php include 'header.php'; ?>
    <div class="container fun">
     <div style="width:30%;margin-left:20%;float:left;">
     <h4 style="color:#abb;">[程序预览]</h4>
       <iframe src=<?php echo $roww['txt3']; ?> id="iframepage" name="iframepage" frameBorder=0 scrolling=no width="320px" height="568px" onLoad="iFrameHeight()" ></iframe>
     </div>
     <div style="width:30%;float:left;">
     <h4 style="color:#abb;">[程序标题]</h4>
       <h5><?php echo $roww['txt1']; ?></h5>
       <br>
       <h4 style="color:#abb;">[程序介绍]</h4>
       <h5><?php echo $roww['txt2']; ?></h5>
       <br>
       <h4 style="color:#abb;">[程序二维码]</h4>
       <h5>手机预览请用微信扫描下方二维码</h5>
       <h5>（不能打开或者功能不正常的请用微信扫一扫）</h5>
       
      <img src='ewm.png' alt="...">
     </div>
     </div>
     <br>
   <!-- 网站底部 -->
   <?php include 'footer.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./lib/jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.js"></script>
  </body>
</html>