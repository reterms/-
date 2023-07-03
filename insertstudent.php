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
<title>学生信息管理系统－新生录入</title>
<style type="text/css">
    body{
        margin:0px;
        padding:0px;
        font-family:sans-serif;
        /*设置字体为sans-serif*/
        background: url("../img/3.jpg");
        background-size:cover;
        /*背景图片尺寸为覆盖cover*/
    }
<!--
.STYLE1 {font-size: 36px}
-->
</style>
<link href="../mystyle.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function valid_form(theForm)
{
if((theForm.stu_id.value=="")||(theForm.stu_name.value=""))
{
alert("出错原因：\n学生学号为空!\n学生姓名为空！");
theForm.stu_id.focus();
return false;
}
}
</script>

</head>

<body>
<form id="form1" name="form1" method="post" action="insertstudentdo.php" onsubmit="return valid_form(this)">
  <p align="center" class="STYLE1">学生信息管理系统－新生录入</p>
  <table width="606" height="250" border="1" align="center" cellpadding="2">
    <tr>
      <td width="123" height="10px" valign="top"><p align="center"><strong>输入学号：</strong></p></td>
      <td width="266" valign="top"><label>
        <input type="text" name="stuid" id="stuid" height="10px"/>
      </label></td>
      <td width="189" valign="top"><p>*不能为空</p></td>
    </tr>
    <tr>
      <td width="123" height="25" valign="top"><p align="center"><strong>输入姓名：</strong></p></td>
      <td width="266" valign="top"><label>
        <input type="text" name="name" id="name" />
      </label></td>
      <td width="189" valign="top"><p>*不能为空</p></td>
    </tr>
    <tr>
      <td width="123" valign="top"><p align="center"><strong>所在年级：</strong></p></td>
      <td width="266" valign="top"><label>
        <select name="class" id="class">
          <?php for($i=2007; $i<=2012;$i++)
		{
		 echo "<option value=".$i."级>".$i."级</option>";
		}
		?>
        </select>
      </label></td>
      <td width="189" valign="top"><p>&nbsp;</p></td>
    </tr>
    <tr>
      <td valign="top"><div align="center"><strong>所在班级：</strong></div></td>
      <td valign="top"><label>
        <select name="classid" id="classid">
          <?php for($i=1; $i<=6;$i++)
		{
		 echo "<option value=".$i."班>".$i."班</option>";
		}
		?>
        </select>
      </label></td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td width="123" valign="top"><p align="center"><strong>选择专业：</strong></p></td>
      <td width="266" valign="top"><label>
        <select name="major" id="major">
          <option value="计算机应用">计算机应用</option>
          <option value="计算机软件">计算机软件</option>
          <option value="计算机网络">计算机网络</option>
          <option value="艺术设计">艺术设计</option>
          <option value="电子商务">电子商务</option>
          <option value="国际贸易">国际贸易</option>
          <option value="市场营销">市场营销</option>
        </select>
      </label></td>
      <td width="189" valign="top"><p>&nbsp;</p></td>
    </tr>

    <tr>
      <td width="123" height="17" valign="top"><p align="center"><strong>选择宿舍：</strong></p></td>
      <td width="266" valign="top"><input name="building" type="text" id="building" size="4" />
        栋
          <label>
          <input name="room" type="text" id="room" size="4" />
          </label>
        房间</td>
      <td width="189" valign="top"><p>&nbsp;</p></td>
    </tr>
    <tr>
      <td width="123" height="18" valign="top"><p align="center"><strong>选择床号：</strong></p></td>
      <td width="266" valign="top"><label>
        <input name="bed" type="text" id="bed" size="4" />
      </label></td>
      <td width="189" valign="top"><p>&nbsp;</p></td>
    </tr>
        <tr>
      <td width="123" height="22" valign="top"><p align="center"><strong>性　　别：</strong></p></td>
      <td width="266" valign="top"><label>
        <input name="sex" type="radio" id="sex" value="男" checked="checked" />
      </label>
      男
      <label>
      <input type="radio" name="sex" id="sex2" value="女" />
      女</label></td>
      <td width="189" valign="top"><p>&nbsp;</p></td>
    </tr>
    <tr>
      <td width="123" height="21" valign="top"><p align="center"><strong>出生日期</strong>：</p></td>
      <td width="266" valign="top"><label>
        <select name="year" id="year">
        <?php for($i=1982; $i<=2008;$i++)
		{
		 echo "<option value=".$i.">".$i."</option>";
		}
		?>
        </select>
      年
      <select name="month" id="month">
      <?php for($i=1; $i<=12;$i++)
		{
		  echo "<option value=".$i.">".$i."</option>";
		}
		?>
      </select>
      月
      <select name="day" id="day">
      <?php for($i=1; $i<=31;$i++)
		{
		  echo "<option value=".$i.">".$i."</option>";
		}
		?>
      </select>
      日
      </label></td>
      <td width="189" valign="top"><p>&nbsp;</p></td>
    </tr>
     <tr>
      <td width="123" valign="top"><p align="center"><strong>家庭地址：</strong></p></td>
      <td width="266" valign="top"><label>
        <input name="homeaddress" type="text" id="address" size="30" />
      </label></td>
      <td width="189" valign="top"><p>&nbsp;</p></td>
    </tr>
    <tr>
      <td width="123" valign="top"><p align="center"><strong>电话</strong>：</p></td>
      <td width="266" valign="top"><label>
        <input type="text" name="tel" id="tel" />
      </label></td>
      <td width="189" valign="top"><p>联系电话 </p></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td align="left" valign="middle"><input type="submit" name="button" id="button" value="录入系统 " />
        　
        <input type="submit" name="button2" id="button2" value="重新录入" /></td>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
  <p align="center"><a href="liststudent.php">查看学生信息</a></p>
</form>
</body>
</html>