<?php 
// info表
include 'Admin/DB/db.php';
// nav表
include 'Admin/DB/db2.php';
$sql="select * from info";
$sql1="select * from nav order by ord asc";

$query = mysql_query($sql);
$row=mysql_fetch_assoc($query);

$query1 = mysql_query($sql1);
 ?>
<meta charset="utf-8">
<header>
     <div class="container-fluid visible-lg">
      <div class="row" id="menu">
        <div class="col-md-2 title"></div>
        <div class="col-md-6 title">
        <a href=""><?php echo $row['key']; ?></a>
        </div>
        <div class="col-md-2 title">联系电话：<?php echo $row['tel']; ?></div>
        <div class="col-md-2 title">
          <button type="button" class="btn btn-danger">登录</button>
          <button type="button" class="btn btn-default">注册</button>
        </div>
      </div>
    </div>
   </header>
    
      
      <!-- 导航条 -->
          <nav class="navbar y-nav">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="visible-lg" href="index.php"><img src="img/logo.png" alt=""></a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
               <?php
               while ($row1=mysql_fetch_assoc($query1)){
               ?>
               <li><a href="<?php echo $row1['link']; ?>"><?php echo $row1['nav']; ?></a></li>
               <?php
               }
               ?>
                </ul>

                <ul class="nav navbar-nav navbar-right  visible-lg">
                  <li><a href="#">关于印茗</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>