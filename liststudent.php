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
<title>学生信息管理系统－分页浏览学生信息</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 36px
}
-->
body{
    margin:0px;
    padding:0px;
    font-family:sans-serif;
    /*设置字体为sans-serif*/
    background: url("../img/3.jpg");
    background-size:cover;
    /*背景图片尺寸为覆盖cover*/
}

</style>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p align="center">
  <span class="STYLE1">学生信息管理系统－浏览学生信息</span><span class="STYLE2">&nbsp;&nbsp;&nbsp;&nbsp;欢迎你，<?php echo $_SESSION["user"]; ?>
&nbsp;&nbsp;&nbsp;<a href="modifypassword.php">修改密码</a></span></p>
<p align="center">
<table width="912" height="76" border="0" align="center">
  <tr>
    <td><div align="center">学号</div></td>
    <td><div align="center">姓名</div></td>
    <td><div align="center">性别</div></td>
    <td><div align="center">出生日期</div></td>
    <td><div align="center">年级</div></td>
    <td><div align="center">班级</div></td>
    <td><div align="center">专业</div></td>
    <td><div align="center">宿舍</div></td>
    <td><div align="center">床号</div></td>
    <td><div align="center">家庭住址</div></td>
    <td><div align="center">电话</div></td>
    <td><div align="center">编辑</div></td>
    <td><div align="center">删除</div></td>
  </tr>
    <?php
    require 'db_config.php';
    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->query("set names utf8");
        //$sql = "SELECT * FROM student";
        //var_dump($conn->query($sql)); //class PDOStatement
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    require_once ('PageDivide.php');
    $pageRecordNum=20;
    // 查询总记录数
    $totalReciordQuery = "select count(*) from student";
    // 查询内容
    $dataQuery = "select * from student";
    $url = $_SERVER ['SCRIPT_NAME']; //$_SERVER 是 PHP 预定义变量,包含当前脚本的路径
    //$PageDivide = new PageDivide ( $totalReciordQuery,$pageRecordNum,$url);
    //$net = $PageDivide->query($dataQuery);
    $result = $pdo->query($dataQuery);
    if ($result)
    {
    foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row){
        ?>





  <tr>
    <td><div align="center">
        <?=$row["stuid"]?>
      </div></td>
    <td><div align="center">
        <?=$row["name"]?>
      </div></td>
    <td><div align="center">
        <?=$row["sex"]?>
      </div></td>
    <td><div align="center">
        <?=$row["birthday"]?>
      </div></td>
    <td><div align="center">
        <?=$row["classname"]?>
      </div></td>
    <td><div align="center">
        <?=$row["classid"]?>
      </div></td>
    <td><div align="center">
        <?=$row["major"]?>
      </div></td>
    <td><div align="center">
        <?=$row["room"]?>
      </div></td>
    <td><div align="center">
        <?=$row["bedid"]?>
      </div></td>
    <td><div align="center">
        <?=$row["homeaddress"]?>
      </div></td>
    <td><div align="center">
        <?=$row["tel"]?>
      </div></td>
       <td><div align="center"><a href='editstudent.php?stuid=<?=$row["stuid"]?>'>修改</a></div></td>
    <td><div align="center"><a href='deletestudent.php?stuid=<?=$row["stuid"]?>'>删除</a></div></td>
   </tr>
  <?php
   	}
    }
  ?>
</table>
<?php
//$pageDivide->echoPageControl ();
?>
</p>
<p align="center">&nbsp;</p>
<p align="center"><a href="insertstudent.php">新生录入</a> <a href="querystudent.php">查询学生</a>　
    <a href="loginout.php?action=logout" float="right">退出登录</a></p>
</body>
</html>
