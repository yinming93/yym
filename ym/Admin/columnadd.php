<?php
	header("Content-Type:text/html;charset=utf-8");
	include 'DB/db2.php';	
	$a = $_GET['a'];
	// 菜单导航增删改查——增
	switch($a){
    case 'add':	
	$nav   = addslashes($_POST['nav']);
	$ord   = addslashes($_POST['ord']);
	$link   = addslashes($_POST['link']);
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo 'wan';exit; 
		}
	}
	$sql="INSERT INTO $tbname(nav,ord,link) VALUES('{$nav}','{$ord}','{$link}')";
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
	}

	// 菜单导航增删改查——删
	switch($a){
    case 'del':	
    $id = $_GET['id'];		
	$sql="delete from $tbname where id=$id";
	$query = mysql_query($sql);
	if($query){
		echo "<script>";
		echo "window.location.href='column.php'";
		echo "</script>";
	}else{
		
	}
	}

	// 菜单导航增删改查——改
	switch($a){
    case 'update':	
    $id   = addslashes($_POST['id']);
	$nav   = addslashes($_POST['nav']);
	$ord   = addslashes($_POST['ord']);
	$link   = addslashes($_POST['link']);
	foreach ($_POST as $k => $v) {
		if(!$v){
			echo 'wan';exit; 
		}
	}
	$sql="update $tbname set nav='".$nav."',ord='".$ord."',link='".$link."' where id=$id";
	$query = mysql_query($sql);
	if($query){
		echo 'ok';
	}else{
		echo 'sb';
	}
	}
?>