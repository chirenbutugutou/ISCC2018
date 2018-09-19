<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	if (preg_match("/\'|\"/is", $id)) {
		die("Mysql error.");
	}
	if (preg_match("/(select|union|and|by|limet|user|sleep|exec|group|where|\/\*|--)/isx", $id)) {
		die("咳咳");
	}
}
?>
    <!DOCTYPE html>
    <html lang="zh-CN">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BossLi's blog</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <a class="navbar-brand" href="#">BossLi's Blog</a>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="./index.php">Index</a></li>
                        <li><a href="./guestbook.php">Guestbook</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./login.php">Admin Login</a></li>
                    </ul>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-8">
                    <h1><a href="./index.php?id=2">时间</a></h1>
                    <blockquote>
                        <p class="lead">
                            人间的季候永远不断在转变
                            <br /> 春时你留下多处残红，翩然辞别，
                            <br /> 本不想回来时同谁叹息秋天!
                            <br /> 现在连秋云黄叶又已失落去
                            <br /> 辽远里，剩下灰色的长空一片
                            <br /> 透彻的寂寞，你忍听冷风独语?
                        </p>
                    </blockquote>
                    <h1><a href="./index.php?id=1">人间的四月天</a></h1>
                    <blockquote>
                        <p class="lead">
                            我说你是人间的四月天
                            <br /> 笑声点亮了四面风
                            <br /> 轻灵在春的光焰中交舞着变换。
                            <br />
                            <br /> 你是四月早天里的云烟。
                            <br /> 黄昏吹着风的软，星子在无意中闪，细雨点洒在花前。
                            <br />
                            <br /> 那轻。那娉婷。你是。鲜艳。
                            <br /> 百花的冠冕你戴着，你是天真，庄严，你是夜夜的月圆。
                            <br />
                            <br /> 雪化后那片鹅黄，你象新鲜初放的绿。
                            <br /> 你是柔嫩喜悦。
                            <br /> 水光浮动着你梦期待中的白莲。
                            <br />
                            <br /> 你是一树一树的花开，是燕在梁间呢喃。
                            <br /> 你是爱，是暖，是希望。
                            <br /> 你是人间的四月天 </p>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="./img/love.jpg" alt="live">
                        <div class="caption center-block">
                            <h3 class="text-center">BossLi.F</h3>
                            <p class="text-center"></p>
                            <p class="text-center"><a href="#" class="btn btn-primary" role="button">和我做好朋友</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer col-md-6 col-md-offset-4">
                <p>Designed and built by BossLi.</p>
            </footer>
        </div>
    </body>

    </html>
