<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>更新数据</title>
</head>

<body>
<?php
require "db_config.php";// 引用配置文件
try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->query("set names utf8");
    //$sql = "SELECT * FROM student";
    //var_dump($conn->query($sql)); //class PDOStatement
}catch(PDOException $e){
    echo $e->getMessage();
}
$id = $_GET ["stuid"];
$name = htmlspecialchars ( $_POST ["name"] );
$class = htmlspecialchars ( $_POST ["class"] );
$classid = htmlspecialchars ( $_POST ["classid"] );
$major = htmlspecialchars ( $_POST ["major"] );
$room = htmlspecialchars ( $_POST ["room"] );
$bedid = htmlspecialchars ( $_POST ["bed"] );
$sex = htmlspecialchars ( $_POST ["sex"] );
$birthday = trim ( htmlspecialchars ( $_POST ["year"] ) ) . "-" . trim ( htmlspecialchars ( $_POST ["month"] ) ) . "-" . trim ( htmlspecialchars ( $_POST ["day"] ) );
$homeaddress = htmlspecialchars ( $_POST ["homeaddress"] );
$tel = htmlspecialchars ( $_POST ["tel"] );
$sql = "update student set  name='$name',classname='$class',classid='$classid',major='$major',room='$room',bedid='$bedid',sex='$sex',birthday='$birthday',homeaddress='$homeaddress',tel='$tel' where stuid='$id'";
$result=$pdo->query ( $sql );
if ($result) {
    ?>
    <script type="text/javascript">window.alert("记录已经成功更新，1秒后返回查看学生信息……")</script>
    <?php
    echo "<meta http-equiv='refresh' content='1; url=liststudent.php'>";}
?>

</body>
</html>
