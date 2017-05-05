<!DOCTYPE html>
<html>
<head>
	<title>HoloLens文件传输</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>SRTP-AR</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    <style type="text/css">
     .myp{
      margin-bottom: 20px;
      font-size: 16px;
      font-weight: 200;
      line-height: 1.4;
     }
      
    </style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

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

 <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">SRTP-AR</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="index.php">Home</a></li>
                  <li><a href="recognition.php">Recognition</a></li>
                  <li><a href="search_wiki.php">Wiki</a></li>
                  <li><a href="search_taobao.php">Goods</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <br/>
          <br/>
          <br/>
          <br/>
          <br/>


          <div class="inner cover">   
	            <h1 class="cover-heading" value="<?php echo $row['name']; ?>" >Put Result Here:</h1>
	            <br/>

	            <form method="post" action="transition.php">
                  <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3"></div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <input type="text" name="par1" id="objectname" value="<?php echo $row['name']; ?>" class="form-control"><br><br>
                    </div>
                  </div>
                        
                  <input type="submit" name="submit" value="submit" class="btn btn-lg btn-default">
                  
				      </form>

	            <br/>
	            <br/>
	            <p class="myp">This is a simple UWP APP. </p>
	            <p class="myp">It is aiming at transfering infomation bewteen Hololens and PC.</p>
          </div>

        </div>

        <div align="center" style="color: #999; color: rgba(255,255,255,.5);">
            <p class="inner" align="center">
              © 2017 SRTP-AR  &nbsp <a href="https://gitlab.com/Yifang_Wang/SRTP-AR">Watch us on Gitlab </a>, by sunshinepursuer
            </p>
          </div>

      </div>

    </div>

</body>
</html>