<?php
$host = "localhost";
$dbname = "web2";
$dbuser = "web2";
$dbpwd = 'li!!@$cheng';
$db = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpwd);
$db->query("set names utf8");
ini_set("session.cookie_httponly", 1);
//session_set_cookie_params('', '', '', '', 1);
session_start();
?>
