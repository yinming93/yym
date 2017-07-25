<?php 
@mysql_connect("localhost","root",'ymbb1027Ca$$w0rd')
or die("数据库连接失败");
@mysql_select_db("ymym")
or die("选择数据库失败");
mysql_query('set names utf8');
$tbname='info';
 ?>