<html>
<head>
    <title>修改密码</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
header ( "content-type=text/html;charset=utf-8" );
session_start ();
if (filter_has_var ( INPUT_POST, "password" )) {
    // 获取用户输入
    $password = $_REQUEST ["password"];
    $newPassword = $_REQUEST ["newPassword"];
    $newPassword2 = $_REQUEST ["newPassword2"];
    if ("" == $password || "" == $newPassword)
        echo "请输入密码！";
    else if ($newPassword != $newPassword2)
        echo "两次密码不一致！"; // 自动跳转到登录页
    else {
        // 选择数据库之前需要先连接数据库服务器
        require 'db_config.php';
        // 执行SQL语句
        try{
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->query("set names utf8");
            //$sql = "SELECT * FROM student";
            //  var_dump($conn->query($sql)); //class PDOStatement
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        $user = $_SESSION ["user"];
        $queryString = "select user,password from account where user='$user' and password = '$password'";
        echo $queryString;
        $result = $pdo->query ( $queryString );
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $modifyString = "update account set password='$newPassword' where user='$user'";
            echo $modifyString;
            $result = $pdo->query ( $modifyString );
            if ($result) {
                // 保存用户信息
                session_unset ();
                header ( "location:login.php" );
            } else {
                ?>
                <script type="text/javascript">window.alert("修改成功")</script><?php
            }
        }
    }
} else
    header ( "location:modifypassword.php" );
?>
</body>
</html>
