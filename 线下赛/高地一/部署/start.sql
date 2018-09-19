drop database if exists web2;
CREATE database web2;
use web2;
--
-- 表的结构 `text`
--

CREATE TABLE `text` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8,AUTO_INCREMENT=3;

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8, AUTO_INCREMENT=8;

-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'guest', 'guest.guest.guest'),
(2, 'BossLi', '52papapa12memeda');



CREATE USER 'web2'@'localhost' IDENTIFIED BY 'li!!@$cheng';
GRANT all privileges  ON web2.* TO 'web2'@'localhost';
