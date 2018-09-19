<?php
include "config.php";
if (!isset($_SESSION['username'])) {
	header("Location:./login.php");
}
if (isset($_GET['username']) && isset($_GET['password'])) 
{
    $username = $_GET['username'];
    $password = $_GET['password'];
    if (preg_match("/(union|and|or|order|sleep|group|exec|where|\/\*|--|,|\#|benchmark)/isx", $username . $password))
    {
        die("搞事情？");
    }
    $rs = $db->query("SELECT * FROM `user` WHERE  username=\"$username\";");
    if (!$rs->fetch()) {
        $rs = $db->query("INSERT INTO `user` (`id`, `username`, `password`) VALUES (NULL, '$username' ,'$password');");
        /*$rs = $db->prepare("INSERT INTO `user` (`id`, `username`, `password`) VALUES (NULL, ? ,?);");
        $rs->bindParam(1, $username);
        $rs->bindParam(2, $password);
        $rs->execute();*/
        if($rs)
        {
            echo "<script>alert(\"添加成功!\")</script>";
        }
            //die($db->errorInfo()[2]);
    } else {
        echo "<script>alert(\"用户名已存在！ \")</script>";
    }
}

?>
    <!DOCTYPE html>
    <html lang="zh-CN">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin-BossLi's blog</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <a class="navbar-brand" href="#">BossLi's Blog</a>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="./index.php">Index</a></li>
                        <li><a href="./guestbook.php">Guestbook</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="./login.php">Admin Login</a></li>
                    </ul>
                </div>
            </nav>
            <div class="row col-md-offset-4">
                <a class="col-md-2 btn btn-primary " href="?method=index">Index</a>
                <a class="col-md-2 btn btn-success " href="?method=adduser">Add user</a>
                <a class="col-md-2 btn btn-info " href="?method=out">Logout</a>
            </div>
            <div class="row">
                <?php
if (isset($_GET['method'])) {
	$method = $_GET['method'];
	switch ($method) {
	case 'index':
		echo '<script language="JavaScript">
                            function myrefresh(){
                            window.location.reload();
                            }
                            setTimeout(\'myrefresh()\',60000);
                            //alert(document.cookie);
                            </script>';
		if (strtolower($_SESSION['username']) == 'bossli') {
			echo "flag{76a8fd5af0125283dc29e62b3310abbb}<br /><br />";
			echo "欢迎 {$_SESSION['username']}，您的私有消息：<br />";
			echo "<b>Mail:hr@xatusec.org</b><br /><b>李总，文件已发送至您的邮箱(Bossli2015@163.com)，请注意查收。</b><br />";
		} elseif (strtolower($_SESSION['username']) == 'guest') {
			echo "欢迎 {$_SESSION['username']}，暂时没有您的私有消息，<p style=color:red>李总那里有重要消息!!!</p><br />";
			$rs = $db->query("SELECT `mail`,`text` FROM `text` where 1  ORDER by id DESC LIMIT 0,30;");
			foreach ($rs->fetchall() as $value) {
				echo "mail:$value[0]<br />content:$value[1]<br />";
			}
		} else {
        			echo "欢迎 {$_SESSION['username']}，暂时没有您的私有消息。<br />";
		}

		break;
	case 'adduser':
		echo '<br />
                            <div class="row col-md-6 col-md-offset-3">
                                <form class="form-horizontal" method="GET" action="">
                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Username:</label>
                                <div class="col-sm-6"><input name="username" class="form-control" ></div>
                                <label for="inputEmail3" class="col-sm-4 control-label">Password:</label>
                                <div class="col-sm-6"><input name="password" class="form-control" ></div>
                                <button type="submit" class="btn btn-default">Add</button>
                                </div>
                                </form>
                            </div>'.'<!--insert into user (id,username,password) values (null,\'$username\',\'$password\')-->';
		break;
	case 'out':
		unset($_SESSION['username']);
		session_destroy();
		header("Location:./index.php");
		break;
	default:
		header("Location:?method=index");
		break;
	}
} else {
	echo '<script language="javascript">
        window.location= "?method=index";
    </script>';
}
?>
            </div>
            <footer class="footer navbar-fixed-bottom col-md-6 col-md-offset-4">
                <p>Designed and built by BossLi.</p>
            </footer>
        </div>
    </body>

    </html>
