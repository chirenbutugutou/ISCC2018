<?php
if (isset($_POST['mail'])) {
	include "config.php";
	$mail = $_POST['mail'];
	$text = $_POST['text'];
	$rs = $db->prepare("INSERT INTO `text` (`id`, `mail`, `text`) VALUES (NULL, ?, ?);");
	$rs->bindParam(1, $mail);
	$rs->bindParam(2, $text);
	$rs->execute();
	echo '<script language="javascript">
	alert("提交成功！");
    	window.location= "./index.php";
	</script>';
}
?>
    <!DOCTYPE html>
    <html lang="zh-CN">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Guestbook-BossLi's blog</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <a class="navbar-brand" href="#">BossLi's Blog</a>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="./index.php">Index</a></li>
                        <li class="active"><a href="./guestbook.php">Guestbook</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./admin.php">Admin Login</a></li>
                    </ul>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <form name="guestbook" action="guestbook.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Your E-mail" name="mail">
                            <span class="input-group-btn">
	        <button class="btn btn-default" type="submit">Send!</button>
	      </span>
                        </div>
                        <textarea class="form-control" rows="8" name="text"></textarea>
                    </form>
                </div>
            </div>
            <footer class="footer navbar-fixed-bottom col-md-6 col-md-offset-4">
                <p>Designed and built by BossLi.</p>
            </footer>
        </div>
    </body>

    </html>
