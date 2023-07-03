<?php
session_start();
if (!isset($_SESSION['user']))
{
    echo "user".$_SESSION["user"];
    header("location:login.php"); //自动跳转到登录页.php
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>学生信息管理系统－删除学生信息</title>

</head>
<body>
<?php
$stuid = $_GET ["stuid"];
echo $stuid;
require "db_config.php"; // 引用配置文件
try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->query("set names utf8");
    //$sql = "SELECT * FROM student";
    //var_dump($conn->query($sql)); //class PDOStatement
}catch(PDOException $e){
    echo $e->getMessage();
}
$sql = "delete from student where stuid='$stuid'";
$result=$pdo->query ( $sql );
if ($result) {
    ?>
    <script type="text/javascript">window.alert("记录已经成功删除，1秒后返回查看学生信息……")</script>
<?php
echo "<meta http-equiv='refresh' content='1; url=liststudent.php'>";
}else{
?>
    <script type="text/javascript">window.alert("记录删除失败")</script><?php }?>

</body>
</html>

