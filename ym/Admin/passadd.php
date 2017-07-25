<?php
header("Content-Type:text/html;charset=utf-8");
include 'DB/user.php';

	$username   = addslashes($_POST['name']);
	$mpass   = addslashes($_POST['mpass']);
	$newpass   = addslashes($_POST['newpass']);
	$renewpass   = addslashes($_POST['renewpass']);

	// echo $key;exit;
	// 检查信息是否填写完整
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo 'wan';exit; 
		}
	}
	if(strlen($newpass)<4) {
		echo "short";exit;
	}

	//获取数据库用户密码
	$query = @mysql_query("select password,type from $tbname where username = '$username'")
	or die("SQL语句执行失败");
	$row = mysql_fetch_array($query);
	if ($row['password']!=$mpass){
		echo "wrong";exit;
	}else if($newpass!=$renewpass){
		echo "nosame";exit;
	}

	$sql="update $tbname set password='".$newpass."' where username='$username'";
	// echo $sql;exit;
	$query1 = mysql_query($sql);
	if($query1){
		echo 'ok';
	}else{
		echo 'sb';
	}
?>