<?php 

//header("Content-type:text/html;charset=gb2312");
 ?>
 <!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��һ��web��ȫ--����������ʾϵͳ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./style/css/bootstrap.min.css">
<link rel="stylesheet" href="/.style/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="./style/css/css.css">
<script src="./style/js/jquery-1.9.1.min.js"></script>
<script src="./style/js/bootstrap.min.js"></script>


</head>
<div class="navbar navbar-fixed-top navbar-inverse">
   <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <!--  <a class="navbar-brand" href="{$url.root}/index.php">Xss.tv</a> -->
    </div>
        <div class="collapse navbar-collapse">
       
        <ul class="nav navbar-nav">
<li><a href="index.php">��ҳ</a></li> 
            <li><a href="index.php?id=1">������Ϣ</a></li> 

        </ul>
       
        </div>
    </div>
</div>
<body>
<div class="container ">
 
  <script type="text/javascript">
  $("li").click(function(){
    //$(this).addClass('active');
  });
 
  </script>

<?php
	if(!empty($_GET['id'])){

    @$conn=mysqli_connect("localhost","root","root","baji")  ;
    mysqli_query($conn,"SET NAMES 'gbk'"); 
    $id = addslashes($_GET['id']);
    $sql = "select * from admins where id= '$id'";

    $res = mysqli_query($conn,$sql);
    if ( $rows = mysqli_fetch_array($res)) {
      	echo '<table class="table table-bordered">';
        echo '<tr><td>��          ������</td><td> '.$rows[1].'</td></tr>';
	echo '<tr><td>��            Ǯ��</td><td> '.$rows['money'].'</td></tr>';
        echo '<tr><td>��&nbsp;&nbsp;�䣺 </td><td>'.$rows['email'].'</td></tr>';
	echo '<tr><td>��    ��   ͷ  ��</td><td><img src="head.jpg" width="20%"/></td></tr>';
	echo '</table>';
    }
    mysqli_close($conn);
}else{
	echo 'welcome !';
}
 ?>

<div id="footer" class="container">
<br>
<nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="navbar-inner navbar-content-center">
        <p class="text-muted credit text-center" style="padding: 10px; font-size: 25px;">
            Powered by ��һ��web��ȫ  Copyright 2016-2017 &nbsp; <a href="http://www.xinyiji.com" target="_blank">www.xinyiji.com</a>
        </p>
    </div>
</nav>