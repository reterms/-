<html>
<head>
    <title>注册</title>
    <meta http-equiv="Content-Type"  content= "text/html; charset=utf-8" >
</head>
<body>
<?php
require 'db_config.php';// 选择数据库之前需要先连接数据库服务器
// 执行SQL语句
try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->query("set names utf8");
    //$sql = "SELECT * FROM student";
    //var_dump($conn->query($sql)); //class PDOStatement
}catch(PDOException $e){
    echo $e->getMessage();
}
header ( "content-type=text/html;charset=utf-8" );
session_start ();
$username = $_POST ["user"];
$password = $_POST  ["password"];
$password2 = $_POST  ["password2"];
if ("" == $username || "" == $password||""==$password2){
    ?>
    <script type="text/javascript">window.alert("请输入用户名或者密码")</script>
<?php echo "<meta http-equiv='refresh' content='1; url=register.php'>";

}else if ($password != $password2){
?>
    <script type="text/javascript">window.alert("密码不一致，请重新设置")</script><!-- 自动跳转到登录页 -->
<?php echo "<meta http-equiv='refresh' content='1; url=register.php'>";
}else {
$queryString = "insert into account (user,password) values ('" . $username . "','" . $password . "')";
$result = $pdo->exec( $queryString );
if ($result) {
// 保存用户信息
$user=$_SESSION ['user'];
?> <script type="text/javascript">window.alert("注册成功，正准备跳转到登录页面")</script>
<?php echo "<meta http-equiv='refresh' content='1; url=login.php'>";
} else {?>
    <script type="text/javascript">window.alert("注册失败")</script>

<?php }
}

?>
</body>
</html>
