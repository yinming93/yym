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
include '../dblunbo.php';
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
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加轮播图</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="20%">图片</th>
      <th width="15%">操作</th>
    </tr>   
   <?php if(!empty($quer)): ?>
   <?php foreach($qu as $val): ?>
    <tr>
      <td><?php echo $val['id'] ?></td>  
            <?php 
            // 处理图片路径 
            $img_path = 'uploads/';
            $img_path .= substr($val['filename'], 0, 4).'/';
            $img_path .= substr($val['filename'], 4, 2).'/';
            $img_path .= substr($val['filename'], 6, 2).'/';
            $img_path .= $val['filename'];
            ?>   
      <td><img src="<?php echo $img_path ?>" alt="" width="120" height="50" /></td>     
      
      <td><div class="button-group">
      <a class="button border-main" href="advedit.php?id=<?php echo $val['id'] ?>"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="advadd.php?a=del&id=<?php echo $val['id'] ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?> 
  </table>
</div>
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加轮播图</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="advadd.php?a=upload" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="file" id="file" name="myfile"/>
          <div class="tipss">图片尺寸：2000*650</div>
        </div>
      </div>
      
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