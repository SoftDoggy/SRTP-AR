<pre>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$servername = "localhost";
// 创建连接
$conn = new mysqli($servername, "root", "10idccom","test"); 
// 检测连接
if (!$conn) {
    die('数据库连接失败: ' . mysqli_error());
} 
//echo '连接成功';

$sql = 'select * from objectname';
if(!isset($_POST['submit'])) 
	return;
if($_POST['submit']=='change'){ 
	$par = $_POST['par1']; 
	$sql2 = "delete from objectname";
	$r1=mysqli_query($conn,$sql2);
} 
echo 'The object name is changed to '.$par.'.';
$sql3 = "insert into objectname  values (1,'$par')";
$r2=mysqli_query($conn,$sql3);

//$result = mysqli_query($conn,$sql);
//$row=mysqli_fetch_assoc($result);
//echo $row["name"];
//断开连接
mysqli_close($conn);

?>