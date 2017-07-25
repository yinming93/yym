<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
    <title>印茗网服务后台登录页面模板</title>
    <link href="style/a.css" rel="stylesheet"/>
    <link href="../ym.ico" rel="shotcut icon"/>
    <script type="text/javascript" src="./js/jquery.js"></script>
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    /*bootstrap弹出框样式大小*/
    .modal-dialog{
    margin-top: 10%;
}
</style>
<body>
<header>
    <div class="text">
        <a><em>加入收藏</em>|<span>联系我们</span></a>
    </div>
</header>
<div id="content">
    <img src="img/jian.png" />
    <h1>印茗网管理后台</h1>
    <form method="post" action="logindo.php">
        <input name="username"  id="usename" type="text" placeholder="用户名"/><br/>
        <input name="password" id="password" type="password" placeholder="密码"/>
        <div class="bt clear">
            <input class="check fl" type="checkbox" value=""/>
            <span class="fl">记住密码</span>
            <em class="fl">忘记密码？</em>
            <input name="sub" id="submit" type="button" value="登录" />
        </div>
    </form>
</div>
<div id="footer">
    <p><span>© 2017 soft 苏ICP备0133786846号</span></p>
</div>
</body>
<script src="../lib/bootstrap/js/bootstrap.js"></script>
<script src="../js/dialog.js"></script>
</html>
<script>
$("input[name='sub']").on("click",function(){
    $.ajax({
    url:'logindo.php',
    data:$('form').serialize(),
    type:'POST',
    success:function(m){
        if(m=='wrong'){
            Alert("帐号或密码错误！");
        }
        if(m=='type'){
            Alert("您没有权限！");
        }
        if(m=='success'){
            window.location.href='./index.php';
        }
    }
    })
})
</script>