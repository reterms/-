


<html>
<head>
    <title>注册</title>
    <!--    设置样式-->
    <link rel="stylesheet" href="student.css">
    <meta http-equiv="Content-Type"  content= "text/html; charset=utf-8" >
</head>

<body>
<form name="form1"  method= "post"  action= "registerdo.php" >

    <div class="box">
        <!--        选择器-->
        <h2>注册</h2>
        <div class="inputbox">
            <input type="text" name="user" required="">
            <label>用户名</label>
        </div>
        <div class="inputbox">
            <input type="password" name="password" required="">
            <!--              原来登录无法跳转是因为name中没有password无法和logindo中第21行链接上-->
            <label>密码</label>
        </div>

        <div class="inputbox">
            <input type="password2" name="password2" required="">
            <!--              原来登录无法跳转是因为name中没有password无法和logindo中第21行链接上-->
            <label>确认密码</label>
        </div>


        <input type="submit"  name= "submit"  value= "确定" >
        <input type="reset"  name= "reset"  value= "清空" >

</form>
</body>
</html>  