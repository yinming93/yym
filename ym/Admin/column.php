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
  include 'DB/db2.php';
  $sql="select * from $tbname order by ord asc";
  $query = mysql_query($sql);
   if( $query && mysql_num_rows($query)>0 ){
        $qu = array();
        while($row = mysql_fetch_assoc($query)){
            $qu[] = $row;
        }
    }
    $a=0;
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <a class="button border-yellow" href="#" onclick="tjnr()"><span class="icon-plus-square-o"></span> 添加内容</a>
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>     
      <th>栏目名称</th>  
      <th>排序</th>     
      <th>链接</th>     
      <th width="250">操作</th>
    </tr>
    <?php if(!empty($query)): ?>
    <?php foreach($qu as $val): ?>
    <?php
      $a++;
    ?>
    <tr>
      <td><?php echo $a; ?></td>      
      <td><?php echo $val['nav']; ?></td>  
      <td><?php echo $val['ord']; ?></td>      
      <td><?php echo $val['link']; ?></td>      
      <td>
      <div class="button-group">
      <a type="button" class="button border-main" href="columnedit.php?id=<?php echo $val['id'] ?>"><span class="icon-edit"></span>修改</a>
       <a class="button border-red" href="columnadd.php?a=del&id=<?php echo $val['id'] ?>" onclick="if(confirm('确定删除?')==false)return false;"><span class="icon-trash-o"></span> 删除</a>
      </div>
      </td>
    </tr> 
    <?php endforeach; ?>
    <?php endif; ?> 
  </table>

</div>
<script>
function tjnr(){
  document.getElementById('neirong').style.display='block';
}
function tjnrx(){
  document.getElementById('neirong').style.display='none';
}
</script>
<!-- 增加内容弹出框 -->
<form method="post" class="form-x">
<div id="neirong" style="width:300px;height:320px;background:#F5F5F5;margin-left:15%;margin-top:0px;position:absolute;border-radius:5px;box-shadow:10px 10px 5px #888888;display:none;">
<table>
<tr style="width:80%;position:absolute;left:17%;top:8%;">
  <th>栏目:</th>
  <td><input type="text" style="width:90%;height:30px;border-radius:5px;" name="nav"></td>
</tr>
<tr style="width:80%;position:absolute;left:17%;top:28%;">
  <th>顺序:</th>
  <td><input type="text" style="width:90%;height:30px;border-radius:5px;" name="ord"></td>
</tr>
<tr style="width:80%;position:absolute;left:17%;top:48%;">
  <th>链接:</th>
  <td><input type="text" style="width:90%;height:30px;border-radius:5px;" name="link"></td>
</tr>
<input type="button" id="tj" style="width:30%;height:40px;border:1px solid #00AAEE;background:none;position:absolute;left:15%;top:68%;" value="确定">
<input type="button" style="width:30%;height:40px;border:1px solid #EE3333;background:none;position:absolute;left:55%;top:68%;" onclick="tjnrx()" value="取消">
</table>
</div>
</form>
</body></html>
<script>
  $("#tj").on("click",function(){
    $.ajax({
    url:'columnadd.php?a=add',
    data:$('form').serialize(),
    type:'POST',
    success:function(m){
      // alert(m);
      if(m=='ok'){
        alert("添加成功！");
        window.location.href='column.php';
      }                 
      if(m=='wan'){
        alert("信息不能为空！");
      }
      if(m=='sb'){
        alert("插入失败！");
      }
    }
    })
  })
</script>