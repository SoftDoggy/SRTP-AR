
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
   <div class="masthead clearfix site-wrapper cover-container">
            <div class="inner">
              <h3 class="masthead-brand">SRTP-AR</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="recognition.php">Recognition</a></li>
                  <li class="active"><a href="search_wiki.php">Wiki</a></li>
                  <li><a href="search_taobao.php">Goods</a></li>
                </ul>
              </nav>
            </div>
    </div>
    <div class="site-wrapper">
      <div id="document" class="site-wrapper-inner">
        <div class="cover-container">

          <br/>
          <br/>
          <br/>
          <br/>
          <br/>

          <div class="inner cover">   

           <div class="row">
                <!-- <div class="col-md-12"></div> -->
                <div class="col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-sm-2 col-md-2 col-lg-2">
                  <img src="img/wiki.png" width="90">
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2">
                </div>

                <br/>
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
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
mysqli_close($conn);
?>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <input type="text" class="form-control" value="<?php echo $row['name']; ?>">
                </div>
                <div class="col-md-2"></div>
            </div>
            <br/>

            <div class="row">
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-8">
                  <iframe src="<?php echo 'https://en.wikipedia.org/wiki/'.$row['name']; ?>" name="ifraRight" id="ifraRight" src="Main.aspx" frameborder="1"  scrolling="yes" width=600 height=320 ></iframe>
                </div>
                <div class="col-md-2"></div>
            </div>                 
          </div>
        </div>

        <!-- <div class="mastfoot" align="center"> -->
        <div align="center" style="color: #999; color: rgba(255,255,255,.5);">
            <p class="inner" align="center">
              © 2017 SRTP-AR  &nbsp <a href="https://gitlab.com/Yifang_Wang/SRTP-AR">Watch us on Gitlab </a>, by sunshinepursuer
            </p>
        </div>

      </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function(){
           // $("iframe").mouseenter(function(){
               $("input").delay(2000).fadeOut();
               $("img").delay(2000).fadeOut();
               $("iframe").delay(2000).fadeOut();
              //  $("iframe").fadeIn();
              //  $("iframe").animate({
              //   height:'420px',
              //   width:'720px'
              // });
           // });
        });

        $(document).ready(function(){
               $("iframe").fadeIn();
               $("iframe").animate({
                height:'420px',
                width:'720px'
              });
        });

    </script>

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/scroll-up-bar.js"></script>

  </body>
</html>
