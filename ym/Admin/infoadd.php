<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'DB/db.php';		
	$title   = addslashes($_POST['stitle']);
	$key   = addslashes($_POST['skeywords']);
	$desc   = addslashes($_POST['sdescription']);
	$name   = addslashes($_POST['s_name']);
	$tel   = addslashes($_POST['s_phone']);
	$qq   = addslashes($_POST['s_qq']);
	$email   = addslashes($_POST['s_email']);
	$address   = addslashes($_POST['s_address']);
	$message   = addslashes($_POST['scopyright']);
	
	// echo $key;exit;
	// 检查信息是否填写完整
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo 'wan';exit; 
		}
	}

	$sql="update $tbname set title='".$title."',`key`='".$key."',`desc`='".$desc."',name='".$name."',tel='".$tel."',qq='".$qq."',email='".$email."',address='".$address."',message='".$message."' where id='1'";
	// echo $sql;exit;
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
?>