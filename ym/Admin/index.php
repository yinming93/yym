<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
if(isset($_SESSION['username']))
{
    
}
else
{
    echo "您没有权限访问此页面";
    header("Location: login.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="../index.php" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="loginout.php"><span class="icon-power-off"></span> 退出登录</a> </div>
  <div style="width:350px;height:70px;line-height:70px;float:left;text-align:center;font-size:20px;font-weight:bold;color:white;">
    <?php 
      if($_SESSION['type'] == 1)
        echo "欢迎您！超级管理员 ".$_SESSION['username'];
    if($_SESSION['type'] == 0)
        echo "欢迎用户 ".$_SESSION['username'];
     ?>
  </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="info.php" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
    <li><a href="pass.php" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <!-- <li><a href="page.html" target="right"><span class="icon-caret-right"></span>单页管理</a></li> -->  
    <li><a href="adv.php" target="right"><span class="icon-caret-right"></span>首页轮播</a></li>   
    <!-- <li><a href="book.html" target="right"><span class="icon-caret-right"></span>留言管理</a></li>      -->
    <li><a href="column.php" target="right"><span class="icon-caret-right"></span>导航管理</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
    <li><a href="h5list.php" target="right"><span class="icon-caret-right"></span>h5管理</a></li>
    <li><a href="wlsh5list.php" target="right"><span class="icon-caret-right"></span>微楼书管理</a></li>
    <li><a href="yxh5list.php" target="right"><span class="icon-caret-right"></span>游戏管理</a></li>
    <li><a href="bmh5list.php" target="right"><span class="icon-caret-right"></span>报名管理</a></li>
    <li><a href="360h5list.php" target="right"><span class="icon-caret-right"></span>360全景管理</a></li>
    <li><a href="zah5list.php" target="right"><span class="icon-caret-right"></span>个人自定义</a></li>
    <li><a href="prolist.php" target="right"><span class="icon-caret-right"></span>个人案例</a></li>
    <!-- <li><a href="add.html" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
    <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>分类管理</a></li> -->        
  </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="info.php" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
<p>来源:<a href="" target="_blank">印茗网络科技</a></p>
</div>
</body>
</html>