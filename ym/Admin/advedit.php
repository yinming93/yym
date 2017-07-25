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
$id=$_GET['id'];
$sql="select * from $tbname where id='$id'";
$query = mysql_query($sql);
$row=mysql_fetch_assoc($query);
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
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 轮播信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="advadd.php?a=edit&id=<?php echo $row['id'] ?>" enctype="multipart/form-data">      
      
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <?php 
            // 处理图片路径 
            $img_path = 'uploads/';
            $img_path .= substr($row['filename'], 0, 4).'/';
            $img_path .= substr($row['filename'], 4, 2).'/';
            $img_path .= substr($row['filename'], 6, 2).'/';
            $img_path .= $row['filename'];
            ?>   
        <div class="field">
          <img src="<?php echo $img_path ?>" alt="" width="120" height="50">
          <input type="file" id="file" name="myfile" onclick="if(confirm('确定修改?')==false)return false;"/>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <!-- <button id="tj" class="button bg-main icon-check-square-o" type="submit"> 提交</button> -->
          <input type="submit" id="tjj" value="提交"/>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>