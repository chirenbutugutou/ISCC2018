<?php
include "config.php";
if (isset($_SESSION['username'])) {
	header("Location:./admin.php?method=index");
}
if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$rs = $db->prepare("SELECT * FROM `user` WHERE username=? and password=?;");
	$rs->bindParam(1, $username);
	$rs->bindParam(2, $password);
	$rs->execute();
	if ($rs->fetch()) {
		$_SESSION['username'] = $username;
		header("Location:./admin.php?method=index");
	}

}
?>
    <!DOCTYPE html>
    <html lang="zh-CN">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login-BossLi's blog</title>
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
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>Admin Login</h1>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">username:</label>
                            <input type="username" class="form-control" name="username" placeholder="guest">
                            <label for="password">password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
            </div>
            <footer class="footer navbar-fixed-bottom col-md-6 col-md-offset-4">
                <p>Designed and built by BossLi.</p>
            </footer>
        </div>
    </body>

    </html>
