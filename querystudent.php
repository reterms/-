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
    <title>学生信息管理系统－查询学生信息</title>
    <style type="text/css">
        .STYLE1 {
            font-size: 36px;
        }
        a:hover{
            color:#FFF6F5;
            text-decoration:none;
        }
        a:link{
            color:#FFF6F5;
            text-decoration:none;
        }
        a:visited {
            color:#FFF6F5;
            text-decoration:none;
        }
        body{
            margin:0px;
            padding:0px;
            font-family:sans-serif;
            /*设置字体为sans-serif*/
            background: url("../img/2.jpg");
            background-size:cover;
            /*背景图片尺寸为覆盖cover*/
        }
        .div2{
            height:500px;
            margin-left:500px;
            margin-top:80px;

        }



    </style>
    <link href="../mystyle.css" rel="stylesheet" type="text/css" />
</head>

<body class="body">

<?php
require "db_config.php"; // 引用配置文件
try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->query("set names utf8");
    //$sql = "SELECT * FROM student";
    //var_dump($conn->query($sql)); //class PDOStatement
}catch(PDOException $e){
    echo $e->getMessage();
}
$sql = "select * from student";
$result = $pdo->query ( $sql );
http://localhost/studen/querystudent.php
$sql = "SHOW COLUMNS FROM student";
$result = $pdo->query ( $sql );
if ($result) {
    echo "";
    echo "<br>";
}else{
    echo "错误";
}
?>
<div align="center" >
    <span class="STYLE1">学生信息管理系统－查询学生信息</span>

</div>
<div class="div2">
    <form id="form1" name="form1" method="post" action="querystudentdo.php">
        选择查询类别： <select name="type" id="type">
            <?php
            while ( $row = $result->fetch() ) {
                $name = $row [0];
                if (($name == "id") || ($name == "classname") || ($name == "room") || ($name == "bedid") || ($name == "birthday") || ($name == "homeaddress")) {
                    continue;
                } else {
                    echo "<option value='" . $name . "'>";
                    switch ($name) {
                        case "stuid" :
                            echo "学号";
                            break;
                        case "name" :
                            echo "姓名";
                            break;
                        case "classname" :
                            echo "年级";
                            break;
                        case "classid" :
                            echo "班次";
                            break;
                        case "major" :
                            echo "专业";
                            break;
                        case "room" :
                            echo "房间";
                            break;
                        case "tel" :
                            echo "电话";
                            break;
                        case "sex" :
                            echo "性别";
                            break;
                    }
                    echo "</option>";
                }
            }
            ?>
        </select> </label> 输入查询的内容： <label> <input type="text" name="value"
                                                   id="value" />
        </label> <label> <input type="submit" name="button" id="button"
                                value="查询" />
        </label>
    </form>

    <p>说明：</p>
    <p>专业可填写内容为：<?php
        require "db_config.php"; // 引用配置文件
        try{
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->query("set names utf8");
            //$sql = "SELECT * FROM student";
            // var_dump($conn->query($sql)); //class PDOStatement
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $sql = "select distinct major  from student";
        $result = $pdo->query( $sql );
        if ($result) {
            while ( $row = $result->fetch(PDO::FETCH_ASSOC) ) {
                echo $row ["major"], "&nbsp;&nbsp;";
            }

            echo "<br>";
        }else{
            echo "错误";
        }

        ?></p>

    <p  >
        <a href="insertstudent.php" class="a">新生录入</a> <a href="querystudent.php" class="a">查询学生</a>
        <a href="liststudent.php" class="a">全体学生名单</a>
        <a href="loginout.php?action=logout" float="right">退出登录</a>


    </p>
</div>
</body>
</html>
