 <?php
require_once ('PageDivide.php');
$pageRecordNum = 1;
// 查询总记录数
$totalReciordQuery = "select count(*) from student";
// 查询内容
$dataQuery = "select * from student";
$url = $_SERVER ['SCRIPT_NAME'];
$pageDivide = new PageDivide ( $totalReciordQuery, $pageRecordNum, $url );
$result = $pageDivide->query ( $dataQuery );
echo "<table border=1>";
echo "<tr>";
echo "<td>学号</td><td>姓名</td><td>班级</td><td>生日</td><td>性别</td><td>民族</td><td>修改操作</td><td>删除操作</td>";
echo "</tr>";
while ( $row = $result->fetch_array () ) {
	echo "<tr>";
	echo "<td>" . $row ['studentId'] . "</td><td>" . $row ["name"] . "</td><td>" . $row ["className"] . "</td><td>" . $row ['birthday'] . "</td><td>" . $row ['sex'] . "</td><td>" . $row ['nation'] . "</td>";
	echo "<td><a href='updateStduent.php?id=" . $row ['id'] . "'>修改</a></td><td><a href='deleteStduent.php?id=" . $row ['id'] . "'>删除</a></td>";
	echo "</tr>";
}
echo "</table>";

$pageDivide->echoPageControl ();
?>