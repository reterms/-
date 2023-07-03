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
    <title>学生信息管理系统－新生录入添加至数据库</title>
</head>
<body>
<?php
$id = htmlspecialchars ( $_POST ["stuid"] );
$name = htmlspecialchars ( $_POST ["name"] );
$class = htmlspecialchars ( $_POST ["class"] );
$classid = htmlspecialchars ( $_POST ["classid"] );
$major = htmlspecialchars ( $_POST ["major"] );
$room = htmlspecialchars ( $_POST ["building"] ) . "栋" . htmlspecialchars ( $_POST ["room"] ) . "房间";
$bedid = htmlspecialchars ( $_POST ["bed"] );
$sex = htmlspecialchars ( $_POST ["sex"] );
$birthday = trim ( htmlspecialchars ( $_POST ["year"] ) ) . "-" . trim ( htmlspecialchars ( $_POST ["month"] ) ) . "-" . trim ( htmlspecialchars ( $_POST ["day"] ) );
$homeaddress = htmlspecialchars ( $_POST ["homeaddress"] );
$tel = htmlspecialchars ( $_POST ["tel"] );
if (""==$id||""==$name){
    ?>
    <script type="text/javascript">window.alert("记录插入失败,请输入名字或者学号")</script>
<?php echo "<meta http-equiv='refresh' content='1; url=insertstudent.php'>";
if ($room == "")
    $room = "未安排";
if ($bedid == "")
    $bedid = "未安排";
if ($homeaddress == "")
    $homeaddress = "暂缺";
if ($tel == "")
    $tel = "暂缺";

}else {
echo $name;
require "db_config.php"; // 引用配置文件
try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->query("set names utf8");
    //$sql = "SELECT * FROM student";
    // var_dump($conn->query($sql)); //class PDOStatement
}catch(PDOException $e){
    echo $e->getMessage();
}

$sql = "insert into student(stuid,name,classname,classid,major,room,bedid,sex,birthday,homeaddress,tel)  values('$id','$name','$class','$classid','$major','$room','$bedid','$sex','$birthday','$homeaddress','$tel')";
//echo $sql;
$result=$pdo->query ( $sql );
if ($result) {
?>
    <script type="text/javascript">window.alert("记录已经成功插入，1秒后返回查看学生信息……")</script>
<?php
echo "<meta http-equiv='refresh' content='1; url=liststudent.php'>";
}else{
?>
    <script type="text/javascript">window.alert("记录插入失败")</script><?php }
}?>
</body>
</html>