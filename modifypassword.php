<?php
session_start();
if (!isset($_SESSION['user']))
{
    echo "user".$_SESSION["user"];
    header("location:login.php"); //自动跳转到登录页.php
}
?>
<html>
<head>
    <title>修改密码</title>
    <link rel="stylesheet" href="stu2.css">
    <meta http-equiv="Content-Type"  content= "text/html; charset=utf-8" >
</head>

<body>
<form name="form1"  method= "post"  action= "modifypassworddo.php" >
    <div class="box">
        <!--        选择器-->
        <h2>修改密码</h2>
        <div class="inputbox">
            <input type="text" name="password" required="">
            <label>原始密码</label>
        </div>
        <div class="inputbox">
            <input type="password" name="newPassword" required="">
            <!--              原来登录无法跳转是因为name中没有password无法和logindo中第21行链接上-->
            <label>新密码</label>
        </div>

        <div class="inputbox">
            <input type="password2" name="newPassword2" required="">
            <!--              原来登录无法跳转是因为name中没有password无法和logindo中第21行链接上-->
            <label>再次输入新密码</label>
        </div>

        <p align="center" >
            <input type="submit"  name= "submit"  value= "修改密码" >
            <input type="reset"  name= "reset"  value= "重置" >
        </p>
</form>
</body>
</html>  