<!DOCTYPE html>
<html>
<head>
	<title>HoloLens文件传输</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css">
.aa{
width:100%;
height:100%;
text-align:center;
padding-top: 100px;
}
.aaa{
margin-left:30%;
padding: 10px;
width:520px;
height:220px;
background:#666;
color:#fff;
font-size:10px;
font-family:"Comic Sans MS", cursive;
text-align:center;
vertical-align: middle;
}
	</style>
</head>
<body>
<?php
//$par=$_POST['objectname'];
$servername = "localhost";
// 创建连接
$conn = new mysqli($servername, "root", "10idccom","test");
 
// 检测连接
if (!$conn) {
    die('数据库连接失败: ' . mysqli_error());
} 
//echo '连接成功';
$sql = 'select * from objectname';
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
mysqli_close($conn);
?>
<div class="aa">
	<div class="aaa">
	<h1>识别物体</h1>
	<form method="post" action="transition.php">
	<input type="text" name="par1" id="objectname" value="<?php echo $row['name']; ?>" style="height: 30px;width:400px;"><br><br>
	<input type="submit" name="submit" value="change" style="height: 30px; width: 200px">
	</form>
    </div>
</div>
</body>
</html>