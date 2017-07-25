<?php 
header("Content-Type:text/html;charset=utf-8");
session_start();
if(isset($_SESSION['username']))
{ 
}
else
{
    echo "您没有权限访问此页面";exit;
}
include '../db1.php';
$sql="select * from $tbname";
$query = mysql_query($sql);
if($query && mysql_num_rows($query)>0){
   $qu = array();
while($row = mysql_fetch_assoc($query)){
    $qu[] = $row;
}
}
 ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="h5add.php?a=upload" enctype="multipart/form-data">  
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title1" data-validate="required:请输入描述" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>程序链接：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title2" data-validate="required:请输入程序链接" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>封面：</label>
        </div>
        <input type="file" id="file" name="myfile"/>
      </div> 
       <!-- <div class="form-group">
        <div class="label">
          <label>图片1：</label>
        </div>
        <input type="file" id="file" name="myfile2"/>
      </div> 
       <div class="form-group">
        <div class="label">
          <label>二维码：</label>
        </div>
        <input type="file" id="file" name="myfile3"/>
      </div>  -->    
      
      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <select name="cid" class="input w50">
              <option value="">请选择分类</option>
              <option value="1">H5</option>
              <option value="2">游戏</option>
              <option value="3">微楼书</option>
              <option value="4">个人自定义</option>
              <option value="5">个人前端案例</option>
              <option value="6">报名</option>
              <option value="7">360</option>
            </select>
            <div class="tips"></div>
          </div>
        </div>
      </if>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button id="tj" class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>