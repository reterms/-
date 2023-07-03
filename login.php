<html>
<head>
    <title>Login</title>
    <meta http-equiv="Content-Type"  content= "text/html; charset=utf-8" >

    <style type="text/css">

    </style>
    <link href="./student.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form name="form1"  method= "post"  action= "logindo.php" >

    <div class="box">
        <!--        选择器-->
        <h2>login</h2>
        <div class="inputbox">
            <input type="text" name="user" required="">
            <label>用户名</label>
        </div>
        <div class="inputbox">
            <input type="password" name="password" required="">
            <!--              原来登录无法跳转是因为name中没有password无法和logindo中第21行链接上-->
            <label>密码</label>
        </div>
        <input type="submit" name="" value="登录">
        <input type="reset"  name= "reset"  value= "重置" />
        <input type="button"  name= "register"  value= "注册" onclick="window.location.href='register.php'"/>

    </div>


</form>
</body>
</html>