<?php
  header("Content-Type:text/html;charset=utf-8");
  include 'DB/db2.php';
  $id = $_GET['id'];    
  $sql="select * from $tbname where id=$id";
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
  <div class="panel-head"><strong><span class="icon-key"></span> 修改栏目</strong></div>
  <div class="body-content">
    <form method="post" class="form-x">
    <input id="hidden" type="hidden" value="<?php echo $id ?>" name="id">
      <div class="form-group">
        <div class="label">
          <label for="sitename">栏目名：</label>
        </div>
        <div class="field">
          <input type="text" style="line-height:33px;" name="nav" value="<?php echo $row['nav']; ?>">
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label for="sitename">顺序：</label>
        </div>
        <div class="field">
         <input type="text" style="line-height:33px;" name="ord" value="<?php echo $row['ord']; ?>">
        </div>
      </div> 
      <div class="form-group">
        <div class="label">
          <label for="sitename">链接：</label>
        </div>
        <div class="field">
          <input type="text" style="line-height:33px;" name="link" value="<?php echo $row['link']; ?>">
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button id="tj" class="button bg-main icon-check-square-o" type="button"> 提交</button>   
        </div>
      </div>      
    </form>
  </div>
</div>
</body></html>
<script>
  $("#tj").on("click",function(){
    $.ajax({
    url:'columnadd.php?a=update',
    data:$('form').serialize(),
    type:'POST',
    success:function(m){
      // alert(m);
      if(m=='ok'){
        alert("更改成功！");
        window.location.href='column.php';
      }                 
      if(m=='wan'){
        alert("信息不能为空！");
      }
      if(m=='sb'){
        alert("修改失败！");
      }
    }
    })
  })
</script>