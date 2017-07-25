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
    <form method="post" class="form-x" action="h5add.php?a=edit&id=<?php echo $row['id'] ?>" enctype="multipart/form-data">      
      <div class="form-group">
        <div class="label">
          <label>名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $row['txt1']; ?>" name="title1" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $row['txt2']; ?>" name="title2" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>程序链接：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $row['txt3']; ?>" name="title3" />
          <div class="tips"></div>
        </div>
      </div>

       <div class="form-group">
        <div class="label">
          <label>封面图：</label>
        </div>
        <?php 
            // 处理图片路径 
            $img_path = 'uploads/';
            $img_path .= substr($row['img1'], 0, 4).'/';
            $img_path .= substr($row['img1'], 4, 2).'/';
            $img_path .= substr($row['img1'], 6, 2).'/';
            $img_path .= $row['img1'];
            ?>   
        <div class="field">
          <img src="<?php echo $img_path ?>" alt="" width="120" height="50">
          <input type="file" id="file" name="myfile" value="<?php echo $row['img1']; ?>" onclick="if(confirm('确定修改?')==false)return false;"/>
        </div>
      </div>

      <!--<div class="form-group">
        <div class="label">
          <label>图片2：</label>
        </div>
        <?php 
            // 处理图片路径 
            $img_path2 = 'uploads/';
            $img_path2 .= substr($row['img2'], 0, 4).'/';
            $img_path2 .= substr($row['img2'], 4, 2).'/';
            $img_path2 .= substr($row['img2'], 6, 2).'/';
            $img_path2 .= $row['img2'];
            ?>   
        <div class="field">
          <img src="<?php echo $img_path2 ?>" alt="" width="120" height="50">
          <input type="file" id="file" name="myfile2" onclick="if(confirm('确定修改?')==false)return false;"/>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>图片3：</label>
        </div>
        <?php 
            // 处理图片路径 
            $img_path3 = 'uploads/';
            $img_path3 .= substr($row['img3'], 0, 4).'/';
            $img_path3 .= substr($row['img3'], 4, 2).'/';
            $img_path3 .= substr($row['img3'], 6, 2).'/';
            $img_path3 .= $row['img3'];
            ?>   
        <div class="field">
          <img src="<?php echo $img_path3 ?>" alt="" width="120" height="50">
          <input type="file" id="file" name="myfile3" onclick="if(confirm('确定修改?')==false)return false;"/>
        </div>
      </div> -->

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <!-- <button id="tj" class="button bg-main icon-check-square-o" type="submit"> 提交</button> -->
          <input type="submit" id="tjj" value="确定"/>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>