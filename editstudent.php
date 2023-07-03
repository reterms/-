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
<title>学生信息管理系统－修改学生信息</title>
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
    background: url("../img/2.jpg");
    background-size:cover;
    /*背景图片尺寸为覆盖cover*/
}
</style>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div align="center">
		<p>
            <?php
            $stuid = $_GET ["stuid"];
            if ($stuid) {
            require "db_config.php"; // 引用配置文件
            try{
                $pdo = new PDO($dsn, $user, $pass);
                $pdo->query("set names utf8");
                //$sql = "SELECT * FROM student";
                // var_dump($conn->query($sql)); //class PDOStatement
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            $sql = "select * from student where stuid='$stuid'";
            $result = $pdo->query ( $sql );
            if($result){
                ?> <script type="text/javascript">window.alert("查询成功")</script>
            <?php }else {
                echo "查询失败";
            }
            $row = $result->fetch(PDO::FETCH_ASSOC);
            ?>
    <span class="STYLE1">学生信息管理系统－信息修改</span>
		</p>
		<form id="form1" name="form1" method="post"
			action="editstudentdo.php?stuid=<?=$row["stuid"]?>">
			<table width="449" height="344" border="2" align="center"
				cellpadding="0" cellspacing="1">
				<tr>
					<td width="123" valign="top"><p align="center">
							<strong>输入学号：</strong>
						</p></td>
					<td width="266" align="left" valign="middle"><label>
          <?=$row["stuid"]?>
        </label></td>
				</tr>
				<tr>
					<td width="123" height="25" valign="top"><p align="center">
							<strong>输入姓名：</strong>
						</p></td>
					<td width="266" align="left" valign="middle"><label> <input
							name="name" type="text" id="name" value="<?=$row["name"]?>" />
					</label></td>
				</tr>
				<tr>
					<td width="123" valign="top"><p align="center">
							<strong>所在年级：</strong>
						</p></td>
					<td width="266" align="left" valign="middle"><label> <select
							name="class" id="class">
            <?php
					
					for($i = 2007; $i <= 2012; $i ++) {
						echo "<option value=" . $i . "级";
						if (substr ( $row ["classname"], 0, 4 ) == $i)
							echo " selected='selected'";
						echo ">" . $i . "级</option>";
					}
					?>
          </select>
					</label></td>
				</tr>
				<tr>
					<td valign="top"><p align="center">
							<strong>所在班级：</strong>
						</p></td>
					<td align="left" valign="middle"><label> <select name="classid"
							id="classid">
            <?php
					
					for($i = 1; $i <= 6; $i ++) {
						echo "<option value=" . $i . "班";
						if (substr ( $row ["classname"], 0, 1 ) == $i)
							echo " selected='selected'";
						echo ">" . $i . "班</option>";
					}
					?>
          </select>
					</label></td>
				</tr>
				<tr>
					<td width="123" valign="top"><p align="center">
							<strong>选择专业：</strong>
						</p></td>
					<td width="266" align="left" valign="middle"><label> <select
							name="major" id="major">
								<option value="计算机应用">计算机应用</option>
								<option value="计算机软件">计算机软件</option>
								<option value="计算机网络">计算机网络</option>
								<option value="艺术设计">艺术设计</option>
								<option value="电子商务">电子商务</option>
								<option value="国际贸易">国际贸易</option>
								<option value="市场营销">市场营销</option>
						</select>
					</label></td>
				</tr>
				<tr>
					<td width="123" height="17" valign="top"><p align="center">
							<strong>选择宿舍：</strong>
						</p></td>
					<td width="266" align="left" valign="middle"><input name="room"
						type="text" id="room" value="<?=$row["room"]?>" /></td>
				</tr>
				<tr>
					<td width="123" height="18" valign="top"><p align="center">
							<strong>选择床号：</strong>
						</p></td>
					<td width="266" align="left" valign="middle"><label> <input
							name="bed" type="text" id="bed" value="<?=$row["bedid"]?>"
							size="4" />
					</label></td>
				</tr>
				<tr>
					<td width="123" height="22" valign="top"><p align="center">
							<strong>性 别：</strong>
						</p></td>
					<td width="266" align="left" valign="middle"><label> <input
							name="sex" type="radio" value="男"
							<?=$row["sex"]=="男"?"checked":"" ?> />
					</label> 男 <label> <input type="radio" name="sex" value="女"
							<?=$row["sex"]=="女"?"checked":"" ?> /> 女
					</label></td>
				</tr>
				<tr>
					<td width="123" height="21" valign="top"><p align="center">
							<strong>出生日期</strong>：
						</p></td>
					<td width="266" align="left" valign="middle"><label>
        <?php
					$temp = $row ["birthday"]; // 把出生日期赋值给变量
					                           // 以下代码为通过不同情况分离出出生的年月日
					$year = substr ( $temp, 0, 4 ); // 从出生日期中提取年
					if (strrpos ( $temp, "-" ) == "6") 					// 查找月的位置以判断月份的位数
					{
						$month = substr ( $temp, 5, 1 ); // 从出生日期中提取出月
						$day = substr ( $temp, 7 ); // 从出生日期中提取出日
					}
					if (strrpos ( $temp, "-" ) == "7") {
						$month = substr ( $temp, 5, 2 );
						$day = substr ( $temp, 8 );
					}
					?>
          <select name="year" id="year">
           <?php
					for($i = 1980; $i < 2004; $i ++) 					// 循环输出出生年
					{
						echo "<option value=" . $i;
						if ($year == $i)
							echo " selected='selected'";
						echo ">" . $i . "\n";
					}
					?>
          </select> 年 <select name="month" id="month">
           <?php
					for($i = 1; $i < 14; $i ++) 					// 循环输出出生月
					{
						echo "<option value=" . $i;
						if ($month == $i)
							echo " selected='selected'";
						echo ">" . $i . "\n";
					}
					?>
          </select> 月 <select name="day" id="day">
           <?php
					for($i = 1; $i < 32; $i ++) 					// 循环输出出生日
					{
						echo "<option value=" . $i;
						if ($day == $i)
							echo " selected='selected'";
						echo ">" . $i . "\n";
					}
					?>
          </select> 日
					</label></td>
				</tr>
				<tr>
					<td width="123" valign="top"><p align="center">
							<strong>家庭地址：</strong>
						</p></td>
					<td width="266" align="left" valign="middle"><label> <input
							name="homeaddress" type="text" id="homeaddress"
							value="<?=$row['homeaddress']?>" size="30" />
					</label></td>
				</tr>
				<tr>
					<td width="123" valign="top"><p align="center">
							<strong>电话</strong>：
						</p></td>
					<td width="266" align="left" valign="middle"><label> <input
							name="tel" type="text" id="tel" value="<?=$row['tel']?>" />
					</label></td>
				</tr>
				<tr>
					<td valign="top">&nbsp;</td>
					<td align="left" valign="middle"><input type="submit" name="button"
						id="button" value="更新信息" /> <input type="submit" name="button2"
						id="button2" value="重新录入" /></td>
				</tr>
			</table>
		</form>
		<p>&nbsp;</p>
	</div>
    <?php
    } else {
        ?>
        <script type="text/javascript">window.alert("出错了出错了！！！")</script><?php }?>
</body>
</html>
