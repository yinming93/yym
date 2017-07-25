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
$sql="select * from $tbname where type='4' order by time desc";
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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 自定义列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="h5zen.php"> 添加内容</a> </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>封面</th>
        <!-- <th>图片1</th>
        <th>二维码</th> -->
        <th>名称</th>
        <!-- <th>描述</th> -->
        <th>程序链接</th>
        <!-- <th>分类名称</th> -->
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <volist name="list" id="vo">
      <?php if(!empty($query)): ?>
      <?php foreach($qu as $val): ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           1</td>
           <?php 
            // 处理图片1路径 
            $img_path = 'uploads/';
            $img_path .= substr($val['img1'], 0, 4).'/';
            $img_path .= substr($val['img1'], 4, 2).'/';
            $img_path .= substr($val['img1'], 6, 2).'/';
            $img_path .= $val['img1'];
            // 处理图片2路径 
            // $img_path2 = 'uploads/';
            // $img_path2 .= substr($val['img2'], 0, 4).'/';
            // $img_path2 .= substr($val['img2'], 4, 2).'/';
            // $img_path2 .= substr($val['img2'], 6, 2).'/';
            // $img_path2 .= $val['img2'];
            // 处理图片3路径 
            // $img_path3 = 'uploads/';
            // $img_path3 .= substr($val['img3'], 0, 4).'/';
            // $img_path3 .= substr($val['img3'], 4, 2).'/';
            // $img_path3 .= substr($val['img3'], 6, 2).'/';
            // $img_path3 .= $val['img3'];
            ?>  
          <td><img src="<?php echo $img_path ?>" alt="" width="50" height="50" /></td>
         <!--  <td><img src="<?php echo $img_path2 ?>" alt="" width="50" height="50" /></td>
          <td><img src="<?php echo $img_path3 ?>" alt="" width="50" height="50" /></td> -->
          <td><?php echo $val['txt1'] ?></td>
          <!-- <td><?php echo $val['txt2'] ?></td> -->
          <td><?php echo $val['txt3'] ?></td>
          <!-- <td><?php echo $val['type'] ?></td> -->
          <td><?php echo $val['time'] ?></td>
          <td><div class="button-group"> <a class="button border-main" href="h5edit.php?a=edit&id=<?php echo $val['id'] ?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="h5add.php?a=del&id=<?php echo $val['id'] ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?> 
        

      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>