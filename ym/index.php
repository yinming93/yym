<!-- 网站顶部 -->
<?php include 'header.php'; ?>
<?php 
include 'dblunbo.php';
$sq="select * from $tbname";
$quer = mysql_query($sq);
if($quer && mysql_num_rows($quer)>0){
   $qu = array();
while($ro = mysql_fetch_assoc($quer)){
    $qu[] = $ro;
}
}
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $row['title']; ?></title>
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
  </head>
  <body>
   

      <!-- 轮播图 -->
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides 轮播遍历 -->
        <div id="d" class="carousel-inner" role="listbox">
        <?php if(!empty($quer)): ?>
        <?php foreach($qu as $val): ?>
          <?php 
            // 处理图片路径 
            $img_path = 'Admin/uploads/';
            $img_path .= substr($val['filename'], 0, 4).'/';
            $img_path .= substr($val['filename'], 4, 2).'/';
            $img_path .= substr($val['filename'], 6, 2).'/';
            $img_path .= $val['filename'];
            ?>
          <div class="item">
            <img src="<?php echo $img_path ?>" alt="...">
            <div class="carousel-caption">
              
            </div>
          </div>
        <?php endforeach; ?>
        <?php endif; ?> 
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <!-- 轮播底下文字 -->
    <div class="container fun">
    <div class="row">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="./img/a1.jpg" alt="...">
          <div class="caption">
            <h3>QJ生活</h3>
            <p>那就来干点不是上班人做的事情吧</p>
            <p><a href="javascript:alert('暂未开放');" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="./img/a2.jpg" alt="...">
          <div class="caption">
            <h3>找乐子</h3>
            <p>一脸懵逼的日子才刚刚开始</p>
            <p><a href="javascript:alert('暂未开放');" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="./img/a3.jpg" alt="...">
          <div class="caption">
            <h3>留言板</h3>
            <p>心情复杂那就来留言寻找安慰吧</p>
            <p><a href="message.php" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </div>
    </div>
  <!-- 网站底部 -->
   <?php include 'footer.php'; ?>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./lib/jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.js"></script>
    <script src="./js/index.js"></script>
  </body>
</html>