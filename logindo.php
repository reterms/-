<?php
session_start();
//验证是否登录
if(isset($_SESSION['user'])){
	header("Location:liststudent.php");//不用再登陆
}else if(filter_has_var(INPUT_POST,"user")){
	//选择数据库之前需要先连接数据库服务器
	require 'db_config.php';
	//获取用户输入
	try{
		$pdo = new PDO($dsn, $user, $pass);
		$pdo->query("set names utf8");
		//$sql = "SELECT * FROM student";
		//var_dump($conn->query($sql)); //class PDOStatement
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	$user  =  $_REQUEST["user"];
	$password  =  $_REQUEST["password"];
	//执行SQL语句
	$queryString = "select user,password from account where user='".$user."' and password = '".$password."'";
	echo $queryString;
	$result = $pdo->query($queryString);
	if($row = $result->fetch(PDO::FETCH_ASSOC)){
		//保存用户信息
		$_SESSION['user'] = $row['user'];
		header("location:liststudent.php" );
		//	echo "自动跳转到main.php";
	}
	else{
		echo "用户名或密码错误" ;
	}
}else header("location:login.php" ); //自动跳转到登录页
?>
