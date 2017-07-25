<?php
header("Content-Type:text/html;charset=utf-8");
	include 'db1.php';
	//include 'function.php';
	$sql="select * from $tbname where type='1' order by time desc";
	// var_dump($sql);
	$query = mysql_query($sql);
	 if( $query && mysql_num_rows($query)>0 ){
        $qu = array();

        while($row = mysql_fetch_assoc($query)){
            $qu[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>优秀H5</title>
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
     
    <!-- 轮播底下文字 -->
    <div class="container fun">
    <div class="row">
    <table id="tb" style="width:100%;">
    <?php if(!empty($query)): ?>
    <?php foreach($qu as $val): ?>
	<td>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
         <?php 
            // 处理图片1路径 
            $img_path = 'Admin/uploads/';
            $img_path .= substr($val['img1'], 0, 4).'/';
            $img_path .= substr($val['img1'], 4, 2).'/';
            $img_path .= substr($val['img1'], 6, 2).'/';
            $img_path .= $val['img1'];
            ?>
          <img src=<?php echo $img_path ?> alt="...">
          <div class="caption">
            <h3><?php echo substr($val['txt1'],0,24) ?>...</h3>
            <p><?php echo substr($val['txt2'],0,42)?>...</p>
            <p><a href="desc.php?a=<?php echo $val['id'] ?>" class="btn btn-primary" role="button">进入</a></p>
          </div>
        </div>
      </div>
    </td>
    <?php endforeach; ?>
    <?php endif; ?> 
  </table> 

    </div>
    </div>
    <!-- Bootstrap分页js -->
    <nav aria-label="Page navigation" style="text-align: center">
	  <ul class="pagination" id="pagination">
	    <li>
	      <a href="#" aria-label="Previous" onclick="first()">
	        <span aria-hidden="true">&laquo;</span>
	      </a>
	    </li>
	    <li><a href="#" onclick="pre()">上一页</a></li>
	    <li id="yinpage"></li>
	    <li><a href="#" onclick="next()">下一页</a></li>
	    <li>
	      <a href="#" aria-label="Next" onclick="last()">
	        <span aria-hidden="true">&raquo;</span>
	      </a>
	    </li>
	  </ul>
	</nav>
<!-- <div id="changpage"></div> -->
   <!-- 网站底部 -->
   <?php include 'footer.php'; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./lib/jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./lib/bootstrap/js/bootstrap.js"></script>
    
  </body>
</html>