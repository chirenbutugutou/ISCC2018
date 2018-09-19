step1:获取guest用户的cookie
该题留言板存在存储式XSS，但是cookie是http_only。
发现根目录存在phpinfo文件，访问该文件可以显示http header，于是考虑利用ajax使管理员访问phpinfo.php后将信息发给我们的远程服务器
ajax.js实现了这一操作，xss.php是接收数据的脚本。然后利用打到的cookie登录后台。
（这一步也可以构造csrf创建用户，不过首先要用xss获取源代码）
step2：利用添加用户处的注入漏洞跑出bossli用户的密码
payload如下（密码框输入，用户名随便填）
' || (substr((select * from ((select username from user limit 1)a))from(-1))='t') || '
如果猜对字符则创建的密码为1，否则创建的用户密码为0.以此为依据编写自动化脚本跑出李总用户的密码
getflag即可得到flag。