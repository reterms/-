<?php
$dbms='mysql';     //数据库类型
$host='localhost:3308'; //数据库主机名
$dbName='wlj';    //使用的数据库
$user='roos';      //数据库连接用户名
$pass='123344';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
try{
	$conn = new PDO($dsn, $user, $pass);
	echo "";
	$conn = null; //关闭
}catch(PDOException $e){
	echo $e->getMessage();} ?>