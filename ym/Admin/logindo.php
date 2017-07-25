<?php
include 'DB/user.php';
//获取输入的信息
$username = $_POST['username'];
$password = $_POST['password'];
//获取session的值
$query = @mysql_query("select username,type from $tbname where username = '$username' and password = '$password'")
or die("SQL语句执行失败");
//判断用户以及密码
if($row = mysql_fetch_array($query))
{
    session_start();
    //判断权限
    if($row['type'] == 1 or $row['type'] == 0){
        $_SESSION['username'] = $row['username'];
        $_SESSION['type'] = $row['type'];
        echo "success";
    }else{
        echo "type";
    }
}else{
    echo "wrong";
}
?>